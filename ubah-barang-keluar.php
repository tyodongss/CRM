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
				<li class="active">Barang Keluar</li>
			</ol>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Ubah Barang Keluar</h1>
			</div>
		</div><!--/.row-->
<?php 
include "koneksi.php"; 
$id=$_GET['id']; 
//$query = mysql_query("SELECT barang_keluar.id_barangKeluar, barang_keluar.tanggal, barang_keluar.swos,barang_keluar.created_at, barang_keluar.updated_at, barang_keluar.deleted_at, barang.serial_number, customer.nama, engineer.nama_engineer FROM barang_keluar JOIN barang ON barang_keluar.id_barang = barang.id_barang JOIN customer ON barang_keluar.id_customer = customer.id_customer JOIN engineer ON barang_keluar.id_engineer = engineer.id_engineer where id_barangKeluar = '$id'");
$query = mysql_query("select * from barang_keluar,barang,customer,engineer where id_barangKeluar='$id' and barang_keluar.id_barang=barang.id_barang and barang_keluar.id_customer=customer.id_customer and barang_keluar.id_engineer=engineer.id_engineer"); 
	
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
							<form data-toggle="validator" role="form" action="update-barang-keluar.php" method="post">
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
									<label>Nama Customer</label>
									<select class="form-control" name="id_customer">
									<option selected value="<?php echo $row['id_customer'];?>"><?php echo $row['nama'];?></option>
									<?php
									include "koneksi.php";
									$sql = mysql_query("SELECT * FROM customer order by nama asc");
									if(mysql_num_rows($sql) != 0){
									while($data = mysql_fetch_assoc($sql)){
									echo '<option value="'.$data['id_customer'].'" >'.$data['nama'].'</option>';
										}
									}
									?>
								</select>
								</div>
								
								 <div class="form-group">
                                    <label>Nama BTS</label>
                                    <select class = "form-control" name="bts">
                                    <option selected value="<?php echo $row['bts'];?>"><?php echo $row['bts'];?></option>
                                    <option></option>
                                    <option>AIS</option>
                                    <option>Basimpekab SGT</option>
									<option>BCT</option>
									<option>BDI</option>
									<option>BRI</option>
									<option>Embarkasi</option>
									<option>Graha Bintang</option>
									<option>Joko</option>
									<option>KCM</option>
									<option>PDAM</option>
									<option>Sangatta</option>
									<option>Senyiur</option>
									<option>Sepinggan Pratama</option>
									<option>SNC Office</option>
									<option>Surya-KPC SGT</option>
									<option>TV8</option>
									<option>UHT</option>
									<option>Villabeta</option>
                                    </select>
                                </div>

								<div class="form-group">
									<label>Tanggal</label>
									<input class="form-control" data-provide="datepicker" data-date-format="yyyy/mm/dd" name="tanggal" value="<?php echo $row['tanggal'];?>" readonly>
								</div>

								<div class="form-group">
									<label>Nama Engineer</label>
									<select class="form-control" name="id_engineer">
									<option selected value="<?php echo $row['id_engineer'];?>"><?php echo $row['nama_engineer'];?></option>
									<?php
									include "koneksi.php";
									$sql = mysql_query("SELECT * FROM engineer order by nama_engineer asc");
									if(mysql_num_rows($sql) != 0){
									while($data = mysql_fetch_assoc($sql)){
									echo '<option value="'.$data['id_engineer'].'" >'.$data['nama_engineer'].'</option>';
										}
									}
									?>
								</select>
								</div>

								<div class="form-group">
									<label>Swos</label>
									<input class="form-control" name="swos" value="<?php echo $row['swos'];?>" maxlength="5" >
								</div>
																
								<button type="submit" class="btn btn-default">Update</button>							
								<a href="../show-barang-keluar.php" class="btn btn-default">Back</a>
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
