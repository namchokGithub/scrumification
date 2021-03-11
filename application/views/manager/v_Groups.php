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
					<th>ชื่อกลุ่ม</th>
					<th>สี</th>
					<th>รูปภาพ</th>
					<!-- <th>ข้อมูล</th> -->
					<th>สมาชิก</th>
				</tr>
			</thead>
		</table>
	</div>
</div>

<!-- edit -->
<div id="modalEdit" class="modal fade in" tabindex="-1" role="dialog" style=" display: none;">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header bg-blue">
				<h3 style="padding-top: 1rem;padding-left: 1rem;display: inline" class="modal-title">หน้าแก้ไขข้อมูล</h3>
				<button style="margin: initial;opacity:0.75" type="button" class="close" data-dismiss="modal" aria-label="ยกเลิก">
					<span aria-hidden="true" style=" font-size: 34px; font-weight: 700; ">×</span>
				</button>
			</div>
			<div class="modal-body">
				<form name="altEditor-edit-form" id="altEditor-edit-form" role="form">
					<div style="margin-left: initial;margin-right: initial;" class="form-group row" id="group_name_edit">
						<div class="col-sm-3 col-md-3 col-lg-3 text-right" style="padding-top:4px;">
							<label for="group_name_edit">ชื่อกลุ่ม :</label>
						</div>
						<div class="col-sm-8 col-md-8 col-lg-8">
							<input disabled type="text" id="group_name" pattern=".*" title="" name="ชื่อกลุ่ม" placeholder="ชื่อกลุ่ม" data-special="" data-errormsg="" data-uniquemsg="" data-unique="false" style="overflow:hidden" class="form-control  form-control-sm" value="">
							<label id="group_name-label" class="text-danger errorLabel"></label>
						</div>
						<div style="clear:both;"></div>
					</div>
					<div style="margin-left: initial;margin-right: initial;" class="form-group row" id="image_edit">
						<div class="col-sm-3 col-md-3 col-lg-3 text-right" style="padding-top:4px;">
							<label for="image_edit">รูปภาพ:</label>
						</div>
						<div class="col-sm-8 col-md-8 col-lg-8">
							<input type="text" id="image" pattern=".*" title="" name="รูปภาพ" placeholder="รูปภาพ" data-special="" data-errormsg="" data-uniquemsg="" data-unique="false" style="overflow:hidden" class="form-control  form-control-sm" value="">
							<label id="image-label" class="text-danger errorLabel">* แก้ไข Path ของรูปให้ตรงกับข้อมูลในระบบ</label>
						</div>
						<div style="clear:both;"></div>
					</div>
					<div style="margin-left: initial;margin-right: initial;" class="form-group row" id="color_edit">
						<div class="col-sm-3 col-md-3 col-lg-3 text-right" style="padding-top:4px;">
							<label for="color_edit">สี:</label>
						</div>
						<div class="col-sm-8 col-md-8 col-lg-8">
							<input type="color" id="color" name="colore" value="">
							<input type="text" pattern="^#+([a-fA-F0-9]{6}|[a-fA-F0-9]{3})$" value="" id="hexcolor"></input>
							<label id="color-label" class="text-danger errorLabel"></label>
						</div>
						<div style="clear:both;"></div>
					</div>
				</form>
			</div>
			<div class="modal-footer">
				<button type="button" data-content="remove" class="btn btn-danger " data-dismiss="modal" style="margin-right: 75%;">ยกเลิก</button>
				<button type="submit" form="altEditor-delete" data-content="remove" class="btn btn-success" id="EditRowBtn">บันทึก</button>
			</div>
		</div>
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
								<th>ตำแหน่ง</th>
							</tr>
					</table>
				</div>
				<div class="modal-footer">
					
				</div>
			</div>
	</div>
</div>

<!-- Detail -->
<div id="modal_view" class="modal fade in" tabindex="-1" role="dialog" style=" display: none;">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header bg-blue">
				<h3 style="padding-top: 1rem;padding-left: 1rem;display: inline" class="modal-title">หน้าแสดงข้อมูล</h3>
				<button style="margin: initial;opacity:0.75" type="button" class="close" data-dismiss="modal" aria-label="ยกเลิก">
					<span aria-hidden="true" style=" font-size: 34px; font-weight: 700; ">×</span>
				</button>
			</div>
			<div class="modal-body">
				<div style="margin-left: initial;margin-right: initial;" class="form-group row" >
					<div style="margin-left: initial;margin-right: initial;" class="form-group row">
						<div class="col-sm-3 col-md-3 col-lg-3 text-right" style="padding-top:4px;">
							<label>ชื่อกลุ่ม:</label>
						</div>
						<div class="col-sm-8 col-md-8 col-lg-8">
							<span id="group_name_view"></span>
						</div>
						<div style="clear:both;"></div>
					</div>
					<div style="margin-left: initial;margin-right: initial;" class="form-group row" >
						<div class="col-sm-3 col-md-3 col-lg-3 text-right" style="padding-top:4px;">
							<label>รูปภาพ:</label>
						</div>
						<div class="col-sm-8 col-md-8 col-lg-8">
							<div id="img_view" style="width: 120px !important;height: 120px !important;"></div>
						</div>
						<div style="clear:both;"></div>
					</div>
					<div style="margin-left: initial;margin-right: initial;" class="form-group row">
						<div class="col-sm-3 col-md-3 col-lg-3 text-right" style="padding-top:4px;">
							<label>สี:</label>
						</div>
						<div class="col-sm-8 col-md-8 col-lg-8">
							<div id="color_view"></div>
							<div><span id="color_code"></span> </div>
						</div>
						<div style="clear:both;"></div>
					</div>
			</div>
		</div>
	</div>
</div>

<script src="<?php echo base_url('assets/dist/js/tinycolor.js'); ?>"></script>
<script>
	$(document).ready(function () {
		$('#color').on('input', function() {
			$('#hexcolor').val(this.value);
		});
		$('#hexcolor').on('input', function() {
			$('#color').val(this.value);
		});
	});

	function numberWithCommas(x) {
		var raw_number = parseInt(x);
		return raw_number.toLocaleString();
	}

	function checkColor(color){
		if(tinycolor(color).isDark()) {
			return '#fff';
		} else {
			return '#000';
		}
	}

	var myTable;
	var topic_name = "roles"

	// local URL's are not allowed
	var url_get = "<?php echo site_url("Source_manager/get_data_by_group/");?>"
	var url_edit = "<?php echo site_url("Source_manager/edit_data/"); ?>" + topic_name;

	/**
	 * Setup User Interface.
	 *
	 * @Author	Thutsaneeya Chanrong       
	 * @Create Date	11-02-2564
	 */
	var columnDefs = [
		{  
			title: "ลำดับ",
			data: 1,
			type:"hidden",
			disabled:"true",
			render: function (data, type, row, meta) {
				// console.log(row)
				if (data == null || !(data in Options_role)) return null;
				return 2;
			},
			width: "10%",
			className: "text-center"
		},
		{ 
			title: "ชื่อกลุ่ม", data: "group_name"
		},
		{ 
			title: "รูปภาพ", data: "image_path" ,
			render: function (data, type, row, meta) {
				// console.log(`url(${window.location.origin}/gami_ossd/${data}`)
				return `<img width="35" height="35" src="${window.location.origin}/gami_ossd/${data}" alt="">`;
			},
			width: "20%",
			className: "text-center"
		},
		{ 
			title: "สีประจำกลุ่ม", data: "color" ,
			render: function (data, type, row, meta) {
				return `<h5 style="background-color: ${data};border: 4px solid ${data};color: ${checkColor(data)};">${data}</h5>`;
			},
			width: "20%",
			className: "text-center"
		},
		// {
		//   targets: -1,
        //   data: null,
        //   defaultContent: '<center><button id="btn_view" class="btn btn-primary btn-md"><i class="fa fa-info-circle"></i></button></center>',
		//   width: "20%",

		// },
		{
		  targets: -1,
          data: null,
          defaultContent: '<center><button id="btn_member" class="btn btn-info btn-md"><i class="fa fa-users"></i></button></center>',
		  width: "20%",
		}
	];
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
		buttons: [
			{
				extend: 'selected', // Bind to Selected row
				text: '<i class="fa fa-edit"></i> แก้ไขชุดข้อมูล',
				name: 'edit', // DO NOT change name
				"className": 'btn btn-warning btn-lg',
				action: function ( e, dt, node, config ) {
					$("#modalEdit").modal('show');
					$('#hexcolor').val($('#color').val());
           		}
			}
		]
	});
	myTable.on('order.dt search.dt', function () {
		myTable.column(0, {search:'applied', order:'applied'}).nodes().each( function (cell, i) {
			cell.innerHTML = `${i+1}.`;
		});
	}).draw();
	
	let group_data;
	$('#example tbody').on('click','tr', function(){
		group_id = myTable.row(this).id();
		group_data = myTable.row(this).data();
	});
	
	/**
	 * *Setup detail interface.
	 *
	 * @Author	Thutsaneeya Chanrong       
	 * @Create Date	05-03-2564
	 */
	$('#example tbody').on( 'click', '#btn_view', function () {

		var data = myTable.row( $(this).parents('tr') ).data();
		// console.log("data:", data["id"])
		let id = parseInt(data["id"]);
		let c = id-1;
		// console.log(c);

		console.log(data)

		$('#group_name_view').text(data["group_name"]);
		$('#img_view').css("background-image", `url(${window.location.origin+"/gami_ossd/"+data["image_path"]})`);
		
			
		$('#color_view').css("background-color",data["color"]);
		$('#color_code').text(data["color"]);

		$("#modal_view").modal();

	});

	/**
	 * *Setup member interface.
	 *
	 * @Author	Thutsaneeya Chanrong       
	 * @Create Date	12-02-2564
	 */
	$('#example tbody').on( 'click', '#btn_member', function () {
		var myTb;
		var columnDefsMember = [
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
			{ title: "ชื่อผู้ใช้งาน",
				data: "username" 
			},
			{ title: "ตำแหน่ง",
				data: "code" ,
				render: function (data, type, row, meta) {
					if (data == "" || data == null) 
						return row.display_name;
					else
						return data;
				}
			}
		];	
		var group_id = myTable.row( $(this).parents('tr') ).id();
  		console.log("DATA:" , group_id)

		// myTable.ajax.reload();
		var url_get_member = '<?php echo site_url("Source_manager/get_member_by_group/");?>'+ `${group_id}`
		// console.log('AAAAAAAAAAA');

		myTb = $('#example1').DataTable({
			"sPaginationType": "full_numbers",
			"destroy": true,
			ajax: {
				"url": url_get_member,
				"dataSrc": ""
			},
			columns: columnDefsMember, // columns from above
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
		myTb.ajax.reload();
		$("#modal_member").modal();

    } );

	/**
	 * *Setup edit interface.
	 *
	 * @Author	Thutsaneeya Chanrong       
	 * @Create Date	04-03-2564
	 */
	$('#example_wrapper > div.dt-buttons > button.buttons-selected.btn.btn-warning.btn-lg').on('click', function () {
		$('#group_name').val(group_data["group_name"]);
		$('#image').val(group_data["image_path"]);
		$('#color').val(group_data["color"]);
		$('#hexcolor').val($('#color').val());
	});
	
	/**
	 * *Edit group data
	 *
	 * @Author	Thutsaneeya Chanrong       
	 * @Create Date	04-03-2564
	 */
	$('#EditRowBtn').on('click', function () {

		var timestamp = new Date()
		var strDate = timestamp.getFullYear()+"-"+(timestamp.getMonth()+1)+"-"+timestamp.getDate()+" "+timestamp.getHours()+":"+timestamp.getMinutes()+":"+timestamp.getSeconds();
		// console.log(strDate)

		if($('#group_name').val() == '' || $('#image').val() == '' || $('#color').val() == '') {
			if($('#group_name').val() == '') {$('#group_name-label').text("กรุณาบันทึกชื่อ");}
			if($('#image').val() == '') {$('#image-label').text("กรุณาบันทึกที่อยู่ไฟล์");}
			if($('#color').val() == '') {$('#color-label').text("กรุณาบันทึกสี");}

			$('#group_name').on('change', ()=>{
				if($('#group_name').val() != '') {$('#group_name-label').text('');}
			})
			$('#image').on('change', ()=>{
				if($('#image').val() != '') {$('#image-label').text('');}
			})
			$('#color').on('change', ()=>{
				if($('#color').val() != '') {$('#color-label').text('');}
			})

		} else if ($('#group_name').val() != '' && $('#time_end').val() != '' && $('#color').val() != '') {
						console.log('yess')
			let rowdata = {
				color: $('#color').val(),
				name: $('#group_name').val(),
				id :	group_data["id"],
				image_path: $('#image').val(),
				updated_at: strDate
			}
			// console.log("rowdata",rowdata);
			$.ajax({
				// a tipycal url would be /{id} with type='POST'
				url: url_edit,
				type: 'POST',
				async: false,
				data: rowdata,
				success: function() { 
					myTable.ajax.reload(); // Reload data table
					toastr['success']("ดำเนินการเสร็จสิ้น")
				},
				error: (er)=>{console.log(er)}
			});
			$('#modalEdit').modal('hide'); // Close modal
			// location.reload();
			myTable.ajax.reload();
		} // End if check value
	});
	
</script>

<style>
	.text-danger {
		color: #ff0000 !important;
	}
	#color_view { 
		border: thin solid black; 
		width:20px; 
		height:20px; 
		/* background-color: yellow;  */
		word-wrap: break-word; /* words won't go from the boundry */ 
		margin: 10px 20px auto; 
		/* top, left, bottom*/ 
		margin: 0px;
		padding: 5px 5px 5px; 
		float: left; 
	} 
	#img_view{
		width: 250px;
		background-position-x: center;
    	height: 210px;
   		background-size: contain;
    	background-repeat: no-repeat;
    	/* background-repeat-y: no-repeat;
    	background-repeat-x: no-repeat; */
	}
	#edit_dialog{
		width: 800px;
	}

	#color {
		width: 40px;
		height: 30px;
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