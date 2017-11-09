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
				<li class="active">CA Report Approval Manager</li>
			</ol>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Ubah CA Report Approval Manager</h1>
			</div>
		</div><!--/.row-->
<?php 
include "koneksi.php"; 
$id=$_GET['id']; 
$query=mysql_query("select ca_request.judul_ca, ca_request.jumlah, ca_request.jumlah_sisa_ca, ca_request.id_engineer, engineer.nama_engineer, ca_request.status_ca_report_approval, ca_request.status_ca_report_approval_manager from ca_request, engineer where ca_request.id_engineer=engineer.id_engineer and id_ca_request='$id'"); 
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
							<form role="form" action="update-ca-report-approval-manager.php" method="post">
							<input type="hidden" name="_token" value="L8C5ujpOh4UEsaNko2Y3pkuzP714OtRymsXPqrNJ">
                                <input type="hidden" name="id" value="<?php echo $id;?>"/>								
								
																
								<div class="form-group">
									<input class="form-control" type="hidden" name="judul_ca" value="<?php echo $row['judul_ca'];?>">
								</div>
								
								<div class="form-group">
									<input class="form-control" type="hidden"  name="jumlah" value="<?php echo $row['jumlah'];?>">
								</div>
								
								<div class="form-group">
									<input class="form-control" type="hidden"  name="jumlah_sisa_ca" value="<?php echo $row['jumlah_sisa_ca'];?>">
								</div>	

								<div class="form-group">
									<input class="form-control" type="hidden"  name="status_ca_report_approval" value="<?php echo $row['status_ca_report_approval'];?>">
								</div>
								
								<div class="form-group">
                                    <label>Nama Engineer</label>
                                    <select class="form-control" name="id_engineer">
                                    <option>---- Pilih Engineer ----</option>
                                    <option selected value="<?php echo $row['id_engineer'];?>"><?php echo $row['nama_engineer'];?></option>
                                    <?php
                                    $sql = mysql_query("SELECT * FROM engineer order by id_engineer asc");
                                    if(mysql_num_rows($sql) != 0){
                                    while($data = mysql_fetch_assoc($sql)){
                                    echo '<option value="'.$data['id_engineer'].'" >'.$data['nama_engineer'].'</option>';
                                        } 
                                    }
                                    ?>
                                </select>
                                </div>

                                  <div class="form-group">
                                	<?php
                                	$sql4 = mysql_query("select ca_request.id_engineer, engineer.nama_engineer from ca_request, engineer where ca_request.id_engineer=engineer.id_engineer and id_ca_request='$id'");
                                	while($row4 = mysql_fetch_assoc($sql4)){
                                	?>
									<input class="form-control" type="hidden" name="nama_engineer1" value="<?php echo $row4['nama_engineer'];?>">
									<? } ?>
								</div>
								
								<div class="form-group">
                                  <label>Status CA Report Approval Manager</label>
                                  <select class = "form-control" name="status_ca_report_approval_manager" required>
                                  <option selected value="<?php echo $row['status_ca_report_approval_manager'];?>"><?php echo $row['status_ca_report_approval_manager'];?></option>
                                  <option>---- Pilih Status ----</option>
                                  <option>Approved</option>                                  
                                  </select>
                                </div>							
								
								<button type="submit" class="btn btn-primary">Update</button>
								<a href="../show-ca-report-approval.php" class="btn btn-default">Back</a>
<?php
}
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