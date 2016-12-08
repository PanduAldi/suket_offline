
<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>AdminLTE 2 | Log in</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <!-- Bootstrap 3.3.4 -->
    <link href="http://localhost/assets/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <!-- Font Awesome Icons -->
    <link href="http://localhost/assets/fontawesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <!-- Data Animate -->
    <link rel="stylesheet" href="http://localhost/assets/data-animate.css">
    <!-- Theme style -->
    <link href="http://localhost/assets/adminlte/dist/css/AdminLTE.min.css" rel="stylesheet" type="text/css" />
    <!-- iCheck -->
    <link href="http://localhost/assets/adminlte/plugins/iCheck/square/blue.css" rel="stylesheet" type="text/css" />

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <!-- jQuery 2.1.4 -->
    <script src="http://localhost/assets/jQuery-2.1.4.min.js"></script>
    <!-- Bootstrap 3.3.2 JS -->
    <script src="http://localhost/assets/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
  </head>
  <body class="login-page">
    <div class="login-box">
      <div class="login-logo">
        <a href="<?php echo site_url('login') ?>"><b>SUKET</b>Offline</a>
      </div><!-- /.login-logo -->
      <div class="login-box-body">
        <p class="login-box-msg">Silahkan Login</p>
        <form action="" method="post">
          <div class="form-group has-feedback">
            <input type="text" class="form-control" name="username" placeholder="Email"/>
            <span class="glyphicon glyphicon-user form-control-feedback"></span>
          </div>
          <div class="form-group has-feedback">
            <input type="password" name="password" class="form-control" placeholder="Password"/>
            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
          </div>
          <div class="row">
            <div class="col-xs-4">
              <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
            </div><!-- /.col -->
          </div>
        </form>
        <br>
        <div class="notif">
          <?php echo form_error('username') ?>
          <?php echo form_error('password') ?>
          <?php echo $this->session->flashdata('login_failed'); ?>          
        </div>

      </div><!-- /.login-box-body -->
    </div><!-- /.login-box -->

    <!-- iCheck -->
    <script src="http://localhost/plugins/iCheck/icheck.min.js" type="text/javascript"></script>
    <script>

      $(function() {
        $(".notif").delay(3000).fadeOut(200);
      })
    </script>
  </body>
</html>