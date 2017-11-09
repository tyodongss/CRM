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
        <li class="active">CA Report</li>
      </ol>
    </div><!--/.row-->
    
    <div class="row">
      <div class="col-lg-12">
        <h1 class="page-header">CA Report</h1>
      </div>
    </div><!--/.row-->
        
   <?php
$id = $_SESSION['id'];

if ($id!=""){

    include "koneksi.php";    
	
	$sql = "SELECT ca_request.id_ca_request, ca_request.swos, ca_request.tgl_request, ca_request.tgl_approve, ca_request.judul_ca, ca_request.jumlah, engineer.nama_engineer, ca_request.status_ca_request
			FROM ca_request, engineer
			WHERE ca_request.id_engineer = engineer.id_engineer
			AND ca_request.status_approval =  'Approved'
			AND ca_request.status_ca_request =  'Open'
			AND ca_request.id_engineer = '$id'
			ORDER BY id_ca_request DESC";
	$hasil = mysql_query($sql);
	
	?>
    
    <div class="row">
      <div class="col-lg-12">
        <div class="panel panel-default">
          <div class="panel-heading"><a href="tambah-ca-report.php" class="btn btn-primary btn-md">Tambah CA Report</a>&nbsp;&nbsp;&nbsp;&nbsp;<a href="tambah-konfirmasi-ca-request.php" class="btn btn-primary btn-md">Submit Report CA yang Sudah Lengkap</a></div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Klik tombol diatas untuk submit report CA yang sudah dilengkap diinput untuk mendapatkan approval dari manager
          <div class="panel-body">

<ul class="nav nav-tabs">
  <li class="active"><a data-toggle="tab" href="#outstandingcarequest">Outstanding CA Request</a></li>
  <li><a data-toggle="tab" href="#historycarequest">History CA Request</a></li>
  <li><a data-toggle="tab" href="#listcareport">List CA Report</a></li>
</ul>

<div class="tab-content">
  <div id="outstandingcarequest" class="tab-pane fade in active">		  
          
          <table data-toggle="table" data-url="tables/data1.json"  data-show-refresh="true" data-show-toggle="true" data-show-columns="true" data-search="true" data-select-item-name="toolbar1" data-pagination="true" >
              
             <thead>
                <tr>
					<th data-field="itemid" data-sortable="true">No</th>
					<th data-field="swos"  data-sortable="true">SWOS</th>
					<th data-field="tgl_request"  data-sortable="true">Date Request</th>
					<th data-field="tgl_approve" data-sortable="true">Date Approve</th>
					<th data-field="judul_ca" data-sortable="true">Judul CA</th>
					<th data-field="jumlah" data-sortable="true">Jumlah</th>
					<th data-field="nama_engineer" data-sortable="true">Nama Engineer</th>
					<th data-field="status_ca_request" data-sortable="true">Status CA</th>
					<th data-field="Action" data-sortable="true">Action</th>					
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
					<td data-field="tgl_request" data-sortable="true"><?php echo $record['tgl_request'];?></td>
					<td data-field="tgl_approve" data-sortable="true"><?php echo $record['tgl_approve'];?></td>
					<td data-field="judul_ca" data-sortable="true"><?php echo $record['judul_ca'];?></td>
					<td data-field="jumlah" data-sortable="true"> 
					<?php
					print number_format($record['jumlah'],0,',','.'); 
					?>
					</td>
					<td data-field="nama_engineer" data-sortable="true"><?php echo $record['nama_engineer'];?></td>
					<td data-field="status_ca_request" data-sortable="true">
					<?php if($record['status_ca_request'] == 'Open') { ?>
					   	<span class="label label-danger"><?php echo $record['status_ca_request'];?></span>
					    <?php } else { ?>
					  	<span class="label label-primary"><?php echo $record['status_ca_request'];?></span>
					    <?php } ?>
					</td>				
                    <td data-field="action" data-sortable="true"><a href="all-detail-ca-request.php?id=<?php echo $record['id_ca_request'];?>"><span class="glyphicon glyphicon-tasks" title="Detail CA Report"></a></td>
                </tr>
<?php
}
?>                           
                </tbody>
            </table>
  
          </div>
		  
<?php 

	$sql2 = "SELECT ca_request.id_ca_request, ca_request.swos, ca_request.tgl_request, ca_request.tgl_approve, ca_request.judul_ca, ca_request.jumlah, engineer.nama_engineer, ca_request.status_ca_request
			FROM ca_request, engineer
			WHERE ca_request.id_engineer = engineer.id_engineer
			AND ca_request.status_approval =  'Approved'
			AND ca_request.status_ca_request =  'Close'
			AND ca_request.id_engineer = '$id'
			ORDER BY id_ca_request DESC";
	$hasil2 = mysql_query($sql2);  ?>

  <div id="historycarequest" class="tab-pane fade">
					<table data-toggle="table" data-url="tables/data1.json"  data-show-refresh="true" data-show-toggle="true" data-show-columns="true" data-search="true" data-select-item-name="toolbar1" data-pagination="true" data-sort-name="name" data-sort-order="asc">
                            <thead>
                             <tr>
							  <th data-field="itemid" data-sortable="true">No</th>
								<th data-field="swos"  data-sortable="true">SWOS</th>
								<th data-field="tgl_request"  data-sortable="true">Date Request</th>
								<th data-field="tgl_approve" data-sortable="true">Date Approve</th>
								<th data-field="judul_ca" data-sortable="true">Judul CA</th>
								<th data-field="jumlah" data-sortable="true">Jumlah</th>
								<th data-field="nama_engineer" data-sortable="true">Nama Engineer</th>
								<th data-field="status_ca_request" data-sortable="true">Status CA</th>
								<th data-field="Action" data-sortable="true">Action</th>					
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
							<td data-field="tgl_request" data-sortable="true"><?php echo $record2['tgl_request'];?></td>
							<td data-field="tgl_approve" data-sortable="true"><?php echo $record2['tgl_approve'];?></td>
							<td data-field="judul_ca" data-sortable="true"><?php echo $record2['judul_ca'];?></td>
							<td data-field="jumlah" data-sortable="true"> 
							<?php
							print number_format($record2['jumlah'],0,',','.'); 
							?>
							</td>
							<td data-field="nama_engineer" data-sortable="true"><?php echo $record2['nama_engineer'];?></td>
							<td data-field="status_ca_request" data-sortable="true">
							<?php if($record2['status_ca_request'] == 'Open') { ?>
								<span class="label label-danger"><?php echo $record2['status_ca_request'];?></span>
								<?php } else { ?>
								<span class="label label-primary"><?php echo $record2['status_ca_request'];?></span>
								<?php } ?>
							</td>				
							<td data-field="action" data-sortable="true"><a href="all-detail-ca-request.php?id=<?php echo $record2['id_ca_request'];?>"><span class="glyphicon glyphicon-tasks" title="Detail CA Report"></a></td>
						</tr>
<?php
}
?>					    							
						    </tbody>
						</table>
					</div>	
					
<?php 

$sql3 = "SELECT ca_report.id_ca_report, ca_report.id_engineer, engineer.nama_engineer, ca_kategori.nama_ca_kategori, ca_report.tgl_report, ca_report.status_ca_report, ca_request.judul_ca, ca_request.status_ca_request
			FROM ca_report, engineer, ca_kategori, ca_request
			WHERE ca_report.id_engineer = engineer.id_engineer
			AND ca_report.id_ca_kategori = ca_kategori.id_ca_kategori
			AND ca_report.id_ca_request = ca_request.id_ca_request
			AND ca_report.id_engineer = '$id'
			ORDER BY id_ca_report DESC";
    $hasil3 = mysql_query($sql3);  ?>

  <div id="listcareport" class="tab-pane fade">
					<table data-toggle="table" data-url="tables/data1.json"  data-show-refresh="true" data-show-toggle="true" data-show-columns="true" data-search="true" data-select-item-name="toolbar1" data-pagination="true" data-sort-name="name" data-sort-order="asc">
                            <thead>
                             <tr>
							  <th data-field="itemid" data-sortable="true">No</th>
							  <th data-field="judul_ca"  data-sortable="true">Judul CA Request</th>
							  <th data-field="nama_engineer"  data-sortable="true">Nama Engineer</th>
							  <th data-field="nama_ca_kategori" data-sortable="true">Kategori</th>
							  <th data-field="tgl_report" data-sortable="true">Date Report</th>
							  <th data-field="status_ca_report" data-sortable="true">Status</th>
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
								<td data-field="judul_ca" data-sortable="true"><?php echo $record3['judul_ca'];?></td>
								<td data-field="nama_engineer" data-sortable="true"><?php echo $record3['nama_engineer'];?></td>
								<td data-field="nama_ca_kategori" data-sortable="true"><?php echo $record3['nama_ca_kategori'];?></td>
								<td data-field="tgl_report" data-sortable="true"><?php echo $record3['tgl_report'];?></td>
								<td data-field="status_ca_report" data-sortable="true"><?php echo $record3['status_ca_report'];?></td>
								<?php            

									if ($record3['status_ca_request']=="Close"){
									?>
									<td data-field="action" data-sortable="true"><a href="detail-ca-report.php?id=<?php echo $record3['id_ca_report'];?>"><span class="glyphicon glyphicon-eye-open" title="Details"></a> </td>
									<?php
									} else {
									?>
									<td data-field="action" data-sortable="true"><a href="detail-ca-report.php?id=<?php echo $record3['id_ca_report'];?>"><span class="glyphicon glyphicon-eye-open" title="Details"></a> &nbsp;&nbsp;<a href="ubah-ca-report.php?id=<?php echo $record3['id_ca_report'];?>"><span class="glyphicon glyphicon-pencil" title="Edit"></a> &nbsp;&nbsp;</td>
									<?php
									}
									?>				
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
<?php
}
?> 
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



