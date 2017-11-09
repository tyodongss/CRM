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
                <li class="active">Customer</li>
            </ol>
        </div><!--/.row-->
        
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Laporan Customer</h1>
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
                          <li class="active"><a data-toggle="tab" href="#aktivasi">Aktivasi Customer</a></li>
                          <li><a data-toggle="tab" href="#service">Service Customer</a></li>
                          <li><a data-toggle="tab" href="#status">Status Customer</a></li>
                          <li><a data-toggle="tab" href="#sla">SLA Customer</a></li>
                          <li><a data-toggle="tab" href="#terminasi">Terminasi Customer</a></li>
                        </ul>

                        <div class="tab-content">
                            <div id="aktivasi" class="tab-pane fade in active">
                        <br>
                        <div class="col-md-6">
                       <form id="someForm" method="POST">
                    <div class="form-group">
                  <label>Date Time Start</label> 
                    <div class='input-group date' id='datetimepicker1'>
                        <input type='text' class="form-control" name="tgl_awal" />
                        <span class="input-group-addon">
                          <span class="glyphicon glyphicon-calendar"></span>
                        </span>
                      </div>
                </div>
                
                <div class="form-group">
                  <label>Date Time End</label>
                  <div class='input-group date' id='datetimepicker2'>
                    <input type='text' class="form-control" name="tgl_akhir" />
                    <span class="input-group-addon">
                      <span class="glyphicon glyphicon-calendar"></span>
                    </span>
                  </div>
                </div> 
                                                      
                                    <div>                    
                                    <input type="button" class="btn btn-info" value="Lihat" name="lihat" onclick="askForLihat();" />
                                    <input type="button" class="btn btn-primary" value="Download" name="download" onclick="askForDownload();" />
                                    
                                     <script>
                                    form=document.getElementById("someForm");
                                    function askForLihat() {
                                            form.action="cetak-laporan-aktivasi-customer.php";
                                            form.submit();
                                    }
                                    function askForDownload() {
                                            form.action="export-laporan-aktivasi-customer.php";
                                            form.submit();
                                    }
                                    </script>
									</div>
                            </div>
                        </form>
                         
                     </div>
             
                     <div id="service" class="tab-pane fade">
                        <br>
                        <div class="col-md-6">

                      <form id="someForm2" action="" method="POST">
                                    <div class="form-group">
                                        <label>Service</label>
                                      <select class="form-control" name="nama_service">
                                      <option>---- Pilih Service ----</option>
                                      <?php
                                      include "koneksi.php";
                                      $sql = mysql_query("SELECT * FROM service ORDER BY nama_service asc");
                                      if(mysql_num_rows($sql) != 0){
                                      while($data = mysql_fetch_assoc($sql)){
                                      echo '<option value="'.$data['nama_service'].'">'.$data['nama_service'].'</option>';
                                      }}
                                      ?>
                                      </select>
                                    </div>
                                    <input type="button" class="btn btn-info" value="Lihat" name="lihat" onclick="askForLihat2()" />
                                    <input type="button" class="btn btn-primary" value="Download" name="download" onclick="askForDownload2()" />
                                    </form>
                                    <script>
                                    form2=document.getElementById("someForm2");
                                    function askForLihat2() {
                                            form2.action="cetak-laporan-service-customer.php";
                                            form2.submit();
                                    }
                                    function askForDownload2() {
                                            form2.action="export-laporan-service-customer.php";
                                            form2.submit();
                                    }
                                    </script>                           
                            </div>
                        </form>
                         </div>

                     <div id="status" class="tab-pane fade">
                        <br>
                        <div class="col-md-6">
                       <form id="someForm3" action="" method="POST">
                            <div class="form-group">
                                    <label>Status Customer</label>
                                    <select class = "form-control" name="status">
                                    <option>All</option>
                                    <option>Active</option>
                                    <option>Terminate</option>
                                    <option>Suspend</option>
                                    </select>
                                </div> 
                                    <input type="button" class="btn btn-info" value="Lihat" name="lihat3" onclick="askForLihat3()" />
                                    <input type="button" class="btn btn-primary" value="Download" name="download3" onclick="askForDownload3()" />
                                    </form>
                                    <script>
                                    form3=document.getElementById("someForm3");
                                    function askForLihat3() {
                                            form3.action="cetak-laporan-customer.php";
                                            form3.submit();
                                    }
                                    function askForDownload3() {
                                            form3.action="export-laporan-customer.php";
                                            form3.submit();
                                    }
                                    </script>
                                   
                                                                 
                            </div>
                        </form>
                         </div>

                          <div id="sla" class="tab-pane fade">
                        <br>
                        <div class="col-md-6">
                        <form id="someForm4" action="" method="POST">
                                <div class="form-group">
                  <label>Date Time Start</label> 
                    <div class='input-group date' id='datetimepicker3'>
                        <input type='text' class="form-control" name="tgl_awal4" />
                        <span class="input-group-addon">
                          <span class="glyphicon glyphicon-calendar"></span>
                        </span>
                      </div>
                </div>
                
                <div class="form-group">
                  <label>Date Time End</label>
                  <div class='input-group date' id='datetimepicker4'>
                    <input type='text' class="form-control" name="tgl_akhir4" />
                    <span class="input-group-addon">
                      <span class="glyphicon glyphicon-calendar"></span>
                    </span>
                  </div>
                </div>
                 
            <div class="form-group">
            <label>Nama Customer</label>
          <select class="form-control" name="nama" required>
          <option>---- Pilih Customer ----</option>
          <?php
          include "koneksi.php";
          $sql = mysql_query("SELECT * FROM customer ORDER BY nama asc");
          if(mysql_num_rows($sql) != 0){
          while($data = mysql_fetch_assoc($sql)){
          echo '<option value="'.$data['nama'].'">'.$data['nama'].'</option>';
          }}
          ?>
          </select>
        </div>
                                    <input type="button" class="btn btn-info" value="Lihat" name="lihat" onclick="askForLihat4()" />
                                    <input type="button" class="btn btn-primary" value="Download" name="download" onclick="askForDownload4()" />
                                    </form>
                                    <script>
                                    form4=document.getElementById("someForm4");
                                    function askForLihat4() {
                                            form4.action="cetak-laporan-sla-customer.php";
                                            form4.submit();
                                    }
                                    function askForDownload4() {
                                            form4.action="export-laporan-sla-customer.php";
                                            form4.submit();
                                    }
                                    </script>
                          </div>
                         </div>

                          <div id="terminasi" class="tab-pane fade">
                        <br>
                        <div class="col-md-6">
                       <form id="someForm5" action="" method="POST">
                            <div class="form-group">
                            <label>Tanggal Terminasi Awal</label> 
                            <!-- <div id="datetimepicker" class="input-append date">
                            <input type="text" name="datetime_start"></input>
                            <span class="add-on"><i data-time-icon="icon-time" data-date-icon="icon-calendar"></i></span>
                            </div> -->
                            <div class='input-group date' id='datetimepicker5'>
                            <input type='text' class="form-control" name="tgl_awal5" />
                            <span class="input-group-addon">
                            <span class="glyphicon glyphicon-calendar"></span>
                        </span>
                      </div>
                </div>
                
                        <div class="form-group">
                        <label>Tanggal Terminasi Akhir</label>
                        <div class='input-group date' id='datetimepicker6'>
                        <!-- <input class="form-control" name="datetime_end" value="" type="datetime"> -->
                        <input type='text' class="form-control" name="tgl_akhir5" />
                        <span class="input-group-addon">
                        <span class="glyphicon glyphicon-calendar"></span>
                    </span>
                  </div>
                </div>

                                    
                                    <input type="button" class="btn btn-info" value="Lihat" name="lihat5" onclick="askForLihat5()" />
                                    <input type="button" class="btn btn-primary" value="Download" name="download5" onclick="askForDownload5()" />
                                    </form>
                                    <script>
                                    form5=document.getElementById("someForm5");
                                    function askForLihat5() {
                                            form5.action="cetak-laporan-terminasi-customer.php";
                                            form5.submit();
                                    }
                                    function askForDownload5() {
                                            form5.action="export-laporan-terminasi-customer.php";
                                            form5.submit();
                                    }
                                    </script>
                                   
                                                                 
                            </div>
                        </form>
                         </div>

                     </div>
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
    <script type="text/javascript">
      $(function () {
        $('#datetimepicker1').datetimepicker({
          format: 'YYYY-MM-DD HH:mm:ss'
        });
      });
    </script>

    <script type="text/javascript">
      $(function () {
        $('#datetimepicker2').datetimepicker({
                        format: 'YYYY-MM-DD HH:mm:ss'
                });
      });
    </script> 
    <script type="text/javascript">
      $(function () {
        $('#datetimepicker3').datetimepicker({
          format: 'YYYY-MM-DD HH:mm:ss'
        });
      });
    </script>

    <script type="text/javascript">
      $(function () {
        $('#datetimepicker4').datetimepicker({
                        format: 'YYYY-MM-DD HH:mm:ss'
                });
      });
    </script> 
    <script type="text/javascript">
      $(function () {
        $('#datetimepicker5').datetimepicker({
          format: 'YYYY-MM-DD HH:mm:ss'
        });
      });
    </script>

    <script type="text/javascript">
      $(function () {
        $('#datetimepicker6').datetimepicker({
                        format: 'YYYY-MM-DD HH:mm:ss'
                });
      });
    </script>
    <script type="text/javascript">
      $(function () {
        $('#datetimepicker7').datetimepicker({
          format: 'YYYY-MM-DD HH:mm:ss'
        });
      });
    </script>

    <script type="text/javascript">
      $(function () {
        $('#datetimepicker8').datetimepicker({
                        format: 'YYYY-MM-DD HH:mm:ss'
                });
      });
    </script>
</body>

</html>

