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
				<li class="active">Customer</li>
			</ol>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Ubah Downtime</h1>
			</div>
		</div><!--/.row-->
<?php 
include "koneksi.php"; 

$id=$_GET['id']; 
$query=mysql_query("SELECT * 
FROM downtime, customer, engineer
WHERE id_downtime =  '$id'
AND downtime.id_customer = customer.id_customer
AND downtime.id_engineer = engineer.id_engineer"); 
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
							<form role="form" action="update-downtime.php" method="post">
							<input type="hidden" name="_token" value="L8C5ujpOh4UEsaNko2Y3pkuzP714OtRymsXPqrNJ">
                                                        <input type="hidden" name="id" value="<?php echo $id;?>"/>

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
									<label>Date Time Start</label>
									<input class="form-control" data-provide="datepicker" data-date-format="yyyy/mm/dd" name="datetime_start" value="<?php echo $row['datetime_start'];?>" >
								</div>

								<div class="form-group">
									<label>Date Time End</label>
									<input class="form-control" name="datetime_end" type="datetime" value="<?php
			if ($row['datetime_end']==""){ 
				print date('Y-m-d G:i');
			} else { 
				print $row['datetime_end']; 
			}
		?>">
								</div>
																
								<div class="form-group">
									<label>Keterangan</label><br>
									<textarea name="keterangan" cols=68 rows=5><?php echo $row['keterangan']?> </textarea> <div class="help-block with-errors"></div>
								</div>

								<div class="form-group">
									<label>SWOS</label>
									<input class="form-control" name="swos" value="<?php echo $row['swos'];?>" maxlength="5" required> <div class="help-block with-errors"></div>
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
									<label>Status</label>
									<select class = "form-control" name="status_downtime"> 
<option selected value="<?php echo $row['status_downtime'];?>"><?php echo $row['status_downtime'];?></option>
									<option>Open</option>
									<option>Close</option>
									</select>
								</div>
													
								
                                                                <button type="submit" class="btn btn-primary">Update</button>
								<a href="../show-downtime.php" class="btn btn-default">Back</a>
								
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
