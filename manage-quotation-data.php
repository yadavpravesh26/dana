<?php
require_once('inc/config.php');
require_once('inc/pdoconfig.php');
require_once('inc/pdoFunctions.php');
$table_name = 'quotations';
// storing  request (ie, get/post) global array to a variable
$requestData= $_REQUEST;
$where1 = '';$where2 = '';$where3 = '';$where4 = '';$where5 = '';$where6 = '';
if($requestData[QuotNumber] != '')
{
	$where1 = 'AND estNumber='.$requestData[QuotNumber];
}	
if($requestData[QuotCreatedBy] != '')
{
	$where2 = 'AND estCreatedBy='.$requestData[QuotCreatedBy];
}
if($requestData[QuotClient] != '')
{	
	$where3 = 'AND clientName='.$requestData[QuotClient];
}	
if($requestData[QuotProjects] != '')
{	
	$where4 = 'AND projectName='.$requestData[QuotProjects];
}
if($requestData[QuotType] != '')
{	
	$where5 = 'AND estType='.$requestData[QuotType];
}
if($requestData[QuotDate] != '')
{	
	$from_date = date("Y-m-d",strtotime($requestData[QuotNumber]));
	$where6 = 'AND estCreatedDate='.$from_date;
}	

$sql = 'select * from '.$table_name.' where quotStatus != 2 '.$where1.' '.$where2.' '.$where3.' '.$where4.' '.$where5.' '.$where6;

$data = array();
$row=$prop->getAll_Disp($sql);
for($i=0; $i<count($row); $i++)
	 {  // preparing an array
	$nestedData=array();
	$nestedData[] = $row[$i]["estNumber"];
	$clientName = $prop->get_Disp('select * from '.CLIENTS.' WHERE status != 2 AND id='.$row[$i]["clientName"] );
    $c_name = $clientName['c_name'];
	$nestedData[] = $c_name;
	$nestedData[] = $row[$i]["projectName"];
	$user = $prop->get_Disp('select * from '.USERS.' WHERE is_delete = 0 AND id='.$row[$i]["estCreatedBy"] );
    $f_name = $user['f_name'];
	$nestedData[] = $f_name ;
	$nestedData[] = $row[$i]["estType"];
	//$curr_date = date("m/d/Y", strtotime($row[$i]["estCreatedBy"]));
	$nestedData[] = date("m/d/Y", strtotime($row[$i]["estCreatedDate"]));
	$nestedData[] = $row[$i]["BoqName"];

	$eq="";
	$printMe = "'printMe'";
	$eq.='<a href="add-quotation.php?id='.$row[$i]['id'].'" data-toggle="tooltip" data-original-title="Edit"> <span class="label-edit"><i class="ti-pencil"></i></span> </a>';
	
	$eq.='<a onClick="printDiv('.$printMe.','.$row[$i]['id'].')" data-toggle="tooltip" data-original-title="Print"> <span class="label-print"><i class="ti-printer"></i></span> </a>';
	
	$eq.='<a href="#" data-toggle="tooltip" data-original-title="Convert As Job"> <span class="label-job" alt="alert"><i class="ti-briefcase"></i></span> </a>';
	
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
