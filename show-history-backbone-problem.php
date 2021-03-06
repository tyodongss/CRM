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
				<li class="active">History Backbone Problem</li>
			</ol>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">History Backbone Problem</h1>
			</div>
		</div><!--/.row-->
				

<?php
include "koneksi.php";
$circuit = mysql_query("select id_circuit,nama_circuit from circuit order by id_circuit");

?>
		
		<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default">
					<div class="panel-heading">
					<a href="tambah-history-backbone-problem.php" class="btn btn-primary btn-md">Add New History</a>
					</div>
					<div class="panel-body">
		

<!-- <form action="#" method="POST"> -->
					
<table width="100%" border=1>
<thead>
<tr>
	<th data-field="nama_circuit"  data-sortable="true">Circuit ID <font size=1></font></th>
	<th data-field="period" data-sortable="true">Periode Report</th>
	<th data-field="sla_down" data-sortable="true">SLA Down</th>
	<th data-field="sla_intermittent" data-sortable="true">SLA Intermittent</th>
	<th data-field="rebuild"></th>
</tr>
</thead>
<tbody>
<?php
include "koneksi.php";
$circuit = mysql_query("select * from circuit where status_circuit='Active'");
$no=0;
while($record = mysql_fetch_array($circuit)){

$id = $record['id_circuit'];
$span = 3; 

?>
<input type="hidden" name="span[]" value="<?php print $span ?>">

        <tr valign="center">
                <td data-field="nama_circuit" data-sortable="true" rowspan="<?php print $span ?>">
		<a href="chart.php/?id_circuit=<?php print $record['id_circuit']?>&menu=3month" alt="View Chart Report">
                        <?php
                        $id = $record['id_circuit'];
                        print $record['nama_circuit'];
                        ?>
		</a>
                        <input type="hidden" name="nama_circuit[]" value="<?php print $record['nama_circuit'] ?>">
                </td>
        <?php
        $sql = mysql_query("select * from backbone_history where id_circuit='$id' order by periode desc limit 3");
        $rowc = mysql_num_rows($sql);
        while ($record2=mysql_fetch_array($sql)){
        ?>
                <td data-field="period" data-sortable="true">
			<input type="hidden" name="periode[]" value="<?php print $record2['id_bulan'] ?>">
			<input type="hidden" name="rowc[]"value="<?php print $rowc ?>">
			<?php print $record2['periode']?></td>
                <td data-field="sla_down" data-sortable="true">
			<input type="hidden" name="sla_down[]"  value="<?php print $record2['sla_down'] ?>%">
			<?php print $record2['sla_down'] ?>%</td>
		<td data-field="sla_intermittent" data-sortable="true">
			<input type="hidden" name="sla_intermittent[]" value="<?php print $record2['sla_down'] ?>%">
			<?php print $record2['sla_intermittent']?>%</td>
                <td data-field="rebuild" align="center">
                        <form action="proses-rebuild-history-backbone-problem.php" method="GET">
                                <input type="hidden" name="id_history" value="<?php print $record2['id_history']?>">
                                <input type="hidden" name="id_circuit" value="<?php print $record2['id_circuit']?>">
                                <input type="hidden" name="periode" value="<?php print $record2['periode']?>">
                                <button type="submit" class="btn btn-primary">Rebuild Data<br></button>
                        </form>
                </td>
        </tr>
	<?php } ?>
<?php } ?>
</tbody>
</table>

<input type="hidden" value="history-backbone-problem" name="menu">
<input type="hidden" value="<?php print $_SESSION['nama_engineer'] ?>" name="nama_engineer">
<input type="hidden" value="<?php print mysql_num_rows($circuit) ?>" name="row">
<div class="form-control" align="center">
<button type="submit" class="btn btn-primary">Export to PDF</button>
</div>
</form>
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



