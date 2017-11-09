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
				<li class="active">Item</li>
			</ol>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Detail Item</h1>
			</div>
		</div><!--/.row-->
<?php 
include "koneksi.php"; 
$id=$_GET['id']; 
$query=mysql_query("SELECT items.id_items, items.serial_number, type.name_type, model.name_model, items.from_purchase, items.date_purchase, items.contract_condition, customer.name_customer, items.ip_address, items.status, items.remark from items,type,model,customer where items.id_type=type.id_type and items.id_model=model.id_model and items.id_customer=customer.id_customer and id_items='$id'"); 
?> 
<?php 
while($row=mysql_fetch_array($query)){ 
?> 		
		
		<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default">
						<table class="table table-striped">
								  <tbody>
									<tr>									  
									  <td width="40%"><b>Serial Number</b></td>
									  <td><?php echo $row['serial_number'];?></td>
									</tr>
									<tr>									  
									  <td width="40%"><b>Type</b></td>
									  <td><?php echo $row['name_type'];?></td>
									</tr>
									<tr>									  
									  <td width="40%"><b>Model</b></td>
									  <td><?php echo $row['name_model'];?></td>
									</tr>
									<tr>									  
									  <td width="40%"><b>Purchased from</b></td>
									  <td><?php echo $row['from_purchase'];?></td>
									</tr>
									<tr>									  
									  <td width="40%"><b>Date Purchase</b></td>
									  <td><?php echo $row['date_purchase'];?></td>
									</tr>
									<tr>									  
									  <td width="40%"><b>Contract Condition</b></td>
									  <td><?php echo $row['contract_condition'];?></td>
									</tr>
									<tr>									  
									  <td width="40%"><b>Location</b></td>
									  <td><?php echo $row['name_customer'];?></td>
									</tr>
									<tr>									  
									  <td width="40%"><b>IP Address</b></td>
									  <td><?php echo $row['ip_address'];?></td>
									</tr>
									<tr>									  
									  <td width="40%"><b>Status</b></td>
									  <td><?php echo $row['status'];?></td>
									</tr>
									<tr>									  
									  <td width="40%"><b>Remark</b></td>
									  <td><?php echo $row['remark'];?></td>
									</tr>
								  </tbody>
								</table>								
						</div>
				</div>
		</div>
		
		
		<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default">
					<!--<div class="panel-heading">Stok Masuk</div>-->
					<div class="panel-body">
						<div class="col-md-6">
								<form role="form" action="show-item.php">
																													
								<button class="btn btn-default">Back</button>
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
