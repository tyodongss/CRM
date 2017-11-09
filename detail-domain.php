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
        <li class="active">Domain</li>
      </ol>
    </div><!--/.row-->
    
    <div class="row">
      <div class="col-lg-12">
        <h1 class="page-header">Detail Domain</h1>
      </div>
    </div><!--/.row-->
<?php 
include "koneksi.php"; 
$id=$_GET['id']; 
$query=mysql_query("select domain.id_domain, domain.nama_domain, domain.id_customer, customer.nama, domain.id_registrar, registrar.nama_registrar, domain.date_register, domain.date_expire, domain.domainhosting, domain.webhosting, domain.webhosting_usage, domain.mailhosting, domain.mailhosting_usage, domain.status_domain, domain.nama_kontak, domain.hp_kontak, domain.email_kontak, domain.remark, domain.created_at, domain.updated_at, domain.deleted_at  from domain,customer,registrar where customer.id_customer=domain.id_customer and registrar.id_registrar=domain.id_registrar and id_domain='$id'"); 
?> 
<?php 
while($row=mysql_fetch_array($query)){ 
?>    
    
    <div class="row">
      <div class="col-lg-12">
        <div class="panel panel-default">
            <table class="table table-striped">
                  <tbody>
                  <tr>                    
                    <td width="40%"><b>Nama Domain</b></td>
                    <td><?php echo $row['nama_domain'];?></td>
                  </tr>
                  <tr>                    
                    <td width="40%"><b>Nama Customer</b></td>
                    <td><?php echo $row['nama'];?></td>
                  </tr>
                  <tr>                    
                    <td width="40%"><b>Nama Registrar</b></td>
                    <td><?php echo $row['nama_registrar'];?></td>
                  </tr>
                  <tr>                    
                    <td width="40%"><b>Date Register</b></td>
                    <td><?php echo $row['date_register'];?></td>
                  </tr>
                  <tr>                    
                    <td width="40%"><b>Date Expire</b></td>
                    <td><?php echo $row['date_expire'];?></td>
                  </tr>
				  <tr>                    
                    <td width="40%"><b>Domain Hosting</b></td>
                    <td><?php echo $row['domainhosting'];?></td>
                  </tr>
				  <tr>                    
                    <td width="40%"><b>Web Hosting</b></td>
                    <td><?php echo $row['webhosting'];?></td>
                  </tr>
					<tr>                    
                    <td width="40%"><b>Web Hosting Usage</b></td>
                    <td><?php echo $row['webhosting_usage'];?></td>
                  </tr>
				  <tr>                    
                    <td width="40%"><b>Mail Hosting</b></td>
                    <td><?php echo $row['mailhosting'];?></td>
                  </tr>
				  <tr>                    
                    <td width="40%"><b>Mail Hosting Usage</b></td>
                    <td><?php echo $row['mailhosting_usage'];?></td>
                  </tr>
				  <tr>                    
                    <td width="40%"><b>Status Domain</b></td>
                    <td><?php echo $row['status_domain'];?></td>
                  </tr>
				  <tr>                    
                    <td width="40%"><b>Nama Kontak</b></td>
                    <td><?php echo $row['nama_kontak'];?></td>
                  </tr>
				  <tr>                    
                    <td width="40%"><b>No HP Kontak</b></td>
                    <td><?php echo $row['hp_kontak'];?></td>
                  </tr>
				  <tr>                    
                    <td width="40%"><b>Email Kontak</b></td>
                    <td><?php echo $row['email_kontak'];?></td>
                  </tr>	  
				  <tr>                    
                    <td width="40%"><b>Remark</b></td>
                    <td><?php echo $row['remark'];?></td>
                  </tr>
                  <tr>                    
                    <td width="40%"><b>Created At</b></td>
                    <td><?php echo $row['created_at'];?></td>
                  </tr> 
                  <tr>                    
                    <td width="40%"><b>Updated At</b></td>
                    <td><?php echo $row['updated_at'];?></td>
                  </tr> 
                  <tr>                    
                    <td width="40%"><b>Deleted At</b></td>
                    <td><?php echo $row['deleted_at'];?></td>
                  </tr>  
                  </tbody>
                </table>                
            </div>
        </div>
    </div>
    
    
    <div class="row">
      <div class="col-lg-12">
        <div class="panel panel-default">
          <!--<div class="panel-heading">Stok Masuk</div>-->
          <div class="panel-body">
            <div class="col-md-6">
                <form role="form" action="show-domain.php">
                                                          
                <button class="btn btn-default">Back</button>
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