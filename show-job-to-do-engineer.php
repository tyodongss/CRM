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
                <h1 class="page-header">Job To Do</h1>
            </div>
        </div><!--/.row-->
                
<?php

include "koneksi.php";

#Open
$sql = "SELECT job.id_job, job.name_job, job.id_type, type.name_type, job.id_support_parts, support_parts.name_support_parts, job.start_time, job.end_time, job.id_customer, customer.name_customer, job.request_date, job.requester, job.hw_state, job.application_state, job.db_state, job.contract_condition, job.caused_by, job.support, job.recommendation, job.status_job, job.remark, timediff(job.end_time, job.start_time) as duration 
        FROM job, type, support_parts, customer 
		WHERE job.id_type=type.id_type
		AND job.id_support_parts=support_parts.id_support_parts
		AND job.id_customer=customer.id_customer
		AND job.status_job='Open'
		ORDER BY job.id_job DESC";

$hasil = mysql_query($sql);
?>      
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading"><a href="add-job-to-do-engineer.php" class="btn btn-primary btn-md">Add New Job To Do</a></div>
                    <div class="panel-body">

					<ul class="nav nav-tabs">
					  <li class="active"><a data-toggle="tab" href="#open">Open</a></li>
					  <li><a data-toggle="tab" href="#monitoring">Monitoring</a></li>
					  <li><a data-toggle="tab" href="#close">Close</a></li>  
					  <!--li><a data-toggle="tab" href="#noc">NOC</a></li>
					  <li><a data-toggle="tab" href="#helpdesk">Helpdesk</a></li>
					  <li><a data-toggle="tab" href="#engineering">Engineering</a></li>
					  <li><a data-toggle="tab" href="#engineeringvsat">Engineering VSAT</a></li>
					  <li><a data-toggle="tab" href="#tsbpn">TS BPN</a></li>
					  <li><a data-toggle="tab" href="#tsjkt">TS JKT</a></li-->
					</ul>

<div class="tab-content">
  <div id="open" class="tab-pane fade in active">

                        <table data-toggle="table" data-url="tables/data1.json"  data-show-refresh="true" data-show-toggle="true" data-show-columns="true" data-search="true" data-select-item-name="toolbar1" data-pagination="true" data-sort-name="name" data-sort-order="asc">
                            <thead>
                            <tr>
								<th data-field="id_job"  data-filter-control="input">Job ID</th>
								<th data-field="name_job"  data-filter-control="input">Job Name</th>
								<th data-field="name_type" data-filter-control="input">Service Product</th>
                                <th data-field="name_support_parts"  data-filter-control="input">Support Parts</th>                                
                                <th data-field="start_time" data-filter-control="input">Start Time</th>
                                <th data-field="end_time" data-filter-control="input">End Time</th>
                                <th data-field="duration" data-filter-control="input">Duration</th>						
                                <th data-field="action" data-sortable="true">Action</th>                                
                            </tr>
                            </thead>
                            <tbody>
<?php                       
$no=0;
while($record = mysql_fetch_array($hasil)){
?>
                           <tr>
								<td data-field="id_job" data-sortable="true"><?php echo $record['id_job'];?></td>
								<td data-field="name_job" data-sortable="true"><?php echo $record['name_job'];?></td>
								<td data-field="name_type" data-sortable="true"><?php echo $record['name_type'];?></td>
                                <td data-field="name_support_parts" data-sortable="true"><?php echo $record['name_support_parts'];?></td>
                                <td data-field="start_time" data-sortable="true"><?php echo $record['start_time'];?></td>
                                <td data-field="end_time" data-sortable="true"><?php echo $record['end_time'];?></td>
                                <td data-field="duration" data-sortable="true"><?php echo $record['duration'];?></td>
								<td data-field="action" data-sortable="true"><a href="detail-job-to-do-engineer.php?id=<?php echo $record['id_job'];?>"><span class="glyphicon glyphicon-eye-open" title="Details"></a>&nbsp;&nbsp;<a href="edit-job-to-do-engineer.php?id=<?php echo $record['id_job'];?>"><span class="glyphicon glyphicon-pencil" title="Edit"></a>&nbsp;&nbsp;<a href="history-job-to-do-update.php?id=<?php echo $record['id_job'];?>"><span class="glyphicon glyphicon-tasks" title="Detail Job To Do"></a>&nbsp;&nbsp;<a href="upload.php?id=<?php echo $record['id_job'];?>"><span class="glyphicon glyphicon-circle-arrow-up" title="Upload File"></a></td>

                            </tr>
<?php
}
?>                                                  
                            </tbody>
                        </table>                        
                    </div>

					
<?php 
#Close
$sql_closed = "SELECT job.id_job, job.name_job, job.id_type, type.name_type, job.id_support_parts, support_parts.name_support_parts, job.start_time, job.end_time, job.id_customer, customer.name_customer, job.request_date, job.requester, job.hw_state, job.application_state, job.db_state, job.contract_condition, job.caused_by, job.support, job.recommendation, job.status_job, job.remark, timediff(job.end_time, job.start_time) as duration 
        FROM job, type, support_parts, customer 
		WHERE job.id_type=type.id_type
		AND job.id_support_parts=support_parts.id_support_parts
		AND job.id_customer=customer.id_customer
		AND job.status_job='Close'
		ORDER BY job.id_job DESC";
		
$ticket_closed = mysql_query($sql_closed); ?>

  <div id="close" class="tab-pane fade">
					<table data-toggle="table" data-url="tables/data1.json"  data-show-refresh="true" data-show-toggle="true" data-show-columns="true" data-search="true" data-select-item-name="toolbar1" data-pagination="true" data-sort-name="name" data-sort-order="asc">
                            <thead>
                            <tr>
                                <th data-field="id_job"  data-filter-control="input">Job ID</th>
								<th data-field="name_job"  data-filter-control="input">Job Name</th>
								<th data-field="name_type" data-filter-control="input">Service Product</th>
                                <th data-field="name_support_parts"  data-filter-control="input">Support Parts</th>                                
                                <th data-field="start_time" data-filter-control="input">Start Time</th>
                                <th data-field="end_time" data-filter-control="input">End Time</th>
                                <th data-field="duration" data-filter-control="input">Duration</th>						
                                <th data-field="action" data-sortable="true">Action</th>                                       
                            </tr>
                            </thead>
                            <tbody>
<?php						
$no=0;
while($ticket_close = mysql_fetch_array($ticket_closed)){
?>
							<tr>
                                <td data-field="id_job" data-sortable="true"><?php echo $ticket_close['id_job'];?></td>
								<td data-field="name_job" data-sortable="true"><?php echo $ticket_close['name_job'];?></td>
								<td data-field="name_type" data-sortable="true"><?php echo $ticket_close['name_type'];?></td>
                                <td data-field="name_support_parts" data-sortable="true"><?php echo $ticket_close['name_support_parts'];?></td>
                                <td data-field="start_time" data-sortable="true"><?php echo $ticket_close['start_time'];?></td>
                                <td data-field="end_time" data-sortable="true"><?php echo $ticket_close['end_time'];?></td>
                                <td data-field="duration" data-sortable="true"><?php echo $ticket_close['duration'];?></td>
								<td data-field="action" data-sortable="true"><a href="detail-job-to-do-engineer.php?id=<?php echo $ticket_close['id_job'];?>"><span class="glyphicon glyphicon-eye-open" title="Details"></a>&nbsp;&nbsp;<a href="edit-job-to-do-engineer.php?id=<?php echo $ticket_close['id_job'];?>"><span class="glyphicon glyphicon-pencil" title="Edit"></a>&nbsp;&nbsp;<a href="history-job-to-do-update.php?id=<?php echo $ticket_close['id_job'];?>"><span class="glyphicon glyphicon-tasks" title="Detail Job To Do"></a>&nbsp;&nbsp;<a href="upload.php?id=<?php echo $ticket_close['id_job'];?>"><span class="glyphicon glyphicon-circle-arrow-up" title="Upload File"></a></td>
                            </tr>
<?php
}
?>					    							
						    </tbody>
						</table>
					</div>
  
<?php 

$sql_monitoring = "SELECT job.id_job, job.name_job, job.id_type, type.name_type, job.id_support_parts, support_parts.name_support_parts, job.start_time, job.end_time, job.id_customer, customer.name_customer, job.request_date, job.requester, job.hw_state, job.application_state, job.db_state, job.contract_condition, job.caused_by, job.support, job.recommendation, job.status_job, job.remark, timediff(job.end_time, job.start_time) as duration 
        FROM job, type, support_parts, customer 
		WHERE job.id_type=type.id_type
		AND job.id_support_parts=support_parts.id_support_parts
		AND job.id_customer=customer.id_customer
		AND job.status_job='Monitoring'
		ORDER BY job.id_job DESC";
		
$ticket_monitoring = mysql_query($sql_monitoring); ?>

  <div id="monitoring" class="tab-pane fade">
					<table data-toggle="table" data-url="tables/data1.json"  data-show-refresh="true" data-show-toggle="true" data-show-columns="true" data-search="true" data-select-item-name="toolbar1" data-pagination="true" data-sort-name="name" data-sort-order="asc">
                            <thead>
                            <tr>
                                <th data-field="id_job"  data-filter-control="input">Job ID</th>
								<th data-field="name_job"  data-filter-control="input">Job Name</th>
								<th data-field="name_type" data-filter-control="input">Service Product</th>
                                <th data-field="name_support_parts"  data-filter-control="input">Support Parts</th>                                
                                <th data-field="start_time" data-filter-control="input">Start Time</th>
                                <th data-field="end_time" data-filter-control="input">End Time</th>
                                <th data-field="duration" data-filter-control="input">Duration</th>						
                                <th data-field="action" data-sortable="true">Action</th>                                              
                            </tr>
                            </thead>
                            <tbody>
<?php						
$no=0;
while($ticket_monitoring2 = mysql_fetch_array($ticket_monitoring)){
?>
							<tr>							
                                <td data-field="id_job" data-sortable="true"><?php echo $ticket_monitoring2['id_job'];?></td>
								<td data-field="name_job" data-sortable="true"><?php echo $ticket_monitoring2['name_job'];?></td>
								<td data-field="name_type" data-sortable="true"><?php echo $ticket_monitoring2['name_type'];?></td>
                                <td data-field="name_support_parts" data-sortable="true"><?php echo $ticket_monitoring2['name_support_parts'];?></td>
                                <td data-field="start_time" data-sortable="true"><?php echo $ticket_monitoring2['start_time'];?></td>
                                <td data-field="end_time" data-sortable="true"><?php echo $ticket_monitoring2['end_time'];?></td>
                                <td data-field="duration" data-sortable="true"><?php echo $ticket_monitoring2['duration'];?></td>
								<td data-field="action" data-sortable="true"><a href="detail-job-to-do-engineer.php?id=<?php echo $ticket_monitoring2['id_job'];?>"><span class="glyphicon glyphicon-eye-open" title="Details"></a>&nbsp;&nbsp;<a href="edit-job-to-do-engineer.php?id=<?php echo $ticket_monitoring2['id_job'];?>"><span class="glyphicon glyphicon-pencil" title="Edit"></a>&nbsp;&nbsp;<a href="history-job-to-do-update.php?id=<?php echo $ticket_monitoring2['id_job'];?>"><span class="glyphicon glyphicon-tasks" title="Detail Job To Do"></a>&nbsp;&nbsp;<a href="upload.php?id=<?php echo $ticket_monitoring2['id_job'];?>"><span class="glyphicon glyphicon-circle-arrow-up" title="Upload File"></a></td>
							</tr>
<?php
}
?>					    							
						    </tbody>
						</table>
					</div>					
				</div>					
            </div>
        </div>
	</div>
</div>
        
        
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
