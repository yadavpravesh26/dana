<?php
require_once('inc/config.php');
require_once('inc/pdoconfig.php');
require_once('inc/pdoFunctions.php');

if(isset($_POST['btnSubmit']))
{
	$client_details   = array(
		'c_name'	=>$_POST['c_name'],
		'c_email'	=>$_POST['c_email'],
		'c_phone'	=>$_POST['c_phone'],
		'c_location'=>$_POST['c_location'],
		'c_address'	=>$_POST['c_address'],
		'c_city'	=>$_POST['c_city'],
		'c_state'	=>$_POST['c_state'],
		'c_country'	=>$_POST['c_country'],
		'c_zip'		=>$_POST['c_zip'],
		'p_contact_person'	=>$_POST['p_contact_person'],
		'p_email'	=>$_POST['p_email'],
		'p_phone'	=>$_POST['p_phone'],
		'p_mobile'	=>$_POST['p_mobile'],
		'site_contact_person'=>$_POST['site_contact_person'],
		'site_email'=>$_POST['site_email'],
		'site_phone'=>$_POST['site_phone'],
		'site_mobile'=>$_POST['site_mobile'],
		'account_contact_person'=>$_POST['account_contact_person'],
		'account_email'=>$_POST['account_email'],
		'account_phone'=>$_POST['account_phone'],
		'account_mobile'=>$_POST['account_mobile']
	);
	
	if(!isset($_REQUEST['id']))
	{
		$result = $prop->add(CLIENTS, $client_details);
		echo $result;
		print_r($client_details );
		if ($result) {
			print_r($client_details );
			setcookie('status', 'Success', time()+10);
			setcookie('title', 'Client Created Successfully', time()+10);
			setcookie('err', 'success', time()+10);
			header('Location: index.php');
		}
		else
		{
			setcookie('status', 'Error', time()+10);
			setcookie('title', 'Client Creation Faild', time()+10);
			setcookie('err', 'success', time()+10);
		}
	}
	else
	{
		$c_cond =  array("id" => $_REQUEST['id']);
		if($prop->update(CLIENTS, $client_details, $c_cond))
		{
			setcookie('status', 'Success', time()+10);
			setcookie('title', 'Client Updated Successfully', time()+10);
			setcookie('err', 'success', time()+10);
			header('Location: index.php');
		}
		else
		{
			setcookie('status', 'Error', time()+10);
			setcookie('title', 'Client Updation Faild', time()+10);
			setcookie('err', 'success', time()+10);
		}
	}
}
if(isset($_REQUEST['id']) && $_REQUEST['id']!=''){
	$titleTag = 'Edit';
	$curr_val = $prop->get('*',CLIENTS, array('id'=>$_REQUEST['id']));
	if(empty($curr_val)){
		header('Location: index.php');
		exit;
	}
	if($curr_val['status']===2){
		header('Location: index.php');
		exit;
	}
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
      <title>Add Client - Dana World Cont Co. Wll</title>
      <!-- Bootstrap Core CSS -->
      <link href="bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
      <link href="plugins/bower_components/bootstrap-extension/css/bootstrap-extension.css" rel="stylesheet">
      <!-- Menu CSS -->
      <link href="plugins/bower_components/sidebar-nav/dist/sidebar-nav.min.css" rel="stylesheet">
      <link href="plugins/bower_components/custom-select/custom-select.css" rel="stylesheet" type="text/css" />
      <link href="plugins/bower_components/sweetalert/sweetalert.css" rel="stylesheet" type="text/css">
      <!-- animation CSS -->
      <link href="css/animate.css" rel="stylesheet">
      <!-- Custom CSS -->
      <link href="css/style.css" rel="stylesheet">
      <link href="css/dan.css" rel="stylesheet">
      <!-- color CSS you can use different color css from css/colors folder -->
      <link href="css/colors/blue.css" id="theme" rel="stylesheet">
      <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
      <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
      <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
      <![endif]-->
      <script src="https://www.w3schools.com/lib/w3data.js"></script>
      <style>
      .tab-content{width:100%;}
      .customtab.nav-tabs .nav-link.active, .customtab.nav-tabs .nav-link.active:focus, .customtab.nav-tabs .nav-link:hover {
    border-bottom: 2px solid #213c59 !important;
    color: #213c59 !important;
}
.customtab.nav-tabs .nav-link {font-weight:600 !important;}
.customtab.nav-tabs .nav-link i {
    margin-right: 5px;
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
                     <span class="head-title">Add New Client</span>
                  </div>
               </div>
               <div class="clearfix"></div>
               <div class="row j-details">
                  <div class="col-sm-12">
                     <div class="white-box">
                        <!--Set one -->
                        <div class="row bx-shd">
                           
                           <ul class="nav nav-tabs customtab" role="tablist">
                              <li class="nav-item"> <a class="nav-link active" data-toggle="tab" href="#home2" role="tab"><span><i class="icon-home"></i></span> <span class="hidden-xs-down">Home</span></a> </li>
                              <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#profile2" role="tab"><span ><i class="icon-call-out"></i></span> <span class="hidden-xs-down">Procurement Contact</span></a> </li>
                              <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#messages2" role="tab"><span ><i class="icon-location-pin"></i></span> <span class="hidden-xs-down">Site Contact</span></a> </li>
                              <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#account" role="tab"><span ><i class="icon-briefcase"></i></span> <span class="hidden-xs-down">Accounts Contact</span></a> </li>
                              <!--<li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#project" role="tab"><span ><i class="icon-paper-plane"></i></span> <span class="hidden-xs-down">Projects</span></a> </li>-->
                           </ul>
                           <!-- Tab panes -->
                           <form method="post" id="formClient">
  
                           <div class="tab-content">
                              <div class="tab-pane active p-20" id="home2" role="tabpanel">
                                 <div class="row">
                                    <div class="col-sm-3">
                                       <div class="form-group">
                                          <label>Client Name</label>
                                          <input type="text" class="form-control" placeholder="Client Name" name="c_name" value="<?php echo $curr_val['c_name'];?>" required>
                                       </div>
                                    </div>
                                    <div class="col-sm-3">
                                       <div class="form-group">
                                          <label>Email </label>
                                          <input type="email" id="example-email" class="form-control" placeholder="Email" name="c_email" value="<?php echo $curr_val['c_email'];?>" required>
                                       </div>
                                    </div>
                                    <div class="col-sm-3">
                                       <div class="form-group">
                                          <label>Phone</label>
                                          <input type="number" placeholder="Phone" data-mask="(999) 999-9999" class="form-control" name="c_phone" value="<?php echo $curr_val['c_phone'];?>" required> 
                                       </div>
                                    </div>
                                    <div class="col-sm-3">
                                       <div class="form-group">
                                          <label>Location</label>
                                          <input type="text" class="form-control" placeholder="Location" value="<?php echo $curr_val['c_location'];?>" name="c_location" required> 
                                       </div>
                                    </div>
                                    <div class="col-sm-3">
                                       <div class="form-group">
                                          <label>Address</label>
                                          <input type="text" class="form-control" placeholder="Address" value="<?php echo $curr_val['c_address'];?>" name="c_address" required> 
                                       </div>
                                    </div>
                                    <div class="col-sm-3">
                                       <div class="form-group">
                                          <label>City</label>
                                          <select class="form-control select2" name="c_city" required>
                                          <option value="AK" >Doha</option>
                                          <option value="HI">Dukhan</option>
                                          <option value="HI">Ain Khaled</option>
                                       </select>
                                       </div>
                                    </div>
                                    <div class="col-sm-3">
                                       <div class="form-group">
                                          <label>State</label>
                                          <select class="form-control select2" name="c_state" required>
                                          <option value="AK">Doha</option>
                                          <option value="HI">Dukhan</option>
                                          <option value="HI">Ain Khaled</option>
                                       </select> 
                                       </div>
                                    </div>
                                    
                                    <div class="col-sm-3">
                                       <label>Country</label>    
                                       <select class="form-control select2" name="c_country" required>
                                          <option value="AK">United States America</option>
                                          <option value="HI">India</option>
                                          <option value="HI">London</option>
                                       </select>
                                    </div>
                                    <div class="col-sm-3">
                                       <div class="form-group">
                                          <label>Zip Code</label>
                                          <input type="text" class="form-control" placeholder="Zip Code" name="c_zip" value="<?php echo $curr_val['c_zip'];?>" required> 
                                       </div>
                                    </div>
                                 </div>
                              </div>
                              <div class="tab-pane  p-20" id="profile2" role="tabpanel">
                              <div class="row">
                              <div class="col-sm-3">
                                       <div class="form-group">
                                          <label>Contact Person Name</label>
                                          <input type="text" class="form-control" placeholder="Contact Person Name" name="p_contact_person" value="<?php echo $curr_val['p_contact_person'];?>" required>
                                       </div>
                                    </div>
                                    <div class="col-sm-3">
                                       <div class="form-group">
                                          <label>Email </label>
                                          <input type="email" id="example-email" class="form-control" placeholder="Email" name="p_email" value="<?php echo $curr_val['p_email'];?>" required>
                                       </div>
                                    </div>
                                    <div class="col-sm-3">
                                       <div class="form-group">
                                          <label>Phone</label>
                                          <input type="number" placeholder="Phone" data-mask="(999) 999-9999" class="form-control" placeholder="Phone" name="p_phone" value="<?php echo $curr_val['p_phone'];?>" required> 
                                       </div>
                                    </div>
                                    <div class="col-sm-3">
                                       <div class="form-group">
                                          <label>Mobile</label>
                                          <input type="number" placeholder="Phone" data-mask="(999) 999-9999" class="form-control" placeholder="Phone" name="p_mobile" value="<?php echo $curr_val['p_mobile'];?>"> 
                                       </div>
                                    </div>
                                    
                                 </div>
                              </div>
                              <div class="tab-pane p-20" id="messages2" role="tabpanel">
                              <div class="row">
                              <div class="col-sm-3">
                                       <div class="form-group">
                                          <label>Contact Person Name</label>
                                          <input type="text" class="form-control" placeholder="Contact Person Name" name="site_contact_person" value="<?php echo $curr_val['site_contact_person'];?>" required>
                                       </div>
                                    </div>
                                    <div class="col-sm-3">
                                       <div class="form-group">
                                          <label>Email </label>
                                          <input type="email" id="example-email" class="form-control" placeholder="Email" name="site_email" value="<?php echo $curr_val['site_email'];?>" required>
                                       </div>
                                    </div>
                                    <div class="col-sm-3">
                                       <div class="form-group">
                                          <label>Phone</label>
                                          <input type="number" placeholder="Phone" data-mask="(999) 999-9999" class="form-control" placeholder="Phone" name="site_phone" value="<?php echo $curr_val['site_phone'];?>" required> 
                                       </div>
                                    </div>
                                    <div class="col-sm-3">
                                       <div class="form-group">
                                          <label>Mobile</label>
                                          <input type="number" placeholder="Phone" data-mask="(999) 999-9999" class="form-control" placeholder="Phone" name="site_mobile" value="<?php echo $curr_val['site_mobile'];?>"> 
                                       </div>
                                    </div>
                                    
                                 </div>
                              </div>
                              <div class="tab-pane  p-20" id="account" role="tabpanel">
                              <div class="row">
                              <div class="col-sm-3">
                                       <div class="form-group">
                                          <label>Contact Person Name</label>
                                          <input type="text" class="form-control" placeholder="Contact Person Name" name="account_contact_person" value="<?php echo $curr_val['account_contact_person'];?>" required>
                                       </div>
                                    </div>
                                    <div class="col-sm-3">
                                       <div class="form-group">
                                          <label>Email </label>
                                          <input type="email" id="example-email" class="form-control" placeholder="Email" name="account_email" value="<?php echo $curr_val['account_email'];?>" required>
                                       </div>
                                    </div>
                                    <div class="col-sm-3">
                                       <div class="form-group">
                                          <label>Phone</label>
                                          <input type="number" placeholder="Phone" data-mask="(999) 999-9999" class="form-control" placeholder="Phone" name="account_phone" value="<?php echo $curr_val['account_phone'];?>" required> 
                                       </div>
                                    </div>
                                    <div class="col-sm-3">
                                       <div class="form-group">
                                          <label>Mobile</label>
                                          <input type="number" placeholder="Phone" data-mask="(999) 999-9999" class="form-control" placeholder="Phone" value="<?php echo $curr_val['account_mobile'];?>" name="account_mobile"> 
                                       </div>
                                    </div>
                                    
                                 </div>
                              </div>
                              <!--<div class="tab-pane p-20" id="project" role="tabpanel">
                              <div class="row">
                              <div class="col-sm-3">
                                       <div class="form-group">
                                          <label>Project Name</label>
                                          <input type="text" class="form-control" placeholder="Project Name">
                                       </div>
                                    </div>
                                    <div class="col-sm-3">
                                       <div class="form-group">
                                          <label>Contact Person </label>
                                          <input type="text" id="example-email" name="example-email" class="form-control" placeholder="Contact Person">
                                       </div>
                                    </div>
                                    <div class="col-sm-3">
                                       <div class="form-group">
                                          <label>Phone / Mobile No</label>
                                          <input type="tel" placeholder="Phone / Mobile No" data-mask="(999) 999-9999" class="form-control">
                                       </div>
                                    </div>
                                    <div class="col-sm-3">
                                       <div class="form-group">
                                          <label>Location</label>
                                          <input type="text"  data-mask="(999) 999-9999" class="form-control" placeholder="Location"> 
                                       </div>
                                    </div>
                                    <div class="col-sm-3">
                                       <div class="form-group">
                                          <label>Address</label>
                                          <input type="text"  data-mask="(999) 999-9999" class="form-control" placeholder="Address"> 
                                       </div>
                                    </div>
                                    <div class="col-sm-3">
                                       <label>City</label>    
                                       <select class="form-control select2">
                                          <option value="AK">United States America</option>
                                          <option value="HI">India</option>
                                          <option value="HI">London</option>
                                       </select>
                                    </div>
                                    <div class="col-sm-3">
                                       <label>State</label>    
                                       <select class="form-control select2">
                                          <option value="AK">United States America</option>
                                          <option value="HI">India</option>
                                          <option value="HI">London</option>
                                       </select>
                                    </div>
                                    <div class="col-sm-3">
                                       <div class="form-group">
                                          <label>Zip</label>
                                          <input type="tel"  data-mask="(999) 999-9999" class="form-control" placeholder="Zip"> 
                                       </div>
                                    </div>
                                    
                                    <div class="col-sm-12 text-right m-t-20">
                              <button type="submit" class="btn btn-success waves-effect waves-light m-r-10">Add</button>
                              <button type="submit" class="btn btn-inverse waves-effect waves-light">Reset</button>
                           </div>

                           <div class="table-responsive bx-shd m-t-20">
                           <div class="col-sm-12 ">
                              <h3 class="box-title">Project List</h3>
                           </div>
                                <table id="myTable" class="table table-striped table-bordered act-adjust">
                                     <thead>
                      <tr>
                        <th>Project Name</th>
                        <th>Contact Person</th>
                        <th>Phone / Mobile No</th>
                        <th>Location</th>
                        <th class="text-nowrap"  style="width:90px;text-align:center;">Action</th>  
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td>DANA WORLD CONT., CO</td>
                        <td>Martin</td>
                        <td>0123456789</td>
                        <td>Doha</td>
                           <td class="text-nowrap text-center">
                                                <a href="add-client.php" data-toggle="tooltip" data-original-title="Edit"> <span class="label-edit"><i class="ti-pencil"></i></span> </a>
                                                <a href="#" data-toggle="tooltip" data-original-title="Delete"> <span class="label-delete own-alert" alt="alert" class="img-responsive model_img"><i class="ti-trash"></i></span> </a>
                                            </td>
                      </tr>
                      <tr>
                        <td>LUCKY STAR ALLOY</td>
                        <td>Lucy</td>
                        <td>0123456789</td>
                        <td>Doha</td>
                           <td class="text-nowrap text-center">
                                                <a href="add-client.php" data-toggle="tooltip" data-original-title="Edit"> <span class="label-edit"><i class="ti-pencil"></i></span> </a>
                                                <a href="#" data-toggle="tooltip" data-original-title="Delete"> <span class="label-delete own-alert" alt="alert" class="img-responsive model_img"><i class="ti-trash"></i></span> </a>
                                            </td>
                      </tr>
                      <tr>
                        <td>BHARATH RESTURANT</td>
                        <td>BHARATH</td>
                        <td>0123456789</td>
                        <td>Doha</td>
                           <td class="text-nowrap text-center">
                                                 <a href="add-client.php" data-toggle="tooltip" data-original-title="Edit"> <span class="label-edit"><i class="ti-pencil"></i></span> </a>
                                                <a href="#" data-toggle="tooltip" data-original-title="Delete"> <span class="label-delete own-alert" alt="alert" class="img-responsive model_img"><i class="ti-trash"></i></span> </a>
                                            </td>
                      </tr>
                        
                        
                    </tbody>
                                </table>
                            </div>


                                 </div>
                              </div>-->
                              <div class="col-sm-12 text-right m-t-20">
                              <button type="submit" class="btn btn-success waves-effect waves-light m-r-10" name="btnSubmit">Submit</button>
                              <button type="submit" class="btn btn-inverse waves-effect waves-light">Cancel</button>
                           </div>
                           </div>
                           </form>
                        </div>
                        <!--end-->                            
                        
                     </div>
                  </div>
               </div>
               <div class="clearfix"></div>
               <!-- .right-sidebar -->
               <!-- /.right-sidebar -->
            </div>
            <!-- /.container-fluid -->
            <!-- <footer class="footer text-center">  </footer> -->
         </div>
         <!-- /#page-wrapper -->
      </div>
      <!-- /#wrapper -->
      <!-- jQuery -->
      <script src="plugins/bower_components/jquery/dist/jquery.min.js"></script>
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
      <script src="js/validator.js"></script>	
      <script src="https://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js"></script>
      <script>
         // For select 2
             $(".select2").select2();
	<?php 
		if($_COOKIE['err'] !='')
		{
			echo 'swal("'.$_COOKIE['status'].'", "'.$_COOKIE['title'].'", "'.$_COOKIE['err'].'");';
			setcookie('status', $_COOKIE['status'], time()-10);
			setcookie('title', $_COOKIE['title'], time()-10);
			setcookie('err', $_COOKIE['err'], time()-10);
		}
	?>
	$(document).ready(function() {
		$('#formClient').validate({
			ignore: ".ignore",
			invalidHandler: function(e, validator){
				if(validator.errorList.length)
				$('#tabs a[href="#' + jQuery(validator.errorList[0].element).closest(".tab-pane").attr('id') + '"]').tab('show')
			}
		});
	});	
      </script>
   </body>
</html>