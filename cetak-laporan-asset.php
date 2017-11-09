<?php
date_default_timezone_set('Asia/Makassar'); 
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

    <div class="row">
        <div class="col-lg-12">
            <center><h1 class="page-header">Laporan Asset</h1></center>
            <?php
            include "koneksi.php";
			
			$id_kategori_item = $_POST['id_kategori_item'];
            $id_asset = $_POST['id_asset'];
            
                if ( $id_kategori_item=="All" && $id_asset=="All"){
                $sql2 = "SELECT asset.id_asset, asset.code_item, item.nama_item, asset.id_kategori_item, kategori_item.nama_kategori_item, asset.id_owner, owner.nama_owner, asset.id_lokasi, lokasi.nama_lokasi, asset.serial_number, asset.jumlah_awal, asset.jumlah_stok, asset.id_vendor, vendor.nama_vendor, asset.kondisi, asset.po_number, asset.tgl_masuk, asset.status_asset, asset.nilai_perolehan, asset.umur, asset.remark, asset.created_at, asset.updated_at, asset.deleted_at, TIMESTAMPDIFF(MONTH, tgl_masuk, CURDATE()) as selisihbulan
					FROM asset, item, owner, lokasi, vendor,kategori_item
					WHERE asset.code_item = item.code_item
					AND asset.id_kategori_item = kategori_item.id_kategori_item
					AND asset.id_owner = owner.id_owner
					AND asset.id_lokasi = lokasi.id_lokasi
					AND asset.id_vendor = vendor.id_vendor
					ORDER BY nama_item ASC";
				  
				} else if ( $id_kategori_item=="$id_kategori_item" && $id_asset=="All"){
                $sql2 = "SELECT asset.id_asset, asset.code_item, item.nama_item, asset.id_kategori_item, kategori_item.nama_kategori_item, asset.id_owner, owner.nama_owner, asset.id_lokasi, lokasi.nama_lokasi, asset.serial_number, asset.jumlah_awal, asset.jumlah_stok, asset.id_vendor, vendor.nama_vendor, asset.kondisi, asset.po_number, asset.tgl_masuk, asset.status_asset, asset.nilai_perolehan, asset.umur, asset.remark, asset.created_at, asset.updated_at, asset.deleted_at, TIMESTAMPDIFF(MONTH, tgl_masuk, CURDATE()) as selisihbulan
					FROM asset, item, owner, lokasi, vendor,kategori_item
					WHERE asset.id_kategori_item = '$id_kategori_item'
					AND asset.code_item = item.code_item
					AND asset.id_kategori_item = kategori_item.id_kategori_item
					AND asset.id_owner = owner.id_owner
					AND asset.id_lokasi = lokasi.id_lokasi
					AND asset.id_vendor = vendor.id_vendor
					ORDER BY nama_item ASC";
					
				} else if ( $id_kategori_item=="All" && $id_asset=="$id_asset"){
                $sql2 = "SELECT asset.id_asset, asset.code_item, item.nama_item, asset.id_kategori_item, kategori_item.nama_kategori_item, asset.id_owner, owner.nama_owner, asset.id_lokasi, lokasi.nama_lokasi, asset.serial_number, asset.jumlah_awal, asset.jumlah_stok, asset.id_vendor, vendor.nama_vendor, asset.kondisi, asset.po_number, asset.tgl_masuk, asset.status_asset, asset.nilai_perolehan, asset.umur, asset.remark, asset.created_at, asset.updated_at, asset.deleted_at, TIMESTAMPDIFF(MONTH, tgl_masuk, CURDATE()) as selisihbulan
					FROM asset, item, owner, lokasi, vendor,kategori_item
					WHERE asset.id_asset = '$id_asset'
					AND asset.code_item = item.code_item
					AND asset.id_kategori_item = kategori_item.id_kategori_item
					AND asset.id_owner = owner.id_owner
					AND asset.id_lokasi = lokasi.id_lokasi
					AND asset.id_vendor = vendor.id_vendor
					ORDER BY nama_item ASC";
					
				} else if ( $id_kategori_item=="$id_kategori_item" && $id_asset=="$id_asset"){
                $sql2 = "SELECT asset.id_asset, asset.code_item, item.nama_item, asset.id_kategori_item, kategori_item.nama_kategori_item, asset.id_owner, owner.nama_owner, asset.id_lokasi, lokasi.nama_lokasi, asset.serial_number, asset.jumlah_awal, asset.jumlah_stok, asset.id_vendor, vendor.nama_vendor, asset.kondisi, asset.po_number, asset.tgl_masuk, asset.status_asset, asset.nilai_perolehan, asset.umur, asset.remark, asset.created_at, asset.updated_at, asset.deleted_at, TIMESTAMPDIFF(MONTH, tgl_masuk, CURDATE()) as selisihbulan
					FROM asset, item, owner, lokasi, vendor,kategori_item
					WHERE asset.id_kategori_item = '$id_kategori_item'
					AND asset.id_asset = '$id_asset'
					AND asset.code_item = item.code_item
					AND asset.id_kategori_item = kategori_item.id_kategori_item
					AND asset.id_owner = owner.id_owner
					AND asset.id_lokasi = lokasi.id_lokasi
					AND asset.id_vendor = vendor.id_vendor
					ORDER BY nama_item ASC";				
				
                }else {
				  
				 $sql2 = "SELECT asset.id_asset, asset.code_item, item.nama_item, asset.id_kategori_item, kategori_item.nama_kategori_item, asset.id_owner, owner.nama_owner, asset.id_lokasi, lokasi.nama_lokasi, asset.serial_number, asset.jumlah_awal, asset.jumlah_stok, asset.id_vendor, vendor.nama_vendor, asset.kondisi, asset.po_number, asset.tgl_masuk, asset.status_asset, asset.nilai_perolehan, asset.umur, asset.remark, asset.created_at, asset.updated_at, asset.deleted_at, TIMESTAMPDIFF(MONTH, tgl_masuk, CURDATE()) as selisihbulan
					FROM asset, item, owner, lokasi, vendor,kategori_item
					WHERE asset.code_item = item.code_item
					AND asset.id_kategori_item = kategori_item.id_kategori_item
					AND asset.id_owner = owner.id_owner
					AND asset.id_lokasi = lokasi.id_lokasi
					AND asset.id_vendor = vendor.id_vendor
					ORDER BY nama_item ASC";
			  } 
            
            $hasil2 = mysql_query($sql2); 
        ?>
            
<table data-toggle="table" data-url="tables/data1.json"  data-show-refresh="false" data-show-toggle="false" data-show-columns="false" data-search="false" data-select-item-name="toolbar1" data-pagination="false">
                            <thead>
                            <tr>
                                <th data-field="itemid" data-sortable="true">No</th>
                                <th data-field="nama_item"  data-sortable="true">Nama Item</th>
                                <th data-field="code_item" data-sortable="true">Code Item</th>
                                <th data-field="nama_kategori_item" data-sortable="true">Kategori</th>
                                <th data-field="nama_owner" data-sortable="true">Owner Asset</th>
                                <th data-field="nama_lokasi" data-sortable="true">Lokasi</th>
                                <th data-field="nama_vendor"  data-sortable="true">Nama Vendor</th>
                                <th data-field="serial_number" data-sortable="true">Serial Number</th>
								<th data-field="jumlah_awal" data-sortable="true">Jumlah Awal</th>
								<th data-field="jumlah_stok" data-sortable="true">Jumlah Stok</th>
                                <th data-field="kondisi" data-sortable="true">Kondisi</th>
                                <th data-field="po_number" data-sortable="true">PO Number</th>
                                <th data-field="tgl_masuk" data-sortable="true">Tanggal Masuk</th>
								<th data-field="status_asset" data-sortable="true">Status Asset</th> 
                                <th data-field="nilai_perolehan" data-sortable="true">Nilai Perolehan</th> 
								<th data-field="umur" data-sortable="true">Umur (Tahun)</th>
                                <th data-field="selisihbulan" data-sortable="true">Depresiasi Bulan ke</th>
								<th data-field="nilaiakhir" data-sortable="true">Nilai Depresiasi Bulan ke</th> 
                                <th data-field="remark" data-sortable="true">Remark</th>
                            </tr>
                            </thead>
                            <tbody>
<?php                       
$no=0;
while($record2 = mysql_fetch_array($hasil2)){
?>
                           <tr>
                                <td data-field="itemid" data-sortable="true"><?php echo $no=$no+1;?></td>
                                <td data-field="nama_item" data-sortable="true"><?php echo $record2['nama_item'];?></td>
                                <td data-field="code_item" data-sortable="true"><?php echo $record2['code_item'];?></td>
                                <td data-field="nama_kategori_item" data-sortable="true"><?php echo $record2['nama_kategori_item'];?></td>
                                <td data-field="nama_owner" data-sortable="true"><?php echo $record2['nama_owner'];?></td>
                                <td data-field="nama_lokasi" data-sortable="true"><?php echo $record2['nama_lokasi'];?></td>
                                <td data-field="nama_vendor" data-sortable="true"><?php echo $record2['nama_vendor'];?></td>
                                <td data-field="serial_number" data-sortable="true"><?php echo $record2['serial_number'];?></td>
								<td data-field="jumlah_awal" data-sortable="true"><?php echo $record2['jumlah_awal'];?></td>
								<td data-field="jumlah_stok" data-sortable="true"><?php echo $record2['jumlah_stok'];?></td>
                                <td data-field="kondisi" data-sortable="true"><?php echo $record2['kondisi'];?></td>
                                <td data-field="po_number" data-sortable="true"><?php echo $record2['po_number'];?></td>
                                <td data-field="tgl_masuk" data-sortable="true"><?php echo $record2['tgl_masuk'];?></td>
								<td data-field="status_asset" data-sortable="true"><?php echo $record2['status_asset'];?></td>
                                <td>Rp <?php 
									  	print number_format($record2['nilai_perolehan'],2,',','.');
										?>
								</td>								
								<td data-field="umur" data-sortable="true"><?php echo $record2['umur'];?></td>
                                <td data-field="selisihbulan" data-sortable="true"><?php echo $record2['selisihbulan'];?></td>
								<td data-field="selisihbulan" data-sortable="true">Rp <?php 
									    $umur = $record2['umur'];										
										$umurbulan = 12 * $umur;
										$nilaiperolehan = $record2['nilai_perolehan'];
										$nilaidepresiasi = $nilaiperolehan / $umurbulan;						
										$selisihbulan = $record2['selisihbulan'];
										
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
                                <td data-field="remark" data-sortable="true"><?php echo $record2['remark'];?></td>
                            </tr>
<?php
}
?>                                                  
                            </tbody>
                        </table>

        </div>
    </div><!--/.row-->
</div>


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
