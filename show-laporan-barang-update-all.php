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
<link rel="stylesheet" href="/css/bootstrap-datetimepicker-standalone.min.css">
<link rel="stylesheet" href="/css/bootstrap-datetimepicker.min.css">

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
        <!--    
    ==================================================== MENU
    -->
        
    <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">           
        <div class="row">
            <ol class="breadcrumb">
                <li><a href="#"><span class="glyphicon glyphicon-home"></span></a></li>
                <li class="active">Barang Update</li>
            </ol>
        </div><!--/.row-->
        
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Laporan Barang Update</h1>
            </div>
        </div><!--/.row-->
                
<?php

include "koneksi.php";
?>      
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <!--div class="panel-heading"><a href="tambah-barang.php" class="btn btn-primary btn-md">Tambah Barang</a></div-->
                    <div class="panel-body">

                        <ul class="nav nav-tabs">
                          <li class="active"><a data-toggle="tab" href="#department">Berdasarkan Keterangan</a></li>
                          <!--li><a data-toggle="tab" href="#lokasi">Berdasarkan Lokasi</a></li>
                          <li><a data-toggle="tab" href="#nama_item">Berdasarkan Stok Barang</a></li-->
                        </ul>

                        <div class="tab-content">
                            <div id="department" class="tab-pane fade in active">
                        <br>
                        <div class="col-md-6">
                          
                       <form id="someForm" action="" method="POST">
						<div class="form-group">
						  <label>Tanggal Awal</label>
						  <?php
							$timezone = "Asia/Makassar";
							date_default_timezone_set($timezone);
							$today = date("Y-m-d");
						  ?>
						  <input class="form-control" data-provide="datepicker" data-date-format="yyyy-mm-dd" name="tgl_awal" value="">
						</div>
						
						<div class="form-group">
						  <label>Tanggal Akhir</label>
						  <input class="form-control" data-provide="datepicker" data-date-format="yyyy-mm-dd" name="tgl_akhir" value="">
						</div>
                  
						<div class="form-group">
                                    <label>Keterangan</label>
                                    <select class="form-control" name="keterangan" required>
                                    <option>---- Pilih Keterangan ----</option>
                                    <?php
                                    include "koneksi.php";
                                    $sql = mysql_query("SELECT keterangan FROM barang_update group by keterangan asc");
                                    if(mysql_num_rows($sql) != 0){
                                    while($data = mysql_fetch_assoc($sql)){
                                    echo '<option value="'.$data['keterangan'].'">'.$data['keterangan'].'</option>';
                                        }
                                    }
                                    ?>
                                </select>
                                </div>
                  
                  
                  <input type="button" class="btn btn-info" value="Lihat" name="lihat" onclick="askForLihat()" />
                  <input type="button" class="btn btn-primary" value="Download" name="download" onclick="askForDownload()" />
                  </form>
                  <script>
                  form=document.getElementById("someForm");
                  function askForLihat() {
                          form.action="cetak-laporan-barang-update.php";
                          form.submit();
                  }
                  function askForDownload() {
                          form.action="export-laporan-barang-update.php";
                          form.submit();
                  }
                  </script>
									</div>
                            </div>
                        </form>
                        

                        <!--div id="lokasi" class="tab-pane fade">
                        <br>
                        <div class="col-md-6">
                          
                       <form id="someForm2" action="" method="POST">
						<div class="form-group">
						  <label>Tanggal Awal</label>
						  <input class="form-control" data-provide="datepicker" data-date-format="yyyy-mm-dd" name="tgl_awal2" value="">
						</div>
						
						<div class="form-group">
						  <label>Tanggal Akhir</label>
						  <input class="form-control" data-provide="datepicker" data-date-format="yyyy-mm-dd" name="tgl_akhir2" value="">
						</div>
                  
						<div class="form-group">
                                    <label>Lokasi Barang</label>
                                    <select class="form-control" name="nama_lokasi" required>
                                    <option>---- Pilih Lokasi ----</option>
                                    <option>All</option>
                                    <?php
                                 /*   $sql = mysql_query("SELECT lokasi.nama_lokasi FROM barang,lokasi where barang.id_lokasi=lokasi.id_lokasi group by nama_lokasi asc");
                                    if(mysql_num_rows($sql) != 0){
                                    while($data = mysql_fetch_assoc($sql)){
                                    echo '<option value="'.$data['nama_lokasi'].'">'.$data['nama_lokasi'].'</option>';
                                        }
                                    }
                                    ?>
                                </select>
                        </div>
                  
                  
                  <input type="button" class="btn btn-info" value="Lihat" name="lihat2" onclick="askForLihat2()" />
                  <input type="button" class="btn btn-primary" value="Download" name="download2" onclick="askForDownload2()" />
                  </form>
                  <script>
                  form2=document.getElementById("someForm2");
                  function askForLihat2() {
                          form2.action="cetak-laporan-barang-lokasi.php";
                          form2.submit();
                  }
                  function askForDownload2() {
                          form2.action="export-laporan-barang-lokasi.php";
                          form2.submit();
                  }
                  </script>
									</div>
                            </div>
                        </form>
                        
                        <div id="nama_item" class="tab-pane fade">
                        <br>
                        <div class="col-md-6">
                          
                       <form id="someForm3" action="" method="POST">
                <div class="form-group">
                  <label>Tanggal Awal</label>
                  <input class="form-control" data-provide="datepicker" data-date-format="yyyy-mm-dd" name="tgl_awal3" value="">
                </div>
                
                <div class="form-group">
                  <label>Tanggal Akhir</label>
                  <input class="form-control" data-provide="datepicker" data-date-format="yyyy-mm-dd" name="tgl_akhir3" value="">
                </div>
                  
                <div class="form-group">
                                    <label>Nama Item</label>
                                    <select class="form-control" name="nama_item" required>
                                    <option>---- Pilih Item ----</option>
                                    <option>All</option>
                                    <?php
                                    $sql = mysql_query("SELECT item.nama_item FROM barang,item where barang.code_item=item.code_item group by nama_item asc");
                                    if(mysql_num_rows($sql) != 0){
                                    while($data = mysql_fetch_assoc($sql)){
                                    echo '<option value="'.$data['nama_item'].'">'.$data['nama_item'].'</option>';
                                        }
                                    }
                                   */ ?> 
                                </select>
                                </div>
                  
                  
                  <input type="button" class="btn btn-info" value="Lihat" name="lihat3" onclick="askForLihat3()" />
                  <input type="button" class="btn btn-primary" value="Download" name="download3" onclick="askForDownload3()" />
                  </form>
                  <script>
                  form3=document.getElementById("someForm3");
                  function askForLihat3() {
                          form3.action="cetak-laporan-stok-barang.php";
                          form3.submit();
                  }
                  function askForDownload3() {
                          form3.action="export-laporan-stok-barang.php";
                          form3.submit();
                  }
                  </script>
									</div>
                            </div>
                        </form-->
                        
                    </div>
                    </div>
                </div>
            </div>

        </div>
        
    </div><!--/.main-->

    <script src="/js/jquery-1.11.1.min.js"></script>
    <script src="/js/bootstrap.min.js"></script>
    <script src="/js/chart.min.js"></script>
    <script src="/js/chart-data.js"></script>
    <script src="/js/easypiechart.js"></script>
    <script src="/js/easypiechart-data.js"></script>
    <script src="/js/bootstrap-datepicker.js"></script>
    <script src="/js/moment.js"></script>
    <script type="text/javascript" src="/js/bootstrap-datetimepicker.min.js"></script>
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

