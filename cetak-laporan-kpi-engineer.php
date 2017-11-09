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
            <center><h1 class="page-header">Laporan KPI Engineer</h1></center>
            
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
            $sql = "SELECT engineer.nama_engineer, daily_activity.tipe_pekerjaan, daily_activity.datetime_start, daily_activity.datetime_finish,  SEC_TO_TIME(SUM(TIME_TO_SEC(case when tipe_pekerjaan='Installation' then timediff(datetime_finish,datetime_start) else 0 end))) AS durasi_instalasi, SEC_TO_TIME(SUM(TIME_TO_SEC(case when tipe_pekerjaan='Troubleshooting' then timediff(datetime_finish,datetime_start) else 0 end))) AS durasi_troubleshooting, SEC_TO_TIME(SUM(TIME_TO_SEC(case when tipe_pekerjaan='Survey' then timediff(datetime_finish,datetime_start) else 0 end))) AS durasi_survey, SEC_TO_TIME(SUM(TIME_TO_SEC(case when tipe_pekerjaan='Moving' then timediff(datetime_finish,datetime_start) else 0 end))) AS durasi_moving, SEC_TO_TIME(SUM(TIME_TO_SEC(case when tipe_pekerjaan='Misc Job' then timediff(datetime_finish,datetime_start) else 0 end))) AS durasi_miscjob, SEC_TO_TIME(SUM(TIME_TO_SEC(case when tipe_pekerjaan='Trip' then timediff(datetime_finish,datetime_start) else 0 end))) AS durasi_trip, SEC_TO_TIME(SUM(TIME_TO_SEC(case when tipe_pekerjaan='Rest' then timediff(datetime_finish,datetime_start) else 0 end))) AS durasi_rest, SEC_TO_TIME(SUM(TIME_TO_SEC(case when tipe_pekerjaan='Duty' then timediff(datetime_finish,datetime_start) else 0 end))) AS durasi_duty, SEC_TO_TIME(SUM(TIME_TO_SEC(case when tipe_pekerjaan='Idle Site' then timediff(datetime_finish,datetime_start) else 0 end))) AS durasi_idlesite, SEC_TO_TIME(SUM(TIME_TO_SEC(case when tipe_pekerjaan='Idle' then timediff(datetime_finish,datetime_start) else 0 end))) AS durasi_idle, SEC_TO_TIME(SUM(TIME_TO_SEC(case when tipe_pekerjaan='Leave' then timediff(datetime_finish,datetime_start) else 0 end))) AS durasi_leave, SEC_TO_TIME(SUM(TIME_TO_SEC(case when tipe_pekerjaan='Day Off' then timediff(datetime_finish,datetime_start) else 0 end))) AS durasi_dayoff, SEC_TO_TIME(SUM(TIME_TO_SEC(case when tipe_pekerjaan='Sick' then timediff(datetime_finish,datetime_start) else 0 end))) AS durasi_sick 
              FROM daily_activity
              INNER JOIN engineer ON daily_activity.id_engineer = engineer.id_engineer 
              WHERE datetime_start
              BETWEEN  '$tgl_awal'
              AND  '$tgl_akhir' group by nama_engineer";
            
            } else if ($nama_engineer=="$nama_engineer"){
 
            $sql = "SELECT engineer.nama_engineer, daily_activity.tipe_pekerjaan, daily_activity.datetime_start, daily_activity.datetime_finish,  SEC_TO_TIME(SUM(TIME_TO_SEC(case when tipe_pekerjaan='Installation' then timediff(datetime_finish,datetime_start) else 0 end))) AS durasi_instalasi, SEC_TO_TIME(SUM(TIME_TO_SEC(case when tipe_pekerjaan='Troubleshooting' then timediff(datetime_finish,datetime_start) else 0 end))) AS durasi_troubleshooting, SEC_TO_TIME(SUM(TIME_TO_SEC(case when tipe_pekerjaan='Survey' then timediff(datetime_finish,datetime_start) else 0 end))) AS durasi_survey, SEC_TO_TIME(SUM(TIME_TO_SEC(case when tipe_pekerjaan='Moving' then timediff(datetime_finish,datetime_start) else 0 end))) AS durasi_moving, SEC_TO_TIME(SUM(TIME_TO_SEC(case when tipe_pekerjaan='Misc Job' then timediff(datetime_finish,datetime_start) else 0 end))) AS durasi_miscjob, SEC_TO_TIME(SUM(TIME_TO_SEC(case when tipe_pekerjaan='Trip' then timediff(datetime_finish,datetime_start) else 0 end))) AS durasi_trip, SEC_TO_TIME(SUM(TIME_TO_SEC(case when tipe_pekerjaan='Rest' then timediff(datetime_finish,datetime_start) else 0 end))) AS durasi_rest, SEC_TO_TIME(SUM(TIME_TO_SEC(case when tipe_pekerjaan='Duty' then timediff(datetime_finish,datetime_start) else 0 end))) AS durasi_duty, SEC_TO_TIME(SUM(TIME_TO_SEC(case when tipe_pekerjaan='Idle Site' then timediff(datetime_finish,datetime_start) else 0 end))) AS durasi_idlesite, SEC_TO_TIME(SUM(TIME_TO_SEC(case when tipe_pekerjaan='Idle' then timediff(datetime_finish,datetime_start) else 0 end))) AS durasi_idle, SEC_TO_TIME(SUM(TIME_TO_SEC(case when tipe_pekerjaan='Leave' then timediff(datetime_finish,datetime_start) else 0 end))) AS durasi_leave, SEC_TO_TIME(SUM(TIME_TO_SEC(case when tipe_pekerjaan='Day Off' then timediff(datetime_finish,datetime_start) else 0 end))) AS durasi_dayoff, SEC_TO_TIME(SUM(TIME_TO_SEC(case when tipe_pekerjaan='Sick' then timediff(datetime_finish,datetime_start) else 0 end))) AS durasi_sick 
              FROM daily_activity
              INNER JOIN engineer ON daily_activity.id_engineer = engineer.id_engineer 
              WHERE nama_engineer='$nama_engineer'
              AND datetime_start
              BETWEEN  '$tgl_awal'
              AND  '$tgl_akhir' group by nama_engineer";
                                

            } else {
             $sql = "SELECT engineer.nama_engineer, daily_activity.tipe_pekerjaan, daily_activity.datetime_start, daily_activity.datetime_finish,  SEC_TO_TIME(SUM(TIME_TO_SEC(case when tipe_pekerjaan='Installation' then timediff(datetime_finish,datetime_start) else 0 end))) AS durasi_instalasi, SEC_TO_TIME(SUM(TIME_TO_SEC(case when tipe_pekerjaan='Troubleshooting' then timediff(datetime_finish,datetime_start) else 0 end))) AS durasi_troubleshooting, SEC_TO_TIME(SUM(TIME_TO_SEC(case when tipe_pekerjaan='Survey' then timediff(datetime_finish,datetime_start) else 0 end))) AS durasi_survey, SEC_TO_TIME(SUM(TIME_TO_SEC(case when tipe_pekerjaan='Moving' then timediff(datetime_finish,datetime_start) else 0 end))) AS durasi_moving, SEC_TO_TIME(SUM(TIME_TO_SEC(case when tipe_pekerjaan='Misc Job' then timediff(datetime_finish,datetime_start) else 0 end))) AS durasi_miscjob, SEC_TO_TIME(SUM(TIME_TO_SEC(case when tipe_pekerjaan='Trip' then timediff(datetime_finish,datetime_start) else 0 end))) AS durasi_trip, SEC_TO_TIME(SUM(TIME_TO_SEC(case when tipe_pekerjaan='Rest' then timediff(datetime_finish,datetime_start) else 0 end))) AS durasi_rest, SEC_TO_TIME(SUM(TIME_TO_SEC(case when tipe_pekerjaan='Duty' then timediff(datetime_finish,datetime_start) else 0 end))) AS durasi_duty, SEC_TO_TIME(SUM(TIME_TO_SEC(case when tipe_pekerjaan='Idle Site' then timediff(datetime_finish,datetime_start) else 0 end))) AS durasi_idlesite, SEC_TO_TIME(SUM(TIME_TO_SEC(case when tipe_pekerjaan='Idle' then timediff(datetime_finish,datetime_start) else 0 end))) AS durasi_idle, SEC_TO_TIME(SUM(TIME_TO_SEC(case when tipe_pekerjaan='Leave' then timediff(datetime_finish,datetime_start) else 0 end))) AS durasi_leave, SEC_TO_TIME(SUM(TIME_TO_SEC(case when tipe_pekerjaan='Day Off' then timediff(datetime_finish,datetime_start) else 0 end))) AS durasi_dayoff, SEC_TO_TIME(SUM(TIME_TO_SEC(case when tipe_pekerjaan='Sick' then timediff(datetime_finish,datetime_start) else 0 end))) AS durasi_sick 
              FROM daily_activity
              INNER JOIN engineer ON daily_activity.id_engineer = engineer.id_engineer 
              WHERE nama_engineer='$nama_engineer'
              AND datetime_start='$tgl'
              AND job_to_do2.id_job_to_do =  '$id'";
            }

            $hasil = mysql_query($sql); 
            ?>

            <table data-toggle="table" data-url="tables/data1.json"  data-show-refresh="false" data-show-toggle="false" data-show-columns="false" data-search="false" data-select-item-name="toolbar1" data-pagination="false" >
                            <thead>
                            <tr>
                                <th data-field="itemid"  data-filter-control="input">No</th>
                                <th data-field="nama_engineer"  data-filter-control="input">Nama Engineer</th>
                                <th data-field="durasi_instalasi" data-filter-control="input">Installasi</th>
                                <th data-field="durasi_troubleshooting" data-filter-control="input">Troubleshooting</th>
                                <th data-field="durasi_survey" data-filter-control="input">Survey</th>
                                <th data-field="durasi_moving" data-filter-control="input">Moving</th>
                                <th data-field="durasi_miscjob" data-sortable="true">Misc Job</th>                               
                                <th data-field="durasi_trip"  data-filter-control="input">Trip</th>
                                <th data-field="durasi_rest"  data-filter-control="input">Rest</th>
                                <th data-field="durasi_duty"  data-filter-control="input">Duty</th>
                                <th data-field="durasi_idlesite"  data-filter-control="input">Idle Site</th>
                                <th data-field="durasi_idle"  data-filter-control="input">Idle</th>
								<th data-field="durasi_leave"  data-filter-control="input">Leave</th>
								<th data-field="durasi_dayoff"  data-filter-control="input">Day Off</th>
								<th data-field="durasi_sick"  data-filter-control="input">Sick</th>
                            </tr>
                            </thead>
                            <tbody>
<?php                       
$no=0;
while($record = mysql_fetch_array($hasil)){
?>
                           <tr>
                                <td data-field="itemid" data-sortable="true"><?php echo $no=$no+1;?></td>
                                <td data-field="nama_engineer" data-sortable="true"><?php echo $record['nama_engineer'];?></td>
                                <td data-field="durasi_instalasi" data-sortable="true"><?php echo $record['durasi_instalasi'];?></td>
                                <td data-field="durasi_troubleshooting" data-sortable="true"><?php echo $record['durasi_troubleshooting'];?></td>
                                <td data-field="durasi_survey" data-sortable="true"><?php echo $record['durasi_survey'];?></td>
                                <td data-field="durasi_moving" data-sortable="true"><?php echo $record['durasi_moving'];?></td>
                                <td data-field="durasi_miscjob" data-sortable="true"><?php echo $record['durasi_miscjob'];?></td>
                                <td data-field="durasi_trip" data-sortable="true"><?php echo $record['durasi_trip'];?></td> 
                                <td data-field="durasi_rest" data-sortable="true"><?php echo $record['durasi_rest'];?></td>
                                <td data-field="durasi_duty" data-sortable="true"><?php echo $record['durasi_duty'];?></td>
                                <td data-field="durasi_idlesite" data-sortable="true"><?php echo $record['durasi_idlesite'];?></td>
                                <td data-field="durasi_idle" data-sortable="true"><?php echo $record['durasi_idle'];?></td>
								<td data-field="durasi_leave" data-sortable="true"><?php echo $record['durasi_leave'];?></td>
								<td data-field="durasi_dayoff" data-sortable="true"><?php echo $record['durasi_dayoff'];?></td>
								<td data-field="durasi_sick" data-sortable="true"><?php echo $record['durasi_sick'];?></td>
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