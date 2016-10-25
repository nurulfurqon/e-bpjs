<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>E-Bpjs | Quota Super Admin</title>
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
        View Quota
        <small>super admin</small>
      </h1>
      <ol class="breadcrumb">
        <li><i class="fa fa-dashboard"></i> Quota Super Admin</li>
        <li class="active">View</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box box-default">
            <div class="box-header">
              <h3 class="box-title">Tabel Data Quota</h3>
              <hr style="margin-top:10px;">
              <div class="box-title col-md-12">
                <div class="row">
                  <form action="<?php echo site_url('Quota_super_admin')?>" class="form-horizontal" method="post">
        				  <div class="col-md-3">
          					<div class="form-group" style="margin-bottom: 3px;">
                      <div class="input-group date">
                        <div class="input-group-addon">
                        <i class="fa fa-calendar"></i>
                        </div>
                        <input type="text" name="cari_tanggal" class="form-control pull-right" id="datepicker" placeholder="Cari berdasarkan tanggal..." value="<?php echo set_value('cari_tanggal') ?>">
                      </div>
          					</div>
        				  </div>
        				  <div class="col-md-4">
          					<div class="input-group">
          					  <input type="text" name="cari_nik"  size="25" class="form-control" placeholder="Cari berdasarkan nik...">
          					  <span class="input-group-btn">
          						<button type="submit" class="btn btn-default" ><i class="fa fa-search"></i></button>
          					  </span>
          					</div>
        				  </div>
				        </form>
              </div>
              </div>
            </div>
            <?php
              if($tampil)
              {
            ?>
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
              <table class="table table-bordered table-hover table-striped">
                <tr>
                  <th width="5%">No</th>
                  <th>Nik</th>
                  <th>Nama Pegawai</th>
                  <th>Tanggal Ambil</th>
                  <th>Status Quota</th>
                  <th>Tanggal Terima</th>
                  <th>Jumlah Ambil</th>
                  <th></th>
                </tr>
                <?php
                $no = $no+1;
                foreach($tampil as $baris)
                {
                ?>
                <tr>
                  <td align="center"><?php echo $no;?></td>
                  <td align="center"><?php echo $baris->nik_pegawai;?></td>
                  <td><?php echo $baris->nama;?></td>
                  <td><?php
                  $tanggal = explode(' ',$baris->tgl_ambil_quota);
                  if(count($tanggal) == 2)
                  {
                  	$tgl_p = explode('-',$tanggal[0]);
                  	$tgl_jadi = $tgl_p[2].'-'.$tgl_p[1].'-'.$tgl_p[0].' '.$tanggal[1];
                  	echo $tgl_jadi;
                  }
                  ?>
                  </td>
                  <td>
                    <?php if($baris->status_quota == 0){echo "Belum Diterima";} ?>
                    <?php if($baris->status_quota == 1){echo "Sudah Diterima";} ?>
                  </td>
                  <td>
                    <?php
                      $tgl_t = explode('-',$baris->tgl_terima_quota);
                      $tgl_terima = $tgl_t[2].'-'.$tgl_t[1].'-'.$tgl_t[0];
                      echo $tgl_terima;
                     ?>
                  </td>
                  <td>Rp. <?php echo number_format($baris->ambil_quota,0,',','.'); ?></td>
                  <td align="center">
                    <button type="button" name="btn_ubah" class="btn btn-sm btn-primary"  onClick="location.href=('<?php echo $baris->nik_pegawai ?>','<?php echo site_url("Quota_super_admin/detail/".md5(sha1($baris->id_ambil_quota)));?>');" data-toggle="tooltip" data-placement="top" title="Detail Data"><span class="glyphicon glyphicon-eye-open"></span></button>
                    <button type="button" name="btn_hapus" class="btn btn-sm btn-primary"  onclick="return hapus_data('<?php echo $baris->nik_pegawai ?>','<?php echo site_url("Quota_super_admin/hapus/".$baris->id_ambil_quota);?>');" data-toggle="tooltip" data-placement="top" title="Hapus Data"><span class="glyphicon glyphicon-trash"></span></button>
                    <button type="button" class="btn btn-sm btn-primary" onClick="location.href='<?php echo site_url("Laporan_pdf/index/".md5(sha1($baris->id_ambil_quota)));?>'" data-toggle="tooltip" data-placement="top" title="Unduh PDF"><span class="fa fa-file-pdf-o"></span></button>
                    <button type="button" class="btn btn-sm btn-primary" onClick="location.href='<?php echo site_url("Quota_super_admin/download/".$baris->id_ambil_quota);?>'" data-toggle="tooltip" data-placement="top" title="Unduh Slip Bukti"><span class="fa fa-file-image-o"></span></button>
                  </td>
                </tr>
                <?php
                $no++;
                }
                ?>
              </table>
            </div>
            <!-- /.box-body -->
      			<div class="box-footer clearfix">
              <?php
    					if(set_value('cari_tanggal') == "" && set_value('cari_nik') == "")
    					{
    						echo $halaman;
    					}
    					else
    					{
    					?>
              <a href="<?php echo site_url("Quota_super_admin"); ?>">
              <span class="glyphicon glyphicon-list-alt"></span> Tampilkan Seluruh Data
              </a>
              <?php
              }
              ?>
            </div>
            <!-- /.box-body -->
            <!-- tutup if($tampil) -->
            <?php
              }
              else
              {
            ?>
            <br/>
            <center>
              <h2><span class="glyphicon glyphicon-floppy-remove"></span> Data Tidak Ditemukan</h2>
            </center>
            <br />
            <br />
            <div class="box-footer clearfix">
            <a href="<?php echo site_url("Quota_super_admin"); ?>">
              <span class="glyphicon glyphicon-list-alt"></span> Tampilkan Seluruh Data
            </a>
            </div>
            <?php
              }
            ?>
          </div>
          <!-- /.box -->
        </div>
      </div>
      <?php if($this->session->flashdata('message')) { ?>
      <div class="pesan-error">
  		  <div class="col-md-4 col-md-offset-8">
  			  <div class="row">
    				<div class="wow bounceIn alert alert-success alert-dismissible" data-wow-delay="0.3s">
    					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
    					<h4><i class="icon fa fa-check"></i> Alert!</h4>
    					<?php echo $this->session->flashdata('message');?>
    				</div>
  			  </div>
  		  </div>
	    </div>
      <?php } ?>
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
<!-- FastClick -->
<script src="<?php echo base_url(); ?>assets/plugins/fastclick/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url(); ?>assets/dist/js/app.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?php echo base_url(); ?>assets/dist/js/demo.js"></script>
<!-- Wow.js -->
<script src="<?php echo base_url(); ?>assets/dist/js/wow.min.js"></script>
<script>

  //Date picker
  $('#datepicker').datepicker({
    autoclose: true,
  format: 'dd/mm/yyyy',
  language: 'id'
  });

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
</script>
</body>
</html>
