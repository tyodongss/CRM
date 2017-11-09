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
				<li class="active">CA Budget</li>
			</ol>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">CA Budget</h1>
			</div>
		</div><!--/.row-->
				
		<?php

		include "koneksi.php";

		$sql = "select ca_budget.id_ca_budget, ca_budget.judul_ca_budget, bulan.nama_bulan, tahun.nama_tahun, ca_budget.jumlah_awal, ca_budget.jumlah_sisa, ca_budget.status_ca_budget from ca_budget, bulan, tahun where ca_budget.id_bulan=bulan.id_bulan and ca_budget.id_tahun=tahun.id_tahun and ca_budget.status_ca_budget='Open' order by id_ca_budget desc";
		$hasil = mysql_query($sql); ?>
		
		<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default">
					<div class="panel-heading"><a href="tambah-ca-budget.php" class="btn btn-primary btn-md">Tambah CA Budget</a></div>
					<div class="panel-body">
<ul class="nav nav-tabs">
  <li class="active"><a data-toggle="tab" href="#open">Outstanding CA</a></li>  
  <li><a data-toggle="tab" href="#close">Close CA</a></li>  
</ul>

<div class="tab-content">
  <div id="open" class="tab-pane fade in active">		
					
					<table data-toggle="table" data-url="tables/data1.json"  data-show-refresh="true" data-show-toggle="true" data-show-columns="true" data-search="true" data-select-item-name="toolbar1" data-pagination="true" >
						  
						 <thead>
						    <tr>
								<th data-field="itemid" data-sortable="true">No</th>
						        <th data-field="judul_ca_budget"  data-sortable="true">Judul CA Budget</th>
								<th data-field="jumlah_awal"  data-sortable="true">Jumlah Awal</th>
								<th data-field="jumlah_sisa"  data-sortable="true">Jumlah Sisa</th>	
								<th data-field="status_ca_budget"  data-sortable="true">Status</th>									
								<th data-field="action" data-sortable="true">Action</th>
						    </tr>
							</thead>
							<tbody>
							<?php						
$no=0;
while($record = mysql_fetch_array($hasil)){
?>
							
								<td data-field="itemid" data-sortable="true"><?php echo $no=$no+1;?></td>
								<td data-field="judul_ca_budget" data-sortable="true"><?php echo $record['judul_ca_budget'];?></td>
						        <td data-field="jumlah_awal" data-sortable="true"> 
								<?php
								print number_format($record['jumlah_awal'],0,',','.'); 
								?>
								</td>
						         <td data-field="jumlah_sisa" data-sortable="true"> 
								<?php
								print number_format($record['jumlah_sisa'],0,',','.'); 
								?>
								</td>
								<td data-field="status_backbone_problem" data-sortable="true">
						        <?php if($record['status_ca_budget'] == 'Open') { ?>
						        	<span class="label label-danger"><?php echo $record['status_ca_budget'];?></span>
						        <?php } else { ?>
						        	<span class="label label-primary"><?php echo $record['status_ca_budget'];?></span>
						        <?php } ?>
						        </td>
						        <td data-field="action" data-sortable="true"><a href="detail-ca-budget.php?id=<?php echo $record['id_ca_budget'];?>"><span class="glyphicon glyphicon-eye-open" title="Details"></a> &nbsp;&nbsp;<a href="ubah-ca-budget.php?id=<?php echo $record['id_ca_budget'];?>"><span class="glyphicon glyphicon-pencil" title="Edit"></a>&nbsp;&nbsp;<a href="all-detail-ca-budget.php?id=<?php echo $record['id_ca_budget'];?>"><span class="glyphicon glyphicon-tasks" title="Detail CA Request"></a></td>
						        
						      </tr>
<?php
}
?>					    							
						     </tbody>
						</table>
	
					</div>
					
<?php 

$sql_closed = "select ca_budget.id_ca_budget, ca_budget.judul_ca_budget, bulan.nama_bulan, tahun.nama_tahun, ca_budget.jumlah_awal, ca_budget.jumlah_sisa, ca_budget.status_ca_budget from ca_budget, bulan, tahun where ca_budget.id_bulan=bulan.id_bulan and ca_budget.id_tahun=tahun.id_tahun and ca_budget.status_ca_budget='Close' order by id_ca_budget desc";
		$ticket_closed = mysql_query($sql_closed); ?>

  <div id="close" class="tab-pane fade">
					<table data-toggle="table" data-url="tables/data1.json"  data-show-refresh="true" data-show-toggle="true" data-show-columns="true" data-search="true" data-select-item-name="toolbar1" data-pagination="true" data-sort-name="name" data-sort-order="asc">
                            <thead>
                            <tr>
                                <th data-field="itemid" data-sortable="true">No</th>
						        <th data-field="judul_ca_budget"  data-sortable="true">Judul CA Budget</th>
								<th data-field="jumlah_awal"  data-sortable="true">Jumlah Awal</th>
								<th data-field="jumlah_sisa"  data-sortable="true">Jumlah Sisa</th>	
								<th data-field="status_ca_budget"  data-sortable="true">Status</th>									
								<th data-field="action" data-sortable="true">Action</th> 
                            </tr>
                            </thead>
                            <tbody>
<?php						
$no=0;
while($ticket_close = mysql_fetch_array($ticket_closed)){
?>
							<td data-field="itemid" data-sortable="true"><?php echo $no=$no+1;?></td>
								<td data-field="judul_ca_budget" data-sortable="true"><?php echo $ticket_close['judul_ca_budget'];?></td>
						         <td data-field="jumlah_awal" data-sortable="true"> 
								<?php
								print number_format($ticket_close['jumlah_awal'],0,',','.'); 
								?>
								</td>
						         <td data-field="jumlah_sisa" data-sortable="true"> 
								<?php
								print number_format($ticket_close['jumlah_sisa'],0,',','.'); 
								?>
								</td>
								<td data-field="status_backbone_problem" data-sortable="true">
						        <?php if($ticket_close['status_ca_budget'] == 'Open') { ?>
						        	<span class="label label-danger"><?php echo $ticket_close['status_ca_budget'];?></span>
						        <?php } else { ?>
						        	<span class="label label-primary"><?php echo $ticket_close['status_ca_budget'];?></span>
						        <?php } ?>
						        </td>
						        <td data-field="action" data-sortable="true"><a href="detail-ca-budget.php?id=<?php echo $ticket_close['id_ca_budget'];?>"><span class="glyphicon glyphicon-eye-open" title="Details"></a> &nbsp;&nbsp;<a href="ubah-ca-budget.php?id=<?php echo $ticket_close['id_ca_budget'];?>"><span class="glyphicon glyphicon-pencil" title="Edit"></a> &nbsp;&nbsp;<a href="all-detail-ca-budget.php?id=<?php echo $ticket_close['id_ca_budget'];?>"><span class="glyphicon glyphicon-tasks" title="Detail CA Request"></a></td>
						        
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




