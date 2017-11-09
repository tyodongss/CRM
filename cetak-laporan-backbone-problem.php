<?php 
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

    <div class="row">
        <div class="col-lg-12">
            <center><h1 class="page-header">Laporan Backbone Problem </h1></center>
            
            <?php
            include "koneksi.php";

            $tgl=$_POST['date'];
            $tgl_awal =$_POST['tgl_awal'];
            $tgl_akhir = $_POST['tgl_akhir'];
            $nama_circuit = $_POST['nama_circuit'];
            $tgl_akhir2 =  $_POST['tgl_akhir']." 23:59:00";
 

            ?>
<!--TAMBAHAN-->
<?php
$additional = mysql_query("select circuit.nama_circuit, customer.nama from circuit,customer where circuit.nama_circuit='$nama_circuit' and circuit.id_customer=customer.id_customer;");
$tambahan = mysql_fetch_assoc($additional);
$additional2 = mysql_fetch_assoc(mysql_query("select id_circuit from circuit where nama_circuit='$nama_circuit'"));
?>

      <center>
	<h5>Periode tanggal <b><?php echo $tgl_awal;?></b> sampai <b><?php echo $tgl_akhir;?></b></h5></center>
<?php            

#--- nama_circuit = "All" ---#
if ($nama_circuit=="All"){

# BUAT TABLE 
$sql = "SELECT customer.nama,backbone_problem.id_backbone_problem, backbone_problem.swos, backbone_problem.reff, backbone_problem.id_circuit, backbone_problem.id_backbone, backbone_problem.description, backbone_problem.datetime_start, backbone_problem.datetime_end, backbone_problem.root_cause, backbone_problem.solved_after, backbone_problem.status_backbone_problem, circuit.nama_circuit, backbone.nama_backbone, timediff(datetime_end,datetime_start) as duration
              FROM backbone_problem, circuit, backbone, customer
              WHERE backbone_problem.id_circuit = circuit.id_circuit
              AND backbone_problem.id_backbone = backbone.id_backbone              
	      AND circuit.id_customer = customer.id_customer
              AND datetime_start >= '$tgl_awal'
              AND datetime_start <= '$tgl_akhir2'
              order by backbone.nama_backbone asc";

# TOTAL DOWN
$sql2 = "SELECT SEC_TO_TIME(SUM(TIME_TO_SEC(timediff(datetime_end,datetime_start)))) as total
		from backbone_problem, circuit
		where backbone_problem.id_circuit = circuit.id_circuit
		AND datetime_start >= '$tgl_awal'
		AND datetime_start <= '$tgl_akhir2'
		AND description='Down'";

# TOTAL INTERMITTENT
$sql3 = "SELECT SEC_TO_TIME(SUM(TIME_TO_SEC(timediff(datetime_end,datetime_start)))) as total
                from backbone_problem, circuit
                where backbone_problem.id_circuit = circuit.id_circuit
                AND datetime_start >= '$tgl_awal'
		AND datetime_start <= '$tgl_akhir2'
                AND description='Intermittent'";


#--- nama_circuit != "All" ---#
} else {

$sql = "SELECT customer.nama,backbone_problem.id_backbone_problem, backbone_problem.swos, backbone_problem.reff, backbone_problem.id_circuit, backbone_problem.id_backbone, backbone_problem.description, backbone_problem.datetime_start, backbone_problem.datetime_end, backbone_problem.root_cause, backbone_problem.solved_after, backbone_problem.status_backbone_problem, circuit.nama_circuit, backbone.nama_backbone, timediff(datetime_end,datetime_start) as duration
              FROM backbone_problem, circuit, backbone, customer
              WHERE backbone_problem.id_circuit = circuit.id_circuit
              AND backbone_problem.id_backbone = backbone.id_backbone
	      AND circuit.id_customer = customer.id_customer
              AND nama_circuit =  '$nama_circuit'
              AND datetime_start >= '$tgl_awal'
              AND datetime_start <= '$tgl_akhir2'
              order by datetime_start asc";

# TOTAL DOWN
$sql2 = "SELECT SEC_TO_TIME(SUM(TIME_TO_SEC(timediff(backbone_problem.datetime_end,backbone_problem.datetime_start)))) as total
                from backbone_problem, circuit
                where backbone_problem.id_circuit = circuit.id_circuit
		AND nama_circuit =  '$nama_circuit'
                AND datetime_start >= '$tgl_awal'
                AND datetime_start <= '$tgl_akhir2'
                AND description='Down'";

# TOTAL INTERMITTENT
$sql3 = "SELECT SEC_TO_TIME(SUM(TIME_TO_SEC(timediff(datetime_end,datetime_start)))) as total
                from backbone_problem, circuit
                where backbone_problem.id_circuit = circuit.id_circuit
                AND nama_circuit =  '$nama_circuit'
		AND datetime_start >= '$tgl_awal'
		AND datetime_start <= '$tgl_akhir2'
                AND description='Intermittent'";

}

$hasil = mysql_query($sql); 
$row = mysql_num_rows(mysql_query($sql));
$hasil2 = mysql_query($sql2);
$hasil3 = mysql_query($sql3);

?>

<form action="pdf.php" method="POST">


            <table data-toggle="table" data-url="tables/data1.json"  data-show-refresh="false" data-show-toggle="false" data-show-columns="false" data-search="false" data-select-item-name="toolbar1" data-pagination="false" >
                            <thead>
                            <tr>
                                <th data-field="itemid"  data-filter-control="input">No</th>
                                <th data-field="swos"  data-filter-control="input">SWOS</th>
								<th data-field="reff"  data-filter-control="input">Ticket Partner</th>
                                <th data-field="nama_circuit"  data-filter-control="input">Nama Circuit</th>
                                <th data-field="nama_backbone"  data-filter-control="input">Nama Backbone</th>
                                <th data-field="description" data-filter-control="input">Description</th>
                                <th data-field="datetime_start" data-filter-control="input">Date Time Start</th>
                                <th data-field="datetime_end" data-filter-control="input">Date Time End</th> 
                                <th data-field="duration" data-sortable="true">Duration</th>                               
                                <th data-field="root_cause"  data-filter-control="input">Root Cause</th>
                                <th data-field="solved_after"  data-filter-control="input">Solved After</th>
                                <th data-field="status_backbone_problem"  data-filter-control="input">Status Backbone Problem</th>
                                
                            </tr>
                            </thead>
                            <tbody>
<?php                       
$no=0;
while($record = mysql_fetch_array($hasil)){
?>
                           <tr>
<td data-field="itemid" data-sortable="true"><?php echo $no+1;?><input type="hidden" value="<?php echo $no=$no+1;?>" name="no[]"></td>
<td data-field="swos" data-sortable="true"><?php echo $record['swos'];?><input type="hidden" value="<?php echo $record['swos'];?>" name="swos[]"></td>
<td data-field="reff" data-sortable="true"><?php echo $record['reff'];?><input type="hidden" value="<?php echo $record['reff'];?>" name="reff[]"></td>
<td data-field="nama_circuit" data-sortable="true">
	<?php echo $record['nama_circuit'];?>
	<input type="hidden" value="<?php echo $record['nama_circuit'];?>" name="nama_circuit[]">
</td>
<td data-field="nama_backbone" data-sortable="true"><?php echo $record['nama_backbone'];?><input type="hidden" value="<?php echo $record['nama_backbone'];?>" name="nama_backbone[]"></td>
<td data-field="description" data-sortable="true"><?php echo $record['description'];?><input type="hidden" value="<?php echo $record['description'];?>" name="description[]"></td>
<td data-field="datetime_start" data-sortable="true"><?php echo $record['datetime_start'];?><input type="hidden" value="<?php echo $record['datetime_start'];?>" name="datetime_start[]"></td>
<td data-field="datetime_end" data-sortable="true"><?php echo $record['datetime_end'];?><input type="hidden" value="<?php echo $record['datetime_end'];?>" name="datetime_end[]"></td>
<td data-field="duration" data-sortable="true"><?php echo $record['duration'];?><input type="hidden" value="<?php echo $record['duration'];?>" name="duration[]"></td>
<td data-field="root_cause" data-sortable="true"><?php echo $record['root_cause'];?><input type="hidden" value="<?php echo $record['root_cause'];?>" name="root_cause[]"></td>
<td data-field="solved_after" data-sortable="true"><?php echo $record['solved_after'];?><input type="hidden" value="<?php echo $record['solved_after'];?>" name="solved_after[]"></td>
<td data-field="status_backbone_problem" data-sortable="true"><?php echo $record['status_backbone_problem'];?><input type="hidden" value="<?php echo $record['status_backbone_problem'];?>" name="status_backbone_problem[]"></td>

                            </tr>
<?php
}
?>  
                                                
                            </tbody>
                        </table>

            <br>

<!--- Information Report --->
<?php 
	if ($nama_circuit!="All"){
?>




<table border=1 class="table table-striped">
<tr>
<td colspan=2 align="center"><h3>Report Information Detail</h3></td>
</tr>
<tr>
<td>
<table class="table table-striped">
	<tbody>
	<tr>
		<td width="30%"><b>Total Duration (DOWN)</b></td>
		<td><b>
		<?php 
			while ($record2 = mysql_fetch_array($hasil2)){ 
			print $record2['total'];
		?>
		<input type="hidden" value="<?php print $record2['total'];?>" name="totdown">
		</b></td>
	</tr>
	<tr>
		<td width="30%"><b>Total TTR (DOWN)</b></td>
		<td><b>
		<?php
			$time = $record2['total'];
			function time_to_decimal($time){
				$timeArr = explode(':', $time);
				$decTime = ($timeArr[0]) + ($timeArr[1]/60) + ($timeArr[2]/3600);
				return $decTime;
			}
		$ttr = time_to_decimal($time);
		print round($ttr, 2);
		?>
		<input type="hidden" value="<?php print round($ttr, 2) ?>" name="ttrdown">
		</b></td>
	</tr>
	<tr>
		<td width="30%"><b>KPI</b></td>
		<td><b>
		<?php
			$kalender = CAL_GREGORIAN;
			$bulan = date('m');
			$tahun = date('Y');

			$hari = cal_days_in_month($kalender, $bulan, $tahun);
			$jumlah_hari = $hari*24;

			$kpi = $ttr/$jumlah_hari*100;
			print round($kpi, 2)."%"; 
		?>
		<input type="hidden" value="<?php print round($kpi, 2)."%" ?>" name="kpidown">
		</b></td>
	</tr>
	<tr>
		<td width="30%"><b>SLA</b></td>
		<td><b>
		<?php
			$sla = 100-$kpi;
			print round($sla, 2)."%"; 
		?>
		<input type="hidden" value="<?php print round($sla, 2)?>%" name="sladown">
		</b></td>
	<?php } ?>
	</tr>
	</tbody>
</table>
</td>
<td>
<table class="table table-striped">
	<tbody>
	<tr>
		<td width="30%"><b>Total Duration (INTERMITTENT)</b></td>
		<td><b>
		<?php
		while ($record3 = mysql_fetch_array($hasil3)){
		print $record3['total'];
		?>
		<input type="hidden" value="<?php print $record3['total'];?>" name="totintermittent">
		</b></td>
	</tr>
	<tr>
		<td width="30%"><b>Total TTR (INTERMITTENT)</b></td>
		<td><b>
                <?php
                        $time2 = $record3['total'];
                        function time_to_decimal2($time2){
                                $timeArr2 = explode(':', $time2);
                                $decTime2 = ($timeArr2[0]) + ($timeArr2[1]/60) + ($timeArr2[2]/3600);
                                return $decTime2;
                        }
                $ttr2 = time_to_decimal2($time2);
                print round($ttr2, 2);
                ?>
                <input type="hidden" value="<?php print round($ttr2, 2) ?>" name="ttrintermittent">
		</b></td>
	</tr>
	<tr>
		<td width="30%"><b>KPI</b></td>
		<td><b>
                <?php
                        $kpi2 = $ttr2/$jumlah_hari*100;
                        print round($kpi2, 2)."%";
                ?>
                <input type="hidden" value="<?php print round($kpi2, 2)."%" ?>" name="kpiintermittent">
		</b></td>
	</tr>
	<tr>
		<td width="30%"><b>SLA</b></td>
		<td><b>
                <?php
                        $sla2 = 100-$kpi2;
                        print round($sla2, 2)."%";
                ?>
		<input type="hidden" value="<?php print round($kpi2, 2)."%" ?>" name="slaintermittent">
		</b></td>
		<?php } ?>
	</tr>
</tbody>
</table>

</td>
</tr>
</table>

<?php 
} else {
?>
<h1>
<p align="Center">End Of Report</p><br>
</h1>
<?php } ?>

<input type="hidden" value="<?php print $_SESSION['nama_engineer']?>" name="nama_engineer">
<input type="hidden" value="<?php print $nama_circuit ?>" name="circuit">
<input type="hidden" value="<?php print $row ?>" name="row">
<input type="hidden" value="<?php print $tgl_awal ?>" name="rstart">
<input type="hidden" value="<?php print $tgl_akhir ?>" name="rfinish">
<input type="hidden" value="backbone-problem" name="menu">
<input type="hidden" name="nama_cust" value="<?php print $tambahan['nama']?>">
<?php
if ($nama_circuit!="All"){
?>
<label>Export PDF</label>
<select name="menucat">
	<option value="backbone-problem-internal" selected>Internal Version</option>
	<option value="backbone-problem-cust">Customer Version</option>
</select>
<input type="submit" value="EXPORT TO PDF">
<br>
<iframe src="chart.php/?id_circuit=<?php print $additional2['id_circuit']?>&menu=3month" frameborder=0 width="100%" height=768 scrolling=off>
</iframe>
<? } else { ?>
<input type="submit" value="EXPORT TO PDF">
<?php } ?>



        </div>
    </div><!--/.row-->
</div>


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
