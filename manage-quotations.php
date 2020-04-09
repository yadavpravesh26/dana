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
                              <input type="text" class="form-control" placeholder="Quotation NO" id="QuotNumber" onKeyUp="filter_data()">
                           </div>
                        </div>
                        <div class="col-sm-3">
                           <label>Created By</label>
                           <select class="form-control select2" id="QuotCreatedBy" onChange="filter_data()">
                              <option value="">Select User</option>
                              <?php if($_SESSION['group_id']==1){
							  	$all_users = $prop->getAll_Disp('select * from '.USERS.' WHERE is_delete = 0');
                                foreach($all_users as $rowUser)
                                {
									$id = $rowUser['id'];
									$name =$rowUser['f_name'];
									$sel='';
									if($id == $curr_val['estCreatedBy'])
									$sel='selected="selected"';
									echo '<option value="'.$id.'" '.$sel.'>'.$name.'</option>';
								}
							  }
							  else
							  {
							  	$user = $prop->get_Disp('select * from '.USERS.' WHERE is_delete = 0 AND id='.$User_Id);
								$f_name = $user['f_name'];
							  	echo '<option value="'.$User_Id.'">'.f_name.'</option>';
							  }
							  ?>
                           </select>
                        </div>
                        <div class="col-sm-3" id="QuotClient">
                           <label>Client</label>
                           <select class="form-control select2" onChange="filter_data()">
                           <option value="">Select Client</option>
                           <?php
                            $sql_client = 'select * from '.CLIENTS.' where status != 2';
						    $row_client=$prop->getAll_Disp($sql_client);
							for($IC=0; $i<count($row_client); $i++)
							{
								echo '<option value="'.$row_client[$IC]["id"].'">'.$row_client[$IC]["c_name"].'</option>';
							} 
						   ?>
                           </select>
                        </div>
                        <div class="col-sm-3" id="QuotProjects">
                           <label>Projects</label>
                           <select class="form-control select2" onChange="filter_data()">
                              <option value="">Select Project</option>
                              <option value="AK">Fine Traders</option>
                              <option value="HI">Good Work</option>
                              <option value="HI">Triumph</option>
                           </select>
                        </div>
                        <div class="col-sm-3" id="QuotType">
                           <label>Type of Quotation</label>
                           <select class="form-control select2" onChange="filter_data()">
                              <option value="">Select Type</option>
                              <option value="TradingQuotation">Trading Quotation</option>
                              <option value="HI">AMC Quotation</option>
                              <option value="HI">RetroFit Quotation</option>
                           </select>
                        </div>
                        <div class="col-sm-3">
                           <div class="form-group">
                              <label>Date</label>
                              <div class="input-group">
                                 <input type="text" class="form-control mydatepicker" placeholder="mm/dd/yyyy" id="QuotDate" onKeyUp="filter_data()">
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
     
      </div>
      <!-- /#print section -->
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
					data.QuotNumber = $("#QuotNumber").val();
					data.QuotCreatedBy = $("#QuotCreatedBy").val();
					data.QuotClient = $("#QuotClient").val();
					data.QuotProjects = $("#QuotProjects").val();
					data.QuotType = $("#QuotType").val();
					data.QuotDate = $("#QuotDate").val();
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
	function filter_data()
	{
		$('#myTable').DataTable().ajax.reload();
	}
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
             jQuery('.mydatepicker, #datepicker').datepicker();
         
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
         /*DELETE Start*/	
	$(document).on('click', '.deleteone', function() {
		var element = $(this);
		var id = element.attr("data-id");
		var status = 2;
		var ms = 'Delete'
		swal({
			title: ms,
			text: "Are you sure?",
			type: "warning",
			showCancelButton: true,
			confirmButtonColor: "#DD6B55",
			confirmButtonText: "Yes, Delete it!",
			cancelButtonText: "Cancel",
			closeOnConfirm: false,
			closeOnCancel: false
		}, function(isConfirm){
			if (isConfirm) {
				$.ajax({
					type: "POST",
					url: "ajax-status.php",
					cache:false,
					data: 'id='+id+'&status='+status+'&meth=quotation-del',
					dataType:'json',
					success: function(response)
					{
						swal(response.status, response.msg,response.err);
						if(response.result){
							$('#myTable').DataTable().ajax.reload();
						}
						setTimeout(function() {
							$(".confirm").trigger('click');
						}, 3000);
					}
				});
			}
			else
			{
				swal("Cancelled", "", "error");
			}
		});
	});/*DELETE END*/
         
      </script>
<script>
function printDiv(divName,id){
	status = call_html(id);
	if(status){ 
		setTimeout(function() {
			var printContents = document.getElementById(divName).innerHTML;
			var originalContents = document.body.innerHTML;
			document.body.innerHTML = printContents;
			window.print();
			document.body.innerHTML = originalContents;
		}, 3000);
		
	}
	else
	{
		swal('Error', 'Not able to print this Quotation','error');
	}	
}
function call_html(id)
{
	ret = 0;
	$.ajax({
			type: "POST",
			url: "ajax-status.php",
			cache:false,
			data: 'id='+id+'&meth=ajax_print',
			dataType:'json',
			success: function(response)
			{
				if(response.result){
					$('#printMe').html(response.msg);
					ret = 1;
				}
			}			
	});
	return ret;
}
</script>
   </body>
</html>