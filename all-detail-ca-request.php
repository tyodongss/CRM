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
      <center><h1 class="page-header">All Detail CA Report</h1></center>
      
      <?php
      include "koneksi.php";
      $id = $_GET['id'];
      $sql = "SELECT ca_report.id_ca_report, ca_report.id_engineer, ca_report.id_ca_kategori, ca_report.id_ca_request, engineer.nama_engineer, ca_kategori.nama_ca_kategori, ca_report.tgl_report, ca_report.status_ca_report, ca_report.jumlah, ca_report.keterangan, ca_report.note_asli, ca_request.judul_ca
        FROM ca_report, engineer, ca_kategori, ca_request
        WHERE ca_report.id_engineer = engineer.id_engineer
        AND ca_report.id_ca_kategori = ca_kategori.id_ca_kategori
        AND ca_report.id_ca_request = ca_request.id_ca_request
        AND ca_report.id_ca_request = '$id'
        ORDER BY id_ca_report DESC";

      $hasil = mysql_query($sql); 
      ?>

      <table data-toggle="table" data-url="tables/data1.json"  data-show-refresh="false" data-show-toggle="false" data-show-columns="false" data-search="false" data-select-item-name="toolbar1" data-pagination="false" >
                <thead>
                <tr>
                  <th data-field="itemid" data-sortable="true">No</th>
                  <th data-field="judul_ca"  data-sortable="true">Judul CA Request</th>
                  <th data-field="nama_engineer"  data-sortable="true">Nama Engineer</th>
                  <th data-field="nama_ca_kategori" data-sortable="true">Kategori</th>
                  <th data-field="tgl_report" data-sortable="true">Date Report</th>
                  <th data-field="jumlah" data-sortable="true">Jumlah</th>
                  <th data-field="keterangan" data-sortable="true">Keterangan</th>
                  <th data-field="note_asli" data-sortable="true">Note Asli</th>
                  <th data-field="status_ca_report" data-sortable="true">Status</th>
                </tr>
              </thead>
              <tbody>
<?php           
$no=0;
while($record = mysql_fetch_array($hasil)){
?>
                <tr>
                    <td data-field="itemid" data-sortable="true"><?php echo $no=$no+1;?></td>
                    <td data-field="judul_ca" data-sortable="true"><?php echo $record['judul_ca'];?></td>
                    <td data-field="nama_engineer" data-sortable="true"><?php echo $record['nama_engineer'];?></td>
                    <td data-field="nama_ca_kategori" data-sortable="true"><?php echo $record['nama_ca_kategori'];?></td>
                    <td data-field="tgl_report" data-sortable="true"><?php echo $record['tgl_report'];?></td>
                    <td data-field="jumlah" data-sortable="true"> 
					<?php
					print number_format($record['jumlah'],0,',','.'); 
					?>
					</td>
                    <td data-field="keterangan" data-sortable="true"><?php echo $record['keterangan'];?></td>
                    <td data-field="note_asli" data-sortable="true"><?php echo $record['note_asli'];?></td>
                    <td data-field="status_ca_report" data-sortable="true"><?php echo $record['status_ca_report'];?></td>
                </tr>
<?php
}
?>  
                          
                </tbody>
            </table>
<?php
			include "koneksi.php";
			$id = $_GET['id'];
            $query = "SELECT SUM(jumlah) as jumlah_ca_report FROM ca_report WHERE ca_report.id_ca_request = '$id'";
			$hasil2 = mysql_query($query);
			$query2 = "SELECT jumlah from ca_request where ca_request.id_ca_request = '$id'";            
			$hasil3 = mysql_query($query2); 			
            ?>

                        <br>
                        <table class="table table-striped">
                                  <tbody>
								    <tr>                                      
                                      <td width="20%"><b>Jumlah CA Request</b></td>
                                      <?php while($record3 = mysql_fetch_array($hasil3)){ ?>                                      
									  <td>Rp <?php 
										$jumlah = $record3['jumlah'];

										function format_rupiah($jumlah){
										$rupiah1=number_format($jumlah,2,',','.');
										return $rupiah1;
										}
										$rupiah2 = format_rupiah($jumlah);
										echo $rupiah2;
										?>
									  </td>
                                    </tr>
                                    <tr>                                      
                                      <td width="20%"><b>Total Jumlah CA Report</b></td>
                                      <?php while($record2 = mysql_fetch_array($hasil2)){ ?>
                                      <td>Rp <?php 
										$jumlah_ca_report = $record2['jumlah_ca_report'];

										function format_rupiah2($jumlah_ca_report){
										$rupiah1=number_format($jumlah_ca_report,2,',','.');
										return $rupiah1;
										}
										$rupiah3 = format_rupiah2($jumlah_ca_report);
										echo $rupiah3;
										?>
									  </td>
									 </tr>
									  <tr>                                      
                                      <td width="20%"><b>Sisa CA Request</b></td>                                     
                                      <td>Rp <?php 								
										
										$sisaca = $jumlah - $jumlah_ca_report;
										echo number_format($sisaca,2,',','.'); 										
										?>
									  </td>
									 </tr>
									  <? }} ?>
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
