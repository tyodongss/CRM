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
      <center><h1 class="page-header">Laporan Consumable</h1></center>
      
      <?php
      include "koneksi.php";
      $xls_filename = 'export-laporan-barang-masuk'.date('Y-m-d').'.xls'; // Define Excel (.xls) file name
      $tgl=$_POST['date'];
      $tgl_awal =$_POST['tgl_awal'];
      $tgl_akhir = $_POST['tgl_akhir'];

                        ?>
      <center><h5>Periode tanggal <b><?php echo $tgl_awal;?></b> sampai <b><?php echo $tgl_akhir;?></b></h5></center>
      <?php

      if ($tgl==""){
      $sql = "SELECT consumable.id_consumable, consumable.nama_consumable, consumable.id_vendor, consumable.harga, consumable.harga_usd, consumable.kondisi, consumable.tgl_input, consumable.po_number, consumable.tgl_masuk, consumable.jumlah_stok, consumable.status_barang, consumable.remark, vendor.nama_vendor
          FROM consumable
          JOIN vendor ON consumable.id_vendor = vendor.id_vendor
          WHERE status_barang =  'tersedia'
          AND tgl_masuk
          BETWEEN  '$tgl_awal'
          AND  '$tgl_akhir'
          ORDER BY id_consumable DESC"; 
      
      } else {
      $sql = "SELECT consumable.id_consumable, consumable.nama_consumable, consumable.id_vendor, consumable.harga, consumable.harga_usd, consumable.kondisi, consumable.tgl_input, consumable.po_number, consumable.tgl_masuk, consumable.jumlah_stok, consumable.status_barang, consumable.remark, vendor.nama_vendor
          FROM consumable
          JOIN vendor ON consumable.id_vendor = vendor.id_vendor
          WHERE status_barang =  'tersedia' and tgl_masuk='$tgl' order by id_consumable desc";
      
      }
      
      $hasil = mysql_query($sql); 
      ?>

      <table data-toggle="table" data-url="tables/data1.json"  data-show-refresh="false" data-show-toggle="false" data-show-columns="false" data-search="false" data-select-item-name="toolbar1" data-pagination="false" >
                <thead>
                <tr>
                  <th data-field="itemid" data-sortable="true">No</th>
                  <th data-field="nama_consumable"  data-sortable="true">Nama Consumable</th>
                  <th data-field="id_vendor" data-sortable="true">Nama Vendor</th>
                  <th data-field="harga" data-sortable="true">Harga IDR</th>
                  <th data-field="harga_usd" data-sortable="true">Harga USD</th>
                  <th data-field="kondisi" data-sortable="true">Kondisi</th>
                  <th data-field="tgl_input" data-sortable="true">Tanggal Input</th>
                  <th data-field="po_number" data-sortable="true">PO Number</th>
                  <th data-field="tgl_masuk" data-sortable="true">Tanggal Masuk</th>
                  <th data-field="jumlah_stok" data-sortable="true">Jumlah Stok</th>
                  <th data-field="status_barang" data-sortable="true">Status Barang</th>
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
                <td data-field="nama_consumable" data-sortable="true"><?php echo $record['nama_consumable'];?></td>
                <td data-field="id_vendor" data-sortable="true"><?php echo $record['nama_vendor'];?></td>
                <td data-field="harga" data-sortable="true"><?php echo $record['harga'];?></td>
                <td data-field="harga_usd" data-sortable="true"><?php echo $record['harga_usd'];?></td>
                <td data-field="kondisi" data-sortable="true"><?php echo $record['kondisi'];?></td>
                <td data-field="tgl_input" data-sortable="true"><?php echo $record['tgl_input'];?></td>
                <td data-field="po_number" data-sortable="true"><?php echo $record['po_number'];?></td>
                <td data-field="tgl_masuk" data-sortable="true"><?php echo $record['tgl_masuk'];?></td>
                <td data-field="jumlah_stok" data-sortable="true"><?php echo $record['jumlah_stok'];?></td>
                <td data-field="status_barang" data-sortable="true"><?php echo $record['status_barang'];?></td>
                <td data-field="remark" data-sortable="true"><?php echo $record['remark'];?></td>
                </tr>
<?php
}
?>  
                          
                </tbody>
            </table>
      <?php
      if ($tgl==""){
      $query = mysql_query("SELECT SUM(harga) as Total FROM consumable WHERE status_barang = 'tersedia' AND tgl_masuk BETWEEN  '$tgl_awal' AND  '$tgl_akhir'"); 
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

      if ($tgl==""){
      $query2 = mysql_query("SELECT SUM(harga_usd) as total_usd FROM consumable WHERE status_barang = 'tersedia' AND tgl_masuk BETWEEN  '$tgl_awal' AND  '$tgl_akhir'"); 
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
                    <? } ?>
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
