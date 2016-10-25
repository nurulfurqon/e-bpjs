<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>E-Bpjs | Log in</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/dist/css/AdminLTE.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/dist/css/animate.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/dist/css/custom.css">
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
  <div class="login-logo">
    <a href=""><b>Login </b>E-BPJS</a>
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body">
    <p class="login-box-msg">Log in to e-bpjs</p>

    <form name="frm" method="post" role="form">
      <div class="form-group has-feedback <?php if(form_error('nik')){echo "has-error";} ?>">
        <input type="text" name="nik" class="form-control" id="inputError" value="<?php echo set_value('nik') ?>" placeholder="Nik">
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
		    <?php if(form_error('nik')){echo '<span class="control-label" for="inputError">'.form_error('nik').'</span>';} ?>
      </div>
      <div class="form-group has-feedback <?php if(form_error('password')){echo "has-error";} ?>">
        <input type="password" name="password" class="form-control" value="<?php echo set_value('password') ?>" placeholder="Password">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
        <?php if(form_error('password')){echo '<span class="control-label" for="inputError">'.form_error('password').'</span>';} ?>
      </div>
	  <br>
	  <hr>
      <div class="row">
        <div class="col-xs-8">
          <div class="checkbox icheck">
            <label>
              <input type="checkbox"> Remember Me
            </label>
          </div>
        </div>
        <!-- /.col -->
        <div class="col-xs-4">
          <input type="submit" name="btn_login" class="btn btn-primary btn-block btn-flat" value="Log In">
        </div>
        <!-- /.col -->
      </div>
    </form>
  </div>
  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->
<?php
  if(!empty($error))
  {
?>
<div class="pesan-error">
  <div class="col-sm-4 col-sm-offset-8">
	  <div class="row">
		<div class="wow bounceIn alert alert-warning alert-dismissible" data-wow-delay="0.3s">
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
			<h4><i class="icon fa fa-warning"></i> Alert!</h4>
			<?php echo $error; ?>
		</div>
	  </div>
  </div>
</div>
<?php
  }
?>
<!-- jQuery 2.2.0 -->
<script src="<?php echo base_url(); ?>assets/plugins/jQuery/jQuery-2.2.0.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="<?php echo base_url(); ?>assets/bootstrap/js/bootstrap.min.js"></script>
<!-- iCheck -->
<script src="<?php echo base_url(); ?>assets/plugins/iCheck/icheck.min.js"></script>
<!-- Wow.js -->
<script src="<?php echo base_url(); ?>assets/dist/js/wow.min.js"></script>
<script>
  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%' // optional
    });
  });

   new WOW().init();
</script>
</body>
</html>
