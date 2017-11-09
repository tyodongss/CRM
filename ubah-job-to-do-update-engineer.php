<?php
session_start();
?>
<!--  -->

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
<link rel="stylesheet" href="/css/bootstrap-datetimepicker-standalone.min.css">
<link rel="stylesheet" href="/css/bootstrap-datetimepicker.min.css">

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
	<div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">
		<!--
		<form role="search">
			<div class="form-group">
				<input type="text" class="form-control" placeholder="Search">
			</div>
		</form>
		-->

		<?php include "menu.php"; ?>

		<!--	
	==================================================== MENU
	-->
		
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">			
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="#"><span class="glyphicon glyphicon-home"></span></a></li>
				<li class="active">Job To Do Update</li>
			</ol>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Ubah Job To Do Update</h1>
			</div>
		</div><!--/.row-->
<?php 
include "koneksi.php"; 
$id=$_GET['id']; 
$query=mysql_query("select job_to_do2_update.id_job_to_do_update, job_to_do2_update.id_job_to_do, job_to_do2.nama_job_to_do, job_to_do2_update.id_engineer, engineer.nama_engineer, job_to_do2_update.tgl_update, job_to_do2_update.keterangan, job_to_do2_update.created_at, job_to_do2_update.updated_at, job_to_do2_update.deleted_at from job_to_do2_update, job_to_do2,engineer where job_to_do2_update.id_job_to_do=job_to_do2.id_job_to_do and job_to_do2_update.id_engineer=engineer.id_engineer and id_job_to_do_update='$id'"); 
?> 
<?php 
while($row=mysql_fetch_array($query)){ 
?> 		
		
		<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default">
					<!--<div class="panel-heading">Stok Masuk</div>-->
					<div class="panel-body">
						<div class="col-md-6">
							<form role="form" action="update-job-to-do-update-engineer.php" method="post">
							<input type="hidden" name="_token" value="L8C5ujpOh4UEsaNko2Y3pkuzP714OtRymsXPqrNJ">
                                                        <input type="hidden" name="id" value="<?php echo $id;?>"/>								
								
								<div class="form-group">
                                    <label>Nama Job To Do</label>
                                    <select class="form-control" name="id_job_to_do">
                                    <option selected value="<?php echo $row['id_job_to_do'];?>"><?php echo $row['nama_job_to_do'];?></option>
                                     <option>---- Pilih Job To Do ----</option>
                                    <?php
                                    $sql = mysql_query("SELECT * FROM job_to_do2 group by nama_job_to_do asc");
                                    if(mysql_num_rows($sql) != 0){
                                    while($data = mysql_fetch_assoc($sql)){
                                    echo '<option value="'.$data['id_job_to_do'].'" >'.$data['nama_job_to_do'].'</option>';
                                        } 
                                    }
                                    ?>
                                </select>
                                </div>

								<div class="form-group">
                                    <label>Engineer</label>
                                    <select class="form-control" name="id_engineer">
                                    <?php
                                    $id = $_SESSION['id'];
                  					if ($id!=""){
                                    $sql = mysql_query("SELECT * FROM engineer where id_engineer = '$id' order by nama_engineer asc");
                                    if(mysql_num_rows($sql) != 0){
                                    while($data = mysql_fetch_assoc($sql)){
                                    echo '<option value="'.$data['id_engineer'].'" >'.$data['nama_engineer'].'</option>';
                                     }
                                    }
                                    ?>
                                </select>
                                </div>

								<div class="form-group">
                                  <label>Date Time Update</label> 
                                     <div class='input-group date' id='datetimepicker1'>
                                        <input type='text' class="form-control" name="tgl_update"value="<?php echo $row['tgl_update'];?>" />
                                        <span class="input-group-addon">
                                          <span class="glyphicon glyphicon-calendar"></span>
                                        </span>
                                      </div>
                                </div>
								
								<div class="form-group">
									<label>Keterangan</label>
									<input class="form-control" name="keterangan" value="<?php echo $row['keterangan'];?>">
								</div>
															
								<button type="submit" class="btn btn-primary">Update</button>
								<a href="../show-job-to-do-update-engineer.php" class="btn btn-default">Back</a>
<?php
}}
?>	
							</div>
						</form>
					</div>
				</div>
			</div><!-- /.col-->
		</div><!-- /.row -->
		
	</div><!--/.main-->

	<script src="/js/jquery-1.11.1.min.js"></script>
	<script src="/js/bootstrap.min.js"></script>
	<script src="/js/chart.min.js"></script>
	<script src="/js/chart-data.js"></script>
	<script src="/js/easypiechart.js"></script>
	<script src="/js/easypiechart-data.js"></script>
	<script src="/js/bootstrap-datepicker.js"></script>
	<script src="/js/bootstrap-table.js"></script>
	<script src="/js/moment.js"></script>
    <script type="text/javascript" src="/js/bootstrap-datetimepicker.min.js"></script>

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
	<script type="text/javascript">
      $(function () {
        $('#datetimepicker1').datetimepicker({
          format: 'YYYY-MM-DD HH:mm:ss'
        });
      });
    </script>

    <script type="text/javascript">
      $(function () {
        $('#datetimepicker2').datetimepicker({
          format: 'YYYY-MM-DD HH:mm:ss'
         });
      });
    </script>
</body>

</html>