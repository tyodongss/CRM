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
				<li class="active">Device BTS</li>
			</ol>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Device BTS</h1>
			</div>
		</div><!--/.row-->
				
		<?php

		include "koneksi.php";

		$sql = "select device_bts.id_device_bts,device_bts.nama_device,bts.nama_bts,device_bts.ssid,frequency.nama_frequency,device_bts.ipaddress,device_bts.created_at, device_bts.updated_at, device_bts.deleted_at from device_bts,bts,frequency where bts.id_bts=device_bts.id_bts and frequency.id_frequency=device_bts.id_frequency order by nama_bts ASC";
		$hasil = mysql_query($sql); 
		?>
		
		<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default">
					<div class="panel-heading"><a href="tambah-device-bts.php" class="btn btn-primary btn-md">Tambah Device BTS</a></div>
					<div class="panel-body">
		
					
					<table data-toggle="table" data-url="tables/data1.json"  data-show-refresh="true" data-show-toggle="true" data-show-columns="true" data-search="true" data-select-item-name="toolbar1" data-pagination="true" >
						  
						 <thead>
						    <tr>
							<th data-field="itemid" data-sortable="true">No</th>
						        <th data-field="nama_device"  data-sortable="true">Nama Device</th>
								<th data-field="nama_bts"  data-sortable="true">Nama BTS</th>
						        <th data-field="ssid" data-sortable="true">SSID</th>
						        <th data-field="nama_frequency" data-sortable="true">Frequency</th>
						        <th data-field="ipaddress" data-sortable="true">IP Address</th>
							<th data-field="action" data-sortable="true">Action</th>
						    </tr>
							</thead>
							<tbody>
							<?php						
$no=0;
while($record = mysql_fetch_array($hasil)){
?>
							
								<td data-field="itemid" data-sortable="true"><?php echo $no=$no+1;?></td>
								<td data-field="nama_device" data-sortable="true"><?php echo $record['nama_device'];?></td>
								<td data-field="nama_bts" data-sortable="true"><?php echo $record['nama_bts'];?></td>
						        <td data-field="ssid" data-sortable="true"><?php echo $record['ssid'];?></td>
						        <td data-field="nama_frequency" data-sortable="true"><?php echo $record['nama_frequency'];?></td>
						        <td data-field="ipaddress" data-sortable="true"><?php echo $record['ipaddress'];?></td>
						        <td data-field="action" data-sortable="true"><a href="detail-device-bts.php?id=<?php echo $record['id_device_bts'];?>"><span class="glyphicon glyphicon-eye-open" title="Details"></a> &nbsp;&nbsp;<a href="ubah-device-bts.php?id=<?php echo $record['id_device_bts'];?>"><span class="glyphicon glyphicon-pencil" title="Edit"></a> &nbsp;&nbsp;</td>
						        
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
