<?php
/**
 * Login View
 *
 * @author       Firoz Ahmad Likhon <likh.deshi@gmail.com>
 */
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>OSSD Camp</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="<?php echo base_url('assets/bower_components/bootstrap/dist/css/bootstrap.min.css'); ?>">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url('assets/bower_components/font-awesome/css/font-awesome.min.css'); ?>">
  <!-- Ionicons -->
  <link rel="stylesheet" href="<?php echo base_url('assets/bower_components/Ionicons/css/ionicons.min.css'); ?>">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url('assets/dist/css/AdminLTE.min.css'); ?>">
  <!-- iCheck -->
  <link rel="stylesheet" href="<?php echo base_url('assets/plugins/iCheck/square/blue.css'); ?>">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="<?php echo base_url('assets/dist/css/google-font.css'); ?>">
  
    <style>
        .err {
            color: red;
            font-weight: bold;
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

    </style>
</head>
<body class="hold-transition login-page" style="background-image: url(<?php echo base_url('assets/dist/img/blurred-background.jpg'); ?>);
    background-size: cover;">
<div class="login-box" style="background-color: rgba(84, 91, 84, 0.32); padding: 20px;">
  <div class="login-logo" style=" font-size: 55px; ">
    <b>OSSD </b>Camp
  </div>
  <!-- /.login-logo -->
  <div class="col-12 bg-primary" style="font-size: 30px;">Login</div>
  <div class="login-box-body">
    <p class="login-box-msg" style="font-size: large;">Sign in to start your session</p>

    <form class="form-signin" method="post" id="loginForm" action="<?= site_url('login'); ?>">
    <input type="hidden" name="<?= $this->security->get_csrf_token_name(); ?>"
           value="<?= $this->security->get_csrf_hash(); ?>">
    <?= isset($failed) && !empty($failed) ? "<p class='err'>{$failed}</p>" : ""; ?>
    <?= $this->session->flashdata('success'); ?>

    <label for="username" class="sr-only">Username</label>
    <?= form_error('username', '<div class="err">', '</div>'); ?>
    <input type="text" id="inputEmail" class="form-control" placeholder="Username" value="<?= set_value('username'); ?>"
           name="username" autofocus>

    <label for="password" class="sr-only">Password</label>
    <?= form_error('password', '<div class="err">', '</div>'); ?>
    <input type="password" id="inputPassword" class="form-control" placeholder="Password"
           value="<?= set_value('password'); ?>" name="password">


    <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
</form>


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
</html>
