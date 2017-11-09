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
                <li class="active">Dismantle</li>
            </ol>
        </div><!--/.row-->
        
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Dismantle</h1>
            </div>
        </div><!--/.row-->
                
<?php

include "koneksi.php";

$sql = "SELECT dismantle.id_dismantle, dismantle.tanggal, dismantle.remark, dismantle.swos, barang.nama_barang, barang.serial_number, engineer.nama_engineer FROM dismantle
JOIN barang ON dismantle.id_barang = barang.id_barang
JOIN engineer ON dismantle.id_engineer = engineer.id_engineer order by id_dismantle desc";

$hasil = mysql_query($sql); 
?>      
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading"><a href="tambah-dismantle.php" class="btn btn-primary btn-md">Tambah Dismantle</a></div>
                    <div class="panel-body">


                        <table data-toggle="table" data-url="tables/data1.json"  data-show-refresh="true" data-show-toggle="true" data-show-columns="true" data-search="true" data-select-item-name="toolbar1" data-pagination="true" data-sort-name="name" data-sort-order="asc">
                            <thead>
                            <tr>
                                <th data-field="itemid" data-sortable="true">No</th>
                                <th data-field="nama_barang" data-sortable="true">Nama Barang</th>
                                <th data-field="id_barangKeluar"  data-sortable="true">Serial Number</th>
                                <th data-field="tanggal" data-sortable="true">Tanggal</th>
                                <th data-field="id_engineer" data-sortable="true">Nama Engineer</th>
                                <th data-field="remark" data-sortable="true">Remark</th>
                                <th data-field="swos" data-sortable="true">Swos</th>
                                <th data-field="action" data-sortable="true">Action</th>
                            </tr>
                            </thead>
                            <tbody>
<?php                       
$no=0;
while($record = mysql_fetch_array($hasil)){
?>
                           <tr>
                                <td data-field="itemid" data-sortable="true"><?php echo $no=$no+1?></td>
                                <td data-field="nama_barang" data-sortable="true"><?php echo $record['nama_barang'];?></td>
                                <td data-field="id_barang" data-sortable="true"><?php echo $record['serial_number'];?></td>
                                <td data-field="tanggal" data-sortable="true"><?php echo $record['tanggal'];?></td>
                                <td data-field="id_engineer" data-sortable="true"><?php echo $record['nama_engineer'];?></td>
                                <td data-field="remark" data-sortable="true"><?php echo $record['remark'];?></td>
                                <td data-field="swos" data-sortable="true"><?php echo $record['swos'];?></td>
                                <td data-field="action" data-sortable="true"><a href="detail-dismantle.php?id=<?php echo $record['id_dismantle'];?>"><span class="glyphicon glyphicon-eye-open" title="Details"></a> &nbsp;&nbsp;<a href="ubah-dismantle.php?id=<?php echo $record['id_dismantle'];?>"><span class="glyphicon glyphicon-pencil" title="Edit"></a> &nbsp;&nbsp;</td>
                            </tr>
<?php
}
?>                                                  
                                                        </tbody>
                        </table>
                        
                    </div>
                </div>
            </div>

        </div><!--/.row-->  
        <!--
        <div class="row">
            <div class="col-md-6">
                <div class="panel panel-default">
                    <div class="panel-heading">Basic Table</div>
                    <div class="panel-body">
                        <table data-toggle="table" data-url="tables/data2.json" >
                            <thead>
                            <tr>
                                <th data-field="id" data-align="right">Item ID</th>
                                <th data-field="name">Item Name</th>
                                <th data-field="price">Item Price</th>
                            </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="panel panel-default">
                    <div class="panel-heading">Styled Table</div>
                    <div class="panel-body">
                        <table data-toggle="table" id="table-style" data-url="tables/data2.json" data-row-style="rowStyle">
                            <thead>
                            <tr>
                                <th data-field="id" data-align="right" >Item ID</th>
                                <th data-field="name" >Item Name</th>
                                <th data-field="price" >Item Price</th>
                            </tr>
                            </thead>
                        </table>
                        <script>
                            $(function () {
                                $('#hover, #striped, #condensed').click(function () {
                                    var classes = 'table';
                        
                                    if ($('#hover').prop('checked')) {
                                        classes += ' table-hover';
                                    }
                                    if ($('#condensed').prop('checked')) {
                                        classes += ' table-condensed';
                                    }
                                    $('#table-style').bootstrapTable('destroy')
                                        .bootstrapTable({
                                            classes: classes,
                                            striped: $('#striped').prop('checked')
                                        });
                                });
                            });
                        
                            function rowStyle(row, index) {
                                var classes = ['active', 'success', 'info', 'warning', 'danger'];
                        
                                if (index % 2 === 0 && index / 2 < classes.length) {
                                    return {
                                        classes: classes[index / 2]
                                    };
                                }
                                return {};
                            }
                        </script>
                    </div>
                </div>
            </div>
        </div>--><!--/.row-->   
        
        
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

