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
            <center><h1 class="page-header">Laporan Domain</h1></center>
            
            <?php
            include "koneksi.php";

            $tgl=$_POST['date'];
            $tgl_awal =$_POST['tgl_awal'];
            $tgl_akhir = $_POST['tgl_akhir'];
            $status_domain = $_POST['status_domain'];
              

            ?>
      <center><h5>Periode tanggal <b><?php echo $tgl_awal;?></b> sampai <b><?php echo $tgl_akhir;?></b></h5></center>
      <?php            

            if ($status_domain=="All"){
 
            $sql = "select domain.id_domain, domain.nama_domain, domain.id_customer, customer.nama, domain.id_registrar, registrar.nama_registrar, domain.date_register, domain.date_expire, domain.domainhosting, domain.webhosting, domain.webhosting_usage, domain.mailhosting, domain.mailhosting_usage, domain.status_domain, domain.nama_kontak, domain.hp_kontak, domain.email_kontak, domain.remark, domain.created_at, domain.updated_at, domain.deleted_at  from domain,customer,registrar where customer.id_customer=domain.id_customer and registrar.id_registrar=domain.id_registrar            
              AND domain.date_expire			 
              BETWEEN  '$tgl_awal'
              AND  '$tgl_akhir' order by nama_domain asc";

            } else if ($status_domain=="$status_domain"){
 
            $sql = "select domain.id_domain, domain.nama_domain, domain.id_customer, customer.nama, domain.id_registrar, registrar.nama_registrar, domain.date_register, domain.date_expire, domain.domainhosting, domain.webhosting, domain.webhosting_usage, domain.mailhosting, domain.mailhosting_usage, domain.status_domain, domain.nama_kontak, domain.hp_kontak, domain.email_kontak, domain.remark, domain.created_at, domain.updated_at, domain.deleted_at  from domain,customer,registrar where customer.id_customer=domain.id_customer and registrar.id_registrar=domain.id_registrar
              AND status_domain =  '$status_domain'
              AND domain.date_expire
              BETWEEN  '$tgl_awal'
              AND  '$tgl_akhir' order by nama_domain asc";

            } else {
            $sql = "select domain.id_domain, domain.nama_domain, domain.id_customer, customer.nama, domain.id_registrar, registrar.nama_registrar, domain.date_register, domain.date_expire, domain.domainhosting, domain.webhosting, domain.webhosting_usage, domain.mailhosting, domain.mailhosting_usage, domain.status_domain, domain.nama_kontak, domain.hp_kontak, domain.email_kontak, domain.remark, domain.created_at, domain.updated_at, domain.deleted_at  from domain,customer,registrar where customer.id_customer=domain.id_customer and registrar.id_registrar=domain.id_registrar
              AND status_domain =  '$status_domain'
              AND date_expire
              = '$tgl' order by nama_domain asc";

            }

            $hasil = mysql_query($sql); 
            ?>

            <table data-toggle="table" data-url="tables/data1.json"  data-show-refresh="false" data-show-toggle="false" data-show-columns="false" data-search="false" data-select-item-name="toolbar1" data-pagination="false" >
                            <thead>
                            <tr>
                                <th data-field="itemid"  data-filter-control="input">No</th>
                                <th data-field="nama_domain"  data-filter-control="input">Nama Domain</th>
                                <th data-field="nama"  data-filter-control="input">Nama Customer</th>
                                <th data-field="nama_registrar"  data-filter-control="input">Nama Registrar</th>
                                <th data-field="date_expire" data-filter-control="input">Date Expire</th>
                                <th data-field="domainhosting" data-filter-control="input">Domain Hosting</th>
                                <th data-field="webhosting" data-filter-control="input">Web Hosting</th> 
                                <th data-field="webhosting_usage" data-sortable="true">Web Hosting Usage</th>                               
                                <th data-field="mailhosting"  data-filter-control="input">Mail Hosting</th>
                                <th data-field="mailhosting_usage"  data-filter-control="input">Mail Hosting Usage</th>
                                <th data-field="status_domain"  data-filter-control="input">Status Domain</th>
								<th data-field="nama_kontak"  data-filter-control="input">Nama Kontak</th>
                                <th data-field="hp_kontak"  data-filter-control="input">No. HP Kontak</th>
								<th data-field="email_kontak"  data-filter-control="input">Email Kontak</th>
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
                                <td data-field="nama_domain" data-sortable="true"><?php echo $record['nama_domain'];?></td>
                                <td data-field="nama" data-sortable="true"><?php echo $record['nama'];?></td>
                                <td data-field="nama_registrar" data-sortable="true"><?php echo $record['nama_registrar'];?></td>
                                <td data-field="date_expire" data-sortable="true"><?php echo $record['date_expire'];?></td>
                                <td data-field="domainhosting" data-sortable="true"><?php echo $record['domainhosting'];?></td>
                                <td data-field="webhosting" data-sortable="true"><?php echo $record['webhosting'];?></td>
                                <td data-field="webhosting_usage" data-sortable="true"><?php echo $record['webhosting_usage'];?></td>                               
                                <td data-field="mailhosting" data-sortable="true"><?php echo $record['mailhosting'];?></td>
                                <td data-field="mailhosting_usage" data-sortable="true"><?php echo $record['mailhosting_usage'];?></td>
                                <td data-field="status_domain" data-sortable="true"><?php echo $record['status_domain'];?></td>
								<td data-field="nama_kontak" data-sortable="true"><?php echo $record['nama_kontak'];?></td>
								<td data-field="hp_kontak" data-sortable="true"><?php echo $record['hp_kontak'];?></td>
								<td data-field="email_kontak" data-sortable="true"><?php echo $record['email_kontak'];?></td>
								<td data-field="remark" data-sortable="true"><?php echo $record['remark'];?></td>
                            </tr>
<?php
}
?>  
                                                
                            </tbody>
                        </table>

                                 
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