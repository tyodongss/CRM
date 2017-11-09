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
				<li class="active">Notification Database</li>
			</ol>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Create Maintenance Notification</h1>
			</div>
		</div><!--/.row-->
				
		
		<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default">
					<!--<div class="panel-heading">Stok Masuk</div>-->
					<div class="panel-body">
						<div class="col-md-6">
<form action="notif/process.php" method="post">

<div class="form-group">
<label>Maintenance Category</label>
<select class="form-control" name="category" required>
<option> </option>
<option>Scheduled Maintenance</option>
<option>Urgent Maintenance</option>
</select>
</div>

<div class="form-group">
<label>Sender Email</label>
<select class="form-control" name="sender" required>
<option><?php print $_SESSION['email_engineer']?></option>
<option selected>helpdesk@satnetcom.com</option>
<option>noc@satnetcom.com</option>
</select>
</div>

<div class="form-group">
<label>Email CC's</label> <i> separated with comma</i>
<textarea name="emailcc" class="form-control">
sales1@satnetcom.com
</textarea>
</div>

<div class="form-group">
<label>Customer Email</label><i> separated with comma</a>
<textarea name="emailbcc" class="form-control" required>
</textarea>
</div>

<div class="form-group">
<label>SWOS</label><i>    you must create SWOS for each maintenance</i>
<input type="text" name="swos" class="form-control" required>
</div>

<div class="form-group">
<label>Maintenance Description</label>
<input type="text" name="description" class="form-control" required>
</div>

<div class="form-group">
<label>Date/Time Start</label>
<input type="text" name="start" class="form-control" required value="<?php print date('l, F, d, Y, G:i')?>">
</div>

<div class="form-group">
<label>Date/Time Finish</label>
<input type="text" name="finish" class="form-control" required value="<?php print date('l, F, d, Y, G:i')?>">
</div>

<div class="form-group">
<label>Maintenance Duration</label><i>        in Minutes</i>
<input type="text" name="duration" class="form-control" required value=0>
</div>


<div class="form-group">
<label>Maintenance Coverage</label>
<textarea class="span4 form-control" name="coverage" required>
</textarea>

<div class="form-group">
<label>Note</label><i>     for end customers</i>
<textarea class="span4 form-control" name="note">
</textarea>
</div>

<div class="form-group">
<label>Publishing Method</label>
<select class="form-control" name="publishing" required>
<option> </option>
<option value="savedb">Database Only</option>
<option value="email">Email Only</option>
<option value="emailpdf">Email+PDF</option>
</select>
</div>

<input type="hidden" name="createby" value="<?php print $_SESSION['nama_engineer']?>">
<input type="hidden" name="menu" value="notifmaint">
<button type="submit" class="btn btn-primary">Publish</button>
<button type="reset" class="btn btn-default">Reset</button>
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
