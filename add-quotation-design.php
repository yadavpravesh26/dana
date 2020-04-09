<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta name="description" content="">
      <meta name="author" content="">
      <link rel="icon" type="image/png" sizes="16x16" href="plugins/images/dana-world-logo.png">
      <title>Add Quotations - Dana World Cont Co. Wll</title>
      <!-- Bootstrap Core CSS -->
      <link href="bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
      <link href="plugins/bower_components/bootstrap-extension/css/bootstrap-extension.css" rel="stylesheet">
      <!-- Menu CSS -->
      <link href="plugins/bower_components/sidebar-nav/dist/sidebar-nav.min.css" rel="stylesheet">
      <link href="plugins/bower_components/custom-select/custom-select.css" rel="stylesheet" type="text/css" />
      <link rel="stylesheet" href="plugins/bower_components/html5-editor/bootstrap-wysihtml5.css" />
      <!-- animation CSS -->
      <link href="css/animate.css" rel="stylesheet">
      <!-- Custom CSS -->
      <link href="css/style.css" rel="stylesheet">
      <link href="css/dan.css" rel="stylesheet">
      <link href="plugins/bower_components/datatables/jquery.dataTables.min.css" rel="stylesheet" type="text/css"/>
      <link href="https://cdn.datatables.net/buttons/1.2.2/css/buttons.dataTables.min.css" rel="stylesheet" type="text/css"/>
      <!-- color CSS you can use different color css from css/colors folder -->
      <link href="css/colors/blue.css" id="theme" rel="stylesheet">
      <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
      <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
      <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
      <![endif]-->
      <script src="http://www.w3schools.com/lib/w3data.js"></script>
      <style>
         strong.total {
         font-size: 15px;
         font-weight: 600;
         }
         textarea.deff {
         border: 1px solid #213c5940;
         border-radius: 10px;
         min-height: 100px;
         padding: 15px 15px;
         font-weight: 400;
         font-size: 13px;
         color: #333;
         }
         button.add-new.btn.btn-info {
         border-radius: 40px !important;
         font-weight: 300;
         border-radius: 50% !IMPORTANT;
         height: 30px;
         width: 30px;
         display: flex;
         align-items: center;
         justify-content: center;
         padding: 0;
         font-size: 23px;
         background: transparent;
         color: #2297dc;
         margin: auto;
         border: none;
         box-shadow: none;
         }
         button.remove-row.btn.btn-info {
         border-radius: 40px !important;
         font-weight: 300;
         border-radius: 50% !IMPORTANT;
         height: 30px;
         width: 30px;
         display: flex;
         align-items: center;
         justify-content: center;
         padding: 0;
         font-size: 23px;
         background: transparent;
         color: #e41111;
         margin: auto;
         border: none;
         box-shadow: none;
         }
         .bx-shd {
         box-shadow: 1px 2px 10px #dedede75;
         padding: 20px 15px 20px;
         border-radius: 10px;
         border: 1px solid #e9e9e969;
         }
         ul.wysihtml5-toolbar a.btn {
         box-shadow: none;
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
               <span class="head-title">Add Quotations</span>
            </div>
         </div>
         <div class="clearfix"></div>
         <div class="row j-details">
            <div class="col-sm-12">
               <div class="white-box">
                  <!--Set one -->
                  <div class="row bx-shd">
                     <div class="row">
                        <div class="col-sm-3">
                           <div class="form-group">
                              <label>Quotation Number</label>
                              <input type="text" class="form-control" placeholder="Quotation Number" value='331456' readonly>
                           </div>
                        </div>
                        <div class="col-sm-3">
                           <div class="form-group">
                              <label>Quotation Created Date</label>
                              <input type="text" class="form-control" placeholder="Quotation Created Date">
                           </div>
                        </div>
                        <div class="col-sm-3">
                           <div class="form-group">
                              <label>Quotation Created By</label>
                              <select class="form-control select2">
                                 <option value="AK">New Project</option>
                              </select>
                           </div>
                        </div>
                        <div class="col-sm-3">
                           <label>Type of Quotation</label>
                           <select class="form-control select2" onchange='selectOption(this)' >                      
                              <option value="trading">Trading Quotation</option>
                              <option onclick='()=>{alert("jsfhbsaifb")}' value="AMC">AMC Quotation</option>
                              <option value="AK">RetroFit Quotation</option>
                           </select>
                        </div>
                        <div class="col-sm-3">
                           <label>Choose Client Name</label>
                           <select class="form-control select2">
                              <option value="AK">Bharath Resturant</option>
                           </select>
                        </div>
                        <div class="col-sm-3">
                           <label>Project Name</label>
                           <input type="text" class="form-control" placeholder="Project Name">
                        </div>
                        <div class="col-sm-3">
                           <div class="form-group">
                              <label>Kind Attn To</label>
                              <input type="text" class="form-control" placeholder="Kind Attn To">
                           </div>
                        </div>
                        <div class="col-sm-12 p-0 m-t-30">
                           <label>Subject of Quotation</label>
                           <form method="post">
                              <div class="form-group">
                                 <textarea class="textarea_editor6 form-control" rows="3" placeholder="Enter text ..."></textarea>
                              </div>
                           </form>
                        </div>
                        <!--end-->
                        <div class="col-sm-12 m-t-30">
                        <div class="col-sm-3 p-0 m-b-20 pull-left">
                           <label>BOQ Name</label>
                           <input type="text" class="form-control" placeholder="Enter BOQ Name">
                        </div>
                        <div class="col-sm-3 p-0 m-b-20 pull-right text-right">
                        <label class="wid-100">&nbsp;</label>
                           <button type="button" class="btn btn-info">Add New BOQ</button>
                        </div>
                           <!-- <table id="productTable" class="table table-hover table-bordered" style="width:100%;">
                              <thead>
                                 <tr>
                                    <th style="width:150px">PID</th>
                                    <th style="width:200px">Product Name</th>
                                    <th style="width:300px">Product Description</th>
                                    <th>Unit</th>
                                    <th>QTY</th>
                                    <th style="width:120px">Unit Price (QR)</th> -->
                                    <!-- <th>Tax %</th> -->
                                    <!-- <th>Total</th>
                                    <th colspan='2'>Action</th>
                                 </tr>
                              </thead>
                              <tbody id="mainBody">
                              </tbody>
                              <tfoot>
                                 <tr>
                                    <td colspan="6" class="text-right"><strong class="total">Total:</strong></td>
                                    <td class="text-right">
                                       <strong class="total"><span id="amt_add">0</span></strong>
                                    </td>
                                    <td colspan='2'></td>
                                 </tr> -->
                                 <!-- <tr>
                                    <td colspan="7" class="text-right"><strong class="total">Tax Total:</strong></td>
                                    <td class="text-right"><strong class="total"><span id="tax_add">0</span></strong>
                                    </td>
                                    <td></td>
                                 </tr> --> 
                                 <!-- <tr>
                                    <td colspan="6" class="text-right"><strong class="total">Discount:</strong></td>
                                    <td class="text-right"><strong class="total"><span id="discount">0</span></strong>
                                    </td>
                                    <td  colspan='2'></td>
                                 </tr>
                                 <tr>
                                    <td colspan="6" class="text-right"><strong class="total">Grand Total:</strong></td>
                                    <td class="text-right"><strong class="total"><span id="total_add">0</span></strong>
                                    </td>
                                    <td colspan='2'></td>
                                 </tr>
                              </tfoot>
                           </table>  -->

           
                   <div id='table1'>
                   <?php include("table1.php"); ?>
                   </div>
                   <div id='table2'>
                   <?php include("table2.php"); ?>
                   </div>      
          
                      



                          
                   
                     <!-- <table id="anotherTable" class="table table-hover table-bordered" style="width:100%;">
                                    <thead>
                                       <tr  style='text-align:center'>
                                          <th style="width:150px">SL.No</th>
                                          <th style="width:400px">Description</th>
                                          <th style="width:200px">Days</th>
                                          <th style="width:330px">Unit Price</th>
                                          <th colspan='3'>Total</th>
                                          <th>Action</th>
                                       </tr>
                                    </thead>
                                    <tbody id="importantBody">
                                    </tbody>
                                    <tfoot>
                                       <tr>
                                          <td colspan="4" class="text-right"><strong class="total">Total:</strong></td>
                                          <td class="text-right">
                                             <strong class="total"><span id="amt_add1">0</span></strong>
                                          </td>
                                          <td colspan='3'></td>
                                       </tr>
                                       <tr>
                                          <td colspan="4" class="text-right"><strong class="total">Discount:</strong></td>
                                          <td class="text-right"><strong class="total"><span id="discount1">0</span></strong>
                                          </td>
                                          <td colspan='3'></td>
                                       </tr>
                                       <tr>
                                          <td colspan="4" class="text-right"><strong class="total">Grand Total:</strong></td>
                                          <td class="text-right"><strong class="total"><span id="sum_add">0</span></strong>
                                          </td>
                                          <td colspan='3'></td>
                                       </tr>
                                       <tr>
                                          <td colspan="4" class="text-right"><strong class="total"><span>Price for Yearly PPM</span></strong></td>
                                    
                                          <td class="text-right"><strong class="total"><span id="yearly">0</span></strong>
                                          </td>
                                  
                                          <td colspan='3'></td>
                                       </tr>
                                       <tr>
                                          <td colspan="4" class="text-right"><strong class="total"><span>Price for Quaterly PPM</span></strong></td>
                                       
                                          <td class="text-right"><strong class="total"><span id="quaterly">0</span></strong>
                                          </td>
                                          <td colspan='3'></td>
                                          
                                       </tr>
                                       <tr></tr>
                                       <tr>
                                          <td colspan='3'></td>
                                          <td class='text-center'>
                                             <select name="selectProduct" id="productOption" class="form-control select2 ">
                                                <option value="1">  Total Project Price for Yearly </option>
                                                <option value="2"> Total Project Price for Quaterly</option>
                                             </select>
                                             <td class="text-right"><strong class="sum"><input type='text' class='form-control'></strong>
                                          </td>
                                          <td colspan='3'></td>
                                       </tr>
         
                                    </tfoot>
                                 </table> -->
                     </div>



                     <div class="col-sm-12 p-0 m-t-30">
                        <label>Comments or Special Instructions</label>
                        <form method="post">
                           <div class="form-group">
                              <textarea class="textarea_editor1 form-control" rows="7" placeholder="Enter text ..."></textarea>
                           </div>
                        </form>
                     </div>
                     <div class="col-sm-12 p-0 m-t-30">
                        <label>Trade Term</label>
                        <form method="post">
                           <div class="form-group">
                              <textarea class="textarea_editor2 form-control" rows="7" placeholder="Enter text ..."></textarea>
                           </div>
                        </form>
                     </div>
                     <div class="col-sm-12 p-0 m-t-30">
                        <label>Delivery Term</label>
                        <form method="post">
                           <div class="form-group">
                              <textarea class="textarea_editor3 form-control" rows="7" placeholder="Enter text ..."></textarea>
                           </div>
                        </form>
                     </div>
                     <div class="col-sm-12 p-0 m-t-30">
                        <label>Payment Term</label>
                        <form method="post">
                           <div class="form-group">
                              <textarea class="textarea_editor4 form-control" rows="7" placeholder="Enter text ..."></textarea>
                           </div>
                        </form>
                     </div>
                     <div class="col-sm-12 p-0 m-t-30">
                        <label>Material Warranty</label>
                        <form method="post">
                           <div class="form-group">
                              <textarea class="textarea_editor5 form-control" rows="7" placeholder="Enter text ..."></textarea>
                           </div>
                        </form>
                     </div>
                     <div class="row cls-btm m-t-20">
                        <div class="col-sm-2">
                           <label>Status</label>
                           <select class="form-control select2">
                              <option value="HI">Prepared By</option>
                              <option value="AK">Approved By</option>
                           </select>
                        </div>
                        <div class="col-sm-2 text-right m-t-20" style="margin-left: -40px;">
                           <button type="submit" class="btn btn-success waves-effect waves-light m-r-10">save</button>
                           <button type="submit" class="btn btn-inverse waves-effect waves-light">Cancel</button>
                           <!--<button type="button" class="add-new btn btn-info" id="add-new">Add New Income</button>-->
                        </div>
                     </div>
                     <div class="row wid-100 m-t-20 ">
                        <div class="col-sm-6">
                           <div class="stats-c">
                              <h3>Prepared By</h3>
                              <div><label class="lab-ttl">Co-Ordinator	</label>: <label class="lab-nam">Mohammed</label>
                              </div>
                              <div> <label class="lab-ttl">Approved Date & Time	</label>: <label class="lab-nam">12/12/2019 05:30 PM</label></div>
                              <div><label class="lab-ttl">IP Address	</label>: <label class="lab-nam">101.198.10.10</label></div>
                           </div>
                        </div>
                        <div class="col-sm-6 ">
                           <div class="stats-c">
                              <h3>Approved By</h3>
                              <div><label class="lab-ttl">MD</label>: <label class="lab-nam">Satham</label>
                              </div>
                              <div> <label class="lab-ttl">Approved Date & Time	</label>: <label class="lab-nam">12/12/2019 05:30 PM</label></div>
                              <div><label class="lab-ttl">IP Address	</label>: <label class="lab-nam">101.198.10.10</label></div>
                           </div>
                        </div>
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
      <script src="plugins/bower_components/datatables/jquery.dataTables.min.js"></script>
      <script>
         $( '#myTable' ).DataTable();
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
      <script>
         // For select 2
         $(".select2").select2();

  
      </script>
      <script type="text/javascript">//<![CDATA[
         window.onload=function(){
            $("#table2").css('display','none')
            product();
         }

       var product=function(){
           var i=1;
         const dynamic_JS = ({
         sno,
         optionVal,
         price
         }) => `<tr>
                  <td>
                     <select name="selectProduct" class="form-control select2 select2_${i}" selected="${optionVal}">
                        <option value="0"> -- Select One --</option>
                        <option value="1"> IPhone </option>
                        <option value="2"> MAC </option>
                        <option value="3"> Windows </option>
                     </select>
                  </td>
                  <td>
                     <select name="selectProduct" class="form-control select2 select2_${i}" selected="${optionVal}">
                        <option value="0"> -- Select One --</option>
                        <option value="1"> IPhone </option>
                        <option value="2"> MAC </option>
                        <option value="3"> Windows </option>
                     </select>
                  </td>
                  <td><input type="text" class="form-control" title="" ></td>
                  <td><input type="text" class="form-control"  title="" ></td>
                  <td><input type="text" class="form-control" title="" ></td>
                  <td><input type="text" class="form-control" title="" ></td>
                  <td><input type="number" class="form-control text-right" value="${price}" title="" ></td>
                  <td colspan='2'><button type="button" class="remove-row btn btn-info icon-close" ></button></td>
               </tr>`;
         // onclick=\'removeRow(this)\'

         //window.onload=function(){}
         $(document).ready(function() {
         var template_add = $('#hidden-template').text();
         console.log(template_add);
         function render(props) {
         return function(tok, i) {
           return (i % 2) ? props[tok] : tok;
         };
         }
         var items = [{
         sno: '1',
         optionVal: '0',
         optionVal1: '0',
         desc:'',
         unit:'',
         qty:'',
         unitprice:'',
         tax:'',
         price: '0'
         }];
         var dynamic_HTML = template_add.split(/\$\{(.+?)\}/g);
         console.log(dynamic_HTML);

         $('#mainBody').append(items.map(function(item) {
             $(".select2_"+i).select2();
         return dynamic_HTML.map(render(item)).join('');

         }));

         });

         $('table#productTable').on('input propertychange',' > tbody > tr > td:nth-child(4) > input', function() {
         $.each($('input[type=text]'), function() {
         this.value = this.value.replace(/[^0-9]/g, '');
         });
         });
         $('table#productTable').on('input propertychange',' > tbody > tr > td:nth-child(5) > input', function() {
         $.each($('input[type=text]'), function() {
         this.value = this.value.replace(/[^0-9]/g, '');
         });
         });
         $('table#productTable').on('input propertychange',' > tbody > tr > td:nth-child(6) > input', function() {
         $.each($('input[type=text]'), function() {
         this.value = this.value.replace(/[^0-9]/g, '');
         });
         });


         $('.add-new').on('click', function() {
             i++;

         $("#productTable").each(function() {

         var tr_last = $('tbody > tr:last', this).clone();
         var td_no = tr_last.find('td:first');
         var serialNumber = parseInt(td_no.text()) + 1;


         // https://stackoverflow.com/a/6588327/5081877
         var tr_first_input = $('tbody > tr:first > td:nth-child(8) > input');
         var tr_first_price = parseFloat(tr_first_input.val()) || 0;
         console.dir(tr_first_price);

         totalamount += tr_first_price;
         $('#totalAdd').text(totalamount);

         var tr_first_selected = $('tbody > tr:first > td:nth-child(2) > select option').filter(":selected");
         // option:selected | .find(":selected") ~ .text(), ~.attr('value');
         var selectedValue = tr_first_selected.val(),
           optionText = tr_first_selected.text().trim();
         console.log(' Text : ', optionText);
         console.log('Value : ', selectedValue);

         // https://stackoverflow.com/a/39065147/5081877
         $('tbody', this).append([{
           sno: serialNumber,
           optionVal: selectedValue,
           price: tr_first_price
         }].map(dynamic_JS).join(''));
         $('.select2_'+i).select2();
         var last_optionSel = $('tbody#mainBody > tr:last > td:nth-child(2) > select');
         last_optionSel.val(selectedValue);

         tr_first_input.val(0);

         // https://stackoverflow.com/a/13089959/5081877
         var first_optionSel = $('#productOption');
         //$('tbody > tr:first > td:nth-child(2) > select ');
         first_optionSel.val(0);

         return;
         });
         });


         var totalamount = 0; // tr#mainRow
         $('table#productTable > tbody ').on('keyup', 'input', function(e) {
         var total =
         $(e.delegateTarget)
         .find('input[type=number]')
         .map(function() {
           return parseFloat($(this).val()) || 0;
         })
         .get()
         .reduce(function(a, b) {
           return a + b;
         });

         $('#total').text(total);
         $('#total_add').text(total);
         $('#tax_add').text(total);
         $('#amt_add').text(total);
         $('#discount').text(total);
         });

         <!-- Remove row - javascript & Jquery -->

         $('table#productTable').on('click', '.remove-row', function() {
         //$("#productTable").each(function () {
         // added total minus deleting element price.
         $(this).closest('tr').remove(); // https://stackoverflow.com/a/11553788/5081877
         //$(element).parent().remove();
         //});
         });

         function removeRow(onclickTAG) {
         // Iterate till we find TR tag.
         while ((onclickTAG = onclickTAG.parentElement) && onclickTAG.tagName != 'TR');
         onclickTAG.parentElement.removeChild(onclickTAG);
         }
         <!-- TEST for last butone element. -->
         var butOne = $('tbody#mainBody tr').eq($('tbody#mainBody tr').length - 2);
         console.log(butOne);
         // https://stackoverflow.com/a/7082881/5081877
         var mainEle = $("body > table > tbody").children();
         var mainEle_butOne = mainEle.eq(mainEle.length - 2);

         console.log(mainEle);
         console.log(mainEle_butOne);


         }

         setTimeout(function() {
             $('.select2_0').select2();
                             }, 1000);
         //]]>
      </script>
      <script id="hidden-template" type="text/x-custom-template">
         <tr id="mainRow">
           <td>
             <select name="selectProduct" id="productOption" class="form-control select2 select2_0 " selected="${optionVal}">
               <option value="0"> -- Select One --</option>
               <option value="1"> IPhone </option>
               <option value="2"> MAC </option>
               <option value="3"> Windows </option>
             </select>
           </td>
           <td>
             <select name="selectProduct" id="productOption" class="form-control select2 select2_0" selected="${optionVal}">
               <option value="0"> -- Select One --</option>
               <option value="1"> IPhone </option>
               <option value="2"> MAC </option>
               <option value="3"> Windows </option>
             </select>
           </td>
           <td>
             <input type="text" class="form-control" />
                   </td>
           <td>
             <input  type="text" class="form-control" />
           </td>
           <td>
             <input  type="text" class="form-control" />
           </td>
           <td>
             <input type="text" class="form-control" />
           </td>
           <td>
             <input id="number_only" pattern="[0-9]" type="number" class="form-control text-right" />
           </td>
           <td colspan='2'>
             <!-- glyphicon-plus | glyphicon-remove -->
             <button type="button" class="add-new btn btn-info icon-plus"></button>
           </td>
         </tr>

      </script>

      <!-- Table 2 start -->
      <script type="text/javascript">//<![CDATA[
         
      var another=function(){
           var i=1;
         const dynamic_JS1 = ({
         sno1,
         optionVal,
         price
         }) => `<tr>
                    <td><input type="text" class="form-control" title="" ></td>
                    <td><input type="text" class="form-control" title="" ></td>
                    <td><input type="text" class="form-control"  title="" ></td>
                    <td><input type="text" class="form-control" title="" ></td>
                    <td  colspan='3'><input id="number_only" pattern="[0-9]" type="number" class="form-control text-right" ></td>
                    <td><button type="button" class="remove-row btn btn-info icon-close" ></button></td>
                </tr>`;
         // onclick=\'removeRow(this)\'
         
         //window.onload=function(){}
         $(document).ready(function() {
         var template1_add = $('#hide-template').text();
         
         function render(props) {
         return function(tok, i) {
           return (i % 2) ? props[tok] : tok;
         };
         }
         var items1 = [{
         sno1: '1',
         optionVal: '0',
         optionVal1: '0',
         desc:'',
         unit:'',
         qty:'',
         unitprice:'',
         tax:'',
         price: '0'
         }];
         var dynamic_HTML = template1_add.split(/\$\{(.+?)\}/g);
         
         $('#importantBody').append(items1.map(function(item) {
            //  $(".select2_"+i).select2();
         return dynamic_HTML.map(render(item)).join('');
         
         }));
         
         });
         
         $('table#anotherTable').on('input propertychange',' > tbody > tr > td:nth-child(4) > input', function() {
         $.each($('input[type=text]'), function() {
         this.value = this.value.replace(/[^0-9]/g, '');
         });
         });
         $('table#anotherTable').on('input propertychange',' > tbody > tr > td:nth-child(5) > input', function() {
         $.each($('input[type=text]'), function() {
         this.value = this.value.replace(/[^0-9]/g, '');
         });
         });
         $('table#anotherTable').on('input propertychange',' > tbody > tr > td:nth-child(6) > input', function() {
         $.each($('input[type=text]'), function() {
         this.value = this.value.replace(/[^0-9]/g, '');
         });
         });
         
         
         $('.add-new').on('click', function() {
             i++;
         
         $("#anotherTable").each(function() {
         
         var tr_last = $('tbody > tr:last', this).clone();
         var td_no = tr_last.find('td:first');
         var serialNumber = parseInt(td_no.text()) + 1;
         
         
         // https://stackoverflow.com/a/6588327/5081877
         var tr_first_input = $('tbody > tr:first > td:nth-child(8) > input');
         var tr_first_price = parseFloat(tr_first_input.val()) || 0;
         console.dir(tr_first_price);
         
         totalamount += tr_first_price;
         $('#sumAdd').text(totalamount);
         
         var tr_first_selected = $('tbody > tr:first > td:nth-child(2) > select option').filter(":selected");
         // option:selected | .find(":selected") ~ .text(), ~.attr('value');
         var selectedValue = tr_first_selected.val(),
           optionText = tr_first_selected.text().trim();
         console.log(' Text : ', optionText);
         console.log('Value : ', selectedValue);
         
         // https://stackoverflow.com/a/39065147/5081877
         $('tbody', this).append([{
           sno1: serialNumber,
           optionVal: selectedValue,
           price: tr_first_price
         }].map(dynamic_JS1).join(''));
         // $('.select2_'+i).select2();
         var last_optionSel = $('tbody#importantBody > tr:last > td:nth-child(2) > select');
         last_optionSel.val(selectedValue);
         
         tr_first_input.val(0);
         
         // https://stackoverflow.com/a/13089959/5081877
         var first_optionSel = $('#productOption');
         //$('tbody > tr:first > td:nth-child(2) > select ');
         first_optionSel.val(0);
         
         return;
         });
         });
         
         
         var totalamount = 0; // tr#mainRow
         $('table#anotherTable > tbody ').on('keyup', 'input', function(e) {
         var total =
         $(e.delegateTarget)
         .find('input[type=number]')
         .map(function() {
           return parseFloat($(this).val()) || 0;
         })
         .get()
         .reduce(function(a, b) {
           return a + b;
         });

         var discount=Math.round(total/90);
         
         $('#sum_add').text(total);
         $('#tax_add').text(total);
         $('#amt_add1').text(total);
         $('#discount1').text(discount);
         $('#yearly').text(total);
         $('#quaterly').text(total/4);
         });
         
         <!-- Remove row - javascript & Jquery -->
         
         $('table#anotherTable').on('click', '.remove-row', function() {
         //$("#anotherTable").each(function () {
         // added total minus deleting element price.
         $(this).closest('tr').remove(); // https://stackoverflow.com/a/11553788/5081877
         //$(element).parent().remove();
         //});
         });
         
         function removeRow(onclickTAG) {
         // Iterate till we find TR tag.
         while ((onclickTAG = onclickTAG.parentElement) && onclickTAG.tagName != 'TR');
         onclickTAG.parentElement.removeChild(onclickTAG);
         }
         <!-- TEST for last butone element. -->
         var butOne = $('tbody#importantBody tr').eq($('tbody#importantBody tr').length - 2);
         console.log(butOne);
         // https://stackoverflow.com/a/7082881/5081877
         var mainEle = $("body > table > tbody").children();
         var mainEle_butOne = mainEle.eq(mainEle.length - 2);
         
         console.log(mainEle);
         console.log(mainEle_butOne);
         
         
         }
     
    
         // setTimeout(function() {
         //     $('.select2_0').select2();
         //                     }, 1000);
         //]]>
      </script>
      <script id="hide-template" type="text/x-custom-template">
         <tr id="importantRow">
           <td>
             <input type="text" class="form-control" />
           </td>
           <td>
             <input  type="text" class="form-control" />
           </td>
           <td>
             <input  type="text" class="form-control" />
           </td>
           <td>
             <input type="text" class="form-control" />
           </td>
           <td>
             <input id="number_only" pattern="[0-9]" type="number" class="form-control text-right"/>
           </td>
  
           <td colspan='3'>
             <!-- glyphicon-plus | glyphicon-remove -->
             <button type="button" class="add-new btn btn-info icon-plus"></button>
           </td>
         </tr>
         
      </script>

      <script>
      function selectOption(select) {
         if(select.options[select.selectedIndex].value == "AMC"){
            $("#table1").css("display", "none");
            $("#table2").css("display", "initial");
            another();
         }
         if(select.options[select.selectedIndex].value == "trading"){
            $("#table1").css("display", "initial");
            $("#table2").css("display", "none");
         }
      }
      </script>

         <!-- Table 2 End -->
      <!-- wysuhtml5 Plugin JavaScript -->
      <script src="plugins/bower_components/html5-editor/wysihtml5-0.3.0.js"></script>
      <script src="plugins/bower_components/html5-editor/bootstrap-wysihtml5.js"></script>
      <script>
         $(document).ready(function() {

             $('.textarea_editor1').wysihtml5();
             $('.textarea_editor2').wysihtml5();
             $('.textarea_editor3').wysihtml5();
             $('.textarea_editor4').wysihtml5();
             $('.textarea_editor5').wysihtml5();
             $('.textarea_editor6').wysihtml5();


         });
      </script>
</html>
