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
      <center><h1 class="page-header">All Detail CA Request</h1></center>
      
      <?php
      include "koneksi.php";
      $id = $_GET['id'];
      $sql = "SELECT ca_request.swos, ca_budget.judul_ca_budget, paa.nama_paa, ca_request.tgl_request, ca_request.tgl_approve, job_to_do2.nama_job_to_do, ca_request.judul_ca, ca_request.keterangan, ca_request.jumlah, ca_request.jumlah_sisa_ca, engineer.nama_engineer, ca_request.status_approval, ca_request.status_ca_report_confirm, ca_request.status_ca_report_approval, ca_request.status_ca_request
        FROM ca_request, ca_budget, paa, job_to_do2, engineer
        WHERE ca_request.id_ca_budget=ca_budget.id_ca_budget
        AND ca_request.id_paa=paa.id_paa
        AND ca_request.id_job_to_do=job_to_do2.id_job_to_do
		AND ca_request.id_engineer=engineer.id_engineer
		AND ca_request.status_approval='Approved'
        AND ca_request.id_ca_budget = '$id'
        ORDER BY id_ca_request DESC";

      $hasil = mysql_query($sql); 
      ?>

      <table data-toggle="table" data-url="tables/data1.json"  data-show-refresh="false" data-show-toggle="false" data-show-columns="false" data-search="false" data-select-item-name="toolbar1" data-pagination="false" >
                <thead>
                <tr>
                  <th data-field="itemid" data-sortable="true">No</th>
                  <th data-field="judul_ca_budget"  data-sortable="true">Judul CA Budget</th>
                  <th data-field="nama_paa"  data-sortable="true">Nama PAA</th>
                  <th data-field="tgl_request" data-sortable="true">Tgl Request</th>
                  <th data-field="tgl_approve" data-sortable="true">Tgl Approve</th>
                  <th data-field="nama_job_to_do" data-sortable="true">Nama Job to Do</th>
                  <th data-field="judul_ca" data-sortable="true">Judul CA</th>
                  <th data-field="keterangan" data-sortable="true">Keterangan</th>
                  <th data-field="jumlah" data-sortable="true">Jumlah Awal</th>
				  <th data-field="jumlah_sisa_ca" data-sortable="true">Jumlah Sisa CA</th>
				  <th data-field="nama_engineer" data-sortable="true">Jumlah Nama Engineer</th>
				  <th data-field="status_approval" data-sortable="true">Status Approval</th>
				  <th data-field="status_ca_report_confirm" data-sortable="true">Status CA Report Confirm</th>
				  <th data-field="status_ca_report_approval" data-sortable="true">Status CA Report Approval</th>
				  <th data-field="status_ca_request" data-sortable="true">Status CA Request</th>
                </tr>
              </thead>
              <tbody>
<?php           
$no=0;
while($record = mysql_fetch_array($hasil)){
?>
                <tr>
                    <td data-field="itemid" data-sortable="true"><?php echo $no=$no+1;?></td>
                    <td data-field="judul_ca_budget" data-sortable="true"><?php echo $record['judul_ca_budget'];?></td>
                    <td data-field="nama_paa" data-sortable="true"><?php echo $record['nama_paa'];?></td>
                    <td data-field="tgl_request" data-sortable="true"><?php echo $record['tgl_request'];?></td>
                    <td data-field="tgl_approve" data-sortable="true"><?php echo $record['tgl_approve'];?></td>
					<td data-field="nama_job_to_do" data-sortable="true"><?php echo $record['nama_job_to_do'];?></td>
					<td data-field="judul_ca" data-sortable="true"><?php echo $record['judul_ca'];?></td>
					<td data-field="keterangan" data-sortable="true"><?php echo $record['keterangan'];?></td>
                    <td data-field="jumlah" data-sortable="true"> 
					<?php
					print number_format($record['jumlah'],0,',','.'); 
					?>
					</td>
					<td data-field="jumlah_sisa_ca" data-sortable="true"> 
					<?php
					$jumlah_sisa_ca = $record['jumlah_sisa_ca'];
					if ($jumlah_sisa_ca==""){
					}else{
					print number_format($record['jumlah_sisa_ca'],0,',','.'); 
					}
					?>
					</td>
                    <td data-field="nama_engineer" data-sortable="true"><?php echo $record['nama_engineer'];?></td>
                    <td data-field="status_approval" data-sortable="true"><?php echo $record['status_approval'];?></td>
                    <td data-field="status_ca_report_confirm" data-sortable="true"><?php echo $record['status_ca_report_confirm'];?></td>
					<td data-field="status_ca_report_approval" data-sortable="true"><?php echo $record['status_ca_report_approval'];?></td>
					<td data-field="status_ca_request" data-sortable="true"><?php echo $record['status_ca_request'];?></td>
                </tr>
<?php
}
?>  
                          
                </tbody>
            </table>
<?php
			include "koneksi.php";
			$id = $_GET['id'];
            $query = "SELECT SUM(jumlah_sisa_ca) as totalsisacalebih FROM ca_request WHERE ca_request.jumlah_sisa_ca >= '0' AND ca_request.id_ca_budget = '$id'";
			$hasil2 = mysql_query($query);
			$query2 = "SELECT SUM(jumlah) as carequest from ca_request where ca_request.status_approval='Approved' AND ca_request.id_ca_budget = '$id'";            
			$hasil3 = mysql_query($query2);
			$query3 = "SELECT SUM(jumlah_sisa_ca) as totalsisacakurang FROM ca_request WHERE ca_request.jumlah_sisa_ca < '0' AND ca_request.id_ca_budget = '$id'";            
			$hasil4 = mysql_query($query3);
			$query4 = "SELECT jumlah_awal FROM ca_budget WHERE ca_budget.id_ca_budget = '$id'";            
			$hasil5 = mysql_query($query4);
            ?>
						
                        <br>
                        <table class="table table-striped">
                                  <tbody>								     
									<tr>                                      
                                      <td width="35%"><b>CA Request pada Periode ini</b></td>
                                      <?php while($record3 = mysql_fetch_array($hasil3)){ ?>                                      
									  <td>Rp <?php 
									    $carequest = $record3['carequest'];
										print number_format($record3['carequest'],2,',','.'); 
										?>
									  </td>
                                    </tr>
                                    <tr>                                      
                                      <td width="35%"><b>Sisa CA yang dikembalikan ke PAA</b></td>
                                      <?php while($record2 = mysql_fetch_array($hasil2)){ ?>
                                      <td>Rp <?php 
										$totalsisacalebih = $record2['totalsisacalebih'];
										print number_format($record2['totalsisacalebih'],2,',','.'); 
										?>
									  </td>
									 </tr>
									 <tr>                                      
                                      <td width="35%"><b>Kekurangan CA yang diberikan ke Engineer</b></td>
                                      <?php while($record4 = mysql_fetch_array($hasil4)){ ?>
                                      <td>Rp <?php 
										$totalsisacakurang = $record4['totalsisacakurang'];
										print number_format($record4['totalsisacakurang'],2,',','.'); 
										?>
									  </td>
									 </tr>									 
									 <tr>                                      
                                      <td width="35%"><b>Total Budget pada Periode ini</td>
                                      <?php while($record5 = mysql_fetch_array($hasil5)){ ?>
                                      <td>Rp <?php 
										$jumlah_awal = $record5['jumlah_awal'];
										print number_format($record5['jumlah_awal'],2,',','.'); 
										?>
									  </td>
									 </tr>
									  <tr>                                      
                                      <td width="20%"><b>Total CA Request pada Periode ini</b></td>                                     
                                      <td>Rp <?php				
										$totalcarequest = $carequest - $totalsisacakurang;
										print number_format($totalcarequest,2,',','.'); 										
										?>
									  </td>
									 </tr>
									  <tr>                                      
                                      <td width="20%"><b>Total Sisa Budget pada Periode ini</b></td>                                     
                                      <td>Rp <?php				
										$sisabudget = $jumlah_awal - $carequest + $totalsisacalebih + $totalsisacakurang;
										print number_format($sisabudget,2,',','.');
										?>
									  </td>
									 </tr>
									  <tr>                                      
                                      <td width="20%">
									  <div class="panel panel-default">
									  <div class="panel-heading"><a href="#" class="btn btn-primary btn-md">Update Sisa Budget ke Database</a></div>
									  </div>
									  </td>
									  </tr>
									  <? }}}} ?>
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
