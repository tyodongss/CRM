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
            <center><h1 class="page-header">Laporan Status Customer</h1></center>
            <?php
            include "koneksi.php";

            $status = $_POST['status'];
            
                if ($status=="All"){
                $sql2 = "SELECT customer.id_customer, customer.nama, customer.alamat, customer.no_telp, customer.contact_person_1, customer.hp_1, customer.email_1, customer.contact_person_2, customer.hp_2, customer.email_2, customer.id_service, customer.id_bandwidth_down, customer.id_bandwidth_up, customer.tanggal_aktivasi, customer.tanggal_terminasi, customer.monthly_fee_idr, customer.monthly_fee_usd, customer.status, customer.remark, customer.created_at, customer.updated_at, customer.deleted_at, service.nama_service, bandwidth_down.nama_bandwidth_down, bandwidth_up.nama_bandwidth_up
                  FROM customer, service, bandwidth_down, bandwidth_up
                  WHERE customer.id_service = service.id_service
                  AND customer.id_bandwidth_down = bandwidth_down.id_bandwidth_down
                  AND customer.id_bandwidth_up = bandwidth_up.id_bandwidth_up
                  AND customer.deleted_at is NULL
                  ORDER BY nama ASC";

              } else if ($status=="$status"){
                $sql2 = "SELECT customer.id_customer, customer.nama, customer.alamat, customer.no_telp, customer.contact_person_1, customer.hp_1, customer.email_1, customer.contact_person_2, customer.hp_2, customer.email_2, customer.id_service, customer.id_bandwidth_down, customer.id_bandwidth_up, customer.tanggal_aktivasi, customer.tanggal_terminasi, customer.monthly_fee_idr, customer.monthly_fee_usd, customer.status, customer.remark, customer.created_at, customer.updated_at, customer.deleted_at, service.nama_service, bandwidth_down.nama_bandwidth_down, bandwidth_up.nama_bandwidth_up
                  FROM customer, service, bandwidth_down, bandwidth_up
                  WHERE status =  '$status'
                  AND customer.id_service = service.id_service
                  AND customer.id_bandwidth_down = bandwidth_down.id_bandwidth_down
                  AND customer.id_bandwidth_up = bandwidth_up.id_bandwidth_up
                  AND customer.deleted_at is NULL
                  ORDER BY nama ASC";

                } 
            
            $hasil2 = mysql_query($sql2); 
        ?>
            
<table data-toggle="table" data-url="tables/data1.json"  data-show-refresh="false" data-show-toggle="false" data-show-columns="false" data-search="false" data-select-item-name="toolbar1" data-pagination="false">
                            <thead>
                            <tr>
                                <th data-field="itemid" data-sortable="true">No</th>
                                <th data-field="nama"  data-sortable="true">Nama Customer</th>
                                <th data-field="alamat" data-sortable="true">Alamat</th>
                                <th data-field="no_telp" data-sortable="true">No. Telepone</th>
                                <th data-field="contact_person_1" data-sortable="true">Contact Person 1</th>
                                <th data-field="hp_1" data-sortable="true">HP 1</th>
                                <th data-field="email_1"  data-sortable="true">Email 1</th>
                                <th data-field="contact_person_2" data-sortable="true">Contact Person 2</th>
                                <th data-field="hp_2" data-sortable="true">HP 2</th>
                                <th data-field="email_2" data-sortable="true">Email 2</th>
                                <th data-field="nama_service" data-sortable="true">Nama Service</th>
                                <th data-field="nama_bandwidth_down" data-sortable="true">Nama Bandwidth Down </th>
                                <th data-field="nama_bandwidth_up" data-sortable="true">Nama Bandwidth Up</th>
                                <th data-field="tanggal_aktivasi" data-sortable="true">Tanggal Aktivasi</th>
                                <th data-field="tanggal_terminasi" data-sortable="true">Tanggal Terminasi</th>
                                <th data-field="monthy_fee_idr" data-sortable="true">Monthly Fee IDR</th>
                                <th data-field="monthly_fee_usd" data-sortable="true">Monthly Fee USD</th>
                                <th data-field="status" data-sortable="true">Status</th>
                                <th data-field="remark" data-sortable="true">Remark</th>
                            </tr>
                            </thead>
                            <tbody>
<?php                       
$no=0;
while($record2 = mysql_fetch_array($hasil2)){
?>
                           <tr>
                                <td data-field="itemid" data-sortable="true"><?php echo $no=$no+1;?></td>
                                <td data-field="nama" data-sortable="true"><?php echo $record2['nama'];?></td>
                                <td data-field="alamat" data-sortable="true"><?php echo $record2['alamat'];?></td>
                                <td data-field="no_telp" data-sortable="true"><?php echo $record2['no_telp'];?></td>
                                <td data-field="contact_person_1" data-sortable="true"><?php echo $record2['contact_person_1'];?></td>
                                <td data-field="hp_1" data-sortable="true"><?php echo $record2['hp_1'];?></td>
                                <td data-field="email_1" data-sortable="true"><?php echo $record2['email_1'];?></td>
                                <td data-field="contact_person_2" data-sortable="true"><?php echo $record2['contact_person_2'];?></td>
                                <td data-field="hp_2" data-sortable="true"><?php echo $record2['hp_2'];?></td>
                                <td data-field="email_2" data-sortable="true"><?php echo $record2['email_2'];?></td>
                                <td data-field="nama_service" data-sortable="true"><?php echo $record2['nama_service'];?></td>
                                <td data-field="nama_bandwidth_down" data-sortable="true"><?php echo $record2['nama_bandwidth_down'];?></td>
                                <td data-field="nama_bandwidth_up" data-sortable="true"><?php echo $record2['nama_bandwidth_up'];?></td>
                                <td data-field="tanggal_aktivasi" data-sortable="true"><?php echo $record2['tanggal_aktivasi'];?></td>
                                <td data-field="tanggal_terminasi" data-sortable="true"><?php echo $record2['tanggal_terminasi'];?></td>
                                <td data-field="monthy_fee_idr" data-sortable="true"><?php echo $record2['monthy_fee_idr'];?></td>
                                <td data-field="monthly_fee_usd" data-sortable="true"><?php echo $record2['monthly_fee_usd'];?></td>
                                <td data-field="status" data-sortable="true"><?php echo $record2['status'];?></td>
                                <td data-field="remark" data-sortable="true"><?php echo $record2['remark'];?></td>
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
