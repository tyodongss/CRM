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
      <center><h1 class="page-header">All Detail Job To Do</h1></center>
      
      <?php
      include "koneksi.php";
      $id = $_GET['id'];
    $sql = "select job_to_do2.id_job_to_do, job_to_do2_update.id_job_to_do_update, job_to_do2.nama_job_to_do, job_to_do2_update.id_engineer, engineer.nama_engineer, job_to_do2_update.tgl_update, job_to_do2_update.keterangan, job_to_do2_update.created_at, job_to_do2_update.updated_at, job_to_do2_update.deleted_at from job_to_do2_update, job_to_do2,engineer where job_to_do2_update.id_job_to_do=job_to_do2.id_job_to_do and job_to_do2_update.id_engineer=engineer.id_engineer and job_to_do2_update.id_job_to_do='$id' order by job_to_do2_update.tgl_update desc";

      $hasil = mysql_query($sql); 
      ?>

      <table data-toggle="table" data-url="tables/data1.json"  data-show-refresh="false" data-show-toggle="false" data-show-columns="false" data-search="false" data-select-item-name="toolbar1" data-pagination="false" >
                <thead>
                <tr>
                  <th data-field="itemid"  data-filter-control="input">No</th>
                  <th data-field="nama_job_to_do"  data-filter-control="input">Nama Job To Do</th>
                  <th data-field="nama_engineer"  data-filter-control="input">Nama Engineer</th>
                  <th data-field="tgl_update"  data-filter-control="input">Date Time Update</th>
                  <th data-field="keterangan"  data-filter-control="input">Keterangan</th>
                </tr>
              </thead>
              <tbody>
<?php           
$no=0;
while($record = mysql_fetch_array($hasil)){
?>
                <tr>
                    <td data-field="id_job_to_do" data-sortable="true"><?php echo $no=$no+1;?></td>
                    <td data-field="nama_job_to_do" data-sortable="true"><?php echo $record['nama_job_to_do'];?></td>
                    <td data-field="nama_engineer" data-sortable="true"><?php echo $record['nama_engineer'];?></td>
                    <td data-field="tgl_update" data-sortable="true"><?php echo $record['tgl_update'];?></td>
                    <td data-field="keterangan" data-sortable="true"><?php echo $record['keterangan'];?></td>
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
