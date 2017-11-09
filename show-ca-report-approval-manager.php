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
				<li class="active">CA Report Approval Manager</li>
			</ol>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">CA Report Approval Manager</h1>
			</div>
		</div><!--/.row-->
				
		<?php

		include "koneksi.php";

		$sql = "select ca_request.id_ca_request, ca_request.swos, ca_request.tgl_request, ca_request.tgl_approve, ca_request.judul_ca, ca_request.jumlah, ca_request.jumlah_sisa_ca, engineer.nama_engineer, ca_request.status_approval, ca_request.status_ca_report_approval, ca_request.status_ca_report_approval_manager from ca_request,engineer where ca_request.id_engineer=engineer.id_engineer and status_ca_report_approval_manager='Not Approved' order by id_ca_request desc";
		$hasil = mysql_query($sql); ?>
		
		<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default">
					<!--div class="panel-heading"><a href="tambah-ca-request.php" class="btn btn-primary btn-md">Tambah CA Request</a></div-->
					<div class="panel-body">

<ul class="nav nav-tabs">
  <li class="active"><a data-toggle="tab" href="#needapproval">CA Report Need Approval</a></li>
  <li><a data-toggle="tab" href="#approved">CA Report Approved</a></li>
</ul>

<div class="tab-content">
  <div id="needapproval" class="tab-pane fade in active">					
					
					<table data-toggle="table" data-url="tables/data1.json"  data-show-refresh="true" data-show-toggle="true" data-show-columns="true" data-search="true" data-select-item-name="toolbar1" data-pagination="true" >
						  
						 <thead>
						    <tr>
							<th data-field="itemid" data-sortable="true">No</th>
						        <th data-field="swos"  data-sortable="true">SWOS</th>
								<th data-field="tgl_request"  data-sortable="true">Date Request</th>
						        <th data-field="tgl_approve" data-sortable="true">Date Approve</th>
						        <th data-field="judul_ca" data-sortable="true">Judul CA</th>
								<th data-field="jumlah" data-sortable="true">Jumlah</th>
								<th data-field="jumlah_sisa_ca" data-sortable="true">Jumlah Sisa</th>
						        <th data-field="nama_engineer" data-sortable="true">Nama Engineer</th>
								<th data-field="status_ca_report_approval_manager" data-sortable="true">Status CA Report Manager</th>
								<th data-field="action" data-sortable="true">Action</th>
						    </tr>
							</thead>
							<tbody>
							<?php						
$no=0;
while($record = mysql_fetch_array($hasil)){
?>
							
								<td data-field="itemid" data-sortable="true"><?php echo $no=$no+1;?></td>
								<td data-field="swos" data-sortable="true"><?php echo $record['swos'];?></td>
								<td data-field="tgl_request" data-sortable="true"><?php echo $record['tgl_request'];?></td>
						        <td data-field="tgl_approve" data-sortable="true"><?php echo $record['tgl_approve'];?></td>
						        <td data-field="judul_ca" data-sortable="true"><?php echo $record['judul_ca'];?></td>
								<td data-field="jumlah" data-sortable="true"> 
								<?php
								print number_format($record['jumlah'],0,',','.'); 
								?>
								</td>
								<td data-field="jumlah_sisa_ca" data-sortable="true"> 
								<?php
								print number_format($record['jumlah_sisa_ca'],0,',','.'); 
								?>
								</td>
						        <td data-field="nama_engineer" data-sortable="true"><?php echo $record['nama_engineer'];?></td>
								<td data-field="status_ca_report_approval_manager" data-sortable="true">
						        <?php if($record['status_ca_report_approval_manager'] == 'Not Approved') { ?>
						        	<span class="label label-danger"><?php echo $record['status_ca_report_approval_manager'];?></span>
						        <?php } else { ?>
						        	<span class="label label-primary"><?php echo $record['status_ca_report_approval_manager'];?></span>
						        <?php } ?>
						        </td>
						        <td data-field="action" data-sortable="true"><a href="detail-ca-report-approval.php?id=<?php echo $record['id_ca_request'];?>"><span class="glyphicon glyphicon-eye-open" title="Details"></a>&nbsp;&nbsp;<a href="ubah-ca-report-approval-manager.php?id=<?php echo $record['id_ca_request'];?>"><span class="glyphicon glyphicon-pencil" title="Edit"></a>&nbsp;&nbsp;<a href="all-detail-ca-request.php?id=<?php echo $record['id_ca_request'];?>"><span class="glyphicon glyphicon-tasks" title="Detail CA Report"></a></td>
						        
						      </tr>
<?php
}
?>					    							
						    						    </tbody>
						</table>
  </div>

<?php 

$sql_closed = "select ca_request.id_ca_request, ca_request.swos, ca_request.tgl_request, ca_request.tgl_approve, ca_request.judul_ca, ca_request.jumlah, ca_request.jumlah_sisa_ca, engineer.nama_engineer, ca_request.status_approval, ca_request.status_ca_report_approval, ca_request.status_ca_report_approval_manager from ca_request,engineer where ca_request.id_engineer=engineer.id_engineer and status_ca_report_approval_manager='Approved' order by id_ca_request desc";
		$ticket_closed = mysql_query($sql_closed); ?>

  <div id="approved" class="tab-pane fade">
					<table data-toggle="table" data-url="tables/data1.json"  data-show-refresh="true" data-show-toggle="true" data-show-columns="true" data-search="true" data-select-item-name="toolbar1" data-pagination="true" >
						  
						 <thead>
						    <tr>
							<th data-field="itemid" data-sortable="true">No</th>
						        <th data-field="swos"  data-sortable="true">SWOS</th>
								<th data-field="tgl_request"  data-sortable="true">Date Request</th>
						        <th data-field="tgl_approve" data-sortable="true">Date Approve</th>
						        <th data-field="judul_ca" data-sortable="true">Judul CA</th>
								<th data-field="jumlah" data-sortable="true">Jumlah</th>
								<th data-field="jumlah_sisa_ca" data-sortable="true">Jumlah Sisa</th>
						        <th data-field="nama_engineer" data-sortable="true">Nama Engineer</th>
								<th data-field="status_ca_report_approval_manager" data-sortable="true">Status CA Report Manager</th>
								<th data-field="action" data-sortable="true">Action</th>
						    </tr>
							</thead>
							<tbody>
							<?php						
$no=0;
while($ticket_close = mysql_fetch_array($ticket_closed)){
?>
							
								<td data-field="itemid" data-sortable="true"><?php echo $no=$no+1;?></td>
								<td data-field="swos" data-sortable="true"><?php echo $ticket_close['swos'];?></td>
								<td data-field="tgl_request" data-sortable="true"><?php echo $ticket_close['tgl_request'];?></td>
						        <td data-field="tgl_approve" data-sortable="true"><?php echo $ticket_close['tgl_approve'];?></td>
						        <td data-field="judul_ca" data-sortable="true"><?php echo $ticket_close['judul_ca'];?></td>
								<td data-field="jumlah" data-sortable="true"> 
								<?php
								print number_format($ticket_close['jumlah'],0,',','.'); 
								?>
								</td>
								<td data-field="jumlah_sisa_ca" data-sortable="true"> 
								<?php
								print number_format($ticket_close['jumlah_sisa_ca'],0,',','.'); 
								?>
								</td>
						        <td data-field="nama_engineer" data-sortable="true"><?php echo $ticket_close['nama_engineer'];?></td>
								<td data-field="status_ca_report_approval_manager" data-sortable="true">
						        <?php if($ticket_close['status_ca_report_approval_manager'] == 'Not Approved') { ?>
						        	<span class="label label-danger"><?php echo $ticket_close['status_ca_report_approval_manager'];?></span>
						        <?php } else { ?>
						        	<span class="label label-primary"><?php echo $ticket_close['status_ca_report_approval_manager'];?></span>
						        <?php } ?>
						        </td>
						        <td data-field="action" data-sortable="true"><a href="detail-ca-report-approval.php?id=<?php echo $ticket_close['id_ca_request'];?>"><span class="glyphicon glyphicon-eye-open" title="Details"></a>&nbsp;&nbsp;<a href="ubah-ca-report-approval-manager.php?id=<?php echo $ticket_close['id_ca_request'];?>"><span class="glyphicon glyphicon-pencil" title="Edit"></a>&nbsp;&nbsp;<a href="all-detail-ca-request.php?id=<?php echo $ticket_close['id_ca_request'];?>"><span class="glyphicon glyphicon-tasks" title="Detail CA Report"></a></td>
						        
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




