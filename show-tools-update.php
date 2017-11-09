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
	<?php include ('menu.php') ?>
		<!--	
	==================================================== MENU
	-->
		
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">			
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="#"><span class="glyphicon glyphicon-home"></span></a></li>
				<li class="active">Tools Update</li>
			</ol>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Tools Update</h1>
			</div>
		</div><!--/.row-->
				
<?php

include "koneksi.php";

$sql = "SELECT tools_update.id_tools_update, tools_update.id_tools, tools_update.swos, tools.code_item, item.nama_item, tools_update.keterangan, tools_update.tgl_tools_update, tools_update.jumlah_update
		FROM tools_update, tools, item
		WHERE tools.id_tools = tools_update.id_tools
		and tools.code_item = item.code_item
		and keterangan = 'tools masuk'
		ORDER BY id_tools_update DESC";

$hasil = mysql_query($sql);	
?>		
		<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default">
					<div class="panel-heading"><a href="tambah-tools-update.php" class="btn btn-primary btn-md">Tambah Tools Update</a></div>
					<div class="panel-body">

						<ul class="nav nav-tabs">
						  <li class="active"><a data-toggle="tab" href="#masuk">Tools Masuk</a></li>
						  <li><a data-toggle="tab" href="#keluar">Tools Keluar</a></li>
						  <li><a data-toggle="tab" href="#dismantle">Tools Dismantle</a></li>
						  <li><a data-toggle="tab" href="#rmakirim">Tools RMA Dikirim</a></li>
						  <li><a data-toggle="tab" href="#rmaselesai">Tools RMA Selesai</a></li>
						</ul>

						<div class="tab-content">
  							<div id="masuk" class="tab-pane fade in active">

						<table data-toggle="table" data-url="tables/data1.json"  data-show-refresh="true" data-show-toggle="true" data-show-columns="true" data-search="true" data-select-item-name="toolbar1" data-pagination="true" >
						    <thead>
						    <tr>
							    <th data-field="itemid" data-sortable="true">No</th>
							    <th data-field="swos"  data-sortable="true">SWOS</th>
							    <th data-field="nama_item" data-sortable="true">Nama Item</th>
						        <th data-field="keterangan" data-sortable="true">Keterangan</th>
						        <th data-field="jumlah_update" data-sortable="true">Jumlah Update</th>
								<th data-field="tgl_tools_update" data-sortable="true">Tanggal Update</th>
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
								<td data-field="nama_item" data-sortable="true"><?php echo $record['nama_item'];?></td>
								<td data-field="keterangan" data-sortable="true"><?php echo $record['keterangan'];?></td>
								<td data-field="jumlah_update" data-sortable="true"><?php echo $record['jumlah_update'];?></td>
								<td data-field="tgl_tools_update" data-sortable="true"><?php echo $record['tgl_tools_update'];?></td>
						       	<td data-field="action" data-sortable="true"><a href="detail-tools-update.php?id=<?php echo $record['id_tools_update'];?>"><span class="glyphicon glyphicon-eye-open" title="Details"></a> &nbsp;&nbsp;<a href="ubah-tools-update.php?id=<?php echo $record['id_tools_update'];?>"><span class="glyphicon glyphicon-pencil" title="Edit"></a> &nbsp;&nbsp;</td>
						    </tr>
<?php
}
?>					    							
						 	</tbody>
						</table>
					</div>

<?php
$sql5 = "SELECT tools_update.id_tools_update, tools_update.id_tools, tools_update.swos, tools.code_item, item.nama_item,  tools_update.keterangan, tools_update.tgl_tools_update, tools_update.jumlah_update
		FROM tools_update, tools, item
		WHERE tools.id_tools = tools_update.id_tools
		and tools.code_item = item.code_item
		and keterangan = 'tools keluar'
		ORDER BY id_tools_update DESC";

$hasil5 = mysql_query($sql5);	
?>

				<div id="keluar" class="tab-pane fade">
					<table data-toggle="table" data-url="tables/data1.json"  data-show-refresh="true" data-show-toggle="true" data-show-columns="true" data-search="true" data-select-item-name="toolbar1" data-pagination="true" >
						    <thead>
						    <tr>
							    <th data-field="itemid" data-sortable="true">No</th>
							    <th data-field="swos"  data-sortable="true">SWOS</th>
							    <th data-field="nama_item" data-sortable="true">Nama Item</th>
						        <th data-field="keterangan" data-sortable="true">Keterangan</th>
						        <th data-field="jumlah_update" data-sortable="true">Jumlah Update</th>
								<th data-field="tgl_tools_update" data-sortable="true">Tanggal Update</th>
						        <th data-field="action" data-sortable="true">Action</th>
						    </tr>
							</thead>
							<tbody>
<?php						
$no=0;
while($record5 = mysql_fetch_array($hasil5)){
?>
						   <tr>
								<td data-field="itemid" data-sortable="true"><?php echo $no=$no+1;?></td>
								<td data-field="swos" data-sortable="true"><?php echo $record5['swos'];?></td>
								<td data-field="nama_item" data-sortable="true"><?php echo $record5['nama_item'];?></td>
								<td data-field="keterangan" data-sortable="true"><?php echo $record5['keterangan'];?></td>
								<td data-field="jumlah_update" data-sortable="true"><?php echo $record5['jumlah_update'];?></td>
								<td data-field="tgl_tools_update" data-sortable="true"><?php echo $record5['tgl_tools_update'];?></td>
						       	<td data-field="action" data-sortable="true"><a href="detail-tools-update.php?id=<?php echo $record5['id_tools_update'];?>"><span class="glyphicon glyphicon-eye-open" title="Details"></a> &nbsp;&nbsp;<a href="ubah-tools-update.php?id=<?php echo $record5['id_tools_update'];?>"><span class="glyphicon glyphicon-pencil" title="Edit"></a> &nbsp;&nbsp;</td>
						    </tr>
<?php
}
?>					    							
						 	</tbody>
						</table>
					</div>

<?php
$sql2 = "SELECT tools_update.id_tools_update, tools_update.id_tools, tools_update.swos, tools.code_item, item.nama_item,  tools_update.keterangan, tools_update.tgl_tools_update, tools_update.jumlah_update
		FROM tools_update, tools, item
		WHERE tools.id_tools = tools_update.id_tools
		and tools.code_item = item.code_item
		and keterangan = 'tools dismantle'
		ORDER BY id_tools_update DESC";

$hasil2 = mysql_query($sql2);	
?>

				<div id="dismantle" class="tab-pane fade">
					<table data-toggle="table" data-url="tables/data1.json"  data-show-refresh="true" data-show-toggle="true" data-show-columns="true" data-search="true" data-select-item-name="toolbar1" data-pagination="true" >
						    <thead>
						    <tr>
							    <th data-field="itemid" data-sortable="true">No</th>
							    <th data-field="swos"  data-sortable="true">SWOS</th>
							    <th data-field="nama_item" data-sortable="true">Nama Item</th>
						        <th data-field="keterangan" data-sortable="true">Keterangan</th>
						        <th data-field="jumlah_update" data-sortable="true">Jumlah Update</th>
								<th data-field="tgl_tools_update" data-sortable="true">Tanggal Update</th>
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
								<td data-field="nama_item" data-sortable="true"><?php echo $record2['nama_item'];?></td>
								<td data-field="keterangan" data-sortable="true"><?php echo $record2['keterangan'];?></td>
								<td data-field="jumlah_update" data-sortable="true"><?php echo $record2['jumlah_update'];?></td>
								<td data-field="tgl_tools_update" data-sortable="true"><?php echo $record2['tgl_tools_update'];?></td>
						       	<td data-field="action" data-sortable="true"><a href="detail-tools-update.php?id=<?php echo $record2['id_tools_update'];?>"><span class="glyphicon glyphicon-eye-open" title="Details"></a> &nbsp;&nbsp;<a href="ubah-tools-update.php?id=<?php echo $record2['id_tools_update'];?>"><span class="glyphicon glyphicon-pencil" title="Edit"></a> &nbsp;&nbsp;</td>
						    </tr>
<?php
}
?>					    							
						 	</tbody>
						</table>
					</div>
						
<?php
$sql3 = "SELECT tools_update.id_tools_update, tools_update.id_tools, tools_update.swos, tools.code_item, item.nama_item,  tools_update.keterangan, tools_update.tgl_tools_update, tools_update.jumlah_update
		FROM tools_update, tools, item
		WHERE tools.id_tools = tools_update.id_tools
		and tools.code_item = item.code_item
		and keterangan = 'tools rma'
		and status_rma = 'dikirim rma'
		ORDER BY id_tools_update DESC";

$hasil3 = mysql_query($sql3);	
?>

				<div id="rmakirim" class="tab-pane fade">
					<table data-toggle="table" data-url="tables/data1.json"  data-show-refresh="true" data-show-toggle="true" data-show-columns="true" data-search="true" data-select-item-name="toolbar1" data-pagination="true" >
						    <thead>
						    <tr>
							   <th data-field="itemid" data-sortable="true">No</th>
							    <th data-field="swos"  data-sortable="true">SWOS</th>
							    <th data-field="nama_item" data-sortable="true">Nama Item</th>
						        <th data-field="keterangan" data-sortable="true">Keterangan</th>
						        <th data-field="jumlah_update" data-sortable="true">Jumlah Update</th>
								<th data-field="tgl_tools_update" data-sortable="true">Tanggal Update</th>
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
								<td data-field="nama_item" data-sortable="true"><?php echo $record3['nama_item'];?></td>
								<td data-field="keterangan" data-sortable="true"><?php echo $record3['keterangan'];?></td>
								<td data-field="jumlah_update" data-sortable="true"><?php echo $record3['jumlah_update'];?></td>
								<td data-field="tgl_tools_update" data-sortable="true"><?php echo $record3['tgl_tools_update'];?></td>
						       	<td data-field="action" data-sortable="true"><a href="detail-tools-update.php?id=<?php echo $record3['id_tools_update'];?>"><span class="glyphicon glyphicon-eye-open" title="Details"></a> &nbsp;&nbsp;<a href="ubah-tools-update.php?id=<?php echo $record3['id_tools_update'];?>"><span class="glyphicon glyphicon-pencil" title="Edit"></a> &nbsp;&nbsp;</td>
						    </tr>
<?php
}
?>					    							
						 	</tbody>
						</table>
					</div>

<?php
$sql4 = "SELECT tools_update.id_tools_update, tools_update.id_tools, tools_update.swos, tools.code_item, item.nama_item,  tools_update.keterangan, tools_update.tgl_tools_update, tools_update.jumlah_update
		FROM tools_update, tools, item
		WHERE tools.id_tools = tools_update.id_tools
		and tools.code_item = item.code_item
		and keterangan = 'tools rma'
		and status_rma = 'selesai rma'
		ORDER BY id_tools_update DESC";

$hasil4 = mysql_query($sql4);	
?>

				<div id="rmaselesai" class="tab-pane fade">
					<table data-toggle="table" data-url="tables/data1.json"  data-show-refresh="true" data-show-toggle="true" data-show-columns="true" data-search="true" data-select-item-name="toolbar1" data-pagination="true" >
						    <thead>
						    <tr>
							 <th data-field="itemid" data-sortable="true">No</th>
							    <th data-field="swos"  data-sortable="true">SWOS</th>
							    <th data-field="nama_item" data-sortable="true">Nama Item</th>
						        <th data-field="keterangan" data-sortable="true">Keterangan</th>
						        <th data-field="jumlah_update" data-sortable="true">Jumlah Update</th>
								<th data-field="tgl_tools_update" data-sortable="true">Tanggal Update</th>
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
								<td data-field="nama_item" data-sortable="true"><?php echo $record4['nama_item'];?></td>
								<td data-field="keterangan" data-sortable="true"><?php echo $record4['keterangan'];?></td>
								<td data-field="jumlah_update" data-sortable="true"><?php echo $record4['jumlah_update'];?></td>
								<td data-field="tgl_tools_update" data-sortable="true"><?php echo $record4['tgl_tools_update'];?></td>
						       	<td data-field="action" data-sortable="true"><a href="detail-tools-update.php?id=<?php echo $record4['id_tools_update'];?>"><span class="glyphicon glyphicon-eye-open" title="Details"></a> &nbsp;&nbsp;<a href="ubah-tools-update.php?id=<?php echo $record4['id_tools_update'];?>"><span class="glyphicon glyphicon-pencil" title="Edit"></a> &nbsp;&nbsp;</td>
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

