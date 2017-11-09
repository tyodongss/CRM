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
				<li class="active">CA Approval</li>
			</ol>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Ubah CA Approval</h1>
			</div>
		</div><!--/.row-->
<?php 
include "koneksi.php"; 
$id=$_GET['id']; 
$query=mysql_query("select ca_request.swos, ca_request.id_ca_budget, ca_budget.judul_ca_budget, ca_request.id_paa, paa.nama_paa, ca_request.tgl_request, ca_request.tgl_approve, ca_request.id_job_to_do, job_to_do2.nama_job_to_do, ca_request.judul_ca, ca_request.keterangan, ca_request.jumlah, ca_request.id_engineer, engineer.nama_engineer, ca_request.status_approval, ca_request.status_ca_request, ca_request.created_at, ca_request.updated_at, ca_request.deleted_at from ca_request, ca_budget, paa, engineer, job_to_do2 where ca_request.id_ca_budget=ca_budget.id_ca_budget and ca_request.id_paa=paa.id_paa and ca_request.id_engineer=engineer.id_engineer and ca_request.id_job_to_do=job_to_do2.id_job_to_do and id_ca_request='$id'"); 
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
							<form role="form" action="update-ca-request-approval.php" method="post">
							<input type="hidden" name="_token" value="L8C5ujpOh4UEsaNko2Y3pkuzP714OtRymsXPqrNJ">
                              <input type="hidden" name="id" value="<?php echo $id;?>"/>

								<div class="form-group">
									<label>SWOS</label>
									<input class="form-control" name="swos" value="<?php echo $row['swos'];?>">
								</div>
								
								<div class="form-group">
                                    <label>Budget</label>
                                    <select class="form-control" name="id_ca_budget">
                                    <option selected value="<?php echo $row['id_ca_budget'];?>"><?php echo $row['judul_ca_budget'];?></option>
                                    <option>---- Pilih Budget ----</option>
                                    <?php
                                    $sql = mysql_query("SELECT * FROM ca_budget order by id_ca_budget asc");
                                    if(mysql_num_rows($sql) != 0){
                                    while($data = mysql_fetch_assoc($sql)){
                                    echo '<option value="'.$data['id_ca_budget'].'" >'.$data['judul_ca_budget'].'</option>';
                                        } 
                                    }
                                    ?>
                                </select>
                                </div>

                                <div class="form-group">
                                	<?php
                                	$sql2 = mysql_query("SELECT ca_budget.judul_ca_budget from ca_request,ca_budget where ca_request.id_ca_budget = ca_budget.id_ca_budget and id_ca_request='$id'");
                                	while($row2 = mysql_fetch_assoc($sql2)){
                                	?>
									<input class="form-control" type="hidden" name="judul_ca_budget" value="<?php echo $row2['judul_ca_budget'];?>">
									<? } ?>
								</div>

								<div class="form-group">
                                    <label>Nama PAA</label>
                                    <select class="form-control" name="id_paa">
                                    <option>---- Pilih PAA ----</option>
                                    <option selected value="<?php echo $row['id_paa'];?>"><?php echo $row['nama_paa'];?></option>
                                    <?php
                                    $sql = mysql_query("SELECT * FROM paa order by id_paa asc");
                                    if(mysql_num_rows($sql) != 0){
                                    while($data = mysql_fetch_assoc($sql)){
                                    echo '<option value="'.$data['id_paa'].'" >'.$data['nama_paa'].'</option>';
                                        } 
                                    }
                                    ?>
                                </select>
                                </div>

                                <div class="form-group">
                                	<?php
                                	$sql3 = mysql_query("SELECT paa.nama_paa from ca_request,paa where ca_request.id_paa = paa.id_paa and id_ca_request='$id'");
                                	while($row3 = mysql_fetch_assoc($sql3)){
                                	?>
									<input class="form-control" type="hidden" name="nama_paa" value="<?php echo $row3['nama_paa'];?>">
									<? } ?>
								</div>

								<div class="form-group">
									<label>Tanggal Request</label>
									<input class="form-control" data-provide="datepicker" data-date-format="yyyy/mm/dd" name="tgl_request" value="<?php echo $row['tgl_request'];?>">									
								</div>
								
								<div class="form-group">
								  <label>Tanggal Approve</label>
								  <?php
									$timezone = "Asia/Makassar";
									date_default_timezone_set($timezone);
									$today = date("Y-m-d");
								  ?>
								  <input class="form-control" data-provide="datepicker" data-date-format="yyyy/mm/dd" name="tgl_approve" value="<?php echo $today; ?>" readonly>
								</div>
								
								<div class="form-group">
                                    <label>Nama Job to Do</label>
                                    <select class="form-control" name="id_job_to_do">
                                    <option>---- Pilih Job to Do ----</option>
                                    <option selected value="<?php echo $row['id_job_to_do'];?>"><?php echo $row['nama_job_to_do'];?></option>
                                    <?php
                                    $sql = mysql_query("SELECT * FROM job_to_do2 order by nama_job_to_do asc");
                                    if(mysql_num_rows($sql) != 0){
                                    while($data = mysql_fetch_assoc($sql)){
                                    echo '<option value="'.$data['id_job_to_do'].'" >'.$data['nama_job_to_do'].'</option>';
                                        } 
                                    }
                                    ?>
                                </select>
                                </div>

                                <div class="form-group">
                                	<?php
                                	$sql4 = mysql_query("SELECT job_to_do2.nama_job_to_do from ca_request,job_to_do2 where ca_request.id_job_to_do = job_to_do2.id_job_to_do and id_ca_request='$id'");
                                	while($row4 = mysql_fetch_assoc($sql4)){
                                	?>
									<input class="form-control" type="hidden" name="nama_job_to_do" value="<?php echo $row4['nama_job_to_do'];?>">
									<? } ?>
								</div>
								
								<div class="form-group">
									<label>Judul CA Request</label>
									<input class="form-control" name="judul_ca" value="<?php echo $row['judul_ca'];?>">
								</div>
								
								<div class="form-group">
									<label>Keterangan</label>
									<input class="form-control" name="keterangan" value="<?php echo $row['keterangan'];?>">
								</div>
								
								<div class="form-group">
									<label>Jumlah</label>
									<input class="form-control" name="jumlah" value="<?php echo $row['jumlah'];?>">
								</div>
								
								<div class="form-group">
                                    <label>Nama Engineer</label>
                                    <select class="form-control" name="id_engineer">
                                    <option>---- Pilih Engineer ----</option>
                                    <option selected value="<?php echo $row['id_engineer'];?>"><?php echo $row['nama_engineer'];?></option>
                                    <?php
                                    $sql = mysql_query("SELECT * FROM engineer order by id_engineer asc");
                                    if(mysql_num_rows($sql) != 0){
                                    while($data = mysql_fetch_assoc($sql)){
                                    echo '<option value="'.$data['id_engineer'].'" >'.$data['nama_engineer'].'</option>';
                                        } 
                                    }
                                    ?>
                                </select>
                                </div>

                                <div class="form-group">
                                	<?php
                                	$sql4 = mysql_query("SELECT engineer.nama_engineer from ca_request,engineer where ca_request.id_engineer = engineer.id_engineer and id_ca_request='$id'");
                                	while($row4 = mysql_fetch_assoc($sql4)){
                                	?>
									<input class="form-control" type="hidden" name="nama_engineer1" value="<?php echo $row4['nama_engineer'];?>">
									<? } ?>
								</div>
								
								<div class="form-group">
                                  <label>Status Approval</label>
                                  <select class = "form-control" name="status_approval" required>
                                  <option selected value="<?php echo $row['status_approval'];?>"><?php echo $row['status_approval'];?></option>
                                  <option>---- Pilih Status ----</option>
                                  <option>Approved</option>                                  
                                  </select>
                                </div>
								
								<div class="form-group">
                                  <label>Status CA Request</label>
                                  <select class = "form-control" name="status_ca_request" required>
                                  <option selected value="<?php echo $row['status_ca_request'];?>"><?php echo $row['status_ca_request'];?></option>
                                  <option>---- Pilih Status ----</option>
                                  <option>Open</option>                                  
                                  </select>
                                </div>
								
								<!--button type="submit" class="btn btn-primary">Update</button-->
								<button class="btn btn-primary" onclick="return confirm('Apakah Anda sudah yakin?')" type="submit">Update</button>
								<a href="../show-ca-request.php" class="btn btn-default">Back</a>
								
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

	<script src="/js/jquery-3.1.1.min.js.js"></script>
	<!--script src="/js/bootstrap.min.js"></script-->
	<script src="/js/chart.min.js"></script>
	<script src="/js/chart-data.js"></script>
	<script src="/js/easypiechart.js"></script>
	<script src="/js/easypiechart-data.js"></script>
	<script src="/js/bootstrap-datepicker.js"></script>
	<script src="/js/bootstrap-table.js"></script>
	<script src="/js/bootstrap.js"></script>
	<script src="/js/bootstrap-confirmation.js"></script>
	<!--script src="/js/jquery.js"></script-->
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
	<script>
		$('[data-toggle=confirmation]').confirmation({
			  rootSelector: '[data-toggle=confirmation]',
			  // other options
			});
	</script>
</body>

</html>