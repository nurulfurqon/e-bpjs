<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>E-Bpjs | Entry Pegawai Admin</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/bootstrap/css/bootstrap.min.css">
  <!-- bootstrap datepicker -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/datepicker/datepicker3.css">
  <!-- bootstrap slider -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/bootstrap-slider/bootstrap-slider.css">
  <script src="<?php echo base_url(); ?>assets/plugins/bootstrap-slider/modernizr.js"></script>
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
  <?php $this->load->view('../../menu_admin/header') ?>
  <!-- end header -->
    <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Detail Pegawai
        <small>Admin</small>
      </h1>
      <ol class="breadcrumb">
        <li><i class="fa fa-dashboard"></i> Pegawai Admin</li>
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
                    <h3 class="box-title">Detail Data Pegawai</h3>
                </div>
                <!-- /.box-header -->
                <!-- form start -->
                <form role="form" method="post" action="<?php echo site_url("Pegawai_admin/detail/".md5(sha1($detail->nik))); ?>">
                    <div class="box-body">
                        <div class="col-md-6">
                            <fieldset disabled>
                            <div class="form-group">
                                <label for="level_jabatan">Nik</label>
                                <input type="text" class="form-control" id="nik" value="<?php echo $detail->nik; ?>" >
                            </div>
                            </fieldset>
                            <div class="form-group <?php if(form_error('nama')){echo "has-error";} ?>">
                                <label for="nama">Nama</label>
                                <input type="text" name="nama" class="form-control" id="nama" value="<?php if($act == "0") echo $detail->nama; if($act == "1") echo set_value('nama'); ?>" placeholder="Nama">
                                <?php if(form_error('nama')){echo '<span class="control-label" for="nama">'.form_error('nama').'</span>';} ?>
                            </div>
                            <!-- textarea -->
                            <div class="form-group <?php if(form_error('alamat')){echo "has-error";} ?>">
                              <label>Alamat</label>
                              <textarea name="alamat" class="form-control" rows="3" placeholder="Alamat ..."><?php if($act == "0") echo $detail->alamat; if($act == "1") echo set_value('alamat'); ?></textarea>
                              <?php if(form_error('alamat')){echo '<span class="control-label" for="alamat">'.form_error('alamat').'</span>';} ?>
                            </div>
                            <div class="form-group <?php if(form_error('tempat_lahir')){echo "has-error";} ?>">
                                <label for="tempat_lahir">Tempat Lahir</label>
                                <input type="text" name="tempat_lahir" class="form-control" id="tempat_lahir" value="<?php if($act == "0") echo $detail->tempat_lahir; if($act == "1") echo set_value('tempat_lahir'); ?>" placeholder="Tempat Lahir">
                                <?php if(form_error('tempat_lahir')){echo '<span class="control-label" for="tempat_lahir">'.form_error('tempat_lahir').'</span>';} ?>
                            </div>
                            <div class="form-group <?php if(form_error('tgl_lahir')){echo "has-error";} ?>">
                    					<label>Tanggal Lahir</label>
                    					<div class="input-group date">
                    					  <div class="input-group-addon">
                    						<i class="fa fa-calendar"></i>
                    					  </div>
                                <?php
                                $tgl_l = explode('-',$detail->tgl_lahir);
                                $tgl_lahir = $tgl_l[2].'/'.$tgl_l[1].'/'.$tgl_l[0];
                                ?>
                    					  <input type="text" name="tgl_lahir" class="form-control pull-right" id="datepicker" value="<?php if($act == "0") echo $tgl_lahir; if($act == "1") echo set_value('tgl_lahir'); ?>">
                    					</div>
                              <?php if(form_error('tgl_lahir')){echo '<span class="control-label" for="tgl_lahir">'.form_error('tgl_lahir').'</span>';} ?>
                    					<!-- /.input group -->
                            </div>
                            <div class="form-group <?php if(form_error('jenis_kelamin')){echo "has-error";} ?>">
                              <label for="jenis_kelamin">Jenis Kelamin</label><br>
                                  <input <?php if (!(strcmp($detail->jenis_kelamin,"L"))) {echo "checked=\"checked\"";} ?> type="radio" name="jenis_kelamin" id="radio" value="L" <?php echo set_radio('jenis_kelamin', 'L'); ?>/>
                                  Laki-laki
                                  <br>
                                  <input <?php if (!(strcmp($detail->jenis_kelamin,"P"))) {echo "checked=\"checked\"";} ?> type="radio" name="jenis_kelamin" id="radio2"  value="P" <?php echo set_radio('jenis_kelamin', 'P'); ?>/>
                                  Perempuan
                                  <?php if(form_error('jenis_kelamin')){echo '<br><span class="control-label" for="jenis_kelamin">'.form_error('jenis_kelamin').'</span>';} ?>
                            </div>
                            <div class="form-group <?php if(form_error('telepon')){echo "has-error";} ?>">
                                <label for="telepon">Telepon</label>
                                <input type="text" name="telepon" class="form-control" id="telepon" value="<?php if($act == "0") echo $detail->telepon; if($act == "1") echo set_value('telepon'); ?>" onKeyPress="return hanyaAngka(event, false)" placeholder="telepon" maxlength="20">
                                <?php if(form_error('telepon')){echo '<span class="control-label" for="telepon">'.form_error('telepon').'</span>';} ?>
                            </div>
                            <div class="form-group <?php if(form_error('status')){echo "has-error";} ?>">
                              <label for="status">Status</label><br>
                                  <input <?php if (!(strcmp($detail->status,"1"))) {echo "checked=\"checked\"";} ?> type="radio" name="status" id="radio" value="1" <?php echo set_radio('status', '1'); ?>/>
                                  Lajang
                                  <br>
                                  <input <?php if (!(strcmp($detail->status,"2"))) {echo "checked=\"checked\"";} ?> type="radio" name="status" id="radio2"  value="2" <?php echo set_radio('status', '2'); ?>/>
                                  Sudah Menikah
                                  <?php if(form_error('status')){echo '<br><span class="control-label" for="status">'.form_error('status').'</span>';} ?>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputFile">Foto</label>
                                <br><img src="<?php echo base_url(); ?>assets/img/<?php echo $detail->foto; ?>" width="120" height="120" class="img-circle" alt="" />
                                <br/>
                                <button type="button" name="submit" id="submit" class="btn btn-info" onClick="ubah_foto()"><span class="glyphicon glyphicon-picture"></span></button>
                            </div>
                            <div class="form-group <?php if(form_error('level_pegawai')){echo "has-error";} ?>">
                              <label>Jabatan</label>
                              <select name="level_pegawai" class="form-control">
                                <option value="<?php echo $detail->level_pegawai; ?>" selected="selected" ><?php echo $detail->nama_jabatan; ?></option>
                                <?php
                                    foreach($level_jabatan as $baris)
                                    {
                                ?>
                                <option <?php if (!(strcmp(set_value("level_pegawai"),"$baris->id_jabatan"))) {echo "selected=\"selected\"";} ?> value="<?php echo $baris->id_jabatan;?>" ><?php echo $baris->nama_jabatan;?></option>
                                <?php
                                    }
                                ?>
                              </select>
                              <?php if(form_error('level_pegawai')){echo '<span class="control-label" for="level_pegawai">'.form_error('level_pegawai').'</span>';} ?>
                            </div>
                            <div class="form-group <?php if(form_error('tgl_mulai_kerja')){echo "has-error";} ?>">
                    					<label>Tanggal Mulai Kerja</label>
                    					<div class="input-group date">
                    					  <div class="input-group-addon">
                    						<i class="fa fa-calendar"></i>
                    					  </div>
                                <?php
                                $tgl = explode('-',$detail->tgl_mulai_kerja);
                                $tanggal = $tgl[2].'/'.$tgl[1].'/'.$tgl[0];
                                ?>
                    					  <input type="text" name="tgl_mulai_kerja" class="form-control pull-right" id="datepicker" value="<?php if($act == "0") echo $tanggal; if($act == "1") echo set_value('tgl_mulai_kerja'); ?>">
                    					</div>
                              <?php if(form_error('tgl_mulai_kerja')){echo '<span class="control-label" for="tgl_mulai_kerja">'.form_error('tgl_mulai_kerja').'</span>';} ?>
                    					<!-- /.input group -->
                  				  </div>
                            <div class="form-group <?php if(form_error('no_bpjs')){echo "has-error";} ?>">
                                <label for="no_bpjs">No Bpjs</label>
                                <input type="text" name="no_bpjs" class="form-control" id="no_bpjs" value="<?php if($act == "0") echo $detail->no_bpjs; if($act == "1") echo set_value('no_bpjs'); ?>" onKeyPress="return hanyaAngka(event, false)" placeholder="No Bpjs">
                                <?php if(form_error('no_bpjs')){echo '<span class="control-label" for="no_bpjs">'.form_error('no_bpjs').'</span>';} ?>
                            </div>
                        </div>
                    </div>
                    <!-- /.box-body -->

                    <div class="box-footer">
                        <input type="submit" name="btn_ubah" class="btn btn-primary" value="Ubah">
                        <button type="button" class="btn btn-default" onClick="location.href='<?php echo site_url("Pegawai_admin");?>'"><span class="fa fa-times"></span> Batal</button>
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
<!-- Bootstrap modal -->
<div class="modal fade" id="modal_form_ubah_foto" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h3 class="modal-title"><span class="glyphicon glyphicon-picture"></span> Ubah Gambar</h3>
            </div>
            <div class="modal-body form">
              <div class="col-lg-8 col-lg-offset-2 ">
                <div id="error-data"></div>
              </div>
              <div class="clear"></div>
                <form action="" id="form_ubah_foto" class="form-horizontal" method="post" enctype="multipart/form-data">
                    <div class="form-body">
                        <div class="form-group">
                            <label class="control-label col-md-3">Foto</label>
                            <div class="col-md-9">
                                <input type="file" name="imagesx[]" id="imagesx"/>
                                <span style="color:#8a8a8a">
                                  <br/>
                                  - Ukuran Max. File = 2mb. <br/>
                                  - Format File = jpg,png,gif.
                                </span>
                                <br/>
                                <img src="<?php echo base_url(); ?>assets/img/<?php echo $detail->foto; ?>" width="170" height="170"  alt="" />
                            </div>
                        </div>
                    </div>

            </div>
            <div class="modal-footer">
                <input type="submit" value="Ubah" onclick="save_foto()" class="btn btn-primary"/>
                <button type="button" class="btn btn-primary" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Batal</button>
            </div>
            </form>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<!-- End Bootstrap modal -->
<!-- jQuery 2.2.0 -->
<script src="<?php echo base_url(); ?>assets/plugins/jQuery/jQuery-2.2.0.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="<?php echo base_url(); ?>assets/bootstrap/js/bootstrap.min.js"></script>
<!-- Slimscroll -->
<script src="<?php echo base_url(); ?>assets/plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- bootstrap datepicker -->
<script src="<?php echo base_url(); ?>assets/plugins/datepicker/bootstrap-datepicker.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins/datepicker/locales/bootstrap-datepicker.id.js"></script>
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

  //modal bootstrap
  function ubah_foto()
  {
    save_method = 'foto';
    $('#form_ubah_foto')[0].reset(); // reset form on modals
    $('#modal_form_ubah_foto').modal('show');

  }
  function save_foto()
  {
  $(document).ready(function (e){
    $("#form_ubah_foto").on('submit',(function(e){
    e.preventDefault();
      $.ajax({
      url: "<?php echo site_url('Pegawai_admin/ubah_foto/'.md5(sha1($detail->nik)));?>",
      type: "POST",
      data:  new FormData(this),
      contentType: false,
      cache: false,
      processData:false,
      dataType: "JSON",
      success: function(data){
        if(data.status) //if success close modal and reload ajax table
        {
            $('#modal_form_ubah_foto').modal('hide');
            location.reload();
        }
        else
        {
          $("#error-data").html(data.error_string);
        }
      },
      error: function(){}
      });
    }));
  });
  }
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
