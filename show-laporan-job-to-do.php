<?php
date_default_timezone_set('Asia/Makassar');
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
        <?php include "menu.php"; ?>
        <!--    
    ==================================================== MENU
    -->
        
    <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">           
        <div class="row">
            <ol class="breadcrumb">
                <li><a href="#"><span class="glyphicon glyphicon-home"></span></a></li>
                <li class="active">Job to Do</li>
            </ol>
        </div><!--/.row-->
        
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Laporan Job to Do</h1>
            </div>
        </div><!--/.row-->
                
        
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">Berdasarkan Department</div>
                    <div class="panel-body">
                        <div class="col-md-6">
                            
                            <form id="someForm" action="" method="POST">
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

                 <div class="form-group">
                                    <label>Department</label>
                                    <select class="form-control" name="owner" required>
                                    <option>---- Pilih Department ----</option>
                                    <option>All</option>
                                    <?php
                                    include "koneksi.php";
                                    $sql = mysql_query("SELECT owner FROM job_to_do2 group by owner asc");
                                    if(mysql_num_rows($sql) != 0){
                                    while($data = mysql_fetch_assoc($sql)){
                                    echo '<option value="'.$data['owner'].'">'.$data['owner'].'</option>';
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
                                            form.action="cetak-laporan-job-to-do.php";
                                            form.submit();
                                    }
                                    function askForDownload() {
                                            form.action="export-laporan-job-to-do.php";
                                            form.submit();
                                    }
                                    </script>                             
                            </div>
                        </form>
                    </div>
                </div>
            </div><!-- /.col-->
        </div><!-- /.row -->

        <!--div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">Berdasarkan Customer</div>
                    <div class="panel-body">
                        <div class="col-md-6">
                            
                            <form id="someForm2" action="" method="POST">
                                <div class="form-group">
                  <label>Date Time Start</label> 
                    <div class='input-group date' id='datetimepicker3'>
                        <input type='text' class="form-control" name="tgl_awal2" />
                        <span class="input-group-addon">
                          <span class="glyphicon glyphicon-calendar"></span>
                        </span>
                      </div>
                </div>
                
                <div class="form-group">
                  <label>Date Time End</label>
                  <div class='input-group date' id='datetimepicker4'>
                    <input type='text' class="form-control" name="tgl_akhir2" />
                    <span class="input-group-addon">
                      <span class="glyphicon glyphicon-calendar"></span>
                    </span>
                  </div>
                </div>

                 <div class="form-group">
                                    <label>Customer</label>
                                    <select class="form-control" name="nama" required>
                                    <option>---- Pilih Customer ----</option>
                                    <option>All</option>
                                    <?php
                                    include "koneksi.php";
                                    $sql = mysql_query("SELECT nama FROM customer group by nama asc");
                                    if(mysql_num_rows($sql) != 0){
                                    while($data = mysql_fetch_assoc($sql)){
                                    echo '<option value="'.$data['nama'].'">'.$data['nama'].'</option>';
                                        }
                                    }
                                    ?>
                                </select>
                                </div>  
                                                      
                                                            
                                    <input type="button" class="btn btn-info" value="Lihat" name="lihat2" onclick="askForLihat2()" />
                                    <input type="button" class="btn btn-primary" value="Download" name="download2" onclick="askForDownload2()" />
                                    </form>
                                    <script>
                                    form=document.getElementById("someForm2");
                                    function askForLihat2() {
                                            form.action="cetak-laporan-customer-job-to-do.php";
                                            form.submit();
                                    }
                                    function askForDownload2() {
                                            form.action="export-laporan-customer-job-to-do.php";
                                            form.submit();
                                    }
                                    </script>                             
                            </div>
                        </form>
                    </div>
                </div>
            </div><!-- /.col-->
        </div--><!-- /.row -->
        
    </div><!--/.main-->


    <script src="/js/jquery-1.11.1.min.js"></script>
    <script src="/js/bootstrap.min.js"></script>
    <script src="/js/chart.min.js"></script>
    <script src="/js/chart-data.js"></script>
    <script src="/js/easypiechart.js"></script>
    <script src="/js/easypiechart-data.js"></script>
    <script src="/js/bootstrap-datepicker.js"></script>
    <script src="/js/bootstrap-table.js"></script>
    <script src="/js/moment.js"></script>
    <script type="text/javascript" src="/js/bootstrap-datetimepicker.min.js"></script>
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
</body>

</html>
