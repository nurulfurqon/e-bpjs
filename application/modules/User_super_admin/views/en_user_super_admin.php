<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>E-Bpjs | Entry User Super Admin</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/bootstrap/css/bootstrap.min.css">
  <!-- bootstrap datepicker -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/datepicker/datepicker3.css">
  <!-- bootstrap slider -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/bootstrap-slider/bootstrap-slider.css">
  <script src="<?php echo base_url(); ?>assets/plugins/bootstrap-slider/modernizr.js"></script>
  <!-- bootstrap-chosen -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/bootstrap-chosen/bootstrap-chosen.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/ionicons/css/ionicons.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/iCheck/square/blue.css">
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
        Entry User
        <small>super admin</small>
      </h1>
      <ol class="breadcrumb">
        <li><i class="fa fa-dashboard"></i> User Super Admin</li>
        <li class="active">Entry</li>
      </ol>
    </section>
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-12">
            <!-- general form elements -->
            <div class="box box-default">
                <div class="box-header with-border">
                    <h3 class="box-title">Entry Data User</h3>
                </div>
                <!-- /.box-header -->
                <!-- form start -->
                <form role="form" method="post" action="<?php echo site_url("User_super_admin/tambah"); ?>" enctype="multipart/form-data">
                    <div class="box-body">
                        <div class="col-md-6">
                            <div class="form-group">
                              <label for="level_jabatan">Jabatan</label><br>
                              <select name="level_jabatan" id="level_jabatan" class="form-control chosen-select">
                                <option value="" >-Pilih-</option>
                                <?php
                                    foreach($level_jabatan as $baris)
                                    {
                                ?>
                                <option <?php if (!(strcmp(set_value("level_jabatan"),"$baris->id_jabatan"))) {echo "selected=\"selected\"";} ?> value="<?php echo $baris->id_jabatan;?>" ><?php echo $baris->nama_jabatan;?></option>
                                <?php
                                    }
                                ?>
                              </select>
                            </div>
                            <div class="form-group <?php if(form_error('nik_pegawai')){echo "has-error";} ?>">
                              <label for="nik_pegawai">Nik Pegawai</label><br>
                              <select name="nik_pegawai" id="nik_pegawai" class="form-control chosen-select">
                                <?php
                                 if(isset($_POST['nik_pegawai'])){
                                     $ambil = $this->m_user_super_admin->getJabatan($_POST['level_jabatan']);
                                     $data .= "<option value=''>-Pilih-</option>";
                                     foreach ($ambil as $mp){
                                        if($mp->nik == $_POST['nik_pegawai']){
                                            $data .= "<option value='$mp->nik' selected>$mp->nik</option>\n";
                                        }
                                        else{
                                            $data .= "<option value='$mp->nik'>$mp->nik</option>\n";
                                        }
                                     }
                                     echo $data;
                                  }
                                  else{
                                     echo "<option value=''>-Pilih-</option>";
                                  }
                                ?>
                              </select>
                              <?php if(form_error('nik_pegawai')){echo '<span class="control-label" for="nik_pegawai">'.form_error('nik_pegawai').'</span>';} ?>
                            </div>
                            <div class="form-group <?php if(form_error('password')){echo "has-error";} ?>">
                                <label for="password">Password</label>
                                <input type="password" name="password" class="form-control" id="password" value="<?php echo set_value('password') ?>" placeholder="Password">
                                <?php if(form_error('password')){echo '<span class="control-label" for="password">'.form_error('password').'</span>';} ?>
                            </div>
                            <div class="form-group <?php if(form_error('passconf')){echo "has-error";} ?>">
                                <label for="passconf">Ulangi Password</label>
                                <input type="password" name="passconf" class="form-control" id="passconf" value="<?php echo set_value('passconf') ?>" placeholder="Ulangi Password">
                                <?php if(form_error('passconf')){echo '<span class="control-label" for="passconf">'.form_error('passconf').'</span>';} ?>
                            </div>
                        </div>
                    </div>
                    <!-- /.box-body -->

                    <div class="box-footer">
                        <input type="submit" name="btn_tambah" class="btn btn-primary" value="Tambah">
                        <button type="button" class="btn btn-default" onClick="location.href='<?php echo site_url("User_super_admin");?>'"><span class="fa fa-times"></span> Batal</button>
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
<!-- bootstrap datepicker -->
<script src="<?php echo base_url(); ?>assets/plugins/datepicker/bootstrap-datepicker.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins/datepicker/locales/bootstrap-datepicker.id.js"></script>
<!-- bootstrap-chosen -->
<script src="<?php echo base_url(); ?>assets/plugins/bootstrap-chosen/chosen.jquery.js"></script>
<script type="text/javascript">

    $("#level_jabatan").chosen();
    $("#nik_pegawai").chosen();
    $(function(){
        $("#level_jabatan").chosen().change(function(){
        var level_jabatan = $("#level_jabatan").val();
        $.ajax({
           type : "POST",
           url  : "<?php echo site_url('User_super_admin/ambil_jabatan'); ?>",
           data : "level_jabatan=" + level_jabatan,
           success: function(data){
                 $("#nik_pegawai").html(data).trigger("chosen:updated");
           }
        });
      });
    });

    var config = {
      '.chosen-select'           : {},
      '.chosen-select-deselect'  : {allow_single_deselect:true},
      '.chosen-select-no-single' : {disable_search_threshold:10},
      '.chosen-select-no-results': {no_results_text:'Oops, nothing found!'},
      '.chosen-select-width'     : {width:"95%"}
    }
    for (var selector in config) {
      $(selector).chosen(config[selector]);
    }
</script>
<!-- FastClick -->
<script src="<?php echo base_url(); ?>assets/plugins/fastclick/fastclick.js"></script>
<!-- iCheck -->
<script src="<?php echo base_url(); ?>assets/plugins/iCheck/icheck.min.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url(); ?>assets/dist/js/app.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?php echo base_url(); ?>assets/dist/js/demo.js"></script>
<!-- Wow.js -->
<script src="<?php echo base_url(); ?>assets/dist/js/wow.min.js"></script>
<script>
  //wow js
  new WOW().init();

  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%' // optional
    });
  });

  //Date picker
    $('#datepicker').datepicker({
      autoclose: true,
	  format: 'dd/mm/yyyy',
	  language: 'id'
    });

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
