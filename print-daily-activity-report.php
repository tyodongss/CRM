<?php 
session_start(); 
?>

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

    <div class="row">
        <div class="col-lg-12">
            <center><h1 class="page-header">Daily Activity Report</h1></center>
            
            <?php
            include "koneksi.php";

            $tgl=$_POST['date'];
            $time1 =$_POST['time1'];
            $time2 = $_POST['time2'];
            $name_engineer = $_POST['name_engineer'];
              

            ?>
      <center><h5>Period date from <b><?php echo $time1;?></b> until <b><?php echo $time2;?></b></h5></center>
      <?php            

            if ($name_engineer=="All"){
 
            $sql = "SELECT daily_activity.id_daily_activity, engineer.id_engineer, engineer.name_engineer, support_parts.id_support_parts, support_parts.name_support_parts, daily_activity.activity, customer.id_customer, customer.name_customer, daily_activity.start_time, daily_activity.end_time, timediff(daily_activity.end_time, daily_activity.start_time) as duration, daily_activity.remark, daily_activity.created_at, daily_activity.updated_at, daily_activity.deleted_at
					FROM daily_activity, engineer, support_parts, customer
					WHERE daily_activity.id_engineer=engineer.id_engineer
					AND daily_activity.id_support_parts=support_parts.id_support_parts
					AND daily_activity.id_customer=customer.id_customer
					AND start_time
					BETWEEN  '$time1' AND '$time2' 
					ORDER BY id_daily_activity DESC";		

            } else if ($name_engineer=="$name_engineer"){
 
            $sql = "SELECT daily_activity.id_daily_activity, engineer.id_engineer, engineer.name_engineer, support_parts.id_support_parts, support_parts.name_support_parts, daily_activity.activity, customer.id_customer, customer.name_customer, daily_activity.start_time, daily_activity.end_time, timediff(daily_activity.end_time, daily_activity.start_time) as duration, daily_activity.remark, daily_activity.created_at, daily_activity.updated_at, daily_activity.deleted_at
					FROM daily_activity, engineer, support_parts, customer
					WHERE daily_activity.id_engineer=engineer.id_engineer
					AND daily_activity.id_support_parts=support_parts.id_support_parts
					AND daily_activity.id_customer=customer.id_customer
					AND name_engineer =  '$name_engineer'
					AND start_time
					BETWEEN  '$time1' AND '$time2' 
					ORDER BY id_daily_activity DESC";			

            } else {
            $sql = "SELECT daily_activity.id_daily_activity, engineer.id_engineer, engineer.name_engineer, support_parts.id_support_parts, support_parts.name_support_parts, daily_activity.activity, customer.id_customer, customer.name_customer, daily_activity.start_time, daily_activity.end_time, timediff(daily_activity.end_time, daily_activity.start_time) as duration, daily_activity.remark, daily_activity.created_at, daily_activity.updated_at, daily_activity.deleted_at
					FROM daily_activity, engineer, support_parts, customer
					WHERE daily_activity.id_engineer=engineer.id_engineer
					AND daily_activity.id_support_parts=support_parts.id_support_parts
					AND daily_activity.id_customer=customer.id_customer
					AND name_engineer =  '$name_engineer'
					AND start_time = '$tgl' 
					ORDER BY id_daily_activity DESC";	

            }

            $hasil = mysql_query($sql); 
			$row = mysql_num_rows(mysql_query($sql));
            ?>

<form action="pdf.php" method="POST">

            <table data-toggle="table" data-url="tables/data1.json"  data-show-refresh="false" data-show-toggle="false" data-show-columns="false" data-search="false" data-select-item-name="toolbar1" data-pagination="false" >
                            <thead>
                            <tr>
                                <th data-field="itemid"  data-filter-control="input">No</th>                                
								<th data-field="name_engineer"  data-sortable="true">Engineer Name</th>
								<th data-field="name_support_parts" data-sortable="true">Support Parts</th>
								<th data-field="activity" data-sortable="true">Activity</th>
								<th data-field="name_customer" data-sortable="true">Customer Name</th>
								<th data-field="start_time" data-sortable="true">Start Time</th>
								<th data-field="end_time" data-sortable="true">End Time</th>
								<th data-field="duration" data-sortable="true">Duration</th>
								<th data-field="remark" data-sortable="true">Remark</th>
                                
                            </tr>
                            </thead>
                            <tbody>
<?php                       
$no=0;
while($record = mysql_fetch_array($hasil)){
?>
                           <tr>
                                <td data-field="itemid" data-sortable="true"><?php echo $no=$no+1;?><input type="hidden" value="<?php echo $no=$no+1;?>" name="no[]"></td>
								<td data-field="name_engineer" data-sortable="true"><?php echo $record['name_engineer'];?><input type="hidden" value="<?php echo $record['name_engineer'];?>" name="name_engineer[]"></td>
								<td data-field="name_support_parts" data-sortable="true"><?php echo $record['name_support_parts'];?><input type="hidden" value="<?php echo $record['name_support_parts'];?>" name="name_support_parts[]"></td>
								<td data-field="activity" data-sortable="true"><?php echo $record['activity'];?><input type="hidden" value="<?php echo $record['activity'];?>" name="activity[]"></td>
								<td data-field="name_customer" data-sortable="true"><?php echo $record['name_customer'];?><input type="hidden" value="<?php echo $record['name_customer'];?>" name="name_customer[]"></td>
								<td data-field="start_time" data-sortable="true"><?php echo $record['start_time'];?><input type="hidden" value="<?php echo $record['start_time'];?>" name="start_time[]"></td>
								<td data-field="end_time" data-sortable="true"><?php echo $record['end_time'];?><input type="hidden" value="<?php echo $record['end_time'];?>" name="end_time[]"></td>
								<td data-field="duration" data-sortable="true"><?php echo $record['duration'];?><input type="hidden" value="<?php echo $record['duration'];?>" name="duration[]"></td>
								<td data-field="remark" data-sortable="true"><?php echo $record['remark'];?><input type="hidden" value="<?php echo $record['remark'];?>" name="remark[]"></td>
                            </tr>
<?php
}
?>                     
                            </tbody>
                        </table>
                                 

        </div>
    </div><!--/.row-->
</div>

<input type="hidden" value="<?php print $_SESSION['name_engineer']?>" name="name_engineer2">
<input type="hidden" value="<?php print $row ?>" name="row">
<input type="hidden" value="<?php print $time1 ?>" name="rstart">
<input type="hidden" value="<?php print $time2 ?>" name="rfinish">
<input type="hidden" value="daily_activity" name="menu">
<input type="hidden" name="nama_cust" value="<?php print $tambahan['name_customer']?>">
<?php
if ($name_engineer!="All"){
?>
<label>Export PDF</label>
<select name="menucat">
	<option value="backbone-problem-internal" selected>Internal Version</option>
	<option value="backbone-problem-cust">Customer Version</option>
</select>
<input type="submit" value="EXPORT TO PDF">
<? } else { ?>
<input type="submit" value="EXPORT TO PDF">
<?php } ?>

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