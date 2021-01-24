<!--
 - Home and card list for show detail of scrum  
 -
 - @Author	Jiranuwat Jaiyen 
 - @Create Date 22-03-2563
-->
<style>
    .fa-star,
    .fa-star-o,
    .fa-trophy {
        color: gold
    }
    
    .card-header-font {
        font-size: 28px
    }
    
    .card-button-font {
        font-size: 11px
    }
    
    @media only screen and (max-width: 1400px) {
        .card-header-font {
            font-size: 20px
        }
        .card-button-font {
            font-size: 9px
        }
    }
    
    @media only screen and (max-width: 1100px) {
        .card-header-font {
            font-size: 26px
        }
        .card-button-font {
            font-size: 11px
        }
    }
    
    @media only screen and (max-width: 840px) {
        .card-header-font {
            font-size: 19.5px
        }
        .card-button-font {
            font-size: 9px
        }
    }
    
    @media only screen and (max-width: 755px) {
        .card-header-font {
            font-size: 29px
        }
        .card-button-font {
            font-size: 12px
        }
    }
    
    @media only screen and (max-width: 450px) {
        .card-header-font {
            font-size: 26px
        }
        .card-button-font {
            font-size: 9px
        }
    }
</style>

<!-- Main panel -->
<div class="panel panel-primary">
    <div class="panel-heading heading-targle" style=" font-size: 28px;display:flex; cursor:pointer " aria-hidden="true" data-toggle="collapse" data-target="#Panel_Challenger">Challenger
        <div style="margin-left: auto;"><i class="fa fa-chevron-down" id="collapse_icon"></i></div>
    </div>
    <div class="panel-body collapse in" id="Panel_Challenger">
        <?php for($i=1;$i<11;$i++){?>
        <div class="<?php echo ((1==($i)%5)?" col-lg-offset-1 ":" "); ?>col-lg-2 col-md-4 col-sm-4 col-xs-6 card_group" id="<?php echo $i;?>">
            <div class="card">
                <div class="box box-widget widget-user" style="border-radius: 5%;border: 5px solid #3282b8  !important;background-color:#3282b8">
                    <!-- Add the bg color to the header using any of the bg-* classes -->
                    <div class="widget-user-header " style="border-radius: 5px 5px 0px 0px;background: url('<?php echo base_url('assets/dist/img/cluster/cluster'.($i-1).'.png'); ?>') center center;background-color: #bbe1fa ;height: 180px;background-size: contain;background-origin: content-box;background-repeat: no-repeat;">
                    </div>

                    <div class="box-footer bg-maroon card-header-font" style="background-color:#3282b8  !important;text-align: center;padding-top: 0px;border-top: 0px !important">
                        Cluster
                        <?php echo ($i-1); ?>
                        <!-- /.row -->
                    </div>
                    <div id="<?php echo $i;?>" class="box-footer bg-navy button_card mainreward card-button-font" style=" border-top: 0px !important;cursor: pointer;text-align: center;padding-top: 0px;display: inline-block; width: 50%;position: absolute; bottom: 0;">
                        <i class="fa fa-gamepad" style=" font-size: large; margin-top: 10px;"></i> <br>MainReward
                    </div>
                    <div id="<?php echo $i;?>" class="box-footer bg-green-active button_card button_challenger card-button-font" style="border-top: 0px !important; cursor: pointer;text-align: center;padding-top: 0px;display: inline-block; width: 50%;position: absolute; bottom: 0;right:0">
                        <i class="fa fa-users" style=" font-size: large; margin-top: 10px;"></i> <br>Challenger
                    </div>
                </div>
            </div>
        </div>
        <?php } ?>
    </div>
</div>

<div class="panel panel-primary" id="panel-mainreward">
    <div class="panel-heading" style=" font-size: 28px; ">Main Reward of Cluster <span class="cluster_title">0</span>
    </div>
    <div class="panel-body">
        <div class="row">
            <?php foreach($Data_list as $key=> $row ){ $number_new = rand(0, 100)?>
            <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12 card_reward" id="<?php echo " 2/ ".$key;?>">
                <div id="card_reward" class="info-box bg-yellow" style=" cursor: pointer; ">
                    <span class="info-box-icon"><i class="fa fa-bookmark-o"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text">
							<?php echo $row["name"] ?>
						</span>
                        <span class="info-box-number">
							<?php echo $number_new;?>/100 <span style=" position: absolute; right: 20px; ">0%</span>
                        </span>

                        <div class="progress">
                            <div class="progress-bar" style="width: <?php echo $number_new;?>%"></div>
                        </div>
                        <span class="progress-description">
							<?php echo $row["time_start"] ?> -
							<?php echo $row["time_end"] ?>
						</span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
            <?php } ?>
        </div>
        <div style=" color: #C73523;margin-top:25px;font-size:18px">
            <span style="color:black">หมายเหตุ :</span> สีแดงค่าจะอยู่ระหว่าง 0-29% <span style="color:goldenrod">สีเหลืองค่าจะอยู่ระหว่าง 30-99%</span> <span style="color:green">สีเขียวค่าจะอยู่ที่ 100%</span>
        </div>
    </div>
</div>

<div class="panel panel-primary" id="panel-achievment">
    <div class="panel-heading" style=" font-size: 28px; ">Achievement of Cluster <span class="cluster_title">0</span>
    </div>
    <div class="panel-body">
        <div class="row" id="Achievement_row">
            <div class="col-md-6 col-xs-12 Achievement" id="<?php echo " 2/ ".$key;?>">
                <div id="Achievement" class="info-box bg-green-active " style="border: 4px solid #2b918d;">
                    <span class="info-box-icon">
						<div
							style="background: url('<?php echo base_url('assets/dist/img/achi_icon.png'); ?>') center center;height: 75%; margin-top: 25%; background-size: contain; background-origin: content-box; background-repeat: no-repeat;">
						</div>
					</span>

                    <div class="info-box-content" style="background-color:white;color:black">
                        <span class="info-box-number">Title Achievement</span>
                        <span class="info-box-text">Detail Achievement</span>

                        <div class="progress" style=" height: 3px; ">
                            <div class="progress-bar" style="width: 100%;background: #36b5b0;"></div>
                        </div>
                        <span class="progress-description">
							<i class="fa fa-star" style="font-size:30px"></i>
						</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    var action = 0;
    $(document).ready(function() {

		$('#panel-mainreward').hide();
		$('#panel-achievment').hide();

		$(".bg-maroon:contains(Cluster <?php echo $userRoles[0]>=2 && $userRoles[0]<=11?$userRoles[0]-2:0; ?>)").closest(".card").find(".mainreward").click()
		
		$('.button_card').slideUp();
		
        $(".card").hover(function() {
            $(this).find('.button_card').slideDown();
        }, function() {
            $(this).find('.button_card').slideUp();
		});
		
        $(".info-box-text").each(function() {
            $(this).closest('#card_reward').attr('class', 'info-box bg-red');
            $(this).closest('#card_reward').find('.info-box-number').html("0/0 " + '<span style=" position: absolute; right: 20px; ">0%</span>')
            $(this).closest('#card_reward').find('.progress-bar').attr("style", "width:0%")
        })

        /**
         * for onclick to collapse panel
         *
         * @Author	Jiranuwat Jaiyen       
         * @Create Date	22-03-2563
         */
        $(".heading-targle").click(function() {
            $("#collapse_icon").attr("class") == "fa fa-chevron-down" ? $("#collapse_icon").attr("class", "fa fa-chevron-up") : $("#collapse_icon").attr("class", "fa fa-chevron-down")
        })
        $(".box-footer:contains('Cluster <?php echo $userRoles[0]-2 ?>')").click()

        /**
         * for onclick to change page to mainreward 
         *
         * @Author	Jiranuwat Jaiyen       
         * @Create Date	22-03-2563
         */
        $(".card_reward").click(function() {
            window.location.href = "<?php echo site_url("mainreward/"); ?>index/" + $(this).attr("id");
        });

        /**
         * for onclick to change page to challenger 
         *
         * @Author	Jiranuwat Jaiyen       
         * @Create Date	22-03-2563
         */
        $(".button_challenger").click(function() {
            window.location.href = "<?php echo site_url("challenger/"); ?>index/" + ($(this).attr("id"));
        });
    })


    /**
     * for onclick to get the mainreward
     *
     * @Author	Jiranuwat Jaiyen       
     * @Create Date	22-03-2563
     */
    $(".mainreward").click(function() {

        var targle_id = $(this).attr("id");
        $(".card_reward").each(function(a, b) {
            $(this).attr("id", targle_id + "/" + a)
        })

        if (action) {
            $('html,body').animate({
                scrollTop: $('#card_reward').offset().top - 75
            }, 1000);
        }
        action++;
        $(".info-box-text").each(function() {
            $(this).closest('#card_reward').attr('class', 'info-box bg-red');
            $(this).closest('#card_reward').find('.info-box-number').html("0/0" + '<span style=" position: absolute; right: 20px; ">0%</span>')
            $(this).closest('#card_reward').find('.progress-bar').attr("style", "width:0%")
		})

        // For cluster in SE BUU
        let cluster_se_buu = targle_id-1;
        $(".cluster_title").text(targle_id-1);
		// Show URL of activity
		// ------------- Get activity -----------------------
        $.get("<?php echo site_url("Home/get_Activity/"); ?>" + (parseInt(targle_id)),
            function(data, status) {
                console.log('-------- Get activity (Group: '+cluster_se_buu+') -------- ')
				console.log(' -- Status: ' + status + ' -- \n')
                console.log(JSON.parse(data))

                var raw_data = JSON.parse(data);
                var max_user = 10

                if (raw_data != '') {
                    if(raw_data[0]['max_user']==null) {
                        max_user = 1000;
                    }else {
                        max_user = raw_data[0]['max_user'];
                    }
                }

                $(".info-box-text").each(function() {
                    $(this).closest('#card_reward').attr('class', 'info-box bg-red');
                    $(this).closest('#card_reward').find('.info-box-number').html("0/" + max_user + '<span style=" position: absolute; right: 20px; ">0%</span>')
                    $(this).closest('#card_reward').find('.progress-bar').attr("style", "width:0%")
                })

                for (var i = 0; i < raw_data.length; i++) {
                    var targle_text = raw_data[i]["name"]
                    var user_now = raw_data[i]["count_user"];
                    var percent = user_now / max_user * 100
                    var class_div = "";
                    var targle_jq = $(".info-box-text:contains('" + targle_text + "')")
                    if (percent >= 0 && percent < 30) {
                        class_div = 'info-box bg-red';
                        css_div = "cursor: pointer;"
                        bar_css = ""
                    } else if (percent >= 30 && percent < 100) {
                        class_div = 'info-box bg-yellow';
                        css_div = "cursor: pointer;"
                        bar_css = ""
                    } else if (percent >= 100) {
                        class_div = 'info-box bg-green';
                        css_div = "cursor: pointer;"
                        bar_css = ""
                    } else {
                        class_div = 'info-box bg-white';
                        css_div = "border: 0.5px solid gray;cursor: pointer;";
                        bar_css = "background-color:gray";
                    }
                    targle_jq.closest('#card_reward').attr('class', 'info-box ' + class_div);
                    targle_jq.closest('#card_reward').attr('style', css_div);
                    targle_jq.closest('#card_reward').find('.info-box-number').html(user_now + "/" + max_user + '<span style=" position: absolute; right: 20px; ">' + parseInt(percent) + '%</span>')
                    targle_jq.closest('#card_reward').find('.progress-bar').attr("style", "width:" + percent + "%;" + bar_css)
                }
			});
		// End get activity
			
		// ------------ Get achievement -------------------------
        $.get("<?php echo site_url("Home/get_all_Achievement/"); ?>" + (targle_id),
            function(data, status) {
                console.log('-------- Get achievement (Group: '+cluster_se_buu+') -------- ')
                console.log(' -- Status: ' + status + ' -- \n')
                console.log(JSON.parse(data))
                
                var raw_data = JSON.parse(data);
                $("#Achievement_row").empty();

                for (var i = 0; i < raw_data.length; i++) {

                    var star_text = "";
                    var count_time = parseInt(raw_data[i]["count_user"]/raw_data[i]["level"]);

                    if (count_time !== 0) {
                        for (j = 1; j <= count_time; j++) {
                            star_text += '<i class="fa fa-star" style="font-size:30px"></i>';
                        }
                    } else {
                        star_text += '<i class="fa fa-star-o" style="font-size:30px"></i>';
                    }

                    $("#Achievement_row").append(
                        '<div class="col-md-6 col-xs-12 Achievement">' +
                            '<div id="Achievement" class="info-box bg-green-active " style="border: 4px solid #2b918d;">' +
                                `<span class="info-box-icon"><div style="background: url('<?php echo base_url('assets/dist/img/achi_icon.png'); ?>'); margin: 10px 10px 10px 10px;height: 75%; background-size: contain; background-origin: content-box; background-repeat: no-repeat;"></div></span>` +
                                '<div class="info-box-content" style="background-color:white;color:black">' +
                                    '<span class="info-box-number">' + raw_data[i]['name'] + '</span>' +
                                    '<span class="info-box-text">' + raw_data[i]['detail'] + '</span>' +
                                    '<div class="progress" style=" height: 3px; ">' +
                                        '<div class="progress-bar" style="width: 100%;background: #36b5b0;"></div>' +
                                    '</div>' +
                                    '<span class="progress-description">' +
                                        star_text +
                                    '</span>' +
                                '</div>' +
                            '</div>' +
                        '</div>'
                    );
                }
			})
		// End get achievement
		$('#panel-mainreward').show();
		$('#panel-achievment').show();
    });
</script>