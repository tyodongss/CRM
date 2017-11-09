<?php
session_start();
?>

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
	<?php include ('menu.php') ?>
		<!--	
	==================================================== MENU
	-->
		
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">			
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="#"><span class="glyphicon glyphicon-home"></span></a></li>
				<li class="active">Barang</li>
			</ol>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Barang</h1>
			</div>
		</div><!--/.row-->
				
<?php

include "koneksi.php";

//$sql = "select * from barang ORDER BY id_barang ";
$sql = "select barang.id_barang,item.code_item,item.nama_item,barang.serial_number,barang.po_number,barang.id_lokasi,lokasi.nama_lokasi,barang.status_barang 
		from barang,item,lokasi 
		where item.code_item=barang.code_item 
		and lokasi.id_lokasi=barang.id_lokasi 
		and status_barang='tersedia' 
		order by id_barang DESC";

$hasil = mysql_query($sql);	
?>		
		<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default">
					<div class="panel-heading"><a href="tambah-barang.php" class="btn btn-primary btn-md">Tambah Barang</a></div>
					<div class="panel-body">

						<ul class="nav nav-tabs">
						  <li class="active"><a data-toggle="tab" href="#tersedia">Tersedia</a></li>
						  <li><a data-toggle="tab" href="#tidaktersedia">Tidak Tersedia</a></li>
						</ul>

						<div class="tab-content">
  							<div id="tersedia" class="tab-pane fade in active">

						<table data-toggle="table" data-url="tables/data1.json"  data-show-refresh="true" data-show-toggle="true" data-show-columns="true" data-search="true" data-select-item-name="toolbar1" data-pagination="true" >
						    <thead>
						    <tr>
							    <th data-field="itemid" data-sortable="true">No</th>
						        <th data-field="nama_barang"  data-sortable="true">Code Item</th>
							    <th data-field="serial_number" data-sortable="true">Nama Item</th>
						        <th data-field="id_vendor" data-sortable="true">Serial Number</th>
								<th data-field="po_number" data-sortable="true">PO Number</th>
								<th data-field="lokasi" data-sortable="true">Lokasi</th>
								<th data-field="status_barang" data-sortable="true">Status</th>
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
								<td data-field="code_item" data-sortable="true"><?php echo $record['code_item'];?></td>
								<td data-field="nama_item" data-sortable="true"><?php echo $record['nama_item'];?></td>
								<td data-field="serial_number" data-sortable="true"><?php echo $record['serial_number'];?></td>
								<td data-field="po_number" data-sortable="true"><?php echo $record['po_number'];?></td>
								<td data-field="lokasi" data-sortable="true"><?php echo $record['nama_lokasi'];?></td>
								<td data-field="status_barang" data-sortable="true">
								 <?php if($record['status_barang'] == 'tersedia') { ?>
						        	<span class="label label-primary"><?php echo $record['status_barang'];?></span>
						        <?php } else { ?>
						        	<span class="label label-danger"><?php echo $record['status_barang'];?></span>
						        <?php } ?>
						        </td>
						       	<td data-field="action" data-sortable="true"><a href="detail-barang.php?id=<?php echo $record['id_barang'];?>"><span class="glyphicon glyphicon-eye-open" title="Details"></a> &nbsp;&nbsp;<a href="ubah-barang.php?id=<?php echo $record['id_barang'];?>"><span class="glyphicon glyphicon-pencil" title="Edit"></a> &nbsp;&nbsp;<a href="hapus-barang.php?id=<?php echo $record['id_barang'];?>" onclick="return confirm('Apakah Anda yakin?');"><span class="glyphicon glyphicon-remove" title="Delete"></a> &nbsp;&nbsp;<a href="all-detail-barang-update.php?id=<?php echo $record['id_barang'];?>"><span class="glyphicon glyphicon-tasks" title="All Detail Barang"></a></td>
						    </tr>
<?php
}
?>					    							
						   </tbody>
						</table>
						 </div>

<?php
$sql2 = "select barang.id_barang,item.code_item,item.nama_item,barang.serial_number,barang.po_number,barang.id_lokasi,lokasi.nama_lokasi,barang.status_barang 
		from barang,item,lokasi 
		where item.code_item=barang.code_item 
		and lokasi.id_lokasi=barang.id_lokasi 
		and status_barang='tidak tersedia' 
		order by id_barang DESC";

$hasil2 = mysql_query($sql2);	
?>		
						
  					<div id="tidaktersedia" class="tab-pane fade">

						<table data-toggle="table" data-url="tables/data1.json"  data-show-refresh="true" data-show-toggle="true" data-show-columns="true" data-search="true" data-select-item-name="toolbar1" data-pagination="true" >
						    <thead>
						    <tr>
							    <th data-field="itemid" data-sortable="true">No</th>
						        <th data-field="nama_barang"  data-sortable="true">Code Item</th>
							    <th data-field="serial_number" data-sortable="true">Nama Item</th>
						        <th data-field="id_vendor" data-sortable="true">Serial Number</th>
								<th data-field="po_number" data-sortable="true">PO Number</th>
								<th data-field="lokasi" data-sortable="true">Lokasi</th>
								<th data-field="status_barang" data-sortable="true">Status</th>
						        <th data-field="action" data-sortable="true">Action</th>
						    </tr>
							</thead>
							<tbody>
<?php						
$no=0;
while($record2 = mysql_fetch_array($hasil2)){
?>
						   <tr>
								<td data-field="itemid" data-sortable="true"><?php echo $no=$no+1;?></td>
								<td data-field="code_item" data-sortable="true"><?php echo $record2['code_item'];?></td>
								<td data-field="nama_item" data-sortable="true"><?php echo $record2['nama_item'];?></td>
								<td data-field="serial_number" data-sortable="true"><?php echo $record2['serial_number'];?></td>
								<td data-field="po_number" data-sortable="true"><?php echo $record2['po_number'];?></td>
								<td data-field="lokasi" data-sortable="true"><?php echo $record2['nama_lokasi'];?></td>
								<td data-field="status_barang" data-sortable="true">
								 <?php if($record2['status_barang'] == 'tersedia') { ?>
						        	<span class="label label-primary"><?php echo $record2['status_barang'];?></span>
						        <?php } else { ?>
						        	<span class="label label-danger"><?php echo $record2['status_barang'];?></span>
						        <?php } ?>
						        </td>
						       	<td data-field="action" data-sortable="true"><a href="detail-barang.php?id=<?php echo $record2['id_barang'];?>"><span class="glyphicon glyphicon-eye-open" title="Details"></a> &nbsp;&nbsp;<a href="ubah-barang.php?id=<?php echo $record2['id_barang'];?>"><span class="glyphicon glyphicon-pencil" title="Edit"></a> &nbsp;&nbsp;<a href="hapus-barang.php?id=<?php echo $record['id_barang'];?>"><span class="glyphicon glyphicon-remove" title="Delete"></a> &nbsp;&nbsp;<a href="all-detail-barang-update.php?id=<?php echo $record2['id_barang'];?>"><span class="glyphicon glyphicon-tasks" title="All Detail Barang"></a></td>
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
</body>

</html>

