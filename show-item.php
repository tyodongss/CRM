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
				<li class="active">Item</li>
			</ol>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Item</h1>
			</div>
		</div><!--/.row-->
				
<?php

include "koneksi.php";

$sql = "select items.id_items, items.serial_number, type.name_type, model.name_model, items.date_purchase, items.contract_condition, customer.name_customer, items.ip_address, items.status, items.remark from items,type,model, customer where items.id_type=type.id_type and items.id_model=model.id_model and items.id_customer=customer.id_customer order by id_items desc";

$hasil = mysql_query($sql);	
?>		
		<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default">
					<div class="panel-heading"><a href="add-item.php" class="btn btn-primary btn-md">Add New Item</a></div>
					<div class="panel-body">


						<table data-toggle="table" data-url="tables/data1.json"  data-show-refresh="true" data-show-toggle="true" data-show-columns="true" data-search="true" data-select-item-name="toolbar1" data-pagination="yes" >
						    <thead>
						    <tr>
							    <th data-field="itemid" data-sortable="true">No</th>
						        <th data-field="serial_number"  data-sortable="true">Serial Number</th>
							    <th data-field="name_type" data-sortable="true">Type</th>
								<th data-field="name_model" data-sortable="true">Model</th>
								<th data-field="date_purchase" data-sortable="true">Date Purchase</th>
								<th data-field="contract_condition" data-sortable="true">Contract</th>
								<th data-field="name_customer" data-sortable="true">Location</th>
								<th data-field="ip_address" data-sortable="true">IP Address</th>
								<th data-field="status" data-sortable="true">Status</th>
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
								<td data-field="name_type" data-sortable="true"><?php echo $record['name_type'];?></td>
								<td data-field="name_model" data-sortable="true"><?php echo $record['name_model'];?></td>
								<td data-field="date_purchase" data-sortable="true"><?php echo $record['date_purchase'];?></td>
								<td data-field="contract_condition" data-sortable="true"><?php echo $record['contract_condition'];?></td>
								<td data-field="name_customer" data-sortable="true"><?php echo $record['name_customer'];?></td>
								<td data-field="ip_address" data-sortable="true"><?php echo $record['ip_address'];?></td>
								<td data-field="status" data-sortable="true"><?php echo $record['status'];?></td>
						       	<td data-field="action" data-sortable="true"><a href="detail-item.php?id=<?php echo $record['id_items'];?>"><span class="glyphicon glyphicon-eye-open" title="Detail"></a> &nbsp;&nbsp;<a href="edit-item.php?id=<?php echo $record['id_items'];?>"><span class="glyphicon glyphicon-pencil" title="Edit"></a>&nbsp;&nbsp;<a href="history-item.php?id=<?php echo $record['id_items'];?>"><span class="glyphicon glyphicon-tasks" title="History"></a></td>
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

