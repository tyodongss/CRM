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
				<li class="active">Barang Update</li>
			</ol>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Barang Update</h1>
			</div>
		</div><!--/.row-->
				
<?php

include "koneksi.php";

//$sql = "select * from barang ORDER BY id_barang ";
$sql = "SELECT barang_update.id_barang_update, barang_update.id_barang, barang_update.swos, barang.code_item, item.nama_item, barang.serial_number, barang_update.keterangan, barang_update.tgl_barang_update
		FROM barang_update, barang, item
		WHERE barang.id_barang = barang_update.id_barang
		and barang.code_item = item.code_item
		and keterangan = 'barang keluar'
		ORDER BY id_barang_update DESC";

$hasil = mysql_query($sql);	
?>		
		<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default">
					<div class="panel-heading"><a href="tambah-barang-update.php" class="btn btn-primary btn-md">Tambah Barang Update</a></div>
					<div class="panel-body">

						<ul class="nav nav-tabs">
						  <li class="active"><a data-toggle="tab" href="#keluar">Barang Keluar</a></li>
						  <li><a data-toggle="tab" href="#dismantle">Barang Dismantle</a></li>
						  <li><a data-toggle="tab" href="#rmakirim">Barang RMA Dikirim</a></li>
						  <li><a data-toggle="tab" href="#rmaselesai">Barang RMA Selesai</a></li>
						</ul>

						<div class="tab-content">
  							<div id="keluar" class="tab-pane fade in active">

						<table data-toggle="table" data-url="tables/data1.json"  data-show-refresh="true" data-show-toggle="true" data-show-columns="true" data-search="true" data-select-item-name="toolbar1" data-pagination="true" >
						    <thead>
						    <tr>
							    <th data-field="itemid" data-sortable="true">No</th>
							    <th data-field="swos"  data-sortable="true">SWOS</th>
						        <th data-field="serial_number"  data-sortable="true">Serial Number</th>
							    <th data-field="nama_item" data-sortable="true">Nama Item</th>
						        <th data-field="keterangan" data-sortable="true">Keterangan</th>
								<th data-field="tgl_barang_update" data-sortable="true">Tanggal Update</th>
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
								<td data-field="swos" data-sortable="true"><?php echo $record['swos'];?></td>
								<td data-field="serial_number" data-sortable="true"><?php echo $record['serial_number'];?></td>
								<td data-field="nama_item" data-sortable="true"><?php echo $record['nama_item'];?></td>
								<td data-field="keterangan" data-sortable="true"><?php echo $record['keterangan'];?></td>
								<td data-field="tgl_barang_update" data-sortable="true"><?php echo $record['tgl_barang_update'];?></td>
						       	<td data-field="action" data-sortable="true"><a href="detail-barang-update.php?id=<?php echo $record['id_barang_update'];?>"><span class="glyphicon glyphicon-eye-open" title="Details"></a> &nbsp;&nbsp;<a href="ubah-barang-update.php?id=<?php echo $record['id_barang_update'];?>"><span class="glyphicon glyphicon-pencil" title="Edit"></a> &nbsp;&nbsp;</td>
						    </tr>
<?php
}
?>					    							
						 	</tbody>
						</table>
					</div>

<?php
$sql2 = "SELECT barang_update.id_barang_update, barang_update.id_barang, barang_update.swos, barang.code_item, item.nama_item, barang.serial_number, barang_update.keterangan, barang_update.tgl_barang_update
		FROM barang_update, barang, item
		WHERE barang.id_barang = barang_update.id_barang
		and barang.code_item = item.code_item
		and keterangan = 'barang dismantle'
		ORDER BY id_barang_update DESC";

$hasil2 = mysql_query($sql2);	
?>

				<div id="dismantle" class="tab-pane fade">
					<table data-toggle="table" data-url="tables/data1.json"  data-show-refresh="true" data-show-toggle="true" data-show-columns="true" data-search="true" data-select-item-name="toolbar1" data-pagination="true" >
						    <thead>
						    <tr>
							    <th data-field="itemid" data-sortable="true">No</th>
							    <th data-field="swos"  data-sortable="true">SWOS</th>
						        <th data-field="serial_number"  data-sortable="true">Serial Number</th>
							    <th data-field="nama_item" data-sortable="true">Nama Item</th>
						        <th data-field="keterangan" data-sortable="true">Keterangan</th>
								<th data-field="tgl_barang_update" data-sortable="true">Tanggal Update</th>
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
								<td data-field="swos" data-sortable="true"><?php echo $record2['swos'];?></td>
								<td data-field="serial_number" data-sortable="true"><?php echo $record2['serial_number'];?></td>
								<td data-field="nama_item" data-sortable="true"><?php echo $record2['nama_item'];?></td>
								<td data-field="keterangan" data-sortable="true"><?php echo $record2['keterangan'];?></td>
								<td data-field="tgl_barang_update" data-sortable="true"><?php echo $record2['tgl_barang_update'];?></td>
						       	<td data-field="action" data-sortable="true"><a href="detail-barang-update.php?id=<?php echo $record2['id_barang_update'];?>"><span class="glyphicon glyphicon-eye-open" title="Details"></a> &nbsp;&nbsp;<a href="ubah-barang-update.php?id=<?php echo $record2['id_barang_update'];?>"><span class="glyphicon glyphicon-pencil" title="Edit"></a> &nbsp;&nbsp;</td>
						    </tr>
<?php
}
?>					    							
						 	</tbody>
						</table>
					</div>
						
<?php
$sql3 = "SELECT barang_update.id_barang_update, barang_update.id_barang, barang_update.swos, barang.code_item, item.nama_item, barang.serial_number, barang_update.keterangan, barang_update.tgl_barang_update
		FROM barang_update, barang, item
		WHERE barang.id_barang = barang_update.id_barang
		and barang.code_item = item.code_item
		and keterangan = 'barang rma'
		and status_rma = 'dikirim rma'
		ORDER BY id_barang_update DESC";

$hasil3 = mysql_query($sql3);	
?>

				<div id="rmakirim" class="tab-pane fade">
					<table data-toggle="table" data-url="tables/data1.json"  data-show-refresh="true" data-show-toggle="true" data-show-columns="true" data-search="true" data-select-item-name="toolbar1" data-pagination="true" >
						    <thead>
						    <tr>
							    <th data-field="itemid" data-sortable="true">No</th>
							    <th data-field="swos"  data-sortable="true">SWOS</th>
						        <th data-field="serial_number"  data-sortable="true">Serial Number</th>
							    <th data-field="nama_item" data-sortable="true">Nama Item</th>
						        <th data-field="keterangan" data-sortable="true">Keterangan</th>
								<th data-field="tgl_barang_update" data-sortable="true">Tanggal Update</th>
						        <th data-field="action" data-sortable="true">Action</th>
						    </tr>
							</thead>
							<tbody>
<?php						
$no=0;
while($record3 = mysql_fetch_array($hasil3)){
?>
						   <tr>
								<td data-field="itemid" data-sortable="true"><?php echo $no=$no+1;?></td>
								<td data-field="swos" data-sortable="true"><?php echo $record3['swos'];?></td>
								<td data-field="serial_number" data-sortable="true"><?php echo $record3['serial_number'];?></td>
								<td data-field="nama_item" data-sortable="true"><?php echo $record3['nama_item'];?></td>
								<td data-field="keterangan" data-sortable="true"><?php echo $record3['keterangan'];?></td>
								<td data-field="tgl_barang_update" data-sortable="true"><?php echo $record3['tgl_barang_update'];?></td>
						       	<td data-field="action" data-sortable="true"><a href="detail-barang-update.php?id=<?php echo $record3['id_barang_update'];?>"><span class="glyphicon glyphicon-eye-open" title="Details"></a> &nbsp;&nbsp;<a href="ubah-barang-update.php?id=<?php echo $record3['id_barang_update'];?>"><span class="glyphicon glyphicon-pencil" title="Edit"></a> &nbsp;&nbsp;</td>
						    </tr>
<?php
}
?>					    							
						 	</tbody>
						</table>
					</div>

<?php
$sql4 = "SELECT barang_update.id_barang_update, barang_update.id_barang, barang_update.swos, barang.code_item, item.nama_item, barang.serial_number, barang_update.keterangan, barang_update.tgl_barang_update
		FROM barang_update, barang, item
		WHERE barang.id_barang = barang_update.id_barang
		and barang.code_item = item.code_item
		and keterangan = 'barang rma'
		and status_rma = 'selesai rma'
		ORDER BY id_barang_update DESC";

$hasil4 = mysql_query($sql4);	
?>

				<div id="rmaselesai" class="tab-pane fade">
					<table data-toggle="table" data-url="tables/data1.json"  data-show-refresh="true" data-show-toggle="true" data-show-columns="true" data-search="true" data-select-item-name="toolbar1" data-pagination="true" >
						    <thead>
						    <tr>
							    <th data-field="itemid" data-sortable="true">No</th>
							    <th data-field="swos"  data-sortable="true">SWOS</th>
						        <th data-field="serial_number"  data-sortable="true">Serial Number</th>
							    <th data-field="nama_item" data-sortable="true">Nama Item</th>
						        <th data-field="keterangan" data-sortable="true">Keterangan</th>
								<th data-field="tgl_barang_update" data-sortable="true">Tanggal Update</th>
						        <th data-field="action" data-sortable="true">Action</th>
						    </tr>
							</thead>
							<tbody>
<?php						
$no=0;
while($record4 = mysql_fetch_array($hasil4)){
?>
						   <tr>
								<td data-field="itemid" data-sortable="true"><?php echo $no=$no+1;?></td>
								<td data-field="swos" data-sortable="true"><?php echo $record4['swos'];?></td>
								<td data-field="serial_number" data-sortable="true"><?php echo $record4['serial_number'];?></td>
								<td data-field="nama_item" data-sortable="true"><?php echo $record4['nama_item'];?></td>
								<td data-field="keterangan" data-sortable="true"><?php echo $record4['keterangan'];?></td>
								<td data-field="tgl_barang_update" data-sortable="true"><?php echo $record4['tgl_barang_update'];?></td>
						       	<td data-field="action" data-sortable="true"><a href="detail-barang-update.php?id=<?php echo $record4['id_barang_update'];?>"><span class="glyphicon glyphicon-eye-open" title="Details"></a> &nbsp;&nbsp;<a href="ubah-barang-update.php?id=<?php echo $record4['id_barang_update'];?>"><span class="glyphicon glyphicon-pencil" title="Edit"></a> &nbsp;&nbsp;</td>
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

