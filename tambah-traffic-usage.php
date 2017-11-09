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
<!-- <link href="/css/datepicker3.css" rel="stylesheet"> -->
<link href="/css/bootstrap-table.css" rel="stylesheet">
<link href="/css/styles.css" rel="stylesheet">
<!-- <link rel="stylesheet" type="text/css" media="screen" href="http://tarruda.github.com/bootstrap-datetimepicker/assets/css/bootstrap-datetimepicker.min.css"> -->
<!--link href="http://netdna.bootstrapcdn.com/twitter-bootstrap/2.2.2/css/bootstrap-combined.min.css" rel="stylesheet"-->
<!--link rel="stylesheet" href="/css/bootstrap-datetimepicker-standalone.css"-->
<link rel="stylesheet" href="/css/bootstrap-datetimepicker-standalone.min.css">
<!-- link rel="stylesheet" href="/css/bootstrap-datetimepicker.css"-->
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
				<li class="active">Traffic Usage</li>
			</ol>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Tambah Traffic Usage</h1>
			</div>
		</div><!--/.row-->
				
		
		<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default">
					<!--<div class="panel-heading">Stok Masuk</div>-->
					<div class="panel-body">
						<div class="col-md-6">
							<form data-toggle="validator" role="form" action="proses-traffic-usage.php" method="post">

								<div class="form-group">
<div class="form-group">
	<label>Select Backbone or BTS</label>
	<select class="form-control" name="id_circuit" required>
	<option> </option>
	<?php
	include "koneksi.php";
	$sql1 = mysql_query("select * from circuit order by id_circuit");
	$sql2 = mysql_query("select * from bts order by id_bts");
	while ($data=mysql_fetch_assoc($sql1)){
	?>
	<option value="<?php print "bac-".$data['id_circuit'] ?>"><?php print "BACKBONE-".$data['nama_circuit'] ?></option>
	<?php } ?>
	<?php
	while ($data=mysql_fetch_assoc($sql2)){
	?>
	<option value="<?php print "bts-".$data['id_bts'] ?>"><?php print "BTS-".$data['nama_bts']?></option>
	<?php } ?>

	</select>
</div>

<div class="form-group">
	<table width="100%">
	<tr>
	<td><label>Download Capacity (mbps)</label></td>
	<td><label>Upload Capacity (mbps)</label></td>
	</tr>
	<tr>
	<td><input type="text" name="capacity_down" class="form-control" required></td>
	<td><input type="text" name="capacity_up" class="form-control" required></td>
	</tr>
	</table>	
</div>

<div class="form-group">
	<label>Select Period</label>
	<select class="form-control" name="periode" required>
	<option> </option>
	<option value="<?php print date('Y-m') ?>"><?php print date('F, Y')?></option>
	<option value="<?php print date('Y-m', strtotime('-1 month')) ?>"><?php print date('F, Y', strtotime('-1 month'))?></option>
	<option value="<?php print date('Y-m', strtotime('-2 month')) ?>"><?php print date('F, Y', strtotime('-2 month'))?></option>
	<option value="<?php print date('Y-m', strtotime('-3 month')) ?>"><?php print date('F, Y', strtotime('-3 month'))?></option>
	<option value="<?php print date('Y-m', strtotime('-4 month')) ?>"><?php print date('F, Y', strtotime('-4 month'))?></option>
	<option value="<?php print date('Y-m', strtotime('-5 month')) ?>"><?php print date('F, Y', strtotime('-5 month'))?></option>
	<option value="<?php print date('Y-m', strtotime('-6 month')) ?>"><?php print date('F, Y', strtotime('-6 month'))?></option>
	<option value="<?php print date('Y-m', strtotime('-7 month')) ?>"><?php print date('F, Y', strtotime('-7 month'))?></option>
	<option value="<?php print date('Y-m', strtotime('-8 month')) ?>"><?php print date('F, Y', strtotime('-8 month'))?></option>
	<option value="<?php print date('Y-m', strtotime('-9 month')) ?>"><?php print date('F, Y', strtotime('-9 month'))?></option>
	<option value="<?php print date('Y-m', strtotime('-10 month')) ?>"><?php print date('F, Y', strtotime('-10 month'))?></option>
	<option value="<?php print date('Y-m', strtotime('-11 month')) ?>"><?php print date('F, Y', strtotime('-11 month'))?></option>
	<option value="<?php print date('Y-m', strtotime('-12 month')) ?>"><?php print date('F, Y', strtotime('-12 month'))?></option>
	<option value="<?php print date('Y-m', strtotime('-13 month')) ?>"><?php print date('F, Y', strtotime('-13 month'))?></option>
</select>
</div>

<div class="form-group">
        <table width="100%">
        <tr>
        <td><label>Download Usage (mbps)</label></td>
        <td><label>Upload Usage (mbps)</label></td>
        </tr>
        <tr>
        <td><input type="text" name="usage_down" class="form-control" required></td>
        <td><input type="text" name="usage_up" class="form-control" required></td>
        </tr>
        </table>
</div>
<button type="submit" class="btn btn-primary">Create Report</button>
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
	<script src="/js/moment.js"></script>
	<script type="text/javascript" src="/js/bootstrap-datetimepicker.min.js"></script>
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
<!-- 	<script type="text/javascript"
     src="http://cdnjs.cloudflare.com/ajax/libs/jquery/1.8.3/jquery.min.js">
    </script> 
    <script type="text/javascript"
     src="http://netdna.bootstrapcdn.com/twitter-bootstrap/2.2.2/js/bootstrap.min.js">
    </script> -->
<!--     <script type="text/javascript"
     src="http://tarruda.github.com/bootstrap-datetimepicker/assets/js/bootstrap-datetimepicker.min.js">
    </script>
    <script type="text/javascript"
     src="http://tarruda.github.com/bootstrap-datetimepicker/assets/js/bootstrap-datetimepicker.pt-BR.js">
    </script> -->
<!--     <script type="text/javascript">
      $('#datetimepicker').datetimepicker({
        format: 'yyyy-mm-dd hh:mm:ss',
        language: 'pt-BR'
      });
    </script>	 -->

</body>

</html>
