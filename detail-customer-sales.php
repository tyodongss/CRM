<?php
session_start();
?>
<!--  -->

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Sistem Informasi SNC</title>
<link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
<link rel="icon" href="favicon.ico" type="image/x-icon">

<link href="/css/bootstrap.min.css" rel="stylesheet">
<link href="/css/datepicker3.css" rel="stylesheet">
<link href="/css/bootstrap-table.css" rel="stylesheet">
<link href="/css/styles.css" rel="stylesheet">

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
                                <a class="navbar-brand" href="#"><span class="glyphicon glyphicon-signal"></span> SNC-NOC<span></span></a>
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
				<li class="active">Barang</li>
			</ol>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Detail Customer</h1>
			</div>
		</div><!--/.row-->
<?php 
include "koneksi.php"; 
$id=$_GET['id']; 
$query=mysql_query("select customer.id_customer,customer.nama,customer.alamat,customer.no_telp,customer.contact_person_1,customer.hp_1,customer.email_1,customer.contact_person_2,customer.hp_2,customer.email_2,customer.id_service,service.nama_service,customer.id_bandwidth_down,bandwidth_down.nama_bandwidth_down,customer.id_bandwidth_up,bandwidth_up.nama_bandwidth_up,customer.tanggal_aktivasi,customer.tanggal_terminasi,customer.monthly_fee_idr,customer.monthly_fee_usd,customer.status,customer.remark,customer.created_at,customer.updated_at,customer.deleted_at from customer,service,bandwidth_down,bandwidth_up where customer.id_service=service.id_service and customer.id_bandwidth_down=bandwidth_down.id_bandwidth_down and customer.id_bandwidth_up=bandwidth_up.id_bandwidth_up and id_customer =  '$id'");

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
									  <td><b>Nama Customer</b></td>
									  <td><?php echo $row['nama'];?></td>
									</tr>
									<tr>									  
									  <td><b>Alamat</b></td>
									  <td><?php echo $row['alamat'];?></td>
									</tr>
									<tr>									  
									  <td><b>No. Telepeon</b></td>
									  <td><?php echo $row['no_telp'];?></td>
									</tr>
									<tr>									  
									  <td><b>Contact Person 1</b></td>
									  <td><?php echo $row['contact_person_1'];?></td>
									</tr>
									<tr>									  
									  <td><b>No. HP CP 1</b></td>
									  <td><?php echo $row['hp_1'];?></td>
									</tr>
									<tr>									  
									  <td><b>Email 1</b></td>
									  <td><?php echo $row['email_1'];?></td>
									</tr>
									<tr>									  
									  <td><b>Contact Person 2</b></td>
									  <td><?php echo $row['contact_person_2'];?></td>
									</tr>
									<tr>									  
									  <td><b>No. HP CP 2</b></td>
									  <td><?php echo $row['hp_2'];?></td>
									</tr>
									<tr>									  
									  <td><b>Email 2</b></td>
									  <td><?php echo $row['email_2'];?></td>
									</tr>																		
									<tr>									  
									  <td><b>Service</b></td>
									  <td><?php echo $row['nama_service'];?></td>
									</tr>
									<tr>									  
									  <td><b>Bandwidth Down</b></td>
									  <td><?php echo $row['nama_bandwidth_down'];?></td>
									</tr>
									<tr>									  
									  <td><b>Bandwidth Up</b></td>
									  <td><?php echo $row['nama_bandwidth_up'];?></td>
									</tr>
									<tr>									  
									  <td><b>Tanggal Aktivasi</b></td>
									  <td><?php echo $row['tanggal_aktivasi'];?></td>
									</tr>
									<tr>									  
									  <td><b>Tanggal Terminasi</b></td>
									  <td><?php echo $row['tanggal_terminasi'];?></td>
									</tr>
									<tr>									  
									  <td><b>Monthly Fee IDR</b></td>
									  <td><?php echo $row['monthly_fee_idr'];?></td>
									</tr>
									<tr>									  
									  <td><b>Monthly Fee USD</b></td>
									  <td><?php echo $row['monthly_fee_usd'];?></td>
									</tr>
									<tr>									  
									  <td><b>Status</b></td>
									  <td><?php echo $row['status'];?></td>
									</tr>
									<tr>									  
									  <td><b>Remark</b></td>
									  <td><?php echo $row['remark'];?></td>
									</tr>
									<tr>									  
									  <td><b>Created at</b></td>
									  <td><?php echo $row['created_at'];?></td>
									</tr>
									<tr>									  
									  <td><b>Updated at</b></td>
									  <td><?php echo $row['updated_at'];?></td>
									</tr>
									<tr>									  
									  <td><b>Deleted at</b></td>
									  <td><?php echo $row['deleted_at'];?></td>
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
								<form role="form" action="show-customer-sales.php">
																													
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

	<script src="/js/jquery-1.11.1.min.js"></script>
	<script src="/js/bootstrap.min.js"></script>
	<script src="/js/chart.min.js"></script>
	<script src="/js/chart-data.js"></script>
	<script src="/js/easypiechart.js"></script>
	<script src="/js/easypiechart-data.js"></script>
	<script src="/js/bootstrap-datepicker.js"></script>
	<script src="/js/bootstrap-table.js"></script>
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