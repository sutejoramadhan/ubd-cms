<div class="wrapper">

  <header class="main-header">
    <!-- Logo -->
    <a href="<?= base_url('ubd-admin') ?>" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>UBD</b></span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>UBD</b> - CMS</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>

      <a title="Lihat Situs" href="<?= base_url(); ?>" class="custom-nav-left">
      	<i class="fa fa-globe"></i>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
        	<!--navbar icon tambah-->
	          <li class="dropdown notifications-menu">
	            <a title="Tambah" href="#" class="dropdown-toggle" data-toggle="dropdown">
	              <i class="fa fa-plus">&nbsp;&nbsp;<span class="nav-custom-title">Tambah</span></i>
	            </a>
	            <ul class="dropdown-menu">
	              <li>
	                <!-- inner menu: contains the actual data -->
	                <ul class="menu">
	                  <li><!-- start message -->
	                    <a href="#">
	                      <i class="fa fa-plus-circle text-aqua"></i> Post Baru
	                    </a>
	                  </li><!-- end message -->

	                  <li><!-- start message -->
	                    <a href="#">
	                      <i class="fa fa-plus-circle text-aqua"></i> Halaman Baru
	                    </a>
	                  </li><!-- end message -->

	                  <li><!-- start message -->
	                    <a href="#">
	                      <i class="fa fa-plus-circle text-aqua"></i> Media Baru
	                    </a>
	                  </li><!-- end message -->

	                 <li><!-- start message -->
	                    <a href="#">
	                      <i class="fa fa-plus-circle text-aqua"></i> Role Akses Baru
	                    </a>
	                  </li><!-- end message -->
	                </ul>
	              </li>
	            </ul>
	          </li>

          <!--navbar icon comment notif-->
          <li class="dropdown messages-menu">
            <a title="Komentar" href="#" >
              <i class="fa fa-comments-o"></i>
              <span class="label label-success">4</span>
            </a>
          </li>

          <!--navbar icon comment notif-->
          <li class="dropdown messages-menu">
            <a title="Notif Update" href="#" >
              <i class="fa fa-refresh"></i>
              <span class="label label-danger">2</span>
            </a>
          </li>

          <!--navbar icon tentang-->
	          <li class="dropdown notifications-menu">
	            <a title="Info" href="#" class="dropdown-toggle" data-toggle="dropdown">
	              <i class="fa fa-info-circle"></i>
	            </a>
	            <ul class="dropdown-menu">
	              <li>
	                <!-- inner menu: contains the actual data -->
	                <ul class="menu">
	                  <li><!-- start item -->
	                    <a href="#">
	                      <i class="fa fa-info text-success"></i>
	                      Tentang UBD-CMS
	                    </a>
	                  </li><!-- end item -->

					  <li><!-- start item -->
	                    <a href="http://ubd-cms.binadarma.ac.id" target="_blank">
	                      <i class="fa fa-hashtag text-success"></i>
	                      ubd-cms.binadarma.ac.id
	                    </a>
	                  </li><!-- end item -->

	                   <li><!-- start item -->
	                    <a href="#">
	                      <i class="fa fa-book text-success"></i>
	                      Dokumentasi
	                    </a>
	                  </li><!-- end item -->
	                </ul>
	              </li>
	            </ul>
	          </li>

          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="<?= base_url('ubd-content/uploads/user2-160x160.jpg') ?>" class="user-image" alt="User Image">
              <span class="hidden-xs">Alexander Pierce</span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="<?= base_url('ubd-content/uploads/user2-160x160.jpg') ?>" class="img-circle" alt="User Image">

                <p>
                  <?= $this->session->userdata('nama_lengkap'); ?> - <?= $this->session->userdata('group_name'); ?>
                  <small>Registrasi pada <?= tanggalIndo($this->session->userdata('registrasi_date')); ?></small>
                </p>
              </li>
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="#" class="btn btn-default btn-flat">Profil</a>
                </div>
                <div class="pull-right">
                  <a href="#" class="btn btn-default btn-flat">Log out</a>
                </div>
              </li>
            </ul>
          </li>
        </ul>
      </div>
    </nav>
  </header>