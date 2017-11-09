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
				<li class="active">CA Request</li>
			</ol>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Ubah CA Request</h1>
			</div>
		</div><!--/.row-->
<?php 
include "koneksi.php"; 
$id=$_GET['id']; 
$query=mysql_query("select ca_budget.id_ca_budget, ca_budget.judul_ca_budget, ca_budget.id_bulan, bulan.nama_bulan, ca_budget.id_tahun, tahun.nama_tahun, ca_budget.jumlah_awal, ca_budget.jumlah_sisa, ca_budget.status_ca_budget, ca_budget.created_at, ca_budget.updated_at, ca_budget.deleted_at from ca_budget, bulan, tahun where ca_budget.id_bulan=bulan.id_bulan and ca_budget.id_tahun=tahun.id_tahun and id_ca_budget='$id'"); 
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
							<form role="form" action="update-ca-budget.php" method="post">
							<input type="hidden" name="_token" value="L8C5ujpOh4UEsaNko2Y3pkuzP714OtRymsXPqrNJ">
                                                        <input type="hidden" name="id" value="<?php echo $id;?>"/>
								<div class="form-group">
									<label>Judul CA Budget</label>
									<input class="form-control" name="judul_ca_budget" value="<?php echo $row['judul_ca_budget'];?>">
								</div>
								
								<div class="form-group">
                                    <label>Bulan</label>
                                    <select class="form-control" name="id_bulan">
                                    <option>---- Pilih Bulan ----</option>
                                    <option selected value="<?php echo $row['id_bulan'];?>"><?php echo $row['nama_bulan'];?></option>
                                    <?php
                                    $sql = mysql_query("SELECT * FROM bulan order by id_bulan asc");
                                    if(mysql_num_rows($sql) != 0){
                                    while($data = mysql_fetch_assoc($sql)){
                                    echo '<option value="'.$data['id_bulan'].'" >'.$data['nama_bulan'].'</option>';
                                        } 
                                    }
                                    ?>
                                </select>
                                </div>

								<div class="form-group">
                                    <label>Tahun</label>
                                    <select class="form-control" name="id_tahun">
                                    <option>---- Pilih Tahun ----</option>
                                    <option selected value="<?php echo $row['id_tahun'];?>"><?php echo $row['nama_tahun'];?></option>
                                    <?php
                                    $sql = mysql_query("SELECT * FROM tahun order by id_tahun asc");
                                    if(mysql_num_rows($sql) != 0){
                                    while($data = mysql_fetch_assoc($sql)){
                                    echo '<option value="'.$data['id_tahun'].'" >'.$data['nama_tahun'].'</option>';
                                        } 
                                    }
                                    ?>
                                </select>
                                </div>   
								
								<div class="form-group">
									<label>Jumlah Awal</label>
									<input class="form-control" name="jumlah_awal" value="<?php echo $row['jumlah_awal'];?>">
								</div>
								
								<div class="form-group">
									<label>Jumlah Sisa</label>
									<input class="form-control" name="jumlah_sisa" value="<?php echo $row['jumlah_sisa'];?>">
								</div>
								
								<div class="form-group">
                                  <label>Status CA Budget</label>
                                  <select class = "form-control" name="status_ca_budget" required>
                                  <option selected value="<?php echo $row['status_ca_budget'];?>"><?php echo $row['status_ca_budget'];?></option>
                                  <option>---- Pilih Status ----</option>
                                  <option>Open</option>
                                  <option>Close</option>
                                  </select>
                                </div>
								
								<button type="submit" class="btn btn-primary">Update</button>
								<a href="../show-ca-budget.php" class="btn btn-default">Back</a>
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