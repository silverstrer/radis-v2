<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8">
  <title>RADIS 2 | Log in</title>
  <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
  <!-- Bootstrap 3.3.2 -->
  <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
  <!-- Font Awesome Icons -->
  <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
  <!-- Theme style -->
  <link href="dist/css/AdminLTE.min.css" rel="stylesheet" type="text/css" />
  <!-- iCheck -->
  <link href="plugins/iCheck/square/blue.css" rel="stylesheet" type="text/css" />

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
</head>

<body class="login-page">
  <div class="login-box">
    <div class="login-logo">
      <a href="#"><b>RADIS</b> v 2.0</a>
    </div><!-- /.login-logo -->
    <div class="login-box-body">
      <p class="login-box-msg">Raport Digital Sekolah (RADIS)</p>
      <form action="conf/ceklogin.php" method="post">
        <div class="form-group has-feedback">
          <input type="text" class="form-control" placeholder="Email" name="userakun"/>
          <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
        </div>
        <div class="form-group has-feedback">
          <input type="password" class="form-control" placeholder="Password" name="passakun"/>
          <span class="glyphicon glyphicon-lock form-control-feedback"></span>
        </div>
        <!-- tampilan cek login -->
        <div class="mb-4" style="color:red;">
          <?php
          if (isset($_GET['pesan'])) {
            if ($_GET['pesan'] == "gagal") {
              echo "Login gagal! username dan password salah!";
            } else if ($_GET['pesan'] == "logout") {
              echo "Anda telah berhasil logout";
            } else if ($_GET['pesan'] == "belum_login") {
              echo "Anda harus login untuk mengakses halaman admin";
            }
          }
          ?>
          <!-- /tampilan login -->
        </div>
        <div class="row">
          <div class="col-xs-4">
            <button type="submit" class="btn btn-primary btn-block btn-flat" name="submit">Masuk</button>
          </div><!-- /.col -->
        </div>
      </form>

    </div><!-- /.login-box-body -->
  </div><!-- /.login-box -->

  <!-- jQuery 2.1.3 -->
  <script src="plugins/jQuery/jQuery-2.1.3.min.js"></script>
  <!-- Bootstrap 3.3.2 JS -->
  <script src="bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
  <!-- iCheck -->
  <script src="plugins/iCheck/icheck.min.js" type="text/javascript"></script>
  <script>
    $(function() {
      $('input').iCheck({
        checkboxClass: 'icheckbox_square-blue',
        radioClass: 'iradio_square-blue',
        increaseArea: '20%' // optional
      });
    });
  </script>

  <!-- Footer -->
  <footer class="text-center text-lg-start bg-body-tertiary text-muted">
    <!-- Copyright -->
    <div class="text-center p-4" style="font-weight:bold;">
      © 2023 Copyright:
      <a class="text-reset fw-bold" href="#">Gala Sanca</a>
    </div>
    <!-- Copyright -->
  </footer>
  <!-- Footer -->

</html>