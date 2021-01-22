<!--
 - Activity Cluster  
 -
 - @Author	Jiranuwat Jaiyen 
 - @Create Date 22-03-2563
-->
<style>
    #clock {
        font-family: kanit;
        font-size: 60px;
        text-align: center;
    }
    
    .icon {
        padding-top: 5%;
        padding-right: 2%;
    }
    
    .bg-aqua2 {
        background: #b2dffb;
    }
    
    .mobile-table {
        font-size: 1.25vw
    }
    
    @media only screen and (max-width: 800px) {
        .mobile-table {
            font-size: 2.5vw
        }
    }
    
    @media only screen and (max-width: 450px) {
        .mobile-table {
            font-size: 4vw
        }
    }
</style>
<div class="panel panel-primary">
    <div class="panel-heading" style=" font-size: 28px; ">Activity Cluster
        <?php echo $id; ?>
    </div>
    <div class="panel-body">
        <div>
            <div style="font-size: x-large;font-weight: 600; text-align: right;">
                <select id="select-opt">
					<option value="">Select Cluster</option>
					<?php for($i=0;$i<10;$i++){?>
					<option value="<?php echo site_url('mainreward/index/'.$i); ?>">Cluster <?php echo $i; ?>
					</option>
					<?php } ?>
				</select>
            </div>
            <div id="clock"></div>
			<div id="clock" style="width: 360px;margin-right: auto;	margin-left: auto;font-size: 42px;margin-top:-25px;	position: relative;	height: 70px;">
				<span style="left: 0px;	position: absolute;	">ชั่วโมง</span>
				<span style="left: 135px;	position: absolute;">นาที</span>
				<span style="left: 235px;position: absolute;">วินาที</span></div>

            <!-- Set up your HTML -->
            <div class="owl-carousel  owl-theme ">
                <?php foreach($Data_list as $row ){ ?>

                <div style="padding: 0px 30px 0px 30px;">
                    <!-- small box -->
                    <div class="small-box bg-gray" style=" padding: 15px; border-radius: 25px; ">
                        <div class="inner">
                            <input value="<?php echo $row["id"] ?>" id="ac_id" hidden>
                            <h3 style="color: black !important;width: 100%;overflow: hidden;text-overflow: ellipsis;font-family:prompt" id="name">
                                <?php echo $row["name"] ?>
                            </h3>

                            <p style="color: black !important;font-size:20px" id="time">
                                <?php echo $row["time_start"] ?> -
                                <?php echo $row["time_end"] ?>
                            </p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-clipboard"></i>
                        </div>
                    </div>
                </div>
                <?php } ?>
            </div>
            <div style=" color: #C73523;font-size:18px ">
                หมายเหตุ : สามารถคลิกค้างที่ Card เพื่อทำการเลื่อนไปทางซ้ายหรือขวาได้
            </div>
            <div id="time_now" style="text-align: center;font-size:32px"></div>
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title" style="font-family:prompt;font-weight:700">ตารางแสดงตำแหน่งหน้าที่ในทีม</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body no-padding" style=" overflow-x: auto; overflow-y: hidden; ">
                    <table class="table table-condensed mobile-table" style=" margin: 0px 4% 0px 4%; width: -webkit-fill-available; ">
                        <tbody>

                            <tr style="border-bottom: solid red;">
                                <th style="width: 80px">ID</th>
                                <th>ชื่อ - นามสกุล</th>
                                <th>ตำแหน่ง</th>
                                <th style="width: 40px">สถานะ</th>
                            </tr>

                            <?php foreach($User_list as $row ){ ?>
                            <tr style="border-bottom: solid skyblue;" class="row_data">
                                <td>
                                    <?php echo $row["username"] ?>
                                </td>
                                <td>
                                    <?php echo $row["user_name"] ?>
                                </td>
                                <td>
                                    <?php if($row["secon_role"] !== null ){  echo $row["secon_role"]; } else{ echo substr($row["role_name"], 0, -1); } ?>
                                </td>
                                <td onclick="checkin(<?php echo $row['id']; ?>)" style="cursor: pointer;">
                                    <small class="label label-warning"><i class="fa fa-clock-o"></i> Wait </small>
                                </td>
                            </tr>

                            <?php } ?>
                        </tbody>
                    </table>

                    <div style=" color: #C73523;margin-top:25px;font-size:18px">
                        หมายเหตุ : สามารถกดที่ปุ่มสถานะ เพื่อทำการเปลี่ยนเป็นสถานะตรงข้าม โดยสามารถใช้งานได้เฉพาะผู้ที่ได้รับอนุญาต
                    </div>
                </div>
                <!-- /.box-body -->
            </div>
        </div>
    </div>
</div>




<script>
    $(document).ready(function() {
        /**
         * Setup scroll panel
         *
         * @Author	Jiranuwat Jaiyen       
         * @Create Date	22-03-2563
         * @return mixed
         */
        $(".owl-carousel").owlCarousel({
            center: true,
            items: 2,
            loop: false,
            margin: 10,
            startPosition: <?php echo $targle; ?> ,
            responsive : {
                0: {
                    items: 1
                },
                750: {
                    items: 1
                },
                1100: {
                    items: 2
                },
                1400: {
                    items: 3
                }
            }
        });

        clear_get_data()

        setInterval(function() {
            clear_get_data()
        }, 1500);

        /**
         * for onclick to change cluster 
         *
         * @Author	Jiranuwat Jaiyen       
         * @Create Date	22-03-2563
         */
        $("#select-opt").change(function() {
            var $option = $(this).find(':selected');
            var url = $option.val();
            if (url != "") {
                window.location.href = url;
            }
        });
    });

    /**
     * for onclick to change user status
     *
     * @Author	Jiranuwat Jaiyen       
     * @Create Date	22-03-2563
     */
    function checkin($user_id) {
        $.get("<?php echo site_url("mainreward/add_Activity/"); ?>" + targle_input + "/" + $user_id,
               function(data, status) {
				   console.log('Successfully')
			   }
			).done(function(data) {
                if (data == "กิจกรรมยังไม่ถึงช่วงดำเนินกิจกรรม" || data == "คุณไม่มีสิทธิ์เข้าถึง") {
                    toastr["warning"](data)
                        // return;
                } else {
                    toastr["success"](data)
                }
            })
            .fail(function() {
                toastr["error"]("Something Wrong!!<br> Please contact the developer.")
            })
    }
    /**
     * Reset Data and setup again
     *
     * @Author	Jiranuwat Jaiyen       
     * @Create Date	22-03-2563
     * @return mixed
     */
    function clear_get_data() {
        $.get("<?php echo site_url("mainreward/get_Activity/"); ?>" + targle_input + "/<?php echo $id+1;?>",
            function(data, status) {
                $("table").find("tr[class=row_data]").each(function() {
                    $(this).find("td").eq(3).html('<small class="label label-warning"><i class="fa fa-clock-o"></i> Wait </small>')
                })
				// console.log(data)
                var raw_data = JSON.parse(data);
                for (var i = 0; i < raw_data.length; i++) {
                    var test_text = raw_data[i]["name"]
                        // console.log(raw_data[i]["name"])
                    $("table").find("tr[class=row_data]").each(function() {
                        if ($(this).find("td").eq(1).text().replace(/\s/g, '') == test_text.replace(/\s/g, '')) {
                            $(this).find("td").eq(3).html('<small class="label label-success"><i class="fa fa-clock-o"></i> Done </small>')
                        }
                    })
                }
            });
    }

    /**
     * make text current time
     *
     * @Author	Jiranuwat Jaiyen       
     * @Create Date	22-03-2563
     * @return mixed
     */
    function currentTime() {
        var date = new Date(); /* creating object of Date class */
        var hour = date.getHours();
        var min = date.getMinutes();
        var sec = date.getSeconds();
        hour = updateTime(hour);
        min = updateTime(min);
        sec = updateTime(sec);
        document.getElementById("clock").innerText = hour + " : " + min + " : " + sec; /* adding time to the div */
        var t = setTimeout(function() {
            currentTime()
        }, 1000); /* setting timer */
    }

    /**
     * updateTime
     *
     * @Author	Jiranuwat Jaiyen       
     * @Create Date	22-03-2563
     * @return mixed
     */
    function updateTime(k) {
        if (k < 10) {
            return "0" + k;
        } else {
            return k;
        }
    }

    currentTime();
    countdown.resetLabels();
    countdown.setLabels(' มิลวินาที| วินาที| นาที| ชั่วโมง| วัน| สัปดาห์| เดือน| ปี| ศตวรรษ| ทศวรรษ| พันปี',  ' มิลวินาที| วินาที| นาที| ชั่วโมง| วัน| สัปดาห์| เดือน| ปี| ศตวรรษ| ทศวรรษ| พันปี',' ',
        ' ',
        '0 วินาที');
    var today, targle, targle_intime, targle_input;
    today = new Date()
    targle = new Date(today.getFullYear(), today.getMonth(), today.getDate(), 1, 58, 0)
    targle_intime = new Date(today.getFullYear(), today.getMonth(), today.getDate(), 2, 0, 0)


    /**
     * setInterval to reload ui
     *
     * @Author	Jiranuwat Jaiyen       
     * @Create Date	22-03-2563
     * @return mixed
     */
    setInterval(function() {
        today = new Date()
        $(".owl-item").find(".small-box").each(function() {
                $(this).attr("class", "small-box bg-gray")
            })
            /*$(".owl-item:not(.center)").find(".small-box").each(function(){
            	today = new Date()
            	var new_time = $(this).find("#time").text().split(" ");
            	var start_time = new_time[0].split(":")
            	var end_time = new_time[2].split(":")
            	targle = new Date(today.getFullYear(), today.getMonth(), today.getDate(), start_time[0],start_time[1],start_time[2])
            	targle_intime = new Date(today.getFullYear(), today.getMonth(), today.getDate(), end_time[0],end_time[1],end_time[2])
            	if(today <= targle_intime){
            		//$("#time_now").css("font-family","kanit").text("เหลือเวลาในการทำกิจกรรม  "+countdown( targle_intime ).toString())
            		$(this).attr("class","small-box bg-green")
            	 }
            	else{
            		//$("#time_now").css("font-family","kanit").text("กิจกรรมได้ผ่านไปแล้ว "+countdown( targle_intime ).toString())
            		$(this).attr("class","small-box bg-gray")
            	}
            })*/

        $(".owl-item.center").find(".small-box").attr("class", "small-box bg-aqua2")
        var new_time = $(".owl-item.center").find("#time").text().split(" ");
        targle_input = $(".owl-item.center").find("#ac_id").val()
		// console.log(targle_input)
        var start_time = new_time[0].split(":")
        var end_time = new_time[2].split(":")
        targle = new Date(today.getFullYear(), today.getMonth(), today.getDate(), start_time[0], start_time[1], start_time[2])
        targle_intime = new Date(today.getFullYear(), today.getMonth(), today.getDate(), end_time[0], end_time[1], end_time[2])
        if (today <= targle) {
            $("#time_now").css("font-family", "kanit").text("กิจกรรมจะเปิดในอีก " + countdown(targle).toString())
            $(".btn-primary").addClass("disabled")
        } else if (today <= targle_intime) {
            $("#time_now").css("font-family", "kanit").text("เหลือเวลาในการทำกิจกรรม  " + countdown(targle_intime).toString())
            $(".btn-primary").removeClass("disabled")
        } else {
            $("#time_now").css("font-family", "kanit").text("กิจกรรมได้ผ่านไปแล้ว " + countdown(targle_intime).toString())
            $(".btn-primary").addClass("disabled")
        }
    }, 100);
</script>