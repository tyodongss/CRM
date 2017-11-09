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
        <?php include ('menu.php') ?>

<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">


		<div class="row">
			<ol class="breadcrumb">
				<li><a href="#"><span class="glyphicon glyphicon-home"></span></a></li>
				<li class="active">Barang Update</li>
			</ol>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Detail Barang Update</h1>
			</div>
		</div><!--/.row-->
<?php 
include "koneksi.php"; 
$id=$_GET['id']; 

$query=mysql_query("SELECT barang_update.id_barang_update, barang_update.swos, barang.serial_number, barang_update.id_barang, item.code_item, item.nama_item, barang_update.tgl_barang_update, barang_update.id_customer, customer.nama, barang_update.id_bts, bts.nama_bts, barang_update.id_engineer, engineer.nama_engineer, barang_update.id_vendor, vendor.nama_vendor, barang_update.swos, barang_update.keterangan, barang_update.status_rma, barang_update.created_at, barang_update.updated_at, barang_update.deleted_at
          FROM barang_update, item, customer, bts, engineer, vendor, barang
          WHERE id_barang_update =  '$id'
          AND barang_update.id_barang = barang.id_barang
          AND barang.code_item = item.code_item
          AND barang_update.id_customer = customer.id_customer
          AND barang_update.id_engineer = engineer.id_engineer
          AND barang_update.id_vendor = vendor.id_vendor
          AND barang_update.id_bts = bts.id_bts");
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
									  <td width="40%"><b>Swos</b></td>
									  <td><?php echo $row['swos'];?></td>
									</tr>
                                    <tr>									  
									  <td width="40%"><b>Code Item</b></td>
									  <td><?php echo $row['code_item'];?></td>
									</tr>
									<tr>									  
									  <td width="40%"><b>Nama Item</b></td>
									  <td><?php echo $row['nama_item'];?></td>
									</tr>
									 <tr>									  
									  <td width="40%"><b>Serial Number</b></td>
									  <td><?php echo $row['serial_number'];?></td>
									</tr>
									<tr>									  
									  <td width="40%"><b>Keterangan</b></td>
									  <td><?php echo $row['keterangan'];?></td>
									</tr>
									<tr>									  
									  <td width="40%"><b>Tanggal Update</b></td>
									  <td><?php echo $row['tgl_barang_update'];?></td>
									</tr>
									<tr>									  
									  <td width="40%"><b>Nama Customer</b></td>
									  <td><?php echo $row['nama'];?></td>
									</tr>
									<tr>									  
									  <td width="40%"><b>Nama BTS</b></td>
									  <td><?php echo $row['nama_bts'];?></td>
									</tr>
									<tr>									  
									  <td width="40%"><b>Nama Engineer</b></td>
									  <td><?php echo $row['nama_engineer'];?></td>
									</tr>
									<tr>									  
									  <td width="40%"><b>Swos</b></td>
									  <td><?php echo $row['swos'];?></td>
									</tr>
									<tr>									  
									  <td width="40%"><b>Nama Vendor</b></td>
									  <td><?php echo $row['nama_vendor'];?></td>
									</tr>
									<tr>									  
									  <td width="40%"><b>Status RMA</b></td>
									  <td><?php echo $row['status_rma'];?></td>
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
								<form role="form" action="show-barang-update.php">
																													
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
