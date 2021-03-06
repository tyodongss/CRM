<?php
session_start(); 
?>
<!--  -->

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>CRM S-Net</title>
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
<?php
//if ($_SESSION['role']!="administrator" && $_SESSION['role']!="devel"){
if ($_SESSION['role']!="administrator"){
	echo "<meta http-equiv=\"refresh\" content=\"1;dashboard.php\">";
} else {	
?>
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
                <div class="container-fluid">
                        <div class="navbar-header">
                                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#sidebar-collapse">
                                        <span class="sr-only">Toggle navigation</span>
                                        <span class="icon-bar"></span>
                                        <span class="icon-bar"></span>
                                        <span class="icon-bar"></span>
                                </button>
                                <a class="navbar-brand" href="#"><span class="glyphicon glyphicon-signal"></span> S-Net<span></span></a>
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
				<h1 class="page-header">Engineer</h1>
			</div>
		</div><!--/.row-->
				
		<?php

		include "koneksi.php";

		$sql = "select * from engineer order by name_engineer asc";
		$hasil = mysql_query($sql); ?>
		
		<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default">
					<div class="panel-heading"><a href="add-engineer.php" class="btn btn-primary btn-md">Add New Engineer</a></div>
					<div class="panel-body">
		
					
					<table data-toggle="table" data-url="tables/data1.json"  data-show-refresh="true" data-show-toggle="true" data-show-columns="true" data-search="true" data-select-item-name="toolbar1" data-pagination="false" data-sort-name="name" data-sort-order="asc">
						  
						 <thead>
						    <tr>
							<th data-field="itemid" data-sortable="true">No</th>
						        <th data-field="name_engineer" data-sortable="true">Engineer Name</th>
								<th data-field="no_telp" data-sortable="true">Handphone</th>
						        <th data-field="posisi" data-sortable="true">Position</th>
						        <th data-field="status" data-sortable="true">Status</th>
								<th data-field="action" data-sortable="true">Action</th>
						    </tr>
							</thead>
							<tbody>
							<?php						
$no=0;
while($record = mysql_fetch_array($hasil)){
?>
							<tr>
								<td data-field="itemid" data-sortable="true"><?php echo $no=$no+1;?></td>
								<td data-field="name_engineer" data-sortable="true"><?php echo $record['name_engineer'];?></td>
						        <td data-field="no_telp" data-sortable="true"><?php echo $record['no_telp'];?></td>
						        <td data-field="posisi" data-sortable="true"><?php echo $record['posisi'];?></td>
						        <td data-field="status" data-sortable="true"><?php echo $record['status'];?></td>
						        <td data-field="action" data-sortable="true"><a href="detail-engineer.php?id=<?php echo $record['id_engineer'];?>"><span class="glyphicon glyphicon-eye-open" title="Details"></a> &nbsp;&nbsp;<a href="edit-engineer.php?id=<?php echo $record['id_engineer'];?>"><span class="glyphicon glyphicon-pencil" title="Edit"></a> &nbsp;&nbsp;</td>
						    </tr>
<?php
}
?>					    							
						    </tbody>
						</table>
	
					</div>
				</div>
			</div>
		</div>		
		
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
<?php } ?>
</body>

</html>




