<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">

    <title>Scrumification</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="<?php echo base_url('assets/bower_components/bootstrap/dist/css/bootstrap.min.css'); ?> ">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?php echo base_url('assets/bower_components/font-awesome/css/font-awesome.min.css'); ?> ">
    <!-- Ionicons -->
    <link rel="stylesheet" href="<?php echo base_url('assets/bower_components/Ionicons/css/ionicons.min.css'); ?> ">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?php echo base_url('assets/dist/css/AdminLTE.min.css'); ?> ">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="<?php echo base_url('assets/dist/css/skins/_all-skins.min.css'); ?> ">
    <link rel="shortcut icon" type="image/x-icon" href="<?php echo base_url('assets/dist/img/logo.svg'); ?>" />
    <link href="<?php echo base_url('assets/dist/css/KanitPrompt.css'); ?>" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Bai+Jamjuree:wght@300&display=swap" rel="stylesheet">
    <style>
        *:not(.fa):not(.fas):not(.sidebar-toggle) {
            font-family: 'Bai Jamjuree', sans-serif !important;
        }
        
        .user-panel>.info>p {
            margin-bottom: 9px !important;
            padding: 5px !important;
        }
        
        .sidebar-menu li.header {
            padding: 5px 25px 5px 15px !important;
        }
        
        .non-hover:hover>a {
            background: #3C8DBC !important;
            cursor: default !important;
        }
        
        .logout-menu {
            font-size: 25px;
            text-align: center;
            background-color: WHITE !important;
            /* border: none; */
            margin-top: -1px;
            margin-right: -8px;
            color: black !important;
            border: 1px solid black;
        }
        
        .logout-menu:hover {
            color: black !important;
            background-color: rgb(151, 151, 151);
        }
    </style>

    <?php if (isset($css)){
		foreach ($css as $css1){
			echo ' <link href="'.base_url($css1).'" rel="stylesheet">'."\r\n";
		}
	}
	?>

    <!-- jQuery 3 -->
    <script type="text/javascript" src="<?php echo base_url('assets/bower_components/jquery/dist/jquery.min.js'); ?> "></script>
    <!-- Bootstrap 3.3.7 -->
    <script type="text/javascript" src="<?php echo base_url('assets/bower_components/bootstrap/dist/js/bootstrap.min.js'); ?> "></script>
    <!-- SlimScroll -->
    <script type="text/javascript" src="<?php echo base_url('assets/bower_components/jquery-slimscroll/jquery.slimscroll.min.js'); ?> "></script>
    <!-- FastClick -->
    <script type="text/javascript" src="<?php echo base_url('assets/bower_components/fastclick/lib/fastclick.js'); ?> "></script>
    <!-- AdminLTE App -->
    <script type="text/javascript" src="<?php echo base_url('assets/dist/js/adminlte.min.js'); ?> "></script>

    <?php if (isset($scripts)){
		foreach ($scripts as $script){
			echo ' <script type="text/javascript" src="'.base_url($script).'"></script>'."\r\n";
		}
	}
	?>

    <script type="text/javascript">
        /**
         * check cookie in the system
         *
         * @Author	Jiranuwat Jaiyen       
         * @Create Date	22-03-2563
         */
        var cookies = document.cookie.split(";");

        for (var i = 0; i < cookies.length; i++) {
            var cookie = cookies[i];
            var eqPos = cookie.indexOf("=");
            var name = eqPos > -1 ? cookie.substr(0, eqPos) : cookie;
            document.cookie = name + "=;expires=Thu, 01 Jan 1970 00:00:00 GMT";
        }

        /**
         * get Cookie by name
         *
         * @Author	Jiranuwat Jaiyen       
         * @Create Date	22-03-2563
         */
        function getCookie(cname) {
            var name = cname + "=";
            var decodedCookie = decodeURIComponent(document.cookie);
            var ca = decodedCookie.split(';');
            for (var i = 0; i < ca.length; i++) {
                var c = ca[i];
                while (c.charAt(0) == ' ') {
                    c = c.substring(1);
                }
                if (c.indexOf(name) == 0) {
                    return c.substring(name.length, c.length);
                }
            }
            return "";
        }

        /**
         * set Cookie for name , value and exdays
         *
         * @Author	Jiranuwat Jaiyen       
         * @Create Date	22-03-2563
         */
        function setCookie(cname, cvalue, exdays) {
            var d = new Date();
            d.setTime(d.getTime() + (exdays * 24 * 60 * 60 * 1000));
            var expires = "expires=" + d.toUTCString();
            console.log("raw_cookie", encodeURI(cvalue))
            document.cookie = cname + "=" + encodeURI(cvalue) + ";" + expires + ";path=/";
            console.log("cookie", document.cookie)
        }
    </script>
    
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
  <![endif]-->

    <!-- Google Font -->
    <link rel="stylesheet" href="<?php echo base_url('assets/dist/css/google-font.css'); ?>">
</head>

<body class="hold-transition skin-blue sidebar-mini /*sidebar-collapse*/">

    <!-- Site wrapper -->
    <div class="wrapper">

        <header class="main-header">
            <!-- Logo -->
            <a href="<?php echo site_url('home');?>" class="logo">
                <!-- mini logo for sidebar mini 50x50 pixels -->
                <span class="logo-mini">SCM</span>
                <!-- logo for regular state and mobile devices -->
                <span class="logo-lg">Scrumification</span>
            </a>
            <!-- Header Navbar: style can be found in header.less -->
            <nav class="navbar navbar-static-top">
                <!-- Sidebar toggle button-->
                <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button"></a>

                <div class="navbar-custom-menu">
                    <ul class="nav navbar-nav">
                        <!-- User Account: style can be found in dropdown.less -->
                        <li class="user user-menu non-hover">
                            <a href="#" class="dropdown-toggle">
								<img style="" src="<?php echo base_url('assets/dist/img/user/'.$Profile[2].'.jpg'); ?>" class="user-image" alt="User Image" onerror="this.onerror=null;this.src='<?php echo base_url('assets/dist/img/user/unknown-who.jpg'); ?>';">
								<span class="hidden-xs"><?php echo $Profile[0]; ?></span>
							  </a>
                        </li>
                        <!-- Control Sidebar Toggle Button -->
                        <li class="dropdown user user-menu">
                            <a href="#" class="dropdown-toggle" style="font-size: 20px;" data-toggle="dropdown"><i class="fa fa-user-circle"></i></a>

                            <ul class="dropdown-menu">
                                <!-- User image -->
                                <!-- <li class="user-header">
                                    <img style="object-fit: cover; object-position: center;" src="<?php echo base_url('assets/dist/img/user/'.$Profile[2].'.jpg'); ?>" class="img-circle" alt="User Image" onerror="this.onerror=null;this.src='<?php echo base_url('assets/dist/img/user/unknown-who.jpg'); ?>';">
                                    <div id="wrapper" style="margin-bottom: -10px;">
                                        <form method="post" action="" enctype="multipart/form-data" id="myform">
                                            <input type="file" id="selectedFile" style="display: none;" />
                                            <input type="button" value="เปลี่ยนภาพประจำตัว" onclick="document.getElementById('selectedFile').click();" />
                                        </form>
                                    </div>
                                    <script>
                                        /**
                                         * Upload profile image to server
                                         *
                                         * @Author	Jiranuwat Jaiyen       
                                         * @Create Date	22-03-2563
                                         */
                                        $("#wrapper").on("change", "#selectedFile", function() {
                                            var fd = new FormData();
                                            var files = $('#selectedFile')[0].files[0];
                                            fd.append('file', files);

                                            $.ajax({
                                                url: "<?php echo base_url('Home/upload_file_image'); ?>",
                                                async: false,
                                                type: 'post',
                                                data: fd,
                                                contentType: false,
                                                processData: false,
                                                success: function(response) {
                                                    console.log(response)
                                                },
                                            });
                                            location.reload();
                                        });
                                    </script>
                                    <p>
                                        <?php echo $Profile[0]; ?>
                                        <small><?php echo empty($Profile[1][0])? "No Role": implode(" , ",$Profile[1][0]); ?></small>
                                    </p>
                                </li> -->

                                <!-- Menu Footer-->
                                <li class="logout-menu">
                                    <a class="" href="<?= site_url('login/logout')?>" class=""> ออกจากระบบ</a>
                                    <!-- <div class="pull-left">
                                        <button type="button" class="btn btn-default btn-flat" data-toggle="modal" data-target="#modal-default">
											เปลี่ยนบทบาท
										</button>
                                    </div>
                                    <div class="pull-right">
                                        <a href="<?= site_url('login/logout')?>" class="btn btn-default btn-flat">
											ออกจากระบบ</a>
                                    </div> -->
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>
        <!-- End header -->

        <div class="modal fade" id="modal-default" style="display: none;">
            <div class="modal-dialog" style="width:75%">
                <div class="modal-content">
                    <div class="modal-header  bg-light-blue-gradient">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true" style=" font-size: 30px; color: black; ">×</span></button>
                        <h4 class="modal-title">Change Role Modal</h4>
                    </div>
                    <div class="modal-body">
                        <div class="row" id="list_role">
                            <?php 
							if(empty($Profile[1][0])){?>
                            <div class="col-lg-4 col-xs-6">
                                <!-- small box -->
                                <div class="small-box bg-yellow">
                                    <div class="inner">
                                        <p style=" font-weight: 700; font-size: 28px; ">Guest</p>
                                        <p>Activated</p>
                                    </div>
                                    <div class="icon">
                                        <i class="ion ion-person"></i>
                                    </div>
                                    <a href="#" class="small-box-footer" data-dismiss="modal" aria-label="Close">Choose
										This Role<i class="fa fa-arrow-circle-down"></i>
									</a>
                                </div>
                            </div>
                            <?php }
							foreach($Profile[1][0] as $Role){ ?>
                            <div class="col-lg-4 col-xs-6">
                                <!-- small box -->
                                <div class="small-box bg-yellow">
                                    <div class="inner">
                                        <p style=" font-weight: 700; font-size: 28px; ">
                                            <?php echo $Role; ?>
                                        </p>
                                    </div>
                                    <div class="icon">
                                        <i class="ion ion-person"></i>
                                    </div>
                                    <a onclick='setCookie("Role","<?php echo $Role; ?>",999);location.reload();' class="Role_button small-box-footer" style=" cursor: pointer; ">Choose This
										Role<i class="fa fa-arrow-circle-down"></i>
									</a>
                                </div>
                            </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
        <!-- End change role -->

        <script type="text/javascript">
            /**
             * update point every 10 seconds 
             *
             * @Author	Jiranuwat Jaiyen       
             * @Create Date	22-03-2563
             */
            var role_set = JSON.parse('<?php echo json_encode($Profile); ?>');
            $("p:contains('" + getCookie("Role") + "')").closest(".inner").append("<p>Activated</p>");
            $.ajax({
                url: "<?php echo site_url('Home/calulate_point/'); ?>",
                success: function(data) {
                    console.log("Update Point!!");
                }
            });
            setInterval(function() {
                $.ajax({
                    url: "<?php echo site_url('Home/calulate_point/'); ?>",
                    success: function(data) {
                        console.log("Update Point!!");
                    }
                });
            }, 5000); // time in milliseconds
        </script>
        <!-- =============================================== -->