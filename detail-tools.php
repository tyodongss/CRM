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
        <?php include ('menu.php') ?>

<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">


                <div class="row">
                        <ol class="breadcrumb">
                                <li><a href="#"><span class="glyphicon glyphicon-home"></span></a></li>
				<li class="active">Tools</li>
			</ol>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Detail Tools</h1>
			</div>
		</div><!--/.row-->
<?php 
include "koneksi.php"; 
$id=$_GET['id']; 
$query=mysql_query("SELECT tools.id_tools, tools.code_item, brand.nama_brand, item.nama_item, kategori_item.nama_kategori_item, tools.id_owner, owner.nama_owner, tools.id_lokasi, lokasi.nama_lokasi, toolbox.nama_toolbox, tools.serial_number, tools.jumlah_awal, tools.jumlah_stok, tools.id_vendor, vendor.nama_vendor, tools.kondisi, tools.po_number, tools.tgl_masuk, tools.status_tools, tools.nilai_perolehan, tools.umur, tools.remark, tools.created_at, tools.updated_at, tools.deleted_at, TIMESTAMPDIFF(MONTH, tgl_masuk, CURDATE()) as selisihbulan
FROM tools, item, owner, lokasi, vendor,kategori_item, brand, toolbox
WHERE tools.code_item = item.code_item
AND tools.id_kategori_item = kategori_item.id_kategori_item
AND tools.id_brand = brand.id_brand
AND tools.id_toolbox = toolbox.id_toolbox
AND tools.id_owner = owner.id_owner
AND tools.id_lokasi = lokasi.id_lokasi
AND tools.id_vendor = vendor.id_vendor
AND id_tools =  '$id'"); 
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
									  <td width="40%"><b>Nama Item</b></td>
									  <td><?php echo $row['nama_item'];?></td>
									</tr>
									<tr>									  
									  <td width="40%"><b>Code Item</b></td>
									  <td><?php echo $row['code_item'];?></td>
									</tr>
									<tr>									  
									  <td width="40%"><b>Kategori</b></td>
									  <td><?php echo $row['nama_kategori_item'];?></td>
									</tr>
									<tr>									  
									  <td width="40%"><b>Brand</b></td>
									  <td><?php echo $row['nama_brand'];?></td>
									</tr>
									<tr>									  
									  <td width="40%"><b>Owner Barang</b></td>
									  <td><?php echo $row['nama_owner'];?></td>
									</tr>
									<tr>									  
									  <td width="40%"><b>Lokasi</b></td>
									  <td><?php echo $row['nama_lokasi'];?></td>
									</tr>
									<tr>									  
									  <td width="40%"><b>Toolbix</b></td>
									  <td><?php echo $row['nama_toolbox'];?></td>
									</tr>
									<tr>									  
									  <td width="40%"><b>Nama Vendor</b></td>
									  <td><?php echo $row['nama_vendor'];?></td>
									</tr>
									<tr>									  
									  <td width="40%"><b>Serial Number</b></td>
									  <td><?php echo $row['serial_number'];?></td>
									</tr>
									<tr>									  
									  <td width="40%"><b>Jumlah Awal</b></td>
									  <td><?php echo $row['jumlah_awal'];?></td>
									</tr>
									<tr>									  
									  <td width="40%"><b>Jumlah Stok</b></td>
									  <td><?php echo $row['jumlah_stok'];?></td>
									</tr>
									<tr>									  
									  <td width="40%"><b>Kondisi</b></td>
									  <td><?php echo $row['kondisi'];?></td>
									</tr>
									<tr>									  
									  <td width="40%"><b>PO Number</b></td>
									  <td><?php echo $row['po_number'];?></td>
									</tr>
									<tr>									  
									  <td width="40%"><b>Tanggal Masuk</b></td>
									  <td><?php echo $row['tgl_masuk'];?></td>
									</tr>
									<tr>									  
									  <td width="40%"><b>Status Tools</b></td>
									  <td><?php echo $row['status_tools'];?></td>
									</tr>
									<tr>									  
									  <td width="40%"><b>Nilai Perolehan</b></td>
									  <td>Rp <?php 
									  	print number_format($row['nilai_perolehan'],2,',','.');
										?>
									</td>
									</tr>
									<tr>									  
									  <td width="40%"><b>Umur</b></td>
									  <td><?php echo $row['umur'];?></td>
									</tr>
									<tr>									  
									  <td width="40%"><b>Depresiasi Bulan ke</b></td>
									  <td><?php echo $row['selisihbulan'];?></td>
									</tr>
									<tr>									  
									  <td width="40%"><b>Nilai Depresiasi Bulan ke-<?php echo $row['selisihbulan'];?></b></td>
									  <td>Rp <?php 
									    $umur = $row['umur'];										
										$umurbulan = 12 * $umur;
										$nilaiperolehan = $row['nilai_perolehan'];
										$nilaidepresiasi = $nilaiperolehan / $umurbulan;						
										$selisihbulan = $row['selisihbulan'];
										
										$nilaipenyusutan = $nilaidepresiasi * $selisihbulan;
										$nilaiakhir = $nilaiperolehan - $nilaipenyusutan;
										
										if ($nilaiakhir < 0  ){
											echo '0,00';
										}
										else {
										echo number_format($nilaiakhir,2,',','.');									
										}
										
									  ?>
									  </td>
									</tr>
									<tr>									  
									  <td width="40%"><b>Remark</b></td>
									  <td><?php echo $row['remark'];?></td>
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
								<form role="form" action="show-tools.php">
																													
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
