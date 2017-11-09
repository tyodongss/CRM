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
				<h1 class="page-header">Tambah Device BTS</h1>
			</div>
		</div><!--/.row-->
				
		
		<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default">
					<!--<div class="panel-heading">Stok Masuk</div>-->
					<div class="panel-body">
						<div class="col-md-6">
							<form data-toggle="validator" role="form" action="proses-device-bts.php" method="post">
							<input type="hidden" name="_token" value="L8C5ujpOh4UEsaNko2Y3pkuzP714OtRymsXPqrNJ">

								<div class="form-group">
									<label>Nama Device</label>
									<input class="form-control" name="nama_device" value="" maxlength="50" required>
                                    <div class="help-block with-errors"></div>
								</div>
								
								<div class="form-group">
									<label>Nama BTS</label>
									<select class="form-control" name="id_bts" required>
									<option>---- Pilih BTS ----</option>
									<?php
									include "koneksi.php";
									$sql = mysql_query("SELECT * FROM bts order by nama_bts asc");
									if(mysql_num_rows($sql) != 0){
									while($data = mysql_fetch_assoc($sql)){
									echo '<option value="'.$data['id_bts'].'">'.$data['nama_bts'].'</option>';
										}
									}
									?>
								</select>
								</div>
								
								<div class="form-group">
									<label>SSID</label>
									<input class="form-control" name="ssid" value="" maxlength="25" required>
                                    <div class="help-block with-errors"></div>
								</div>
								
								<div class="form-group">
									<label>Band</label>
									<select class="form-control" name="id_band" required>
									<option>---- Pilih Band ----</option>
									<?php
									include "koneksi.php";
									$sql = mysql_query("SELECT * FROM band order by nama_band asc");
									if(mysql_num_rows($sql) != 0){
									while($data = mysql_fetch_assoc($sql)){
									echo '<option value="'.$data['id_band'].'">'.$data['nama_band'].'</option>';
										}
									}
									?>
								</select>
								</div>
								
								<div class="form-group">
                                    <label>Channel Width</label>
                                    <select class = "form-control" name="channel_width" required>
									<option>---- Pilih Channel Width ----</option>
                                    <option>20 Mhz</option>
                                    <option>10 Mhz</option>
                                    <option>5 Mhz</option>                                    
                                    </select>
                                </div>
								
								<div class="form-group">
									<label>Frequency</label>
									<select class="form-control" name="id_frequency" required>
									<option>---- Pilih Band ----</option>
									<?php
									include "koneksi.php";
									$sql = mysql_query("SELECT * FROM frequency order by nama_frequency asc");
									if(mysql_num_rows($sql) != 0){
									while($data = mysql_fetch_assoc($sql)){
									echo '<option value="'.$data['id_frequency'].'">'.$data['nama_frequency'].'</option>';
										}
									}
									?>
								</select>
								</div>
								
								<div class="form-group">
									<label>IP Address</label>
									<input class="form-control" name="ipaddress" value="" maxlength="14" required>
                                    <div class="help-block with-errors"></div>
								</div>
								
								<div class="form-group">
									<label>Radio Name</label>
									<input class="form-control" name="radio_name" value="" maxlength="25" required>
                                    <div class="help-block with-errors"></div>
								</div>
								
								<div class="form-group">
									<label>Jenis Radio</label>
									<select class="form-control" name="id_kind_radio" required>
									<option>---- Pilih Jenis Radio ----</option>
									<?php
									include "koneksi.php";
									$sql = mysql_query("SELECT * FROM kind_radio order by nama_kind_radio asc");
									if(mysql_num_rows($sql) != 0){
									while($data = mysql_fetch_assoc($sql)){
									echo '<option value="'.$data['id_kind_radio'].'">'.$data['nama_kind_radio'].'</option>';
										}
									}
									?>
								</select>
								</div>
								
								<div class="form-group">
									<label>MAC Address</label>
									<input class="form-control" name="mac" value="" maxlength="17" required>
                                    <div class="help-block with-errors"></div>
								</div>
								
								<div class="form-group">
									<label>Security</label>
									<select class="form-control" name="id_security" required>
									<option>---- Pilih Security ----</option>
									<?php
									include "koneksi.php";
									$sql = mysql_query("SELECT * FROM security order by nama_security asc");
									if(mysql_num_rows($sql) != 0){
									while($data = mysql_fetch_assoc($sql)){
									echo '<option value="'.$data['id_security'].'">'.$data['nama_security'].'</option>';
										}
									}
									?>
								</select>
								</div>
								
								<div class="form-group">
                                    <label>Mode</label>
                                    <select class = "form-control" name="mode" required>
									<option>---- Pilih Mode ----</option>
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
									<input class="form-control" name="power" value="" maxlength="19" required>
                                    <div class="help-block with-errors"></div>
								</div>
								
								<div class="form-group">
									<label>Card</label>
									<input class="form-control" name="card" value="" maxlength="15" required>
                                    <div class="help-block with-errors"></div>
								</div>
								
								<div class="form-group">
									<label>RB</label>
									<input class="form-control" name="rb" value="" maxlength="15">                                    
								</div>
								
								<div class="form-group">
									<label>Remark</label>
									<input class="form-control" name="remark" value="" maxlength="25">                                    
								</div>					
								
								<button type="submit" class="btn btn-primary">Save</button>
								<button type="reset" class="btn btn-default">Reset</button>
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