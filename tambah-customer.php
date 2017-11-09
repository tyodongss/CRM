<?php
session_start();
?>
<!--  -->

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Sistem Informasi S-Net</title>
<link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
<link rel="icon" href="favicon.ico" type="image/x-icon">

<link href="/inventory/css/bootstrap.min.css" rel="stylesheet">
<link href="/inventory/css/datepicker3.css" rel="stylesheet">
<link href="/inventory/css/bootstrap-table.css" rel="stylesheet">
<link href="/inventory/css/styles.css" rel="stylesheet">

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
                                <a class="navbar-brand" href="#"><span class="glyphicon glyphicon-signal"></span> S-Net<span></span></a>
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
                <li class="active">Customer</li>
            </ol>
        </div><!--/.row-->
        
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Tambah Customer</h1>
            </div>
        </div><!--/.row-->
                
        
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <!--<div class="panel-heading">Stok Masuk</div>-->
                    <div class="panel-body">
                        <div class="col-md-6">
                            <form data-toggle="validator" role="form" action="proses-customer.php" method="post">
                            <input type="hidden" name="_token" value="L8C5ujpOh4UEsaNko2Y3pkuzP714OtRymsXPqrNJ">

                                <div class="form-group">
                                    <label>Nama Customer</label>
                                    <input class="form-control" name="nama" value="" required>
<div class="help-block with-errors"></div>
                                </div>
                                
                                <div class="form-group">
                                    <label>Alamat</label> 
                                    <input class="form-control" name="alamat" value="" required>
<div class="help-block with-errors"></div>
                                </div>
                                                            
                                <div class="form-group">
                                    <label>No. Telepon</label>
                                    <input class="form-control" name="no_telp" value="" maxlength="25">
<div class="help-block with-errors"></div>
                                </div>

                                <div class="form-group">
                                    <label>Contact Person 1</label>
                                    <input class="form-control" name="contact_person_1" value="" maxlength="40" required>
<div class="help-block with-errors"></div>
                                </div>

                                <div class="form-group">
                                    <label>No. HP CP 1</label>
                                    <input class="form-control" name="hp_1" value="" maxlength="15" required>
<div class="help-block with-errors"></div>
                                </div>

                                <div class="form-group">
                                    <label>Email 1</label>
                                    <input class="form-control" name="email_1" value="" maxlength="75" required>
                                    <div class="help-block with-errors"></div>
                                </div>

                                <div class="form-group">
                                    <label>Contact Person 2</label>
                                    <input class="form-control" name="contact_person_2" value="" maxlength="40">
                                </div>

                                <div class="form-group">
                                    <label>No. HP CP 2</label>
                                    <input class="form-control" name="hp_2" value="" maxlength="15">
                                </div>

                                <div class="form-group">
                                    <label>Email 2</label>
                                    <input class="form-control" name="email_2" value="" maxlength="75">
                                </div>

                                <div class="form-group">
                                    <label>Service</label>
                                    <select class="form-control" name="id_service">
                                    <option>---- Pilih Service ----</option>
                                    <?php
                                    include "koneksi.php";
                                    $sql = mysql_query("SELECT * FROM service order by nama_service asc");
                                    if(mysql_num_rows($sql) != 0){
                                    while($data = mysql_fetch_assoc($sql)){
                                    echo '<option value="'.$data['id_service'].'">'.$data['nama_service'].'</option>';
                                        }
                                    }
                                    ?>
                                </select>
                                </div>

                                <div class="form-group">
                                    <label>Bandwidth Down</label>
                                    <select class="form-control" name="id_bandwidth_down">
                                    <option>---- Pilih Bandwidth Down ----</option>
                                    <?php
                                    include "koneksi.php";
                                    $sql = mysql_query("SELECT * FROM bandwidth_down order by nama_bandwidth_down asc");
                                    if(mysql_num_rows($sql) != 0){
                                    while($data = mysql_fetch_assoc($sql)){
                                    echo '<option value="'.$data['id_bandwidth_down'].'">'.$data['nama_bandwidth_down'].'</option>';
                                        }
                                    }
                                    ?>
                                </select>
                                </div>

                                <div class="form-group">
                                    <label>Bandwidth Up</label>
                                    <select class="form-control" name="id_bandwidth_up">
                                    <option>---- Pilih Bandwidth Up ----</option>
                                    <?php
                                    include "koneksi.php";
                                    $sql = mysql_query("SELECT * FROM bandwidth_up order by nama_bandwidth_up asc");
                                    if(mysql_num_rows($sql) != 0){
                                    while($data = mysql_fetch_assoc($sql)){
                                    echo '<option value="'.$data['id_bandwidth_up'].'">'.$data['nama_bandwidth_up'].'</option>';
                                        }
                                    }
                                    ?>
                                </select>
                                </div>

                                <div class="form-group">
									<label>Tanggal Aktivasi</label>
									<input class="form-control" data-provide="datepicker" data-date-format="yyyy/mm/dd" name="tanggal_aktivasi" value="">
									<div class="help-block with-errors"></div>
								</div>


                                <div class="form-group">
									<label>Tanggal Terminasi</label>
									<input class="form-control" data-provide="datepicker" data-date-format="yyyy/mm/dd" name="tanggal_terminasi" value="">
								</div>

                                <div class="form-group">
                                    <label>Monthly Fee (IDR)</label>
                                    <input class="form-control" name="monthly_fee_idr">
                                </div>

                                <div class="form-group">
                                    <label>Monthly Fee (USD)</label>
                                    <input class="form-control" name="monthly_fee_usd">
                                </div>

                                <div class="form-group">
                                    <label>Status</label>
                                    <select class = "form-control" name="status">
                                    <option>Active</option>
                                    <option>Terminate</option>
                                    <option>Suspend</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label>Remark</label>
                                    <input class="form-control" name="remark">
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


    <script src="/inventory/js/jquery-1.11.1.min.js"></script>
    <script src="/inventory/js/bootstrap.min.js"></script>
    <script src="/inventory/js/chart.min.js"></script>
    <script src="/inventory/js/chart-data.js"></script>
    <script src="/inventory/js/easypiechart.js"></script>
    <script src="/inventory/js/easypiechart-data.js"></script>
    <script src="/inventory/js/bootstrap-datepicker.js"></script>
    <script src="/inventory/js/bootstrap-table.js"></script>
    <script src="/inventory/js/validator.js"></script>
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
