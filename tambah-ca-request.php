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
				<li class="active">CA Request</li>
			</ol>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Tambah CA Request</h1>
			</div>
		</div><!--/.row-->
				
		
		<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default">
					<!--<div class="panel-heading">Stok Masuk</div>-->
					<div class="panel-body">
						<div class="col-md-6">
							<form data-toggle="validator" role="form" action="proses-ca-request.php" method="post">
							<input type="hidden" name="_token" value="L8C5ujpOh4UEsaNko2Y3pkuzP714OtRymsXPqrNJ">

								<div class="form-group">
									<label>SWOS</label>
									<input class="form-control" name="swos" value="">
								</div>
								
								<div class="form-group">
                                     <label>Budget</label>
                                    <?php    
                                    include "koneksi.php";
                                    $result = mysql_query("SELECT * FROM ca_budget where status_ca_budget='Open' order by judul_ca_budget asc");  
                                    $jsArray = "var prdName = new Array();\n";  
                                    echo '<select class="form-control" name="id_ca_budget" onchange="document.getElementById(\'prd_name\').value = prdName[this.value]">';  
                                    echo '<option>---- Pilih Budget ----</option>';  
                                    while ($row = mysql_fetch_array($result)) {  
                                        echo '<option value="' . $row['id_ca_budget'] . '">' . $row['judul_ca_budget'] . '</option>';  
                                        $jsArray .= "prdName['" . $row['id_ca_budget'] . "'] = '" . addslashes($row['judul_ca_budget']) . "';\n";  
                                    }  
                                    echo '</select>';  
                                    ?>
                                </div>

                                <div class="form-group">
                                    <input class="form-control" type="hidden" name="judul_ca_budget" id="prd_name"/>  
                                    <script type="text/javascript">  
                                    <?php echo $jsArray; ?>  
                                    </script> 
                                </div>

                                 <div class="form-group">
                                     <label>Nama PAA</label>
                                      <?php    
                                      $result2 = mysql_query("SELECT * FROM paa order by nama_paa asc");  
                                      $jsArray2 = "var prdName2 = new Array();\n";  
                                      echo '<select class="form-control" name="id_paa" onchange="document.getElementById(\'prd_name2\').value = prdName2[this.value]">';  
                                      echo '<option>---- Pilih PAA ----</option>';  
                                      while ($row2 = mysql_fetch_array($result2)) {  
                                          echo '<option value="' . $row2['id_paa'] . '">' . $row2['nama_paa'] . '</option>';  
                                          $jsArray2 .= "prdName2['" . $row2['id_paa'] . "'] = '" . addslashes($row2['nama_paa']) . "';\n";  
                                      }  
                                      echo '</select>';  
                                      ?>
                                </div>

                                <div class="form-group">
                                    <input class="form-control" type="hidden" name="nama_paa" id="prd_name2"/>  
                                    <script type="text/javascript">  
                                    <?php echo $jsArray2; ?>  
                                    </script> 
                                </div>
								
								<div class="form-group">
								  <label>Tanggal Request</label>
								  <?php
									$timezone = "Asia/Makassar";
									date_default_timezone_set($timezone);
									$today = date("Y-m-d");
								  ?>
								  <input class="form-control" data-provide="datepicker" data-date-format="yyyy/mm/dd" name="tgl_request" value="<?php echo $today; ?>" readonly>
								</div>
								
								<div class="form-group">
                                     <label>Nama Job To Do</label>
                                      <?php    
                                      $result6 = mysql_query("SELECT * FROM job_to_do2 where status_jobtodo ='Open' order by nama_job_to_do asc");  
                                      $jsArray6 = "var prdName6 = new Array();\n";  
                                      echo '<select class="form-control" name="id_job_to_do" onchange="document.getElementById(\'prd_name6\').value = prdName6[this.value]">';  
                                      echo '<option>---- Pilih Job To Do ----</option>';  
                                      while ($row6 = mysql_fetch_array($result6)) {  
                                          echo '<option value="' . $row6['id_job_to_do'] . '">' . $row6['nama_job_to_do'] . '</option>';  
                                          $jsArray6 .= "prdName6['" . $row6['id_job_to_do'] . "'] = '" . addslashes($row6['nama_job_to_do']) . "';\n";  
                                      }  
                                      echo '</select>';  
                                      ?>
                                </div>

                                <div class="form-group">
                                    <input class="form-control" type="hidden" name="nama_job_to_do" id="prd_name6"/>  
                                    <script type="text/javascript">  
                                    <?php echo $jsArray6; ?>  
                                    </script> 
                                </div>
								
								<div class="form-group">
									<label>Judul CA</label> 
									<input class="form-control" name="judul_ca" value="" required>
                                <div class="help-block with-errors"></div>
								</div>	
								
								<div class="form-group">
									<label>Keterangan CA</label> 
									<input class="form-control" name="keterangan" value="" required>
                                <div class="help-block with-errors"></div>
								</div>	
								
								<div class="form-group">
									<label>Jumlah CA</label> 
									<input class="form-control" name="jumlah" value="" required>
                                <div class="help-block with-errors"></div>
								</div>

								<div class="form-group">
                                     <label>Nama Engineer</label>
                                      <?php    
                                      $result5 = mysql_query("select * from engineer where status='active' order by nama_engineer asc");  
                                      $jsArray5 = "var prdName5 = new Array();\n";  
                                      echo '<select class="form-control" name="id_engineer" onchange="document.getElementById(\'prd_name5\').value = prdName5[this.value]">';  
                                      echo '<option>---- Pilih Engineer ----</option>';  
                                      while ($row5 = mysql_fetch_array($result5)) {  
                                          echo '<option value="' . $row5['id_engineer'] . '">' . $row5['nama_engineer'] . '</option>';  
                                          $jsArray5 .= "prdName5['" . $row5['id_engineer'] . "'] = '" . addslashes($row5['nama_engineer']) . "';\n";  
                                      }  
                                      echo '</select>';  
                                      ?>
                                </div>

                                <div class="form-group">
                                    <input class="form-control" type="hidden" name="nama_engineer1" id="prd_name5"/>  
                                    <script type="text/javascript">  
                                    <?php echo $jsArray5; ?>  
                                    </script> 
                                </div>
								
								<div class="form-group">
                                  <label>Status Approval</label>
                                  <select class = "form-control" name="status_approval" required>
                                  <option>Need Approval</option>
                                  </select>
                                </div>
								
								<div class="form-group">
                                  <label>Status CA Request</label>
                                  <select class = "form-control" name="status_ca_request" required>                                 
                                  <option>Open</option>                                  
                                  </select>
                                </div>
								
								<button type="submit" class="btn btn-primary">Save</button>
								<button type="reset" class="btn btn-default">Reset</button>
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
	<script src="/js/validator.js"></script>
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