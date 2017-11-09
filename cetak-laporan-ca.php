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
            <center><h1 class="page-header">Laporan CA Request</h1></center>
            <?php
            include "koneksi.php";

            $judul_ca_budget = $_POST['judul_ca_budget'];
            
                if ($judul_ca_budget=="judul_ca_budget"){
                $sql2 = "SELECT ca_request.swos, ca_budget.judul_ca_budget, paa.nama_paa, ca_request.tgl_request, ca_request.tgl_approve, job_to_do2.nama_job_to_do, ca_request.judul_ca, ca_request.keterangan, ca_request.jumlah, engineer.nama_engineer, ca_request.status_approval, ca_request.status_ca_request, ca_request.created_at, ca_request.updated_at, ca_request.deleted_at
					FROM ca_request, ca_budget, paa, engineer, job_to_do2
					WHERE judul_ca_budget =  '$judul_ca_budget'
					AND ca_request.id_ca_budget = ca_budget.id_ca_budget
					AND ca_request.id_paa = paa.id_paa
					AND ca_request.id_engineer = engineer.id_engineer
					AND ca_request.id_job_to_do = job_to_do2.id_job_to_do
                  ORDER BY id_ca_request DESC";

              }else {
				  
				 $sql2 = "SELECT ca_request.swos, ca_budget.judul_ca_budget, paa.nama_paa, ca_request.tgl_request, ca_request.tgl_approve, job_to_do2.nama_job_to_do, ca_request.judul_ca, ca_request.keterangan, ca_request.jumlah, engineer.nama_engineer, ca_request.status_approval, ca_request.status_ca_request, ca_request.created_at, ca_request.updated_at, ca_request.deleted_at
					FROM ca_request, ca_budget, paa, engineer, job_to_do2
					WHERE ca_request.id_ca_budget = ca_budget.id_ca_budget
					AND ca_request.id_paa = paa.id_paa
					AND ca_request.id_engineer = engineer.id_engineer
					AND ca_request.id_job_to_do = job_to_do2.id_job_to_do
                  ORDER BY id_ca_request DESC";
			  } 
            
            $hasil2 = mysql_query($sql2); 
        ?>
            
<table data-toggle="table" data-url="tables/data1.json"  data-show-refresh="false" data-show-toggle="false" data-show-columns="false" data-search="false" data-select-item-name="toolbar1" data-pagination="false">
                            <thead>
                            <tr>
                                <th data-field="itemid" data-sortable="true">No</th>
                                <th data-field="swos"  data-sortable="true">SWOS</th>
                                <th data-field="judul_ca_budget" data-sortable="true">Judul CA Budget</th>
                                <th data-field="nama_paa" data-sortable="true">Nama PAA</th>
                                <th data-field="tgl_request" data-sortable="true">Tanggal Request</th>
                                <th data-field="tgl_approve" data-sortable="true">Tanggal Approve</th>
                                <th data-field="nama_job_to_do"  data-sortable="true">Nama Job to Do</th>
                                <th data-field="judul_ca" data-sortable="true">Judul CA</th>
                                <th data-field="keterangan" data-sortable="true">Keterangan</th>
                                <th data-field="jumlah" data-sortable="true">Jumlah</th>
                                <th data-field="nama_engineer" data-sortable="true">Nama Engineer</th>
								<th data-field="status_approval" data-sortable="true">Status Approval</th> 
                                <th data-field="status_ca_request" data-sortable="true">Status CA Request</th>                                
                            </tr>
                            </thead>
                            <tbody>
<?php                       
$no=0;
while($record2 = mysql_fetch_array($hasil2)){
?>
                           <tr>
                                <td data-field="itemid" data-sortable="true"><?php echo $no=$no+1;?></td>
                                <td data-field="swos" data-sortable="true"><?php echo $record2['swos'];?></td>
                                <td data-field="judul_ca_budget" data-sortable="true"><?php echo $record2['judul_ca_budget'];?></td>
                                <td data-field="nama_paa" data-sortable="true"><?php echo $record2['nama_paa'];?></td>
                                <td data-field="tgl_request" data-sortable="true"><?php echo $record2['tgl_request'];?></td>
                                <td data-field="tgl_approve" data-sortable="true"><?php echo $record2['tgl_approve'];?></td>
                                <td data-field="nama_job_to_do" data-sortable="true"><?php echo $record2['nama_job_to_do'];?></td>
                                <td data-field="judul_ca" data-sortable="true"><?php echo $record2['judul_ca'];?></td>
                                <td data-field="keterangan" data-sortable="true"><?php echo $record2['keterangan'];?></td>
                                <td data-field="jumlah" data-sortable="true"><?php echo $record2['jumlah'];?></td>
                                <td data-field="nama_engineer" data-sortable="true"><?php echo $record2['nama_engineer'];?></td>
								<td data-field="status_approval" data-sortable="true"><?php echo $record2['status_approval'];?></td>
                                <td data-field="status_ca_request" data-sortable="true"><?php echo $record2['status_ca_request'];?></td>
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
