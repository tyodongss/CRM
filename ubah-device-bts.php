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
				<li class="active">Device BTS</li>
			</ol>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Ubah Device BTS</h1>
			</div>
		</div><!--/.row-->
<?php 
include "koneksi.php"; 
$id=$_GET['id']; 
$query = mysql_query("select device_bts.id_device_bts,device_bts.nama_device,device_bts.id_bts,bts.nama_bts,device_bts.ssid,device_bts.id_band,band.nama_band,device_bts.channel_width,device_bts.id_frequency,frequency.nama_frequency,device_bts.ipaddress,device_bts.radio_name,device_bts.id_kind_radio,kind_radio.nama_kind_radio,device_bts.mac,device_bts.id_security,security.nama_security,device_bts.mode,device_bts.power,device_bts.card,device_bts.rb,device_bts.remark, device_bts.created_at, device_bts.updated_at, device_bts.deleted_at from device_bts,bts,band,frequency,kind_radio,security where bts.id_bts=device_bts.id_bts and band.id_band=device_bts.id_band and frequency.id_frequency=device_bts.id_frequency and kind_radio.id_kind_radio=device_bts.id_kind_radio and security.id_security=device_bts.id_security and id_device_bts='$id' ");
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
														<form role="form" action="update-device-bts.php" method="post">
							<input type="hidden" name="_token" value="L8C5ujpOh4UEsaNko2Y3pkuzP714OtRymsXPqrNJ">
                                                        <input type="hidden" name="id" value="<?php echo $id;?>"/>
								<div class="form-group">
									<label>Nama Device</label>
									<input class="form-control" name="nama_device" value="<?php echo $row['nama_device'];?>">
								</div>
								
								<div class="form-group">
									<label>Nama BTS</label>
									<select class="form-control" name="id_bts">
									<option>---- Pilih BTS ----</option>
									<option selected value="<?php echo $row['id_bts'];?>"><?php echo $row['nama_bts'];?></option>
									<?php
									include "koneksi.php";
									$sql = mysql_query("SELECT * FROM bts order by nama_bts asc");
									if(mysql_num_rows($sql) != 0){
									while($data = mysql_fetch_assoc($sql)){
									echo '<option value="'.$data['id_bts'].'" >'.$data['nama_bts'].'</option>';
										}
									}
									?>
								</select>
								</div>
								
								<div class="form-group">
									<label>SSID</label>
									<input class="form-control" name="ssid" value="<?php echo $row['ssid'];?>">
								</div>
								
								<div class="form-group">
									<label>Band</label>
									<select class="form-control" name="id_band">
									<option>---- Pilih Band ----</option>
									<option selected value="<?php echo $row['id_band'];?>"><?php echo $row['nama_band'];?></option>
									<?php
									include "koneksi.php";
									$sql = mysql_query("SELECT * FROM band order by nama_band asc");
									if(mysql_num_rows($sql) != 0){
									while($data = mysql_fetch_assoc($sql)){
									echo '<option value="'.$data['id_band'].'" >'.$data['nama_band'].'</option>';
										}
									}
									?>
								</select>
								</div>
								
								<div class="form-group">
                                    <label>Channel Width</label>
                                    <select class = "form-control" name="channel_width">
									<option>---- Pilih Channel Width ----</option>
									<option selected value="<?php echo $row['channel_width'];?>"><?php echo $row['channel_width'];?></option>
                                    <option>20 Mhz</option>
                                    <option>10 Mhz</option>
                                    <option>5 Mhz</option>                                    
                                    </select>
                                </div>
								
								<div class="form-group">
									<label>Frequency</label>
									<select class="form-control" name="id_frequency">
									<option>---- Pilih Frequency ----</option>
									<option selected value="<?php echo $row['id_frequency'];?>"><?php echo $row['nama_frequency'];?></option>
									<?php
									include "koneksi.php";
									$sql = mysql_query("SELECT * FROM frequency order by nama_frequency asc");
									if(mysql_num_rows($sql) != 0){
									while($data = mysql_fetch_assoc($sql)){
									echo '<option value="'.$data['id_frequency'].'" >'.$data['nama_frequency'].'</option>';
										}
									}
									?>
								</select>
								</div>
								
								<div class="form-group">
									<label>IP Address</label>
									<input class="form-control" name="ipaddress" value="<?php echo $row['ipaddress'];?>">
								</div>
								
								<div class="form-group">
									<label>Radio Name</label>
									<input class="form-control" name="radio_name" value="<?php echo $row['radio_name'];?>">
								</div>
								
								<div class="form-group">
									<label>Jenis Radio</label>
									<select class="form-control" name="id_kind_radio">
									<option>---- Pilih Jenis Radio ----</option>
									<option selected value="<?php echo $row['id_kind_radio'];?>"><?php echo $row['nama_kind_radio'];?></option>
									<?php
									include "koneksi.php";
									$sql = mysql_query("SELECT * FROM kind_radio order by nama_kind_radio asc");
									if(mysql_num_rows($sql) != 0){
									while($data = mysql_fetch_assoc($sql)){
									echo '<option value="'.$data['id_kind_radio'].'" >'.$data['nama_kind_radio'].'</option>';
										}
									}
									?>
								</select>
								</div>
								
								<div class="form-group">
									<label>MAC Address</label>
									<input class="form-control" name="mac" value="<?php echo $row['mac'];?>">
								</div>
								
								<div class="form-group">
									<label>Security</label>
									<select class="form-control" name="id_security">
									<option>---- Pilih Security ----</option>
									<option selected value="<?php echo $row['id_security'];?>"><?php echo $row['nama_security'];?></option>
									<?php
									include "koneksi.php";
									$sql = mysql_query("SELECT * FROM security order by nama_security asc");
									if(mysql_num_rows($sql) != 0){
									while($data = mysql_fetch_assoc($sql)){
									echo '<option value="'.$data['id_security'].'" >'.$data['nama_security'].'</option>';
										}
									}
									?>
								</select>
								</div>
								
								<div class="form-group">
                                    <label>Mode</label>
                                    <select class = "form-control" name="mode">
									<option>---- Pilih Mode ----</option>
									<option selected value="<?php echo $row['mode'];?>"><?php echo $row['mode'];?></option>
                                   <option>AP Bridge</option>
                                    <option>AP WDS</option>
                                    <option>AP</option>
									<option>Bridge</option>
									<option>Station WDS</option> 
									<option>Station Bridge</option> 
									<option>Station</option>                               
                                    </select>
                                </div>
								
								<div class="form-group">
									<label>TX Power</label>
									<input class="form-control" name="power" value="<?php echo $row['power'];?>">
								</div>
								
								<div class="form-group">
									<label>Card</label>
									<input class="form-control" name="card" value="<?php echo $row['card'];?>">
								</div>
								
								<div class="form-group">
									<label>RB</label>
									<input class="form-control" name="rb" value="<?php echo $row['rb'];?>">
								</div>
								
								<div class="form-group">
									<label>Remark</label>
									<input class="form-control" name="remark" value="<?php echo $row['remark'];?>">
								</div>																				
															
								<button type="submit" class="btn btn-primary">Update</button>
								<a href="../show-device-bts.php" class="btn btn-default">Back</a>
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