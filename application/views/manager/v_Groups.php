<!--
 - Groups Editor  
 -
 - @Author	Thutsaneeya Chanrong 
 - @Create Date 27-01-2564
-->
<div class="panel panel-primary">
    <div  class="panel-heading" style=" font-size: 28px; ">Group Editor</div>
    <div class="panel-body">	
		<table id="example" class="table table-striped table-bordered no-footer dataTable" style="width:100%">
			<thead>
				<tr>
					<th>ลำดับ</th>
					<th>กลุ่ม</th>
				</tr>
			</thead>
		</table>
	</div>
</div>

<!-- member -->
<div id="modal_member" class="modal fade in"  tabindex="-1" role="dialog" style="display: none;">
	<div class="modal-dialog" id="edit_dialog">
			<div class="modal-content">
				<div class="modal-header bg-blue">
					<h3 style="padding-top: 1rem;padding-left: 1rem;display: inline" class="modal-title">หน้าแสดงสมาชิก</h3>
					<button style="margin: initial;opacity:0.75" type="button" class="close" data-dismiss="modal" aria-label="ยกเลิก">
						<span aria-hidden="true" style=" font-size: 34px; font-weight: 700; ">×</span>
					</button>
				</div>
				<div class="modal-body">

					<table id="example1" class="table table-striped table-bordered no-footer dataTable" style="width:100%">
					<tr>
								<th>ลำดับ</th>
								<th>ชื่อ-นามสกุล</th>
								<th>ชื่อผู้ใช้งาน</th>
								<th>หน้าที่</th>
							</tr>
					</table>
				</div>
				<div class="modal-footer">
					<!-- <button type="button" data-content="remove" class="btn btn-danger " data-dismiss="modal" style="margin-right: 75%;">ยกเลิก</button>
					<button type="submit" form="altEditor-add-form" data-content="remove" class="btn btn-success" id="addRowBtn">บันทึก</button> -->
				</div>
			</div>
	</div>
</div>

<script>

	function numberWithCommas(x) {
		var raw_number = parseInt(x);
		return raw_number.toLocaleString();
	}
	var columnDefs = [
		{  title: "ลำดับ",
                data: 1,
                type:"hidden",
                disabled:"true",
                render: function (data, type, row, meta) {
					console.log(row)
                    if (data == null || !(data in Options_role)) return null;
                    return 2;
                },
                width: "10%",
				className: "text-center"
		},
		{ data: "group_name"}
	];
	var myTable;
	// local URL's are not allowed
	var url_get = "<?php echo site_url("Source_manager/get_name_group/");?>"

	/**
	 * Setup User Interface.
	 *
	 * @Author	Thutsaneeya Chanrong       
	 * @Create Date	11-02-2564
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
		dom: 'Bfrtip', // element order: NEEDS BUTTON CONTAINER (B) ****
		select: 'single', // enable single row selection
		responsive: true, // enable responsiveness
		altEditor: false, // Enable altEditor ****
		buttons: [{
				extend: 'selected', // Bind to Selected row
				text: '<i class="fa fa-user"></i> สมาชิก',
				name: 'edit', // DO NOT change name
				"className": 'btn btn-info btn-lg',
				action: function ( e, dt, node, config ) {
					$("#modal_member").modal();
				}
			}
		]
	});
	myTable.on( 'order.dt search.dt', function () {
		myTable.column(0, {search:'applied', order:'applied'}).nodes().each( function (cell, i) {
			cell.innerHTML = `${i+1}.`;
		});
		}).draw();
	
	let group_id;
	$('#example tbody').on('click','tr', function(){
		group_id = myTable.row(this).id();
		// console.log(group_id);
	});
	
	var myTb;
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
		{ title: "ชื่อ-นามสกุล",
			data: "name" 
		},
		{ title: "Username",
			data: "username" 
		},
		{ title: "หน้าที่",
			data: "role" 
		}
	];	
	
	/**
	 * Setup Modal Interface.
	 *
	 * @Author	Thutsaneeya Chanrong       
	 * @Create Date	12-02-2564
	 */
	$('#example_wrapper > div.dt-buttons > button').on('click', function (){

		var url_get_member = '<?php echo site_url("Source_manager/get_member_by_group/");?>'+ `${group_id.toString()}`

		// console.log(group_id);
		myTb = $('#example1').DataTable({
			"sPaginationType": "full_numbers",
			"destroy": true,
			ajax: {
				"url": url_get_member,
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
		myTb.on( 'order.dt search.dt', function () {
			myTb.column(0, {search:'applied', order:'applied'}).nodes().each( function (cell, i) {
				cell.innerHTML = `${i+1}.`;
			});
		}).draw();
	});
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