<html>
<head>
<title>Chart Report</title>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript">

$(document).ready(function() {
	$.ajax({
	url : "trafficdata.php?<?php print $_SERVER['QUERY_STRING'] ?>",
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

	data.addColumn('string', 'Periode');
	data.addColumn('number', 'Download');
	data.addColumn('number', 'Upload');
	var dataArray = [];
	$.each(result, function(i, obj) {
		dataArray.push([ obj.periode, parseInt(obj.usage_down), parseInt(obj.usage_up) ]);
	});

	data.addRows(dataArray);

	var barchart_options = {
		title : 'Traffic Usage',
		width : 600,
		height : 300,
		legend : 'bottom',
		hAxis : {title: 'Periode'},
		vAxis : {title: 'mbps'}
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

</head>
<body>
<div id="barchart_div" style="border: 2px solid #ccc"></div>
</body>
</html>
