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

      <?php
      include "koneksi.php";
      //$xls_filename = 'export-laporan-barang-masuk'.date('Y-m-d').'.xls'; // Define Excel (.xls) file name
      $tgl_awal =$_POST['tgl_awal'];
      $tgl_akhir = $_POST['tgl_akhir'];
      $keterangan = $_POST['keterangan'];
      ?>

  <div class="row">
    <div class="col-lg-12">
      <center><h1 class="page-header">Laporan <?php echo $keterangan;?></h1></center>
      
      <center><h5>Periode tanggal <b><?php echo $tgl_awal;?></b> sampai <b><?php echo $tgl_akhir;?></b></h5></center>
      <?php

      if ($keterangan=="$keterangan"){
      $sql = "SELECT barang_update.swos, item.nama_item, item.code_item, barang.serial_number, barang_update.keterangan, barang_update.tgl_barang_update, customer.nama, bts.nama_bts, engineer.nama_engineer, vendor.nama_vendor, barang_update.status_rma
              FROM barang_update, barang, item, customer, bts, engineer, vendor
              WHERE barang_update.id_barang = barang.id_barang
              AND barang.code_item = item.code_item
              AND barang_update.id_customer = customer.id_customer
              AND barang_update.id_bts = bts.id_bts
              AND barang_update.id_engineer = engineer.id_engineer
              AND barang_update.id_vendor = vendor.id_vendor
              AND keterangan = '$keterangan'
              AND tgl_barang_update BETWEEN '$tgl_awal' AND '$tgl_akhir'
              ORDER BY item.nama_item ASC "; 
      
      } 

      $hasil = mysql_query($sql); 
      ?>

      <table data-toggle="table" data-url="tables/data1.json"  data-show-refresh="false" data-show-toggle="false" data-show-columns="false" data-search="false" data-select-item-name="toolbar1" data-pagination="false" >
                <thead>
                <tr>
                    <th data-field="itemid"  data-sortable="true">No</th>
                    <th data-field="swos"  data-sortable="true">SWOS</th>
                    <th data-field="nama_item"  data-sortable="true">Nama Item</th>
                    <th data-field="code_item"  data-sortable="true">Code Item</th>
                    <th data-field="serial_number" data-sortable="true">Serial Number</th>
                    <th data-field="keterangan" data-sortable="true">Keterangan</th>
                    <th data-field="tgl_barang_update" data-sortable="true">Tanggal Update</th>
                    <th data-field="nama_customer" data-sortable="true">Nama Customer</th>
                    <th data-field="nama_bts" data-sortable="true">Nama BTS</th>
                    <th data-field="nama_engineer" data-sortable="true">Nama Engineer</th>
                    <th data-field="id_vendor" data-sortable="true">Nama Vendor</th>
                    <th data-field="status_rma" data-sortable="true">Status RMA</th>
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
                <td data-field="code_item" data-sortable="true"><?php echo $record['code_item'];?></td>
                <td data-field="serial_number" data-sortable="true"><?php echo $record['serial_number'];?></td>
                <td data-field="keterangan" data-sortable="true"><?php echo $record['keterangan'];?></td>
                <td data-field="tgl_barang_update" data-sortable="true"><?php echo $record['tgl_barang_update'];?></td>
                <td data-field="nama" data-sortable="true"><?php echo $record['nama'];?></td>
                <td data-field="nama_bts" data-sortable="true"><?php echo $record['nama_bts'];?></td>
                <td data-field="nama_engineer" data-sortable="true"><?php echo $record['nama_engineer'];?></td>
                <td data-field="id_vendor" data-sortable="true"><?php echo $record['nama_vendor'];?></td>
                <td data-field="status_rma" data-sortable="true"><?php echo $record['status_rma'];?></td>
                </tr>
<?php
}
?>  
                          
                </tbody>
            </table>
  <?php
      
      if ($keterangan=="$keterangan"){
      
      $query2 = mysql_query("SELECT item.nama_item, COUNT(*) AS total_keluar FROM barang_update,item,barang 
                             WHERE barang.code_item = item.code_item 
                             AND barang_update.id_barang = barang.id_barang
                             AND keterangan = '$keterangan'
                             AND tgl_barang_update BETWEEN '$tgl_awal' AND '$tgl_akhir'
                             GROUP BY item.nama_item ASC");
      }
        
      ?>
      <br>
      <table class="table"> 
              <thead>
                <tr>
                  <th width="10%" data-field="stok_barang" data-sortable="true">Nama Item</th>
                  <th width="10%" data-field="stok_barang" data-sortable="true">Total Barang Keluar</th>
                <?php while($record2 = mysql_fetch_array($query2)){ ?>
                            </tr>
                  <tr>                    
                    <td><?php echo $record2['nama_item'];?></td>
                    <td><?php echo $record2['total_keluar'];?></td>
                  </tr>
                <? } ?>
                
            </thead>
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
