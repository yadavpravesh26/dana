<?php
error_reporting(-1);
require_once('inc/config.php');
require_once('inc/pdoconfig.php');
require_once('inc/pdoFunctions.php');
$acti =$_REQUEST['act'];
$id=$_REQUEST['id_val'];
$name_val = array();
$id_1 =  $_REQUEST['stat'];
$new_val = implode(",",$id_1);
$columns = array( 
    0 => 'pid',
    1 => 'unit',
    2 => 'p_name',
    3 => 'p_desc',
    4 => 'c_price',
    5 => 's_price',
    6 => 'total',
    7 => 'vendor',
    8 => 'action'
);
if($acti==0){
		$act = "";
	}
	else{
		$act = 'AND vendor LIKE "%'.$_REQUEST['act'].'%"';
	}
$data = array();
$wh_sel = $prop->getAll_Disp('SELECT A.*,GROUP_CONCAT(B.name ORDER BY B.id) as name FROM '.INVENTORY_TABLE.' as A INNER JOIN '.VENDOR_TABLE.' AS B ON FIND_IN_SET(B.id, A.vendor) > 0 WHERE A.is_delete = 0 '.$act.' GROUP BY A.id');

foreach($wh_sel as $row)
{
 $sub_array = array();
 $sub_array[] = $row["p_id"];
 $sub_array[] = $row["unit"];
 $sub_array[] = $row["p_name"];
 $sub_array[] = $row["p_des"];
 $sub_array[] = $row["c_price"];
 $sub_array[] = $row["s_price"];
 $sub_array[] = $row["total"];
 $sub_array[] = $row["name"];
 $sub_array[] = '<a type="button" name="update"  data-toggle="tooltip" data-original-title="Edit" class="edit" > 
 					<span class="label-edit"><i class="ti-pencil edit_1" id="'.$row["id"].'" ></i></span></a> 
 				 <a type="button" name="update" data-toggle="tooltip" data-original-title="Delete"> 
 				 	<span class="label-delete"><i class="ti-trash delete" id="'.$row["id"].'"></i></span> </a>';
 $data[] = $sub_array;
 
}
$output = array(
 "data"    => $data
);
echo json_encode($output);

?>