<?php
session_start(); 
error_reporting(-1);
require_once('inc/config.php');
require_once('inc/pdoconfig.php');
require_once('inc/pdoFunctions.php');
$User_Id = $_SESSION['user_id'];
if(empty($User_Id)){
  header("Location: ".DANA_PATH.'login.php'); 
  exit; 
}
?><!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta name="description" content="">
      <meta name="author" content="">
      <link rel="icon" type="image/png" sizes="16x16" href="plugins/images/dana-world-logo.png">
      <title>Manage Quotations - Dana World Cont Co. Wll</title>
      <!-- Bootstrap Core CSS -->
      <link href="bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
      <link href="plugins/bower_components/bootstrap-extension/css/bootstrap-extension.css" rel="stylesheet">
      <!-- Menu CSS -->
      <link href="plugins/bower_components/sidebar-nav/dist/sidebar-nav.min.css" rel="stylesheet">
      <link href="plugins/bower_components/custom-select/custom-select.css" rel="stylesheet" type="text/css" />
      <!-- animation CSS -->
      <link href="css/animate.css" rel="stylesheet">
      <!-- Custom CSS -->
      <link href="css/style.css" rel="stylesheet">
      <link href="css/dan.css" rel="stylesheet">
      <link href="plugins/bower_components/datatables/jquery.dataTables.min.css" rel="stylesheet" type="text/css"/>
      <link href="https://cdn.datatables.net/buttons/1.2.2/css/buttons.dataTables.min.css" rel="stylesheet" type="text/css"/>
      <!--alerts CSS -->
      <link href="plugins/bower_components/sweetalert/sweetalert.css" rel="stylesheet" type="text/css">
      <!-- color CSS you can use different color css from css/colors folder -->
      <link href="css/colors/blue.css" id="theme" rel="stylesheet">
      <!-- Date picker plugins css -->
      <link href="plugins/bower_components/bootstrap-datepicker/bootstrap-datepicker.min.css" rel="stylesheet" type="text/css" />
      <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
      <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
      <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
      <![endif]-->
      <script src="http://www.w3schools.com/lib/w3data.js"></script>
      <style>
         .input-group-append {
         display: flex;
         align-items: center;
         justify-content: center;
         width: 35px;
         background: #ececec;
         }
      </style>
   </head>
   <body>
      <!-- Preloader -->
      <div class="preloader">
         <div class="cssload-speeding-wheel"></div>
      </div>
      <div id="wrapper">
      <!-- Top Navigation -->
      <?php include("header.php"); ?>
      <!-- Left navbar-header end -->
      <!-- Page Content -->
      <div id="page-wrapper">
         <div class="container-fluid">
            <div class="row mana-top">
               <div class="col-sm-3 sp-row">
                  <span class="head-title">Manage Quotations</span>
               </div>
            </div>
            <div class="row j-details">
               <div class="col-sm-12 p-t-8">
                  <div class="white-box">
                     <div class="col-sm-12">
                        <a href="add-quotation.php" class="btn btn-danger pull-right m-l-20 btn-rounded btn-outline hidden-xs hidden-sm waves-effect waves-light add">Add New Quotations</a>
                     </div>
                     <h3 class="box-title">Filter By</h3>
                     <div class="clearfix"></div>
                     <div class="row m-b-30">
                        <div class="col-sm-3">
                           <div class="form-group">
                              <label>Quotation Number</label>
                              <input type="text" class="form-control" placeholder="Quotation NO">
                           </div>
                        </div>
                        <div class="col-sm-3">
                           <label>Created By</label>
                           <select class="form-control select2">
                              <option value="AK">Mark</option>
                              <option value="HI">Mohammed</option>
                              <option value="HI">Abhi</option>
                           </select>
                        </div>
                        <div class="col-sm-3">
                           <label>Client</label>
                           <select class="form-control select2">
                              <option value="AK">Fine Traders</option>
                              <option value="HI">Good Work</option>
                              <option value="HI">Triumph</option>
                           </select>
                        </div>
                        <div class="col-sm-3">
                           <label>Projects</label>
                           <select class="form-control select2">
                              <option value="AK">Fine Traders</option>
                              <option value="HI">Good Work</option>
                              <option value="HI">Triumph</option>
                           </select>
                        </div>
                        <div class="col-sm-3">
                           <label>Type of Quotation</label>
                           <select class="form-control select2">
                              <option value="AK">Trading Quotation</option>
                              <option value="HI">AMC Quotation</option>
                              <option value="HI">RetroFit Quotation</option>
                           </select>
                        </div>
                        <div class="col-sm-3">
                           <div class="form-group">
                              <label>Date</label>
                              <div class="input-group">
                                 <input type="text" class="form-control mydatepicker" placeholder="mm/dd/yyyy">
                                 <div class="input-group-append">
                                    <span class="input-group-text"><i class="icon-calender"></i></span>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="table-responsive bx-shd">
                        <table id="myTable" class="table table-striped table-bordered act-adjust">
                           <thead>
                              <tr>
                                 <th>Quotations No</th>
                                 <th>Clients</th>
                                 <th>Projects</th>
                                 <th>Created By</th>
                                 <th>Quotation Type</th>
                                 <th>Date</th>
                                 <th>Phone Number</th>
                                 <th class="text-nowrap"  style="width:150px;text-align:center;">Action</th>
                              </tr>
                           </thead>
                           <tbody>
                             
                           </tbody>
                        </table>
                     </div>
                  </div>
               </div>
            </div>
            <!-- .right-sidebar -->
            <!-- /.right-sidebar -->
         </div>
         <!-- /.container-fluid -->
         <!--   <footer class="footer text-center">  </footer>  -->
      </div>
      <!-- /#page-wrapper -->
      <?php include("footer.php"); ?>
      <!--print section -->
      <div class="print-container clearfix" style="display:none"  id='printMe'>
      <div class="header">
      <div class="sub-header">

         <div class="content">
            <!-- <table style="width:100%" border='1'>
               <tr style="width:100%" class="heading">
                 <td colspan="3" >
                             <img class="invoice-logo" src="plugins/images/dana-world-logo.png" alt="" />
                 </td>
                 <td class="text-right" style='line-height:23px'>
                   Dana World Cont. Co WLL</br>
                   Po Box: 32532</br>
                  Tel: +974 4431 3911 |Fax: +974 4437 5398
                       </P>
                   </div>
               
                 </td>
               </tr>
                 <tr class="sub-heading">
                   <td colspan="3">
                       <div class="billto">
                         <strong><big>ALMOAYYED AIR CONDITIONING</strong></big> <br />
                         Mob: +974 33409669 / 4432221-121<br />
                         Email:rajesh@almoayyedac.com.qa,aacpurchaser@gmail.com<br />
                         Doha,Qatar.
               
                       </div>
                   </td>
                   <td class="">
                       <div class="invoice-details">
                         <strong>Quotation Number : </strong> IN_123456_MMDDYY <br />
                         <strong>Quotation Duration : </strong> 29 Aug 2019 - 29 Sep 2019 <br />
                         <strong>Quotation Date: </strong> 23 Sep 2019 <br />
                         <strong>Quotation Amount : </strong> $ 12,000 <br />
                       </div>
                   </td>
               </tr>
               </table> -->
            <table style='width:100%' >
               <tr>
                  <td class='text-left' style='max-width:240px;' >
                     <img class="invoice-logo" src="./Images/logo1.png" style='height:50%;width:60%;padding-top:5px' alt="" />
                  </td>
                  <td class='text-right' colspan='4' style='line-height:24px'>
                     Dana World Cont.Co WILL</br>
                     Po Box: 32532</br>
                     Tel: +974 4431 3911 | Fax: +974 4437 5398
                  </td>
               </tr>
               <tr style='width:100%:padding:0'>
                  <td class='text-center' valign='bottom'  colspan='2'>
                     <h5 style='text-decoration:underline;text-underline-position: under;font-weight:900;color:black;padding-top:15px'>QUOTATION</h5>
                  </td>
               </tr>
            </table>
            <table style='width:100%;margin:15px 0px'>
               <tr style='width:100%'>
                  <td class='text-left' style='width:150px;height:10px;padding-bottom:-10px'>
                     <p style='display:inline'>
                     <p style='display:inline'><strong>Date</strong></p>
                     31-Oct-2019</p>
                     <!-- </td><td style='width:30px'></td> -->
                  <td class='text-center' style='width:150px;height:10px;padding-bottom:-10px' >
                     <p style='display:inline'>
                     <p style='display:inline'><strong>Quote Ref:</strong></p>
                     DWCC/T/QTN/108</p>
                  </td>
                  <td style='width:50px'></td>
                  <td class='text-left' style='width:150px;height:10px;padding-bottom:-10px'>
                     <p style='display:inline'>
                     <p style='display:inline'><strong>Project Ref:</strong></p>
                     ALMOAYYED</p>
                     <!-- </td><td style='width:110px'></td> -->
                     <!-- <td align='left' style='height:10px;padding-bottom:-10px'>
                        <p style='display:inline'><p style='display:inline'><strong>Job Ref:</strong></p> MNT</p>
                        </td> -->
               </tr>
            </table>
            <table style='width:100%'>
               <tr style='border-bottom:1px solid black'>
                  <td><strong>To</strong></td>
               </tr>
               <tr>
                  <td style='padding-top:10px'>
                     ALMOAYYED AIR CONDITIONING<br>
                     Mob: +974 33409669 / 4432221 - 121<br>
                     E-mail: rajesh@almoayyedac.com.qa , aacpurchaser<br>
                     Doha, Qatar
                  </td>
               </tr>
               <tr>
                  <td style='padding-top:15px;line-height:23px'>
                     <strong>Kind Attn: Mr.Rajesh</strong><br>
                     <strong>Subject: SUPPLY FIRE EXTINGUISHERS & FA DEVICES</strong><br>
                     <strong>Project: AL ALMOAYYED AIR CONTIONING</strong>
                  </td>
               </tr>
               <tr>
                  <td style='padding-top:15px;line-height:23px'>
                     Dear Sir,
                     <p style='text-indent:30px;text-align:justify'>With reference to your above project enquiry, please find enclosed herewith our commercial offer as per the Annexure-A. Our offer is based on your Enquiry. Any additional equipment required other than indicated in our commercial BOQ will subject to our offer to be revised accordingly </p>
                     <p style='text-indent:30px;text-align:justify'>We hope our offer meets with your current requirements, if you require further information / clarifications please do not hesitate to contact undersigned</p>
               </tr>
               <tr style='text-align:center'>
                  <td style=''>
                     <h5 style='text-decoration:underline;text-underline-position:under'>Annexure - A</h5>
                  </td>
               </tr>
            </table>
         </div>
      </div>
      <div class="body">
      <div class="summary-info">
         <table id="myTable" style='border:1px solid black;width:100%' >
            <!-- <thead>
               <tr>
                 <th>PID	</th>
                 <th>Product Name</th>
                 <th>Product Description</th>
                 <th>Unit</th>
                 <th>QTY</th>
                 <th  colspan='2'>Unit Price (QR)</th>
                 <th>Tax %</th>
                 <th  colspan='2'>Total (QR)</th>
               </tr>
               </thead>
               <tbody>
               <tr>
                 <td>323</td>
                 <td>White Cement</td>
                 <td>Wet cement</td>
                 <td>Kg</td>
                 <td>300</td>
                 <td colspan='2'>110</td>
                 <td>5</td>
                 <td colspan='2'>2000</td>
               
               </tr>
               <tr>
                 <td>323</td>
                 <td>White Cement</td>
                 <td>Wet cement</td>
                 <td>Kg</td>
                 <td>300</td>
                 <td colspan='2'>110</td>
                 <td>5</td>
                 <td colspan='2'>2000</td>
               
               </tr>
               <tr>
                 <td>323</td>
                 <td>White Cement</td>
                 <td>Wet cement</td>
                 <td>Kg</td>
                 <td>300</td>
                 <td colspan='2'>110</td>
                 <td>5</td>
                 <td colspan='2'>2000</td>
               
               </tr>
               <tr>
                 <td>323</td>
                 <td>White Cement</td>
                 <td>Wet cement</td>
                 <td>Kg</td>
                 <td>300</td>
                 <td colspan='2'>110</td>
                 <td>5</td>
                 <td colspan='2'>2000</td>
               
               </tr>
               
               </tbody>
               <tfoot>
               <tr>
               <td colspan="6" class="text-right"><strong class="total">Total:</strong></td>
               <td class="text-right">
               <strong class="total"><span id="total">0</span></strong>
               
               </td>
               <td  colspan='2'></td>
               </tr>
               <tr>
               <td colspan="6" class="text-right"><strong class="total">Total Amount:</strong></td>
               <td class="text-right">
               <strong class="total"><span id="totalamount">0</span></strong>
               
               </td>
               <td colspan='2'></td>
               </tr>
               <tr>
               <td colspan="6" class="text-right"><strong class="total">Tax Total:</strong></td>
               <td class="text-right">
               <strong class="total"><span id="taxtotal">0</span></strong>
               
               </td>
               <td colspan='2'></td>
               </tr>
               <tr>
               <td colspan="6" class="text-right"><strong class="total">Discount:</strong></td>
               <td class="text-right">
               <strong class="total"><span id="discount">0</span></strong>
               
               </td>
               <td colspan='2'></td>
               </tr>
               
               <tr>
               <td colspan="6" class="text-right"><strong class="total">Total:</strong></td>
               
               <td class="text-right"><strong class="total"><span id="total_add">0</span></strong>
               </td>
               <td colspan='2'></td>
               </tr>
               </tfoot> -->
            <thead>
               <tr>
                  <th style='width:70px;text-align:center;font-size:12px;padding-top:10px'>S.NO	</th>
                  <th colspan='2' style='width:350px;text-align:center;font-size:12px;padding-top:10px;' valign='baseline'> DESCRIPTION</th>
                  <th style='width:100px;text-align:center;font-size:12px;padding-top:10px' valign='baseline'>QTY</th>
                  <th style='width:90px;text-align:center;font-size:12px;padding-top:10px' valign='baseline'> UNIT</th>
                  <th colspan='2' style='width:110px;text-align:center;font-size:12px;padding-top:10px' valign='baseline'>UNIT PRICE</th>
                  <th colspan='2' style='width:100px;text-align:center;font-size:12px;padding-top:10px' valign='baseline'>TOTAL</th>
               </tr>
            </thead>
            <tbody>
               <tr style='height:40px;border:1px solid black'>
                  <td  style='text-align:center;border-right:1px solid black'>1</td>
                  <td colspan='2' style='padding-left:7px;border-right:1px solid black'><strong>Supply of EXTINGUISHERS 6KG DCP</strong></td>
                  <td  style='text-align:center;border-right:1px solid black'>3.00</td>
                  <td  style='text-align:center;border-right:1px solid black'>No</td>
                  <td  style='text-align:center;border-right:1px solid black' colspan='2'>90.00</td>
                  <td  style='text-align:center;border-right:1px solid black'  >270.00</td>
               </tr>
               <tr style='height:40px;border:1px solid black'>
                  <td  style='text-align:center;border-right:1px solid black'>2</td>
                  <td colspan='2' style='padding-left:7px;border-right:1px solid black'><strong>Supply of MANUAL PULL STATION - EUROTECH - UK ADDRESSABLE</strong></td>
                  <td  style='text-align:center;border-right:1px solid black' >3.00</td>
                  <td  style='text-align:center;border-right:1px solid black'>No</td>
                  <td  style='text-align:center;border-right:1px solid black' colspan='2'>90.00</td>
                  <td  style='text-align:center;border-right:1px solid black'  colspan='2'>270.00</td>
               </tr>
               <tr style='height:40px;border:1px solid black'>
                  <td  style='text-align:center;border-right:1px solid black'>3</td>
                  <td colspan='2' style='padding-left:7px;border-right:1px solid black'><strong>Supply of SOUNDER - EUROTECH - UK ADDRESSABLE (IP 65 Open Area)</strong></td>
                  <td  style='text-align:center;border-right:1px solid black'>3.00</td>
                  <td  style='text-align:center;border-right:1px solid black'>No</td>
                  <td  style='text-align:center;border-right:1px solid black' colspan='2'>90.00</td>
                  <td  style='text-align:center;border-right:1px solid black'  colspan='2'>270.00</td>
               </tr>
            </tbody>
            <tfoot>
               <!-- <tr style='height:40px;border:1px solid black'>
                  <td  style='text-align:center;border-right:1px solid black'></td>
                  <td colspan='2' style='padding-left:7px;border-right:1px solid black'><strong></strong></td>
                  <td  style='text-align:center;border-right:1px solid black'></td>
                  <td  style='text-align:center;border-right:1px solid black'></td>
                  <td  style='text-align:center;border-right:1px solid black' colspan='2'></td>
                  <td  style='text-align:center;border-right:1px solid black'  colspan='2'></td>
                  </tr> -->
               <tr style='height:40px'>
                  <td colspan='7' align='right' style='padding-right:20px;border-right:1px solid black'>Total</td>
                  <td colspan='2' align='center'>870.00</td>
               </tr>
            </tfoot>
         </table>
         <table>
            <tr >
               <td colspan='6' style='padding-top:30px;'>
                  <p style='text-align:justify'><strong>Delivery Period:</strong><br>Ex-Stock Subject to prior sale </p>
               </td>
            </tr>
            <tr>
               <td>
                  <p style='text-align:justify'><strong>Completion:</strong><br>Immediate</p>
               </td>
            </tr>
            <tr>
               <td>
                  <p style='text-align:justify'><strong>Payment Terms:</strong><br>100% CDA/CASH Upon Delivery </p>
               </td>
            </tr>
            <tr>
               <td>
                  <p style='text-align:justify'><strong>Validity:</strong><br> Our offer is valid for your acceptance for a period of 30 days from the date of our offer</p>
               </td>
            </tr>
            <tr>
               <td>
                  <p style='text-align:justify'><strong>Exclusions:</strong><br>Delivery Transportation</p>
               </td>
            </tr>
            <tr >
               <td style='padding-top:30px'><strong>For<br>Dana World Cont. Co. WILL</strong></td>
            </tr>
            <tr style='height:30px'></tr>
            <tr>
               <td><strong>Mr.Mohammed Parvez<br>Sales & Estimation Manager<br>Mob: +974 31191694</strong></td>
            </tr>
            <tr style='height:30px'></tr> <tr style='height:30px'></tr> <tr style='height:30px'></tr>
         </table>
         <!--<h4>Adjustments</h4>
            <table class="table summary-table">
            <thead>
            <tr>
            <th>Consultant Name</th>
            <th>Start Date</th>
            <th>End Date</th>
            <th>Differential Hours</th>
            <th>Effective Bill Rate</th>
            <th>Amount</th>
            <th>Comments</th>
            </tr>
            </thead>
            <tbody>
            <tr class="simple">
            <th scope="row">John A Doe</th>
            <th>03 Jan 2017</th>
            <th>03 Sep 2017</th>
            <td>20.00</td>
            <td>$106</td>
            <td>$2100.00</td>
            <td width="150px" class="text-left ft-12">Reason – I have incorrectly entered the time in March and I now madcorrections
            </td>
            </tr>
            </tbody>
            </table>
            <div class="row">
            <div class="col-md-12">
              <div class="other-rates clearfix">
            <dl class="dl-horizontal total clearfix">
              <dt class="blue">Total</dt>
              <dd>$1234424</dd>
            </dl>
            </div>
            </div>
            </div>
            </div>-->
         <!-- <div class="row">
            <div class="col-md-12">
              <div class="clearfix">
            <dl class="dl-horizontal clearfix">
              <dt class="blue">Comments or Special Instructions</dt>
              <dd>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec rutrum a risus venenatis congue. Proin fringilla ligula id quam tincidunt imperdiet sit amet vitae mauris. Fusce sodales diam nec velit aliquet viverra. </dd>
            </dl>
            <dl class="dl-horizontal clearfix">
              <dt class="blue">Trade Term</dt>
              <dd>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec rutrum a risus venenatis congue. Proin fringilla ligula id quam tincidunt imperdiet sit amet vitae mauris. Fusce sodales diam nec velit aliquet viverra. </dd>
            </dl>
            <dl class="dl-horizontal clearfix">
              <dt class="blue">Delivery Term</dt>
              <dd>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec rutrum a risus venenatis congue. Proin fringilla ligula id quam tincidunt imperdiet sit amet vitae mauris. Fusce sodales diam nec velit aliquet viverra. </dd>
            </dl>
            <dl class="dl-horizontal clearfix">
              <dt class="blue">Payment Term</dt>
              <dd>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec rutrum a risus venenatis congue. Proin fringilla ligula id quam tincidunt imperdiet sit amet vitae mauris. Fusce sodales diam nec velit aliquet viverra. </dd>
            </dl>
            <dl class="dl-horizontal clearfix">
              <dt class="blue">Material Warranty</dt>
              <dd>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec rutrum a risus venenatis congue. Proin fringilla ligula id quam tincidunt imperdiet sit amet vitae mauris. Fusce sodales diam nec velit aliquet viverra. </dd>
            </dl>
            </div>
            </div>
            </div> -->
         <!-- Print section ends -->
      </div>
      <!-- /#wrapper -->
      <!-- jQuery -->
      <script src="plugins/bower_components/jquery/dist/jquery.min.js"></script>
      <script src="plugins/bower_components/datatables/jquery.dataTables.min.js"></script>
      <script>
    $(document).ready(function() {
	
		$('#myTable').DataTable({
			"lengthMenu": [ [25, 50, 100], [25, 50, 100] ],
			"processing": true,
			"displayLength": 25,
			"ajax":{
				url :"manage-quotation-data.php", 
				type: "post",  
				"data": function ( data ) {
					data.filter_key = $("#filter_key").val();
					data.filter_city = $("#filter_city").val();
					data.filter_state = $("#filter_state").val();
					data.total_project = $("#total_project").val();
				},
				complete: function() {
					console.log('complete');
					$('[data-toggle="tooltip"]').tooltip();
				},
				error: function(){ 
					$(".form-grid-error").html("");
					$("#form-grid").append('<tbody class="form-grid-error"><tr><th colspan="3">No data found in the server</th></tr></tbody>');
					$("#form-grid_processing").css("display","none");
				}
			}
		});
	})

	</script>
      <!-- Bootstrap Core JavaScript -->
      <script src="bootstrap/dist/js/tether.min.js"></script>
      <script src="bootstrap/dist/js/bootstrap.min.js"></script>
      <script src="plugins/bower_components/bootstrap-extension/js/bootstrap-extension.min.js"></script>
      <!-- Menu Plugin JavaScript -->
      <script src="plugins/bower_components/sidebar-nav/dist/sidebar-nav.min.js"></script>
      <!--slimscroll JavaScript -->
      <script src="js/jquery.slimscroll.js"></script>
      <!--Wave Effects -->
      <script src="js/waves.js"></script>
      <!-- Custom Theme JavaScript -->
      <script src="js/custom.min.js"></script>
      <!--select2-->
      <script src="plugins/bower_components/custom-select/custom-select.min.js" type="text/javascript"></script>
      <!--Style Switcher -->
      <script src="plugins/bower_components/styleswitcher/jQuery.style.switcher.js"></script>
      <!-- Sweet-Alert  -->
      <script src="plugins/bower_components/sweetalert/sweetalert.min.js"></script>
      <script src="plugins/bower_components/sweetalert/jquery.sweet-alert.custom.js"></script>
      <script src="plugins/bower_components/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>
      <script>
	  <?php 
		if($_COOKIE['err'] !='')
		{
			echo 'swal("'.$_COOKIE['status'].'", "'.$_COOKIE['title'].'", "'.$_COOKIE['err'].'");';
			setcookie('status', $_COOKIE['status'], time()-10);
			setcookie('title', $_COOKIE['title'], time()-10);
			setcookie('err', $_COOKIE['err'], time()-10);?>
			setTimeout(function() {
				$(".confirm").trigger('click');
		 	}, 3000);
			<?php 
		}
	?>
         // For select 2
             $(".select2").select2();
           //date Picker
             jQuery('.mydatepicker, #datepicker').datepicker('setDate', 'currentdate');
         
         jQuery('#datepicker-autoclose').datepicker({
             autoclose: true,
             todayHighlight: true
         });
         jQuery('#date-range').datepicker({
             toggleActive: true
         });
         jQuery('#datepicker-inline').datepicker({
             todayHighlight: true
         });
         
         
      </script>
      <script>
         function printDiv(divName){
         	var printContents = document.getElementById(divName).innerHTML;
         	var originalContents = document.body.innerHTML;
         	document.body.innerHTML = printContents;
         	window.print();
         	document.body.innerHTML = originalContents;
         }
      </script>
   </body>
</html>