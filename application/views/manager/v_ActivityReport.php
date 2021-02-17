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
		<div class="pull-right" style="font-size: x-large; font-weight: 200; color: black; margin: auto;">
			<span style="color: white; margin-right: 6px">ปี</span>
			<select id="select-opt" style=" margin-bottom: 5px;">
				<option value="2563" diabled>--- เลือกปี ---</option>
				<?php for($i=2554;$i<2565;$i++){?>
				<option value="<?php echo $i; ?>"><?php echo $i; ?></option>
				<?php } ?>
			</select>
		</div>
	</div>
	
    <div class="panel-body">
		<figure class="highcharts-figure">
			<div id="container"></div>
			<p class="highcharts-description">
				กิจกรรมหลักของกระบวนการในรูปแบบวิธีของ Scrum
			</p>
		</figure>
	</div>
</div>

<script>

    /**
	 * Name: loadChart
	 * For Load hight chart
	 * Author: Namchok Singhachai
	 * Date: 12/02/2020
	 */
	async function loadChart(date = "2021-01-01/2021-12-31")
	{
		var SprintPlanning;
		var dataSP = [];
		var SprintReview;
		var dataSR = [];
		var SprintRetrospect;
		var dataSRe = [];
		var DailyScrum;
		var dataDS = [];
		await $.ajax({
			type: "GET",
			url: "<?php echo site_url("Source_manager/get_activity");?>" + "/" + date,
			dataType: "JSON",
			success: function (response) {
				// console.log(response)
				console.log('success')
				SprintPlanning = response["SprintPlanning"];
				SprintReview = response["SprintReview"];
				SprintRetrospect = response["SprintRetrospect"];
				DailyScrum = response["DailyScrum"];
			},
			error: (er) => {
				console.log(er)
				console.log('error')
			}
		}).done(()=>{
				// console.log(SprintPlanning) // for test
				$.each(SprintPlanning, function (index, obj) {
					dataSP.push(parseInt(SprintPlanning[index][0][`group${index+1}`]));
				});
				$.each(SprintReview, function (index, obj) {
					dataSR.push(parseInt(SprintReview[index][0][`group${index+1}`]));
				});
				$.each(SprintRetrospect, function (index, obj) {
					dataSRe.push(parseInt(SprintRetrospect[index][0][`group${index+1}`]));
				});
				$.each(DailyScrum, function (index, obj) {
					dataDS.push(parseInt(DailyScrum[index][0][`group${index+1}`]));
				});
				
		});

		await Highcharts.chart('container', {
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
					data: dataDS
				}, {
					name: 'Sprint planning',
					data: dataSP

				}, {
					name: 'Sprint review',
					data: dataSR

				}, {
					name: 'Sprint retrospective',
					data: dataSRe

				}]
		});
	}

	$(document).ready(function () {
		loadChart()

		$("#select-opt").change(function() {
			let year = parseInt($(this).find(':selected').val())-544;
			let date = `${year}-01-01/${year+1}-12-31`
			if (date != "") 
			{
				loadChart(date)
			} else {
				alert("Incorrent!");
			}
		});
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