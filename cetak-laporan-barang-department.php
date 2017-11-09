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

  <div class="row">
    <div class="col-lg-12">
      <center><h1 class="page-header">Laporan Barang Berdasarkan Department</h1></center>
      
      <?php
      include "koneksi.php";
      //$xls_filename = 'export-laporan-barang-masuk'.date('Y-m-d').'.xls'; // Define Excel (.xls) file name
      $tgl_awal =$_POST['tgl_awal'];
      $tgl_akhir = $_POST['tgl_akhir'];
      $nama_owner = $_POST['nama_owner'];

                        ?>
      <center><h5>Periode tanggal <b><?php echo $tgl_awal;?></b> sampai <b><?php echo $tgl_akhir;?></b></h5></center>
      <?php

      if ($nama_owner=="All"){
      $sql = "SELECT barang.code_item, item.nama_item, owner.nama_owner, lokasi.nama_lokasi, vendor.nama_vendor, barang.mac, barang.serial_number, barang.harga, barang.harga_usd, barang.kondisi, barang.po_number, barang.tgl_masuk, barang.status_barang, barang.tgl_qc, engineer.nama_engineer, barang.status_qc, barang.remark
              FROM barang, item, owner, lokasi, vendor, engineer
              WHERE barang.code_item = item.code_item
              AND barang.id_owner = owner.id_owner
              AND barang.id_lokasi = lokasi.id_lokasi
              AND barang.id_vendor = vendor.id_vendor
              AND barang.id_engineer = engineer.id_engineer
              AND tgl_masuk BETWEEN '$tgl_awal' AND '$tgl_akhir'
              AND status_barang = 'tersedia'
              ORDER BY id_barang DESC"; 
      
      } else if ($nama_owner=="$nama_owner"){
      $sql = "SELECT barang.code_item, item.nama_item, owner.nama_owner, lokasi.nama_lokasi, vendor.nama_vendor, barang.mac, barang.serial_number, barang.harga, barang.harga_usd, barang.kondisi, barang.po_number, barang.tgl_masuk, barang.status_barang, barang.tgl_qc, engineer.nama_engineer, barang.status_qc, barang.remark
              FROM barang, item, owner, lokasi, vendor, engineer
              WHERE barang.code_item = item.code_item
              AND barang.id_owner = owner.id_owner
              AND barang.id_lokasi = lokasi.id_lokasi
              AND barang.id_vendor = vendor.id_vendor
              AND barang.id_engineer = engineer.id_engineer
              AND owner.nama_owner = '$nama_owner'
              AND tgl_masuk BETWEEN '$tgl_awal' AND '$tgl_akhir'
              AND status_barang = 'tersedia'
              ORDER BY id_barang DESC ";
      
      }

      $hasil = mysql_query($sql); 
      ?>

      <table data-toggle="table" data-url="tables/data1.json"  data-show-refresh="false" data-show-toggle="false" data-show-columns="false" data-search="false" data-select-item-name="toolbar1" data-pagination="false" >
                <thead>
                <tr>
                    <th data-field="itemid"  data-sortable="true">No</th>
                    <th data-field="code_item"  data-sortable="true">Code Item</th>
                    <th data-field="nama_item"  data-sortable="true">Nama Item</th>
                    <th data-field="nama_owner"  data-sortable="true">Nama Owner</th>
                    <th data-field="nama_lokasi" data-sortable="true">Nama Lokasi</th>
                    <th data-field="id_vendor" data-sortable="true">Nama Vendor</th>
                    <th data-field="mac" data-sortable="true">MAC Address</th>
                    <th data-field="serial_number" data-sortable="true">Serial Number</th>
                    <th data-field="harga" data-sortable="true">Harga IDR</th>
                    <th data-field="harga_usd" data-sortable="true">Harga USD</th>
                    <th data-field="kondisi" data-sortable="true">Kondisi</th>
                    <th data-field="po_number" data-sortable="true">PO Number</th>
                    <th data-field="tgl_masuk" data-sortable="true">Tanggal Masuk</th>
                    <th data-field="status_barang" data-sortable="true">Status Barang</th>
                    <th data-field="tgl_qc" data-sortable="true">Tanggal QC</th>
                    <th data-field="nama_engineer" data-sortable="true">Engineer QC</th>
                    <th data-field="status_qc" data-sortable="true">Status QC</th>
                    <th data-field="remark" data-sortable="true">Remark</th>
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
                <td data-field="nama_owner" data-sortable="true"><?php echo $record['nama_owner'];?></td>
                <td data-field="nama_lokasi" data-sortable="true"><?php echo $record['nama_lokasi'];?></td>
                <td data-field="id_vendor" data-sortable="true"><?php echo $record['nama_vendor'];?></td>
                <td data-field="mac" data-sortable="true"><?php echo $record['mac'];?></td>
                <td data-field="serial_number" data-sortable="true"><?php echo $record['serial_number'];?></td>
                <td data-field="harga" data-sortable="true"><?php echo $record['harga'];?></td>
                <td data-field="harga_usd" data-sortable="true"><?php echo $record['harga_usd'];?></td>
                <td data-field="kondisi" data-sortable="true"><?php echo $record['kondisi'];?></td>
                <td data-field="po_number" data-sortable="true"><?php echo $record['po_number'];?></td>
                <td data-field="tgl_masuk" data-sortable="true"><?php echo $record['tgl_masuk'];?></td>
                <td data-field="status_barang" data-sortable="true"><?php echo $record['status_barang'];?></td>
                <td data-field="tgl_qc" data-sortable="true"><?php echo $record['tgl_qc'];?></td>
                <td data-field="nama_engineer" data-sortable="true"><?php echo $record['nama_engineer'];?></td>
                <td data-field="status_qc" data-sortable="true"><?php echo $record['status_qc'];?></td>
                <td data-field="remark" data-sortable="true"><?php echo $record['remark'];?></td>
                </tr>
<?php
}
?>  
                          
                </tbody>
            </table>

      <?php
/*   
      if ($owner=="All"){
      $query = mysql_query("SELECT SUM(harga) as Total FROM barang WHERE status_barang = 'tersedia' AND tgl_masuk BETWEEN  '$tgl_awal' AND  '$tgl_akhir'"); 
      }

      else if ($owner=="$owner"){
      $query = mysql_query("SELECT SUM(harga) as Total FROM barang WHERE status_barang = 'tersedia' AND owner='$owner' AND tgl_masuk BETWEEN  '$tgl_awal' AND  '$tgl_akhir'"); 
      }
        
      ?>
            <br>
            <table class="table table-striped">
                  <tbody>
                  <tr>                    
                    <td width="15%"><b>Total Pembelian IDR</b></td>
                    <?php while($record = mysql_fetch_array($query)){ ?>
                    <td>Rp <?php 
                      $rupiah = $record['Total'];

                    function format_rupiah($rupiah){
                     $rupiah1=number_format($rupiah,2,',','.');
                     return $rupiah1;
                    }
                    $rupiah2 = format_rupiah($rupiah);
                    echo $rupiah2;
                    ?></td>
                    <? } ?>
                  </tr>
            </table>

            <?php

      if ($owner=="All"){
      $query2 = mysql_query("SELECT SUM(harga_usd) as total_usd FROM barang WHERE status_barang = 'tersedia' AND tgl_masuk BETWEEN  '$tgl_awal' AND  '$tgl_akhir'"); 
      }

      if ($owner=="$owner"){
      $query2 = mysql_query("SELECT SUM(harga_usd) as total_usd FROM barang WHERE status_barang = 'tersedia' AND owner='$owner' AND tgl_masuk BETWEEN  '$tgl_awal' AND  '$tgl_akhir'"); 
      }
        
      ?>
            <br>
            <table class="table table-striped">
                  <tbody>
                  <tr>                    
                    <td width="15%"><b>Total Pembelian USD</b></td>
                    <?php while($record3 = mysql_fetch_array($query2)){ ?>
                    <td>$ <?php 
              $dollar = $record3['total_usd'];

            function format_dollar($dollar){
             $dollar1=number_format($dollar,2,'.',',');
             return $dollar1;
            }
            $dollar2 = format_dollar($dollar);
            echo $dollar2;
            ?></td>
                    <? } */?>
                  </tr>
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
