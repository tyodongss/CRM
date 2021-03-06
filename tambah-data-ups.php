<?php
date_default_timezone_set('Asia/Makassar');
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
				<li class="active">Management UPS</li>
			</ol>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Tambah Checklist UPS</h1>
			</div>
		</div><!--/.row-->
				
		
		<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default">
					<!--<div class="panel-heading">Stok Masuk</div>-->
					<div class="panel-body">
						<div class="col-md-6">
<?php
include "koneksi.php";
$quer_bts = mysql_query("select id_bts,nama_bts from bts");
$quer_engineer = mysql_query("select id_engineer,nama_engineer from engineer");
?>


<form action="proses-data-ups.php" method="post">
<div class="form-group">
<label>Pilih BTS</label>
<select name="bts" class="form-control" required>
<option></option>
<?php while ($data=mysql_fetch_array($quer_bts)){ ?>
<option value="<?php print $data['id_bts']?>"><?php print $data['nama_bts']?></option>
<?php } ?>
</select>
</div>

<div class="form-group">
<label>Type UPS</label>
<input type="text" class="form-control" name="typeups" required>
</div>

<div class="form-group">
<label>Type Battery/ACCU</label> <i>if install using external battery</i>
<input type="text" class="form-control" name="typebatt" required>
</div>

<div class="form-group">
<label>Load UPS</label>
<input type="text" class="form-control" name="loadups" required>
</div>

<div class="form-group">
<label>Uptime UPS</label>
<input type="text" class="form-control" name="uptime" required>
</div>

<div class="form-group">
<label>Test Date</label>
<input class="form-control" data-provide="datepicker" data-date-format="yyyy-mm-dd" name="testdate" required>
</div>

<div class="form-group">
<label>Test by</label>
<select name="engineer" class="form-control" required>
<option></option>
<?php while ($data=mysql_fetch_array($quer_engineer)){ ?>
<option value="<?php print $data['id_engineer']?>"><?php print $data['nama_engineer']?></option>
<?php } ?>
</select>
</div>

<input type="hidden" name="menu" value="tambah">
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
</body>

</html>
