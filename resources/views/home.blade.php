@extends('layouts.master')

@section('title','Dashboard')
@section('style')
<style type="text/css">
	h1 {
		padding-left: 1.5em;
	}
	hr {
		border: 1px solid #0078ff;
	}
	.card-report {
		height: 8em;
    width: 100%;
    margin-right: 1em;
    background-color: #0078ff;
	}
	.card-report-1 {
		background-color: #ffffff;
		height: 12em;
	    width: 95%;
	    margin-right: 1em;
	    border-radius: 45px/5px;
	    box-shadow: 1px 1px 5px rgba(0,0,0,1);
	    margin-top: 1em;
	}
	.hr-width {
		width: 80%;
	}
	.outline-report {
	    color: #ffffff;
	    font-size: 2.8em;
	    padding-top: 6px;
	    margin-left: .5em;
	    font-weight: bolder;
	    font-family: 'Impact';
	    -webkit-text-stroke:1px #0078ff;
	}
	.btn-margin{
		margin-top: .5em;
		margin-left: 8em;
	}
</style>
@endsection
@section('content')
<div class="row mb-3">
	<div class="col-sm-3">
		<div class="card-report bg-1">
            <div class="outline-1"><i class="mdi mdi-church"></i>{{ $baptismal }}</div>
            <div class="outline-2">Total number of</div>
            <div class="outline-2">baptismal records</div>
        </div>
	</div>
	<div class="col-sm-3">
		<div class="card-report bg-1">
            <div class="outline-1"><i class="typcn typcn-document"></i>{{ $confirmation }}</div>
            <div class="outline-2">Total number of</div>
            <div class="outline-2">confirmation records</div>
        </div>
	</div>
	<div class="col-sm-3">
		<div class="card-report bg-1">
            <div class="outline-1"><i class="mdi mdi-heart-box-outline"></i>{{ $marriage }}</div>
            <div class="outline-2">Total number of</div>
            <div class="outline-2">marriage records</div>
        </div>
	</div>
	<div class="col-sm-3">
		<div class="card-report bg-1">
            <div class="outline-1"><i class="typcn typcn-clipboard"></i>{{ $communion }}</div>
            <div class="outline-2">Total number of</div>
            <div class="outline-2">first communion records</div>
        </div>
	</div>
</div>
<section class="pt-1">
	<div class="row">
		<div class="col-md-12 grid-margin">
			<div class="card">
				<div class="card-body">
					<canvas id="mixed-chart" height="100"></canvas>
					<div class="mr-5" id="mixed-chart-legend"></div>
				</div>
			</div>
		</div>
	</div>
</section>
<script type="text/javascript">
	 $(function () {
        'use strict';
        if ($("#mixed-chart").length) {
          var chartData = {
            labels: ['Cathedral', 'San Lorenzo Parish', 'San Roque Parish', 'Holy Cross Parish', 'Redemptorist Parish', 'Sto Rosario Parish', 'Corpus Christi Parish'],
            datasets: [{
              type: 'line',
              label: 'Marriage',
              data: {{json_encode($data_mar)}},
              backgroundColor: ChartColor[2],
              borderColor: ChartColor[2],
              borderWidth: 3,
              fill: false,
            }, {
              type: 'bar',
              label: 'Baptismal',
              data: {{json_encode($data_bap)}},
              backgroundColor: ChartColor[0],
              borderColor: ChartColor[0],
              borderWidth: 2
            }, {
              type: 'bar',
              label: 'Confirmation',
              data: {{json_encode($data_con)}},
              backgroundColor: ChartColor[1],
              borderColor: ChartColor[1]
            }]
          };
          var MixedChartCanvas = document.getElementById('mixed-chart').getContext('2d');
          lineChart = new Chart(MixedChartCanvas, {
            type: 'bar',
            data: chartData,
            options: {
              responsive: true,
              title: {
                display: true,
                text: 'Baptismal, Confirmation and Marriage Records in year 2020'
              },
              scales: {
                xAxes: [{
                  display: true,
                  ticks: {
                    fontColor: '#212229',
                    stepSize: 50,
                    min: 0,
                    max: 150,
                    autoSkip: true,
                    autoSkipPadding: 15,
                    maxRotation: 0,
                    maxTicksLimit: 10
                  },
                  gridLines: {
                    display: false,
                    drawBorder: false,
                    color: 'transparent',
                    zeroLineColor: '#eeeeee'
                  }
                }],
                yAxes: [{
                  display: true,
                  scaleLabel: {
                    display: true,
                    labelString: 'Number of Records',
                    fontSize: 12,
                    lineHeight: 2
                  },
                  ticks: {
                    fontColor: '#212229',
                    display: true,
                    autoSkip: false,
                    maxRotation: 0,
                    stepSize: 20,
                    min: 0,
                    max: 100
                  },
                  gridLines: {
                    drawBorder: false
                  }
                }]
              },
              legend: {
                display: false
              },
              legendCallback: function (chart) {
                var text = [];
                text.push('<div class="chartjs-legend d-flex justify-content-center mt-4"><ul>');
                for (var i = 0; i < chart.data.datasets.length; i++) {
                  console.log(chart.data.datasets[i]); // see what's inside the obj.
                  text.push('<li>');
                  text.push('<span style="background-color:' + chart.data.datasets[i].borderColor + '">' + '</span>');
                  text.push(chart.data.datasets[i].label);
                  text.push('</li>');
                }
                text.push('</ul></div>');
                return text.join("");
              }
            }
          });
          document.getElementById('mixed-chart-legend').innerHTML = lineChart.generateLegend();
        }
        if ($("#areaChart").length) {
          var gradientStrokeFill_1 = lineChartCanvas.createLinearGradient(1, 2, 1, 280);
          gradientStrokeFill_1.addColorStop(0, "rgba(20, 88, 232, 0.37)");
          gradientStrokeFill_1.addColorStop(1, "rgba(255,255,255,0.4)")
          var lineData = {
            labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep"],
            datasets: [{
              data: [0, 205, 75, 150, 100, 150, 50, 100, 80],
              backgroundColor: gradientStrokeFill_1,
              borderColor: ChartColor[0],
              borderWidth: 3,
              fill: true,
              label: "Marketing"
            }]
          };
          var lineOptions = {
            responsive: true,
            maintainAspectRatio: true,
            plugins: {
              filler: {
                propagate: false
              }
            },
            scales: {
              xAxes: [{
                display: true,
                scaleLabel: {
                  display: true,
                  labelString: 'Month',
                  fontSize: 12,
                  lineHeight: 2
                },
                ticks: {
                  autoSkip: true,
                  autoSkipPadding: 35,
                  maxRotation: 0,
                  maxTicksLimit: 10,
                  fontColor: '#212229'
                },
                gridLines: {
                  display: false,
                  drawBorder: false,
                  color: 'transparent',
                  zeroLineColor: '#eeeeee'
                }
              }],
              yAxes: [{
                display: true,
                scaleLabel: {
                  display: true,
                  labelString: 'Number of user',
                  fontSize: 12,
                  lineHeight: 2
                },
                ticks: {
                  display: true,
                  autoSkip: false,
                  maxRotation: 0,
                  stepSize: 100,
                  min: 0,
                  max: 300
                },
                gridLines: {
                  drawBorder: false
                }
              }]
            },
            legend: {
              display: false
            },
            legendCallback: function (chart) {
              var text = [];
              text.push('<div class="chartjs-legend"><ul>');
              for (var i = 0; i < chart.data.datasets.length; i++) {
                console.log(chart.data.datasets[i]); // see what's inside the obj.
                text.push('<li>');
                text.push('<span style="background-color:' + chart.data.datasets[i].borderColor + '">' + '</span>');
                text.push(chart.data.datasets[i].label);
                text.push('</li>');
              }
              text.push('</ul></div>');
              return text.join("");
            },
            elements: {
              line: {
                tension: 0
              },
              point: {
                radius: 0
              }
            }
          }
          var lineChartCanvas = $("#areaChart").get(0).getContext("2d");
          var lineChart = new Chart(lineChartCanvas, {
            type: 'line',
            data: lineData,
            options: lineOptions
          });
          document.getElementById('area-traffic-legend').innerHTML = lineChart.generateLegend();
        }
      });
</script>
@endsection
