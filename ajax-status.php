<?php
require_once('inc/config.php');
require_once('inc/pdoconfig.php');
require_once('inc/pdoFunctions.php');
$cdb = new DB();
$db = $cdb->getDb();
$prop = new PDOFUNCTION($db);
$meth = (isset($_REQUEST['meth'])?$_REQUEST['meth']:'');


if($meth=='client-del')
{
	$table_name = "clients";
	$id = $_POST["id"];
	$status = $_POST['status'];
	$t_cond = array("id" => $id);
	$values = array("status" => $status);
	$s = $prop->update($table_name, $values, $t_cond);
	
	if($s){
		$output = array('status'=>'Status','msg'=>'Deleted Successfully','err'=>'success','result'=>1);
	}
	else
	{
		$output = array('status'=>'Error','msg'=>'Deleted Failed','err'=>'error');
	}	
	echo json_encode($output); exit;
}



?>
