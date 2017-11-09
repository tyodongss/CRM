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
				<li class="active">Customer</li>
			</ol>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Ubah Customer</h1>
			</div>
		</div><!--/.row-->
<?php 
include "koneksi.php"; 
$id=$_GET['id']; 
$query=mysql_query("select customer.id_customer,customer.nama,customer.alamat,customer.no_telp,customer.contact_person_1,customer.hp_1,customer.email_1,customer.contact_person_2,customer.hp_2,customer.email_2,customer.id_service,service.nama_service,customer.id_bandwidth_down,bandwidth_down.nama_bandwidth_down,customer.id_bandwidth_up,bandwidth_up.nama_bandwidth_up,customer.tanggal_aktivasi,customer.tanggal_terminasi,customer.monthly_fee_idr,customer.monthly_fee_usd,customer.status,customer.remark from customer,service,bandwidth_down,bandwidth_up where customer.id_service=service.id_service and customer.id_bandwidth_down=bandwidth_down.id_bandwidth_down and customer.id_bandwidth_up=bandwidth_up.id_bandwidth_up and id_customer =  '$id'"); 
?> 
<?php 
while($row=mysql_fetch_array($query)){ 
?> 		
		
		<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default">
					<!--<div class="panel-heading">Customer</div>-->
					<div class="panel-body">
						<div class="col-md-6">
														<form role="form" action="update-customer-sales.php" method="post">
							<input type="hidden" name="_token" value="L8C5ujpOh4UEsaNko2Y3pkuzP714OtRymsXPqrNJ">
                                                        <input type="hidden" name="id" value="<?php echo $id;?>"/>

								<div class="form-group">
									<label>Nama Customer</label>
									<input class="form-control" name="nama" value="<?php echo $row['nama'];?>" required> <div class="help-block with-errors"></div>
								</div>
								
								<div class="form-group">
									<label>Alamat</label>
									<input class="form-control" name="alamat" value="<?php echo $row['alamat'];?>" required> <div class="help-block with-errors"></div>
								</div>
								
								<div class="form-group">
									<label>No. Telepon</label>
									<input class="form-control" name="no_telp" value="<?php echo $row['no_telp'];?>" maxlength="25" required> <div class="help-block with-errors"></div>
								</div>
								
								<div class="form-group">
									<label>Contact Person 1</label>
									<input class="form-control" name="contact_person_1" value="<?php echo $row['contact_person_1'];?>" maxlength="40" required> <div class="help-block with-errors"></div>
								</div>

								<div class="form-group">
									<label>No. HP CP 1</label>
									<input class="form-control" name="hp_1" value="<?php echo $row['hp_1'];?>" maxlength="25" required> <div class="help-block with-errors"></div>
								</div>
								
								<div class="form-group">
									<label>Email 1</label>
									<input class="form-control" name="email_1" value="<?php echo $row['email_1'];?>" maxlength="75" required> <div class="help-block with-errors"></div>
								</div>

								<div class="form-group">
									<label>Contact Person 2</label>
									<input class="form-control" name="contact_person_2" value="<?php echo $row['contact_person_2'];?>" maxlength="40"> 
								</div>

								<div class="form-group">
									<label>No. HP CP 2</label>
									<input class="form-control" name="hp_2" value="<?php echo $row['hp_2'];?>" maxlength="25"> 
								</div>
								
								<div class="form-group">
									<label>Email 2</label>
									<input class="form-control" name="email_2" value="<?php echo $row['email_2'];?>" maxlength="75"> 
								</div>

								<div class="form-group">
									<label>Service</label>
									<select class="form-control" name="id_service">
									
									<option selected value="<?php echo $row['id_service'];?>"><?php echo $row['nama_service'];?></option>
									<?php
									include "koneksi.php";
									$sql = mysql_query("SELECT * FROM service order by nama_service asc");
									if(mysql_num_rows($sql) != 0){
									while($data = mysql_fetch_assoc($sql)){
									echo '<option value="'.$data['id_service'].'" >'.$data['nama_service'].'</option>';
										}
									}
									?>
								</select>
								</div>

								<div class="form-group">
									<label>Bandwidth Down</label>
									<select class="form-control" name="id_bandwidth_down">
									
									<option selected value="<?php echo $row['id_bandwidth_down'];?>"><?php echo $row['nama_bandwidth_down'];?></option>
									<?php
									include "koneksi.php";
									$sql = mysql_query("SELECT * FROM bandwidth_down order by nama_bandwidth_down asc");
									if(mysql_num_rows($sql) != 0){
									while($data = mysql_fetch_assoc($sql)){
									echo '<option value="'.$data['id_bandwidth_down'].'" >'.$data['nama_bandwidth_down'].'</option>';
										}
									}
									?>
								</select>
								</div>

								<div class="form-group">
									<label>Bandwidth Up</label>
									<select class="form-control" name="id_bandwidth_up">
									
									<option selected value="<?php echo $row['id_bandwidth_up'];?>"><?php echo $row['nama_bandwidth_up'];?></option>
									<?php
									include "koneksi.php";
									$sql = mysql_query("SELECT * FROM bandwidth_up order by nama_bandwidth_up asc");
									if(mysql_num_rows($sql) != 0){
									while($data = mysql_fetch_assoc($sql)){
									echo '<option value="'.$data['id_bandwidth_up'].'" >'.$data['nama_bandwidth_up'].'</option>';
										}
									}
									?>
								</select>
								</div>

                                                                <div class="form-group">
									<label>Tanggal Aktivasi</label>
									<input class="form-control" data-provide="datepicker" data-date-format="yyyy/mm/dd" name="tanggal_aktivasi" value="<?php echo $row['tanggal_aktivasi'];?>" required>
									<div class="help-block with-errors"></div>
								</div>

                                                                <div class="form-group">
									<label>Tanggal Terminasi</label>
									<input class="form-control" data-provide="datepicker" data-date-format="yyyy/mm/dd" name="tanggal_terminasi" value="<?php echo $row['tanggal_terminasi'];?>">
								</div>

								<div class="form-group">
									<label>Monthly Fee (IDR)</label>
									<input class="form-control" name="monthly_fee_idr" value="<?php echo $row['monthly_fee_idr'];?>">
								</div>								

								<div class="form-group">
									<label>Monthly Fee (USD)</label>
									<input class="form-control" name="monthly_fee_usd" value="<?php echo $row['monthly_fee_usd'];?>">
								</div>								

								<div class="form-group">
									<label>Status</label>
									<select class = "form-control" name="status"> 
<option selected value="<?php echo $row['status'];?>"><?php echo $row['status'];?></option>
									<option>Active</option>
									<option>Terminate</option>
									<option>Suspend</option>
									</select>
								</div>
								
								<div class="form-group">
									<label>Remark</label>
									<input class="form-control" name="remark" value="<?php echo $row['remark'];?>">
								</div>								
															
								
                                <button type="submit" class="btn btn-primary">Update</button>
								<a href="../show-customer-sales.php" class="btn btn-default">Back</a>
								
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
