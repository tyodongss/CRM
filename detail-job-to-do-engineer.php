<?php
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
        <?php include ('menu.php') ?>

<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">


                <div class="row">
                        <ol class="breadcrumb">
                                <li><a href="#"><span class="glyphicon glyphicon-home"></span></a></li>
                <li class="active">Job To Do</li>
            </ol>
        </div><!--/.row-->
        
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Detail Job To Do</h1>
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
              
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                        <table class="table table-striped">
                                  <tbody>
                                    <?php 
                                    while($row=mysql_fetch_array($query)){ 
                                    ?>
                                    <tr>                                      
                                      <td width="40%"><b>Job Name</b></td>
                                      <td><?php echo $row['name_job'];?></td>
                                    </tr>
									<tr>                                      
                                      <td width="40%"><b>Service Product</b></td>
                                      <td><?php echo $row['name_type'];?></td>
                                    </tr>
									<tr>                                      
                                      <td width="40%"><b>Support Parts</b></td>
                                      <td><?php echo $row['name_support_parts'];?></td>
                                    </tr>
                                    <tr>
                                    <tr>                                      
                                      <td width="40%"><b>Start Time</b></td>
                                      <td><?php echo $row['start_time'];?></td>
                                    </tr>
                                    <tr>                                      
                                      <td width="40%"><b>End Time</b></td>
                                      <td><?php echo $row['end_time'];?></td>
                                    </tr>
									<tr>                                      
                                      <td width="40%"><b>Duration</b></td>
                                      <td><?php echo $row['duration'];?></td>
                                    </tr> 
                                    <tr>                                      
                                      <td width="40%"><b>Customer Name</b></td>
                                      <td><?php echo $row['name_customer'];?></td>
                                    </tr>
                                    <tr>                                      
                                      <td width="40%"><b>Request Date</b></td>
                                      <td><?php echo $row['request_date'];?></td>
                                    </tr>
                                    <tr>                                      
                                      <td width="40%"><b>Requester</b></td>
                                      <td><?php echo $row['requester'];?></td>
                                    </tr>
                                    <tr>                                      
                                      <td width="40%"><b>H/W State</b></td>
                                      <td><?php echo $row['hw_state'];?></td>
                                    </tr>
                                    <tr>                                      
                                      <td width="40%"><b>Application State</b></td>
                                      <td><?php echo $row['application_state'];?></td>
                                    </tr>
                                    <tr>                                      
                                      <td width="40%"><b>DB State</b></td>
                                      <td><?php echo $row['db_state'];?></td>
                                    </tr>
                                    <tr>                                      
                                      <td width="40%"><b>Contract Condition</b></td>
                                      <td><?php echo $row['contract_condition'];?></td>
                                    </tr>
                                    <tr>                                      
                                      <td width="40%"><b>Caused by</b></td>
                                      <td><?php echo $row['caused_by'];?></td>
                                    </tr>
									<tr>                                      
                                      <td width="40%"><b>Support</b></td>
                                      <td><?php echo $row['support'];?></td>
                                    </tr>
									<tr>                                      
                                      <td width="40%"><b>Recommendation</b></td>
                                      <td><?php echo $row['recommendation'];?></td>
                                    </tr>
									<tr>                                      
                                      <td width="40%"><b>Status Job</b></td>
                                      <td><?php echo $row['status_job'];?></td>
                                    </tr>
									<tr>                                      
                                      <td width="40%"><b>Remark</b></td>
                                      <td><?php echo $row['remark'];?></td>
                                    </tr>
									<tr>                                      
                                      <td width="40%"><b>File Name</b></td>
                                      <td><?php echo $row['file'];?></td>
                                    </tr>
									<tr>                                      
                                      <td width="40%"><b>File Type</b></td>
                                      <td><?php echo $row['type'];?></td>
                                    </tr>
									<tr>                                      
                                      <td width="40%"><b>File Size</b></td>
                                      <td><?php echo $row['size'];?></td>
                                    </tr>
									<tr>                                      
                                      <td width="40%"><b>Attachment</b></td>
                                      <td><a href="uploads/<?php echo $row['file'] ?>" target="_blank">view file</a></td>
                                    </tr>
                                    <tr>                                      
                                      <td width="40%"><b>Created At</b></td>
                                      <td><?php echo $row['created_at'];?></td>
                                    </tr>                                                      
                                    <tr>                                      
                                      <td width="40%"><b>Updated At</b></td>
                                      <td><?php echo $row['updated_at'];?></td>
                                    </tr>
                                    <tr>                                      
                                      <td width="40%"><b>Deleted At</b></td>
                                      <td><?php echo $row['deleted_at'];?></td>
                                    </tr>
                                    <?php
                                      }
                                      ?>

 
                                      <tr>                                      
                                      <td width="40%"><b>Engineers Name</b></td>

                                      <td>
                                      <?
									  
                                      $query2 = mysql_query("SELECT engineer.name_engineer
                                      FROM engineer, detail_job
                                      WHERE detail_job.id_engineer = engineer.id_engineer
                                      AND detail_job.id_job = '$id'");

                                      while($row2=mysql_fetch_array($query2)){ 
                                      ?>
                                      <?php echo $row2['name_engineer'];?><br>
                                      <?}?>  
                                      </td>
                                      </tr>
                                  </tbody>
                                </table> 
                                  

                        </div>
                </div>
        </div>
        
        
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <!--<div class="panel-heading">IT Outsource</div>-->
                    <div class="panel-body">
                        <div class="col-md-6">
                                <form role="form" action="show-job-to-do-engineer.php">
                                                                                                                    
                                <button class="btn btn-default">Back</button>

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

</body>

</html>
