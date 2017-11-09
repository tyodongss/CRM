<?php 
date_default_timezone_set('Asia/Makassar');
session_start();
?>
<!--  -->

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>CRM S-Net</title>
<link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
<link rel="icon" href="favicon.ico" type="image/x-icon">

<link href="/inventory/css/bootstrap.min.css" rel="stylesheet">
<link href="/inventory/css/datepicker3.css" rel="stylesheet">
<link href="/inventory/css/bootstrap-table.css" rel="stylesheet">
<link href="/inventory/css/styles.css" rel="stylesheet">
<link rel="stylesheet" href="/inventory/css/bootstrap-datetimepicker-standalone.min.css">
<link rel="stylesheet" href="/inventory/css/bootstrap-datetimepicker.min.css">
<link rel="stylesheet" href="/inventory/css/bootstrap-select.min.css" />

<!--[if lt IE 9]>
<script src="js/html5shiv.js"></script>
<script src="js/respond.min.js"></script>
<![endif]-->

</head>

<body>

        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
                <div class="container-fluid">
                        <div class="navbar-header">
                                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#sidebar-collapse">
                                        <span class="sr-only">Toggle navigation</span>
                                        <span class="icon-bar"></span>
                                        <span class="icon-bar"></span>
                                        <span class="icon-bar"></span>
                                </button>
                                <a class="navbar-brand" href="#"><span class="glyphicon glyphicon-signal"></span> S-Net<span></span></a>
<!-- USER MENU -->
<?php include "menu-user.php" ?>

                        </div>

                </div><!-- /.container-fluid -->
        </nav>

        
    <!--    
    ==================================================== MENU
    -->
    <div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">
        <!--
        <form role="search">
            <div class="form-group">
                <input type="text" class="form-control" placeholder="Search">
            </div>
        </form>
        -->

        <?php include "menu.php"; 
        include "koneksi.php" ?>

        <!--    
    ==================================================== MENU
    -->
        
    <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">           
        <div class="row">
            <ol class="breadcrumb">
                <li><a href="#"><span class="glyphicon glyphicon-home"></span></a></li>
                <li class="active">Job To Do</li>
            </ol>
        </div><!--/.row-->
        
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Add New Job to Do</h1>
            </div>
        </div><!--/.row-->
                
        
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <!--<div class="panel-heading">Job to Do</div>-->
                    <div class="panel-body">
                        <div class="col-md-6">
                            <form data-toggle="validator" role="form" action="process-job-to-do-engineer.php" method="post">
                            <input type="hidden" name="_token" value="L8C5ujpOh4UEsaNko2Y3pkuzP714OtRymsXPqrNJ">
							
								<div class="form-group">
                                    <label>Job Name</label>
                                    <input class="form-control" name="name_job" value="" required>
                                    <div class="help-block with-errors"></div>
                                </div>							
								
								<div class="form-group">
									<label>Service Product</label>
									  <select class="form-control" name="id_type" required>
									  <option>---- Choose Service Product ----</option>
									  <?php
									  $sql = mysql_query("SELECT * FROM type order by name_type asc");
									  if(mysql_num_rows($sql) != 0){
									  while($data = mysql_fetch_assoc($sql)){
									  echo '<option value="'.$data['id_type'].'">'.$data['name_type'].'</option>';
										}
									  }
									?>
									</select>
									<div class="help-block with-errors"></div>
								</div>
								
								<div class="form-group">
									<label>Support Parts</label>
									  <select class="form-control" name="id_support_parts" required>
									  <option>---- Choose Support ----</option>
									  <?php
									  $sql = mysql_query("SELECT * FROM support_parts order by name_support_parts asc");
									  if(mysql_num_rows($sql) != 0){
									  while($data = mysql_fetch_assoc($sql)){
									  echo '<option value="'.$data['id_support_parts'].'">'.$data['name_support_parts'].'</option>';
										}
									  }
									?>
									</select>
									<div class="help-block with-errors"></div>
								</div>
								
								<div class="form-group">
                                    <label>Start Time</label> 
                                      <div class='input-group date' id='datetimepicker1'>
                                        <input type='text' class="form-control" name="start_time" />
                                        <span class="input-group-addon">
                                        <span class="glyphicon glyphicon-calendar"></span>
                                        </span>
                                      </div>
                                </div>
                
                                <div class="form-group">
                                    <label>End Time</label>
                                      <div class='input-group date' id='datetimepicker2'>
                                        <input type='text' class="form-control" name="end_time" />
                                        <span class="input-group-addon">
                                        <span class="glyphicon glyphicon-calendar"></span>
                                        </span>
                                      </div>
                                </div>
								
								<div class="form-group">
									<label>Customer Name</label><br>
									<select class="selectpicker" name="id_customer" data-live-search="true" data-width="100%">
									<option>---- Choose Customer ----</option>
									<?php
									include "koneksi.php";
									$sql = mysql_query("SELECT * FROM customer order by name_customer asc");
									if(mysql_num_rows($sql) != 0){
									while($data = mysql_fetch_assoc($sql)){
									echo '<option value="'.$data['id_customer'].'">'.$data['name_customer'].'</option>';
									  }
									}
									?>					
									</select>
								</div>
								
								<div class="form-group">
									<label>Request Date</label>
									<input class="form-control" data-provide="datepicker" data-date-format="yyyy/mm/dd" name="request_date" value="">                  
								</div>

								<div class="form-group">
                                    <label>Requster</label>
                                    <input class="form-control" name="requester" value="">
                                </div>														                             

                                <div class="form-group">
                                     <label>Engineer 1</label>
                                      <?php    
                                      $result5 = mysql_query("select * from engineer where status='active' order by name_engineer asc");  
                                      $jsArray5 = "var prdName5 = new Array();\n";  
                                      echo '<select class="form-control" name="id_engineer1" onchange="document.getElementById(\'prd_name5\').value = prdName5[this.value]">';  
                                      echo '<option>---- Choose Engineer 1 ----</option>';  
                                      while ($row5 = mysql_fetch_array($result5)) {  
                                          echo '<option value="' . $row5['id_engineer'] . '">' . $row5['name_engineer'] . '</option>';  
                                          $jsArray5 .= "prdName5['" . $row5['id_engineer'] . "'] = '" . addslashes($row5['name_engineer']) . "';\n";  
                                      }  
                                      echo '</select>';  
                                      ?>
                                </div>

                                <div class="form-group">
                                    <input class="form-control" type="hidden" name="name_engineer1" id="prd_name5"/>  
                                    <script type="text/javascript">  
                                    <?php echo $jsArray5; ?>  
                                    </script> 
                                </div>

                               <div class="form-group">
                                     <label>Engineer 2</label>
                                      <?php    
                                      $result6 = mysql_query("select * from engineer where status='active' order by name_engineer asc");  
                                      $jsArray6 = "var prdName6 = new Array();\n";  
                                      echo '<select class="form-control" name="id_engineer2" onchange="document.getElementById(\'prd_name6\').value = prdName6[this.value]">';  
                                      echo '<option>---- Choose Engineer 2 ----</option>';  
                                      while ($row6 = mysql_fetch_array($result6)) {  
                                          echo '<option value="' . $row6['id_engineer'] . '">' . $row6['name_engineer'] . '</option>';  
                                          $jsArray6 .= "prdName6['" . $row6['id_engineer'] . "'] = '" . addslashes($row6['name_engineer']) . "';\n";  
                                      }  
                                      echo '</select>';  
                                      ?>
                                </div>

                                <div class="form-group">
                                    <input class="form-control" type="hidden" name="name_engineer2" id="prd_name6"/>  
                                    <script type="text/javascript">  
                                    <?php echo $jsArray6; ?>  
                                    </script> 
                                </div>

                                <div class="form-group">
                                     <label>Engineer 3</label>
                                      <?php    
                                      $result7 = mysql_query("select * from engineer where status='active' order by name_engineer asc");  
                                      $jsArray7 = "var prdName7 = new Array();\n";  
                                      echo '<select class="form-control" name="id_engineer3" onchange="document.getElementById(\'prd_name7\').value = prdName7[this.value]">';  
                                      echo '<option>---- Choose Engineer 3 ----</option>';  
                                      while ($row7 = mysql_fetch_array($result7)) {  
                                          echo '<option value="' . $row7['id_engineer'] . '">' . $row7['name_engineer'] . '</option>';  
                                          $jsArray7 .= "prdName7['" . $row7['id_engineer'] . "'] = '" . addslashes($row7['name_engineer']) . "';\n";  
                                      }  
                                      echo '</select>';  
                                      ?>
                                </div>

                                <div class="form-group">
                                    <input class="form-control" type="hidden" name="name_engineer3" id="prd_name7"/>  
                                    <script type="text/javascript">  
                                    <?php echo $jsArray7; ?>  
                                    </script> 
                                </div>

                                 <div class="form-group">
                                     <label>Engineer 4</label>
                                      <?php    
                                      $result8 = mysql_query("select * from engineer where status='active' order by name_engineer asc");  
                                      $jsArray8 = "var prdName8 = new Array();\n";  
                                      echo '<select class="form-control" name="id_engineer4" onchange="document.getElementById(\'prd_name8\').value = prdName8[this.value]">';  
                                      echo '<option>---- Choose Engineer 4 ----</option>';  
                                      while ($row8 = mysql_fetch_array($result8)) {  
                                          echo '<option value="' . $row8['id_engineer'] . '">' . $row8['name_engineer'] . '</option>';  
                                          $jsArray8 .= "prdName8['" . $row8['id_engineer'] . "'] = '" . addslashes($row8['name_engineer']) . "';\n";  
                                      }  
                                      echo '</select>';  
                                      ?>
                                </div>

                                <div class="form-group">
                                    <input class="form-control" type="hidden" name="name_engineer4" id="prd_name8"/>  
                                    <script type="text/javascript">  
                                    <?php echo $jsArray8; ?>  
                                    </script> 
                                </div>


                                <div class="form-group">
                                    <label>H/W State</label>
                                    <select class = "form-control" name="hw_state" >
                                    <option>---- Choose State ----</option>
                                    <option>Normal</option>
                                    <option>Abnormal</option>
                                    </select>
                                </div>
								
								<div class="form-group">
                                    <label>Application State</label>
                                    <select class = "form-control" name="application_state" >
                                    <option>---- Choose State ----</option>
                                    <option>Normal</option>
                                    <option>Abnormal</option>
                                    </select>
                                </div>
								
								<div class="form-group">
                                    <label>DB State</label>
                                    <select class = "form-control" name="db_state" >
                                    <option>---- Choose State ----</option>
                                    <option>Normal</option>
                                    <option>Abnormal</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label>Contract Condition</label>
                                    <select class = "form-control" name="contract_condition" >
                                    <option>---- Choose Condition ----</option>
                                    <option>Contracted</option>
                                    <option>Not Contract</option>
									<option>In Warranty</option>
                                    </select>
                                </div>                             
                                                        
                                <div class="form-group">
                                    <label>Caused by</label>
                                    <textarea name="caused_by" rows="5" cols="68"></textarea>
                                </div>

                                <div class="form-group">
                                    <label>Support</label>
                                    <textarea name="support" rows="5" cols="68"></textarea>
                                </div>

								<div class="form-group">
                                    <label>Recommendation</label>
                                    <input class="form-control" name="recommendation" value="">
                                </div> 								

                                <div class="form-group">
									<label>Status Job</label>
									<select class = "form-control" name="status_job">
									<option>---- Choose Status ----</option>
									<option>Open</option>
									<option>Monitoring</option>
									<option>Close</option>
									</select>
                                </div>

                                 <div class="form-group">
                                    <label>Remark</label>
                                    <input class="form-control" name="remark" value="">
                                </div> 

                                <button type="submit" class="btn btn-primary" name="kirim">Save</button>
                                <button type="reset" class="btn btn-default">Reset</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div><!-- /.col-->
        </div><!-- /.row -->
        
    </div><!--/.main-->


    <script src="/inventory/js/jquery-1.11.1.min.js"></script>
    <script src="/inventory/js/bootstrap.min.js"></script>
    <script src="/inventory/js/chart.min.js"></script>
    <script src="/inventory/js/chart-data.js"></script>
    <script src="/inventory/js/easypiechart.js"></script>
    <script src="/inventory/js/easypiechart-data.js"></script>
    <script src="/inventory/js/bootstrap-datepicker.js"></script>
    <script src="/inventory/js/bootstrap-table.js"></script>
    <script src="/inventory/js/moment.js"></script>
    <script type="text/javascript" src="/inventory/js/bootstrap-datetimepicker.min.js"></script>
    <script src="/inventory/js/validator.js"></script>
	<!--script src="/inventory/js/jquery.min.js"></script-->
    <!--script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/inventory/js/bootstrap.min.js"></script-->
    <script src="/inventory/js/bootstrap-select.min.js"></script>


    <script>
        !function ($) {
            $(document).on("click","ul.nav li.parent > a > span.icon", function(){        
                $(this).find('em:first').toggleClass("glyphicon-minus");      
            }); 
            $(".sidebar span.icon").find('em:first').addClass("glyphicon-plus");
        }(window.jQuery);

        $(window).on('resize', function () {
          if ($(window).width() > 768) $('#sidebar-collapse').collapse('show')
        })
        $(window).on('resize', function () {
          if ($(window).width() <= 767) $('#sidebar-collapse').collapse('hide')
        })
    </script>
	<script type="text/javascript">
      $(function () {
        $('#datetimepicker1').datetimepicker({
          format: 'YYYY-MM-DD HH:mm:ss'
        });
      });
    </script>

    <script type="text/javascript">
      $(function () {
        $('#datetimepicker2').datetimepicker({
           format: 'YYYY-MM-DD HH:mm:ss'
        });
      });
    </script>    
</body>

</html>
