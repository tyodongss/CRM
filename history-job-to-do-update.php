<?php 
session_start(); 
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>CRM S-Net</title>
<link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
<link rel="icon" href="favicon.ico" type="image/x-icon">

<link href="/inventory/css/bootstrap.min.css" rel="stylesheet">
<link href="/inventory/css/datepicker3.css" rel="stylesheet">
<link href="/inventory/css/bootstrap-table.css" rel="stylesheet">
<link href="/inventory/css/styles.css" rel="stylesheet">

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
        <a class="navbar-brand" href="#"><span class="glyphicon glyphicon-signal"></span> S-Net<span></span></a>
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
      <center><h1 class="page-header">History Job</h1></center>
      
      <?php
      include "koneksi.php";
      $id = $_GET['id'];
		  
	  $sql = "SELECT job_update.id_job_update, job_update.id_job, job.name_job, engineer.name_engineer, job_update.date_update, job_update.support, job_update.created_at, job_update.updated_at, job_update.deleted_at
				FROM job_update, job, engineer 
				WHERE job_update.id_job=job.id_job 
				AND job_update.id_engineer=engineer.id_engineer 
				AND job_update.id_job='$id'
				ORDER BY job_update.id_job_update DESC";

      $hasil = mysql_query($sql); 
      ?>

      <table data-toggle="table" data-url="tables/data1.json"  data-show-refresh="false" data-show-toggle="false" data-show-columns="false" data-search="false" data-select-item-name="toolbar1" data-pagination="false" >
                <thead>
                <tr>
                  <th data-field="itemid" data-sortable="true">No</th>
				  <th data-field="name_job"  data-sortable="true">Job Name</th>
				  <th data-field="name_engineer"  data-sortable="true">Engineer Name</th>
				  <th data-field="date_update" data-sortable="true">Date Update</th>
				  <th data-field="support" data-sortable="true">Support</th>
                </tr>
              </thead>
              <tbody>
<?php           
$no=0;
while($record = mysql_fetch_array($hasil)){
?>
                <tr>
                  <td data-field="itemid" data-sortable="true"><?php echo $no=$no+1;?></td>
				  <td data-field="name_job" data-sortable="true"><?php echo $record['name_job'];?></td>
				  <td data-field="name_engineer" data-sortable="true"><?php echo $record['name_engineer'];?></td>
				  <td data-field="date_update" data-sortable="true"><?php echo $record['date_update'];?></td>
				  <td data-field="support" data-sortable="true"><?php echo $record['support'];?></td>				  
                </tr>
<?php
}
?>  
                          
                </tbody>
            </table>

    </div>
  </div><!--/.row-->
</div>


  <script src="/inventory/js/jquery-1.11.1.min.js"></script>
  <script src="/inventory/js/bootstrap.min.js"></script>
  <script src="/inventory/js/chart.min.js"></script>
  <script src="/inventory/js/chart-data.js"></script>
  <script src="/inventory/js/easypiechart.js"></script>
  <script src="/inventory/js/easypiechart-data.js"></script>
  <script src="/inventory/js/bootstrap-datepicker.js"></script>
  <script src="/inventory/js/bootstrap-table.js"></script>
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
