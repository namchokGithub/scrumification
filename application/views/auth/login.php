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
	<link rel="stylesheet"
		href="<?php  echo base_url('assets/bower_components/bootstrap/dist/css/bootstrap.min.css'); ?>">
	<!-- Font Awesome -->
	<link rel="stylesheet"
		href="<?php echo base_url('assets/bower_components/font-awesome/css/font-awesome.min.css'); ?>">
	<!-- Ionicons -->
	<link rel="stylesheet" href="<?php echo base_url('assets/bower_components/Ionicons/css/ionicons.min.css'); ?>">
	<!-- Theme style -->
	<link rel="stylesheet" href="<?php echo base_url('assets/dist/css/AdminLTE.min.css'); ?>">
	<!-- iCheck -->
	<link rel="stylesheet" href="<?php echo base_url('assets/plugins/iCheck/square/blue.css'); ?>">

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
			margin-bottom: -1px;
			border-bottom-right-radius: 0;
			border-bottom-left-radius: 0;
		}

		.form-signin input[type="password"] {
			margin-bottom: 10px;
			border-top-left-radius: 0;
			border-top-right-radius: 0;
		}

		.login-box {
			background-color: rgba(84, 91, 84, 0.5) !important; 
			padding: 20px !important;
			width: 370px !important;
			margin: 12% auto !important;
		}

		.login-box-msg {
			padding: 0 20px 0px 20px !important;
		}

		
		.login-logo {
			margin-bottom: 10px !important;
		}

		body {
			background-image: url(<?php echo base_url('assets/dist/img/background-ossd7-2.jpg'); ?>) !important;
    		background-size: cover !important;
		}

		* {
			font-family: 'Bai Jamjuree', sans-serif !important;
		}

	</style>
</head>
<!-- End head section -->

<!-- Body section-->
<body class="hold-transition login-page" style="">
	<div class="login-box">
		
		<div class="text-center">
			<img class="text-center img-circle" style="width: 100px;"
			src="<?php echo base_url('assets/dist/img/logo.svg'); ?>" alt="SCM Logo">
		</div>

		<div class="login-logo" style=" font-size: 36px; color: white;">
			<b style="font-weight: bold;">OSSD</b> Camp
		</div>
		<!-- /.login-logo -->
		<div class="login-box-body">

			<h2 class="login-box-msg" style="font-size: large; font-weight: bold;">ลงชื่อเข้าสู่ระบบ</h2>

			<!-- Form login -->
			<form class="form-signin" method="post" id="loginForm" action="<?= site_url('login'); ?>">
				
				<input type="hidden" name="<?= $this->security->get_csrf_token_name(); ?>"
						value="<?= $this->security->get_csrf_hash(); ?>">
				<?= isset($failed) && !empty($failed) ? "<p class='err'>{$failed}</p>" : ""; ?>
				<?= $this->session->flashdata('success'); ?>

				<div class="form-group">
					<label for="username" class="sr-only">ชื่อผู้ใช้งาน</label>
					<?= form_error('username', '<div class="err">', '</div>'); ?>
					<input type="text" id="inputEmail" class="form-control" placeholder="ชื่อผู้ใช้งาน"
						value="<?= set_value('username'); ?>" name="username" autofocus>
					<i class="fa fa-fw fa-user"></i>
				</div>

				<div class="mt-1">
					<label for="password" class="sr-only">รหัสผ่าน</label>
					<?= form_error('password', '<div class="err">', '</div>'); ?>
					<input type="password" id="inputPassword" class="form-control" placeholder="รหัสผ่าน"
						value="<?= set_value('password'); ?>" name="password">
				</div>
				<button class="btn btn-lg btn-primary btn-block mt-2" type="submit">เข้าสู่ระบบ</button>
			</form>
			<!-- End form login -->
			<div class="pl-4">
				<a href="#">ลืมรหัสผ่าน</a>
			</div>

		</div>
		<!-- /.login-box-body -->
	</div>
	<!-- /.login-box -->

	<!-- jQuery 3 -->
	<script src="<?php echo base_url('assets/bower_components/jquery/dist/jquery.min.js'); ?>"></script>
	<!-- Bootstrap 3.3.7 -->
	<script src="<?php echo base_url('assets/bower_components/bootstrap/dist/js/bootstrap.min.js'); ?>"></script>
	<!-- iCheck -->
	<script src="<?php echo base_url('assets/plugins/iCheck/icheck.min.js'); ?>"></script>
	<script>
		$(function () {
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