<?php
require_once('inc/config.php');
require_once('inc/pdoconfig.php');
require_once('inc/pdoFunctions.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" type="image/png" sizes="16x16" href="plugins/images/dana-world-logo.png">
    <title>Manage Clients - Dana World Cont Co. Wll</title>
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
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
    <script src="https://www.w3schools.com/lib/w3data.js"></script>
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


<span class="head-title">Manage Clients</span>

</div>            

</div> 
                <div class="row j-details">
                    <div class="col-sm-12 p-t-8">
                        <div class="white-box">
                        <div class="col-sm-12">
                                 
                                 <a href="add-client.php" class="btn btn-danger pull-right m-l-20 btn-rounded btn-outline hidden-xs hidden-sm waves-effect waves-light add">Add New Client</a>
                                        
                                 </div>
                        <h3 class="box-title">Filter By</h3>
                        <div class="clearfix"></div>
                        <div class="row m-b-30">
                        
                        <div class="col-sm-3"> 
<div class="form-group">
    <label>Keyword Search</label>

        <input type="text" class="form-control" placeholder="Client Name, Contact Person, Phone, Mobile" onKeyUp="filter_data()" id="filter_key">


</div>
</div>
<div class="col-sm-3">
<label>City</label>    
<select class="form-control select2" onChange="filter_data()" id="filter_city">
<option value="">Select City</option>                                
<option value="AK">Abu Dhabi</option>
                                    <option value="HI">Dubai</option>
                                    <option value="HI">Sharjah</option>
                              
                                
                                
                                
                                
                            </select>   

</div> 
<div class="col-sm-3">
<label>State</label>    
<select class="form-control select2" onChange="filter_data()" id="filter_state">
                                	<option value="">Select State</option>
                                    <option value="AK">Abu Dhabi</option>
                                    <option value="HI">Dubai</option>
                                    <option value="HI">Sharjah</option>
                              
                                
                                
                                
                                
                            </select>   

</div> 
<div class="col-sm-3"> 
<div class="form-group">
    <label>Total No of Projects</label>

        <input type="text" class="form-control" id="total_project" placeholder="Total No of Projects" onKeyUp="filter_data()"> 


</div>
</div>
    </div>
                            
                      
                            <div class="table-responsive bx-shd">
                                <table id="myTable" class="table table-striped table-bordered act-adjust">
                                     <thead>
                                      <tr>
                                        <th>Client Name</th>
                                        <th>Email</th>
                                        <th>Phone Number</th>
                                        <th>Location</th>
                                        <th>Contact Person</th>
                                        <th>Phone Number</th>
                                        <th class="text-nowrap"  style="width:90px;text-align:center;">Action</th>  
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
    </div>
    <!-- /#wrapper -->
    <!-- jQuery -->
    <script src="plugins/bower_components/jquery/dist/jquery.min.js"></script>
	<script src="plugins/bower_components/datatables/jquery.dataTables.min.js"></script>
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
	
	$(document).ready(function() {
		 
		 $('#myTable').DataTable( {
			"lengthMenu": [ [25, 50, 100], [25, 50, 100] ],
			"processing": true,
			"displayLength": 25,
			"ajax":{
				url :"manage-clients-data.php", 
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
		} );
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
					data: 'id='+id+'&status='+status+'&meth=client-del',
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
	});
	function filter_data()
	{
		$('#myTable').DataTable().ajax.reload();
	}
    </script>
</body>

</html>
