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

<link href="/inventory/css/bootstrap.min.css" rel="stylesheet">
<link href="/inventory/css/datepicker3.css" rel="stylesheet">
<link href="/inventory/css/bootstrap-table.css" rel="stylesheet">
<link href="/inventory/css/styles.css" rel="stylesheet">

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
				<li class="active">Engineer</li>
			</ol>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Ubah Engineer</h1>
			</div>
		</div><!--/.row-->
<?php 
include "koneksi.php"; 
$id=$_GET['id']; 
$query=mysql_query("select * from engineer where id_engineer='$id'"); 
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
							<form role="form" action="update-engineer.php" method="post">
							<input type="hidden" name="_token" value="L8C5ujpOh4UEsaNko2Y3pkuzP714OtRymsXPqrNJ">
                                <input type="hidden" name="id" value="<?php echo $id;?>"/>
								<div class="form-group">
									<label>Nama Engineer</label>
									<input class="form-control" name="nama_engineer" value="<?php echo $row['nama_engineer'];?>">
								</div>
								
								<div class="form-group">
									<label>No Telepon</label>
									<input class="form-control" name="no_telp" value="<?php echo $row['no_telp'];?>">
								</div>
								
								<div class="form-group">
									<label>Posisi</label>
									<input class="form-control" name="posisi" value="<?php echo $row['posisi'];?>">
								</div>
								
								<div class="form-group">
									<label>Status</label>
									<select class = "form-control" name="status"> 
									<option selected value="<?php echo $row['status'];?>"><?php echo $row['status'];?></option>
									<option>active</option>
									<option>disabled</option>
									</select>
								</div>
								
								<div class="form-group">
									<label>Remark</label>
									<input class="form-control" name="remark" value="<?php echo $row['remark'];?>">
								</div>
                               
                                <div class="form-group">
									<label>Username</label>
									<input class="form-control" name="username" value="<?php echo $row['username'];?>">
								</div>

                                <div class="form-group">
									<label>Password</label>
									<input class="form-control" type="password" name="password" value="<?php echo $row['password'];?>">
								</div>

                                <div class="form-group">
									<label>Role</label>
									<select class = "form-control" name="role"> 
									<option selected value="<?php echo $row['role'];?>"><?php echo $row['role'];?></option>
									<option value="administrator">Administrator</option>
									<option value="engineer">Engineer</option>
									<!--option value="managertechnicalservices">Manager Technical Services</option>
									<option value="assistantmanagertechnicalservices">Assistant Manager Technical Services</option>
									<option value="supervisornoc">Supervisor NOC</option>
									<option value="noc">NOC</option>
									<option value="supervisorengineering">Supervisor Engineering/option>
									<option value="engineer">Engineer</option>
									<option value="supervisorvsat">Supervisor VSAT</option>
									<option value="engineervsat">Engineer VSAT</option>
									<option value="supervisortechnicalsupport">Supervisor Technical Support</option>
									<option value="technicalsupport">Technical Support</option>
									<option value="supervisortechnicalsupportjkt">Supervisor Technical Support JKT</option>
									<option value="technicalsupportjkt">Technical Support JKT</option>
									<option value="helpdesk">Helpdesk</option>
									<option value="managerhrdga">Manager HRD & GA</option>
									<option value="ga">GA</option>
									<option value="hrd">HRD</option>
									<option value="managerfinanceaccounting">Manager Finance & Accounting</option>
									<option value="accounting">Accounting</option>
									<option value="warehouse">Warehouse</option>
									<option value="paa">PAA</option>
									<option value="sales">Sales</option-->
									</select>
								</div>
								
															
								<button type="submit" class="btn btn-primary">Save</button>
								<a href="../show-engineer.php" class="btn btn-default">Back</a>
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

	<script src="/inventory/js/jquery-1.11.1.min.js"></script>
	<script src="/inventory/js/bootstrap.min.js"></script>
	<script src="/inventory/js/chart.min.js"></script>
	<script src="/inventory/js/chart-data.js"></script>
	<script src="/inventory/js/easypiechart.js"></script>
	<script src="/inventory/js/easypiechart-data.js"></script>
	<script src="/inventory/js/bootstrap-datepicker.js"></script>
	<script src="/inventory/js/bootstrap-table.js"></script>
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
