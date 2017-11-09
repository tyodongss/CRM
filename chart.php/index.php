<html>
<head>
<title>Chart Report</title>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript">

$(document).ready(function() {
	$.ajax({
	url : "data.php?<?php print $_SERVER['QUERY_STRING'] ?>",
	dataType : "JSON",
	success : function(result) {
		google.charts.load('current', {
			'packages' : [ 'corechart' ]
		});
		google.charts.setOnLoadCallback(function() {
			drawChart(result);
		});
	}
});

function drawChart(result) {

	var data = new google.visualization.DataTable();

	data.addColumn('string', 'MONTH');
	data.addColumn('number', 'DOWN');
	data.addColumn('number', 'INTERMITTENT');
	var dataArray = [];
	$.each(result, function(i, obj) {
		dataArray.push([ obj.periode, parseInt(obj.sla_down), parseInt(obj.sla_intermittent) ]);
	});

	data.addRows(dataArray);

	var barchart_options = {
		title : 'Service Level Agreement Chart',
		width : 1000,
		height : 350,
		legend : 'bottom',
		hAxis : {title: 'Month'},
		vAxis : {title: 'Percents', maxValue: 100}
	};

	var barchart = new google.visualization.LineChart(document.getElementById('barchart_div'));
        google.visualization.events.addListener(barchart, 'ready', function () {
                barchart_div.innerHTML = '<a href="' + barchart.getImageURI() + '">' + '<img src="' + barchart.getImageURI() + '">' + '</a>';
                console.log(barchart_div.innerHTML);
        });
	barchart.draw(data, barchart_options);
}
	});
</script>
<script type="text/javascript">

$(document).ready(function() {
        $.ajax({
        url : "data.php?<?php print $_SERVER['QUERY_STRING'] ?>",
        dataType : "JSON",
        success : function(result) {
                google.charts.load('current', {
                        'packages' : [ 'corechart' ]
                });
                google.charts.setOnLoadCallback(function() {
                        drawChart(result);
                });
        }
});

function drawChart(result) {

        var data = new google.visualization.DataTable();

        data.addColumn('string', 'MONTH');
        data.addColumn('number', 'TOTAL ISSUE');
        var dataArray = [];
        $.each(result, function(i, obj) {
                dataArray.push([ obj.periode, parseInt(obj.total_tt) ]);
        });

        data.addRows(dataArray);

        var barchart_options = {
                title : 'Trouble Ticket Chart',
                width : 1000,
		height : 350,
                legend : 'bottom',
                hAxis : {title: 'Month'},
                vAxis : {title: 'Problems'}
        };

        var barchart = new google.visualization.LineChart(document.getElementById('barchart_div2'));
	google.visualization.events.addListener(barchart, 'ready', function () {
		barchart_div2.innerHTML = '<a href="' + barchart.getImageURI() + '">' + '<img src="' + barchart.getImageURI() + '">' + '</a>';
		console.log(barchart_div2.innerHTML);
	});
        barchart.draw(data, barchart_options);
}
	
        });
</script>


</head>
<body>
<?php 

$id = $_GET['id_circuit'];
$bulan1 = $_GET['id_bulan1'];
$bulan2 = $_GET['id_bulan2'];
$tahun1 = $_GET['id_tahun1'];
$tahun2 = $_GET['id_tahun2'];
$menu = $_GET['menu'];

$date1fix = $tahun1.'-'.$bulan1;
$date2fix = $tahun2.'-'.$bulan2;

include '../koneksi.php';

if ($menu == "sum"){

	$quer = mysql_query("select circuit.nama_circuit, backbone_history.periode, backbone_history.sla_down, backbone_history.sla_intermittent from circuit,backbone_history where backbone_history.id_circuit=circuit.id_circuit and backbone_history.id_circuit='$id' order by periode asc");
	$quer2 = mysql_query("select circuit.nama_circuit, backbone_history.periode, backbone_history.total_tt from circuit,backbone_history where backbone_history.id_circuit=circuit.id_circuit and backbone_history.id_circuit='$id' order by periode asc");

} else if ($menu == "3month"){

$periodend      = date('Y-m');
$periodstart    = date('Y-m', strtotime('-2 month'));

 	$quer = mysql_query("select circuit.nama_circuit, backbone_history.periode, backbone_history.sla_down, backbone_history.sla_intermittent from circuit,backbone_history where backbone_history.id_circuit=circuit.id_circuit and backbone_history.id_circuit='$id' and periode >= '$periodstart' and periode <= '$periodend' order by periode asc");
	$quer2 = mysql_query("select circuit.nama_circuit, backbone_history.periode, backbone_history.total_tt from circuit,backbone_history where backbone_history.id_circuit=circuit.id_circuit and backbone_history.id_circuit='$id' and periode >= '$periodstart' and periode <= '$periodend' order by periode asc");

} else {

	$quer = mysql_query("select circuit.nama_circuit, backbone_history.periode, backbone_history.sla_down, backbone_history.sla_intermittent from circuit,backbone_history where backbone_history.id_circuit=circuit.id_circuit and backbone_history.id_circuit='$id' and periode >= '$date1fix' and periode <= '$date2fix' order by periode asc");
	$quer2 = mysql_query("select circuit.nama_circuit, backbone_history.periode, backbone_history.total_tt from circuit,backbone_history where backbone_history.id_circuit=circuit.id_circuit and backbone_history.id_circuit='$id' and periode >= '$date1fix' and periode <= '$date2fix' order by periode asc");

}

?>
<table class="columns">
<tr>
<td>
	<div id="barchart_div" style="border: 3px solid #ccc"></div>
	<p align="center"><font face="Arial">SLA Chart<br /></p>
</td>
<td valign="top">
	<table class="columns" width="100%">
	<thead>
	<tr>
		<th>Circuit ID</th>
		<th>Periode</th>
		<th>SLA Down</th>
		<th>SLA Intermittent</th>
	</tr>
	</thead>
	<?php while($data=mysql_fetch_array($quer)){ ?>
	<tr align="center">
		<td><?php print $data['nama_circuit'] ?></td>
		<td><?php print $data['periode'] ?></td>
		<td><?php print $data['sla_down'] ?>%</td>
		<td><?php print $data['sla_intermittent'] ?>%</td>
	</tr>
	<?php } ?>
	</table>
</td>
</tr>
<td>
	<div id="barchart_div2" style="border: 3px solid #ccc"></div>
	<p align="center"><font face="Arial">Trouble Ticket Chart<br /></p>
</td>
<td valign="top">
        <table class="columns" width="100%">
        <thead>
        <tr>
                <th>Circuit ID</th>
                <th>Periode</th>
		<th>Total Trouble Ticket</th>
        </tr>
        </thead>
        <?php while($data=mysql_fetch_array($quer2)){ ?>
        <tr align="center">
                <td><?php print $data['nama_circuit'] ?></td>
                <td><?php print $data['periode'] ?></td>
		<td><?php print $data['total_tt']?> Issues</td>
        </tr>
        <?php } ?>
        </table>

</td>
</tr>
</table>
</body>
</html>
