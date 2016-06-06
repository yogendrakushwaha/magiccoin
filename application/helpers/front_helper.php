<?php 
	
	// Epoch Converter and Date Routines
	function convert_time($epoch)
	{	
		return date("d-m-Y h:m:s",$epoch);	
	}
	//type: ask - sell, bid - buy
	function change_type($type)
	{
	  return $type == 'ask'?'SELL':'BUY';		
	}
	
	function exp2dec($number) {
	//$n =explode('.')
    preg_match('/(.*)E-(.*)/', str_replace(".", "", $number), $matches);
    $num = "0.";
    while ($matches[2] > 0) {
        $num .= "0";
        $matches[2]--;
    }
    return $num . $matches[1];
}