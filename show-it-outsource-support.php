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
                <li class="active">IT Outsource</li>
            </ol>
        </div><!--/.row-->
        
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">IT Outsource</h1>
            </div>
        </div><!--/.row-->
                
<?php
$id = $_SESSION['id'];

if ($id!=""){ 

include "koneksi.php";

$sql = "select it_outsource.id_it_outsource, it_outsource.tipe_pekerjaan, it_outsource.id_engineer, it_outsource.datetime_start, it_outsource.datetime_end,  it_outsource.priority_pekerjaan,  customer.nama, engineer.nama_engineer, it_outsource.deleted_at, timediff(it_outsource.datetime_end, it_outsource.datetime_start) as Duration from it_outsource,customer,engineer where customer.id_customer=it_outsource.id_customer and engineer.id_engineer=it_outsource.id_engineer and it_outsource.deleted_at is NULL and it_outsource.id_engineer='$id' order by id_it_outsource desc";

$hasil = mysql_query($sql);
?>      
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading"><a href="tambah-it-outsource-support.php" class="btn btn-primary btn-md">Tambah IT Outsource</a></div>
                    <div class="panel-body">


                        <table data-toggle="table" data-url="tables/data1.json"  data-show-refresh="true" data-show-toggle="true" data-show-columns="true" data-search="true" data-select-item-name="toolbar1" data-pagination="true" data-sort-name="name" data-sort-order="asc">
                            <thead>
                            <tr>
                                <th data-field="itemid"  data-filter-control="input">No</th>
								<th data-field="id_it_outsource"  data-sortable="true">ITS ID</th>
                                <th data-field="id_customer"  data-filter-control="input">Nama Customer</th>
                                <th data-field="tipe_pekerjaan"  data-filter-control="input">Tipe Pekerjaan</th>
                                <th data-field="datetime_start" data-filter-control="input">Date Time Start</th>
                                <th data-field="datetime_end" data-filter-control="input">Date Time End</th>
                                <th data-field="duration" data-filter-control="input">Duration</th>
                                <th data-field="priority_pekerjaan" data-filter-control="input">Priority Pekerjaan</th>
                                <th data-field="action" data-sortable="true">Action</th>
                                
                            </tr>
                            </thead>
                            <tbody>
<?php                       
$no=0;
while($record = mysql_fetch_array($hasil)){
?>
                           <tr>
                                <td data-field="id_it_outsource" data-sortable="true"><?php echo $no=$no+1;?></td>
								<td data-field="id_it_outsource" data-sortable="true"><?php echo $record['id_it_outsource'];?></td>
                                <td data-field="id_customer" data-sortable="true"><?php echo $record['nama'];?></td>
                                <td data-field="tipe_pekerjaan" data-sortable="true"><?php echo $record['tipe_pekerjaan'];?></td>
                                <td data-field="datetime_start" data-sortable="true"><?php echo $record['datetime_start'];?></td>
                                <td data-field="datetime_end" data-sortable="true"><?php echo $record['datetime_end'];?></td>
                                <td data-field="duration" data-sortable="true"><?php echo $record['Duration'];?></td>
                                <td data-field="priority_pekerjaan" data-sortable="true"><?php echo $record['priority_pekerjaan'];?></td>
                                <td data-field="action" data-sortable="true"><a href="detail-it-outsource-support.php?id=<?php echo $record['id_it_outsource'];?>"><span class="glyphicon glyphicon-eye-open" title="Details"></a>&nbsp;&nbsp;<a href="ubah-it-outsource-support.php?id=<?php echo $record['id_it_outsource'];?>"><span class="glyphicon glyphicon-pencil" title="Edit"></a></td>
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
