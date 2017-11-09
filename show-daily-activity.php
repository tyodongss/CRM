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
    <?php include "menu.php"; ?>

    <!--  
  ==================================================== MENU
  -->
    
  <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">     
    <div class="row">
      <ol class="breadcrumb">
        <li><a href="#"><span class="glyphicon glyphicon-home"></span></a></li>
        <li class="active">Daily Activity</li>
      </ol>
    </div><!--/.row-->
    
    <div class="row">
      <div class="col-lg-12">
        <h1 class="page-header">Daily Activity</h1>
      </div>
    </div><!--/.row-->
        
    <?php

    include "koneksi.php";

    $sql = "SELECT daily_activity.id_daily_activity, engineer.id_engineer, engineer.name_engineer, support_parts.id_support_parts, support_parts.name_support_parts, customer.id_customer, customer.name_customer, daily_activity.name_complain, daily_activity.name_pic, daily_activity.start_time, daily_activity.problem, daily_activity.action, daily_activity.end_time, daily_activity.remark, daily_activity.created_at, daily_activity.updated_at, daily_activity.deleted_at
      FROM daily_activity, engineer, support_parts, customer
      WHERE daily_activity.id_engineer=engineer.id_engineer
	  AND daily_activity.id_support_parts=support_parts.id_support_parts
	  AND daily_activity.id_customer=customer.id_customer
      ORDER BY daily_activity.id_daily_activity DESC ";
    
	$hasil = mysql_query($sql); ?>
    
    <div class="row">
      <div class="col-lg-12">
        <div class="panel panel-default">
          <div class="panel-heading"><a href="add-daily-activity.php" class="btn btn-primary btn-md">Add New Daily Activity</a></div>
          <div class="panel-body">
    
          
          <table data-toggle="table" data-url="tables/data1.json"  data-show-refresh="true" data-show-toggle="true" data-show-columns="true" data-search="true" data-select-item-name="toolbar1" data-pagination="true" >
              
             <thead>
                <tr>
					<th data-field="itemid"  data-sortable="true">No</th>
					<th data-field="name_engineer"  data-sortable="true">Engineer Name</th>
                    <th data-field="name_support_parts"  data-sortable="true">Support Type</th>
					<th data-field="name_pic"  data-sortable="true">User / PIC</th>
					<th data-field="problem" data-sortable="true">Problem</th>
                    <th data-field="start_time" data-sortable="true">Time Start</th>
                    <th data-field="end_time" data-sortable="true">Time Finish</th>					
					<th data-field="action" data-sortable="true">Action</th>
                </tr>
              </thead>
              <tbody>
              <?php           
$no=0;
while($record = mysql_fetch_array($hasil)){
?>
				<tr>
					<td data-field="itemid" data-sortable="true"><?php echo $no=$no+1;?></td>
					<td data-field="name_engineer" data-sortable="true"><?php echo $record['name_engineer'];?></td>
					<td data-field="name_support_parts" data-sortable="true"><?php echo $record['name_support_parts'];?></td>
                    <td data-field="name_pic" data-sortable="true"><?php echo $record['name_pic'];?></td>
					<td data-field="problem" data-sortable="true"><?php echo $record['problem'];?></td>
                    <td data-field="start_time" data-sortable="true"><?php echo $record['start_time'];?></td>
					<td data-field="end_time" data-sortable="true"><?php echo $record['end_time'];?></td>					
					<td data-field="action" data-sortable="true"><a href="detail-daily-activity.php?id=<?php echo $record['id_daily_activity'];?>"><span class="glyphicon glyphicon-eye-open" title="Detail"></a> &nbsp;&nbsp;<a href="edit-daily-activity.php?id=<?php echo $record['id_daily_activity'];?>"><span class="glyphicon glyphicon-pencil" title="Edit"></a></td>   
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



