<?php
ob_start();
error_reporting(0);
session_start();
date_default_timezone_set("Asia/Kolkata");
$date = date('Y-m-d H:i:s');
define('TEMP_PATH',"http://$_SERVER[HTTP_HOST]/admin/");
define('LIVE_SITE',TEMP_PATH);
define('ADMIN_SITE',TEMP_PATH);

define("DB_HOST", "localhost");
define("DB_USER", "eorchi_dana_dev");
define("DB_PASS", "}e;s;OT8}v7L");
define("DB_NAME", "eorchi_dana_dev");
define("TABLE_PREFIX", "");


define("USERS", TABLE_PREFIX . "users");
//define("IP",get_client_ip());
define("DB_DATE",date('Y-m-d H:i:s'));

$session_username = $_SESSION['username'];
$session_user_email = $_SESSION['email'];

class DB
{
	private $db;

	public function __construct()
	{
		try
		{
			$this->db = new PDO('mysql:host='.DB_HOST.';dbname='.DB_NAME.';', DB_USER, DB_PASS);
			$this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$this->db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
		}
		catch (PDOException $err)
		{
			echo "Unable to make DB connect.";
			$err->getMessage() . "<br/>";
			file_put_contents('PDOErrors.txt',$err, FILE_APPEND);  // write some details to an error-log outside public_html
			die();
		}
	}
	public function getDb() {
		if ($this->db instanceof PDO)
			return $this->db;
	}
}

function get_client_ip()
{
    $ipaddress = '';
    if ($_SERVER['HTTP_CLIENT_IP'])
        $ipaddress = $_SERVER['HTTP_CLIENT_IP'];
    else if ($_SERVER['HTTP_X_FORWARDED_FOR'])
        $ipaddress = $_SERVER['HTTP_X_FORWARDED_FOR'];
    else if ($_SERVER['HTTP_X_FORWARDED'])
        $ipaddress = $_SERVER['HTTP_X_FORWARDED'];
    else if ($_SERVER['HTTP_FORWARDED_FOR'])
        $ipaddress = $_SERVER['HTTP_FORWARDED_FOR'];
    else if ($_SERVER['HTTP_FORWARDED'])
        $ipaddress = $_SERVER['HTTP_FORWARDED'];
    else if ($_SERVER['REMOTE_ADDR'])
        $ipaddress = $_SERVER['REMOTE_ADDR'];
    else
        $ipaddress = 'UNKNOWN';
    return $ipaddress;
}

function bckPermission($type){
	$res = TRUE;
	if($type===0)
		$res = FALSE;
	return $res;		
}
function bckPermissionCompany($type){
	$res = TRUE;
	if($type===2)
		$res = FALSE;
	return $res;		
}
?>
