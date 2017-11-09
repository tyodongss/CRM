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
				<li class="active">Circuit</li>
			</ol>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Tambah Circuit</h1>
			</div>
		</div><!--/.row-->
				
		
		<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default">
					<!--<div class="panel-heading">Stok Masuk</div>-->
					<div class="panel-body">
						<div class="col-md-6">
							<form data-toggle="validator" role="form" action="proses-circuit.php" method="post">
							<input type="hidden" name="_token" value="L8C5ujpOh4UEsaNko2Y3pkuzP714OtRymsXPqrNJ">

								<div class="form-group">
									<label>Nama Circuit</label>
									<input class="form-control" name="nama_circuit" value="" required>
                                    <div class="help-block with-errors"></div>
								</div>
								
								<div class="form-group">
									<label>Nama Backbone</label>
									<select class="form-control" name="id_backbone" required>
									<option>---- Pilih Backbone ----</option>
									<?php
									include "koneksi.php";
									$sql = mysql_query("SELECT * FROM backbone order by nama_backbone asc");
									if(mysql_num_rows($sql) != 0){
									while($data = mysql_fetch_assoc($sql)){
									echo '<option value="'.$data['id_backbone'].'">'.$data['nama_backbone'].'</option>';
										}
									}
									?>
								</select>
								</div>
								
								<div class="form-group">
									<label>Nama Customer</label>
									<select class="form-control" name="id_customer" required>
									<option>---- Pilih Customer ----</option>
									<?php
									include "koneksi.php";
									$sql = mysql_query("SELECT * FROM customer order by nama asc");
									if(mysql_num_rows($sql) != 0){
									while($data = mysql_fetch_assoc($sql)){
									echo '<option value="'.$data['id_customer'].'">'.$data['nama'].'</option>';
										}
									}
									?>
								</select>
								</div>															
								
								<div class="form-group">
									<label>Tanggal Aktivasi</label>
									<input class="form-control" data-provide="datepicker" data-date-format="yyyy/mm/dd" name="tanggal_aktivasi" value="">
									<div class="help-block with-errors"></div>
								</div>


                                <div class="form-group">
									<label>Tanggal Terminasi</label>
									<input class="form-control" data-provide="datepicker" data-date-format="yyyy/mm/dd" name="tanggal_terminasi" value="">
								</div>

                                <div class="form-group">
                                    <label>Monthly Fee (IDR)</label>
                                    <input class="form-control" name="monthly_fee_idr">
                                </div>

                                <div class="form-group">
                                    <label>Monthly Fee (USD)</label>
                                    <input class="form-control" name="monthly_fee_usd">
                                </div>
<div class="form-group">
                  <label>Status Circuit</label>
                  <select class = "form-control" name="status_circuit" required>
                  <option>---- Pilih Status ----</option>
                  <option>Active</option>
                  <option>Terminate</option>                                                                     
                  </select>
                </div>
								
								<div class="form-group">
									<label>Remark</label>
									<input class="form-control" name="remark" value="" maxlength="25" >                                    
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