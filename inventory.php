<?php
session_start(); 
error_reporting(-1);
require_once('inc/config.php');
require_once('inc/pdoconfig.php');
require_once('inc/pdoFunctions.php');
$User_Id = $_SESSION['user_id'];
$User_Group = $_SESSION['group_id'];
if(empty($User_Id)){
  header("Location: ".DANA_PATH.'login.php'); 
  exit; 
}
$id_1=$_REQUEST['id'];
$id_fetch = $prop->get_Disp('SELECT * FROM '.INVENTORY_TABLE.' ORDER BY id DESC');
$id = $id_fetch['p_id'];
if($id==''){
  $i=0;
}else{
  $i=$id;
}
$val_fetch = $prop->get_Disp("SELECT A.*,GROUP_CONCAT(B.name ORDER BY B.id) as name FROM ".INVENTORY_TABLE." as A INNER JOIN ".VENDOR_TABLE." AS B ON FIND_IN_SET(B.id, A.vendor) > 0 WHERE A.is_delete = 0 AND A.id=".$id_1." GROUP   BY A.id");
$p_id=$val_fetch['p_id'];
$p_name=$val_fetch['p_name'];
$p_des=$val_fetch['p_des'];
$c_price=$val_fetch['c_price'];
$s_price=$val_fetch['s_price'];
$unit=$val_fetch['unit'];
$total=$val_fetch['total'];
$vendor=$val_fetch['name'];
$ven=$val_fetch['vendor'];
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
      <title>Inventory - Dana World Cont Co. Wll</title>
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
      <!-- color CSS you can use different color css from css/colors folder -->
      <link href="css/colors/blue.css" id="theme" rel="stylesheet">
      <link href="plugins/bower_components/sweetalert/sweetalert.css" rel="stylesheet" type="text/css">
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
          #inv_tbl_filter{
            float: right !important;
            margin-top: -22px !important;
          }
          #inv_tbl_wrapper{
                border: 1px solid #fff !important;
              padding: 25px !important;
          }
          #inv_tbl_length{
              margin-bottom: -11px !important;
              margin-top: 15px !important;
              width: 50% !important;
          }
          .buttons-csv{
              float: right !important;
              margin-top: -64px !important;
              box-shadow: 1px 2px 10px #dedede75;
              background-color: #dedede75 !important;
              border-color: #fff !important;
              color: #808080 !important;
          }
          .buttons-csv:hover{
            background-color: #e7e7e7 !important;
            border-color: #e7e7e7 !important;
            color: #333 !important;
          }
          #s2id_act{
              width: 28% !important;
              margin-bottom: 0.7% !important;
              margin-left: 20px !important;
              margin-top: 8px !important;
              box-shadow: 1px 2px 10px #dedede75 !important;
              border-color: #dedede75 !important;
              padding: 10px 10px 20px !important;
              border-radius: 10px !important;
              border: 1px solid #e9e9e969 !important;
          }
          #inv_tbl_paginate{
              float: right !important;
              margin-top: -43px !important;
          }
          #tot{
            width: 124px !important;
          }
          #tot-item{
            width: 108px !important;
          }
          #tot-error{
            margin-right: -64% !important;
            margin-left: 3% !important;
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
                <span class="head-title">Inventory</span>
              </div>
            </div>
            <div class="clearfix"></div>
            <div class="row j-details">
              <div class="col-sm-12">
                <div class="white-box">
                  <!--Set one -->
                  <div class="row bx-shd">
                    <ul class="nav nav-tabs customtab" role="tablist">
                      <li class="nav-item"> <a class="nav-link active" data-toggle="tab" href="#project" role="tab"><span><i class="icon-home"></i></span> <span class="hidden-xs-down">Add Products</span></a> </li>
                    </ul>
                    <!-- Tab panes -->
                    <div class="tab-content">
                      <div class="tab-pane p-20" id="home2" role="tabpanel">
                      </div>
                      <div class="tab-pane  p-20" id="profile2" role="tabpanel">
                      </div>
                      <div class="tab-pane  p-20" id="account" role="tabpanel">
                      </div>
                      <div class="tab-pane active p-20" id="project" role="tabpanel">
                        <form id="inv_tab" enctype="multipart/form-data" action=""  method="post" >
                          <div class="row bx-shd m-t-10">
                            <div class="col-sm-3">
                              <label>Choose Vendor</label>
                              <select class=" select2" name="stat[]" id="stat" multiple value="<?php echo $ven?>">
                                 
                                <?php
                                $query_1 = $prop->getAll_Disp('select * from '.VENDOR_TABLE.' WHERE is_delete = 0  AND id In('.$ven.')');
                                foreach($query_1 as $row)
                                {
                                   $id = $row['id'];
                                  $name =$row['name'];
                                 echo "<option value=".$id." selected=selected>".$name."</option>";
                               }
                                if($id_1!=''){
                                  $query = $prop->getAll_Disp('select * from '.VENDOR_TABLE.' WHERE is_delete = 0 AND id NOT In('.$ven.')');

                                }else{
                                  $query = $prop->getAll_Disp('select * from '.VENDOR_TABLE.' WHERE is_delete = 0');
                                }
                                foreach($query as $row)
                                {
                                  $id = $row['id'];
                                  $name =$row['name'];
                                 
                                  echo "<option value=".$id.">".$name."</option>";
                                }
                              ?>
                              </select>
                            </div>
                            <div class="col-sm-3">
                              <div class="form-group">
                                <label>PID</label>
                                <input type="text" class="form-control" placeholder="SKU" name="p_id" value="<?php echo $p_id?$p_id:($i+1)?>" readonly>
                              </div>
                            </div>
                            <div class="col-sm-3">
                              <div class="form-group">
                                <label>Unit</label>
                                <input type="text" class="form-control" placeholder="Unit" name="unit" id="unit" value="<?php echo $unit?>">
                              </div>
                            </div>
                            <div class="col-sm-3">
                              <div class="form-group">
                                <label>Product Name</label>
                                <input type="hidden" class="form-control id_ft" placeholder="id" id="<?php echo $id_1?>" name="id_val" value="<?php echo $id_1?>">
                                <input type="text" class="form-control" placeholder="Product Name" name="p_name" id="p_name" value="<?php echo $p_name?>">
                              </div>
                            </div>
                            <div class="col-sm-3">
                              <div class="form-group">
                                <label>Product Description</label>
                                <textarea placeholder="Product Description" rows="6" class="form-control" id="p_desc" name="p_desc" value="<?php echo $p_des;?>"><?php echo $p_des;?></textarea>
                              </div>
                            </div>
                            <div class="col-sm-3 m-40">
                              <div class="form-group">
                                <label>Cost Price</label>
                                <input type="text" class="form-control" placeholder="Cost Price" name="c_price" id="c_price" value="<?php echo $c_price;?>">
                              </div>
                            </div>
                            <div class="col-sm-3 m-40">
                              <div class="form-group">
                                <label>Selling Price</label>
                                <input type="text" class="form-control" placeholder="Selling Price" name="s_price" id="s_price" value="<?php echo $s_price;?>">
                              </div>
                            </div>
                            <!-- items in stock -->
                            <div class="clearfix"></div>
                            <div class="col-sm-12"><label>Warehouse - Items in Stock</label></div>
                            
                              <?php
                              $log = $prop->getAll_Disp('SELECT * FROM whouse_details WHERE is_delete = 0');
                               foreach ($log as $ware) {
                               $name = $ware['name'];
                               $id = $ware['id'];
                               echo '<div class="col-sm-3">';
                               echo '<div class="input-group mb-3">';
                                echo '<div class="input-group-prepend">';
                                  echo '<span class="input-group-text">'.$name.'</span>';
                                echo '</div>';
                                echo '<input type="text" class="form-control stock_val" placeholder="2000" name='.$id.' id='.$id.'>';
                              echo '</div>';
                            echo '</div>';
                            echo '<div class="clearfix"></div>';
                             }
                              ?>
                            
                            <!-- items in stocks -->
                            <div class="col-sm-12 text-right m-t-20">
                              <button type="submit" id="save1" value="Add" class="btn btn-success waves-effect waves-light m-r-10">Add</button>
                              <button type="submit" class="btn btn-inverse waves-effect waves-light" id="can">Reset</button>
                            </div>
                            <div class='row px-2'>
                              <div class="col-sm-12"><label>Total Items in Stock</label></div>
                            </div>
                            <div class="row px-2">
                              <div class="col-sm-3">
                                <div class="input-group mb-3">
                                  <div class="input-group-prepend">
                                    <span class="input-group-text" id="tot-item">Total Items in Stock</span>
                                  </div><div class="clearfix"></div>
                                  <input type="text" class="form-control"  id="tot" name="tot" value="<?php echo $total;?>">
                                  <div class="clearfix"></div>
                                </div>
                              </div>
                              <section class="col-sm-12 m-t-30">
                                <div class="col-sm-12 ">
                                  <h3 class="box-title">Products List</h3>
                                </div>
                                <div class="table-responsive bx-shd">
                                  <table id="inv_tbl" class="table table-striped table-bordered act-adjust">
                                    <div class="col-md-5">
                                      <select id="act" name="act" class="form-control select2" >
                                        <option data-type='Active'  value='0'>Vendorlist</option>
                                        <?php
                                          $query = $prop->getAll_Disp('select * from '.VENDOR_TABLE.' WHERE is_delete = 0');
                                          foreach($query as $row)
                                          {
                                            $id = $row['id'];
                                            $name =$row['name'];
                                            echo "<option value=".$id.">".$name."</option>";
                                          }
                                        ?>
                                      </select>
                                    </div>
                                    <div class="clearfix"></div>
                                    <thead>
                                      <th>PID</th>
                                      <th>Unit</th>
                                      <th>Product Name</th>
                                      <th style="width:300px">Product Description</th>
                                      <th>Cost Price (QR)</th>
                                      <th>Selling Price (QR)</th>
                                     <!--  <th>Tax %</th> -->
                                      <th>Total Items in Stock</th>
                                      <th>Vendor</th>
                                      <th>Action</th>
                                    </thead>
                                    <tbody></tbody>
                                  </table>
                                </div>
                              </section>
                            </div>
                          </div>
                        </form>
                      </div>
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
          -<!-- /#page-wrapper -->
        </div>
        <!-- /#wrapper -->
        <!-- jQuery -->
        <script src="plugins/bower_components/jquery/dist/jquery.min.js"></script>
        <script src="js/j-jquery.dataTables.min.js"></script>
        <script src="js/j-dataTables.bootstrap.min.js"></script>
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
        <script src="js/dataTables.buttons.min.js"></script>
        <script src="js/buttons.flash.min.js"></script>
        <script src="js/jszip.min.js"></script>
        <script src="js/pdfmake.min.js"></script>
        <script src="js/vfs_fonts.js"></script>
        <script src="js/buttons.html5.min.js"></script>
        <script src="js/buttons.print.min.js"></script>
        <script src="plugins/bower_components/sweetalert/sweetalert.min.js"></script>
        <script src="plugins/bower_components/sweetalert/jquery.sweet-alert.custom.js"></script>
        <script src="js/j-jquery.validate.min.js"></script>

        <script>
             $(".select2").select2({
                   placeholder: "Select Vendor"
                });

      </script>
      <script type="text/javascript">
              var t;
              t=$( '#inv_tbl' ).DataTable({
                    dom: 'Blfrtip',
                    buttons: [ {"extend": 'csv', "text":'CSV Export',"className": 'btn btn-primary'}],
                    "aLengthMenu": [[25, 50, 75, -1], [25, 50, 75, "All"]],
                    "iDisplayLength": 25,
                    aoColumnDefs: [
                                  { "aTargets": [ 0 ],"asSorting": [ "asc" ], "bSortable": true },
                                  { "aTargets": [ 1 ], "bSortable": false },
                                  { "aTargets": [ 2 ], "bSortable": false },
                                  { "aTargets": [ 3 ], "bSortable": false },
                                  { "aTargets": [ 4 ], "bSortable": false },
                                  { "aTargets": [ 5 ], "bSortable": false },
                                  { "aTargets": [ 6 ], "bSortable": false },
                                  { "aTargets": [ 7 ], "bSortable": false },
                                  { "aTargets": [ 8 ], "bSortable": false }
                              ],
                    "ajax":{
                                  url:"inv_func.php",
                                  type: "POST",
                                  "data": function (data) {
                                     data.act = $("#act").val();
                                    }
                                  }
                });
                $('#key_word').change(function(){
                                  t.ajax.reload(); 
                                });
                $('#city_opt').change(function(){
                                  t.ajax.reload(); 
                                });
                $('#state_opt').change(function(){
                                  t.ajax.reload(); 
                                });
                $('#act').change(function(){
                      t.ajax.reload(); 
                    });
                $(document).on('click', '.edit_1', function() {
                    var id = $(this).attr("id");
                    location.assign("inventory.php?id="+id);  

                });
            </script>
            <script type="text/javascript">
                $(document).ready(function() {
                    var id = $(".id_ft").attr("id");
                    if(id!=''){
                        $("#save1").prop("value", "Update");
                          $("#save1").html('Update');
                    }else{
                        $("#save1").prop("value", "Add");
                          $("#save1").html('Add');
                    }
                });
            </script>
            <script type="text/javascript">
              $(document).on("submit","#inv_tab",function(e) {
                var sub_val = $('#save1').val();
                  if(sub_val=='Add'){
                    $("#save1").prop("value", "Processing");
                    $("#save1").html('Processing');
                    e.preventDefault();
                    var fdata = new FormData(this);
                     $.ajax({
                           type: "POST",
                           url: 'invt_funct.php',
                           data: fdata,
                            dataType:'json',
                            success: function(data) {
                                 if(data.status=="success"){
                                            swal("Success", "Inventory Added Sucessfully", "success");
                                             window.setTimeout(function(){ window.location.href = "inventory.php"; } ,3000);
                                        }
                                // else if(data.status=="success1"){
                                //             swal("Success", "Inventory Updated Sucessfully", "success");
                                //              window.setTimeout(function(){ window.location.href = "inventory.php" } ,3000);
                                //         }
                            },
                           cache: false,
                           contentType: false,
                           processData: false
                       });  
                  } else if(sub_val=='Update'){
                    $("#save1").prop("value", "Processing");
                    $("#save1").html('Processing');
                    e.preventDefault();
                    var fdata = new FormData(this);
                     $.ajax({
                           type: "POST",
                           url: 'invt_funct.php',
                           data: fdata,
                            dataType:'json',
                            success: function(data) {
                                if(data.status=="success1"){
                                            swal("Success", "Inventory Updated Sucessfully", "success");
                                             window.setTimeout(function(){ window.location.href = "inventory.php" } ,3000);
                                        }
                            },
                           cache: false,
                           contentType: false,
                           processData: false
                       });
                  }
                  else{
                      $("#save1").attr("disabled", true);
                  }
                         
                });
            </script>
            <script type="text/javascript">
              $(document).on("change",".stock_val",function(){
                var test_asd=0;
                $(".stock_val").each(function(){
                    test_asd += Number($(this).val());
                });
                $("#tot").prop("value", test_asd);
                $("#save").html(test_asd);
            });
            </script>
             <script type="text/javascript">
        $(function() {
            $("#inv_tab").validate({
              debug: false,
              errorClass: "authError",
              errorElement: "span",
                rules: {
                    p_name: "required",
                    p_desc: "required",
                    c_price: "required",
                    s_price: "required",
                    tot: "required",
                    stat: "required",
                    unit: "required",
                },
                    messages: {
                        p_name: "Please enter  Product Name",
                        p_desc: "Please enter  Product Description",
                        c_price: "Please enter  Cost Price",
                        s_price: "Please enter  Selling Price",
                        tot: "Please enter Stock Details in <b>Warehouse - Items in Stock</b>",
                        stat: "Please Select Vendor",
                        unit: "Please Enter Unit"
                    }
            });
        });
    </script>
    <script>
            $(document).on("click",".delete",function(){
            var id = $(this).attr("id");
            swal({
                title: "Are you sure?",
                text: "Do you want to delete Inventory Details!",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: '#DD6B55',
                confirmButtonText: 'Yes, delete it',
                cancelButtonText: "No, Please cancel",
                closeOnConfirm: false,
                closeOnCancel: false
            },
            function(isConfirm){
                if (isConfirm){
                    $.ajax({
                        url:'vend_del.php',
                        method:'post',
                        data: {
                          id_1:id,
                          method:"val_del1"
                        },
                        dataType:"json",
                        success:function(data){
                           if(data.status=="success"){
                            swal("Deleted!", "Inventory Details has been deleted!", "success");
                             window.setTimeout(function(){ location.reload(); } ,3000);
                        }
                        }
                    });
                    
                } else {
                    swal("Cancelled", "Cancelled", "error");
                    window.setTimeout(function(){ location.reload(); } ,3000);
                }
            });
            

        });
    </script>
    <script>
    $('#can').click(function(){ 
        $('#inv_tab #stat').val('');
        $('#inv_tab #unit').val('');
        $('#inv_tab #p_name').val('');
        $('#inv_tab #p_desc').val('');
        $('#inv_tab #c_price').val('');
        $('#inv_tab #s_price').val('');
        $('#inv_tab .stockval').val('');
        $('#inv_tab #tot').val('');
    });
</script>
    </body>
</html>

