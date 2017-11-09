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
        <h1 class="page-header">Ubah CA Report</h1>
      </div>
    </div><!--/.row-->
<?php 
include "koneksi.php"; 
$id=$_GET['id']; 
$query=mysql_query("SELECT ca_report.id_ca_report, ca_report.id_ca_request, ca_report.id_ca_kategori, ca_report.id_engineer, engineer.nama_engineer, ca_kategori.nama_ca_kategori, ca_report.tgl_report, ca_report.status_ca_report, ca_report.jumlah, ca_report.keterangan, ca_report.note_asli, ca_request.judul_ca, ca_report.created_at, ca_report.updated_at, ca_report.deleted_at
                  FROM ca_report, engineer, ca_kategori, ca_request
                  WHERE ca_report.id_engineer = engineer.id_engineer
                  AND ca_report.id_ca_kategori = ca_kategori.id_ca_kategori
                  AND ca_report.id_ca_request = ca_request.id_ca_request 
                  AND id_ca_report = '$id'"); 
?> 
<?php 
while($row=mysql_fetch_array($query)){ 
?>    
    
    <div class="row">
      <div class="col-lg-12">
        <div class="panel panel-default">
          <!--<div class="panel-heading">Stok Masuk</div>-->
          <div class="panel-body">
            <div class="col-md-6">
              <form role="form" action="update-ca-report.php" method="post">
              <input type="hidden" name="_token" value="L8C5ujpOh4UEsaNko2Y3pkuzP714OtRymsXPqrNJ">
                <input type="hidden" name="id" value="<?php echo $id;?>"/>
               
                  <div class="form-group">
                                    <label>Judul CA Request</label>
                                    <select class="form-control" name="id_ca_request">
                                    <option selected value="<?php echo $row['id_ca_request'];?>"><?php echo $row['judul_ca'];?></option>
                                    <option>---- Pilih Judul CA Resquest ----</option>
                                    <?php
                                     $id = $_SESSION['id'];
                                     if ($id!=""){
                                    $sql = mysql_query("SELECT * FROM ca_request where id_engineer = '$id' order by judul_ca asc");
                                    if(mysql_num_rows($sql) != 0){
                                    while($data = mysql_fetch_assoc($sql)){
                                    echo '<option value="'.$data['id_ca_request'].'" >'.$data['judul_ca'].'</option>';
                                        } 
                                    }}
                                    ?>
                                </select>
                                </div>
                
                  <div class="form-group">
                                    <label>Nama Engineer</label>
                                    <select class="form-control" name="id_engineer">
                                    <?php
                                    $id = $_SESSION['id'];
                  					if ($id!=""){
                                    $sql = mysql_query("SELECT * FROM engineer where id_engineer = '$id' order by nama_engineer asc");
                                    if(mysql_num_rows($sql) != 0){
                                    while($data = mysql_fetch_assoc($sql)){
                                    echo '<option value="'.$data['id_engineer'].'" >'.$data['nama_engineer'].'</option>';
                                     }
                                    }
                                    ?>
                                </select>
                                </div>

                                <div class="form-group">
                                    <label>Kategori CA</label>
                                    <select class="form-control" name="id_ca_kategori">
                                    <option selected value="<?php echo $row['id_ca_kategori'];?>"><?php echo $row['nama_ca_kategori'];?></option>
                                    <option>---- Pilih Kategori CA ----</option>
                                    <?php
                                    $sql = mysql_query("SELECT * FROM ca_kategori order by nama_ca_kategori asc");
                                    if(mysql_num_rows($sql) != 0){
                                    while($data = mysql_fetch_assoc($sql)){
                                    echo '<option value="'.$data['id_ca_kategori'].'" >'.$data['nama_ca_kategori'].'</option>';
                                        } 
                                    }
                                    ?>
                                </select>
                                </div>

                <div class="form-group">
                  <label>Date Report</label>
                  <input class="form-control" data-provide="datepicker" data-date-format="yyyy/mm/dd" name="tgl_report" value="<?php echo $row['tgl_report'];?>">                 
                </div>
                
                <div class="form-group">
                  <label>Jumlah</label>
                  <input class="form-control" name="jumlah" value="<?php echo $row['jumlah'];?>">
                </div>
                
                <div class="form-group">
                  <label>Keterangan</label>
                  <input class="form-control" name="keterangan" value="<?php echo $row['keterangan'];?>">
                </div>
                
                <div class="form-group">
                  <label>Note Asli</label>
		<select class="form-control" name="note_asli" required>
			<option selected><?php echo $row['note_asli'];?></option>
			<option></option>
			<option>Ada</option>
			<option>Tidak Ada</option>
		</select>
                </div>

                <div class="form-group">
                                  <label>Status CA Report</label>
                                  <select class = "form-control" name="status_ca_report" required>
                                  <option selected value="<?php echo $row['status_ca_report'];?>"><?php echo $row['status_ca_report'];?></option>
                                  <option>---- Pilih Status ----</option>
                                  <option>Confirm</option>
                                  <option>Not Confirm</option>
                                  </select>
                                </div>
                
                <button type="submit" class="btn btn-primary">Update</button>
                <a href="../show-ca-report.php" class="btn btn-default">Back</a>
<?php
}}
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
