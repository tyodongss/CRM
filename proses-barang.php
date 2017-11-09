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
        <li class="active">Barang Masuk</li>
      </ol>
    </div><!--/.row-->
    

<?php
# Logging
include "proses-log.php";

include "koneksi.php";
$code_item=$_POST['code_item'];
$nama_item=$_POST['nama_item'];
$id_owner=$_POST['id_owner'];
$id_lokasi=$_POST['id_lokasi'];
$id_vendor=$_POST['id_vendor'];
$mac=$_POST['mac'];
$serial_number=$_POST['serial_number'];
$harga=$_POST['harga'];
$harga_usd=$_POST['harga_usd'];
$kondisi=$_POST['kondisi'];
$po_number=$_POST['po_number'];
$tgl_masuk=$_POST['tgl_masuk'];
$status_barang=$_POST['status_barang'];
$tgl_qc=$_POST['tgl_qc'];
$id_engineer=$_POST['id_engineer'];
$status_qc=$_POST['status_qc'];
$remark=$_POST['remark'];

$cek_serial=mysql_num_rows(mysql_query("SELECT serial_number FROM barang 
  WHERE serial_number='$_POST[serial_number]'"));

if ($cek_serial > 0){
  echo "Serial number telah ada. Harap Ulangi";
  ?>
<br><br>
 <button onclick="goBack()">Go Back</button>

 <script>
 function goBack() {
    window.history.back();
}
</script>
<?
}
else{
 
$query=mysql_query("insert into barang(code_item, id_owner, id_lokasi, id_vendor, mac, serial_number, harga, harga_usd, kondisi, po_number, tgl_masuk, status_barang, tgl_qc, id_engineer, status_qc, remark) 
  value('$code_item', '$id_owner', '$id_lokasi', '$id_vendor', '$mac','$serial_number', '$harga', '$harga_usd', '$kondisi', '$po_number','$tgl_masuk', '$status_barang', '$tgl_qc', '$id_engineer', '$status_qc', '$remark')"); 

if($query){ 
  echo "<meta http-equiv=\"refresh\" content=\"1;show-barang.php\">";
}else{
  echo "Gagal input data"; 
  echo mysql_error(); 
}
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
