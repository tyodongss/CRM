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
            <center><h1 class="page-header">Laporan SLA BTS</h1></center>
            
            <?php
            include "koneksi.php";
            
            $tgl=$_POST['date'];
            $tgl_awal =$_POST['tgl_awal'];
            $tgl_akhir = $_POST['tgl_akhir'];
            $nama_bts = $_POST['nama_bts'];

            ?>
      <center><h5>Periode tanggal <b><?php echo $tgl_awal;?></b> sampai <b><?php echo $tgl_akhir;?></b></h5></center>
      <?php

            if ($nama_bts=="All"){
            $sql = "SELECT bts_problem.id_bts_problem, bts_problem.swos, device_bts.nama_device, bts.nama_bts, engineer.nama_engineer, bts_problem.description, bts_problem.datetime_start, bts_problem.datetime_end, bts_problem.root_cause, bts_problem.solved_after, bts_problem.status_bts_problem, timediff(datetime_end,datetime_start) as duration FROM bts_problem, device_bts, bts, engineer WHERE device_bts.id_device_bts = bts_problem.id_device_bts AND bts.id_bts = bts_problem.id_bts AND engineer.id_engineer = bts_problem.id_engineer AND datetime_start BETWEEN  '$tgl_awal' AND  '$tgl_akhir' ORDER BY id_bts_problem DESC"; 
            
            } else if($nama_bts=="$nama_bts") {
            $sql = "SELECT bts_problem.id_bts_problem, bts_problem.swos, device_bts.nama_device, bts.nama_bts, engineer.nama_engineer, bts_problem.description, bts_problem.datetime_start, bts_problem.datetime_end, bts_problem.root_cause, bts_problem.solved_after, bts_problem.status_bts_problem, timediff(datetime_end,datetime_start) as duration FROM bts_problem, device_bts, bts, engineer WHERE device_bts.id_device_bts = bts_problem.id_device_bts AND bts.id_bts = bts_problem.id_bts AND engineer.id_engineer = bts_problem.id_engineer AND nama_bts='$nama_bts' AND datetime_start BETWEEN  '$tgl_awal' AND  '$tgl_akhir' ORDER BY id_bts_problem DESC";
            } else {
            $sql = "SELECT bts_problem.id_bts_problem, bts_problem.swos, device_bts.nama_device, bts.nama_bts, engineer.nama_engineer, bts_problem.description, bts_problem.datetime_start, bts_problem.datetime_end, bts_problem.root_cause, bts_problem.solved_after, bts_problem.status_bts_problem, timediff(datetime_end,datetime_start) as duration FROM bts_problem, device_bts, bts, engineer WHERE device_bts.id_device_bts = bts_problem.id_device_bts AND bts.id_bts = bts_problem.id_bts AND engineer.id_engineer = bts_problem.id_engineer AND nama_bts='$nama_bts' AND datetime_start BETWEEN='$tgl' ORDER BY id_bts_problem DESC";
            }

            $hasil = mysql_query($sql); 
            ?>

            <table data-toggle="table" data-url="tables/data1.json"  data-show-refresh="false" data-show-toggle="false" data-show-columns="false" data-search="false" data-select-item-name="toolbar1" data-pagination="false" >
                            <thead>
                            <tr>
                                <th data-field="itemid" data-sortable="true">No</th>
                                <th data-field="swos"  data-sortable="true">SWOS</th>
                                <th data-field="id_device_bts"  data-sortable="true">Nama Device BTS</th>
                                <th data-field="id_bts" data-sortable="true">Nama BTS</th>
                                <th data-field="id_engineer" data-sortable="true">Nama Engineer</th>
                                <th data-field="description" data-sortable="true">Description</th>
                                <th data-field="datetime_start" data-sortable="true">Datetime Start</th>
                                <th data-field="datetime_end" data-sortable="true">Datetime End</th>
                                <th data-field="duration" data-sortable="true">Duration</th>
                                <th data-field="root_cause" data-sortable="true">Root Cause</th>
                                <th data-field="solved_after" data-sortable="true">Solved After</th>
                                <th data-field="status_bts_problem" data-sortable="true">Status BTS Problem</th>
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
                                <td data-field="id_device_bts" data-sortable="true"><?php echo $record['nama_device'];?></td>
                                <td data-field="id_bts" data-sortable="true"><?php echo $record['nama_bts'];?></td>
                                <td data-field="id_engineer" data-sortable="true"><?php echo $record['nama_engineer'];?></td>
                                <td data-field="description" data-sortable="true"><?php echo $record['description'];?></td>
                                <td data-field="datetime_start" data-sortable="true"><?php echo $record['datetime_start'];?></td>
                                <td data-field="datetime_end" data-sortable="true"><?php echo $record['datetime_end'];?></td>
                                <td data-field="duration" data-sortable="true"><?php echo $record['duration'];?></td>
                                <td data-field="root_cause" data-sortable="true"><?php echo $record['root_cause'];?></td>
                                <td data-field="solved_after" data-sortable="true"><?php echo $record['solved_after'];?></td>
                                <td data-field="status_bts_problem" data-sortable="true"><?php echo $record['status_bts_problem'];?></td>
                            </tr>
<?php
}
?>  
                                                
                            </tbody>
                        </table>

<?php

if ($nama_bts=="All"){
            $query = "SELECT SEC_TO_TIME(SUM(TIME_TO_SEC(timediff(datetime_end,datetime_start)))) as total FROM bts_problem WHERE datetime_start BETWEEN  '$tgl_awal' AND  '$tgl_akhir' ORDER BY id_bts_problem DESC"; 
            
            } else if($nama_bts=="$nama_bts") {
            $query = "SELECT SEC_TO_TIME(SUM(TIME_TO_SEC(timediff(datetime_end,datetime_start)))) as total FROM bts_problem WHERE nama_bts='$nama_bts' AND datetime_start BETWEEN  '$tgl_awal' AND  '$tgl_akhir' ORDER BY id_bts_problem DESC";
            } else {
            $query = "SELECT SEC_TO_TIME(SUM(TIME_TO_SEC(timediff(datetime_end,datetime_start)))) as total FROM bts_problem WHERE nama_bts='$nama_bts' AND datetime_start BETWEEN='$tgl' ORDER BY id_bts_problem DESC";
            }

            $hasil2 = mysql_query($query); 
            ?>

                        <br>
                        <table class="table table-striped">
                                  <tbody>
                                    <tr>                                      
                                      <td width="10%"><b>Total Duration</b></td>
                                      <?php while($record2 = mysql_fetch_array($hasil2)){ ?>
                                      <td><?php echo $record2['total'];?></td>
                                    </tr>

                                    <tr>
                                      <td width="10%"><b>Total TTR</b></td>
                                      <td>

                                        <?php 
                                        
                                        $time = $record2['total'];

                                        function time_to_decimal($time) {
                                            $timeArr = explode(':', $time);
                                            $decTime = ($timeArr[0]) + ($timeArr[1]/60) + ($timeArr[2]/3600);
                                         
                                            return $decTime;
                                        }
                                        $ttr = time_to_decimal($time);
                                        echo $ttr;
                                        ?>

                                      </td>
                                    </tr>

                                    <tr>
                                        <td width="10%"><b>KPI</b></td>
                                        <td> 
                                        <?php

										$kalender = CAL_GREGORIAN;
										$bulan = date('m');
										$tahun = date('Y');

										$hari = cal_days_in_month($kalender, $bulan, $tahun);
										$jumlah_hari = $hari*24;

                                        $kpi = $ttr/$jumlah_hari*100; 
                                        echo round($kpi, 2); ?>%
                                        </td>
                                    </tr>

                                    <tr>
                                        <td width="10%"><b>SLA</b></td>
                                        <td>
                                        <?php
                                          $sla = 100-$kpi;
                                          echo round($sla, 2); ?>%
                                        </td>
                                        <? } ?>
                                    </tr>
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
