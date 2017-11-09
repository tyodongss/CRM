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
				<li class="active">Tracking</li>
			</ol>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Tracking</h1>
			</div>
		</div><!--/.row-->
				
		<?php

		include "koneksi.php";
		$sql = "select * from barang_tracking where status_barang!='Received'";
		$hasil = mysql_query($sql); ?>
		
		<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default">
					<div class="panel-heading"><a href="tambah-barang-tracking.php" class="btn btn-primary btn-md">Create New</a></div>
					<div class="panel-body">

<ul class="nav nav-tabs">
  <li class="active"><a data-toggle="tab" href="#opened">On Progress</a></li>
  <li><a data-toggle="tab" href="#closed">Received</a></li>
</ul>

<div class="tab-content">
  <div id="opened" class="tab-pane fade in active">
					<table data-toggle="table" data-url="tables/data1.json"  data-show-refresh="true" data-show-toggle="true" data-show-columns="true" data-search="true" data-select-item-name="toolbar1" data-pagination="true" >
						  
<thead>
<tr>
	<th data-sortable="true">No</th>
	<th data-sortable="true">SWOS Order</th>
	<th data-sortable="true">SWOS Job</th>
	<th data-sortable="true">Nama Barang</th>
	<th data-sortable="true">Status</th>
	<th data-sortable="true">Action</th>
</tr>
</thead>
<tbody>
<tr>
<?php
$no=0;
while($record = mysql_fetch_array($hasil)){
?>
	<td data-sortable="true"><?php echo $no=$no+1;?></td>
	<td data-sortable="true"><a href="http://swos.satnetcom.com/edit.php?e=<?php print $record['swosorder']?>"><?php print $record['swosorder']?></a></td>
	<td data-sortable="true"><a href="http://swos.satnetcom.com/edit.php?e=<?php print $record['swosjob']?>"><?php print $record['swosjob']?></a></td>
	<td data-sortable="true"><?php print $record['nama_barang']?></td>
	<td data-sortable="true"><?php print $record['status_barang']?></td>
	<td data-sortable="true">MENU</td>
</tr>
<?php } ?>					    							
</tbody>
</table>
  </div>

<?php 
$sql_closed = "select * from barang_tracking where status_barang='Received'"; 
$ticket_closed = mysql_query($sql_closed); ?>

  <div id="closed" class="tab-pane fade">
					<table data-toggle="table" data-url="tables/data1.json"  data-show-refresh="true" data-show-toggle="true" data-show-columns="true" data-search="true" data-select-item-name="toolbar1" data-pagination="true" >
						  
<thead>
<tr>
        <th data-sortable="true">No</th>
        <th data-sortable="true">SWOS Order</th>
        <th data-sortable="true">SWOS Job</th>
        <th data-sortable="true">Nama Barang</th>
        <th data-sortable="true">Received Date</th>
        <th data-sortable="true">Action</th>
</tr>
</thead>
<tbody>
<tr>
<?php
$no=0;
while($ticket_close = mysql_fetch_array($ticket_closed)){
?>
        <td data-sortable="true"><?php echo $no=$no+1;?></td>
        <td data-sortable="true"><a href="http://swos.satnetcom.com/edit.php?e=<?php print $ticket_close['swosorder']?>"><?php print $ticket_close['swosorder']?></a></td>
        <td data-sortable="true"><a href="http://swos.satnetcom.com/edit.php?e=<?php print $ticket_close['swosjob']?>"><?php print $ticket_close['swosjob']?></a></td>
        <td data-sortable="true"><?php print $ticket_close['nama_barang']?></td>
        <td data-sortable="true"><?php print $ticket_close['receivedat']?></td>
	<td data-sortable="true">Menu</td>
</tr>
<?php } ?>
</tbody>
</table>

  </div>
</div>
					

	
					</div>
				</div>
			</div>
		</div>
		
		
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



