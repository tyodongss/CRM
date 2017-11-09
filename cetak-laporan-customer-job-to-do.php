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
            <center><h1 class="page-header">Laporan Job to Do Customer</h1></center>
            
            <?php
            include "koneksi.php";

            $tgl_awal =$_POST['tgl_awal'];
            $tgl_akhir = $_POST['tgl_akhir'];
            $nama = $_POST['nama'];

            ?>
      <center><h5>Periode tanggal <b><?php echo $tgl_awal;?></b> sampai <b><?php echo $tgl_akhir;?></b></h5></center>
      <?php

            if ($nama=="All"){
            $sql = "SELECT job_to_do2.swos, job_to_do2.id_owner, owner.nama_owner, job_to_do2.datetime_open, job_to_do2.datetime_finish, job_to_do2.tipe_pekerjaan, job_to_do2.priority_pekerjaan, job_to_do2.scope_pekerjaan, job_to_do2.keterangan_pekerjaan, job_to_do2.status_charge, job_to_do2.status_jobtodo, job_to_do2.created_at, job_to_do2.updated_at, job_to_do2.deleted_at, customer.nama, terima_pekerjaan.nama_terima_pekerjaan, detail_pekerjaan.nama_detail_pekerjaan, timediff(job_to_do2.datetime_finish, job_to_do2.datetime_open) as duration, job_to_do2.remark
              FROM job_to_do2
              JOIN customer ON job_to_do2.id_customer = customer.id_customer
              JOIN terima_pekerjaan ON job_to_do2.id_terima_pekerjaan = terima_pekerjaan.id_terima_pekerjaan
              JOIN detail_pekerjaan ON job_to_do2.id_detail_pekerjaan = detail_pekerjaan.id_detail_pekerjaan 
              JOIN owner ON job_to_do2.id_owner = owner.id_owner             
              AND datetime_open
              BETWEEN  '$tgl_awal'
              AND  '$tgl_akhir'
              ORDER BY job_to_do2.id_job_to_do DESC";

                

            } else if ($nama="$nama") {
             $sql = "SELECT job_to_do2.swos, job_to_do2.id_owner, owner.nama_owner, job_to_do2.datetime_open, job_to_do2.datetime_finish, job_to_do2.tipe_pekerjaan, job_to_do2.priority_pekerjaan, job_to_do2.scope_pekerjaan, job_to_do2.keterangan_pekerjaan, job_to_do2.status_charge, job_to_do2.status_jobtodo, job_to_do2.created_at, job_to_do2.updated_at, job_to_do2.deleted_at, customer.nama, terima_pekerjaan.nama_terima_pekerjaan, detail_pekerjaan.nama_detail_pekerjaan, timediff(job_to_do2.datetime_finish, job_to_do2.datetime_open) as duration, job_to_do2.remark
               FROM job_to_do2
               JOIN customer ON job_to_do2.id_customer = customer.id_customer
               JOIN terima_pekerjaan ON job_to_do2.id_terima_pekerjaan = terima_pekerjaan.id_terima_pekerjaan
               JOIN detail_pekerjaan ON job_to_do2.id_detail_pekerjaan = detail_pekerjaan.id_detail_pekerjaan
               JOIN owner ON job_to_do2.id_owner = owner.id_owner
               AND nama = '$nama'
			   AND datetime_open
               BETWEEN  '$tgl_awal'
               AND  '$tgl_akhir'
               ORDER BY job_to_do2.id_job_to_do DESC";
            }

            else {
             $sql = "SELECT job_to_do2.swos, job_to_do2.id_id_owner, id_owner.nama_id_owner, job_to_do2.datetime_open, job_to_do2.datetime_finish, job_to_do2.tipe_pekerjaan, job_to_do2.priority_pekerjaan, job_to_do2.scope_pekerjaan, job_to_do2.keterangan_pekerjaan, job_to_do2.status_charge, job_to_do2.status_jobtodo, job_to_do2.created_at, job_to_do2.updated_at, job_to_do2.deleted_at, customer.nama, terima_pekerjaan.nama_terima_pekerjaan, detail_pekerjaan.nama_detail_pekerjaan, timediff(job_to_do2.datetime_finish, job_to_do2.datetime_open) as duration, job_to_do2.remark
               FROM job_to_do2
               JOIN customer ON job_to_do2.id_customer = customer.id_customer
               JOIN terima_pekerjaan ON job_to_do2.id_terima_pekerjaan = terima_pekerjaan.id_terima_pekerjaan
               JOIN detail_pekerjaan ON job_to_do2.id_detail_pekerjaan = detail_pekerjaan.id_detail_pekerjaan
               JOIN owner ON job_to_do2.id_owner = owner.id_owner
               AND datetime_open='$tgl'
               ORDER BY job_to_do2.id_job_to_do DESC";
            }

            $hasil = mysql_query($sql); 
            ?>

            <table data-toggle="table" data-url="tables/data1.json"  data-show-refresh="false" data-show-toggle="false" data-show-columns="false" data-search="false" data-select-item-name="toolbar1" data-pagination="false" >
                            <thead>
                            <tr>
                                <th data-field="itemid"  data-filter-control="input">No</th>
                                <th data-field="swos"  data-filter-control="input">SWOS</th>
                                <th data-field="id_owner"  data-filter-control="input">Owner</th>
                                <th data-field="nama"  data-filter-control="input">Nama Customer</th>
                                <th data-field="nama_terima_pekerjaan" data-filter-control="input">Terima Pekerjaan</th>
                                <th data-field="datetime_open" data-filter-control="input">Date Time Open</th>
                                <th data-field="datetime_finish" data-filter-control="input">Date Time Finish</th>
                                <th data-field="duration" data-filter-control="input">Duration</th>
                                <th data-field="tipe_pekerjaan" data-sortable="true">Tipe Pekerjaan</th>                               
                                <th data-field="priority_pekerjaan"  data-filter-control="input">Priority Pekerjaan</th>
                                <th data-field="scope_pekerjaan"  data-filter-control="input">Scope Pekerjaan</th>
                                <th data-field="nama_detail_pekerjaan"  data-filter-control="input">Nama Detail Pekerjaan</th>
                                <th data-field="keterangan_pekerjaan"  data-filter-control="input">Keterangan Pekerjaan</th>
                                <th data-field="status_charge"  data-filter-control="input">Status Charge</th>
                                <th data-field="status_jobtodo"  data-filter-control="input">Status Job to Do</th>
                                <th data-field="remark"  data-filter-control="input">Remark</th>
                                
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
                                <td data-field="id_owner" data-sortable="true"><?php echo $record['nama_owner'];?></td>
                                <td data-field="nama" data-sortable="true"><?php echo $record['nama'];?></td>
                                <td data-field="nama_terima_pekerjaan" data-sortable="true"><?php echo $record['nama_terima_pekerjaan'];?></td>
                                <td data-field="datetime_open" data-sortable="true"><?php echo $record['datetime_open'];?></td>
                                <td data-field="datetime_finish" data-sortable="true"><?php echo $record['datetime_finish'];?></td>
                                <td data-field="duration" data-sortable="true"><?php echo $record['duration'];?></td>
                                <td data-field="tipe_pekerjaan" data-sortable="true"><?php echo $record['tipe_pekerjaan'];?></td>
                                <td data-field="prority_pekerjaan" data-sortable="true"><?php echo $record['priority_pekerjaan'];?></td> 
                                <td data-field="scope_pekerjaan" data-sortable="true"><?php echo $record['scope_pekerjaan'];?></td>
                                <td data-field="nama_detail_pekerjaan" data-sortable="true"><?php echo $record['nama_detail_pekerjaan'];?></td>
                                <td data-field="keterangan_pekerjaan" data-sortable="true"><?php echo $record['keterangan_pekerjaan'];?></td>
                                <td data-field="status_charge" data-sortable="true"><?php echo $record['status_charge'];?></td>
                                <td data-field="status_jobtodo" data-sortable="true"><?php echo $record['status_jobtodo'];?></td>
                                <td data-field="remark" data-sortable="true"><?php echo $record['remark'];?></td>
                            </tr>
<?php
}
?>  
                                                
                            </tbody>
                        </table>

                        <?php

      if ($nama=="All"){
       $query = mysql_query("SELECT job_to_do2.swos, job_to_do2.datetime_open, job_to_do2.datetime_finish, job_to_do2.tipe_pekerjaan, job_to_do2.priority_pekerjaan, job_to_do2.scope_pekerjaan, job_to_do2.keterangan_pekerjaan, job_to_do2.status_charge, job_to_do2.status_jobtodo, job_to_do2.created_at, job_to_do2.updated_at, job_to_do2.deleted_at, customer.nama, terima_pekerjaan.nama_terima_pekerjaan, detail_pekerjaan.nama_detail_pekerjaan, tipe_pekerjaan, COUNT( * ) AS total_tipe_pekerjaan
              FROM job_to_do2
              JOIN customer ON job_to_do2.id_customer = customer.id_customer
              JOIN terima_pekerjaan ON job_to_do2.id_terima_pekerjaan = terima_pekerjaan.id_terima_pekerjaan
              JOIN detail_pekerjaan ON job_to_do2.id_detail_pekerjaan = detail_pekerjaan.id_detail_pekerjaan              
              AND datetime_open
              BETWEEN  '$tgl_awal'
              AND  '$tgl_akhir'
              GROUP BY tipe_pekerjaan DESC");
      }

       else if ($nama=="$nama"){
       $query = mysql_query("SELECT job_to_do2.swos, job_to_do2.datetime_open, job_to_do2.datetime_finish, job_to_do2.tipe_pekerjaan, job_to_do2.priority_pekerjaan, job_to_do2.scope_pekerjaan, job_to_do2.keterangan_pekerjaan, job_to_do2.status_charge, job_to_do2.status_jobtodo, job_to_do2.created_at, job_to_do2.updated_at, job_to_do2.deleted_at, customer.nama, terima_pekerjaan.nama_terima_pekerjaan, detail_pekerjaan.nama_detail_pekerjaan, tipe_pekerjaan, COUNT( * ) AS total_tipe_pekerjaan
              FROM job_to_do2
              JOIN customer ON job_to_do2.id_customer = customer.id_customer
              JOIN terima_pekerjaan ON job_to_do2.id_terima_pekerjaan = terima_pekerjaan.id_terima_pekerjaan
              JOIN detail_pekerjaan ON job_to_do2.id_detail_pekerjaan = detail_pekerjaan.id_detail_pekerjaan
              AND nama = '$nama'
			  AND datetime_open
              BETWEEN  '$tgl_awal'
              AND  '$tgl_akhir'
              GROUP BY tipe_pekerjaan DESC");
      }


        
      ?>
            <br>
      <table class="table"> 
              <thead>
                <tr>
                  <th width="20%" data-field="tipe_pekerjaan" data-sortable="true">Tipe Pekerjaan</th>
                  <th width="80%" data-field="total_tipe_pekerjaan" data-sortable="true">Total Tipe Pekerjaan</th>
                <?php while($record2 = mysql_fetch_array($query)){ ?>
                            </tr>
                  <tr>                    
                    <td><?php echo $record2['tipe_pekerjaan'];?></td>
                    <td><?php echo $record2['total_tipe_pekerjaan'];?></td>
                  </tr>
                <? } ?>
              </thead>
      </table>

      <?php 
       if ($nama=="All"){
       $query2 = mysql_query("SELECT job_to_do2.swos, job_to_do2.datetime_open, job_to_do2.datetime_finish, job_to_do2.tipe_pekerjaan, job_to_do2.priority_pekerjaan, job_to_do2.scope_pekerjaan, job_to_do2.keterangan_pekerjaan, job_to_do2.status_charge, job_to_do2.status_jobtodo, job_to_do2.created_at, job_to_do2.updated_at, job_to_do2.deleted_at, customer.nama, terima_pekerjaan.nama_terima_pekerjaan, detail_pekerjaan.nama_detail_pekerjaan, nama_terima_pekerjaan, COUNT( * ) AS total_nama_terima_pekerjaan
              FROM job_to_do2
              JOIN customer ON job_to_do2.id_customer = customer.id_customer
              JOIN terima_pekerjaan ON job_to_do2.id_terima_pekerjaan = terima_pekerjaan.id_terima_pekerjaan
              JOIN detail_pekerjaan ON job_to_do2.id_detail_pekerjaan = detail_pekerjaan.id_detail_pekerjaan              
              AND datetime_open
              BETWEEN  '$tgl_awal'
              AND  '$tgl_akhir'
              GROUP BY nama_terima_pekerjaan DESC");
      }

      else if ($nama=="$nama"){
       $query2 = mysql_query("SELECT job_to_do2.swos, job_to_do2.datetime_open, job_to_do2.datetime_finish, job_to_do2.tipe_pekerjaan, job_to_do2.priority_pekerjaan, job_to_do2.scope_pekerjaan, job_to_do2.keterangan_pekerjaan, job_to_do2.status_charge, job_to_do2.status_jobtodo, job_to_do2.created_at, job_to_do2.updated_at, job_to_do2.deleted_at, customer.nama, terima_pekerjaan.nama_terima_pekerjaan, detail_pekerjaan.nama_detail_pekerjaan, nama_terima_pekerjaan, COUNT( * ) AS total_nama_terima_pekerjaan
              FROM job_to_do2
              JOIN customer ON job_to_do2.id_customer = customer.id_customer
              JOIN terima_pekerjaan ON job_to_do2.id_terima_pekerjaan = terima_pekerjaan.id_terima_pekerjaan
              JOIN detail_pekerjaan ON job_to_do2.id_detail_pekerjaan = detail_pekerjaan.id_detail_pekerjaan
              AND nama = '$nama'
			  AND datetime_open
              BETWEEN  '$tgl_awal'
              AND  '$tgl_akhir'
              GROUP BY nama_terima_pekerjaan DESC");
      }
              
      ?>
            <br>
      <table class="table"> 
              <thead>
                <tr>
                  <th width="20%" data-field="nama_terima_pekerjaan" data-sortable="true">Nama Terima Pekerjaan</th>
                  <th width="80%" data-field="total_nama_terima_pekerjaan" data-sortable="true">Total Nama Terima Pekerjaan</th>
                <?php while($record3 = mysql_fetch_array($query2)){ ?>
                            </tr>
                  <tr>                    
                    <td><?php echo $record3['nama_terima_pekerjaan'];?></td>
                    <td><?php echo $record3['total_nama_terima_pekerjaan'];?></td>
                  </tr>
                <? } ?>
              </thead>
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
