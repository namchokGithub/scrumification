<!--
 - Achievement Report 
 -
 - @Author	Thutsaneeya Chanrong 
 - @Create Date 10-02-2564
-->
<div class="panel panel-primary">
    <div  class="panel-heading" style=" font-size: 28px; ">
		Achievement Report of Cluster  <?php echo $group-1; ?> 
		<div class="pull-right" style="font-size: x-large; font-weight: 200; color: black; margin: auto;">
			<select id="select-opt">
				<option value="">เลือกมกุล</option>
				<?php for($i=1;$i<11;$i++){?>
				<option value="<?php echo site_url('Source_manager/AchievementReport/'.$i); ?>">มกุล <?php echo $i-1; ?></option>
				<?php } ?>
			</select>
		</div>
	</div>
    <div class="panel-body">	
		<table id="example" class="table table-striped table-bordered no-footer dataTable" style="width:100%">
			<thead>
				<tr>
					<th>ลำดับ</th>
					<th>ชื่อรางวัล</th>
					<th>คะแนน</th>
					<th>วันที่</th>
				</tr>
			</thead>
		</table>
	</div>
</div>


<script>
	$(document).ready(function () {
		$("#select-opt").change(function() {
			var $option = $(this).find(':selected');
			var url = $option.val();
			if (url != "") {
				window.location.href = url;
			}
		});
	});
	
    // var myTable;
    
    var url_get;

	let id = <?php echo $group;?>;
	console.log(id)
	if(id == null || id == 0) {
		url_get = "<?php echo site_url("Source_manager/get_achievement_by_group/0");?>";
	} else {
		url_get = '<?php echo site_url("Source_manager/get_achievement_by_group/");?>'+ `${id.toString()}`;
	}

	$.ajax({
		type: "get",
		url: url_get,
		dataType: "JSON",
		success: function (response) {
			console.log(response)
		}
	});

	var columnDefs = [
		{  title: "ลำดับ",
                data: 1,
                type:"hidden",
                disabled:"true",
                render: function (data, type, row, meta) {
                    if (data == null) return null;
                    return 2;
                },
                width: "10%",
				className: "text-center"
		},
		{ data: "achievement_name" },
		{ data: "achievement_point"},
        { 
			data: "created_at",
			render: function(data, type, row, meta) {
				if (data == null) return "ไม่มีข้อมูล";
				else {
					let dateThai = DateThai(data)
					return dateThai
				};
			},
			width: "30%"
		}
	];

	/**
	 * Setup User Interface.
	 *
	 * @Author	Thutsaneeya Chanrong       
	 * @Create Date	10-02-2564
	 */
    myTable = $('#example').DataTable({
		"sPaginationType": "full_numbers",
		ajax: {
			"url": url_get,
			"dataSrc": ""
		},
		columns: columnDefs, // columns from above
		initComplete: function(settings, json) {
			$(".btn").removeClass("dt-button");
		},
		rowId: 'id',
		"columnDefs": [ {
                    "searchable": false,
                    "orderable": false,
                    "targets": 0
                } ],
            "order": [[ 1, 'asc' ]],
		select: 'single', // enable single row selection
		responsive: true, // enable responsiveness
		altEditor: false, // Enable altEditor ****
		lengthChange: false 
	});

    myTable.on( 'order.dt search.dt', function () {
        myTable.column(0, {search:'applied', order:'applied'}).nodes().each( function (cell, i) {
            cell.innerHTML = `${i+1}.`;
        });
    }).draw();

	function DateThai($strDate)
	{
		let dateStr = new Date($strDate);

		strYear = dateStr.getFullYear()+543;
		strMonth= dateStr.getMonth()+1;
		strDate= dateStr.getDate();
		strHour= dateStr.getHours();
		strMinute= dateStr.getMinutes();
		strSeconds= dateStr.getSeconds();
		strMonthCut = Array("","ม.ค.","ก.พ.","มี.ค.","เม.ย.","พ.ค.","มิ.ย.","ก.ค.","ส.ค.","ก.ย.","ต.ค.","พ.ย.","ธ.ค.");
		strMonthThai=strMonthCut[strMonth];
		console.log(strHour)
		if(strHour<10) strHour = '0'+strHour;
		if(strMinute<10) strMinute = '0'+strMinute;
		return `วันที่ ${strDate} ${strMonthThai} ${strYear} เวลา ${strHour}:${strMinute} นาที`;
	}
</script>

<style>
	#edit_dialog{
		width: 800px;
	}
	#color {
		width: 50px;
		height: 40px;
	}

	div,h3,span{
		font-family: prompt !important
	}
	.btn-info {
		background-color: #245dc1 !important;
		border-color: #245dc1 !important;
	}
	.dt-buttons{
		margin-bottom : 10px
	}
	.number_formatter{
		text-align: right;
	}
	table , td ,tr ,th {
		border: 0.5px solid #979595 !important;
		border-collapse: collapse; 
	}
	table { 
		width: 750px; 
		border-collapse: collapse; 
		margin:50px auto;
		}

	/* Zebra striping */
	tr:nth-of-type(odd) { 
		background: #eee; 
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

		table { 
			width: 100%; 
		}

		/* Force table to not be like tables anymore */
		table, thead, tbody, th, td, tr { 
			display: block; 
		}
		
		/* Hide table headers (but not display: none;, for accessibility) */
		thead tr { 
			position: absolute;
			top: -9999px;
			left: -9999px;
		}
		
		tr { border: 1px solid #ccc; }
		
		td { 
			/* Behave  like a "row" */
			border: none;
			border-bottom: 1px solid #eee; 
			position: relative;
			padding-left: 50%; 
		}

		td:before { 
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

	}
	#alteditor-row-type { margin-bottom: 35px; }
</style>