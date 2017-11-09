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
				<li class="active">List Notification</li>
			</ol>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">List Notification</h1>
			</div>
		</div><!--/.row-->
				
		<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default">
					<div class="panel-heading">
					<a href="tambah-notification-link.php" class="btn btn-primary btn-md">Publish New Link Notification</a>
					<a href="tambah-notification-maint.php" class="btn btn-primary btn-md">Publish New Maintenance Notification</a>
					</div>
					<div class="panel-body">

<ul class="nav nav-tabs">
  <li class="active"><a data-toggle="tab" href="#opened">Recent Notification</a></li>
  <li><a data-toggle="tab" href="#closed">Past Notification</a></li>
</ul>

<div class="tab-content">
	<div id="opened" class="tab-pane fade in active">
<?php
include "koneksi.php";
$sql1 = mysql_query("select * from notification order by id asc");
?>

	<table data-toggle="table" data-url="tables/data1.json"  data-show-refresh="true" data-show-toggle="true" data-show-columns="true" data-search="true" data-select-item-name="toolbar1" data-pagination="true" >
	<thead>
	 <tr>
		<th data-sortable="true">CATEGORY</th>
		<th data-sortable="true">DESCRIPTION</th>
		<th data-sortable="true">START</th>
		<th data-sortable="true">Click for Update</th>
	 </tr>
	</thead>
	<tbody>
	 <tr>
	<?php while ($data=mysql_fetch_array($sql1)){ ?>
		<td><?php print $data['category'] ?></td>
		<td><?php print $data['description'] ?></td>
		<td><?php print $data['start'] ?></td>
		<td></td>
	</tr>
	<?php } ?>
	</tbody>
	</table>
	</div>

	<div id="closed" class="tab-pane fade">
	<table data-toggle="table" data-url="tables/data1.json"  data-show-refresh="true" data-show-toggle="true" data-show-columns="true" data-search="true" data-select-item-name="toolbar1" data-pagination="true" >
	<thead>
	 <tr>
		<th data-sortable="true">No</th>
		<th data-sortable="true">CATEGORY</th>
		<th data-sortable="true">DESCRIPTION</th>
		<th data-sortable="true">START</th>
		<th data-sortable="true">FINISH</th>
		<th data-sortable="true">#</th>
	 </tr>
	</thead>
	<tbody>
	</tbody>
	</table>
  </div>
</div>
					

	
					</div>
				</div>
			</div>
		</div>
		
		
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



