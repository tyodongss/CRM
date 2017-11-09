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
                <li class="active">Domain</li>
            </ol>
        </div><!--/.row-->
        
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Ubah Domain</h1>
            </div>
        </div><!--/.row-->
<?php 
include "koneksi.php"; 

$id=$_GET['id']; 
$query=mysql_query("select domain.id_domain, domain.nama_domain, domain.id_customer, customer.nama, domain.id_registrar, registrar.nama_registrar, domain.date_register, domain.date_expire, domain.domainhosting, domain.webhosting, domain.webhosting_usage, domain.mailhosting, domain.mailhosting_usage, domain.status_domain, domain.nama_kontak, domain.hp_kontak, domain.email_kontak, domain.remark, domain.created_at, domain.updated_at, domain.deleted_at  from domain,customer,registrar where customer.id_customer=domain.id_customer and registrar.id_registrar=domain.id_registrar and domain.id_domain='$id'");
?> 
<?php 
while($row=mysql_fetch_array($query)){ 
?>      
        
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <div class="col-md-6">
                            <form role="form" action="update-domain.php" method="post">
                            <input type="hidden" name="_token" value="L8C5ujpOh4UEsaNko2Y3pkuzP714OtRymsXPqrNJ">
                            <input type="hidden" name="id" value="<?php echo $id;?>"/>

                                <div class="form-group">
                                    <label>Nama Domain</label>
                                    <input class="form-control" name="nama_domain" value="<?php echo $row['nama_domain']?>" >
                                    <div class="help-block with-errors"></div>
                                </div>
								
                                <div class="form-group">
                                    <label>Nama Customer</label>
                                    <select class="form-control" name="id_customer">
                                    <option>---- Pilih Customer ----</option>
                                    <option selected value="<?php echo $row['id_customer'];?>"><?php echo $row['nama'];?></option>
                                    <?php
                                    $sql = mysql_query("SELECT * FROM customer order by nama asc");
                                    if(mysql_num_rows($sql) != 0){
                                    while($data = mysql_fetch_assoc($sql)){
                                    echo '<option value="'.$data['id_customer'].'" >'.$data['nama'].'</option>';
                                        } 
                                    }
                                    ?>
                                </select>
                                </div>

								<div class="form-group">
                                    <label>Nama Registrar</label>
                                    <select class="form-control" name="id_registrar">
                                    <option>---- Pilih Registrar ----</option>
                                    <option selected value="<?php echo $row['id_registrar'];?>"><?php echo $row['nama_registrar'];?></option>
                                    <?php
                                    $sql = mysql_query("SELECT * FROM registrar order by nama_registrar asc");
                                    if(mysql_num_rows($sql) != 0){
                                    while($data = mysql_fetch_assoc($sql)){
                                    echo '<option value="'.$data['id_registrar'].'" >'.$data['nama_registrar'].'</option>';
                                        } 
                                    }
                                    ?>
                                </select>
                                </div>
								
								<div class="form-group">
								  <label>Date Register</label>
								  <input class="form-control" data-provide="datepicker" data-date-format="yyyy/mm/dd" name="date_register" value="<?php echo $row['date_register'];?>" >
								  <div class="help-block with-errors"></div>
								</div>
								
								<div class="form-group">
								  <label>Date Expire</label>
								  <input class="form-control" data-provide="datepicker" data-date-format="yyyy/mm/dd" name="date_expire" value="<?php echo $row['date_expire'];?>" >
								  <div class="help-block with-errors"></div>
								</div>
								
								 <div class="form-group">
                                    <label>Domain Hosting</label>
                                    <select class = "form-control" name="domainhosting">
                                    <option selected value="<?php echo $row['domainhosting'];?>"><?php echo $row['domainhosting'];?></option>
                                    <option>Yes</option>
                                    <option>No</option>                                    
                                    </select>
                                </div>
								
								<div class="form-group">
                                    <label>Web Hosting</label>
                                    <select class = "form-control" name="webhosting">
                                    <option selected value="<?php echo $row['webhosting'];?>"><?php echo $row['webhosting'];?></option>
                                    <option>Yes</option>
                                    <option>No</option>                                    
                                    </select>
                                </div>
								
								<div class="form-group">
                                    <label>Web Hosting Usage</label>
                                    <input class="form-control" name="webhosting_usage" value="<?php echo $row['webhosting_usage']?>">                             
                                </div>
								
								<div class="form-group">
                                    <label>Mail Hosting</label>
                                    <select class = "form-control" name="mailhosting">
                                    <option selected value="<?php echo $row['mailhosting'];?>"><?php echo $row['mailhosting'];?></option>
                                    <option>Yes</option>
                                    <option>No</option>                                    
                                    </select>
                                </div>
								
								<div class="form-group">
                                    <label>Mail Hosting Usage</label>
                                    <input class="form-control" name="mailhosting_usage" value="<?php echo $row['mailhosting_usage']?>">                                  
                                </div>
								
								<div class="form-group">
                                    <label>Status Domain</label>
                                    <select class = "form-control" name="status_domain">
                                    <option selected value="<?php echo $row['status_domain'];?>"><?php echo $row['status_domain'];?></option>
                                    <option>Active</option>
                                    <option>Expired</option>                                    
                                    </select>
                                </div>
								
								<div class="form-group">
                                    <label>Nama Kontak</label>
                                    <input class="form-control" name="nama_kontak" value="<?php echo $row['nama_kontak']?>">                                  
                                </div>
								
								<div class="form-group">
                                    <label>No. HP Kontak</label>
                                    <input class="form-control" name="hp_kontak" value="<?php echo $row['hp_kontak']?>">                                  
                                </div>
								
								<div class="form-group">
                                    <label>Email Kontak</label>
                                    <input class="form-control" name="email_kontak" value="<?php echo $row['email_kontak']?>">                                  
                                </div>
								
								<div class="form-group">
                                    <label>Remark</label>
                                    <input class="form-control" name="remark" value="<?php echo $row['remark']?>">                                  
                                </div>
								
                                                                
                                <button type="submit" class="btn btn-primary">Update</button>
                                <a href="../show-domain.php" class="btn btn-default">Back</a>
                                
<?php
}
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
        <script src="/js/moment.js"></script>
        <script type="text/javascript" src="/js/bootstrap-datetimepicker.min.js"></script>
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
</body>

</html>


 