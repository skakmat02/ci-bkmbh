
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Badan Konsultasi, Mediasi dan Bantuan Hukum</title>
    <link rel="icon" type="image/png" sizes="56x56" href="http://journals.upnjatim.ac.id/images/fav-icon/icon.png">
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.5 -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/font-awesome/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/ionicons/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/dist/css/AdminLTE.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/iCheck/square/blue.css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

  </head>
  <body class="hold-transition login-page">
    <div class="login-box">
      <!--
      <div class="login-logo">
        <a href="<?php echo base_url(); ?>"><b><?php echo ucwords($setting->nama_instansi); ?></b></a>
      </div> /.login-logo -->
      <div class="well well-sm">
        <div class="row">
          <div class="col-sm-12">
            <img src="http://ppid.upnjatim.ac.id/wp-content/uploads/2018/11/logoupnnyar.gif" class="img img-responsive" style="display: inline; float: left; margin-right: 20px;width:250px;">
          </div>
        </div>

      </div>

      <div class="login-box-body">
        <p class="login-box-msg">Silahkan Register</p>
        <?php echo $this->session->flashdata("k"); ?>
        <?php echo form_open('home/do_register'); ?>
        <div class="form-group has-feedback">
          <input type="text" name="nama" autofocus required="" class="form-control" placeholder="Nama Lengkap">
          <span class="glyphicon glyphicon-user form-control-feedback"></span>
        </div>
        <div class="form-group has-feedback">
          <input type="email" name="email" required="" class="form-control" placeholder="E-Mail">
          <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
        </div>
        <div class="form-group has-feedback">
          <input type="number" name="hp" required="" class="form-control" placeholder="No HP">
          <span class="glyphicon glyphicon-phone-alt form-control-feedback"></span>
        </div>
        <div class="form-group has-feedback">
          <input type="text" name="alamat" required="" class="form-control" placeholder="Alamat Sesuai KTP">
          <span class="glyphicon glyphicon-home form-control-feedback"></span>
        </div>
          <div class="form-group has-feedback">
            <input type="text" name="user" required="" class="form-control" placeholder="Username">
            <span class="glyphicon glyphicon-user form-control-feedback"></span>
          </div>
          <div class="form-group has-feedback">
            <input type="password" name="pass" id="pass" required="" class="form-control" placeholder="Password" >
            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
          </div>
          <div class="form-group has-feedback">
            <input type="password" name="pass2" id="pass2" required="" class="form-control" placeholder="Password" >
            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
          </div>
          <div class="form-group has-feedback">
          <input readonly type="hidden" id="alert" value="Password Tidak Sama" >
</div>

          <div class="row">
            <div class="col-xs-4">
              <button type="submit" class="btn btn-primary btn-block btn-flat"><span class="fa fa-sign-in"></span> Register</button>
            </div><!-- /.col -->
          </div>
        <?php echo form_close(); ?>

      </div><!-- /.login-box-body -->
    </div><!-- /.login-box -->

    <!-- jQuery 2.1.4 -->
    <script src="<?php echo base_url(); ?>assets/plugins/jQuery/jQuery-2.1.4.min.js"></script>
    <!-- Bootstrap 3.3.5 -->
    <script src="<?php echo base_url(); ?>assets/bootstrap/js/bootstrap.min.js"></script>
    <!-- iCheck -->
    <script src="<?php echo base_url(); ?>assets/plugins/iCheck/icheck.min.js"></script>
    <script>
      $(function () {
        $('input').iCheck({
          checkboxClass: 'icheckbox_square-blue',
          radioClass: 'iradio_square-blue',
          increaseArea: '20%' // optional
        });
      });
    </script>
    <script>
    document.getElementById("pass").addEventListener("keyup", testpassword2);
document.getElementById("pass2").addEventListener("keyup", testpassword2);

function testpassword2() {
  var text1 = document.getElementById("pass");
  var text2 = document.getElementById("pass2");
  if (text1.value == text2.value) {
    text2.style.borderColor = "#2EFE2E";
  }
  else {
    text2.style.borderColor = "red";
  }
}
    </script>
  </body>
</html>
