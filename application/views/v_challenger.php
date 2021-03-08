<!--
 - Cluster Profile  
 - v_challenger
 - @Author	Jiranuwat Jaiyen 
 - @Create Date 22-03-2563
 - @Update Namchok Singhachai
-->

<style>
	img.img-profile {
		object-fit: cover !important; 
		object-position: center !important;
		margin: 7px 0px !important;
		width: 200px !important;
		height: 200px !important;
	}
	@media only screen and (max-width: 321px) {
		img.img-profile  {
			/* object-position: center !important; */
			margin: 7px 0px !important;
			width: 80px !important;
			height: 80px !important;
		}
	}
	@media only screen and (max-width: 768px) {
		img.img-profile  {
			/* object-position: center !important; */
			margin: 7px 0px !important;
			width: 85px !important;
			height: 100px !important;
		}
		.users-list>li {
			width: 25%;
			float: left;
			padding: 0px !important;
			text-align: center;
		}
	}
</style>

<div class="panel panel-primary">
	<div  class="panel-heading" style=" font-size: 28px; ">Cluster Profile</div>
	<div class="panel-body">
		<div style="font-size: x-large; font-weight: 600; text-align: right;">
			<select id="select-opt">
				<option value="" disabled selected>เลือกกลุ่ม</option>
				<?php for($i=1;$i<11;$i++){?> <!-- ควรแก้ให้ลูปตามจำนวนกลุ่มในฐานข้อมูล -->
					<option value="<?php echo site_url('challenger/index/'.($i)); ?>">Cluster <?php echo $i-1; ?></option>
				<?php } ?>
			</select>
		</div>

		<div class="card" style="text-align: -webkit-center;cursor: pointer;">
			<div>
			<!-- Add the bg color to the header using any of the bg-* classes -->
			<div class="widget-user-header " style="width: 250px;background: url('<?php echo base_url('assets/dist/img/cluster/cluster'.($cluster_id-1).'.png'); ?>') center center;background-position-x: center;height: 210px;background-size: contain;background-repeat: no-repeat; background-repeat-y: no-repeat; background-repeat-x: no-repeat;">
			</div>

				<div class="box-footer" style="text-align: center;font-size: 52px;padding-top: 0px;color: black;border: 0px !important;">Cluster <?php echo $cluster_id-1; ?><!-- /.row -->
				</div>
			</div>
		</div>

		<hr style="border-top: 1px solid #cdcccc;">
		<ul class="users-list clearfix">
		<?php foreach($User_list as $row){?>
			<li class="col-md-4 col-xs-6">
				<img class="img-profile" src="<?php echo base_url('assets/dist/img/user/'.$row['username'].'.jpg');?>" alt="User Image" onerror="this.onerror=null;this.src='<?php echo base_url('assets/dist/img/user/unknown-who.jpg'); ?>';" style="">
				<span class="users-list-name" style="margin-top: 15px;font-size: 22px;"><?php echo $row["username"] ?></span>
				<span class="users-list-name" href="#<?php echo $row["user_name"] ?>" style="font-size: 17px;" ><?php echo $row["user_name"] ?></span>
				<?php if($row["secon_role"] !== null ){ ?>
				<span class="users-list-date" style="font-size: 17px;"><?php echo $row["secon_role"]; ?></span>
				<?php }else{ ?>
				<span class="users-list-date" style="font-size: 17px;"><?php echo $row["display_name"]; ?></span>
				<?php } ?>
			</li>
		<?php } ?>
		</ul>
  	</div>
	<!-- End panel body -->
</div>
<!-- End Cluster Profile -->

<script>

	$(document).ready(function(){
		/**
		* for onclick to change cluster 
		*
		* @Author	Jiranuwat Jaiyen       
		* @Create Date	22-03-2563
		*/
		$("#select-opt").change(function() {
			var $option = $(this).find(':selected');
			var url = $option.val();
			if (url != "") 
			{
				window.location.href = url;
			} else {
				alert("Incorrent!");
			}
		});
	});

</script>