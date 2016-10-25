<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>E-Bpjs | Detail Quota User</title>
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
  <?php $this->load->view('../../menu_user/header') ?>
  <!-- end header -->
    <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Detail Quota
        <small>User</small>
      </h1>
      <ol class="breadcrumb">
        <li><i class="fa fa-dashboard"></i> Quota User</li>
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
                <form role="form" method="post" action="" enctype="multipart/form-data">
                    <div class="box-body">
                          <div class="col-md-6">
                            <div class="form-group">
                                <label for="level_jabatan">Kode Bukti :</label>
                                <?php echo $detail->kode_bukti; ?>
                            </div>
                            <div class="form-group">
                                <label for="level_jabatan">Nik Pegawai :</label>
                                <?php echo $detail->nik_pegawai; ?>
                            </div>
                            <div class="form-group">
                                <label for="level_jabatan">Nama Pegawai :</label>
                                <?php echo $detail->nama; ?>
                            </div>

                            <div class="form-group">
                                <label for="nama_pengguna">Nama Pengguna :</label>
                                <?php echo $detail->nama_pengguna; ?>
                            </div>
                            <div class="form-group">
                                <label for="jenis_kelamin">Jenis Kelamin :</label>
                                <?php if($detail->jenis_kelamin_p == 'L'){echo "Laki-laki";} ?>
                    						<?php if($detail->jenis_kelamin_p == 'P'){echo "Perempuan";} ?>
                            </div>
                            <div class="form-group">
                              <label for="ket_pengguna">Keterangan Pengguna :</label>
                                <?php if($detail->ket_pengguna == 1){echo "Suami";} ?>
                                <?php if($detail->ket_pengguna == 2){echo "Istri";} ?>
                                <?php if($detail->ket_pengguna == 3){echo "Anak Pertama";} ?>
                                <?php if($detail->ket_pengguna == 4){echo "Anak Kedua";} ?>
                                <?php if($detail->ket_pengguna == 5){echo "Anak Ketiga";} ?>
                                <?php if($detail->ket_pengguna == 6){echo "Diri Sendiri";} ?>
                            </div>
                            <div class="form-group">
                              <label for="ket_dokter">Keterangan Dokter :</label>
                              <?php if($detail->ket_dokter == 1){echo "Non Spesialis";} ?>
                              <?php if($detail->ket_dokter == 2){echo "Spesialis";} ?>
                            </div>
                            <div class="form-group">
                              <label for="ket_obat">Ketarangan Obat :</label>
                              <?php if($detail->ket_obat == 1){echo "Engerix";} ?>
                  						<?php if($detail->ket_obat == 2){echo "Non Engerix";} ?>
                            </div>
                            <div class="form-group">
                    					<label>Tanggal Berobat :</label>
                    					<?php
                              $tgl = explode('-',$detail->tgl_berobat);
                              $tanggal = $tgl[2].'/'.$tgl[1].'/'.$tgl[0];
                              echo $tanggal;
                              ?>
                  				  </div>
                            <div class="form-group">
                                <label for="exampleInputFile">Foto Bukti :</label>
                                <br>
                                <a class="image-popup-no-margins" href="<?php echo base_url(); ?>assets/img/slip/<?php echo $detail->foto_bukti; ?>">
                                <img src="<?php echo base_url(); ?>assets/img/slip/<?php echo $detail->foto_bukti; ?>" width="150" height="150" class="img" alt="" />
                                </a>
                            </div>
                            <div class="form-group">
                                <label for="level_jabatan">Jumlah Ambil Quota :</label>
                                Rp. <?php echo number_format($detail->ambil_quota,0,',','.'); ?>
                            </div>
                            <div class="form-group">
                              <label for="ket_obat">Status Quota :</label>
                              <?php if($detail->ket_obat == 0){echo "Belum Diterima";} ?>
                  						<?php if($detail->ket_obat == 1){echo "Sudah Diterima";} ?>
                            </div>
                            <div class="form-group">
                    					<label>Tanggal Terima Quota :</label>
                    					<?php
                              $tgl_t = explode('-',$detail->tgl_terima_quota);
                              $tanggal_terima = $tgl_t[2].'/'.$tgl_t[1].'/'.$tgl_t[0];
                              echo $tanggal_terima;
                              ?>
                  				  </div>
                        </div>
                    </div>
                    <!-- /.box-body -->

                    <div class="box-footer">
                        <button type="button" class="btn btn-default" onClick="location.href='<?php echo site_url("Quota");?>'"><span class="fa fa-times"></span> Kembali</button>
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
        url: "<?php echo site_url('Quota_admin/ubah_foto/'.md5(sha1($detail->id_ambil_quota)));?>",
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
