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
            <center><h1 class="page-header">Laporan Pekerjaan Engineer </h1></center>
            
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
 
            $sql = "SELECT engineer.nama_engineer, SUM( 
			CASE WHEN tipe_pekerjaan LIKE  'Troubleshooting%'
			THEN 1 
			ELSE 0 
			END ) AS jumlah_troubleshooting, SUM( 
			CASE WHEN tipe_pekerjaan =  'Install'
			THEN 1 
			ELSE 0 
			END ) AS jumlah_install, SUM( 
			CASE WHEN tipe_pekerjaan =  'Maintenance'
			THEN 1 
			ELSE 0 
			END ) AS jumlah_maintenance, SUM( 
			CASE WHEN tipe_pekerjaan =  'Backup/Restore'
			THEN 1 
			ELSE 0 
			END ) AS jumlah_backuprestore, SUM( 
			CASE WHEN tipe_pekerjaan =  'Other'
			THEN 1 
			ELSE 0 
			END ) AS jumlah_other
			FROM detail_job_to_do
			INNER JOIN engineer ON detail_job_to_do.id_engineer = engineer.id_engineer
			INNER JOIN job_to_do2 ON detail_job_to_do.id_job_to_do = job_to_do2.id_job_to_do
			WHERE datetime_open
			BETWEEN  '$tgl_awal'
			AND  '$tgl_akhir'
			GROUP BY nama_engineer";

            } else if ($nama_engineer=="$nama_engineer"){
 
            $sql = "SELECT engineer.nama_engineer, SUM( 
			CASE WHEN tipe_pekerjaan LIKE  'Troubleshooting%'
			THEN 1 
			ELSE 0 
			END ) AS jumlah_troubleshooting, SUM( 
			CASE WHEN tipe_pekerjaan =  'Install'
			THEN 1 
			ELSE 0 
			END ) AS jumlah_install, SUM( 
			CASE WHEN tipe_pekerjaan =  'Maintenance'
			THEN 1 
			ELSE 0 
			END ) AS jumlah_maintenance, SUM( 
			CASE WHEN tipe_pekerjaan =  'Backup/Restore'
			THEN 1 
			ELSE 0 
			END ) AS jumlah_backuprestore, SUM( 
			CASE WHEN tipe_pekerjaan =  'Other'
			THEN 1 
			ELSE 0 
			END ) AS jumlah_other
			FROM detail_job_to_do
			INNER JOIN engineer ON detail_job_to_do.id_engineer = engineer.id_engineer
			INNER JOIN job_to_do2 ON detail_job_to_do.id_job_to_do = job_to_do2.id_job_to_do
			WHERE nama_engineer='$nama_engineer' and datetime_open
			BETWEEN  '$tgl_awal'
			AND  '$tgl_akhir'
			GROUP BY nama_engineer";

			} else {
			 
						$sql = "SELECT engineer.nama_engineer, SUM( 
			CASE WHEN tipe_pekerjaan LIKE  'Troubleshooting%'
			THEN 1 
			ELSE 0 
			END ) AS jumlah_troubleshooting, SUM( 
			CASE WHEN tipe_pekerjaan =  'Install'
			THEN 1 
			ELSE 0 
			END ) AS jumlah_install, SUM( 
			CASE WHEN tipe_pekerjaan =  'Maintenance'
			THEN 1 
			ELSE 0 
			END ) AS jumlah_maintenance, SUM( 
			CASE WHEN tipe_pekerjaan =  'Backup/Restore'
			THEN 1 
			ELSE 0 
			END ) AS jumlah_backuprestore, SUM( 
			CASE WHEN tipe_pekerjaan =  'Other'
			THEN 1 
			ELSE 0 
			END ) AS jumlah_other
			FROM detail_job_to_do
			INNER JOIN engineer ON detail_job_to_do.id_engineer = engineer.id_engineer
			INNER JOIN job_to_do2 ON detail_job_to_do.id_job_to_do = job_to_do2.id_job_to_do
			WHERE datetime_open='$tgl'
			GROUP BY nama_engineer";

            }

            $hasil = mysql_query($sql); 
            ?>

            <table data-toggle="table" data-url="tables/data1.json"  data-show-refresh="false" data-show-toggle="false" data-show-columns="false" data-search="false" data-select-item-name="toolbar1" data-pagination="false" >
                            <thead>
                            <tr>
                                <th data-field="itemid"  data-filter-control="input">No</th>
                                <th data-field="nama_engineer"  data-filter-control="input">Nama Engineer</th>
                                <th data-field="jumlah_troubleshooting"  data-filter-control="input">Troubleshooting</th>
                                <th data-field="jumlah_install" data-filter-control="input">Install</th>
                                <th data-field="jumlah_maintenance" data-filter-control="input">Maintenance</th>
                                <th data-field="jumlah_backuprestore" data-filter-control="input">Backup/Restore</th> 
                                <th data-field="jumlah_other" data-sortable="true">Other</th>
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
                              <td data-field="jumlah_troubleshooting" data-sortable="true"><?php echo $record['jumlah_troubleshooting'];?></td>
                              <td data-field="jumlah_install" data-sortable="true"><?php echo $record['jumlah_install'];?></td>
                              <td data-field="jumlah_maintenance" data-sortable="true"><?php echo $record['jumlah_maintenance'];?></td>
                              <td data-field="jumlah_backuprestore" data-sortable="true"><?php echo $record['jumlah_backuprestore'];?></td>
                              <td data-field="jumlah_other" data-sortable="true"><?php echo $record['jumlah_other'];?></td>
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