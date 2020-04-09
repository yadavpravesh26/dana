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

if($meth=='quotation-del')
{
	$table_name = "quotations";
	$id = $_POST["id"];
	$status = $_POST['status'];
	$t_cond = array("id" => $id);
	$values = array("quotStatus" => $status);
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

if($meth=='quot-row-del')
{
	$table_name = "quot_trading";
	$id = $_POST["id"];
	$t_cond = array("id" => $id);
	$values = array("quotation_id" => 0);
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

if($meth=='get_product_details')
{
	$id = $_POST["id"];
	
	$product_val = $prop->get('*',INVENTORY_TABLE, array('id'=>$id));
	$p_des = $product_val['p_des'];
	$c_price = $product_val['c_price'];
	$s_price = $product_val['s_price'];
	$unitval = $product_val['unit'];
	$output = array('status'=>'Status','err'=>'success','result'=>1,'p_des'=>$p_des,'c_price'=>$c_price,'s_price'=>$s_price,'unitval'=>$unitval);
	echo json_encode($output); exit;
}

if($meth=='ajax_print')
{
	$table_name = "quotations";
	$table_name1 = "quot_trading";
	$id = $_POST["id"];
	$print_val = $prop->get('*',$table_name, array('id'=>$id));
	$client_details = $prop->get_Disp('select * from '.CLIENTS.' WHERE status != 2 AND id='.$print_val['clientName']);
	$c_name = strtoupper( $client_details['c_name'] );
	$c_email = $client_details['c_email'];
	$c_phone = $client_details['c_phone'];
	$c_location = $client_details['c_location'];
	$c_address = $client_details['c_address'];
	$c_city = $client_details['c_city'];
	$c_state = $client_details['c_state'];
	$c_country = $client_details['c_country'];
	$c_zip = $client_details['c_zip'];	

	$msg = '<div class="header">
      <div class="sub-header">

         <div class="content">
            <table style="width:100%" >
               <tr>
                  <td class="text-left" style="max-width:240px;" >
                     <img class="invoice-logo" src="./Images/logo1.png" style="height:50%;width:60%;padding-top:5px" alt="" />
                  </td>
                  <td class="text-right" colspan="4" style="line-height:24px">                  
                     Dana World Cont.Co WILL </br>
                     Po Box: 32532 </br>
                     Tel: +974 4431 3911 | Fax: +974 4437 5398
                  </td>
               </tr>
               <tr style="width:100%:padding:0">
                  <td class="text-center" valign="bottom"  colspan="2">
                     <h5 style="text-decoration:underline;text-underline-position: under;font-weight:900;color:black;padding-top:15px">QUOTATION</h5>
                  </td>
               </tr>
            </table>
            <table style="width:100%;margin:15px 0px">
               <tr style="width:100%">
                  <td class="text-left" style="width:150px;height:10px;padding-bottom:-10px">
                     <p style="display:inline">
                     <p style="display:inline"><strong>Date</strong></p>
                     '.date('d/M/Y', strtotime($print_val['estCreatedDate'])).'</p>
                     <!-- </td><td style="width:30px"></td> -->
                  <td class="text-center" style="width:150px;height:10px;padding-bottom:-10px" >
                     <p style="display:inline">
                     <p style="display:inline"><strong>Quote Ref:</strong></p>
                     DWCC/T/QTN/108</p>
                  </td>
                  <td style="width:50px"></td>
                  <td class="text-left" style="width:150px;height:10px;padding-bottom:-10px">
                     <p style="display:inline">
                     <p style="display:inline"><strong>Project Ref:</strong></p>
                     ALMOAYYED</p>
                  </td>
               </tr>
            </table>
            <table style="width:100%">
               <tr style="border-bottom:1px solid black">
                  <td><strong>To</strong></td>
               </tr>
               <tr>
                  <td style="padding-top:10px">
				  	 '.$c_name.'<br>
                     '.$c_address.', '.$c_location.', '.$c_city.'<br>
                     Mob: '.$c_phone.'<br>
                     E-mail: '.$c_email.'<br>
                     '.$c_state.', '.$c_country.', '.$c_zip.'
                  </td>				  
               </tr>
               <tr>
                  <td style="padding-top:15px;line-height:23px">
                     <strong>Kind Attn: '.$print_val['kindAttnTo'].'</strong><br>
                     <strong>Subject: '.$print_val['subjectOfQuotation'].'</strong><br>
                     <strong>Project: '.$print_val['projectName'].'</strong>
                  </td>
               </tr>
               <tr>
                  <td style="padding-top:15px;line-height:23px">
                     Dear Sir,
                     '.$print_val['SpecialInstructions'].'
               </tr>
               <tr style="text-align:center">
                  <td style="">
                     <h5 style="text-decoration:underline;text-underline-position:under">Annexure - A</h5>
                  </td>
               </tr>
            </table>
         </div>
      </div>
      </div>
	  <div class="body">
      <div class="summary-info">
         <table id="myTable" style="border:1px solid black;width:100%" >
            <thead>
               <tr>
                  <th style="width:70px;text-align:center;font-size:12px;padding-top:10px">S.NO	</th>
                  <th colspan="2" style="width:350px;text-align:center;font-size:12px;padding-top:10px;" valign="baseline"> DESCRIPTION</th>
                  <th style="width:100px;text-align:center;font-size:12px;padding-top:10px" valign="baseline">QTY</th>
                  <th style="width:90px;text-align:center;font-size:12px;padding-top:10px" valign="baseline"> UNIT</th>
                  <th colspan="2" style="width:110px;text-align:center;font-size:12px;padding-top:10px" valign="baseline">UNIT PRICE</th>
                  <th colspan="2" style="width:100px;text-align:center;font-size:12px;padding-top:10px" valign="baseline">TOTAL</th>
               </tr>
            </thead>
            <tbody>';
		$sql='select * from quot_trading where quotation_id='.$print_val['id'];
	  	$row=$prop->getAll_Disp($sql);
		$sno=0;
		$total=0;
		for($i=0; $i<count($row); $i++)
		{
			$sno++;
			$total = $total + $row[$i]["pTotal"];
			$msg .= '<tr style="height:40px;border:1px solid black">
                  <td  style="text-align:center;border-right:1px solid black">'.$sno.'</td>
                  <td colspan="2" style="padding-left:7px;border-right:1px solid black"><strong>'.$row[$i]["pDescription"].'</strong></td>
                  <td  style="text-align:center;border-right:1px solid black">'.$row[$i]["pQTY"].'</td>
				  <td  style="text-align:center;border-right:1px solid black">'.$row[$i]["pUnit"].'</td>
                  <td  style="text-align:center;border-right:1px solid black" colspan="2">'.$row[$i]["pUnitPrice"].'</td>
                  <td  style="text-align:center;border-right:1px solid black"  >'.$row[$i]["pTotal"].'</td>
               </tr>';
		}
		$msg .= '</tbody>
            <tfoot>
               <tr style="height:40px">
                  <td colspan="7" align="right" style="padding-right:20px;border-right:1px solid black">Total</td>
                  <td colspan="2" align="center">'.$total.'</td>
               </tr>
            </tfoot>
         </table>
         <table>
            <tr >
               <td colspan="6" style="padding-top:30px;">
                  <p style="text-align:justify"><strong>Delivery Period:</strong><br>'.$print_val['DeliveryTerm'].'</p>
               </td>
            </tr>
            <tr>
               <td>
                  <p style="text-align:justify"><strong>Completion:</strong><br>Immediate</p>
               </td>
            </tr>
            <tr>
               <td>
                  <p style="text-align:justify"><strong>Payment Terms:</strong><br>'.$print_val['PaymentTerm'].'</p>
               </td>
            </tr>
            <tr>
               <td>
                  <p style="text-align:justify"><strong>Validity:</strong><br> '.$print_val['MaterialWarranty'].'</p>
               </td>
            </tr>
            <tr>
               <td>
                  <p style="text-align:justify"><strong>Exclusions:</strong><br>Delivery Transportation</p>
               </td>
            </tr>
            <tr >
               <td style="padding-top:30px"><strong>For<br>Dana World Cont. Co. WILL</strong></td>
            </tr>
            <tr style="height:30px"></tr>
            <tr>
               <td><strong>Mr.Mohammed Parvez<br>Sales & Estimation Manager<br>Mob: +974 31191694</strong></td>
            </tr>
            <tr style="height:30px"></tr> <tr style="height:30px"></tr> <tr style="height:30px"></tr>
         </table>
       </div>
       </div>';
	 $output = array('status'=>'Status','msg'=>$msg,'err'=>'success','result'=>1);
	
	echo json_encode($output); exit;
}


?>
