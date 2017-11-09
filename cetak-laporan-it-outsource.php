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
            <center><h1 class="page-header">Laporan IT Outsource</h1></center>
            
            <?php
            include "koneksi.php";

            $tgl=$_POST['date'];
            $tgl_awal =$_POST['tgl_awal'];
            $tgl_akhir = $_POST['tgl_akhir'];
            $nama = $_POST['nama'];

            ?>
      <center><h5>Periode tanggal <b><?php echo $tgl_awal;?></b> sampai <b><?php echo $tgl_akhir;?></b></h5></center>
      <?php

            if ($nama=="$nama"){
 
            $sql = "SELECT customer.nama, engineer.nama_engineer, it_outsource.nama_user, it_outsource.complain_via, it_outsource.datetime_start, it_outsource.datetime_end, it_outsource.tipe_pekerjaan, it_outsource.priority_pekerjaan, it_outsource.scope_pekerjaan, detail_pekerjaan.nama_detail_pekerjaan, it_outsource.keterangan_pekerjaan,TIMEDIFF( datetime_end, datetime_start ) AS duration FROM it_outsource, customer, engineer, detail_pekerjaan WHERE it_outsource.id_customer = customer.id_customer AND it_outsource.id_engineer = engineer.id_engineer AND it_outsource.id_detail_pekerjaan = detail_pekerjaan.id_detail_pekerjaan AND nama =  '$nama' AND datetime_start BETWEEN  '$tgl_awal' AND  '$tgl_akhir' ORDER BY id_it_outsource DESC ";

            } else {
            $sql = "SELECT customer.nama, engineer.nama_engineer, it_outsource.nama_user, it_outsource.complain_via, it_outsource.datetime_start, it_outsource.datetime_end, it_outsource.tipe_pekerjaan, it_outsource.priority_pekerjaan, it_outsource.scope_pekerjaan, detail_pekerjaan.nama_detail_pekerjaan, it_outsource.keterangan_pekerjaan,TIMEDIFF( datetime_end, datetime_start ) AS duration FROM it_outsource, customer, engineer, detail_pekerjaan WHERE it_outsource.id_customer = customer.id_customer AND it_outsource.id_engineer = engineer.id_engineer AND it_outsource.id_detail_pekerjaan = detail_pekerjaan.id_detail_pekerjaan AND datetime_start BETWEEN  '$tgl_awal' AND  '$tgl_akhir' ORDER BY id_it_outsource DESC";

            }

            $hasil = mysql_query($sql); 
            ?>

            <table data-toggle="table" data-url="tables/data1.json"  data-show-refresh="false" data-show-toggle="false" data-show-columns="false" data-search="false" data-select-item-name="toolbar1" data-pagination="false" >
                            <thead>
                            <tr>
                                <th data-field="itemid"  data-sortable="true">No</th>
                                <th data-field="nama"  data-filter-control="input">Nama Customer</th>
                                <th data-field="nama_engineer"  data-filter-control="input">Nama Engineer</th>
								<th data-field="nama_user"  data-filter-control="input">Nama User</th>
                                <th data-field="complain_via"  data-filter-control="input">Complain Via</th>
                                <th data-field="tipe_pekerjaan"  data-filter-control="input">Tipe Pekerjaan</th>
                                <th data-field="datetime_start" data-filter-control="input">Date Time Start</th>
                                <th data-field="datetime_end" data-filter-control="input">Date Time End</th>
                                <th data-field="duration" data-sortable="true">Duration</th>
                                <th data-field="priority_pekerjaan" data-filter-control="input">Priority Pekerjaan</th>
                                <th data-field="scope_pekerjaan"  data-filter-control="input">Scope Pekerjaan</th>
                                <th data-field="detail_pekerjaan"  data-filter-control="input">Detail Pekerjaan</th>
                                <th data-field="keterangan_pekerjaan"  data-filter-control="input">Keterangan Pekerjaan</th>
                                
                            </tr>
                            </thead>
                            <tbody>
<?php                       
$no=0;
while($record = mysql_fetch_array($hasil)){
?>
                           <tr>
                                <td data-field="itemid" data-sortable="true"><?php echo $no=$no+1;?></td>
                                <td data-field="nama" data-sortable="true"><?php echo $record['nama'];?></td>
                                <td data-field="nama_engineer" data-sortable="true"><?php echo $record['nama_engineer'];?></td>
								<td data-field="nama_user" data-sortable="true"><?php echo $record['nama_user'];?></td>
                                <td data-field="complain_via" data-sortable="true"><?php echo $record['complain_via'];?></td>
                                <td data-field="tipe_pekerjaan" data-sortable="true"><?php echo $record['tipe_pekerjaan'];?></td>
                                <td data-field="datetime_start" data-sortable="true"><?php echo $record['datetime_start'];?></td>
                                <td data-field="datetime_end" data-sortable="true"><?php echo $record['datetime_end'];?></td>
                                <td data-field="duration" data-sortable="true"><?php echo $record['duration'];?></td>
                                <td data-field="priority_pekerjaan" data-sortable="true"><?php echo $record['priority_pekerjaan'];?></td>
                                <td data-field="scope_pekerjaan" data-sortable="true"><?php echo $record['scope_pekerjaan'];?></td>
                                <td data-field="detail_pekerjaan" data-sortable="true"><?php echo $record['nama_detail_pekerjaan'];?></td>
                                <td data-field="keterangan_pekerjaan" data-sortable="true"><?php echo $record['keterangan_pekerjaan'];?></td>
                            </tr>
<?php
}
?>  
                                                
                            </tbody>
                        </table>

      <?php
      
      if ($nama=="$nama"){
      $query = mysql_query("SELECT it_outsource.id_it_outsource, it_outsource.id_customer, it_outsource.nama_user, it_outsource.complain_via, it_outsource.datetime_start, it_outsource.datetime_end, it_outsource.tipe_pekerjaan, it_outsource.priority_pekerjaan, it_outsource.scope_pekerjaan, it_outsource.id_detail_pekerjaan, it_outsource.keterangan_pekerjaan, customer.nama, complain_via, COUNT( * ) AS total_complain FROM it_outsource, customer WHERE it_outsource.id_customer = customer.id_customer AND nama =  '$nama' AND datetime_start BETWEEN  '$tgl_awal' AND  '$tgl_akhir' GROUP BY complain_via");

      } ?>

      <br>
      <table class="table"> 
              <thead>
                <tr>
                  <th width="10%" data-field="complain_via" data-sortable="true">Complain Via</th>
                  <th width="80%" data-field="total_complain" data-sortable="true">Total Complain Via</th>
                <?php while($record2 = mysql_fetch_array($query)){ ?>
                            </tr>
                  <tr>                    
                    <td><?php echo $record2['complain_via'];?></td>
                    <td><?php echo $record2['total_complain'];?></td>
                  </tr>
                <? } ?>
              </thead>
      </table>
      
      <?php
      if ($nama=="$nama"){
      $query2 = mysql_query("SELECT it_outsource.id_it_outsource, it_outsource.id_customer, it_outsource.nama_user, it_outsource.complain_via, it_outsource.datetime_start, it_outsource.datetime_end, it_outsource.tipe_pekerjaan, it_outsource.priority_pekerjaan, it_outsource.scope_pekerjaan, it_outsource.id_detail_pekerjaan, it_outsource.keterangan_pekerjaan, customer.nama, detail_pekerjaan.nama_detail_pekerjaan, nama_detail_pekerjaan, COUNT( * ) AS total_detail FROM it_outsource, customer,detail_pekerjaan WHERE it_outsource.id_customer = customer.id_customer AND it_outsource.id_detail_pekerjaan=detail_pekerjaan.id_detail_pekerjaan AND nama =  '$nama' AND datetime_start BETWEEN  '$tgl_awal' AND  '$tgl_akhir' GROUP BY nama_detail_pekerjaan");
      }  
     
      ?>
      
      <br>
      <table class="table"> 
              <thead>
                <tr>
                  <th width="10%" data-field="nama_detail_pekerjaan" data-sortable="true">Detail Pekerjaan</th>
                  <th width="80%" data-field="total_detail" data-sortable="true">Total Detail Pekerjaan</th>
                <?php while($record3 = mysql_fetch_array($query2)){ ?>
                            </tr>
                  <tr>                    
                    <td><?php echo $record3['nama_detail_pekerjaan'];?></td>
                    <td><?php echo $record3['total_detail'];?></td>
                  </tr>
                <? } ?>
                
            </thead>
          </table>

       <?php
       $query3 = mysql_query("SELECT it_outsource.id_it_outsource, it_outsource.id_customer, it_outsource.nama_user, it_outsource.complain_via, it_outsource.datetime_start, it_outsource.datetime_end, it_outsource.tipe_pekerjaan, it_outsource.priority_pekerjaan, it_outsource.scope_pekerjaan, it_outsource.id_detail_pekerjaan, it_outsource.keterangan_pekerjaan, customer.nama, TIMEDIFF( datetime_end, datetime_start ) AS duration, nama, count(*) as 1jam FROM it_outsource, customer WHERE it_outsource.id_customer = customer.id_customer AND nama='$nama' AND TIMEDIFF(datetime_end, datetime_start) < '01:00:00' AND datetime_start BETWEEN  '$tgl_awal' AND  '$tgl_akhir' group by nama");
       ?>
       <br>
      <table class="table"> 
              <thead>
                <tr>
                  <th width="10%" data-field="solving_time" data-sortable="true">Solving Time</th>
                  <th width="80%" data-field="1jam" data-sortable="true">Total</th>
                <?php while($record4 = mysql_fetch_array($query3)){ ?>
                            </tr>
                  <tr>                    
                    <td>Dibawah 1 jam</td>
                    <td><?php echo $record4['1jam'];?></td>
                  </tr>
                <? } ?>
                
            </thead>
          </table>

       <?php
       $query4 = mysql_query("SELECT it_outsource.id_it_outsource, it_outsource.id_customer, it_outsource.nama_user, it_outsource.complain_via, it_outsource.datetime_start, it_outsource.datetime_end, it_outsource.tipe_pekerjaan, it_outsource.priority_pekerjaan, it_outsource.scope_pekerjaan, it_outsource.id_detail_pekerjaan, it_outsource.keterangan_pekerjaan, customer.nama, TIMEDIFF( datetime_end, datetime_start ) AS duration, nama, count(*) as 1_2jam FROM it_outsource, customer WHERE it_outsource.id_customer = customer.id_customer AND nama='$nama' AND TIMEDIFF(datetime_end, datetime_start) between '01:00:00' AND '02:00:00' AND datetime_start BETWEEN  '$tgl_awal' AND  '$tgl_akhir' group by nama");
       ?>
       
      <table class="table"> 
              <thead>
                
                <?php while($record5 = mysql_fetch_array($query4)){ ?>
                            
                  <tr>                    
                    <td width="11%">1 - 2 jam</td>
                    <td><?php echo $record5['1_2jam'];?></td>
                  </tr>
                <? } ?>
                
            </thead>
          </table>

          <?php
       $query5 = mysql_query("SELECT it_outsource.id_it_outsource, it_outsource.id_customer, it_outsource.nama_user, it_outsource.complain_via, it_outsource.datetime_start, it_outsource.datetime_end, it_outsource.tipe_pekerjaan, it_outsource.priority_pekerjaan, it_outsource.scope_pekerjaan, it_outsource.id_detail_pekerjaan, it_outsource.keterangan_pekerjaan, customer.nama, TIMEDIFF( datetime_end, datetime_start ) AS duration, nama, count(*) as 2_4jam FROM it_outsource, customer WHERE it_outsource.id_customer = customer.id_customer AND nama='$nama' AND TIMEDIFF(datetime_end, datetime_start) between '02:01:00' AND '04:00:00' AND datetime_start BETWEEN  '$tgl_awal' AND  '$tgl_akhir' group by nama");
       ?>
       
      <table class="table"> 
              <thead>
                
                <?php while($record6 = mysql_fetch_array($query5)){ ?>
                            
                  <tr>                    
                    <td width="11%">2 - 4 jam</td>
                    <td><?php echo $record6['2_4jam'];?></td>
                  </tr>
                <? } ?>
                
            </thead>
          </table>

          <?php
       $query6 = mysql_query("SELECT it_outsource.id_it_outsource, it_outsource.id_customer, it_outsource.nama_user, it_outsource.complain_via, it_outsource.datetime_start, it_outsource.datetime_end, it_outsource.tipe_pekerjaan, it_outsource.priority_pekerjaan, it_outsource.scope_pekerjaan, it_outsource.id_detail_pekerjaan, it_outsource.keterangan_pekerjaan, customer.nama, TIMEDIFF( datetime_end, datetime_start ) AS duration, nama, count(*) as 4_8jam FROM it_outsource, customer WHERE it_outsource.id_customer = customer.id_customer AND nama='$nama' AND TIMEDIFF(datetime_end, datetime_start) between '04:01:00' AND '08:00:00' AND datetime_start BETWEEN  '$tgl_awal' AND  '$tgl_akhir' group by nama");
       ?>
       
      <table class="table"> 
              <thead>
                
                <?php while($record7 = mysql_fetch_array($query6)){ ?>
                            
                  <tr>                    
                    <td width="11%">4 - 8 jam</td>
                    <td><?php echo $record7['4_8jam'];?></td>
                  </tr>
                <? } ?>
                
            </thead>
          </table>

          <?php
       $query7 = mysql_query("SELECT it_outsource.id_it_outsource, it_outsource.id_customer, it_outsource.nama_user, it_outsource.complain_via, it_outsource.datetime_start, it_outsource.datetime_end, it_outsource.tipe_pekerjaan, it_outsource.priority_pekerjaan, it_outsource.scope_pekerjaan, it_outsource.id_detail_pekerjaan, it_outsource.keterangan_pekerjaan, customer.nama, TIMEDIFF( datetime_end, datetime_start ) AS duration, nama, count(*) as 8_16jam FROM it_outsource, customer WHERE it_outsource.id_customer = customer.id_customer AND nama='$nama' AND TIMEDIFF(datetime_end, datetime_start) between '08:01:00' AND '16:00:00' AND datetime_start BETWEEN  '$tgl_awal' AND  '$tgl_akhir' group by nama");
       ?>
       
      <table class="table"> 
              <thead>
                
                <?php while($record8 = mysql_fetch_array($query7)){ ?>
                            
                  <tr>                    
                    <td width="11%">8 - 16 jam</td>
                    <td><?php echo $record8['8_16jam'];?></td>
                  </tr>
                <? } ?>
                
            </thead>
          </table>

          <?php
       $query7 = mysql_query("SELECT it_outsource.id_it_outsource, it_outsource.id_customer, it_outsource.nama_user, it_outsource.complain_via, it_outsource.datetime_start, it_outsource.datetime_end, it_outsource.tipe_pekerjaan, it_outsource.priority_pekerjaan, it_outsource.scope_pekerjaan, it_outsource.id_detail_pekerjaan, it_outsource.keterangan_pekerjaan, customer.nama, TIMEDIFF( datetime_end, datetime_start ) AS duration, nama, count(*) as 16_24jam FROM it_outsource, customer WHERE it_outsource.id_customer = customer.id_customer AND nama='$nama' AND TIMEDIFF(datetime_end, datetime_start) between '16:01:00' AND '24:00:00' AND datetime_start BETWEEN  '$tgl_awal' AND  '$tgl_akhir' group by nama");
       ?>
       
      <table class="table"> 
              <thead>
                
                <?php while($record8 = mysql_fetch_array($query7)){ ?>
                            
                  <tr>                    
                    <td width="11%">16 - 24 jam</td>
                    <td><?php echo $record8['16_24jam'];?></td>
                  </tr>
                <? } ?>
                
            </thead>
          </table>

          <?php
       $query8 = mysql_query("SELECT it_outsource.id_it_outsource, it_outsource.id_customer, it_outsource.nama_user, it_outsource.complain_via, it_outsource.datetime_start, it_outsource.datetime_end, it_outsource.tipe_pekerjaan, it_outsource.priority_pekerjaan, it_outsource.scope_pekerjaan, it_outsource.id_detail_pekerjaan, it_outsource.keterangan_pekerjaan, customer.nama, TIMEDIFF( datetime_end, datetime_start ) AS duration, nama, count(*) as 24_48jam FROM it_outsource, customer WHERE it_outsource.id_customer = customer.id_customer AND nama='$nama' AND TIMEDIFF(datetime_end, datetime_start) between '24:01:00' AND '48:00:00' AND datetime_start BETWEEN  '$tgl_awal' AND  '$tgl_akhir' group by nama");
       ?>
       
      <table class="table"> 
              <thead>
                
                <?php while($record9 = mysql_fetch_array($query8)){ ?>
                            
                  <tr>                    
                    <td width="11%">24 - 48 jam</td>
                    <td><?php echo $record9['24_48jam'];?></td>
                  </tr>
                <? } ?>
                
            </thead>
          </table>

          <?php
       $query9 = mysql_query("SELECT it_outsource.id_it_outsource, it_outsource.id_customer, it_outsource.nama_user, it_outsource.complain_via, it_outsource.datetime_start, it_outsource.datetime_end, it_outsource.tipe_pekerjaan, it_outsource.priority_pekerjaan, it_outsource.scope_pekerjaan, it_outsource.id_detail_pekerjaan, it_outsource.keterangan_pekerjaan, customer.nama, TIMEDIFF( datetime_end, datetime_start ) AS duration, nama, count(*) as 48jam FROM it_outsource, customer WHERE it_outsource.id_customer = customer.id_customer AND nama='$nama' AND TIMEDIFF(datetime_end, datetime_start) > '48:00:00' AND datetime_start BETWEEN  '$tgl_awal' AND  '$tgl_akhir' group by nama");
       ?>
       
      <table class="table"> 
              <thead>
                
                <?php while($record10 = mysql_fetch_array($query9)){ ?>
                            
                  <tr>                    
                    <td width="11%">Diatas 48  jam</td>
                    <td><?php echo $record10['48jam'];?></td>
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