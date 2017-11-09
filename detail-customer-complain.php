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
        <li class="active">Customer Complain</li>
      </ol>
    </div><!--/.row-->
    
    <div class="row">
      <div class="col-lg-12">
        <h1 class="page-header">Detail Customer Complain</h1>
      </div>
    </div><!--/.row-->
<?php 
include "koneksi.php"; 

$id=$_GET['id']; 
$query=mysql_query("SELECT customer_complain.id_customer_complain, customer_complain.swos, customer.nama, customer_complain.status_charge, customer_complain.nama_cust_complain, customer_complain.complain_via, customer_complain.priority_complain, customer_complain.datetime_start, customer_complain.root_cause, customer_complain.solved_after, customer_complain.datetime_end, customer_complain.status_cust_complain FROM customer_complain,customer WHERE customer.id_customer = customer_complain.id_customer AND id_customer_complain='$id'"); 
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
                    <td width="40%"><b>SWOS</b></td>
                    <td><?php echo $row['swos'];?></td>
                  </tr>
                  <tr>                    
                    <td width="40%"><b>Nama Customer</b></td>
                    <td><?php echo $row['nama'];?></td>
                  </tr>
                  <tr>                    
                    <td width="40%"><b>Status Charge</b></td>
                    <td><?php echo $row['status_charge'];?></td>
                  </tr>
                  <tr>                    
                    <td width="40%"><b>Nama Customer Complain</b></td>
                    <td><?php echo $row['nama_cust_complain'];?></td>
                  </tr>
                  <tr>                    
                    <td width="40%"><b>Complain Via</b></td>
                    <td><?php echo $row['complain_via'];?></td>
                  </tr>
                  <tr>                    
                    <td width="40%"><b>Priority Complain</b></td>
                    <td><?php echo $row['priority_complain'];?></td>
                  </tr>  
                  <tr>                   
                    <td width="40%"><b>Datetime Start</b></td>
                    <td><?php echo $row['datetime_start'];?></td>
                  </tr>
                  <tr>                    
                    <td width="40%"><b>Datetime End</b></td>
                    <td><?php echo $row['datetime_end'];?></td>
                  </tr>
                  <tr>                    
                    <td width="40%"><b>Root Cause</b></td>
                    <td><?php echo $row['root_cause'];?></td>
                  </tr>
                  <tr>                    
                    <td width="40%"><b>Solved After</b></td>
                    <td><?php echo $row['solved_after'];?></td>
                  </tr>
                  <tr>                    
                    <td width="40%"><b>Status</b></td>
                    <td><?php echo $row['status_cust_complain'];?></td>
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
                <form role="form" action="show-customer-complain.php">
                                                          
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