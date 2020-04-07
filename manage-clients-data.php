<?php
require_once('inc/config.php');
require_once('inc/pdoconfig.php');
require_once('inc/pdoFunctions.php');

// storing  request (ie, get/post) global array to a variable
$requestData= $_REQUEST;
$where = '';
if($requestData[filter_key] != '')
{
	$filter_key = $requestData[filter_key];
	if($requestData[filter_city] != '' or $requestData[filter_state] != '')
	$where .= '( c_name like "%'.$filter_key.'%" or p_contact_person like "%'.$filter_key.'%" or c_phone like "%'.$filter_key.'%" or p_phone like "%'.$filter_key.'%" or p_mobile like "%'.$filter_key.'%" ) or ';
	else
	$where .= '( c_name like "%'.$filter_key.'%" or p_contact_person like "%'.$filter_key.'%" or c_phone like "%'.$filter_key.'%" or p_phone like "%'.$filter_key.'%" or p_mobile like "%'.$filter_key.'%" ) and ';
}	

if($requestData[filter_city] != '')
{
	$filter_city = $requestData[filter_city];
	if($requestData[filter_state] != '')
	$where .= "c_city = '".$filter_city."' or ";
	else
	$where .= "c_city = '".$filter_city."' and ";
}
if($requestData[filter_state] != '')
{	
	$filter_state = $requestData[filter_state];
	$where .= "c_state = '".$filter_state."' and ";
}	
if($requestData[total_project] != '')
{	
	$total_project = $requestData[total_project];
	$where .= '';
}	


if($filter_key == '' and $filter_city == '' and $filter_state == '' and $total_project == '')
$sql = 'select * from '.CLIENTS.' where status != 2';
else
$sql = 'select * from '.CLIENTS.' where '.$where.' status != 2';

$data = array();
$row=$prop->getAll_Disp($sql);
for($i=0; $i<count($row); $i++)
	 {  // preparing an array
	$nestedData=array();
	$nestedData[] = $row[$i]["c_name"];
	$nestedData[] = $row[$i]["c_email"];
	$nestedData[] = $row[$i]["c_phone"];
	$nestedData[] = $row[$i]["c_location"];
	$nestedData[] = $row[$i]["p_contact_person"];
	$nestedData[] = $row[$i]["p_phone"];

	$eq="";

	$eq.='<a href="add-client.php?id='.$row[$i]['id'].'" data-toggle="tooltip" data-original-title="Edit"> <span class="label-edit"><i class="ti-pencil"></i></span> </a>';
	
	$eq.='<a href="#" data-toggle="tooltip" class="deleteone" data-id="'.$row[$i]['id'].'" data-original-title="Delete"> <span class="label-delete own-alert" alt="alert" class="img-responsive model_img"><i class="ti-trash"></i></span> </a>';

	$nestedData[] = $eq;
	$data[] = $nestedData;
}

$json_data = array(
			"draw"            => intval( $requestData['draw'] ),   // for every request/draw by clientside , they send a number as a parameter, when they recieve a response/data they first check the draw number, so we are sending same number in draw.
			"recordsTotal"    => intval( $totalData ),  // total number of records
			"recordsFiltered" => intval( $totalFiltered ), // total number of records after searching, if there is no searching then totalFiltered = totalData
			"data"            => $data   // total data array
			);

echo json_encode($json_data);  // send data as json format

?>
