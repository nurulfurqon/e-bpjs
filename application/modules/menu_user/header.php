<!-- Header -->
  <header class="main-header">
    <!-- Logo -->
    <a href="<?php echo site_url ("Home"); ?>" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>E</b>-B</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>E</b>-BPJS</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="<?php echo base_url(); ?>assets/img/<?php echo foto_user(); ?>" width="160" height="160" class="user-image" alt="User Image">
              <span class="hidden-xs"><?php echo nama_user(); ?></span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="<?php echo base_url(); ?>assets/img/<?php echo foto_user(); ?>" width="160" height="160" class="img-circle" alt="User Image">

                <p>
                  <?php echo nama_user().' - '.jabatan_user(); ?>

                </p>
              </li>
              <!-- Menu Body -->
              <li class="user-body">
                <div class="pull-left">
                  <a href="<?php echo site_url ("Profil"); ?>" class="btn btn-default btn-flat"><i class="fa fa-gear"></i> Profile</a>
                </div>
                <div class="pull-right">
                  <a href="<?php echo site_url ("Login/logout");?>" class="btn btn-default btn-flat"><i class="fa fa-sign-out"></i> Log out</a>
                </div>
              </li>
            </ul>
          </li>
        </ul>
      </div>
    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="<?php echo base_url(); ?>assets/img/<?php echo foto_user(); ?>" width="160" height="160" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p><?php echo nama_user(); ?></p>
          <a href=""><i class="fa fa-circle text-success"></i> User</a>
        </div>
      </div>
      <!-- sidebar menu: : style can be found in sidebar.less --><br/>
      <ul class="sidebar-menu">
        <li class="header">MAIN NAVIGATION</li>
        <li>
          <a href="<?php echo site_url ("Home"); ?>">
            <i class="fa fa-dashboard"></i> <span>Home Page</span>
          </a>
        </li>
		    <li class="treeview">
          <a href="#">
            <i class="fa fa-money"></i>
            <span>Quota</span>
            <i class="fa fa-angle-left pull-right"></i>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo site_url ("Quota/ambil"); ?>"><i class="fa fa-circle-o"></i> Ambil Quota</a></li>
            <li><a href="<?php echo site_url ("Quota"); ?>"><i class="fa fa-circle-o"></i> Lihat Data Quota</a></li>
          </ul>
        </li>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>
<!-- end header -->
