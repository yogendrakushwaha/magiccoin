<?php
 Class Api_Yobit{

    const DIRECTION_BUY   = 'buy';
    const DIRECTION_SELL  = 'sell';
    protected $public_api = 'https://yobit.net/api/2/';
    protected $trade_api  = 'https://yobit.net/api/3/trades/ltc_btc-nmc_btc'; 
    protected $api_key    = 'CF050C06EA0899900F0368BD3836BB54';
    protected $api_secret = '8ac17f4cdf1a694a35079803c69446a5';
    protected $noonce;
    protected $RETRY_FLAG = false;
    
    public function __construct($base_noonce = false) {
       
        if($base_noonce === false) {
            // Try 1?
            $this->noonce = time();
        } else {
            $this->noonce = $base_noonce;
        }
    }
    
    /**
     * Get the noonce
     * @global type $sql_conx
     * @return type 
     */
    protected function getnoonce() {
        //$this->noonce++;
        //return array(0.05, $this->noonce);
        $n = intval(trim(file_get_contents('./nonce.txt')))+1;
        file_put_contents('./nonce.txt',$n);
        return array(0.05, $n);
    }
    
    /**
     * Call the API
     * @staticvar null $ch
     * @param type $method
     * @param type $req
     * @return type
     * @throws Exception 
     */
    public function cURL($method, $req = array(),$url= 'https://yobit.net/api/2/') {
        $req['method'] = $method;
        //$mt = $this->getnoonce();
       // $req['nonce'] = $mt[1];
       
        // generate the POST data string
        $post_data = http_build_query($req, '', '&');
 
        // Generate the keyed hash value to post
        $sign = hash_hmac("sha512", $post_data, $this->api_secret);
 
        // Add to the headers
        $headers = array(
                'Sign: '.$sign,
                'Key: '.$this->api_key,
        );
 
        // Create a CURL Handler for use
        $ch = null;
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/4.0 (compatible; SMART_API PHP client; '.php_uname('s').'; PHP/'.phpversion().')');
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $post_data);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
	  //  curl_setopt($ch, CURLOPT_ENCODING , gzip); 
        // Send API Request
        $res = curl_exec($ch);  		
        // Check for failure & Clean-up curl handler
        if($res === false) {
            $e = curl_error($ch);
            curl_close($ch);
            throw new yobitFailureException('Could not get reply: '.$e);
        } else {
            curl_close($ch);
        }
        
        // Decode the JSON
        $result = json_decode($res, true);
        // is it valid JSON?
        if(!$result) {
            throw new yobitInvalidJSONException('Invalid data received, please make sure connection is working and requested API exists');
        }
        
        // Recover from an incorrect noonce
        if(isset($result['error']) === true) {
            if(strpos($result['error'], 'nonce') > -1 && $this->RETRY_FLAG === false) {
                $matches = array();
                $k = preg_match('/:([0-9])+,/', $result['error'], $matches);
                $this->RETRY_FLAG = true;
                trigger_error("Nonce we sent ({$this->noonce}) is invalid, retrying request with server returned nonce: ({$matches[1]})!");
                $this->noonce = $matches[1];
                return $this->cURL($method, $req);
            } else {
                throw new yobitErrorException('API Error Message: '.$result['error'].". Response: ".print_r($result, true));
            }
        }
        // Cool -> Return
        $this->RETRY_FLAG = false;
        return $result;
    }
    
    /**
     * Retrieve some JSON
     * @param type $URL
     * @return type
     */
    protected function retrieveJSON($URL) {
        $opts = array('http' =>
            array(
                'method'  => 'GET',
                'timeout' => 10 
            )
        );
        $context  = stream_context_create($opts);
        $feed = file_get_contents($URL, false, $context);
        $json = json_decode($feed, true);
        return $json;
    }
    
    /**
     * Place an order
     * @param type $amount
     * @param type $pair
     * @param type $direction
     * @param type $price
     * @return type 
     */
    public function makeOrder($amount, $pair, $direction, $price) {
        if($direction == self::DIRECTION_BUY || $direction == self::DIRECTION_SELL) {
            $data = $this->cURL("Trade"
                    ,array(
                        'pair' => $pair,
                        'type' => $direction,
                        'rate' => $price,
                        'amount' => $amount
                    )
            );
            return $data; 
        } else {
            throw new yobitInvalidParameterException('Expected constant from '.__CLASS__.'::DIRECTION_BUY or '.__CLASS__.'::DIRECTION_SELL. Found: '.$direction);
        }
    }
    
    /**
     * Check an order that is complete (non-active)
     * @param type $orderID
     * @return type
     * @throws Exception 
     */
    public function checkPastOrder($orderID) {
        $data = $this->cURL("OrderList"
                ,array(
                    'from_id' => $orderID,
                    'to_id' => $orderID,
                    /*'count' => 15,*/
                    'active' => 0
                ));
        if($data['success'] == "0") {
            throw new yobitErrorException("Error: ".$data['error']);
        } else {
            return($data);
        }
    }
    
    /**
     * Public API: Retrieve the Fee for a currency pair
     * @param string $pair
     * @return array 
     */
    public function getPairFee($pair) {
        return $this->retrieveJSON($this->public_api.$pair."/fee");
    }
    
    /**
     * Public API: Retrieve the Ticker for a currency pair
     * @param string $pair
     * @return array 
     */
    public function getPairTicker($pair) {
        return $this->retrieveJSON($this->public_api.$pair."/ticker");
    }
    
    /**
     * Public API: Retrieve the Trades for a currency pair
     * @param string $pair
     * @return array 
     */
    public function getPairTrades($pair) {
        return $this->retrieveJSON($this->public_api.$pair."/trades");
    }
    
    /**
     * Public API: Retrieve the Depth for a currency pair
     * @param string $pair
     * @return array 
     */
    public function getPairDepth($pair) {
        return $this->retrieveJSON($this->public_api.$pair."/depth");
    }
	//get tradi
	public function get_trades(){	
	  try
		{
		 //sell example		 
		 $res = $this->cURL('GET', [], 'https://yobit.net/api/3/trades/ltc_btc');
		}
		catch(yobitException $e) 
		{
		     echo $e->getMessage();
		}	
		return $res;  
	}
	
	public function get_depth(){	
	  try
		{
		 //sell example		 
		 $res = $this->cURL('GET', [],'https://yobit.net/api/2/ltc_btc/depth' );
		}
		catch(yobitException $e) 
		{
		     echo $e->getMessage();
		}	
		return $res;  
	}
	
	public function get_ticker(){	
	  try
		{
		 //sell example		 
		 $res = $this->cURL('GET', [],'https://yobit.net/api/2/ltc_btc/ticker' );
		}
		catch(yobitException $e) 
		{
		     echo $e->getMessage();
		}	
		return $res;  
	}
	
	public function get_fee(){	
	  try
		{
		 //sell example		 
		 $res = $this->cURL('GET', [],'https://yobit.net/api/2/ltc_btc/fee' );
		}
		catch(yobitException $e) 
		{
		     echo $e->getMessage();
		}	
		return $res;  
	}
	
	
	public function sell_option($xpair,$price,$amount){
	
	     $params = array('pair' => $xpair, 'type'=>'sell', 'rate'=>$price,'amount'=>$amount);
          $res = $yobit->cURL('Trade', $params);
		  return $res;
	}
	
	public function buy_option(){
	  try
        {
		  //buy example
		   $params = array('pair' => $xpair, 'type'=>'buy', 'rate'=>$price,'amount'=>$amount);
		   $res = $yobit->cURL('Trade', $params);
		 }
		catch(yobitException $e) 
		{
				echo $e->getMessage();
		}		
		return $res;
	}
	
	public function get_pair(){
	
	      $xpair='eags_btc';
		  $data = array();
		  $data['depth'] = $this->getPairDepth($xpair);
		  return $data;
		  $asks = $data['depth']['asks'];
		  $count_asks = count($asks);
		  $bids = $data['depth']['bids'];
		  $count_bids = count($bids);

		//var_dump($data['depth']);

		$price_max_bids = $asks[0][0];
		$price_min_asks = $bids[0][0];

		echo "Price_max_bids: $price_min_asks \nPrice_min_asks: $price_max_bids";
	  
	}

	
	
	
	
	
}

/**
 * Exceptions
 */
class yobitException extends Exception {}
class yobitFailureException extends yobitException {}
class yobitInvalidJSONException extends yobitException {}
class yobitErrorException extends yobitException {}
class yobitInvalidParameterException extends yobitException {}