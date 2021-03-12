<!--
 - Leaderboard show chart of score   
 -
 - @Author	Jiranuwat Jaiyen 
 - @Create Date 22-03-2563
 - Update: Namchok Singhachai
-->

<style>
	.kanban ::-webkit-scrollbar {
        width: 15px !important;
    }
    /* Track */
    
    .kanban::-webkit-scrollbar-track {
        box-shadow: inset 0 0 5px #c0c0c0 !important;
        /* border-radius: 5px; */
    }
    /* Handle */
    
    .kanban::-webkit-scrollbar-thumb {
        background: #acacac !important;
        border-radius: 20px !important;
    }
    /* Handle on hover */
    
    .kanban ::-webkit-scrollbar-thumb:hover {
        background: #686868 !important;
    }

	.switch {
		position: relative;
		display: inline-block;
		width: 60px;
		height: 34px;
	}

	.switch input { 
		opacity: 0;
		width: 0;
		height: 0;
	}

	.slider {
		position: absolute;
		cursor: pointer;
		top: 0;
		left: 0;
		right: 0;
		bottom: 0;
		background-color: #ccc;
		-webkit-transition: .4s;
		transition: .4s;
	}

	.slider:before {
		position: absolute;
		content: "";
		height: 26px;
		width: 26px;
		left: 4px;
		bottom: 4px;
		background-color: white;
		-webkit-transition: .4s;
		transition: .4s;
	}

	input:checked + .slider {
		background-color: #2196F3;
	}

	input:focus + .slider {
		box-shadow: 0 0 1px #2196F3;
	}

	input:checked + .slider:before {
		-webkit-transform: translateX(26px);
		-ms-transform: translateX(26px);
		transform: translateX(26px);
	}

	/* Rounded sliders */
	.slider.round {
		border-radius: 34px;
	}

	.slider.round:before {
		border-radius: 50%;
	}
	.slider_text{
		font-size: large;
		display: inline-block;
		height: 100%;
		vertical-align: -webkit-baseline-middle;
		font-weight: 700;
	}
	.highcharts-figure, .highcharts-data-table table {
		min-width: 310px; 
		max-width: 800px;
		margin: 1em auto;
	}
	#container {
		height: 400px;
	}
	.highcharts-data-table table {
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
	text {
		font-weight : 700 !important;
		font-size : 150% !important;
		font-family: prompt;
	}
	span{
		font-family: prompt !important;
	}
	.mobile-table {
		font-size:2vw;
		font-weight:700;
	}
	.highcharts-title tspan{
		font-size:30px
	}
	.highcharts-subtitle tspan{
		font-size:20px
	}
	
	@media only screen and (max-width: 800px) {
		.mobile-table {
			font-size:2.5vw;
			font-weight:700;
		} 
		.tooltip-title-font {
			font-weight : 700 !important;
			font-size : 75% !important;
			font-family: prompt !important;
		} 
		text {
			font-weight : 700 !important;
			font-size : 100% !important;
			font-family: prompt;
		}
		.highcharts-title tspan{
			font-size:22px
		}
		.highcharts-subtitle tspan{
			font-size:20px

		}
	}

	@media only screen and (max-width: 450px) {
		.mobile-table {
			font-size:4vw;
			font-weight:700;
		}
		.tooltip-title-font {
			font-weight : 700 !important;
			font-size : 50% !important;
			font-family: prompt !important;
		} 
		text {
			font-weight : 700 !important;
			font-size : 75% !important;
			font-family: prompt;
		}
			
		.highcharts-title tspan{
			font-size:22px
		}
		.highcharts-subtitle tspan{
			font-size:18px
		}
	}
	table , tr ,td {
		border: 0px !important
	}
	tr:nth-child(even) {background: #d2e8e7}
	tr:nth-child(odd) {background: #b3e4e6}
</style>
<!-- End style -->

<div class="panel panel-primary">
    <div  class="panel-heading" style=" font-size: 28px; ">OSSD</div>
    <div class="panel-body ">
		<div id="container"></div>
    </div>
</div>
<!-- End Panel Leaderboard -->

<?php //if($is_show[0]->status == "Administrator" || $Profile[0] == "ScrumMaster"){ ?>
<div class="panel panel-primary kanban">
    <div  class="panel-heading" style=" font-size: 28px; ">Camp Leader		
		<?php if($Profile[0] == "ScrumMaster" || $Profile[0] == "Administrator"){ ?>
		<div style=" display: inline-flex; position: absolute; right: 30px; ">
			<label class="switch">
				<input type="checkbox" id = "button_topic_show" <?php echo $is_show[0]->status?"Checked":""; ?>>
				<span class="slider round"></span>
			</label>
			<span style="margin-left:5px;font-size: 22px; display: inline-block;height: 100%;align-self: center;">
				เปิดการใช้งาน
			</span>
		</div>
		<?php } ?>
	</div>
	<!-- end panel heading -->

    <div class="panel-body" style="padding:0px !important">
		<div style=" min-height: 400px; height: 50vh; overflow-y: scroll; background-color: white; " class="kanban">
			<table style=" width: 100%; background-color: white; " class="mobile-table ">
			<?php foreach($individual_list as $i => $row){ ?>
			<tr style="border-bottom: 0.5px solid gray;">
				<td style="width:15%;">
					<img src="<?php echo base_url('assets/dist/img/user/'.$row['username'].'.jpg');?>" alt="User Image" onerror="this.onerror=null;this.src='<?php echo base_url('assets/dist/img/user/unknown-who.jpg'); ?>';" style="object-fit: cover; object-position: center;margin: 7px 30px;width: 100px;height: 100px;border-radius: 50%;">
					<div class="widget-user-header" ></div>
				</td>
				<td style="width:50%;">
					<span style="margin-left:20px"><?php echo $row['users_name']; ?></span>
				</td>
				<td style="text-align: -webkit-center;width:30%;">
					<div style="display: flex; flex-direction: row;">
						<div class="widget-user-header " style="width: 50px;background: url('<?php echo base_url('assets/dist/img/trop.png'); ?>') center center;background-position-x: center;height: 70px; background-size: contain; background-repeat: no-repeat;">
						</div>
						<div style="align-self: center;margin-left:15px"><?php echo $row['name_indi']; ?></div>
					</div>
				</td>
			</tr>
			<?php } ?>
			</table>
		</div>
    </div>
	<!-- end panel body -->
</div>
<?php //} ?>
<!-- End panel Leader -->

<script src="<?php echo base_url('assets/dist/js/highcharts.js'); ?>"></script>
<script src="<?php echo base_url('assets/dist/js/exporting.js'); ?>"></script>
<script src="<?php echo base_url('assets/dist/js/export-data.js'); ?>"></script>
<script src="<?php echo base_url('assets/dist/js/accessibility.js'); ?>"></script>

<script>

	/**
	 * for onclick to change status
	 *
	 * @Author	Jiranuwat Jaiyen       
	 * @Create Date	22-03-2563
	 */
	$("#button_topic_show").click(function(){
		// console.log($(this).prop("checked"))
		var myKeyVals = { is_checked : $(this).prop("checked")}
		var saveData = $.ajax({
			type: 'POST',
			url: "<?php echo site_url("Leaderboard/update_status_show/"); ?>",
			data: myKeyVals,
			dataType: "text",
			success: function(resultData) { toastr['success']("ดำเนินการเสร็จสิ้น") }
		});
	})

	/**
	 *  add Commma to string number.
	 *
	 * @Author	Jiranuwat Jaiyen       
	 * @Create Date	22-03-2563
	 * @return mixed
	 */
	function numberWithCommas(x) {
		var raw_number = parseInt(x)
		return raw_number.toLocaleString();
	}

	var gold_url = "<?php echo base_url('assets/dist/img/gold_crown.png'); ?>"
	var sliver_url = "<?php echo base_url('assets/dist/img/sliver_crown.png'); ?>"
	var bronze_url = "<?php echo base_url('assets/dist/img/broezn_crown.png'); ?>"
	var default_formatter = {
			enabled: true,
			useHTML: true,
			verticalAlign: 'top',
			crop: false,
			overflow: 'none',
			x: 0,
			y: -40,
			formatter: function () {
				return '<div style="text-align: center;" class="tooltip-title-font"><br>'+Highcharts.numberFormat(this.y,2)+'</div>'
			}
	}
	var gold_formatter = {
				enabled: true,
				useHTML: true,
				y: -70,
				formatter: function () {
					return '<div style="text-align: center;" class="tooltip-title-font"><img width="45px"  src="'+gold_url+'"></img><br>'+Highcharts.numberFormat(this.y,2)+'</div>'
				}
	}
	var sliver_formatter =  {
				enabled: true,
				useHTML: true,
				y: -70,
				formatter: function () {
					return '<div style="text-align: center;" class="tooltip-title-font"><img width="45px"  src="'+sliver_url+'"></img><br>'+Highcharts.numberFormat(this.y,2)+'</div>'
				}
	}
	var bronze_formatter =  {
				enabled: true,
				useHTML: true,
				y: -70,
				formatter: function () {
					return '<div style="text-align: center;" class="tooltip-title-font"><img width="45px"  src="'+bronze_url+'"></img><br>'+Highcharts.numberFormat(this.y,2)+'</div>'
				}
	}
	// Set data bar chart
	var data_bar_chart = [{
		name: "จำนวนเงิน",
		showInLegend: false, 
		dataLabels: default_formatter,
		data: [{
			y: 0,          
			dataLabels:  gold_formatter
		},{
			y: 0,         
			dataLabels:  sliver_formatter
		},{
			y: 0,         
			dataLabels:  bronze_formatter
		}, { y: 0 }, { y: 0 }, { y: 0 }, { y: 0 }, { y: 0 }, { y: 0 }, { y: 0 }]
		}
	];

	// Set bar char
	var bar_chart = Highcharts.chart('container', {
		chart: {
			type: 'column'
		},
		title: {
			text: 'Open Source Software Developers Camp #9'
		},
		// subtitle: {
		//     text: 'Open Source Software Developers Camp'
		// },
		xAxis: {
			categories: [
				'มกุล 0',
				'มกุล 1',
				'มกุล 2',
				'มกุล 3',
				'มกุล 4',
				'มกุล 5',
				'มกุล 6',
				'มกุล 7',
				'มกุล 8',
				'มกุล 9',
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
				text: 'จำนวนเงิน ($E)'
			}
		},
		tooltip: {
			headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
			pointFormat: '<tr><td style="background-color: white;color:{series.color};padding:0">{series.name}: </td>' +
				'<td style="padding:0;background-color: white;"><b>{point.y:,.2f} $E</b></td></tr>',
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
		series: data_bar_chart
	});

	/**
	 * findIndicesOfMax
	 *
	 * @Author	Jiranuwat Jaiyen       
	 * @Create Date	22-03-2563
	 * @return mixed
	 */
	function findIndicesOfMax(inp, count) {
		var outp = new Array();
		for (var i = 0; i < inp.length; i++) {
			outp.push(i);
			if (outp.length > count) {
				outp.sort(function(a, b) { return inp[b].y - inp[a].y; });
				outp.pop();
			}
		}
		return outp;
	} // End findIndicesOfMax

	/**
	 * Setup Data to Chart
	 *
	 * @Author	Jiranuwat Jaiyen       
	 * @Create Date	22-03-2563
	 * @Update Namchok Singhachai
	 * @return mixed
	 */
	async function set_data_chart(){

		let colorHex;
		let colorTeam;

		colorTeam = [
			{"id":1,"color":"#a6a6a6"},
			{"id":2,"color":"#a6a6a6"},
			{"id":3,"color":"#a6a6a6"},
			{"id":4,"color":"#a6a6a6"},
			{"id":5,"color":"#a6a6a6"},
			{"id":6,"color":"#a6a6a6"},
			{"id":7,"color":"#a6a6a6"},
			{"id":8,"color":"#a6a6a6"},
			{"id":9,"color":"#a6a6a6"},
			{"id":10,"color":"#a6a6a6"},
		]; // For set team color

		await $.ajax({
			type: "GET",
			url: "<?php echo site_url("Leaderboard/getTeamColor"); ?>",
			dataType: "JSON",
			success: function (res) {
				colorTeam = [
					{"id":1,"color":`${res[0]['color']}`},
					{"id":2,"color":`${res[1]['color']}`},
					{"id":3,"color":`${res[2]['color']}`},
					{"id":4,"color":`${res[3]['color']}`},
					{"id":5,"color":`${res[4]['color']}`},
					{"id":6,"color":`${res[5]['color']}`},
					{"id":7,"color":`${res[6]['color']}`},
					{"id":8,"color":`${res[7]['color']}`},
					{"id":9,"color":`${res[8]['color']}`},
					{"id":10,"color":`${res[9]['color']}`},
				]; // For set team color
			}
		});


		await $.get("<?php echo site_url("Leaderboard/get_all_point/"); ?>", function(data, status){
			raw_data = JSON.parse(data);
			function compare( a, b ) {
			if ( parseInt(a.id) < parseInt(b.id) ){
				return -1;
			}
			if ( parseInt(a.id) > parseInt(b.id) ){
				return 1;
			}
			return 0;
			}

			raw_data.sort(compare);
			// console.log('------ Raw data --------')
			// console.log(raw_data)
			// console.log('---- Data bar chart ------')
			// console.log(data_bar_chart)
			
			for (var i = 0; i < raw_data.length; i++){
				data_bar_chart[0].data[i].y = parseInt(raw_data[i].point)	
				data_bar_chart[0].data[i].dataLabels = "";	
				// console.log('y',data_bar_chart[0].data[i].y)
			}

			data_bar_chart[0].data[0].color = colorTeam[0]["color"];
			data_bar_chart[0].data[1].color = colorTeam[1]["color"];
			data_bar_chart[0].data[2].color = colorTeam[2]["color"];
			data_bar_chart[0].data[3].color = colorTeam[3]["color"];
			data_bar_chart[0].data[4].color = colorTeam[4]["color"];
			data_bar_chart[0].data[5].color = colorTeam[5]["color"];
			data_bar_chart[0].data[6].color = colorTeam[6]["color"];
			data_bar_chart[0].data[7].color = colorTeam[7]["color"];
			data_bar_chart[0].data[8].color = colorTeam[8]["color"];
			data_bar_chart[0].data[9].color = colorTeam[9]["color"];
			// console.log(data_bar_chart)
			
			var indices = findIndicesOfMax(data_bar_chart[0].data, 3);

			for (var i = 0; i < indices.length; i++){
				if(i==0){
					data_bar_chart[0].data[indices[i]].dataLabels = gold_formatter
				}
				if(i==1){
					data_bar_chart[0].data[indices[i]].dataLabels = sliver_formatter
				}
				if(i==2){
					data_bar_chart[0].data[indices[i]].dataLabels = bronze_formatter
				}
			}
			bar_chart.update( {
				series: data_bar_chart
			})
		});
	} // End set_data_chart

	$(document).ready(function () {
		set_data_chart();
		setInterval(function(){ set_data_chart(); console.log(1) }, 5000);
	});

</script>