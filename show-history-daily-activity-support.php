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
        <li class="active">History Daily Activity</li>
      </ol>
    </div><!--/.row-->
    
    <div class="row">
      <div class="col-lg-12">
        <h1 class="page-header">History Daily Activity</h1>
      </div>
    </div><!--/.row-->
        
    <?php
	$id = $_SESSION['id'];

	if ($id!=""){

    include "koneksi.php";

    $sql = "SELECT daily_activity.id_daily_activity, daily_activity.swos, daily_activity.id_engineer, daily_activity.tipe_pekerjaan, daily_activity.activity, daily_activity.id_customer, daily_activity.datetime_start, daily_activity.datetime_finish, daily_activity.remark,  daily_activity.deleted_at, engineer.nama_engineer, customer.nama
      FROM daily_activity, engineer, customer
      WHERE engineer.id_engineer = daily_activity.id_engineer
      AND customer.id_customer = daily_activity.id_customer
      AND daily_activity.deleted_at is not NULL
      AND daily_activity.id_engineer = '$id'
      ORDER BY id_daily_activity DESC ";
    $hasil = mysql_query($sql); ?>
    
    <div class="row">
      <div class="col-lg-12">
        <div class="panel panel-default">
          <div class="panel-body">
    
          
          <table data-toggle="table" data-url="tables/data1.json"  data-show-refresh="true" data-show-toggle="true" data-show-columns="true" data-search="true" data-select-item-name="toolbar1" data-pagination="true" >
              
             <thead>
                <tr>
              <th data-field="itemid"  data-sortable="true">No</th>
                    <th data-field="swos"  data-sortable="true">SWOS</th>
                <th data-field="nama_engineer"  data-sortable="true">Nama Engineer</th>
                    <th data-field="tipe_pekerjaan" data-sortable="true">Tipe Pekerjaan</th>
                    <th data-field="nama" data-sortable="true">Nama Customer</th>
              <th data-field="action" data-sortable="true">Action</th>
                </tr>
              </thead>
              <tbody>
              <?php           
$no=0;
while($record = mysql_fetch_array($hasil)){
?>
              
                <td data-field="itemid" data-sortable="true"><?php echo $no=$no+1;?></td>
                <td data-field="swos" data-sortable="true"><?php echo $record['swos'];?></td>
                <td data-field="nama_engineer" data-sortable="true"><?php echo $record['nama_engineer'];?></td>
                    <td data-field="tipe_pekerjaan" data-sortable="true"><?php echo $record['tipe_pekerjaan'];?></td>
                    <td data-field="nama" data-sortable="true"><?php echo $record['nama'];?></td>
                <td data-field="action" data-sortable="true"><a href="detail-daily-activity-support.php?id=<?php echo $record['id_daily_activity'];?>"><span class="glyphicon glyphicon-eye-open" title="Details"></a></td>
                    
                  </tr>
<?php
}}
?>                            
                                </tbody>
            </table>
  
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



