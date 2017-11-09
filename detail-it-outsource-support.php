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
        <?php include ('menu.php') ?>

<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">


                <div class="row">
                        <ol class="breadcrumb">
                                <li><a href="#"><span class="glyphicon glyphicon-home"></span></a></li>
                <li class="active">IT Outsource</li>
            </ol>
        </div><!--/.row-->
        
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Detail IT Outsource</h1>
            </div>
        </div><!--/.row-->
<?php 
include "koneksi.php"; 

$id=$_GET['id'];
$query=mysql_query("select it_outsource.id_it_outsource, it_outsource.nama_user, it_outsource.complain_via, it_outsource.tipe_pekerjaan, it_outsource.datetime_start, it_outsource.datetime_end, it_outsource.priority_pekerjaan, it_outsource.scope_pekerjaan, it_outsource.keterangan_pekerjaan, it_outsource.created_at, it_outsource.updated_at, it_outsource.deleted_at, customer.nama, engineer.nama_engineer, detail_pekerjaan.nama_detail_pekerjaan from it_outsource,customer,engineer,detail_pekerjaan where customer.id_customer=it_outsource.id_customer and engineer.id_engineer=it_outsource.id_engineer and detail_pekerjaan.id_detail_pekerjaan=it_outsource.id_detail_pekerjaan and id_it_outsource='$id'"); 
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
                                      <td width="40%"><b>Nama Customer</b></td>
                                      <td><?php echo $row['nama'];?></td>
                                    </tr>
									<tr>                                      
                                      <td width="40%"><b>Nama Engineer</b></td>
                                      <td><?php echo $row['nama_engineer'];?></td>
                                    </tr>
									<tr>                                      
                                      <td width="40%"><b>Nama User</b></td>
                                      <td><?php echo $row['nama_user'];?></td>
                                    </tr>
                                    <tr>                                      
                                      <td width="40%"><b>Complain Via</b></td>
                                      <td><?php echo $row['complain_via'];?></td>
                                    </tr>
                                    <tr>                                      
                                      <td width="40%"><b>Tipe Pekerjaan</b></td>
                                      <td><?php echo $row['tipe_pekerjaan'];?></td>
                                    </tr>
                                    <tr>                                      
                                      <td width="40%"><b>Date Time Start</b></td>
                                      <td><?php echo $row['datetime_start'];?></td>
                                    </tr>
                                    <tr>                                      
                                      <td width="40%"><b>Date Time End</b></td>
                                      <td><?php echo $row['datetime_end'];?></td>
                                    </tr>                                    
                                    <tr>                                      
                                      <td width="40%"><b>Priority Pekerjaan</b></td>
                                      <td><?php echo $row['priority_pekerjaan'];?></td>
                                    </tr>
                                    <tr>                                      
                                      <td width="40%"><b>Scope Pekerjaan</b></td>
                                      <td><?php echo $row['scope_pekerjaan'];?></td>
                                    </tr>
									<tr>                                      
                                      <td width="40%"><b>Detail Pekerjaan</b></td>
                                      <td><?php echo $row['nama_detail_pekerjaan'];?></td>
                                    </tr>
                                    <tr>                                      
                                      <td width="40%"><b>Keterangan Pekerjaan</b></td>
                                      <td><?php echo $row['keterangan_pekerjaan'];?></td>
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
                    <!--<div class="panel-heading">IT Outsource</div>-->
                    <div class="panel-body">
                        <div class="col-md-6">
                                <form role="form" action="show-history-it-outsource-support.php">
                                                                                                                    
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
