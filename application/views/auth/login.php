<?php
	/**
	 * Name: login.php
	 * Description: Login view
	 * Author: Namchok Singhachai
	 */
	defined('BASEPATH') OR exit('No direct script access allowed');
?>
    <!DOCTYPE html>
    <html>

    <!-- Head section -->

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>OSSD Camps</title>
        <!-- Tell the browser to be responsive to screen width -->
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Bai+Jamjuree:wght@300&display=swap" rel="stylesheet">

        <!-- Bootstrap 4.5.2 -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
        <!-- Bootstrap 3.3.7 -->
        <!-- <link rel="stylesheet"
		href="<?php  echo base_url('assets/bower_components/bootstrap/dist/css/bootstrap.min.css'); ?>"> -->
        <!-- Font Awesome -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" integrity="sha512-+4zCK9k+qNFUR5X+cKL9EIR+ZOhtIloNl9GIKS57V1MyNsYpYcUrUeQc9vNfzsWfV28IaLL3i96P9sdNyeRssA==" crossorigin="anonymous" />
        <!-- Theme style -->
        <link rel="stylesheet" href="<?php echo base_url('assets/dist/css/AdminLTE.min.css'); ?>">

        <link rel="shortcut icon" type="image/x-icon" href="<?php echo base_url('assets/dist/img/logo.svg'); ?>" />
        <!-- Google Font -->
        <link rel="stylesheet" href="<?php echo base_url('assets/dist/css/google-font.css'); ?>">

        <style>
            .err {
                color: red;
            }
            
            .form-signin {
                width: 100%;
                max-width: 330px;
                padding: 15px;
                margin: 0 auto;
            }
            
            .form-signin .checkbox {
                font-weight: 400;
            }
            
            .form-signin .form-control {
                position: relative;
                box-sizing: border-box;
                height: auto;
                padding: 10px;
                font-size: 16px;
            }
            
            .form-signin .form-control:focus {
                z-index: 2;
            }
            
            .form-signin input[type="email"] {
                border-bottom-right-radius: 0;
                border-bottom-left-radius: 0;
            }
            
            .form-signin input[type="password"] {
                border-top-left-radius: 0;
                border-top-right-radius: 0;
            }
            
            .login-box {
                background-color: rgba(84, 91, 84, 0.5) !important;
                padding: 20px !important;
                width: 370px !important;
                margin: 10% auto !important;
            }
            
            .login-box-msg {
                padding: 0 20px 0px 20px !important;
            }
            
            .login-logo {
                margin-bottom: 10px !important;
            }
            
            body {
                background-image: url(<?php echo base_url('assets/dist/img/background-ossd7-2.jpg');
                ?>) !important;
                background-size: cover !important;
            }
            
            *:not(.fas) {
                font-family: 'Bai Jamjuree', sans-serif !important;
            }
            
            .eyeslash {
                float: right !important;
                margin-left: -25px !important;
                margin-top: 10px !important;
                position: relative !important;
                z-index: 2 !important;
                background: none !important;
                opacity: 0.6 !important;
            }
        </style>
    </head>
    <!-- End head section -->

    <!-- Body section-->

    <body class="hold-transition login-page">
        <div class="login-box">

            <div class="text-center">
                <img class="text-center img-circle" style="width: 150px;" src="<?php echo base_url('assets/dist/img/gamification.png'); ?>" alt="SCM Logo">
            </div>

            <div class="login-logo" style=" font-size: 36px; color: white;">
                <b style="font-weight: bold;">OSSD</b> Camp
            </div>
            <!-- /.login-logo -->
            <div class="login-box-body">

                <h2 class="login-box-msg" style="font-size: large; font-weight: bold;">ลงชื่อเข้าสู่ระบบ </h2>

                <!-- Form login -->
                <form class="form-signin" method="post" id="loginForm" action="<?= site_url('login'); ?>">

                    <input type="hidden" name="<?= $this->security->get_csrf_token_name(); ?>" value="<?= $this->security->get_csrf_hash(); ?>">
                    <?= isset($failed) && !empty($failed) ? "<p class='err'>{$failed}</p>" : ""; ?>
                        <?= $this->session->flashdata('success'); ?>

                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="inputEmailIcon"><i class="fas fa-user"></i></span>
                                </div>
                                <label for="username" class="sr-only">ชื่อผู้ใช้งาน</label>
                                <?= form_error('username', '<div class="err">', '</div>'); ?>
                                    <input style="margin-right: -5px !important;" type="text" id="inputEmail" class="form-control" placeholder="ชื่อผู้ใช้งาน" value="<?= set_value('username'); ?>" name="username" autofocus>
                            </div>

                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="inputPasswordIcon"><i class="fas fa-key"></i></span>
                                </div>
                                <label for="password" class="sr-only">รหัสผ่าน</label>
                                <?= form_error('password', '<div class="err">', '</div>'); ?>
                                    <input type="password" id="inputPassword" class="form-control" placeholder="รหัสผ่าน" value="<?= set_value('password'); ?>" name="password">
                                    <div class="input-group-addon eyeslash">
                                        <i class="fas fa-eye-slash" aria-hidden="true"></i>
                                    </div>
                            </div>

                            <button class="btn btn-lg btn-primary btn-block mt-2" type="submit" style="width: 102% !important;">เข้าสู่ระบบ</button>
                </form>
                <!-- End form login -->

                <div class="pl-4">
                    <a id="link-modal-forgotpassword" href="#">ลืมรหัสผ่าน</a>
                </div>
            </div>
            <!-- /.login-box-body -->
        </div>
        <!-- /.login-box -->

        <div class="modal fadeIn" tabindex="-1" role="dialog" id="modal-forgotpassword">
            <div class="modal-dialog" role="document">
                <div class="modal-content ">
                    <div class="modal-header bg-info">
                        <h3 class="text-white">ลืมรหัสผ่าน</h3>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
                    </div>
                    <div class="modal-body">
                        <p>ติดต่อ…</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- jQuery 3 -->
        <script src="<?php echo base_url('assets/bower_components/jquery/dist/jquery.min.js'); ?>"></script>
        <!-- Bootstrap 3.3.7 -->
        <script src="<?php echo base_url('assets/bower_components/bootstrap/dist/js/bootstrap.min.js'); ?>"></script>
        <!-- iCheck -->
        <script src="<?php echo base_url('assets/plugins/iCheck/icheck.min.js'); ?>"></script>
        <script type='text/javascript'>
            $(document).ready(function() {
                $('#check').click(function() {
                    alert($(this).is(':checked'));
                    $(this).is(':checked') ? $('#test-input').attr('type', 'text') : $('#test-input').attr('type', 'password');
                });
            });
        </script>
        <script>
            $(document).ready(function() {
                $(".eyeslash").on('click', function(event) {
                    event.preventDefault();
                    if ($('#inputPassword').attr("type") == "text") {
                        $('#inputPassword').attr('type', 'password');
                        $('.eyeslash i').addClass("fa-eye-slash");
                        $('.eyeslash i').removeClass("fa-eye");
                    } else if ($('#inputPassword').attr("type") == "password") {
                        $('#inputPassword').attr('type', 'text');
                        $('.eyeslash i').removeClass("fa-eye-slash");
                        $('.eyeslash i').addClass("fa-eye");
                    }
                });

                $('#link-modal-forgotpassword').on('click', function(e) {
                    e.preventDefault();
                    $('#modal-forgotpassword').modal()
                    console.log('modal')
                });
            });

            $(function() {
                $('input').iCheck({
                    checkboxClass: 'icheckbox_square-blue',
                    radioClass: 'iradio_square-blue',
                    increaseArea: '20%' /* optional */
                });
            });
        </script>
    </body>
    <!-- End body section -->

    </html>