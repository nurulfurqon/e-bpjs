<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>E-Bpjs | Detail Quota Super Admin</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/bootstrap/css/bootstrap.min.css">
  <!-- bootstrap datepicker -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/datepicker/datepicker3.css">
  <!-- bootstrap-chosen -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/bootstrap-chosen/bootstrap-chosen.css">
  <!-- bootstrap slider -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/bootstrap-slider/bootstrap-slider.css">
  <script src="<?php echo base_url(); ?>assets/plugins/bootstrap-slider/modernizr.js"></script>
  <!-- Magnific Popup -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/magnific-popup/magnific-popup.css">
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
        Detail Quota
        <small>super admin</small>
      </h1>
      <ol class="breadcrumb">
        <li><i class="fa fa-dashboard"></i> Quota Super Admin</li>
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
                    <h3 class="box-title">Detail Data Quota</h3>
                </div>
                <!-- /.box-header -->
                <!-- form start -->
                <form role="form" method="post" action="<?php echo site_url("Quota_super_admin/detail/".md5(sha1($detail->id_ambil_quota))); ?>" enctype="multipart/form-data">
                    <div class="box-body">
                          <div class="col-md-6">
                            <fieldset disabled>
                            <div class="form-group">
                                <label for="level_jabatan">Kode Bukti</label>
                                <input type="text" class="form-control" id="kode_bukti" value="<?php echo $detail->kode_bukti; ?>" >
                            </div>
                            </fieldset>
                            <fieldset disabled>
                            <div class="form-group">
                                <label for="level_jabatan">Nik Pegawai</label>
                                <input type="text" class="form-control" id="nik_pegawai" value="<?php echo $detail->nik_pegawai; ?>" >
                            </div>
                            </fieldset>
                            <fieldset disabled>
                            <div class="form-group">
                                <label for="level_jabatan">Nama Pegawai</label>
                                <input type="text" class="form-control" id="nik_pegawai" value="<?php echo $detail->nama; ?>" >
                            </div>
                            </fieldset>
                            <div class="form-group <?php if(form_error('nama_pengguna')){echo "has-error";} ?>">
                                <label for="nama_pengguna">Nama Pengguna</label>
                                <input type="text" name="nama_pengguna" class="form-control" id="nama_pengguna" value="<?php if($act == "0") echo $detail->nama_pengguna; if($act == "1") echo set_value('nama_pengguna') ?>" placeholder="Nama Pengguna">
                                <?php if(form_error('nama_pengguna')){echo '<span class="control-label" for="nama_pengguna">'.form_error('nama_pengguna').'</span>';} ?>
                            </div>
                            <div class="form-group <?php if(form_error('jenis_kelamin')){echo "has-error";} ?>">
                              <label for="jenis_kelamin">Jenis Kelamin</label><br>
                                  <input <?php if (!(strcmp($detail->jenis_kelamin_p,"L"))) {echo "checked=\"checked\"";} ?> type="radio" name="jenis_kelamin" id="radio" value="L" <?php echo set_radio('jenis_kelamin', 'L'); ?>/>
                                  Laki-laki
                                  <br>
                                  <input <?php if (!(strcmp($detail->jenis_kelamin_p,"P"))) {echo "checked=\"checked\"";} ?> type="radio" name="jenis_kelamin" id="radio2"  value="P" <?php echo set_radio('jenis_kelamin', 'P'); ?>/>
                                  Perempuan
                                  <?php if(form_error('jenis_kelamin')){echo '<br><span class="control-label" for="jenis_kelamin">'.form_error('jenis_kelamin').'</span>';} ?>
                            </div>
                            <div class="form-group <?php if(form_error('ket_pengguna')){echo "has-error";} ?>">
                              <label for="ket_pengguna">Keterangan Pengguna</label><br>
                                  <input <?php if (!(strcmp($detail->ket_pengguna,"1"))) {echo "checked=\"checked\"";} ?> type="radio" name="ket_pengguna" id="radio" value="1" <?php echo set_radio('ket_pengguna', '1'); ?>/>
                                  Suami
                                  <br>
                                  <input <?php if (!(strcmp($detail->ket_pengguna,"2"))) {echo "checked=\"checked\"";} ?> type="radio" name="ket_pengguna" id="radio2"  value="2" <?php echo set_radio('ket_pengguna', '2'); ?>/>
                                  Istri
                                  <br>
                                  <input <?php if (!(strcmp($detail->ket_pengguna,"3"))) {echo "checked=\"checked\"";} ?> type="radio" name="ket_pengguna" id="radio3" value="3" <?php echo set_radio('ket_pengguna', '3'); ?>/>
                                  Anak Pertama
                                  <br>
                                  <input <?php if (!(strcmp($detail->ket_pengguna,"4"))) {echo "checked=\"checked\"";} ?> type="radio" name="ket_pengguna" id="radio4"  value="4" <?php echo set_radio('ket_pengguna', '4'); ?>/>
                                  Anak Kedua
                                  <br>
                                  <input <?php if (!(strcmp($detail->ket_pengguna,"5"))) {echo "checked=\"checked\"";} ?> type="radio" name="ket_pengguna" id="radio5" value="5" <?php echo set_radio('ket_pengguna', '5'); ?>/>
                                  Anak Ketiga
                                  <br>
                                  <input <?php if (!(strcmp($detail->ket_pengguna,"6"))) {echo "checked=\"checked\"";} ?> type="radio" name="ket_pengguna" id="radio6" value="6" <?php echo set_radio('ket_pengguna', '6'); ?>/>
                                  Diri Sendiri
                                  <?php if(form_error('ket_pengguna')){echo '<br><span class="control-label" for="ket_pengguna">'.form_error('ket_pengguna').'</span>';} ?>
                            </div>
                            <div class="form-group <?php if(form_error('ket_dokter')){echo "has-error";} ?>">
                              <label for="ket_dokter">Keterangan Dokter</label><br>
                                  <input <?php if (!(strcmp($detail->ket_dokter,"1"))) {echo "checked=\"checked\"";} ?> type="radio" name="ket_dokter" id="radio" value="1" <?php echo set_radio('ket_dokter', '1'); ?>/>
                                  Non Spesialis
                                  <br>
                                  <input <?php if (!(strcmp($detail->ket_dokter,"2"))) {echo "checked=\"checked\"";} ?> type="radio" name="ket_dokter" id="radio2"  value="2" <?php echo set_radio('ket_dokter', '2'); ?>/>
                                  Spesialis
                                  <?php if(form_error('ket_dokter')){echo '<br><span class="control-label" for="ket_dokter">'.form_error('ket_dokter').'</span>';} ?>
                            </div>
                            <div class="form-group <?php if(form_error('ket_obat')){echo "has-error";} ?>">
                              <label for="ket_obat">Ketarangan Obat</label><br>
                                  <input <?php if (!(strcmp($detail->ket_obat,"1"))) {echo "checked=\"checked\"";} ?> type="radio" name="ket_obat" id="radio" value="1" <?php echo set_radio('ket_obat', '1'); ?>/>
                                  Engerix
                                  <br>
                                  <input <?php if (!(strcmp($detail->ket_obat,"2"))) {echo "checked=\"checked\"";} ?> type="radio" name="ket_obat" id="radio2"  value="2" <?php echo set_radio('ket_obat', '2'); ?>/>
                                  Non Engerix
                                  <?php if(form_error('ket_obat')){echo '<br><span class="control-label" for="ket_obat">'.form_error('ket_obat').'</span>';} ?>
                            </div>
                            <div class="form-group <?php if(form_error('tgl_berobat')){echo "has-error";} ?>">
                    					<label>Tanggal Berobat</label>
                    					<div class="input-group date">
                    					  <div class="input-group-addon">
                    						<i class="fa fa-calendar"></i>
                    					  </div>
                                <?php
                                $tgl = explode('-',$detail->tgl_berobat);
                                $tanggal = $tgl[2].'/'.$tgl[1].'/'.$tgl[0];
                                ?>
                    					  <input type="text" name="tgl_berobat" class="form-control pull-right" id="datepicker" value="<?php if($act == "0") echo $tanggal; if($act == "1") echo set_value('tgl_berobat'); ?>">
                    					</div>
                              <?php if(form_error('tgl_berobat')){echo '<span class="control-label" for="tgl_berobat">'.form_error('tgl_berobat').'</span>';} ?>
                    					<!-- /.input group -->
                  				  </div>
                            <div class="form-group">
                                <label for="exampleInputFile">Foto Bukti</label>
                                <br>
                                <a class="image-popup-no-margins" href="<?php echo base_url(); ?>assets/img/slip/<?php echo $detail->foto_bukti; ?>">
                                <img src="<?php echo base_url(); ?>assets/img/slip/<?php echo $detail->foto_bukti; ?>" width="150" height="150" class="img" alt="" />
                                </a>
                                <br/>
                                <button type="button" name="submit" id="submit" class="btn btn-info" onClick="ubah_foto()"><span class="glyphicon glyphicon-picture"></span></button>
                            </div>
                            <fieldset disabled>
                            <div class="form-group">
                                <label for="level_jabatan">Jumlah Ambil Quota</label>
                                <input type="text" class="form-control" id="kode_bukti" value="Rp. <?php echo number_format($detail->ambil_quota,0,',','.'); ?>" >
                            </div>
                            </fieldset>
                            <div class="form-group <?php if(form_error('status_quota')){echo "has-error";} ?>">
                                <label for="status_quota">Status Quota</label>
                                <select name="status_quota"  class="form-control" id="cbo_type">
                									<option value="" selected="selected">-Pilih-</option>
                                  <option <?php if (!(strcmp($detail->status_quota,"1"))) {echo "selected=\"selected\"";} ?>  value="1"<?php echo $detail->status_quota ?>>Sudah Diterima</option>
                									<option <?php if (!(strcmp($detail->status_quota,"0"))) {echo "selected=\"selected\"";} ?>  value="0"<?php echo $detail->status_quota ?>>Belum Diterima</option>
                								</select>
                                <?php if(form_error('status_quota')){echo '<span class="control-label" for="status_quota">'.form_error('status_quota').'</span>';} ?>
                            </div>
                            <div class="form-group <?php if(form_error('tgl_terima_quota')){echo "has-error";} ?>">
                    					<label>Tanggal Terima Quota</label>
                    					<div class="input-group date">
                    					  <div class="input-group-addon">
                    						<i class="fa fa-calendar"></i>
                    					  </div>
                                <?php
                                $tgl_t = explode('-',$detail->tgl_terima_quota);
                                $tanggal_terima = $tgl_t[2].'/'.$tgl_t[1].'/'.$tgl_t[0];
                                ?>
                    					  <input type="text" name="tgl_terima_quota" class="form-control pull-right" id="datepicker2" value="<?php if($act == "0") echo $tanggal_terima; if($act == "1") echo set_value('tgl_terima_quota'); ?>">
                    					</div>
                              <?php if(form_error('tgl_terima_quota')){echo '<span class="control-label" for="tgl_terima_quota">'.form_error('tgl_terima_quota').'</span>';} ?>
                    					<!-- /.input group -->
                  				  </div>
                        </div>
                    </div>
                    <!-- /.box-body -->

                    <div class="box-footer">
                        <input type="submit" name="btn_ubah" class="btn btn-primary" value="Ubah">
                        <button type="button" class="btn btn-default" onClick="location.href='<?php echo site_url("Quota_super_admin");?>'"><span class="fa fa-times"></span> Batal</button>
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
                <h3 class="modal-title"><span class="glyphicon glyphicon-picture"></span> Ubah Foto Bukti</h3>
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
                                <img src="<?php echo base_url(); ?>assets/img/slip/<?php echo $detail->foto_bukti; ?>" width="170" height="170"  alt="" />
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
<!-- bootstrap slider -->
<script src="<?php echo base_url(); ?>assets/plugins/bootstrap-slider/bootstrap-slider.js"></script>
<!-- Magnific Popup -->
<script src="<?php echo base_url(); ?>assets/plugins/magnific-popup/jquery.magnific-popup.js"></script>
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
$(document).ready(function() {

	$('.image-popup-vertical-fit').magnificPopup({
		type: 'image',
		closeOnContentClick: true,
		mainClass: 'mfp-img-mobile',
		image: {
			verticalFit: true
		}

	});

	$('.image-popup-fit-width').magnificPopup({
		type: 'image',
		closeOnContentClick: true,
		image: {
			verticalFit: false
		}
	});

	$('.image-popup-no-margins').magnificPopup({
		type: 'image',
		closeOnContentClick: true,
		closeBtnInside: false,
		fixedContentPos: true,
		mainClass: 'mfp-no-margins mfp-with-zoom', // class to remove default margin from left and right side
		image: {
			verticalFit: true
		},
		zoom: {
			enabled: true,
			duration: 300 // don't foget to change the duration also in CSS
		}
	});

});
  //wow js
  new WOW().init();

  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%' // optional
    });
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

    //Date picker
      $('#datepicker').datepicker({
        autoclose: true,
  	  format: 'dd/mm/yyyy',
  	  language: 'id'
      });

      var today = new Date();
      $('#datepicker2').datepicker({
        autoclose: true,
  	  format: 'dd/mm/yyyy',
  	  language: 'id',
      startDate: new Date(today.getFullYear(), today.getMonth(), today.getDate())
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
        url: "<?php echo site_url('Quota_super_admin/ubah_foto/'.md5(sha1($detail->id_ambil_quota)));?>",
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

</script>
</body>
</html>
