<!--
 - Shop and inventory  
 -
 - @Author	Jiranuwat Jaiyen 
 - @Create Date 22-03-2563
-->

<style>

	table , tr ,td {
		border: 0px !important
	}

	<?php  if(!isset($Secon_target[0])&&( $Role_can[0]["secon_role"] == "ประธานมกุล" || $Profile[0] == "ScrumMaster")){ ?>
		.row_item{
			cursor: pointer;
		}
	<?php }?>

	<?php if($Profile[0] == "ScrumMaster"){ ?> 
		.row_inventory{
			cursor: pointer;
		}
	<?php } ?>

	.item_name{
		vertical-align: middle !important; 
		font-size: large; 
	}
	.img-table{
		width:5vw;
	}
	.detail_point{
		vertical-align: middle !important; 
		color: #ae9304;
		font-size: x-large;
		text-align: right;
		font-weight: 700;
	}
	.detail_item{
		vertical-align: middle !important; 
		color: red;
		font-size: medium;
		text-align: right;
		font-weight: 700;
	}
	.min-align {
		text-align:right
	}
	@media (max-width: 992px){
		.min-align {
			text-align:left
		}
	}
</style>

<div class="panel panel-primary">
    <div  class="panel-heading" style=" font-size: 28px; ">Trade Zone</div>
    <div class="panel-body">
		<?php if($Profile[1][0] == "ScrumMaster"){ ?>
			<div class="col-md-9 col-sm-12  col-xs-12"style="font-size: x-large;font-weight: 700;" id="user_point">ยอดเงินทั้งหมด $$$$$ $E</div>
			<div class="col-md-3 col-sm-12  col-xs-12 min-align" style="font-size: x-large;font-weight: 600; ">
				<select id="select-opt" style=" margin-bottom: 5px; ">
					<option value="1">Select Cluster</option>
					<?php for($i=1;$i<11;$i++){?>
					<option value="<?php echo $i; ?>">Cluster <?php echo $i-1; ?></option>
					<?php } ?>
				</select>
			</div>
		<?php }else{ ?>
			<div style="display: inline-flex;font-size: x-large;text-align: right;width: 100%;">
				<div style="font-size: x-large;font-weight: 700;" id="user_point">ยอดเงินทั้งหมด $$$$$ $E</div>
			</div>
		<?php } ?>
		
		<div class="col-lg-6 col-md-6  col-sm-12  col-xs-12">
			<div class="panel panel-primary">
			<div  class="panel-heading" style=" font-size: 28px; ">Shop</div>
				<div class="panel-body">
					<button class="btn bg-purple-active color-palette" onclick ="group_item()">All</button>
					<button class="btn bg-light-blue-active color-palette" onclick ="group_item(1)">Common</button>
					<button class="btn bg-aqua-active color-palette" onclick ="group_item(2)">Daliy</button>
					<button class="btn bg-teal-active color-palette" onclick ="group_item(3)">Special</button>
					<div style=" min-height: 400px; height: 50vh; overflow-y: scroll; overflow-x: hidden; border: 3px solid #7fadd5; ">
						<table class="table table-bordered table-striped">
							<tbody id="theshop">
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	  
		<div class="col-lg-6 col-md-6  col-sm-12  col-xs-12">
			<div class="panel panel-primary">
				<div  class="panel-heading" style=" font-size: 28px; ">Inventory of Cluster <span id="cluster_number"></span></div>
				<div class="panel-body">
					<button class="btn bg-purple-active color-palette"  onclick ="group_inventory()">All</button>
					<button class="btn bg-light-blue-active color-palette" onclick ="group_inventory(1)">Common</button>
					<button class="btn bg-aqua-active color-palette" onclick ="group_inventory(2)">Daliy</button>
					<button class="btn bg-teal-active color-palette" onclick ="group_inventory(3)">Special</button>
					<div style=" min-height: 400px; height: 50vh; overflow-y: scroll; overflow-x: hidden; border: 3px solid #7fadd5; ">
						<table id="example1" class="table table-bordered table-striped">
							<tbody id="theinventory">
							<?php for($i=0;$i<=10;$i++){?>
								<tr class="row_inventory">
									<td style="width: 20%; !important">
										<img src="<?php echo base_url('assets/dist/img/item/Common.png'); ?>" class="img-circle img-table"alt="User Image" onerror="this.onerror=null;this.src='<?php echo base_url('assets/dist/img/item/unknow_item.png'); ?>';">
									</td>
									<td class="item_name"><?php echo "Your Item"; ?></td>
									<td class="detail_item">จำนวนที่มี <?php echo (($i+1)*(29+$i)%7)+1 ?></td>
								</tr>
							<?php } ?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<script src="<?php echo base_url('assets/dist/js/sweetalert2@9.js'); ?>"></script>
<script>
countdown.resetLabels();
countdown.setLabels(
	' มิลวินาที| วินาที| นาที| ชั่วโมง| วัน| สัปดาห์| เดือน| ปี| ศตวรรษ| ทศวรรษ| พันปี',
	' มิลวินาที| วินาที| นาที| ชั่วโมง| วัน| สัปดาห์| เดือน| ปี| ศตวรรษ| ทศวรรษ| พันปี',
	' ',
	' ',
	'0 วินาที');

	var raw_data;
	var target_id = <?php 
					if(isset($Secon_target[0])){
						echo $Secon_target[0]["role_id"]."\n";
					}
					else{
						echo ($id)."\n";
					} ?>

	$(document).ready(function(){
		$("#select-opt").change(function() {
			var option = $(this).find(':selected');
			let target = option.val();
			target_id = target;
			// console.log(target_id)
			// console.log(target)
			Setup_ui();
			});
		Setup_ui();
	});
	
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
	
	/**
     * Setup User Interface.
     *
	 * @Author	Jiranuwat Jaiyen       
	 * @Create Date	22-03-2563
     * @return mixed
     */
	function Setup_ui(){
		// -1 For SE BUU when show in UI
		let cluster_number = target_id-1;
		$("#cluster_number").text(cluster_number)
		Set_point();
		Set_item();
		Set_inventory()
	}
	
	/**
     * Setup User Point.
     *
	 * @Author	Jiranuwat Jaiyen       
	 * @Create Date	22-03-2563
     * @return mixed
     */
	function Set_point(){
		$.get(`<?php echo site_url("Achievement/get_Point/"); ?>`+target_id, function(data, status){
			raw_data = JSON.parse(data);
			if(raw_data.length !=0){
				$("#user_point").text("ยอดเงินทั้งหมด "+numberWithCommas(raw_data[0]["raw_point"]-raw_data[0]["used_point"])+" $E")   
			}
			else{
				$("#user_point").text("ยอดเงินทั้งหมด "+0+" $E")   
			}
		});
	}
	//* ----------------------------------------- End set_point -------------------------------------------------------
	
	/**
     * Setup User item.
     *
	 * @Author	Jiranuwat Jaiyen       
	 * @Create Date	22-03-2563
     * @return mixed
     */
	function Set_item(){
		$.get(`<?php echo site_url("Achievement/get_Item/"); ?>`, function(data, status){
			raw_data = JSON.parse(data);	
			// console.log('=== Raw data ===')	;
			// console.log(raw_data)
			$("#theshop").empty()

			for(var i=0;i<raw_data.length;i++){
				var set_html = "";
				if(raw_data[i]['type'] == 3){
					set_html='<tr onclick="BuyItem('+raw_data[i]['id']+',\''+raw_data[i]['name']+'\')" class="row_item item_type_'+raw_data[i]['type']+'">'+
								'<td style="width: 20% !important;">'+
									'<img src="<?php echo base_url('assets/dist/img/item/'); ?>'+'Special.png" class="img-circle img-table"alt="User Image" onerror="this.onerror=null;this.src=\'<?php echo base_url('assets/dist/img/item/unknow_item.png'); ?>\';">'+
								'</td>'+
								'<td class="item_name">'+raw_data[i]['name']+'</td>'+
								'<td style="text-align: right;">'+
									'<span class="detail_point">'+numberWithCommas(raw_data[i]['point'])+' $E</span><br>'
									+'<span class="detail_item">จำนวนคงเหลือ '+raw_data[i]['total']+'</span>'
								+'</td></tr>'
				}
				else if(raw_data[i]['type'] == 2)
				{
					today = new Date()
					target = new Date(raw_data[i]['time_start'])
					target_intime = new Date(raw_data[i]['time_end'])
					// console.log(target,target_intime)
					if(today <= target){
						console.log("Not today")
						alert("Not today");
					}
					else if(today <= target_intime)
					{
						set_html='<tr onclick="BuyItem('+raw_data[i]['id']+',\''+raw_data[i]['name']+'\')" class="row_item item_type_'+raw_data[i]['type']+'">'+
									'<td style="width: 20% !important;>'+
										'<img src="<?php echo base_url('assets/dist/img/item/'); ?>'+'Daliy.png" class="img-circle img-table"alt="User Image" onerror="this.onerror=null;this.src=\'<?php echo base_url('assets/dist/img/item/unknow_item.png'); ?>\';">'+
									'</td>'+
									'<td class="item_name">'+raw_data[i]['name']+'</td>'+
									'<td style="text-align: right;">'+
									'	<span class="detail_point">'+numberWithCommas(raw_data[i]['point'])+' $E</span><br>'
						set_html+='<span class="detail_item">เหลือเวลา '+countdown( target_intime ,null,countdown.HOURS|countdown.MINUTES).toString()+'</span></td></tr>'
					}
				}
				else
				{
					set_html='<tr onclick="BuyItem('+raw_data[i]['id']+',\''+raw_data[i]['name']+'\')" class="row_item item_type_'+raw_data[i]['type']+'">'+
								'<td>'+
									'<img src="<?php echo base_url('assets/dist/img/item/'); ?>Common.png" class="img-circle img-table"alt="User Image" onerror="this.onerror=null;this.src=\'<?php echo base_url('assets/dist/img/item/unknow_item.png'); ?>\';">'+
								'</td>'+
								'<td class="item_name">'+raw_data[i]['name']+'</td>'+
								'<td class="detail_point">'+numberWithCommas(raw_data[i]['point'])+' $E</td>'
					set_html+='</tr>'
				}
				$("#theshop").append(set_html)
			}
		});
	}
	//* ----------------------------------------- End Set_item -------------------------------------------------------
	
	/**
     * Setup User inventory.
     *
	 * @Author	Jiranuwat Jaiyen       
	 * @Create Date	22-03-2563
     * @return mixed
     */
	function Set_inventory(){
		$.get(`<?php echo site_url("Achievement/get_Inventory/"); ?>`+target_id, function(data, status){
			raw_data = JSON.parse(data);		
			$("#theinventory").empty()
			for(var i=0;i<raw_data.length;i++){
				
				set_html='<tr onclick="UseItem('+raw_data[i]['id']+',\''+raw_data[i]['name']+'\')" class="row_inventory inventory_type_'+raw_data[i]['type']+'">'+
							'<td>';
								if(raw_data[i]['type'] == 3)
								{
									set_html+='<img src="<?php echo base_url('assets/dist/img/item/'); ?>'+'Special.png" class="img-circle img-table"alt="User Image" onerror="this.onerror=null;this.src=\'<?php echo base_url('assets/dist/img/item/unknow_item.png'); ?>\';">';
								}
								else if(raw_data[i]['type'] == 2)
								{
									set_html+='<img src="<?php echo base_url('assets/dist/img/item/'); ?>'+'Daliy.png" class="img-circle img-table"alt="User Image" onerror="this.onerror=null;this.src=\'<?php echo base_url('assets/dist/img/item/unknow_item.png'); ?>\';">';
								}
								else if(raw_data[i]['type'] == 1)
								{
									set_html+='<img src="<?php echo base_url('assets/dist/img/item/'); ?>'+'Common.png" class="img-circle img-table"alt="User Image" onerror="this.onerror=null;this.src=\'<?php echo base_url('assets/dist/img/item/unknow_item.png'); ?>\';">';
								}
					set_html+='</td>'+
								'<td class="item_name">'+raw_data[i]['name']+'</td>'+
								'<td class="detail_item">จำนวนที่มี  '+raw_data[i]['total']+'</td></tr>'
				$("#theinventory").append(set_html)
			}
		});
	}
	//* ----------------------------------------- End Set_inventory -------------------------------------------------------
	
	/**
     * for onclick to group item.
     *
	 * @Author	Jiranuwat Jaiyen       
	 * @Create Date	22-03-2563
     * @return mixed
     */
	function group_item(id=0){
		$("[class*='item_type']").hide()
		if(id == 1 || id == 2 || id == 3){
			$("[class*='item_type_"+id+"']").show()
		}
		else{
			$("[class*='item_type']").show()
		}
	}
	//* ----------------------------------------- End group_item -------------------------------------------------------
	
	/**
     * for onclick to group inventory.
     *
	 * @Author	Jiranuwat Jaiyen       
	 * @Create Date	22-03-2563
     * @return mixed
     */
	function group_inventory(id=0){
		$("[class*='inventory_type']").hide()
		if(id == 1 || id == 2 || id == 3){
			$("[class*='inventory_type_"+id+"']").show()
		}
		else{
			$("[class*='inventory_type']").show()
		}
	}
	//* ----------------------------------------- End group_inventory -------------------------------------------------------

<?php if(!isset($Secon_target[0])&&( $Role_can[0]["secon_role"] == "ประธานมกุล" || $Profile_role[0] == "ScrumMaster")){ ?>

	/**
	* function to submit buy item.
	*
	* @Author	Jiranuwat Jaiyen       
	* @Create Date	22-03-2563
	* @return mixed
	*/
	function BuyItem(item,item_name){
		  Swal.fire({
			title: 'ระบุจำนวนสินค้าที่ต้องการ<br>"'+item_name+'"',
			imageUrl:  `<?php echo base_url('assets/dist/img/shopping-cart.png'); ?>`,
			imageWidth: 100,
			imageHeight: 100,
			imageAlt: 'Custom image',
			input: 'number',
			inputValue: 1,
			inputAttributes: {
			  autocapitalize: 'off',
			  min: 1,
			  max: 20,
			  step: 1
			},
			showCancelButton: true,
			confirmButtonText: 'ยืนยัน',
			cancelButtonText: 'ยกเลิก',
			showLoaderOnConfirm: true,
			preConfirm: (count) => {
				return fetch(`<?php echo site_url("achievement/buyitem"); ?>/${item}/${count}/${target_id}`)
				.then(response => {
					
				  if (!response.ok) {
					throw new Error(response.statusText)
				  }
				  return response.json()
				})
				.catch(error => {
					// console.log(error)
				  Swal.showValidationMessage(
					`Request failed: ${error}`
				  )
				})
			},
			allowOutsideClick: () => !Swal.isLoading()
		  }).then((result) => {
			if (result.value) {
				console.log(result)
				if(result.value['type'] == "Comple"){
				  console.log(result.value)
				  Swal.fire({
					icon: 'success',
					title: 'สั่งซื้อสินค้าเสร็จสิ้น',
					showConfirmButton: false,
					timer: 1500
				  })
				}
				else if(result.value['type'] == "Money"){
				  Swal.fire({
					icon: 'error',
					title: 'จำนวนเงินที่ต้องการใช้ในการสั่งซื้อไม่เพียงพอ',
					showConfirmButton: false,
					timer: 1500
				  })
				}
				else if(result.value['type'] == "Item"){
				  Swal.fire({
					icon: 'error',
					title: 'จำนวนสินค้าที่ต้องการสั่งซื้อไม่เพียงพอ',
					showConfirmButton: false,
					timer: 1500
				  })
				}
				else if(result.value['type'] == "Count"){
				  Swal.fire({
					icon: 'error',
					title: 'โปรดตรวจสอบจำนวนสินค้าที่ท่านต้องการสั่งซื้อ',
					showConfirmButton: false,
					timer: 1500
				  })
				}
				else{
				  Swal.fire({
					icon: 'error',
					title: 'เกิดข้อผิดพลาดในการสั่งซื้อ',
					showConfirmButton: false,
					timer: 1500
				  })
				}
			}
			Setup_ui()
		  })
	}
	//* ----------------------------------------- End BuyItem -------------------------------------------------------


<?php }?>

	/**
	* function submit to use item
	*
	* @Author	Jiranuwat Jaiyen       
	* @Create Date	22-03-2563
	* @return mixed
	* @Update Namchok Singhachai
	*/
	function UseItem(item,item_name){
			Swal.fire({
				title: 'คุณต้องการใช้งาน <br>"'+item_name+'"?',
				imageUrl: '<?php echo base_url('assets/dist/img/item/UseItem.png'); ?>',
				imageWidth: 100,
				imageHeight: 100,
				imageAlt: 'Custom image',
				showCancelButton: true,
				confirmButtonText: 'ยืนยัน',
				cancelButtonText: 'ยกเลิก',
				showLoaderOnConfirm: true,
				preConfirm: (count) => {
				return fetch('<?php echo site_url("achievement/useitem"); ?>/'+item+'/'+target_id)
					.then(response => {
					if (!response.ok) {
						throw new Error(response.statusText)
					}
					return response.json()
					})
					.catch(error => {
						Swal.showValidationMessage(
							`Request failed: ${error}`
						)
					})
				},
				allowOutsideClick: () => !Swal.isLoading()
			}).then((result) => {
				if (result.value) {
					console.log(result)
					if(result.value['type'] == "Comple"){
					console.log(result.value)
					Swal.fire({
						icon: 'success',
						title: 'ส่งคำขอใช้งานสินค้าเสร็จสิ้น',
						showConfirmButton: false,
						timer: 1500
					})
					}
					else if(result.value['type'] == "Item"){
					Swal.fire({
						icon: 'error',
						title: 'จำนวนสินค้าที่ต้องการใช้งานไม่เพียงพอ',
						showConfirmButton: false,
						timer: 1500
					})
					}
					else{
					Swal.fire({
						icon: 'error',
						title: 'เกิดข้อผิดพลาดในการใช้งาน',
						showConfirmButton: false,
						timer: 1500
					})
					}
				}
				Setup_ui()
			})
	}
	//* ----------------------------------------- End UseItem -------------------------------------------------------

</script>