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
	<div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">
		<!--
		<form role="search">
			<div class="form-group">
				<input type="text" class="form-control" placeholder="Search">
			</div>
		</form>
		-->
	<?php include ('menu.php') ?>
		<!--	
	==================================================== MENU
	-->
		
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">			
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="#"><span class="glyphicon glyphicon-home"></span></a></li>
				<li class="active">Item Update</li>
			</ol>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Item Update</h1>
			</div>
		</div><!--/.row-->
				
<?php

include "koneksi.php";
#New Install
$sql = "SELECT items_update.id_items_update, items_update.id_items, items.serial_number, items_update.date_update, items_update.purpose, items_update.purpose_name_item, customer.name_customer, engineer.name_engineer
		FROM items_update, items, customer, engineer
		WHERE items_update.id_items = items.id_items
		and items_update.id_customer = customer.id_customer
		and items_update.id_engineer = engineer.id_engineer
		and purpose = 'New Install'
		ORDER BY items_update.id_items_update DESC";

$hasil = mysql_query($sql);	
?>		
		<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default">
					<div class="panel-heading"><a href="add-item-update.php" class="btn btn-primary btn-md">Add Item Update</a></div>
					<div class="panel-body">

						<ul class="nav nav-tabs">
						  <li class="active"><a data-toggle="tab" href="#newinstall">New Install</a></li>
						  <li><a data-toggle="tab" href="#replacement">Replacement</a></li>
						  <li><a data-toggle="tab" href="#dismantle">Dismantle</a></li>
						</ul>

						<div class="tab-content">
  							<div id="newinstall" class="tab-pane fade in active">

						<table data-toggle="table" data-url="tables/data1.json"  data-show-refresh="true" data-show-toggle="true" data-show-columns="true" data-search="true" data-select-item-name="toolbar1" data-pagination="true" >
						    <thead>
						    <tr>
							    <th data-field="itemid" data-sortable="true">No</th>
							    <th data-field="serial_number"  data-sortable="true">Serial Number</th>
						        <th data-field="date_update"  data-sortable="true">Date Update</th>
							    <th data-field="purpose_name_item" data-sortable="true">Purpose Name</th>
						        <th data-field="name_customer" data-sortable="true">Customer</th>
								<th data-field="name_engineer" data-sortable="true">Engineer</th>
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
								<td data-field="serial_number" data-sortable="true"><?php echo $record['serial_number'];?></td>
								<td data-field="date_update" data-sortable="true"><?php echo $record['date_update'];?></td>
								<td data-field="purpose_name_item" data-sortable="true"><?php echo $record['purpose_name_item'];?></td>
								<td data-field="name_customer" data-sortable="true"><?php echo $record['name_customer'];?></td>
								<td data-field="name_engineer" data-sortable="true"><?php echo $record['name_engineer'];?></td>
						       	<td data-field="action" data-sortable="true"><a href="detail-item-update.php?id=<?php echo $record['id_items'];?>"><span class="glyphicon glyphicon-eye-open" title="Detail"></a> &nbsp;&nbsp;<a href="edit-item-update.php?id=<?php echo $record['id_items'];?>"><span class="glyphicon glyphicon-pencil" title="Edit"></a> &nbsp;&nbsp;</td>
						    </tr>
<?php
}
?>					    							
						 	</tbody>
						</table>
					</div>

<?php
#Replacement
$sql2 = "SELECT items_update.id_items_update, items_update.id_items, items.serial_number, items_update.date_update, items_update.purpose, items_update.purpose_name_item, customer.name_customer, engineer.name_engineer
		FROM items_update, items, customer, engineer
		WHERE items_update.id_items = items.id_items
		and items_update.id_customer = customer.id_customer
		and items_update.id_engineer = engineer.id_engineer
		and purpose = 'Replacement'
		ORDER BY items_update.id_items_update DESC";

$hasil2 = mysql_query($sql2);	
?>

				<div id="replacement" class="tab-pane fade">
					<table data-toggle="table" data-url="tables/data1.json"  data-show-refresh="true" data-show-toggle="true" data-show-columns="true" data-search="true" data-select-item-name="toolbar1" data-pagination="true" >
						    <thead>
						    <tr>
							    <th data-field="itemid" data-sortable="true">No</th>
							    <th data-field="serial_number"  data-sortable="true">Serial Number</th>
						        <th data-field="date_update"  data-sortable="true">Date Update</th>
							    <th data-field="purpose_name_item" data-sortable="true">Purpose Name</th>
						        <th data-field="name_customer" data-sortable="true">Customer</th>
								<th data-field="name_engineer" data-sortable="true">Engineer</th>
						        <th data-field="action" data-sortable="true">Action</th>
						    </tr>
							</thead>
							<tbody>
<?php						
$no=0;
while($record2 = mysql_fetch_array($hasil2)){
?>
						   <tr>
								<td data-field="itemid" data-sortable="true"><?php echo $no=$no+1;?></td>
								<td data-field="serial_number" data-sortable="true"><?php echo $record2['serial_number'];?></td>
								<td data-field="date_update" data-sortable="true"><?php echo $record2['date_update'];?></td>
								<td data-field="purpose_name_item" data-sortable="true"><?php echo $record2['purpose_name_item'];?></td>
								<td data-field="name_customer" data-sortable="true"><?php echo $record2['name_customer'];?></td>
								<td data-field="name_engineer" data-sortable="true"><?php echo $record2['name_engineer'];?></td>
						       	<td data-field="action" data-sortable="true"><a href="detail-item-update.php?id=<?php echo $record2['id_items'];?>"><span class="glyphicon glyphicon-eye-open" title="Detail"></a> &nbsp;&nbsp;<a href="edit-item-update.php?id=<?php echo $record2['id_items'];?>"><span class="glyphicon glyphicon-pencil" title="Edit"></a> &nbsp;&nbsp;</td>
						    </tr>
<?php
}
?>					    							
						 	</tbody>
						</table>
					</div>
<?php
#Dismantle
$sql3 = "SELECT items_update.id_items_update, items_update.id_items, items.serial_number, items_update.date_update, items_update.purpose, items_update.purpose_name_item, customer.name_customer, engineer.name_engineer
		FROM items_update, items, customer, engineer
		WHERE items_update.id_items = items.id_items
		and items_update.id_customer = customer.id_customer
		and items_update.id_engineer = engineer.id_engineer
		and purpose = 'Dismantle'
		ORDER BY items_update.id_items_update DESC";

$hasil3 = mysql_query($sql3);	
?>

				<div id="dismantle" class="tab-pane fade">
					<table data-toggle="table" data-url="tables/data1.json"  data-show-refresh="true" data-show-toggle="true" data-show-columns="true" data-search="true" data-select-item-name="toolbar1" data-pagination="true" >
						    <thead>
						    <tr>
							    <th data-field="itemid" data-sortable="true">No</th>
							    <th data-field="serial_number"  data-sortable="true">Serial Number</th>
						        <th data-field="date_update"  data-sortable="true">Date Update</th>
							    <th data-field="purpose_name_item" data-sortable="true">Purpose Name</th>
						        <th data-field="name_customer" data-sortable="true">Customer</th>
								<th data-field="name_engineer" data-sortable="true">Engineer</th>
						        <th data-field="action" data-sortable="true">Action</th>
						    </tr>
							</thead>
							<tbody>
<?php						
$no=0;
while($record3 = mysql_fetch_array($hasil3)){
?>
						   <tr>
								<td data-field="itemid" data-sortable="true"><?php echo $no=$no+1;?></td>
								<td data-field="serial_number" data-sortable="true"><?php echo $record3['serial_number'];?></td>
								<td data-field="date_update" data-sortable="true"><?php echo $record3['date_update'];?></td>
								<td data-field="purpose_name_item" data-sortable="true"><?php echo $record3['purpose_name_item'];?></td>
								<td data-field="name_customer" data-sortable="true"><?php echo $record3['name_customer'];?></td>
								<td data-field="name_engineer" data-sortable="true"><?php echo $record3['name_engineer'];?></td>
						       	<td data-field="action" data-sortable="true"><a href="detail-item-update.php?id=<?php echo $record3['id_items'];?>"><span class="glyphicon glyphicon-eye-open" title="Detail"></a> &nbsp;&nbsp;<a href="edit-item-update.php?id=<?php echo $record3['id_items'];?>"><span class="glyphicon glyphicon-pencil" title="Edit"></a> &nbsp;&nbsp;</td>
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

