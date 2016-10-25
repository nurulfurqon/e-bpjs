<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>E-Bpjs | Detail Jabatan Super Admin</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/bootstrap/css/bootstrap.min.css">
  <!-- bootstrap datepicker -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/datepicker/datepicker3.css">
  <!-- bootstrap slider -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/bootstrap-slider/bootstrap-slider.css">
  <script src="<?php echo base_url(); ?>assets/plugins/bootstrap-slider/modernizr.js"></script>
  <!-- bootstrap switch -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/bootstrap-switch/bootstrap-switch.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/bootstrap-switch/highlight.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/bootstrap-switch/main.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/dist/css/AdminLTE.min.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/dist/css/animate.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/dist/css/custom.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/dist/css/skins/_all-skins.min.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="<?php echo base_url(); ?>assets/https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">
  <!-- Header -->
  <?php $this->load->view('../../menu_super_admin/header') ?>
  <!-- end header -->
    <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Detail Jabatan
        <small>super admin</small>
      </h1>
      <ol class="breadcrumb">
        <li><i class="fa fa-dashboard"></i> Jabatan Super Admin</li>
        <li>View</li>
        <li class="active">Detail</li>
      </ol>
    </section>
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-12">
            <!-- general form elements -->
            <div class="box box-default">
                <div class="box-header with-border">
                    <h3 class="box-title">Detail Data Jabatan</h3>
                </div>
                <!-- /.box-header -->
                <!-- form start -->
                <form role="form" method="post" action="<?php echo site_url("Jabatan_super_admin/detail/".md5(sha1($detail->id_jabatan))); ?>">
                    <div class="box-body">
                        <div class="col-md-6">
                            <fieldset disabled>
                            <div class="form-group">
                                <label for="level_jabatan">Level Jabatan</label>
                                <input type="text" class="form-control" id="level_jabatan" value="<?php echo $detail->id_jabatan; ?>" >
                            </div>
                            </fieldset>
                            <div class="form-group <?php if(form_error('nama_jabatan')){echo "has-error";} ?>">
                                <label for="nama_jabatan">Nama Jabatan</label>
                                <input type="text" name="nama_jabatan" class="form-control" id="nama_jabatan" value="<?php if($act == "0") echo $detail->nama_jabatan; if($act == "1") echo set_value('nama_jabatan'); ?>" placeholder="Nama Jabatan">
                                <?php if(form_error('nama_jabatan')){echo '<span class="control-label" for="nama_jabatan">'.form_error('nama_jabatan').'</span>';} ?>
                            </div>
                            <div class="form-group <?php if(form_error('quota')){echo "has-error";} ?>">
                                <label for="quota">Quota</label>
                                <input type="text" name="quota" class="form-control" id="quota" value="<?php if($act == "0") echo $detail->quota; if($act == "1") echo set_value('quota'); ?>" onKeyPress="return hanyaAngka(event, false)" placeholder="Quota">
                                <?php if(form_error('quota')){echo '<span class="control-label" for="quota">'.form_error('quota').'</span>';} ?>
                            </div>
                        </div>
                    </div>
                    <!-- /.box-body -->

                    <div class="box-footer">
                        <input type="submit" name="btn_ubah" class="btn btn-primary" value="Ubah">
                        <button type="button" class="btn btn-default" onClick="location.href='<?php echo site_url("Jabatan_super_admin");?>'"><span class="fa fa-times"></span> Batal</button>
                    </div>
                </form>
            </div>
            <!-- /.box -->

        </div>
      </div>
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
    </section>
    <!-- /.content -->
  </div>
    <!-- /.content-wrapper -->
  <footer class="main-footer">
    <strong>Copyright &copy; 2016 <a href="">Konverta Mitra Abadi</a>.</strong> All rights
    reserved.
  </footer>

</div>
<!-- ./wrapper -->

<!-- jQuery 2.2.0 -->
<script src="<?php echo base_url(); ?>assets/plugins/jQuery/jQuery-2.2.0.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="<?php echo base_url(); ?>assets/bootstrap/js/bootstrap.min.js"></script>
<!-- Slimscroll -->
<script src="<?php echo base_url(); ?>assets/plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="<?php echo base_url(); ?>assets/plugins/fastclick/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url(); ?>assets/dist/js/app.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?php echo base_url(); ?>assets/dist/js/demo.js"></script>
<!-- Wow.js -->
<script src="<?php echo base_url(); ?>assets/dist/js/wow.min.js"></script>
<!-- Mask Money -->
<script src="<?php echo base_url(); ?>assets/plugins/maskMoney/jquery.maskMoney.min.js"></script>
<script type="text/javascript">
$(document).ready(function(){
	$('#quota').maskMoney({prefix:'Rp. ', thousands:'.', decimal:',', precision:0});
});
</script>
<script>
  //wow js
  new WOW().init();

  //modal hapus
  function hapus_data(kode,url)
	{
		pesan = confirm ("Data "+kode+" Ingin Dihapus ?");
		if(pesan == true)
		{
			location.href=url;
			return true;
		}
		else
		{

			return false;
		}
	}

  function hanyaAngka(e, decimal) {
    var key;
    var keychar;
     if (window.event) {
         key = window.event.keyCode;
     } else
     if (e) {
         key = e.which;
     } else return true;

    keychar = String.fromCharCode(key);
    if ((key==null) || (key==0) || (key==8) ||  (key==9) || (key==13) || (key==27) ) {
        return true;
    } else
    if ((("0123456789").indexOf(keychar) > -1)) {
        return true;
    } else
    if (decimal && (keychar == ".")) {
        return true;
    } else return false;
    }
</script>
</body>
</html>
