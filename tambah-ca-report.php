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
        <h1 class="page-header">Tambah CA Report</h1>
      </div>
    </div><!--/.row-->
        
    
    <div class="row">
      <div class="col-lg-12">
        <div class="panel panel-default">
          <!--<div class="panel-heading">Stok Masuk</div>-->
          <div class="panel-body">
            <div class="col-md-6">
              <form data-toggle="validator" role="form" action="proses-ca-report.php" method="post">
              <input type="hidden" name="_token" value="L8C5ujpOh4UEsaNko2Y3pkuzP714OtRymsXPqrNJ">

               <div class="form-group">
                  <label>Judul CA Request</label>
                  <select class="form-control" name="id_ca_request" >
                  <option>---- Pilih Judul CA ----</option>
                  <?php
                  $id = $_SESSION['id'];
                  if ($id!=""){
                  include "koneksi.php";
                  $sql = mysql_query("SELECT * FROM ca_request where id_engineer = '$id' and status_ca_request='Open' order by judul_ca asc");
                  if(mysql_num_rows($sql) != 0){
                  while($data = mysql_fetch_assoc($sql)){
                  echo '<option value="'.$data['id_ca_request'].'">'.$data['judul_ca'].'</option>';
                  }}
                  }
                  ?>
                  </select>
                </div>
                
                <div class="form-group">
                  <label>Nama Engineer</label>
                  <?php
                  $id = $_SESSION['id'];
                  if ($id!=""){
                  include "koneksi.php";
                  $sql = mysql_query("select id_engineer, nama_engineer from engineer where id_engineer='$id'");
                  while($row=mysql_fetch_array($sql)){ 
                  ?>
					<input type="hidden" name="id_engineer" value="<?php echo $row['id_engineer'];?>">
					<input type="text" class="form-control"  value="<?php echo $row['nama_engineer'];?>" readonly>
                  <?}}?>
                </div>

                <div class="form-group">
                  <label>Kategori CA</label>
                  <select class="form-control" name="id_ca_kategori" >
                  <option>---- Pilih Kategori CA ----</option>
                  <?php
                  include "koneksi.php";
                  $sql = mysql_query("SELECT * FROM ca_kategori order by nama_ca_kategori asc");
                  if(mysql_num_rows($sql) != 0){
                  while($data = mysql_fetch_assoc($sql)){
                  echo '<option value="'.$data['id_ca_kategori'].'">'.$data['nama_ca_kategori'].'</option>';
                  }
                  }
                  ?>
                  </select>
                </div>

                <div class="form-group">
				  <label>Tanggal Report</label>
				  <?php
				  $timezone = "Asia/Makassar";
				  date_default_timezone_set($timezone);
				  $today = date("Y-m-d");
				  ?>
				  <input class="form-control" data-provide="datepicker" data-date-format="yyyy/mm/dd" name="tgl_report" value="<?php echo $today; ?>" readonly>
				</div>

                <div class="form-group">
                  <label>Jumlah CA</label> 
                  <input class="form-control" name="jumlah" value="" placeholder="Contoh: 200000">
                </div>  
                
                <div class="form-group">
                  <label>Keterangan CA</label> 
                  <input class="form-control" name="keterangan" value="" >
                </div>  
                
                <div class="form-group">
                <label>Nota Asli</label>
                <select class = "form-control" name="note_asli" >
                <option>Ada</option>
                <option>Tidak Ada</option>
                </select>
				</div>

                <div class="form-group">
                <label>Status CA Report</label>
                <select class = "form-control" name="status_ca_report" >
                <option>Confirm</option>
                <option>Not Confirm</option>
                </select>
                </div>
                
                <button type="submit" class="btn btn-primary">Save</button>
                <button type="reset" class="btn btn-default">Reset</button>
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
  <script src="/js/validator.js"></script>
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
