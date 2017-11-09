$(document).ready(function(){
	$.ajax({
		url: "http://crm.satnetcom.com/chart.php/data.php",
		method: "GET",
		success: function(data) {
			console.log(data);
			var circuit = [];
			var down = [];

			for(var i in data) {
				circuit.push("ID " + data[i].id_circuit);
				down.push(data[i].sla_down);
			}

			var chartdata = {
				labels: circuit,
				datasets : [
					{
						label: 'Circuit ID',
						backgroundColor: 'rgba(200, 200, 200, 0.75)',
						borderColor: 'rgba(200, 200, 200, 0.75)',
						hoverBackgroundColor: 'rgba(200, 200, 200, 1)',
						hoverBorderColor: 'rgba(200, 200, 200, 1)',
						data: score
					}
				]
			};

			var ctx = $("#mycanvas");

			var barGraph = new Chart(ctx, {
				type: 'bar',
				data: chartdata
			});
		},
		error: function(data) {
			console.log(data);
		}
	});
});
