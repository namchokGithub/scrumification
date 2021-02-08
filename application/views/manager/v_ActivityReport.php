<!--
 - Activity Report
 -
 - @Author	Namchok Singhachai
 - @Create Date 27-01-2564
-->

<script src="<?php echo base_url('assets/dist/js/highcharts.js'); ?>"></script>
<script src="<?php echo base_url('assets/dist/js/exporting.js'); ?>"></script>
<script src="<?php echo base_url('assets/dist/js/export-data.js'); ?>"></script>
<script src="<?php echo base_url('assets/dist/js/accessibility.js'); ?>"></script>

<div class="panel panel-primary">
    <div  class="panel-heading" style=" font-size: 28px; ">
		<i class="fa fa-television"></i> Activity Report
	</div>
	
    <div class="panel-body">
		<div class="pull-right" style="font-size: x-large;font-weight: 200;">
			<select id="select-opt" style=" margin-bottom: 5px;">
				<option value="1">เลือกปี</option>
				<?php for($i=2555;$i<2570;$i++){?>
				<option value="<?php echo $i; ?>"><?php echo $i; ?></option>
				<?php } ?>
			</select>
		</div>
		<figure class="highcharts-figure">
			<div id="container"></div>
			<p class="highcharts-description">
				กิจกรรมหลักของกระบวนการในรูปแบบวิธีของ Scrum
			</p>
		</figure>
	</div>
</div>

<script>
	Highcharts.chart('container', {
	chart: {
		type: 'column'
	},
	title: {
		text: 'การเข้าร่วมกิจกรรม'
	},
	subtitle: {
		text: 'กิจกรรมของรูปแบบการพัฒนาแบบ Scrum'
	},
	xAxis: {
		categories: [
			'Cluster 0',
			'Cluster 1',
			'Cluster 2',
			'Cluster 3',
			'Cluster 4',
			'Cluster 5',
			'Cluster 6',
			'Cluster 7',
			'Cluster 8',
			'Cluster 9'
		],
		labels: {
			useHTML: true,
			formatter: function() {
				return '<img src="<?php echo base_url('assets/dist/img/cluster/');?>cluster'+this.value.substring(this.value.length-1)+'.png" style="width: 30px; vertical-align: middle" /><span style="font-size:14px;font-weight:700"> '+this.value+'</span>';
			}
		},
        crosshair: true
	},
	yAxis: {
		min: 0,
		title: {
		text: 'จำนวนการเข้าร่วมกิจกรรม (ครั้ง)'
		}
	},
	tooltip: {
		headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
		pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
		'<td style="padding:0"><b>{point.y} ครั้ง</b></td></tr>',
		footerFormat: '</table>',
		shared: true,
		useHTML: true
	},
	plotOptions: {
		column: {
		pointPadding: 0.2,
		borderWidth: 0
		}
	},
	colors: ['#038cfc', '#fc4103', '#fcba03', '#198001'],
	series: [{
			name: 'Daily Scrum',
			data: [9, 7, 10, 12, 14, 16, 13, 14, 2, 19]
		}, {
			name: 'Sprint planning',
			data: [8, 7, 9, 3, 1, 8, 10, 1, 9, 8]

		}, {
			name: 'Sprint review',
			data: [4, 3, 3, 4, 4, 4, 5, 5, 5, 6]

		}, {
			name: 'Sprint retrospective',
			data: [4, 3, 3, 3, 5, 7, 5, 6, 4, 3]

		}]
	});
</script>

<style>
	.highcharts-figure, .highcharts-data-table table {
		min-width: 310px; 
		/* max-width: 800px; */
		margin: 1em auto;
	}

	#container {
	height: 400px;
	}

	.highcharts-data-table table {
		font-family: Verdana, sans-serif;
		border-collapse: collapse;
		border: 1px solid #EBEBEB;
		margin: 10px auto;
		text-align: center;
		width: 100%;
		max-width: 500px;
	}
	.highcharts-data-table caption {
	padding: 1em 0;
	font-size: 1.2em;
	color: #555;
	}
	.highcharts-data-table th {
		font-weight: 600;
	padding: 0.5em;
	}
	.highcharts-data-table td, .highcharts-data-table th, .highcharts-data-table caption {
	padding: 0.5em;
	}
	.highcharts-data-table thead tr, .highcharts-data-table tr:nth-child(even) {
	background: #f8f8f8;
	}
	.highcharts-data-table tr:hover {
	background: #f1f7ff;
	}
</style>