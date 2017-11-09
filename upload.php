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
				<li class="active">Job To Do</li>
			</ol>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Upload File</h1>
			</div>
		</div><!--/.row-->
				
		
		<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default">
					<!--<div class="panel-heading">Stok Masuk</div>-->
					<div class="panel-body">
						<div class="col-md-6">

						<?php
						include 'koneksi.php'; 
						$id=$_GET['id']; 
						$query=mysql_query("SELECT job_to_do2.swos, job_to_do2.nama_job_to_do, job_to_do2.id_owner, owner.nama_owner, owner.email_owner, job_to_do2.id_customer, job_to_do2.id_terima_pekerjaan, job_to_do2.id_detail_pekerjaan, job_to_do2.datetime_open, job_to_do2.datetime_finish, job_to_do2.tipe_pekerjaan, job_to_do2.priority_pekerjaan, job_to_do2.scope_pekerjaan, job_to_do2.keterangan_pekerjaan, job_to_do2.status_charge, job_to_do2.status_jobtodo, job_to_do2.created_at, job_to_do2.updated_at, job_to_do2.deleted_at, customer.nama, terima_pekerjaan.nama_terima_pekerjaan, detail_pekerjaan.nama_detail_pekerjaan, job_to_do2.remark
										  FROM job_to_do2
										  JOIN customer ON job_to_do2.id_customer = customer.id_customer
										  JOIN terima_pekerjaan ON job_to_do2.id_terima_pekerjaan = terima_pekerjaan.id_terima_pekerjaan
										  JOIN detail_pekerjaan ON job_to_do2.id_detail_pekerjaan = detail_pekerjaan.id_detail_pekerjaan
										  JOIN owner ON job_to_do2.id_owner = owner.id_owner
										  AND job_to_do2.id_job_to_do =  '$id'");

						while($row=mysql_fetch_array($query)){ 
						?> 
							<form action="process-upload.php" method="post" enctype="multipart/form-data">
								 <div class="form-group">
                                    <input class="form-control" type="hidden" name="swos" value="<?php echo $row['swos']?>" maxlength="7">
                                    <div class="help-block with-errors"></div>
                                </div>
								
								<div class="form-group">
                                    <input class="form-control" type="hidden" name="nama_job_to_do" value="<?php echo $row['nama_job_to_do']?>"  required>
                                    <div class="help-block with-errors"></div>
                                </div>

                                <div class="form-group">
                                    <input class="form-control" type="hidden" name="email_owner" value="<?php echo $row['email_owner']?>"  required>
                                    <div class="help-block with-errors"></div>
                                </div>

                                <div class="form-group">
                                    <input class="form-control" type="hidden" name="nama_owner" value="<?php echo $row['nama_owner']?>"  required>
                                    <div class="help-block with-errors"></div>
                                </div>

                                <div class="form-group">
                                    <input class="form-control" type="hidden" name="nama" value="<?php echo $row['nama']?>"  required>
                                    <div class="help-block with-errors"></div>
                                </div>

                                <div class="form-group">
                                    <input class="form-control" type="hidden" name="nama_terima_pekerjaan" value="<?php echo $row['nama_terima_pekerjaan']?>"  required>
                                    <div class="help-block with-errors"></div>
                                </div>

                                 <div class="form-group">
                                    <input class="form-control" type="hidden" name="datetime_open" value="<?php echo $row['datetime_open']?>"  required>
                                    <div class="help-block with-errors"></div>
                                </div>

                                 <div class="form-group">
                                    <input class="form-control" type="hidden" name="datetime_finish" value="<?php echo $row['datetime_finish']?>"  required>
                                    <div class="help-block with-errors"></div>
                                </div>

                                 <div class="form-group">
                                    <input class="form-control" type="hidden" name="tipe_pekerjaan" value="<?php echo $row['tipe_pekerjaan']?>"  required>
                                    <div class="help-block with-errors"></div>
                                </div>

                                 <div class="form-group">
                                    <input class="form-control" type="hidden" name="priority_pekerjaan" value="<?php echo $row['priority_pekerjaan']?>"  required>
                                    <div class="help-block with-errors"></div>
                                </div>

                                <div class="form-group">
                                    <input class="form-control" type="hidden" name="scope_pekerjaan" value="<?php echo $row['scope_pekerjaan']?>"  required>
                                    <div class="help-block with-errors"></div>
                                </div>

                                <div class="form-group">
                                    <input class="form-control" type="hidden" name="nama_detail_pekerjaan" value="<?php echo $row['nama_detail_pekerjaan']?>"  required>
                                    <div class="help-block with-errors"></div>
                                </div>

                                <div class="form-group">
                                    <input class="form-control" type="hidden" name="keterangan_pekerjaan" value="<?php echo $row['keterangan_pekerjaan']?>"  required>
                                    <div class="help-block with-errors"></div>
                                </div>

                                <div class="form-group">
                                    <input class="form-control" type="hidden" name="status_charge" value="<?php echo $row['status_charge']?>"  required>
                                    <div class="help-block with-errors"></div>
                                </div>

                                <div class="form-group">
                                    <input class="form-control" type="hidden" name="status_jobtodo" value="<?php echo $row['status_jobtodo']?>"  required>
                                    <div class="help-block with-errors"></div>
                                </div>

                                <div class="form-group">
                                    <input class="form-control" type="hidden" name="remark" value="<?php echo $row['remark']?>">
                                    <div class="help-block with-errors"></div>
                                </div>

						<div class="form-group">
							<label>Pilih File</label>
							<input type="hidden" name="id" value="<?php echo $id;?>"/>
							<input type="file" name="file" accept="application/vnd.openxmlformats-officedocument.wordprocessingml.document, application/msword, application/vnd.ms-excel, application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/pdf">
						</div>

						<div class="form-group">
							<input type="submit" class="btn btn-primary" value="Upload" name="btn-upload">
						</div>
							</form>
						    <br /><br />
						    <?php
							if(isset($_GET['success']))
							{
								?>
						        <label>File Uploaded Successfully...  <a href="../show-job-to-do.php">Back</a></label>
						        <?php
							}
							else if(isset($_GET['fail']))
							{
								?>
						        <label>Problem While File Uploading !</label>
						        <?php
							}
							?>

							<?php
							}
							?> 

							 <tr>     
                                      <td>
                                                                             <?
                                      $sql2 = mysql_query("SELECT engineer.nama_engineer
                                      FROM engineer, detail_job_to_do
                                      WHERE detail_job_to_do.id_engineer = engineer.id_engineer
                                      AND detail_job_to_do.id_job_to_do =  '$id'");

                                      while($row=mysql_fetch_array($sql2)){ 
                                      ?>
                                      <input class="form-control" type="hidden" name="nama_engineer1" value="<?php echo $row['nama_engineer']?>">
                                        
                                      <?}?>  
                                      </td>
                                      </tr>
				</div>
			</div><!-- /.col-->
		</div><!-- /.row -->
		
	</div><!--/.main-->


	<script src="/inventory/js/jquery-1.11.1.min.js"></script>
	<script src="/inventory/js/bootstrap.min.js"></script>
	<script src="/inventory/js/chart.min.js"></script>
	<script src="/inventory/js/chart-data.js"></script>
	<script src="/inventory/js/easypiechart.js"></script>
	<script src="/inventory/js/easypiechart-data.js"></script>
	<script src="/inventory/js/bootstrap-datepicker.js"></script>
	<script src="/inventory/js/bootstrap-table.js"></script>
	<script src="/inventory/js/validator.js"></script>
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
