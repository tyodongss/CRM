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
				<li class="active">Traffic Usage</li>
			</ol>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
<?php 
if ($_GET['cat']==""){
?>
				<h1 class="page-header">Traffic Usage</h1>
<?php } else { ?>
				<h3 class="page-header">Traffic usage <?php print $_GET['cat']?> periode <?php print $_GET['periode']?></h3>
<?php } ?>
			</div>
		</div><!--/.row-->
		<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default">
<?php
if ($_GET['menu']!="detail"){
?>

<div class="panel-heading">
	<a href="tambah-traffic-usage.php" class="btn btn-primary btn-md">Add New Traffic Usage</a>
</div>
					<div class="panel-body">

<ul class="nav nav-tabs">
  <li class="active"><a data-toggle="tab" href="#opened">Backbone</a></li>
  <li><a data-toggle="tab" href="#closed">BTS</a></li>
</ul>

<div class="tab-content">
<div id="opened" class="tab-pane fade in active">
<table data-toggle="table" data-url="tables/data1.json"  data-show-refresh="true" data-show-toggle="true" data-show-columns="true" data-search="true" data-select-item-name="toolbar1" data-pagination="true" >
						  
<thead>
<tr>
	<th>Periode</th>
	<th> </th>
</tr>
</thead>
<tbody>
<tr>
<?php for ($i=0;$i<=13;$i++){ ?>
	<td><?php print date('F, Y', strtotime('-'.$i.' month'))?>
	<td>
	<a href="?menu=detail&cat=circuit&periode=<?php print date('Y-m', strtotime('-'.$i.' month'))?>"><button class="btn btn-default">Detail</button></a>	
	<a href="chart.php/traffic.php?menu=summary&cat=circuit&periode=<?php print date('Y-m', strtotime('-'.$i.' month'))?>"><button class="btn btn-primary">Chart</button></a>
	</td>
</tr>
<?php } ?>
</tbody>
</table>
</div>

<div id="closed" class="tab-pane fade">
<table data-toggle="table" data-url="tables/data1.json"  data-show-refresh="true" data-show-toggle="true" data-show-columns="true" data-search="true" data-select-item-name="toolbar1" data-pagination="true" >

<thead>
<tr>
        <th>Periode</th>
        <th> </th>
</tr>
</thead>
<tbody>
<tr>
<?php for ($i=0;$i<=13;$i++){ ?>
        <td><?php print date('F, Y', strtotime('-'.$i.' month'))?>
        <td>
        <a href="?menu=detail&cat=bts&periode=<?php print date('Y-m', strtotime('-'.$i.' month'))?>"><button class="btn btn-default">Detail</button></a>
        <a href="chart.php/traffic.php?menu=summary&cat=bts&periode=<?php print date('F, Y', strtotime('-'.$i.' month'))?>"><button class="btn btn-primary">Chart</button></a>
        </td>
</tr>
<?php } ?>
</tbody>
</table>

  </div>
</div>
					
<?php 
} else {
?>
<div class="panel-heading">
	<button onclick="goBack()" class="btn btn-primary btn-md">Go Back</button>
	<a href="tambah-traffic-usage.php" class="btn btn-primary btn-md">Add New Traffic Usage</a>
</div>
<script>
function goBack() {
    window.history.back();
}
</script>
<?php include "koneksi.php" ?>
<div class="panel-body">
<?php
$period = $_GET['periode'];
if ($_GET['cat']=="circuit"){
        $query = mysql_query("select circuit.nama_circuit as nama,traffic_usage.id_circuit,traffic_usage.id_traff,traffic_usage.id_circuit,traffic_usage.capacity_down,traffic_usage.capacity_up,traffic_usage.usage_down,traffic_usage.usage_up,traffic_usage.percent_down,traffic_usage.percent_up from traffic_usage,circuit
        where traffic_usage.id_circuit=circuit.id_circuit
        and traffic_usage.notedb='circuit'
        and traffic_usage.periode='$period'
        order by traffic_usage.id_circuit desc");
} else {
        $query = mysql_query("select bts.nama_bts as nama,traffic_usage.id_circuit,traffic_usage.id_traff,traffic_usage.id_circuit,traffic_usage.capacity_down,traffic_usage.capacity_up,traffic_usage.usage_down,traffic_usage.usage_up,traffic_usage.percent_down,traffic_usage.percent_up from traffic_usage,bts
        where traffic_usage.id_circuit=bts.id_bts
        and traffic_usage.notedb='bts'
        and traffic_usage.periode='$period'
        order by traffic_usage.id_circuit desc");
}

?>
<table data-toggle="table" data-url="tables/data1.json"  data-show-refresh="true" data-show-toggle="true" data-show-columns="true" data-search="true" data-select-item-name="toolbar1" data-pagination="true" >
<thead>
<tr>
	<th>Identity</th>
	<th>Capacity Down</th>
	<th>Capacity Up</th>
	<th>Usage Down</th>
	<th>Usage Up</th>
	<th>Percentage Usage Down</th>
	<th>Percentage Usage Up</th>
	<th>#</th>
</tr>
<tbody>
<tr>
<?php
while ($data=mysql_fetch_assoc($query)){
?>
	<td><a href="chart.php/traffic.php?menu=individual&cat=<?php print $_GET['cat']?>&id=<?php print $data['id_circuit']?>"><?php print $data['nama']?></td>
	<td><?php print $data['capacity_down']?> Mbps</td>
        <td><?php print $data['capacity_up']?> Mbps</td>
        <td><?php print $data['usage_down']?> Mbps</td>
        <td><?php print $data['usage_up']?> Mbps</td>
        <td><?php print $data['percent_down']?>%</td>
        <td><?php print $data['percent_up']?>%</td>
	<td>
	<a href="ubah-traffic-usage.php?id=<?php print $data['id_traff']?>"><span class="glyphicon glyphicon-pencil" title="Edit"></span></a>
	<a href="hapus-traffic-usage.php?id=<?php print $data['id_traff']?>"><span class="glyphicon glyphicon-remove" title="Delete"></span></a>
	</td>
</tr>
<?php } ?>
</table>



<?php } ?>	
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



