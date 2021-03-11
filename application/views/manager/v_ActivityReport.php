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

<!-- <div class="panel panel-primary">
    <div  class="panel-heading" style=" font-size: 28px; ">
		<i class="fa fa-users"></i> Activity Report of <span id="group-name"></span>
		<div class="pull-right" style="font-size: x-large; font-weight: 200; color: black; margin: auto;">
			<select id="select-opt-year-table-report">
				<option value="" disabled selected>เลือกกลุ่ม</option>
				<?php for($i=1;$i<11;$i++){?> 
					<option value="<?php echo site_url('challenger/index/'.($i)); ?>">Cluster <?php echo $i-1; ?></option>
				<?php } ?>
			</select>
			<span style="color: white; margin-right: 6px">ปี</span>
			<select id="select-opt-group-table-report" style=" margin-bottom: 5px;">
				<option value="2563" diabled>--- เลือกปี ---</option>
				<?php for($i=2554;$i<2565;$i++){?>
				<option value="<?php echo $i; ?>"><?php echo $i; ?></option>
				<?php } ?>
			</select>
		</div>
	</div>
    <div class="panel-body">	
		<table id="example1" class="report table table-striped table-bordered no-footer dataTable" style="width:100%">
			<thead>
				<tr class="report">
					<th class="text-center" rowspan="2" style="width: 5%;vertical-align: middle;">ลำดับ</th>
					<th class="text-center" rowspan="2" style="vertical-align: middle;">ชื่อ</th>
					<th class="text-center" colspan="4">กิจกรรม</th>
				</tr>
				<tr class="report">
					<th class="text-center">Daily Scrum</th>
					<th class="text-center">Sprint Planing</th>
					<th class="text-center">Sprint Review</th>
					<th class="text-center">Sprint Retrospective</th>
				</tr>
			</thead>
		</table>
	</div>
</div> -->
<!-- End table report -->

<div class="panel panel-primary">
    <div  class="panel-heading" style=" font-size: 28px; ">
		<i class="fa fa-television"></i> Activity Report
		<div class="pull-right" style="font-size: x-large; font-weight: 200; color: black; margin: auto;">
			<span style="color: white; margin-right: 6px">ปี</span>
			<select id="select-opt" style=" margin-bottom: 5px;">
				<option value="2564" diabled>--- เลือกปี ---</option>
				<?php for($i=2560;$i<2565;$i++){?>
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
<!-- End chart -->

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
				// console.log('success')
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
				text: 'กิจกรรมของรูปแบบการพัฒนาแบบ Scrum ปีการศึกษา ' + (parseInt(date.substr(0, date.indexOf('-', 0)))+543)
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
				pointFormat: '<tr ><td style="color:{series.color};padding:0">{series.name}: </td>' +
				'<td style="padding:0"><b>{point.y} ครั้ง</b></td></tr>',
				footerFormat: '</table>',
				shared: true,
				useHTML: true,
				style: { "background-color": "#000"}
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

	/**
	 * Name: tableReport
	 * For Load table report
	 * Author: Namchok Singhachai
	 * Date: 27/02/2020
	 */
	// function tableReport(date = "2020-01-01/2020-12-31", group="1")
	// {
	// 	console.log('----------- Table report ----------- ')
	// 	let tableMember;
	// 	let tableDr;
	// 	let tableSr;
	// 	let tableSretr;
	// 	let tableSp;
		
	// 	$.ajax({
	// 		type: "GET",
	// 		url: "<?php //echo site_url("Source_manager/get_activity_with_member");?>" + "/" + date + "/" + group,
	// 		dataType: "JSON",
	// 		success: function (res) {
	// 			tableMember = res.Member
	// 			tableDr = res.DailyScrum
	// 			tableSp = res.SprintPlanning
	// 			tableSretr = res.SprintRetrospect
	// 			tableSp = res.SprintReview
	// 			console.log(res)
	// 			// console.log(tableMember)
	// 			// console.log(tableDr)
	// 			// console.log(tableSp)
	// 			// console.log(tableSretr)
	// 			// console.log(tableSp)
	// 			console.log('success')

	// 			// Define column 
	// 	var columnDefs = [
	// 		{
	// 			title: "ลำดับ",
	// 			data: 1,
	// 			type:"hidden",
	// 			disabled:"true",
	// 			render: function (data, type, row, meta) {
	// 				return 1;
	// 			},
	// 			width: "10%",
	// 			className: "text-center"
	// 		},
	// 		{
	// 			// title: "ชื่อ",
	// 			"data": "user_name"
	// 			// render: function (data, type, row, meta) {
	// 			// 	return data.user_name;
	// 			// }
	// 		},
	// 		{
	// 			// title: "Daily Scrum11",
	// 			data: 1
	// 		},
	// 		{
	// 			// title: "Sprint Planing",
	// 			data: 1
	// 		},
	// 		{
	// 			// title: "Sprint Review",
	// 			data: 1
	// 		},
	// 		{
	// 			// title: "Sprint Retrospective",
	// 			data: 1
	// 		}
	// 	];

	// 	myTable = $('#example1').DataTable({
	// 		"sPaginationType": "full_numbers",
	// 		res,
	// 		columns: columnDefs,  // columns from above
	// 		rowId: 'id',
	// 		"columnDefs": [ {
	// 					"searchable": false,
	// 					"orderable": false,
	// 					"targets": 0
	// 				} ],
	// 		"order": [[ 1, 'asc' ]],
	// 		select: 'single',     // enable single row selection
	// 		responsive: true     // enable responsiveness
	// 	});
	// 	myTable.on( 'order.dt search.dt', function () {
	// 		myTable.column(0, {search:'applied', order:'applied'}).nodes().each( function (cell, i) {
	// 			cell.innerHTML = `${i+1}.`;
	// 		});
	// 	}).draw();

	// 	// var data = myTable
	// 	// 	.rows()
	// 	// 	.data();
		
	// 	// alert( 'The table has '+data.length+' records' );
		
	// 		},
	// 		error: (er) => {
	// 			console.log(er)
	// 			console.log('error')
	// 		}
	// 	});
	// }

	$(document).ready(function () {
		loadChart()
		// tableReport()
		$("#select-opt").on('change', function() {
			let year = parseInt($(this).find(':selected').val())-543;
			let date = `${year}-01-01/${year+1}-12-31`
			if (date != "") 
			{
				console.log('change year success')
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

	.report table , td ,tr ,th {
		border: 0.5px solid #979595 !important;
		border-collapse: collapse; 
	}
	.report table { 
		width: 750px; 
		border-collapse: collapse; 
		margin:50px auto;
	}

	/* Zebra striping */
	.report tr:nth-of-type(odd) { 
		background: #eee; 
	}

	tr { 
		background: #f8f8f8; 
	}

	th { 
		background: #3498db; 
		color: white; 
		text-align: center; 
		font-weight: bold; 
	}

	td, th { 
		padding: 10px; 
		font-size: 18px;
	}

	/* 
	Max width before this PARTICULAR table gets nasty
	This query will take effect for any screen smaller than 760px
	and also iPads specifically.
	*/
	@media 
	only screen and (max-width: 760px),
	(min-device-width: 768px) and (max-device-width: 1024px)  {

	.report table { 
	  	width: 100%; 
	}

	/* Force table to not be like tables anymore */
	.report table, thead, tbody, th, td, tr { 
		display: block; 
	}
	
	/* Hide table headers (but not display: none;, for accessibility) */
	.report thead tr { 
		position: absolute;
		top: -9999px;
		left: -9999px;
	}
	
	.report tr { border: 1px solid #ccc; }
	
	.report td { 
		/* Behave  like a "row" */
		border: none;
		border-bottom: 1px solid #eee; 
		position: relative;
		padding-left: 50%; 
	}

	.report td:before { 
		/* Now like a table header */
		position: absolute;
		/* Top/left values mimic padding */
		top: 6px;
		left: 6px;
		width: 45%; 
		padding-right: 10px; 
		white-space: nowrap;
		/* Label the data */
		content: attr(data-column);

		color: #000;
		font-weight: bold;
	}
</style>