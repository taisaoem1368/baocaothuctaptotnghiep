<!DOCTYPE HTML>
<html>
<head>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<script>
window.onload = function () {

var limit = 50;    //increase number of dataPoints by increasing the limit
var y = 100;    
var data = [];
var dataSeries = { type: "line" };
var dataPoints = [];
// alert(Math.random());
for (var i = 0; i < limit; i++) {

	y += Math.round(Math.random() * 100 - 50);

	dataPoints.push({
		x: i,
		y: y
	});
}
console.log(dataPoints);
dataSeries.dataPoints = dataPoints;
data.push(dataSeries);

//Better to construct options first and then pass it as a parameter
var options = {
	zoomEnabled: true,
	animationEnabled: true,
	title: {
		text: "Try Zooming - Panning"
	},
	axisY: {
		includeZero: false
	},
	data: data  // random data
};

$("#chartContainer").CanvasJSChart(options);

}
</script>
</head>
<body>
<div class="container">
<canvas id="myChart"></canvas>
<canvas id="myChart2"></canvas>
</div>
  <div id="chartContainer1" style="height: 500px; width: 100%;"></div>


<script src="./chart2.8.0.js"></script>
<script>

var ctx = document.getElementById('myChart').getContext('2d');
var dt = new Date();
// var year = dt.getYear();

var labels_arr = [];
for(var i = 2012; i <= 2020; i++)
{

	labels_arr.push(i);
}

var myChart = new Chart(ctx, {
    type: 'line',
    data: {
        labels: labels_arr,
        datasets: [{
            label: '# of Votes 1',
            data: [12, 19, 3, 8, 2, 3],
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(153, 102, 255, 0.2)',
                'rgba(255, 159, 64, 0.2)'
            ],
            borderColor: [
                'rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)'
            ],
            borderWidth: 1
        }, {
            label: '# of Votes 2',
            data: [10, 9, 30, 50, 20, 31, 3],
            backgroundColor: [
                'rgba(55, 99, 132, 0.2)',
                'rgba(4, 162, 235, 0.2)',
                'rgba(55, 206, 86, 0.2)',
                'rgba(5, 192, 192, 0.2)',
                'rgba(53, 102, 255, 0.2)',
                'rgba(55, 159, 64, 0.2)'
            ],
            borderColor: [
                'rgba(55, 99, 132, 1)',
                'rgba(4, 162, 235, 1)',
                'rgba(55, 206, 86, 1)',
                'rgba(5, 192, 192, 1)',
                'rgba(53, 102, 255, 1)',
                'rgba(55, 159, 64, 1)'
            ],
            borderWidth: 1
		}, 
		{
            label: '# of Votes 3',
            data: [5, 10, 35, 22, 20, 31, 16],
            backgroundColor: [
                'rgba(55, 9, 132, 0.2)',
                'rgba(4, 62, 235, 0.2)',
                'rgba(55, 06, 86, 0.2)',
                'rgba(5, 92, 192, 0.2)',
                'rgba(53, 02, 255, 0.2)',
                'rgba(55, 59, 64, 0.2)'
            ],
            borderColor: [
                'rgba(55, 9, 132, 1)',
                'rgba(4, 62, 235, 1)',
                'rgba(55, 06, 86, 1)',
                'rgba(5, 92, 192, 1)',
                'rgba(53, 02, 255, 1)',
                'rgba(55, 59, 64, 1)'
            ],
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero: true
                }
            }]
        }
    }
});
</script>
</body>
</html>