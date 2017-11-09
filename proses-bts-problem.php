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
        <li class="active">Backbone Problem</li>
      </ol>
    </div><!--/.row-->
    <br>

<?php
# Logging
include "proses-log.php";

include "koneksi.php";
$swos=$_POST['swos'];
$id_device_bts=$_POST['id_device_bts'];
$id_bts=$_POST['id_bts'];
$id_engineer=$_POST['id_engineer'];
$description=$_POST['description'];
$datetime_start=$_POST['datetime_start'];
$datetime_end=$_POST['datetime_end'];
$root_cause=$_POST['root_cause'];
$solved_after=$_POST['solved_after'];
$status_bts_problem=$_POST['status_bts_problem'];

$cek_serial=mysql_num_rows(mysql_query("SELECT swos FROM bts_problem 
  WHERE swos='$_POST[swos]'"));

if ($cek_serial > 0){
  echo "Swos telah ada. Harap Ulangi";
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
 
$query=mysql_query("insert into bts_problem(swos,id_device_bts,id_bts,id_engineer,description,datetime_start,datetime_end,root_cause,solved_after,status_bts_problem) value ('$swos','$id_device_bts','$id_bts', '$id_engineer', '$description', '$datetime_start', '$datetime_end', '$root_cause', '$solved_after', '$status_bts_problem')"); 

if($query){ 
  echo "<meta http-equiv=\"refresh\" content=\"1;show-bts-problem.php\">";
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
