<?php 
session_start(); 
?>

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

    <div class="row">
        <div class="col-lg-12">
            <center><h1 class="page-header">Laporan Backbone</h1></center>
            
            <?php
            include "koneksi.php";

            $sql = "select * from backbone order by nama_backbone asc"; 
            
            $hasil = mysql_query($sql); 
            ?>

            <table data-toggle="table" data-url="tables/data1.json"  data-show-refresh="false" data-show-toggle="false" data-show-columns="false" data-search="false" data-select-item-name="toolbar1" data-pagination="false" >
                            <thead>
                            <tr>
                                <th data-field="itemid" data-sortable="true">No</th>
                                <th data-field="nama_backbone"  data-sortable="true">Nama Backbone</th>
                                <th data-field="alamat"  data-sortable="true">Alamat</th>
                                <th data-field="account_manager" data-sortable="true">Account Manager</th>
                                <th data-field="account_manager_telephone" data-sortable="true">Account Manager Telephone</th>
                                <th data-field="account_manager_email" data-sortable="true">Account Manager Email</th>
                                <th data-field="support_telephone" data-sortable="true">Support Telephone</th>
                                <th data-field="support_email" data-sortable="true">Support Email</th>
                                <th data-field="website" data-sortable="true">Website</th>
                                <th data-field="remark" data-sortable="true">Remark</th>
                            </tr>
                            </thead>
                            <tbody>
<?php                       
$no=0;
while($record = mysql_fetch_array($hasil)){
?>
                           <tr>
                                <td data-field="itemid" data-sortable="true"><?php echo $no=$no+1;?></td>
                                <td data-field="nama_backbone" data-sortable="true"><?php echo $record['nama_backbone'];?></td>
                                <td data-field="alamat" data-sortable="true"><?php echo $record['alamat'];?></td>
                                <td data-field="account_manager" data-sortable="true"><?php echo $record['account_manager'];?></td>
                                <td data-field="account_manager_telephone" data-sortable="true"><?php echo $record['account_manager_telephone'];?></td>
                                <td data-field="account_manager_email" data-sortable="true"><?php echo $record['account_manager_email'];?></td>
                                <td data-field="support_telephone" data-sortable="true"><?php echo $record['support_telephone'];?></td>
                                <td data-field="support_email" data-sortable="true"><?php echo $record['support_email'];?></td>
                                <td data-field="website" data-sortable="true"><?php echo $record['website'];?></td>
                                <td data-field="remark" data-sortable="true"><?php echo $record['remark'];?></td>
                            </tr>
<?php
}
?>  
                                                
                            </tbody>
                        </table>

        </div>
    </div><!--/.row-->
</div>


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
