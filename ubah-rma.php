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
				<li class="active">RMA</li>
			</ol>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Ubah RMA</h1>
			</div>
		</div><!--/.row-->
<?php 
include "koneksi.php"; 
$id=$_GET['id']; 
$query = mysql_query("select * from rma,barang,vendor where id_rma='$id' and rma.id_barang=barang.id_barang and rma.id_vendor=vendor.id_vendor"); 
	
?> 
<?php 
while($row=mysql_fetch_array($query)){ 
?> 		
		
		<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default">
					<!--<div class="panel-heading">Stok Masuk</div>-->
					<div class="panel-body">
						<div class="col-md-6">
							<form data-toggle="validator" role="form" action="update-rma.php" method="post">
							<input type="hidden" name="_token" value="L8C5ujpOh4UEsaNko2Y3pkuzP714OtRymsXPqrNJ">
                                                        <input type="hidden" name="id" value="<?php echo $id;?>"/> 

								<div class="form-group">
									<label>Serial Number</label>
									<select class="form-control" name="id_barang">
									<option selected value="<?php echo $row['id_barang'];?>"><?php echo $row['serial_number'];?></option>
									<?php
									include "koneksi.php";
									$sql = mysql_query("SELECT * FROM barang order by serial_number asc");
									if(mysql_num_rows($sql) != 0){
									while($data = mysql_fetch_assoc($sql)){
									echo '<option value="'.$data['id_barang'].'" >'.$data['serial_number'].'</option>';
										}
									}
									?>
								</select>
								</div>

                                    <div class="form-group">
									<label>Nama Vendor</label>
									<select class="form-control" name="id_vendor">
									<option selected value="<?php echo $row['id_vendor'];?>"><?php echo $row['nama_vendor'];?></option>
									<?php
									include "koneksi.php";
									$sql = mysql_query("SELECT * FROM vendor order by nama_vendor asc");
									if(mysql_num_rows($sql) != 0){
									while($data = mysql_fetch_assoc($sql)){
									echo '<option value="'.$data['id_vendor'].'" >'.$data['nama_vendor'].'</option>';
										}
									}
									?>
								</select>
								</div>

								<div class="form-group">
									<label>Status RMA</label>
									<select class = "form-control" name="status_rma"> 
<option selected value="<?php echo $row['status_rma'];?>"><?php echo $row['status_rma'];?></option>
									<option>dikirim RMA</option>
									<option>selesai RMA</option>
									</select>
								</div>

								<div class="form-group">
									<label>Tanggal Kirim</label>
									<input class="form-control" data-provide="datepicker" data-date-format="yyyy/mm/dd" name="tgl_kirim" value="<?php echo $row['tgl_kirim'];?>">
								</div>

	                            <div class="form-group">
									<label>Tanggal Selesai</label>
									<input class="form-control" data-provide="datepicker" data-date-format="yyyy/mm/dd" name="tgl_selesai" value="">
								</div>
																
								<button type="submit" class="btn btn-default">Update</button>							
								<a href="../show-rma.php" class="btn btn-default">Back</a>
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
	<script src="/js/validator.js"></script>
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
