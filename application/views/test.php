<!-- <div class="modal fade in" id="altEditor-modal" tabindex="-1" role="dialog" style="display: block;">
	<div class="modal-dialog">
		<form name="altEditor-add-form" id="altEditor-add-form-" role="form">
			<div class="modal-content">
				<div class="modal-header bg-blue">
					<h3 style="padding-top: 1rem;padding-left: 1rem;display: inline" class="modal-title">หน้าเพิ่มข้อมูล</h3>
					<button style="margin: initial;opacity:0.75" type="button" class="close" data-dismiss="modal" aria-label="ยกเลิก">
						<span aria-hidden="true" style=" font-size: 34px; font-weight: 700; ">×</span>
					</button>
				</div>
			<div class="modal-body">
				<div style="margin-left: initial;margin-right: initial;" class="form-group row" id="alteditor-row-name">
				<div class="col-sm-3 col-md-3 col-lg-3 text-right" style="padding-top:4px;">
					<label for="name">ชื่อ - นามสกุล:</label>
				</div>
				<div class="col-sm-8 col-md-8 col-lg-8">
					<input type="text" id="name" pattern=".*" title="" name="ชื่อ - นามสกุล" placeholder="ชื่อ - นามสกุล" data-special="" data-errormsg="" data-uniquemsg="" data-unique="false" style="overflow:hidden" class="form-control  form-control-sm" value="">
					<label id="namelabel" class="errorLabel"></label></div>
				<div class="col-sm-3 col-md-3 col-lg-3 text-right" style="padding-top:4px;">
					<label for="username">Username:</label>
				</div>
				<div class="col-sm-8 col-md-8 col-lg-8">
					<input type="text" id="username" pattern=".*" title="" name="Username" placeholder="Username" data-special="" data-errormsg="" data-uniquemsg="" data-unique="false" style="overflow:hidden" class="form-control  form-control-sm" value="">
					<label id="usernamelabel" class="errorLabel"></label>
				</div>
				<div class="col-sm-3 col-md-3 col-lg-3 text-right" style="padding-top:4px;">
					<label for="password">Password:</label>
				</div>
				<div class="col-sm-8 col-md-8 col-lg-8">
					<input type="text" id="password" pattern=".*" title="" name="Password" placeholder="Password" data-special="" data-errormsg="" data-uniquemsg="" data-unique="false" style="overflow:hidden" class="form-control  form-control-sm" value="">
					<label id="passwordlabel" class="errorLabel"></label>
				</div>
				<div class="col-sm-3 col-md-3 col-lg-3 text-right" style="padding-top:4px;">
					<label for="code">หน้าที่:</label>
				</div>
				<div class="col-sm-8 col-md-8 col-lg-8">
					<input type="text" id="code" pattern=".*" title="" name="หน้าที่" placeholder="หน้าที่" data-special="" data-errormsg="" data-uniquemsg="" data-unique="false" style="overflow:hidden" class="form-control  form-control-sm" value="">
					<label id="codelabel" class="errorLabel"></label>
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" data-content="remove" class="btn btn-danger " data-dismiss="modal" style="margin-right: 75%;">ยกเลิก</button>
				<button type="submit" form="altEditor-add-form" data-content="remove" class="btn btn-success" id="addRowBtn">บันทึก</button>
			</div>
			</div>
		</form>
	</div>
</div>-->
 <!-- edit  -->
 <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal_edit" data-whatever="@mdo">Open modal for @mdo</button>
<div id="modal_edit" class="modal fade in" tabindex="-1" role="dialog" style="display: none;">
	<div class="modal-dialog">
		<form name="altEditor-edit-form" id="altEditor-edit-form" role="form">
			<div class="modal-content">
				<div class="modal-header bg-blue">
					<h3 style="padding-top: 1rem;padding-left: 1rem;display: inline" class="modal-title">หน้าแก้ไขข้อมูล</h3>
						<button style="margin: initial;opacity:0.75" type="button" class="close" data-dismiss="modal" aria-label="ยกเลิก">
							<span aria-hidden="true" style=" font-size: 34px; font-weight: 700; ">×</span>
						</button>
				</div>
				<div class="modal-body">
					<div style="margin-left: initial;margin-right: initial;" class="form-group row" id="alteditor-row-name_edit">
						<div class="col-sm-3 col-md-3 col-lg-3 text-right" style="padding-top:4px;">
							<label for="name_edit">ชื่อ - นามสกุล:</label>
						</div>
						<div class="col-sm-8 col-md-8 col-lg-8">
							<input type="text" id="name_edit" pattern=".*" title="" name="ชื่อ - นามสกุล" placeholder="ชื่อ - นามสกุล" data-special="" data-errormsg="" data-uniquemsg="" data-unique="false" style="overflow:hidden" class="form-control  form-control-sm" value="">
								<label id="namelabel_edit" class="errorLabel"></label>
						</div>
						<div style="clear:both;"></div>
					</div>
					<div style="margin-left: initial;margin-right: initial;" class="form-group row" id="alteditor-row-username_edit">
						<div class="col-sm-3 col-md-3 col-lg-3 text-right" style="padding-top:4px;">
							<label for="username_edit">Username:</label>
						</div>
						<div class="col-sm-8 col-md-8 col-lg-8">
							<input type="text" id="username_edit" pattern=".*" title="" name="Username" placeholder="Username" data-special="" data-errormsg="" data-uniquemsg="" data-unique="false" style="overflow:hidden" class="form-control  form-control-sm" value="">
								<label id="usernamelabel_edit" class="errorLabel"></label>
						</div>
						<div style="clear:both;"></div>
					</div>
					<div style="margin-left: initial;margin-right: initial;" class="form-group row" id="alteditor-row-password_edit">
						<div class="col-sm-3 col-md-3 col-lg-3 text-right" style="padding-top:4px;">
							<label for="password_edit">Password:</label>
						</div>
						<div class="col-sm-8 col-md-8 col-lg-8">
							<input type="text" id="password_edit" pattern=".*" title="" name="Password" placeholder="Password" data-special="" data-errormsg="" data-uniquemsg="" data-unique="false" style="overflow:hidden" class="form-control  form-control-sm" value="">
								<label id="passwordlabel_edit" class="errorLabel"></label>
						</div>
						<div style="clear:both;"></div>
					</div>
					<div style="margin-left: initial;margin-right: initial;" class="form-group row" id="alteditor-row-code_edit">
						<div class="col-sm-3 col-md-3 col-lg-3 text-right" style="padding-top:4px;">
							<label for="code_edit">หน้าที่:</label>
						</div>
						<div class="col-sm-8 col-md-8 col-lg-8">
							<input type="text" id="code_edit" pattern=".*" title="" name="หน้าที่" placeholder="หน้าที่" data-special="" data-errormsg="" data-uniquemsg="" data-unique="false" style="overflow:hidden" class="form-control  form-control-sm" value="">
								<label id="codelabel_edit" class="errorLabel"></label>
						</div>
						<div style="clear:both;"></div>
					</div>
				</div>	
				<div class="modal-footer">
					<button type="button" data-content="remove" class="btn btn-danger " data-dismiss="modal" style="margin-right: 75%;">ยกเลิก</button>
					<button type="submit" form="altEditor-edit-form" data-content="remove" class="btn btn-success" id="editRowBtn">บันทึก</button>
				</div>
			</div>
		</form>
	</div>
</div>
<!-- edit  -->

<!-- Del -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal_del" data-whatever="@mdo">Open modal for @mdo</button>
<div id="modal_del"class="modal fade in" tabindex="-1" role="dialog" style="display: none; padding-right: 17px;">
	<div class="modal-dialog">
		<form name="altEditor-delete" role="form">
			<div class="modal-content">
				<div class="modal-header bg-blue">
					<h3 style="padding-top: 1rem;padding-left: 1rem;display: inline" class="modal-title">หน้าลบข้อมูล</h3>
					<button style="margin: initial;opacity:0.75" type="button" class="close" data-dismiss="modal" aria-label="ยกเลิก">
						<span aria-hidden="true" style=" font-size: 34px; font-weight: 700; ">×</span>
					</button>
				</div>
				<div class="modal-body">
					<div style="margin-left: initial;margin-right: initial;" class="form-group row" id="alteditor-row-name_del">
						<div class="col-sm-3 col-md-3 col-lg-3 text-right" style="padding-top:4px;">
							<label for="name_del">ชื่อ - นามสกุล:</label>
						</div>
						<div class="col-sm-8 col-md-8 col-lg-8">
							<input type="text" id="name_del" pattern=".*" title="" name="ชื่อ - นามสกุล" placeholder="ชื่อ - นามสกุล" data-special="" data-errormsg="" data-uniquemsg="" data-unique="false" style="overflow:hidden" class="form-control  form-control-sm" value="" disabled="">
							<label id="namelabel_del" class="errorLabel"></label>
						</div>
						<div style="clear:both;"></div>
					</div>
					<div style="margin-left: initial;margin-right: initial;" class="form-group row" id="alteditor-row-username_del">
						<div class="col-sm-3 col-md-3 col-lg-3 text-right" style="padding-top:4px;">
							<label for="username_del">Username:</label>
						</div>
						<div class="col-sm-8 col-md-8 col-lg-8">
							<input type="text" id="username_dl" pattern=".*" title="" name="Username" placeholder="Username" data-special="" data-errormsg="" data-uniquemsg="" data-unique="false" style="overflow:hidden" class="form-control  form-control-sm" value="" disabled="">
								<label id="usernamelabel_del" class="errorLabel"></label>
						</div>
						<div style="clear:both;"></div>
					</div>
					<div style="margin-left: initial;margin-right: initial;" class="form-group row" id="alteditor-row-password_del">
						<div class="col-sm-3 col-md-3 col-lg-3 text-right" style="padding-top:4px;">
							<label for="password_del">Password:</label>
						</div>
						<div class="col-sm-8 col-md-8 col-lg-8">
							<input type="text" id="password_del" pattern=".*" title="" name="Password" placeholder="Password" data-special="" data-errormsg="" data-uniquemsg="" data-unique="false" style="overflow:hidden" class="form-control  form-control-sm" value="" disabled="">
								<label id="passwordlabel_del" class="errorLabel"></label>
						</div>
						<div style="clear:both;"></div>
					</div>
					<div style="margin-left: initial;margin-right: initial;" class="form-group row" id="alteditor-row-code_del">
						<div class="col-sm-3 col-md-3 col-lg-3 text-right" style="padding-top:4px;">
							<label for="code_del">หน้าที่:</label>
						</div>
						<div class="col-sm-8 col-md-8 col-lg-8">
							<input type="text" id="code_del" pattern=".*" title="" name="หน้าที่" placeholder="หน้าที่" data-special="" data-errormsg="" data-uniquemsg="" data-unique="false" style="overflow:hidden" class="form-control  form-control-sm" value="" disabled="">
								<label id="codelabel_del" class="errorLabel"></label>
						</div>
						<div style="clear:both;"></div>
					</div>
				</div>
					<div class="modal-footer">
						<button type="button" data-content="remove" class="btn btn-danger " data-dismiss="modal" style="margin-right: 75%;">ยกเลิก</button>
						<button type="submit" form="altEditor-delete" data-content="remove" class="btn btn-success" id="deleteRowBtn">บันทึก</button>
					</div>
			</div>
		</form>
	</div>
</div>
<!-- Del -->

<!-- import -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal_import" data-whatever="@mdo">Open modal for @mdo</button>
<div id="modal_import"class="modal fade in" tabindex="-1" role="dialog" style="display: none; padding-right: 17px;">
	<div class="modal-dialog">
		<!-- <form name="altEditor-delete" role="form"> -->
			<div class="modal-content">
				<div class="modal-header bg-blue">
					<h3 style="padding-top: 1rem;padding-left: 1rem;display: inline" class="modal-title">หน้าเพิ่มไฟล์ข้อมูล</h3>
					<button style="margin: initial;opacity:0.75" type="button" class="close" data-dismiss="modal" aria-label="ยกเลิก">
						<span aria-hidden="true" style=" font-size: 34px; font-weight: 700; ">×</span>
					</button>
				</div>
				<div class="modal-body">
					<div style="margin-left: initial;margin-right: initial;" class="form-group row" id="alteditor-row-name_del">
						<div class="col-sm-3 col-md-3 col-lg-3 text-right" style="padding-top:4px;">
							<label for="name_del">Upload:</label>
						</div>
						<div class="col-sm-8 col-md-8 col-lg-8">
							<div class="custom-file mb-3">
								  <input type="file" class="custom-file-input" id="customFile" name="filename">
							</div>
							<!-- <input type="text" id="name_del" pattern=".*" title="" name="ชื่อ - นามสกุล" placeholder="ชื่อ - นามสกุล" data-special="" data-errormsg="" data-uniquemsg="" data-unique="false" style="overflow:hidden" class="form-control  form-control-sm" value="" disabled=""> -->
							<!-- <label id="namelabel_del" class="errorLabel"></label> -->
						</div>
						<!-- <div style="clear:both;"></div> -->
					</div>
					<!--<div style="margin-left: initial;margin-right: initial;" class="form-group row" id="alteditor-row-username_del">
						<div class="col-sm-3 col-md-3 col-lg-3 text-right" style="padding-top:4px;">
							<label for="username_del">Username:</label>
						</div>
						<div class="col-sm-8 col-md-8 col-lg-8">
							<input type="text" id="username_dl" pattern=".*" title="" name="Username" placeholder="Username" data-special="" data-errormsg="" data-uniquemsg="" data-unique="false" style="overflow:hidden" class="form-control  form-control-sm" value="" disabled="">
								<label id="usernamelabel_del" class="errorLabel"></label>
						</div>
						<div style="clear:both;"></div>
					</div>
					<div style="margin-left: initial;margin-right: initial;" class="form-group row" id="alteditor-row-password_del">
						<div class="col-sm-3 col-md-3 col-lg-3 text-right" style="padding-top:4px;">
							<label for="password_del">Password:</label>
						</div>
						<div class="col-sm-8 col-md-8 col-lg-8">
							<input type="text" id="password_del" pattern=".*" title="" name="Password" placeholder="Password" data-special="" data-errormsg="" data-uniquemsg="" data-unique="false" style="overflow:hidden" class="form-control  form-control-sm" value="" disabled="">
								<label id="passwordlabel_del" class="errorLabel"></label>
						</div>
						<div style="clear:both;"></div>
					</div>
					<div style="margin-left: initial;margin-right: initial;" class="form-group row" id="alteditor-row-code_del">
						<div class="col-sm-3 col-md-3 col-lg-3 text-right" style="padding-top:4px;">
							<label for="code_del">หน้าที่:</label>
						</div>
						<div class="col-sm-8 col-md-8 col-lg-8">
							<input type="text" id="code_del" pattern=".*" title="" name="หน้าที่" placeholder="หน้าที่" data-special="" data-errormsg="" data-uniquemsg="" data-unique="false" style="overflow:hidden" class="form-control  form-control-sm" value="" disabled="">
								<label id="codelabel_del" class="errorLabel"></label>
						</div>
						<div style="clear:both;"></div>
					</div> -->
				</div>
					<div class="modal-footer">
						<button type="button" data-content="remove" class="btn btn-danger " data-dismiss="modal" style="margin-right: 75%;">ยกเลิก</button>
						<button type="submit" form="altEditor-delete" data-content="remove" class="btn btn-success" id="deleteRowBtn">บันทึก</button>
					</div>
			</div>
		<!-- </form> -->
	</div>
</div>
<!-- import -->

<style>
/* .modal-content{
		width: 700px;
	} */
</style>
<script>


</script>