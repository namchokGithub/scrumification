<!--
 - Users Editor  
 -
 - @Author	Jiranuwat Jaiyen 
 - @Create Date 22-03-2563
 - @Update Thutsaneeya Chanrong
 - @Create Date 13-01-2564
-->

<div class="panel panel-primary">
	<div class="panel-heading" style=" font-size: 28px; ">Users Editor</div>
	<div class="panel-body">
		<table id="example" class="table table-striped table-bordered no-footer dataTable" style="width:100%">
			<thead>
				<tr>
					<th>ลำดับ</th>
					<th>ชื่อ - นามสกุล</th>
					<th>ชื่อผู้ใช้งาน</th>
					<th>รหัสผ่าน</th>
					<th>ตำแหน่ง</th>
				</tr>
			</thead>
			<tbody>
			</tbody>
		</table>
	</div>
</div>

<!-- Import -->
<div id="modal_import" class="modal fade in" tabindex="-1" role="dialog" style=" display: none;">
	<div class="modal-dialog" style="width: 70%;">
		<div class="modal-content" style="width: 700px;">
			<div class="modal-header bg-blue">
				<h3 style="padding-top: 1rem;padding-left: 1rem;display: inline" class="modal-title">หน้าเพิ่มไฟล์ข้อมูลผู้เล่น</h3>
				<button id="btn_close_imort_1" style="margin: initial;opacity:0.75" type="button" class="close" data-dismiss="modal" aria-label="ยกเลิก">
					<span aria-hidden="true" style=" font-size: 34px; font-weight: 700; ">×</span>
				</button>
			</div>
			<div class="modal-body">
				<form enctype="multipart/form-data" name="upload" id="upload" role="form">
					<div style="margin-left: initial;margin-right: initial;" class="form-group row" id="alteditor-row-name_del">
						<div class="col-sm-3 col-md-3 col-lg-3 text-right" style="padding-top:4px;">
							<label for="name_del">Upload:</label>
						</div>
						<div class="col-sm-8 col-md-8 col-lg-8">
							<div class="custom-file mb-3">
								<input type="file" name="csv_file" id="csv-file" accept=".csv" style="overflow:hidden" class="form-control  form-control-sm custom-file-input">
								<label  style="color:red">
									**ต้องเป็นไฟล์นามสกุล .csv (Comma delimited) และมีคอลัมน์ name, username, password, code 
									<a href="#modal_img" id="pop" data-toggle="modal" style=" text-decoration: underline;  font-weight: bold;"> ตัวอย่าง</a>
								</label>
							</div>
						</div>
					</div>
				</form>
				<table id="studentUploadCheck" class="table table-striped table-bordered no-footer dataTable" style="width:100%">
					<thead>
						<tr>
							<th>ลำดับ</th>
							<th>ชื่อ-นามสกุล</th>
							<th>ชื่อผู้ใช้งาน</th>
							<th>รหัสผ่าน</th>
							<th>ตำแหน่ง</th>
						</tr>
					</thead>
					<tbody id="tbody"></tbody>
				</table>
			</div>
			<div class="modal-footer">
				<button id="btn_close_imort_2"type="button" data-content="remove" class="btn btn-danger " data-dismiss="modal" style="margin-right: 75%;">ยกเลิก</button>
				<button type="submit" id="btn_import" class="col-md btn btn-success pull-right"> บันทึก </button>
			</div>
		</div>
	</div>
</div>

<!-- Img -->
<div id="modal_img" class="modal fade in" tabindex="-1" role="dialog" style=" display: none;">
	<div class="modal-dialog" style="width: 50%;">
		<div class="modal-content" >
			<div class="modal-header bg-blue">
				<h3 style="padding-top: 1rem;padding-left: 1rem;display: inline" class="modal-title">ตัวอย่างไฟล์ข้อมูลผู้เล่น</h3>
				<button  style="margin: initial;opacity:0.75" type="button" class="close" data-dismiss="modal" aria-label="ยกเลิก">
					<span aria-hidden="true" style=" font-size: 34px; font-weight: 700; ">×</span>
				</button>
			</div>
			<div class="modal-body">
			<div class="card" style="text-align: -webkit-center;cursor: pointer;">
			<div>
				<label  style="color:red;text-align: left;">ไฟล์สำหรับอัปโหลดเข้าสู่ระบบ ต้องเป็นไฟล์นามสกุล .csv (Comma delimited) และมีคอลัมน์ name, username, password, code เท่านั้น</label>
				<img id="myImg" src="<?php echo base_url('assets/dist/img/example/csv_example.png'); ?>"style="width:100%;">
			</div>
		</div>
			</div>
			<div class="modal-footer">
			</div>
		</div>
	</div>
</div>

<!-- Del -->
<div id="modal_del" class="modal fade in" tabindex="-1" role="dialog" style=" display: none;">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header bg-blue">
				<h3 style="padding-top: 1rem;padding-left: 1rem;display: inline" class="modal-title">หน้าลบข้อมูลผู้เล่น</h3>
				<button style="margin: initial;opacity:0.75" type="button" class="close" data-dismiss="modal" aria-label="ยกเลิก">
					<span aria-hidden="true" style=" font-size: 34px; font-weight: 700; ">×</span>
				</button>
			</div>
			<div class="modal-body">
				<form name="altEditor-delete" role="form">
					<div style="margin-left: initial;margin-right: initial;" class="form-group row" id="alteditor-row-name_del">
						<div class="col-sm-3 col-md-3 col-lg-3 text-right" style="padding-top:4px;">
							<label for="name_del">ชื่อ - นามสกุล:</label>
						</div>
						<div class="col-sm-8 col-md-8 col-lg-8">
							<input type="text" id="name_del" pattern=".*" title="" name="ชื่อ - นามสกุล" placeholder="ชื่อ - นามสกุล" data-special="" data-errormsg="" data-uniquemsg="" data-unique="false" style="overflow:hidden" class="form-control  form-control-sm" value="" disabled="">
						</div>
						<div style="clear:both;"></div>
					</div>
					<div style="margin-left: initial;margin-right: initial;" class="form-group row" id="alteditor-row-username_del">
						<div class="col-sm-3 col-md-3 col-lg-3 text-right" style="padding-top:4px;">
							<label for="username_del">ชื่อผู้ใช้งาน:</label>
						</div>
						<div class="col-sm-8 col-md-8 col-lg-8">
							<input type="text" id="username_del" pattern=".*" title="" name="Username" placeholder="ชื่อผู้ใช้งาน" data-special="" data-errormsg="" data-uniquemsg="" data-unique="false" style="overflow:hidden" class="form-control  form-control-sm" value="" disabled="">
						</div>
						<div style="clear:both;"></div>
					</div>
					<input type="hidden" id="password_del" pattern=".*" title="" name="Password" placeholder="Password" data-special="" data-errormsg="" data-uniquemsg="" data-unique="false" style="overflow:hidden" class="form-control  form-control-sm" value="" disabled="">
					<!-- <div style="margin-left: initial;margin-right: initial;" class="form-group row" id="alteditor-row-password_del">
						<div class="col-sm-3 col-md-3 col-lg-3 text-right" style="padding-top:4px;">
							<label for="password_del">Password:</label>
						</div>
						<div class="col-sm-8 col-md-8 col-lg-8">
						</div>
						<div style="clear:both;"></div>
					</div> -->
					<div style="margin-left: initial;margin-right: initial;" class="form-group row" id="alteditor-row-code_del">
						<div class="col-sm-3 col-md-3 col-lg-3 text-right" style="padding-top:4px;">
							<label for="code_del">ตำแหน่ง:</label>
						</div>
						<div class="col-sm-8 col-md-8 col-lg-8">
							<input type="text" id="code_del" pattern=".*" title="" name="หน้าที่" placeholder="ตำแหน่ง" data-special="" data-errormsg="" data-uniquemsg="" data-unique="false" style="overflow:hidden" class="form-control  form-control-sm" value="" disabled="">
						</div>
						<div style="clear:both;"></div>
					</div>
				</form>
			</div>
			<div class="modal-footer">
				<button type="button" data-content="remove" class="btn btn-danger " data-dismiss="modal" style="margin-right: 75%;">ยกเลิก</button>
				<button type="submit" form="altEditor-delete" data-content="remove" class="btn btn-success" id="DelRowBtn">บันทึก</button>
			</div>
		</div>
	</div>
</div>

<!-- Edit -->
<div id="modalEdit" class="modal fade in" tabindex="-1" role="dialog" style=" display: none;">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header bg-blue">
				<h3 style="padding-top: 1rem;padding-left: 1rem;display: inline" class="modal-title">หน้าแก้ไขข้อมูลผู้เล่น</h3>
				<button style="margin: initial;opacity:0.75" type="button" class="close" data-dismiss="modal" aria-label="ยกเลิก">
					<span aria-hidden="true" style=" font-size: 34px; font-weight: 700; ">×</span>
				</button>
			</div>
			<div class="modal-body">
				<form name="altEditor-edit-form" id="altEditor-edit-form" role="form">
					<div style="margin-left: initial;margin-right: initial;" class="form-group row" id="alteditor-row-name_edit">
						<div class="col-sm-3 col-md-3 col-lg-3 text-right" style="padding-top:4px;">
							<label for="name_edit">ชื่อ - นามสกุล:</label>
						</div>
						<div class="col-sm-8 col-md-8 col-lg-8">
							<input type="text" id="name_edit" pattern=".*" title="" name="ชื่อ - นามสกุล" placeholder="ชื่อ - นามสกุล" data-special="" data-errormsg="" data-uniquemsg="" data-unique="false" style="overflow:hidden" class="form-control  form-control-sm" value="">
						</div>
						<div style="clear:both;"></div>
					</div>
					<div style="margin-left: initial;margin-right: initial;" class="form-group row" id="alteditor-row-username_edit">
						<div class="col-sm-3 col-md-3 col-lg-3 text-right" style="padding-top:4px;">
							<label for="username_edit">ชื่อผู้ใช้งาน:</label>
						</div>
						<div class="col-sm-8 col-md-8 col-lg-8">
							<input type="text" id="username_edit" pattern=".*" title="" name="Username" placeholder="ชื่อผู้ใช้งาน" data-special="" data-errormsg="" data-uniquemsg="" data-unique="false" style="overflow:hidden" class="form-control  form-control-sm" value="">
						</div>
						<div style="clear:both;"></div>
					</div>
					<input type="hidden" id="password_edit" pattern=".*" title="" name="Password" placeholder="Password" data-special="" data-errormsg="" data-uniquemsg="" data-unique="false" style="overflow:hidden" class="form-control  form-control-sm" value="">
					<!-- <div style="margin-left: initial;margin-right: initial;" class="form-group row" id="alteditor-row-password_edit">
						<div class="col-sm-3 col-md-3 col-lg-3 text-right" style="padding-top:4px;">
							<label for="password_edit">Password:</label>
						</div>
						<div class="col-sm-8 col-md-8 col-lg-8">
							<input type="hidden" id="password_edit" pattern=".*" title="" name="Password" placeholder="Password" data-special="" data-errormsg="" data-uniquemsg="" data-unique="false" style="overflow:hidden" class="form-control  form-control-sm" value="">
						</div>
						<div style="clear:both;"></div>
					</div> -->
					<div style="margin-left: initial;margin-right: initial;" class="form-group row" id="alteditor-row-code_edit">
						<div class="col-sm-3 col-md-3 col-lg-3 text-right" style="padding-top:4px;">
							<label for="code_edit">ตำแหน่ง:</label>
						</div>
						<div class="col-sm-8 col-md-8 col-lg-8">
							<input type="text" id="code_edit" pattern=".*" title="" name="หน้าที่" placeholder="ตำแหน่ง" data-special="" data-errormsg="" data-uniquemsg="" data-unique="false" style="overflow:hidden" class="form-control  form-control-sm" value="">
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

<!-- Add -->
<div id="modal_input" class="modal fade in"  tabindex="-1"  role="dialog" style="display: none;">
	<div class="modal-dialog" style="width:90%;">
		<div class="modal-content">
			<div class="modal-header bg-blue">
				<h3 style="padding-top: 1rem;padding-left: 1rem;display: inline" class="modal-title">หน้าเพิ่มข้อมูลผู้เล่น</h3>
				<button id="btn_close_add_1"style="margin: initial;opacity:0.75" type="button" class="close" data-dismiss="modal" aria-label="ยกเลิก">
					<span aria-hidden="true" style=" font-size: 34px; font-weight: 700; ">×</span>
				</button>
			</div>
			<div class="modal-body">
				<form name="altEditor-add-form" id="altEditor-add-form" role="form">
					<div style="margin-left: initial;margin-right: initial;" class="form-group row" id="alteditor-row-name">
						<div class="col-sm-3 col-md-3 col-lg-3 text-right" style="padding-top:4px;">
							<label for="name">ชื่อ - นามสกุล:</label>
						</div>
						<div class="col-sm-8 col-md-8 col-lg-8">
							<input type="text" id="name" pattern=".*" title="" name="ชื่อ - นามสกุล" placeholder="ชื่อ - นามสกุล" data-special="" data-errormsg="" data-uniquemsg="" data-unique="false" style="overflow:hidden" class="form-control  form-control-sm" value="">
							<label id="namelabel" class="text-danger errorLabel"></label>
						</div>
					</div>
					<div style="margin-left: initial;margin-right: initial;" class="form-group row" id="alteditor-row-username_edit">
						<div class="col-sm-3 col-md-3 col-lg-3 text-right" style="padding-top:4px;">
							<label for="username">ชื่อผู้ใช้งาน:</label>
						</div>
						<div class="col-sm-8 col-md-8 col-lg-8">
							<input type="text" id="username" pattern=".*" title="" name="Username" placeholder="ชื่อผู้ใช้งาน" data-special="" data-errormsg="" data-uniquemsg="" data-unique="false" style="overflow:hidden" class="form-control  form-control-sm" value="">
							<label id="usernamelabel" class="text-danger errorLabel"></label>
						</div>
					</div>
					<div style="margin-left: initial;margin-right: initial;" class="form-group row" id="alteditor-row-username_edit">
						<div class="col-sm-3 col-md-3 col-lg-3 text-right" style="padding-top:4px;">
							<label for="password">รหัสผ่าน:</label>
						</div>
						<div class="col-sm-8 col-md-8 col-lg-8">
							<input type="text" id="password" pattern=".*" title="" name="Password" placeholder="รหัสผ่าน" data-special="" data-errormsg="" data-uniquemsg="" data-unique="false" style="overflow:hidden" class="form-control  form-control-sm" value="">
							<label id="passwordlabel" class="text-danger errorLabel"></label>
						</div>
					</div>
					<div style="margin-left: initial;margin-right: initial;" class="form-group row" id="alteditor-row-username_edit">
						<div class="col-sm-3 col-md-3 col-lg-3 text-right" style="padding-top:4px;">
							<label for="code">ตำแหน่ง: </label><br>
							<label id="codelabel" class="text-danger errorLabel">(กรณีเป็นสมาชิกไม่ต้องระบุ)</label>
						</div>
					
						<div class="col-sm-8 col-md-8 col-lg-8">
							<input type="text" id="code" pattern=".*" title="" name="หน้าที่" placeholder="ตำแหน่ง" data-special="" data-errormsg="" data-uniquemsg="" data-unique="false" style="overflow:hidden" class="form-control  form-control-sm" value="">
							<label id="codelabel" class="text-danger errorLabel"></label>
						</div>
					</div>
					<div style="margin-left: initial;margin-right: initial;" class="form-group row" id="alteditor-row-username_edit">
						<div class="col-sm-3 col-md-3 col-lg-3 text-right" style="padding-top:4px;">
							<label for="code">บทบาท:</label>
						</div>
						<div class="col-sm-8 col-md-8 col-lg-8">
							<div class="form-group">
								<select id="select_roles" class="form-control">
									<option disabled>เลือก</option>
									<?php foreach($roles as $row){?>
										<option value="<?php echo $row["id"]; ?>"><?php echo $row["display_name"]; ?></option>
									<?php } ?>
								</select>
								<label id="rolelabel" class="text-danger errorLabel"></label>
							</div>
						</div>
					</div>
					<div style="margin-left: initial;margin-right: initial;" class="form-group row" id="alteditor-row-username_edit">
						<!-- <div class="content"> -->
							<button id="btn_add_user_to_table"type="button" class="btn btn-info" style="margin-bottom: 10px; margin-left:90%;">เพิ่ม</button>
						<!-- </div> -->
					</div>
				</form>	
				<div style="margin-left: initial;margin-right: initial;" class="form-group row" id="alteditor-row-username_edit">
				<table id="example1" class="table table-striped table-bordered no-footer dataTable" style="width:100%">
					<thead id="header">
						<tr>
							<th style="width: 10%;">ลำดับ</th>
							<th>ชื่อ-นามสกุล</th>
							<th style="width: 10%">ชื่อผู้ใช้งาน</th>
							<th style="width: 10%">รหัสผ่าน</th>
							<th style="width: 13%">ตำแหน่ง</th>
							<th style="width: 13%">บทบาท</th>
							<th style="width: 10%;">ดำเนินการ</th>
							<!-- <th>role_id</th> -->
						</tr>
					</thead>
					<tbody id="tbody_01"></tbody>
				</table>
				</div>
			</div>
			<div class="modal-footer">
				<button id="btn_close_add_2"type="button" data-content="remove" class="btn btn-danger " data-dismiss="modal" style="margin-right: 80%;">ยกเลิก</button>
				<button type="submit" form="altEditor-add-form" data-content="remove" class="btn btn-success" id="addRowBtn" >บันทึก</button>
			</div>
		</div>
	</div>
</div>

<script >
	
	/**
	 *  add Commma to string number.
	 *
	 * @Author	Jiranuwat Jaiyen       
	 * @Create Date	22-03-2563
	 * @return mixed
	 */
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
                    if (data == null) return null;
                    return 2;
                },
                width: "10%",
				className: "text-center"
		},
		{ title:"ชื่อ - นามสกุล", data: "name" },
		{ title:"ชื่อผู้ใช้งาน",data: "username" },
		{ 
			title:"ชื่อผู้ใช้งาน", data: "password",
			visible: false,  disabled:"true",
		},
		{ title:"ตำแหน่ง", data: "code",
			render: function(data, type, row, meta) {
				// console.log(row)
				if (data == null  || data == "") return "สมาชิก";
				return data;
			}
		}
	];
	var myTable;
	var topic_name = "users";
	// local URL's are not allowed
	var url_get = "<?php echo site_url("Source_manager/get_data/"); ?>" + topic_name;
	var url_user_get = "<?php echo site_url("Source_manager/get_user_data/"); ?>" + topic_name;
	var url_add = "<?php echo site_url("Source_manager/add_user/"); ?>" + topic_name;
	var url_edit = "<?php echo site_url("Source_manager/edit_user/"); ?>" + topic_name;
	var url_delete = "<?php echo site_url("Source_manager/delete_data/"); ?>" + topic_name;
	
	/**
	 * Setup User Interface.
	 *
	 * @Author	Jiranuwat Jaiyen       
	 * @Create Date	22-03-2563
	 * @return mixed
	 * @Update Thutsaneeya Chanrong
	 * @Create Date 13-01-2564
	 */
	myTable = $('#example').DataTable({
		"sPaginationType": "full_numbers",
		ajax: {
			"url": get_user_data,
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
				text: '<i class="fa fa-plus-square"></i> เพิ่มข้อมูล',
				name: 'add', // DO NOT change name
				"className": 'btn btn-info btn-lg',
				action: () => {
					$("#modal_input").modal();
				}
			},
			{
				extend: 'selected', // Bind to Selected row
				text: '<i class="fa fa-edit"></i> แก้ไขข้อมูล',
				name: 'edit', // DO NOT change name
				"className": 'btn btn-warning btn-lg',
				action: function ( e, dt, node, config ) {
					$('#password_edit').val('')
					$("#modalEdit").modal('show');
           		 }
			},
			{
				extend: 'selected', // Bind to Selected row
				text: '<i class="fa fa-trash"></i> ลบข้อมูล',
				name: 'delete', // DO NOT change names
				"className": 'btn btn-danger btn-lg',
				action: () =>{
					$('#modal_del').modal('show');
				}
			},
			{
				text: '<i class="fa fa-file"></i> เพิ่มไฟล์ข้อมูล',
				name: 'import', // DO NOT change name
				"className": 'btn btn-info btn-lg',
				action: function ( e, dt, node, config ) {
					$("#modal_import").modal();
           		 }
			}
		]
	});

	myTable.on('order.dt search.dt', function () {
		myTable.column(0, {search:'applied', order:'applied'}).nodes().each( function (cell, i) {
			cell.innerHTML = `${i+1}.`;
		});
	}).draw();
	
	$(document).ready(function () {
		$('#loadDiv').hide();
		/**
		 * Setup import file.
		 *
		 * @Author	Thutsaneeya Chanrong    
		 * @Create Date	01-03-2564
		 * @return mixed
		 */
		$('#upload').on('change', function(e) {
            e.preventDefault(); // don't send form as it
			$.ajax({
                method:"POST",
                url: `<?php echo site_url("Source_manager/loadStudent"); ?>`,      // this is my function in the controller
                data: new FormData(this),    
                contentType:false,          // The content type used when sending data to the server.  
                cache:false,                
                processData:false,
                dataType: "JSON",          // To send DOMDocument or non processed data file it is set to false  
                success: function(data){  
                
                    var columnDefs = [
                        {
                            title: "ลำดับ",
                            data: 1,
                            type:"hidden",
                            disabled:"true",
                            render: function (data) {
                                if (data == null) return null;
                                return 2;
                            },
                            width: "10%",
                            className: "text-center"
                        },
                        { data: "name"},
						{ data: "username"},
                        { 
						  data: "password",
						  render: function (data) {
                                return data = "*******";
                            },
						},
						{ 
						  data: "code",
						  visible: true
						}
                    ]; // End set columndefs

                    myTable = $('#studentUploadCheck').DataTable({
                        "paging": false,
						"destroy": true,
                        data,
                        columns: columnDefs,  // columns from above
                        rowId: 'id',
                        "columnDefs": [{
                                "searchable": false,
                                "orderable": false,
                                "targets": 0
                            } ],
                        "order": [[ 1, 'asc' ]],
                        dom: 'Bfrtip',        // element order: NEEDS BUTTON CONTAINER (B) ****
                        select: 'single',     // enable single row selection
                        responsive: true,     // enable responsiveness
                        altEditor: false,
                        buttons: [],
                    }); // End create table

                    // Set index of column
                    myTable.on('order.dt search.dt', function () {
                        myTable.column(0, {search:'applied', order:'applied'}).nodes().each( function (cell, i) {
                            cell.innerHTML = `${i+1}.`;
                        });
                    }).draw(); 
					$('#studentUploadCheck').show();

                }, error: function(err) {
                    console.log(err)
					console.log("Error");
                }
            })
			$('#btn_import').attr('disabled',false);

		})
	});

	//Hide table
	$('#studentUploadCheck').hide()
	$('#example1').hide();
	// Disabled save buttons
	$('#addRowBtn').attr('disabled',true);
	$('#btn_import').attr('disabled',true);
	
	/**
	 * *Append row in example1 table
	 *
	 * @Author	Thutsaneeya Chanrong       
	 * @Create Date	25-01-2564
	 */

	$(document).ready(function () {
		$('#btn_add_user_to_table').on('click', () =>{  

			if($("#username").val() == "" || $("#name").val() == "" || $("#password").val() == "" 
					|| $("#select_roles option:selected").val() == ""){
					
				if($("#name").val() == "") $('#namelabel').text('กรุณากรอกชื่อ-นามสกุล');	
				if($("#username").val() == "") $('#usernamelabel').text('กรุณากรอกชื่อผู้ใช้งาน');
				if($("#password").val() == "") $('#passwordlabel').text('กรุณากรอกรหัสผ่าน');
				if($("#select_roles option:selected").val() == "") $('#rolelabel').text('กรุณากรอกบทบาท');

			} else if($("#username").val() != "" && $("#name").val() != "" && $("#password").val() != "" 
						&& $("#select_roles option:selected").val() != "") {

				var name = $("#name").val();
				var username = $("#username").val();
				var password = $("#password").val();
				var code = $("#code").val();
				var rowcount = $('#tbody_01').children().length;

				var roles_text = $( "#select_roles option:selected" ).text();
				var roles_value = $( "#select_roles option:selected" ).val();
				// console.log(roles_value)
				if(code=='') code = '-';
				$('#tbody_01').append(`
					<tr>
						<td><center>${rowcount + 1}</center></td>
						<td>${name}</td>
						<td>${username}</td>
						<td>${password}</td>
						<td>${code}</td>
						<td>${roles_text}</td>
						<td><center><button id="btn_del"type="button" class="btn btn-danger">ลบ</button></center></td>
						<td style="display:none;"><input type="hidden"value="${roles_value}" name="roles_id"></td>
					</tr>
				`);
				//Reset form after click add button
				$('#altEditor-add-form').trigger("reset");

				$('#example1').show();//Show table
				$('#addRowBtn').attr('disabled',false);
			}

		});
	});
	
	/**
	 *  Delete row in example1 table
	 *
	 * @Author	Thutsaneeya Chanrong       
	 * @Create Date	27-01-2564
	 */
	$("#example1").on("click", "#btn_del", function() {
		// if($('#tbody_01').children().length > 1){
			$(this).closest("tr").remove();
		// }
	});

	/**
	 * 
	 * Get object from row selected on data table
	 * @Author	Thutsaneeya Chanrong       
	 * @Create Date	03-02-2564
	 */
	let user_id;
	var dt = $('#example').DataTable();
	$('#example tbody').on('click','tr', function(){
		// Get data from row selected
		// user_id is object
		user_id = dt.row(this).data();
		console.log(user_id);
	});

	/**
	 * 
	 * *Set up modal edit form
	 * @Author	Thutsaneeya Chanrong       
	 * @Create Date	04-02-2564
	 */
	$('#example_wrapper > div.dt-buttons > button.btn.btn-warning.btn-lg').on('click', function (){
			// set value in edit form
			$('#name_edit').val(user_id["name"]);
			$('#username_edit').val(user_id["username"]);
			// $('#password_edit_old').val(user_id["password"]);
			$('#code_edit').val(user_id["code"]);
	});

	/**
	 * 
	 * *Set up modal delete form
	 * @Author	Thutsaneeya Chanrong       
	 * @Create Date	04-02-2564
	 */
	$('#example_wrapper > div.dt-buttons > button.buttons-selected.btn.btn-danger.btn-lg.disabled').on('click', function (){
		// set value in edit form
		$('#name_del').val(user_id["name"]);
		$('#username_del').val(user_id["username"]);
		$('#password_del').val(user_id["password"]);
		$('#code_del').val(user_id["code"]);
	}); 
	
	/**
	 * 
	 * *Insert data
	 * @Author	Thutsaneeya Chanrong       
	 * @Create Date	03-02-2564
	 */
	$('#addRowBtn').on('click', function () {

		let rowdata;
		var timestamp = new Date()
		var strDate = timestamp.getFullYear()+"-"+(timestamp.getMonth()+1)+"-"+timestamp.getDate()+" "+timestamp.getHours()+":"+timestamp.getMinutes()+":"+timestamp.getSeconds();
		for(let i = 1; i <= $('#tbody_01').children().length; i++){
			let code = $(`#tbody_01 > tr:nth-child(${i}) > td:nth-child(4)`).text();
			// console.log(code)
			if(code == '-') code = null;
			// console.log(code)
			rowdata = {
				code: code,
				name: $(`#tbody_01 > tr:nth-child(${i}) > td:nth-child(2)`).text(),
				password: $(`#tbody_01 > tr:nth-child(${i}) > td:nth-child(3)`).text(),
				username: $(`#tbody_01 > tr:nth-child(${i}) > td:nth-child(3)`).text(),
				created_at: strDate,
				updated_at: strDate
			}
			// #tbody_01 > tr > td:nth-child(8) > input[type=hidden]
			role_id =  $(`#tbody_01 > tr:nth-child(${i}) > td:nth-child(8) > input[type=hidden]`).val()

			// console.log(rowdata)
			// console.log(role_id)

			$.ajax({
				url: "<?php echo site_url("Source_manager/add_user_with_role/"); ?>" + "users",
				type: 'POST',
				async: false,
				data: {
					"rowdata": rowdata,
					"role_id": role_id
				},
				success: function(res) { 
					console.log(res)
					// toastr['success']("ดำเนินการเสร็จสิ้น")
				},
				error: (er)=>{console.log(er)}
			});
		}
		toastr['success']("ดำเนินการเสร็จสิ้น")
		dt.ajax.reload(); // Reload data table
		$('#example1 tbody tr').remove(); // Clear table insert
		$('#addRowBtn').attr('disabled',true);
		$('#example1').hide();
		$('#modal_input').modal('hide'); //Close
		// window.location.reload(true);
	});
	
	/**
	 * 
	 * *Update data
	 * @Author	Thutsaneeya Chanrong       
	 * @Create Date	04-02-2564
	 */
	$('#EditRowBtn').on('click', function () {  

		var timestamp = new Date()
		var strDate = timestamp.getFullYear()+"-"+(timestamp.getMonth()+1)+"-"+timestamp.getDate()+" "+timestamp.getHours()+":"+timestamp.getMinutes()+":"+timestamp.getSeconds();


		if($('#name_edit').val() == '' || $('#username_edit').val() == '' || $('#password_edit').val() == '') {
			if($('#name_edit').val() == '') {$('#name_edit-label').text("กรุณาบันทึกชื่อนามสกุล");}
			if($('#username_edit').val() == '') {$('#username_edit-label').text("กรุณาบันทึกชื่อผู้ใช้งาน");}
			if($('#password_edit').val() == '') {$('#password_edit-label').text("กรุณาบันทึกรหัสผ่าน");}

			$('#name_edit').on('change', ()=>{
				if($('#name_edit').val() != '') {$('#name_edit-label').text('');}
			})
			$('#username_edit').on('change', ()=>{
				if($('#username_edit').val() != '') {$('#username_edit-label').text('');}
			})
			$('#password_edit').on('change', ()=>{
				if($('#password_edit').val() != '') {$('#password_edit-label').text('');}
			})

		} else if ($('#name_edit').val() != '' && $('#username_edit').val() != '' && $('#password_edit').val() != '') {
						// console.log('yess')
			let rowdata = {
				id :	user_id["id"],
				code: $('#code_edit').val(),
				name: $('#name_edit').val(),
				password: $('#password_edit').val(),
				username: $('#username_edit').val(),
				updated_at: strDate
			}
			console.log("rowdata ",rowdata);

			$.ajax({
				// a tipycal url would be /{id} with type='POST'
				url: url_edit,
				type: 'POST',
				async: false,
				data: rowdata,
				success: function() { 
					toastr['success']("ดำเนินการเสร็จสิ้น")
				},
				error: (er)=>{console.log(er)}
			});

			dt.ajax.reload(); // Reload data table
			$('#modalEdit').modal('hide'); // Close modal
			$('#altEditor-edit-form');
		} // End if check value
	})

	/**
	 * 
	 * *Delete data
	 * @Author	Thutsaneeya Chanrong       
	 * @Create Date	04-02-2564
	 */
	$('#DelRowBtn').on('click', function (){

		let rowdata;
		var timestamp = new Date()
		var strDate = timestamp.getFullYear()+"-"+(timestamp.getMonth()+1)+"-"+timestamp.getDate()+" "+timestamp.getHours()+":"+timestamp.getMinutes()+":"+timestamp.getSeconds();

		rowdata = {
			id : user_id["id"],
			code: $('#code_del').val(),
			name: $('#name_del').val(),
			password: $('#password_del').val(),
			username: $('#username_del').val(),
			deleted_at: strDate
		}
		$.ajax({
				// a tipycal url would be /{id} with type='DELETE'
			url: url_delete,
			type: 'POST',
			async: false,
			data: rowdata,
			success: function() { 
				toastr['success']("ดำเนินการเสร็จสิ้น")
			},
			error: (er)=>{console.log(er)}
		});

		$('#modal_del').modal('hide'); //Close modal
		dt.ajax.reload(); // Reload data table

	});

	/**
	 * 
	 * Import file
	 * @Author	Thutsaneeya Chanrong       
	 * @Create Date	01-03-2564
	 */
	$('#btn_import').on('click', function () {
		addMany()
	});

	function addMany() {
		// $('#loadDiv').show()
		var timestamp = new Date()
		var strDate = timestamp.getFullYear()+"-"+(timestamp.getMonth()+1)+"-"+timestamp.getDate()+" "+timestamp.getHours()+":"+timestamp.getMinutes()+":"+timestamp.getSeconds();
		for(let i = 1; i <= $('#tbody').children().length; i++){
			let code = $(`#tbody > tr:nth-child(${i}) > td:nth-child(4)`).text();
			if(code == "สมาชิกในมกุล") code = null;
			rowdata = {
				code: code,
				name: $(`#tbody > tr:nth-child(${i}) > td:nth-child(2)`).text(),
				password: $(`#tbody > tr:nth-child(${i}) > td:nth-child(3)`).text(),
				username: $(`#tbody > tr:nth-child(${i}) > td:nth-child(3)`).text(),
				created_at: strDate,
				updated_at: strDate
			}
			console.log(i)
			console.log(rowdata)

			$.ajax({
				url: url_add,
				type: 'POST',
				async: false,
				data: rowdata,
				success: function() { 
					console.log("success");
				},
				error: (er)=>{console.log(er)}
			});
		}
	
		$('#modal_import').modal('hide'); //Close modal
		toastr['success']("ดำเนินการเสร็จสิ้น");
		window.location.reload(true);
		
	} // End addMany 

	/**
	 * 
	 * Clear data
	 * @Author	Thutsaneeya Chanrong       
	 * @Create Date	02-03-2564
	 */
	 $(document).ready(function(){

		$('#btn_close_imort_1').on('click', function (){

			$('#studentUploadCheck').dataTable().fnClearTable(); // Clear import table
			$('#studentUploadCheck').dataTable().fnClearTable();
			$('#studentUploadCheck').dataTable().fnDestroy();
			$('#studentUploadCheck').hide()
			$('#upload').trigger("reset");
			$('#btn_import').attr('disabled',true);
			
		})
		$('#btn_close_imort_2').on('click', function (){

			$('#studentUploadCheck').dataTable().fnClearTable(); // Clear import table
			$('#studentUploadCheck').dataTable().fnDestroy();
			$('#studentUploadCheck').hide()
			$('#upload').trigger("reset");
			$('#btn_import').attr('disabled',true);
		})
		$('#btn_close_add_1').on('click', function (){

			$('#example1 tbody tr').remove(); // Clear table insert
			$('#example1').hide() // Hide table insert
			$('#altEditor-add-form').trigger("reset");
			$('#addRowBtn').attr('disabled',true);
			
		})
		$('#btn_close_add_2').on('click', function (){

			$('#example1 tbody tr').remove(); // Clear table insert
			$('#example1').hide() // Hide table insert$
			$('#altEditor-add-form').trigger("reset"); // Reset form insert
			$('#addRowBtn').attr('disabled',true); //Disabled button insert

		})
	 });
</script>

<style>
	.text-danger {
		color: #ff0000 !important;
	}
	a:link {
		color: red;
	}a:hover {
		color: hotpink;
	}
	a:visited {
		color: blue;
	}
	a:active {
		color: pink;
	}
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

	.loader {
	border: 5px solid #f3f3f3;
	border-radius: 50%;
	border-top: 5px solid #000;
	width: 30px;
	height: 30px;
	-webkit-animation: spin 2s linear infinite; /* Safari */
	animation: spin 2s linear infinite;
	}

	/* Safari */
	@-webkit-keyframes spin {
	0% { -webkit-transform: rotate(0deg); }
	100% { -webkit-transform: rotate(360deg); }
	}

	@keyframes spin {
	0% { transform: rotate(0deg); }
	100% { transform: rotate(360deg); }
	}
</style>