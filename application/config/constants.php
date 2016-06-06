<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/*
|--------------------------------------------------------------------------
| File and Directory Modes
|--------------------------------------------------------------------------
|
| These prefs are used when checking and setting modes when working
| with the file system.  The defaults are fine on servers with proper
| security, but you may wish (or even need) to change the values in
| certain environments (Apache running a separate process for each
| user, PHP under CGI with Apache suEXEC, etc.).  Octal values should
| always be used to set the mode correctly.
|
*/
define('FILE_READ_MODE', 0644);
define('FILE_WRITE_MODE', 0666);
define('DIR_READ_MODE', 0755);
define('DIR_WRITE_MODE', 0777);
define('TPID', 'SUB6867731');
/*
|--------------------------------------------------------------------------
| File Stream Modes
|--------------------------------------------------------------------------
|
| These modes are used when working with fopen()/popen()
|
*/

define('FOPEN_READ',							'rb');
define('FOPEN_READ_WRITE',						'r+b');
define('FOPEN_WRITE_CREATE_DESTRUCTIVE',		'wb'); // truncates existing file data, use with care
define('FOPEN_READ_WRITE_CREATE_DESTRUCTIVE',	'w+b'); // truncates existing file data, use with care
define('FOPEN_WRITE_CREATE',					'ab');
define('FOPEN_READ_WRITE_CREATE',				'a+b');
define('FOPEN_WRITE_CREATE_STRICT',				'xb');
define('FOPEN_READ_WRITE_CREATE_STRICT',		'x+b');

$timezone = new DateTimeZone("Asia/Kolkata" );
$date = new DateTime();
$date->setTimezone($timezone);
define('CURR_DATE',$date->format( 'Y-m-d H:i:s' ));


require_once( BASEPATH.'database/DB'.EXT );
$db =& DB();
$result=$db->get('m00_setconfig')->row();
define('SITE_NAME',$result->m00_sitename);
define('WEBSITE_NAME',$result->m00_website_name);
define('DESCRIPTION',$result->m00_description);
define('EMAIL_SEND',$result->m00_email_send);
define('EMAIL',$result->m00_email);
define('EMAIL_PASSWORD',$result->m00_email_password);
define('SMS_SEND',$result->m00_sms_send);
define('SMS_USERNAME',$result->m00_sms_username);
define('SMS_PWD',$result->m00_sms_pwd);
define('SMS_SENDERID',$result->m00_sms_senderid);
define('USERNAME',$result->m00_username);
define('PASSWORD',$result->m00_password);
define('PINPASSWORD',$result->m00_pinpassword);
define('STATUS',$result->m00_status);
define('REGFORM',$result->m00_reg_Form);
define('TREE_STRUCTURE',$result->m00_tree_structure);
define('CROWD',$result->m00_crowd);
define('THEME',$result->m00_theme);
/* End of file constants.php */
/* Location: ./application/config/constants.php */