<?php
date_default_timezone_set('Asia/Makassar'); 
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
            <center><h1 class="page-header">Laporan Customer Complain</h1></center>
            <?php
            include "koneksi.php";
            
            $tgl=$_POST['date'];
            $tgl_awal =$_POST['tgl_awal'];
            $tgl_akhir = $_POST['tgl_akhir'];
            $nama = $_POST['nama'];

            ?>
      <center><h5>Periode tanggal <b><?php echo $tgl_awal;?></b> sampai <b><?php echo $tgl_akhir;?></b></h5></center>
      <?php

	if ($nama="All"){

	$sql = "select customer_complain.id_customer_complain, customer_complain.swos, customer_complain.id_customer, customer_complain.status_charge, customer_complain.nama_cust_complain, customer_complain.complain_via, customer_complain.priority_complain, customer_complain.datetime_start, customer_complain.datetime_end, customer_complain.root_cause, customer_complain.solved_after, customer_complain.status_cust_complain, customer.nama FROM customer_complain,customer where customer_complain.id_customer=customer.id_customer and datetime_start between '$tgl_awal' and '$tgl_akhir' order by customer_complain.id_customer_complain asc";

	} else if ($nama="$nama"){

	

	$sql = "select customer_complain.id_customer_complain, customer_complain.swos, customer_complain.id_customer, customer_complain.status_charge, customer_complain.nama_cust_complain, customer_complain.complain_via, customer_complain.priority_complain, customer_complain.datetime_start, customer_complain.datetime_end, customer_complain.root_cause, customer_complain.solved_after, customer_complain.status_cust_complain, customer.nama FROM customer_complain,customer where customer_complain.id_customer=customer.id_customer and customer_complain.id_customer='$nama' datetime_start between '$tgl_awal' and '$tgl_akhir' order by customer_complain.id_customer_complain asc";

	}


        $hasil = mysql_query($sql); 
            ?>
            
<table data-toggle="table" data-url="tables/data1.json"  data-show-refresh="false" data-show-toggle="false" data-show-columns="false" data-search="false" data-select-item-name="toolbar1" data-pagination="false">
                            <thead>
                            <tr>
                                <th data-field="id_customer_complain" data-sortable="true">ID Customer Complain</th>
                                <th data-field="swos" data-sortable="true">SWOS</th>
                                <th data-field="nama"  data-sortable="true">Nama Customer</th>
                                <th data-field="status_charge" data-sortable="true">Status Charge</th>
                                <th data-field="nama_cust_complain" data-sortable="true">Nama Customer Complain</th>
                                <th data-field="complain_via" data-sortable="true">Complain Via</th>
                                <th data-field="priority_complain" data-sortable="true">Priority Complain</th>
                                <th data-field="datetime_start"  data-sortable="true">Date Time Start</th>
                                <th data-field="datetime_end" data-sortable="true">Date Time End</th>
                                <th data-field="root_cause" data-sortable="true">Root Cause</th>
                                <th data-field="solved_after" data-sortable="true">Solved After</th>
                                <th data-field="status_cust_complain" data-sortable="true">Status</th>
                            </tr>
                            </thead>
                            <tbody>
<?php                       
$no=1;
while($record = mysql_fetch_array($hasil)){
?>
                           <tr>
                                <td data-field="id_customer_complain" data-sortable="true"><?php echo $record['id_customer_complain'];?></td>
                                <td data-field="swos" data-sortable="true"><?php echo $record['swos'];?></td>
                                <td data-field="id_customer" data-sortable="true"><?php echo $record['nama'];?></td>
                                <td data-field="status_charge" data-sortable="true"><?php echo $record['status_charge'];?></td>
                                <td data-field="nama_cust_complain" data-sortable="true"><?php echo $record['nama_cust_complain'];?></td>
                                <td data-field="complain_via" data-sortable="true"><?php echo $record['complain_via'];?></td>
                                <td data-field="priority_complain" data-sortable="true"><?php echo $record['priority_complain'];?></td>
                                <td data-field="datetime_start" data-sortable="true"><?php echo $record['datetime_start'];?></td>
                                <td data-field="datetime_end" data-sortable="true"><?php echo $record['datetime_end'];?></td>
                                <td data-field="root_cause" data-sortable="true"><?php echo $record['root_cause'];?></td>
                                <td data-field="solved_after" data-sortable="true"><?php echo $record['solved_after'];?></td>
                                <td data-field="status_cust_complain" data-sortable="true"><?php echo $record['status_cust_complain'];?></td>
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
