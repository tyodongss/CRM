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
        <li class="active">Management UPS BTS</li>
      </ol>
    </div><!--/.row-->
    
    <div class="row">
      <div class="col-lg-12">
        <h1 class="page-header">Management UPS BTS</h1>
      </div>
    </div><!--/.row-->
        
    <?php

    include "koneksi.php";

$sql = mysql_query("select bts_ups.id,bts_ups.typeups,bts_ups.loadups,bts_ups.uptime,bts_ups.testdate,bts.nama_bts,engineer.nama_engineer from bts_ups,bts,engineer where bts_ups.id_bts=bts.id_bts and bts_ups.engineer=engineer.id_engineer");

    ?>
    
    <div class="row">
      <div class="col-lg-12">
        <div class="panel panel-default">
          <div class="panel-heading"><a href="tambah-data-ups.php" class="btn btn-primary btn-md">Tambah Checklist UPS</a></div>
          <div class="panel-body">
    
          
<table data-toggle="table" data-url="tables/data1.json"  data-show-refresh="true" data-show-toggle="true" data-show-columns="true" data-search="true" data-select-item-name="toolbar1" data-pagination="true" >
              
<thead>
<tr>
<th data-sortable="true">No</th>
<th data-sortable="true">BTS</th>
<th data-sortable="true">Model UPS</th>                                       
<th data-sortable="true">Load UPS</th>
<th data-sortable="true">Uptime UPS</th>
<th data-sortable="true">Test Date</th>                
<th data-sortable="true">Action</th>
</tr>
</thead>
<tbody>
<?php           
$no=0;
while($record = mysql_fetch_array($sql)){
?>
<td><?php print $no=$no+1 ?></td>
<td><?php print $record['nama_bts']?></td>
<td><?php print $record['typeups'] . $record['typebatt']?></td>
<td><?php print $record['loadups']?></td>
<td><?php print $record['uptime']?></td>
<td><?php print $record['testdate']?></td>
<td>
<a href="detail-data-ups.php?id=<?php echo $record['id'];?>"><span class="glyphicon glyphicon-eye-open" title="Details"></a> &nbsp;&nbsp;
<a href="ubah-data-ups.php?id=<?php echo $record['id'];?>"><span class="glyphicon glyphicon-pencil" title="Edit"></a> &nbsp;&nbsp;
<a href="deleted-at-data-ups.php?id=<?php echo $record['id'];?>"><span class="glyphicon glyphicon-remove" title="Delete"></a>
</td>
                    
</tr>
<?php } ?>                            
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



