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
      <center><h1 class="page-header">Laporan Barang Keluar</h1></center>
      <?php
      include "koneksi.php";
      $tgl=$_POST['date'];
      $tgl_awal =$_POST['tgl_awal'];
      $tgl_akhir = $_POST['tgl_akhir'];

                        ?>
      <center><h5>Periode tanggal <b><?php echo $tgl_awal;?></b> sampai <b><?php echo $tgl_akhir;?></b></h5></center>
      <?php

      if ($tgl==""){
      $sql = "select barang_keluar.id_barangKeluar, barang_keluar.tanggal, barang_keluar.bts, barang_keluar.swos, barang.serial_number, barang.nama_barang, customer.nama, engineer.nama_engineer FROM barang_keluar JOIN barang ON barang_keluar.id_barang = barang.id_barang JOIN customer ON barang_keluar.id_customer = customer.id_customer JOIN engineer ON barang_keluar.id_engineer = engineer.id_engineer where status_barang='tidak tersedia' and tanggal between '$tgl_awal' and  '$tgl_akhir' order by id_barangKeluar desc"; 

      } else {
      $sql = "select barang_keluar.id_barangKeluar, barang_keluar.tanggal, barang_keluar.bts, barang_keluar.swos, barang.serial_number, barang.nama_barang, customer.nama, engineer.nama_engineer FROM barang_keluar JOIN barang ON barang_keluar.id_barang = barang.id_barang JOIN customer ON barang_keluar.id_customer = customer.id_customer JOIN engineer ON barang_keluar.id_engineer = engineer.id_engineer where status_barang='tidak tersedia' and tanggal='$tgl' order by id_barangKeluar desc";  
      }

      $hasil = mysql_query($sql); 
      ?>

      <table data-toggle="table" data-url="tables/data1.json"  data-show-refresh="false" data-show-toggle="false" data-show-columns="false" data-search="false" data-select-item-name="toolbar1" data-pagination="false" >
                <thead>
                <tr>
                  <th data-field="itemid"  data-sortable="true">No</th>
                    <th data-field="nama_barang"  data-sortable="true">Nama Barang</th>
                  <th data-field="serial_number" data-sortable="true">Serial Number</th>
                    <th data-field="nama" data-sortable="true">Nama Customer</th>
                <th data-field="bts" data-sortable="true">Nama BTS</th>
                    <th data-field="tanggal" data-sortable="true">Tanggal</th>
                    <th data-field="nama_engineer" data-sortable="true">Nama Engineer</th>
                <th data-field="swos" data-sortable="true">Swos</th>
                </tr>
              </thead>
              <tbody>
<?php           
$no=0;
while($record = mysql_fetch_array($hasil)){
?>
               <tr>
                <td data-field="itemid" data-sortable="true"><?php echo $no=$no+1;?></td>
                <td data-field="nama_barang" data-sortable="true"><?php echo $record['nama_barang'];?></td>
                <td data-field="serial_number" data-sortable="true"><?php echo $record['serial_number'];?></td>
                <td data-field="nama" data-sortable="true"><?php echo $record['nama'];?></td>
                <td data-field="bts" data-sortable="true"><?php echo $record['bts'];?></td>
                    <td data-field="tanggal" data-sortable="true"><?php echo $record['tanggal'];?></td>
                    <td data-field="nama_engineer" data-sortable="true"><?php echo $record['nama_engineer'];?></td>
                <td data-field="swos" data-sortable="true"><?php echo $record['swos'];?></td>
                </tr>
<?php
}
?>                            
                </tbody>
            </table>

            <?php
      
      if ($tgl==""){
      //$query2 = mysql_query("select nama_barang, COUNT(*) AS stok_barang FROM barang WHERE status_barang ='tidak tersedia' AND tanggal BETWEEN '$tgl_awal' AND  '$tgl_akhir' GROUP BY nama_barang");      
      $query2 = mysql_query("select barang_keluar.id_barangKeluar, barang_keluar.tanggal, barang.nama_barang, COUNT(*) AS stok_barang FROM barang_keluar JOIN barang ON barang_keluar.id_barang = barang.id_barang JOIN customer ON barang_keluar.id_customer = customer.id_customer JOIN engineer ON barang_keluar.id_engineer = engineer.id_engineer where status_barang='tidak tersedia' and tanggal between '$tgl_awal' and  '$tgl_akhir' GROUP BY nama_barang");
      }
        
      ?>
      <br>
      <table class="table"> 
              <thead>
                <tr>
                  <th width="10%" data-field="stok_barang" data-sortable="true">Nama Barang</th>
                  <th width="10%" data-field="stok_barang" data-sortable="true">Total Barang Keluar</th>
                <?php while($record2 = mysql_fetch_array($query2)){ ?>
                            </tr>
                  <tr>                    
                    <td><?php echo $record2['nama_barang'];?></td>
                    <td><?php echo $record2['stok_barang'];?></td>
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
