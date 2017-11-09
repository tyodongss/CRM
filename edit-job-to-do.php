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

        <?php include "menu.php"; ?>

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
                <h1 class="page-header">Edit Job To Do</h1>
            </div>
        </div><!--/.row-->
<?php 
include "koneksi.php"; 

$id=$_GET['id']; 

$query=mysql_query("SELECT job.id_job, job.name_job, job.id_type, type.name_type, job.id_support_parts, support_parts.name_support_parts, job.start_time, job.end_time, job.id_customer, customer.name_customer, job.request_date, job.requester, job.hw_state, job.application_state, job.db_state, job.contract_condition, job.caused_by, job.support, job.recommendation, job.status_job, job.remark, timediff(job.end_time, job.start_time) as duration, job.created_at, job.updated_at, job.deleted_at
        FROM job, type, support_parts, customer 
		WHERE job.id_type=type.id_type
		AND job.id_support_parts=support_parts.id_support_parts
		AND job.id_customer=customer.id_customer
		AND job.id_job = '$id'");
?> 
<?php 
while($row=mysql_fetch_array($query)){ 
?>      
        
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <div class="col-md-6">
                            <form role="form" action="update-job-to-do.php" method="post">
                            <input type="hidden" name="_token" value="L8C5ujpOh4UEsaNko2Y3pkuzP714OtRymsXPqrNJ">
                            <input type="hidden" name="id" value="<?php echo $id;?>"/>

                                <div class="form-group">
                                    <label>Job Name</label>
                                    <input class="form-control" name="name_job" value="<?php echo $row['name_job']?>" required>
                                    <div class="help-block with-errors"></div>
                                </div>
								
								<div class="form-group">
                                    <label>Service Product</label>
                                    <select class="form-control" name="id_type">
                                    <option>---- Choose Service Product ----</option>
                                    <option selected value="<?php echo $row['id_type'];?>"><?php echo $row['name_type'];?></option>
                                    <?php
                                    $sql = mysql_query("SELECT * FROM type order by name_type asc");
                                    if(mysql_num_rows($sql) != 0){
                                    while($data = mysql_fetch_assoc($sql)){
                                    echo '<option value="'.$data['id_type'].'" >'.$data['name_type'].'</option>';
                                        } 
                                    }
                                    ?>
                                </select>
                                </div>  

								<div class="form-group">
									<label>Support Parts</label>
									<select class="form-control" name="id_support_parts" required>
									<option>---- Choose Support ----</option>
									<option selected value="<?php echo $row['id_support_parts'];?>"><?php echo $row['name_support_parts'];?></option>
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
                                        <input type='text' class="form-control" name="start_time" value="<?php echo $row['start_time'];?>"/>
                                        <span class="input-group-addon">
                                        <span class="glyphicon glyphicon-calendar"></span>
                                        </span>
                                      </div>
                                </div>
                
                                <div class="form-group">
                                    <label>End Time</label>
                                      <div class='input-group date' id='datetimepicker2'>
                                        <input type='text' class="form-control" name="end_time" value="<?php echo $row['end_time'];?>"/>
                                        <span class="input-group-addon">
                                        <span class="glyphicon glyphicon-calendar"></span>
                                        </span>
                                      </div>
                                </div>
								
								<div class="form-group">
									<label>Customer Name</label>
									  <select class="form-control" name="id_customer" required>
									  <option>---- Choose Customer ----</option>
									  <option selected value="<?php echo $row['id_customer'];?>"><?php echo $row['name_customer'];?></option>
									  <?php
									  $sql = mysql_query("SELECT * FROM customer order by name_customer asc");
									  if(mysql_num_rows($sql) != 0){
									  while($data = mysql_fetch_assoc($sql)){
									  echo '<option value="'.$data['id_customer'].'">'.$data['name_customer'].'</option>';
										}
									  }
									?>
									</select>
									<div class="help-block with-errors"></div>
								</div>
								
								<div class="form-group">
									<label>Request Date</label>
									<input class="form-control" data-provide="datepicker" data-date-format="yyyy/mm/dd" name="request_date" value="<?php echo $row['request_date'];?>">                  
								</div>
								
								<div class="form-group">
                                    <label>Requster</label>
                                    <input class="form-control" name="requester" value="<?php echo $row['requester'];?>">
                                </div>	
								
								<div class="form-group">
                                    <label>H/W State</label>
                                    <select class = "form-control" name="hw_state">
                                    <option selected value="<?php echo $row['hw_state'];?>"><?php echo $row['hw_state'];?></option>
                                    <option>---- Choose State ----</option>
                                    <option>Normal</option>
                                    <option>Abnormal</option>
                                    </select>
                                </div>
								
								<div class="form-group">
                                    <label>Application State</label>
                                    <select class = "form-control" name="application_state">
                                    <option selected value="<?php echo $row['application_state'];?>"><?php echo $row['application_state'];?></option>
                                    <option>---- Choose State ----</option>
                                    <option>Normal</option>
                                    <option>Abnormal</option>
                                    </select>
                                </div>
								
								<div class="form-group">
                                    <label>DB State</label>
                                    <select class = "form-control" name="db_state">
                                    <option selected value="<?php echo $row['db_state'];?>"><?php echo $row['db_state'];?></option>
                                    <option>---- Choose State ----</option>
                                    <option>Normal</option>
                                    <option>Abnormal</option>
                                    </select>
                                </div>
								
								<div class="form-group">
                                    <label>Contract Condition</label>
                                    <select class = "form-control" name="contract_condition">
                                    <option selected value="<?php echo $row['contract_condition'];?>"><?php echo $row['contract_condition'];?></option>
                                    <option>---- Choose Condition ----</option>
                                    <option>Contracted</option>
                                    <option>Not Contract</option>
									<option>In Warranty</option>
                                    </select>
                                </div>
								
								<div class="form-group">
                                    <label>Caused by</label>
                                    <textarea name="caused_by" rows="5" cols="68"><?php echo $row['caused_by'];?></textarea>
                                </div>

                                <div class="form-group">
                                    <label>Support</label>
                                    <textarea name="support" rows="5" cols="68"><?php echo $row['support'];?></textarea>
                                </div>
								
								<div class="form-group">
                                    <label>Recommendation</label>
                                    <input class="form-control" name="recommendation" value="<?php echo $row['recommendation'];?>">
                                </div> 								

                                <div class="form-group">
									<label>Status Job</label>
									<select class = "form-control" name="status_job">
									<option selected value="<?php echo $row['status_job'];?>"><?php echo $row['status_job'];?></option>
									<option>---- Choose Status ----</option>
									<option>Open</option>
									<option>Monitoring</option>
									<option>Close</option>
									</select>
                                </div>

                                 <div class="form-group">
                                    <label>Remark</label>
                                    <input class="form-control" name="remark" value="<?php echo $row['remark'];?>">
                                </div> 
                                                                
                                <button type="submit" class="btn btn-primary">Update</button>
                                <a href="/inventory/show-job-to-do.php" class="btn btn-default">Back</a>
                                
<?php
}
?>  
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


 