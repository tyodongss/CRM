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
<link rel="stylesheet" href="/css/bootstrap-datetimepicker-standalone.min.css">
<link rel="stylesheet" href="/css/bootstrap-datetimepicker.min.css">

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
				<li class="active">BTS Problem</li>
			</ol>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Ubah BTS Problem</h1>
			</div>
		</div><!--/.row-->
<?php 
include "koneksi.php"; 
$id=$_GET['id']; 
$query=mysql_query("select bts_problem.id_bts_problem,bts_problem.swos,bts_problem.id_device_bts,bts_problem.id_bts,bts_problem.id_engineer,bts_problem.description,bts_problem.datetime_start,bts_problem.datetime_end,bts_problem.root_cause,bts_problem.solved_after,bts_problem.status_bts_problem,device_bts.nama_device,bts.nama_bts,engineer.nama_engineer from bts_problem,device_bts,bts,engineer where id_bts_problem='$id' and device_bts.id_device_bts=bts_problem.id_device_bts and bts.id_bts=bts_problem.id_bts and engineer.id_engineer=bts_problem.id_engineer"); 
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
														<form role="form" action="update-bts-problem.php" method="post">
							<input type="hidden" name="_token" value="L8C5ujpOh4UEsaNko2Y3pkuzP714OtRymsXPqrNJ">
                                                        <input type="hidden" name="id" value="<?php echo $id;?>"/>
								<div class="form-group">
									<label>SWOS</label>
									<input class="form-control" name="swos" value="<?php echo $row['swos'];?>">
								</div>
								
								<div class="form-group">
									<label>Nama Device BTS</label>
									<select class="form-control" name="id_device_bts">
									<option>---- Pilih Device ----</option>
									<option selected value="<?php echo $row['id_device_bts'];?>"><?php echo $row['nama_device'];?></option>
									<?php
									include "koneksi.php";
									$sql = mysql_query("SELECT * FROM device_bts order by nama_device asc");
									if(mysql_num_rows($sql) != 0){
									while($data = mysql_fetch_assoc($sql)){
									echo '<option value="'.$data['id_device_bts'].'" >'.$data['nama_device'].'</option>';
										}
									}
									?>
								</select>
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
									<label>Nama Engineer</label>
									<select class="form-control" name="id_engineer">
									<option>---- Pilih Engineer ----</option>
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
                                    <label>Description</label>
                                    <select class = "form-control" name="description">
									<option>---- Pilih Description ----</option>
									<option selected value="<?php echo $row['description'];?>"><?php echo $row['description'];?></option>
                                    <option>Down</option>
                                    <option>Intermittent</option>                                              
                                    </select>
                                </div>
								
								<div class="form-group">
								  <label>Date Time Start</label> 
									  <div class='input-group date' id='datetimepicker1'>
										<input type='text' class="form-control" name="datetime_start" value="<?php echo $row['datetime_start'];?>" />
										<span class="input-group-addon">
										  <span class="glyphicon glyphicon-calendar"></span>
										</span>
									  </div>
								</div>
								
								<div class="form-group">
								  <label>Date Time End</label>
									<div class='input-group date' id='datetimepicker2'>
									<input type='text' class="form-control" name="datetime_end" value="<?php
										if ($row['datetime_end']==""){ 
											print date('Y-m-d G:i:s');
										} else { 
											print $row['datetime_end']; 
										}
									?>">
									<span class="input-group-addon">
										<span class="glyphicon glyphicon-calendar"></span>
										</span>
									  </div>
								</div>
								
								<div class="form-group">
									<label>Root Cause</label>
									<input class="form-control" name="root_cause" value="<?php echo $row['root_cause'];?>">
								</div>
								
								<div class="form-group">
									<label>Solved After</label>
									<input class="form-control" name="solved_after" value="<?php echo $row['solved_after'];?>">
								</div>
								
								<div class="form-group">
                                    <label>Status</label>
                                    <select class = "form-control" name="status_bts_problem">
									<option>---- Pilih Status ----</option>
									<option selected value="<?php echo $row['status_bts_problem'];?>"><?php echo $row['status_bts_problem'];?></option>
                                    <option>Open</option>
                                    <option>Closed</option>                                              
                                    </select>
                                </div>						
								
															
								<button type="submit" class="btn btn-primary">Update</button>
								<a href="../show-bts-problem.php" class="btn btn-default">Back</a>
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
        <script src="/js/moment.js"></script>
        <script type="text/javascript" src="/js/bootstrap-datetimepicker.min.js"></script>
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
	<script type="text/javascript">
      $(function () {
        $('#datetimepicker1').datetimepicker({
          format: 'YYYY-MM-DD HH:mm:ss'
        });
      });
    </script>

    <script type="text/javascript">
      $(function () {
        $('#datetimepicker2').datetimepicker({
          format: 'YYYY-MM-DD HH:mm:ss'
         });
      });
    </script>   
</body>

</html>