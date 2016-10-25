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
  <!-- bootstrap-chosen -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/bootstrap-chosen/bootstrap-chosen.css">
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
        Entry Quota
        <small>Admin</small>
      </h1>
      <ol class="breadcrumb">
        <li><i class="fa fa-dashboard"></i> Quota Admin</li>
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
                    <h3 class="box-title">Entry Data Quota</h3>
                </div>
                <!-- /.box-header -->
                <!-- form start -->
                <form role="form" method="post" action="<?php echo site_url("Quota_admin/tambah"); ?>" enctype="multipart/form-data">
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
                                     $ambil = $this->m_quota_admin->getJabatan($_POST['level_jabatan']);
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
                            <div class="form-group <?php if(form_error('nama_pengguna')){echo "has-error";} ?>">
                                <label for="nama_pengguna">Nama Pengguna</label>
                                <input type="text" name="nama_pengguna" class="form-control" id="nama_pengguna" value="<?php echo set_value('nama_pengguna') ?>" placeholder="Nama Pengguna">
                                <?php if(form_error('nama_pengguna')){echo '<span class="control-label" for="nama_pengguna">'.form_error('nama_pengguna').'</span>';} ?>
                            </div>
                            <div class="form-group <?php if(form_error('jenis_kelamin')){echo "has-error";} ?>">
                              <label for="jenis_kelamin">Jenis Kelamin</label><br>
                                  <input <?php if (!(strcmp(set_value("jenis_kelamin"),"L"))) {echo "checked=\"checked\"";} ?> type="radio" name="jenis_kelamin" id="radio" value="L" <?php echo set_radio('jenis_kelamin', 'L'); ?>/>
                                  Laki-laki
                                  <br>
                                  <input <?php if (!(strcmp(set_value("jenis_kelamin"),"P"))) {echo "checked=\"checked\"";} ?> type="radio" name="jenis_kelamin" id="radio2"  value="P" <?php echo set_radio('jenis_kelamin', 'P'); ?>/>
                                  Perempuan
                                  <?php if(form_error('jenis_kelamin')){echo '<br><span class="control-label" for="jenis_kelamin">'.form_error('jenis_kelamin').'</span>';} ?>
                            </div>
                            <div class="form-group <?php if(form_error('ket_pengguna')){echo "has-error";} ?>">
                                  <label for="ket_pengguna">Keterangan Pengguna</label><br>
                                  <input <?php if (!(strcmp(set_value("ket_pengguna"),"1"))) {echo "checked=\"checked\"";} ?> type="radio" name="ket_pengguna" id="radio" value="1" <?php echo set_radio('ket_pengguna', '1'); ?>/>
                                  Suami
                                  <br>
                                  <input <?php if (!(strcmp(set_value("ket_pengguna"),"2"))) {echo "checked=\"checked\"";} ?> type="radio" name="ket_pengguna" id="radio2"  value="2" <?php echo set_radio('ket_pengguna', '2'); ?>/>
                                  Istri
                                  <br>
                                  <input <?php if (!(strcmp(set_value("ket_pengguna"),"3"))) {echo "checked=\"checked\"";} ?> type="radio" name="ket_pengguna" id="radio3" value="3" <?php echo set_radio('ket_pengguna', '3'); ?>/>
                                  Anak Pertama
                                  <br>
                                  <input <?php if (!(strcmp(set_value("ket_pengguna"),"4"))) {echo "checked=\"checked\"";} ?> type="radio" name="ket_pengguna" id="radio4"  value="4" <?php echo set_radio('ket_pengguna', '4'); ?>/>
                                  Anak Kedua
                                  <br>
                                  <input <?php if (!(strcmp(set_value("ket_pengguna"),"5"))) {echo "checked=\"checked\"";} ?> type="radio" name="ket_pengguna" id="radio5" value="5" <?php echo set_radio('ket_pengguna', '5'); ?>/>
                                  Anak Ketiga
                                  <br>
                                  <input <?php if (!(strcmp(set_value("ket_pengguna"),"6"))) {echo "checked=\"checked\"";} ?> type="radio" name="ket_pengguna" id="radio6" value="6" <?php echo set_radio('ket_pengguna', '6'); ?>/>
                                  Diri Sendiri
                                  <?php if(form_error('ket_pengguna')){echo '<br><span class="control-label" for="ket_pengguna">'.form_error('ket_pengguna').'</span>';} ?>
                            </div>
                            <div class="form-group <?php if(form_error('ket_dokter')){echo "has-error";} ?>">
                              <label for="ket_dokter">Keterangan Dokter</label><br>
                                  <input <?php if (!(strcmp(set_value("ket_dokter"),"1"))) {echo "checked=\"checked\"";} ?> type="radio" name="ket_dokter" id="radio" value="1" <?php echo set_radio('ket_dokter', '1'); ?>/>
                                  Non Spesialis
                                  <br>
                                  <input <?php if (!(strcmp(set_value("ket_dokter"),"2"))) {echo "checked=\"checked\"";} ?> type="radio" name="ket_dokter" id="radio2"  value="2" <?php echo set_radio('ket_dokter', '2'); ?>/>
                                  Spesialis
                                  <?php if(form_error('ket_dokter')){echo '<br><span class="control-label" for="ket_dokter">'.form_error('ket_dokter').'</span>';} ?>
                            </div>
                            <div class="form-group <?php if(form_error('ket_obat')){echo "has-error";} ?>">
                              <label for="ket_obat">Ketarangan Obat</label><br>
                                  <input <?php if (!(strcmp(set_value("ket_obat"),"1"))) {echo "checked=\"checked\"";} ?> type="radio" name="ket_obat" id="radio" value="1" <?php echo set_radio('ket_obat', '1'); ?>/>
                                  Engerix
                                  <br>
                                  <input <?php if (!(strcmp(set_value("ket_obat"),"2"))) {echo "checked=\"checked\"";} ?> type="radio" name="ket_obat" id="radio2"  value="2" <?php echo set_radio('ket_obat', '2'); ?>/>
                                  Non Engerix
                                  <?php if(form_error('ket_obat')){echo '<br><span class="control-label" for="ket_obat">'.form_error('ket_obat').'</span>';} ?>
                            </div>
                            <div class="form-group <?php if(form_error('tgl_berobat')){echo "has-error";} ?>">
                    					<label>Tanggal Berobat</label>
                    					<div class="input-group date">
                    					  <div class="input-group-addon">
                    						<i class="fa fa-calendar"></i>
                    					  </div>
                    					  <input type="text" name="tgl_berobat" class="form-control pull-right" id="datepicker" value="<?php echo set_value('tgl_berobat') ?>">
                    					</div>
                              <?php if(form_error('tgl_berobat')){echo '<span class="control-label" for="tgl_berobat">'.form_error('tgl_berobat').'</span>';} ?>
                    					<!-- /.input group -->
                  				  </div>
                            <div class="form-group">
                                <label for="exampleInputFile">Upload Foto Bukti</label>
                                <input type="file" name="images[]" id="exampleInputFile">

                                <p class="help-block">Format gambar JPG,PNG,GIF dan ukuran Max 2mb</p>
                            </div>
                            <div class="form-group <?php if(form_error('ambil_quota')){echo "has-error";} ?>">
                              <label>Ambil Quota</label></br>
                              <div id="quota_pegawai">
                                <div class="row">
                                  <div class="col-xs-6">
                                    <input id='ex2' type='text' class='form-control' value='' maxlength="0">
                                  </div>
                                  <div class="col-xs-6">
                                    <h4><b>Rp. 0</b></h4>
                                  </div>
                                </div>
                              </div>
                              <br/>
                              <span id="ket_quota">Jumlah quota yang diambil: <h4><b><span id="dt_quota"><b/></h4></span></span>
                              <?php if(form_error('ambil_quota')){echo '<span class="control-label" for="ambil_quota">'.form_error('ambil_quota').'</span>';} ?>
                    					<!-- /.input group -->
                              <br/>
                  				  </div>
                        </div>
                    </div>
                    <!-- /.box-body -->

                    <div class="box-footer">
                        <input type="submit" name="btn_tambah" class="btn btn-primary" value="Tambah">
                        <button type="button" class="btn btn-default" onClick="location.href='<?php echo site_url("Quota_admin");?>'"><span class="fa fa-times"></span> Batal</button>
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
<!-- bootstrap slider -->
<script src="<?php echo base_url(); ?>assets/plugins/bootstrap-slider/bootstrap-slider.js"></script>
<!-- FastClick -->
<script src="<?php echo base_url(); ?>assets/plugins/fastclick/fastclick.js"></script>
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
           url  : "<?php echo site_url('Quota_admin/ambil_jabatan'); ?>",
           data : "level_jabatan=" + level_jabatan,
           success: function(data){
                 $("#nik_pegawai").html(data).trigger("chosen:updated");
           }
        });
      });
    });
    $(function(){
        $("#nik_pegawai").chosen().change(function(){
        var nik_pegawai = $("#nik_pegawai").val();
        $.ajax({
           type : "POST",
           url  : "<?php echo site_url('Quota_admin/ambil_quota'); ?>",
           data : "nik_pegawai=" + nik_pegawai,
           success: function(data){
                $("#quota_pegawai").html(data);
                //var ct = document.getElementById("ex2").innerHTML;
               	//ct.setAttribute("data-slider-max", (data));
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
