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
				<li class="active">Backbone Problem</li>
			</ol>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Detail Backbone Problem</h1>
			</div>
		</div><!--/.row-->
<?php 
include "koneksi.php"; 
$id=$_GET['id']; 
$query=mysql_query("select backbone_problem.id_backbone_problem,backbone_problem.swos,backbone_problem.reff,backbone_problem.id_circuit,circuit.nama_circuit,backbone_problem.id_backbone,backbone.nama_backbone,backbone_problem.description,backbone_problem.datetime_start,backbone_problem.datetime_end,backbone_problem.root_cause,backbone_problem.solved_after,backbone_problem.status_backbone_problem, backbone_problem.created_at, backbone_problem.updated_at, backbone_problem.deleted_at from backbone_problem,circuit,backbone where circuit.id_circuit=backbone_problem.id_circuit and backbone.id_backbone=backbone_problem.id_backbone and id_backbone_problem='$id'"); 
?> 
<?php 
while($row=mysql_fetch_array($query)){ 
?> 		
		
		<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default">
						<table class="table table-striped">
								  <tbody>
									<tr>									  
									  <td width="40%"><b>SWOS</b></td>
									  <td><a href="http://swos.satnetcom.com/edit.php?e=<?php echo $row['swos'];?>"><?php echo $row['swos'];?></a></td>
									</tr>
									<tr>
									  <td width="40%"><b>TICKET PARTNER</b></td>
									  <td><?php echo $row['reff'] ?></td>
									</tr>
									<tr>									  
									  <td width="40%"><b>Nama Backbone</b></td>
									  <td><?php echo $row['nama_backbone'];?></td>
									</tr>
                                                                        <tr>
                                                                          <td width="40%"><b>Nama Circuit</b></td>
                                                                          <td><?php echo $row['nama_circuit'];?></td>
                                                                        </tr>
									<tr>									  
									  <td width="40%"><b>Description</b></td>
									  <td><?php echo $row['description'];?></td>
									</tr>
									<tr>									  
									  <td width="40%"><b>Datetime Start</b></td>
									  <td><?php echo $row['datetime_start'];?></td>
									</tr>
									<tr>									  
									  <td width="40%"><b>Datetime End</b></td>
									  <td><?php echo $row['datetime_end'];?></td>
									</tr>
									<tr>									  
									  <td width="40%"><b>Root Cause</b></td>
									  <td><?php echo $row['root_cause'];?></td>
									</tr>
									<tr>									  
									  <td width="40%"><b>Solved After</b></td>
									  <td><?php echo $row['solved_after'];?></td>
									</tr>
									<tr>									  
									  <td width="40%"><b>Status</b></td>
									  <td><?php echo $row['status_backbone_problem'];?></td>
									</tr>
									<tr>									  
									  <td width="40%"><b>Created At</b></td>
									  <td><?php echo $row['created_at'];?></td>
									</tr>                                                      
									<tr>									  
									  <td width="40%"><b>Updated At</b></td>
									  <td><?php echo $row['updated_at'];?></td>
									</tr>
									<tr>									  
									  <td width="40%"><b>Deleted At</b></td>
									  <td><?php echo $row['deleted_at'];?></td>
									</tr>

								  </tbody>
								</table>								
						</div>
				</div>
		</div>
		
		
		<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default">
					<!--<div class="panel-heading">Stok Masuk</div>-->
					<div class="panel-body">
						<div class="col-md-6">
								<form role="form" action="show-backbone-problem.php">
																													
								<button class="btn btn-default">Back</button>
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
