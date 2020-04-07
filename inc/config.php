<?php 
ob_start();
error_reporting(0);
session_start();
date_default_timezone_set("Asia/Kolkata");
$date = date('Y-m-d H:i:s');

define('TEMP_PATH',"http://$_SERVER[HTTP_HOST]/");
define('_404',TEMP_PATH.'dashboard.php');
?>