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
            <center><h1 class="page-header">Laporan Daily Activity</h1></center>
            
            <?php
            include "koneksi.php";

            $tgl=$_POST['date'];
            $tgl_awal =$_POST['tgl_awal'];
            $tgl_akhir = $_POST['tgl_akhir'];
            $nama_engineer = $_POST['nama_engineer'];
              

            ?>
      <center><h5>Periode tanggal <b><?php echo $tgl_awal;?></b> sampai <b><?php echo $tgl_akhir;?></b></h5></center>
      <?php            

            if ($nama_engineer=="All"){
 
            $sql = "SELECT daily_activity.id_daily_activity, daily_activity.swos, daily_activity.id_engineer, daily_activity.tipe_pekerjaan, daily_activity.activity, daily_activity.id_customer, daily_activity.datetime_start, daily_activity.datetime_finish, daily_activity.ot, daily_activity.rb, daily_activity.trip_allowance, daily_activity.remark,  daily_activity.deleted_at, engineer.nama_engineer, customer.nama
			  FROM daily_activity, engineer, customer
              WHERE engineer.id_engineer = daily_activity.id_engineer
              AND customer.id_customer = daily_activity.id_customer
              AND datetime_start
              BETWEEN  '$tgl_awal'
              AND  '$tgl_akhir' order by id_daily_activity desc";

            } else if ($nama_engineer=="$nama_engineer"){
 
            $sql = "SELECT daily_activity.id_daily_activity, daily_activity.swos, daily_activity.id_engineer, daily_activity.tipe_pekerjaan, daily_activity.activity, daily_activity.id_customer, daily_activity.datetime_start, daily_activity.datetime_finish, daily_activity.ot, daily_activity.rb, daily_activity.trip_allowance, daily_activity.remark,  daily_activity.deleted_at, engineer.nama_engineer, customer.nama
			  FROM daily_activity, engineer, customer
              WHERE engineer.id_engineer = daily_activity.id_engineer
              AND customer.id_customer = daily_activity.id_customer
			  AND nama_engineer =  '$nama_engineer'
              AND datetime_start
              BETWEEN  '$tgl_awal'
              AND  '$tgl_akhir' order by id_daily_activity desc";

            } else {
            $sql = "SELECT daily_activity.id_daily_activity, daily_activity.swos, daily_activity.id_engineer, daily_activity.tipe_pekerjaan, daily_activity.activity, daily_activity.id_customer, daily_activity.datetime_start, daily_activity.datetime_finish, daily_activity.ot, daily_activity.rb, daily_activity.trip_allowance, daily_activity.remark,  daily_activity.deleted_at, engineer.nama_engineer, customer.nama
			  FROM daily_activity, engineer, customer
              WHERE engineer.id_engineer = daily_activity.id_engineer
              AND customer.id_customer = daily_activity.id_customer
			  AND nama_engineer =  '$nama_engineer'
              AND datetime_start
              = '$tgl'  order by id_daily_activity desc";

            }

            $hasil = mysql_query($sql); 
            ?>

            <table data-toggle="table" data-url="tables/data1.json"  data-show-refresh="false" data-show-toggle="false" data-show-columns="false" data-search="false" data-select-item-name="toolbar1" data-pagination="false" >
                            <thead>
                            <tr>
                                <th data-field="itemid"  data-filter-control="input">No</th>
                                <th data-field="swos"  data-sortable="true">SWOS</th>
								<th data-field="nama_engineer"  data-sortable="true">Nama Engineer</th>
								<th data-field="tipe_pekerjaan" data-sortable="true">Tipe Pekerjaan</th>
								<th data-field="activity" data-sortable="true">Activity</th>
								<th data-field="nama" data-sortable="true">Nama Customer</th>
								<th data-field="datetime_start" data-sortable="true">Datetime Start</th>
								<th data-field="datetime_finish" data-sortable="true">Datetime Finish</th>
								<th data-field="ot" data-sortable="true">OT</th>
								<th data-field="rb" data-sortable="true">RB</th>
								<th data-field="trip_allowance" data-sortable="true">Trip Allowance</th>
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
								<td data-field="swos" data-sortable="true"><?php echo $record['swos'];?></td>
								<td data-field="nama_engineer" data-sortable="true"><?php echo $record['nama_engineer'];?></td>
								<td data-field="tipe_pekerjaan" data-sortable="true"><?php echo $record['tipe_pekerjaan'];?></td>
								<td data-field="activity" data-sortable="true"><?php echo $record['activity'];?></td>
								<td data-field="nama" data-sortable="true"><?php echo $record['nama'];?></td>
								<td data-field="datetime_start" data-sortable="true"><?php echo $record['datetime_start'];?></td>
								<td data-field="datetime_finish" data-sortable="true"><?php echo $record['datetime_finish'];?></td>
								<td data-field="ot" data-sortable="true"><?php echo $record['ot'];?></td>
								<td data-field="rb" data-sortable="true"><?php echo $record['rb'];?></td>
								<td data-field="trip_allowance" data-sortable="true"><?php echo $record['trip_allowance'];?></td>
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