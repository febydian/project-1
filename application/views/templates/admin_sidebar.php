<div class="main-sidebar">
        <aside id="sidebar-wrapper">
          <div class="sidebar-brand">
            <a href="index.html">BALAI BENIH</a>
          </div>
          <div class="sidebar-brand sidebar-brand-sm">
            <a href="index.html">BL</a>
          </div>
          <ul class="sidebar-menu">
              <li class="menu-header">DASHBOARD</li>
              <li><a class="nav-link" href="<?= base_url('admin');?>"><i class="fas fa-fire"></i><span>Dashboard</span></a></li>

              <!-- <li class="menu-header">USER</li>
              <li class="nav-item dropdown active">
                <a href="#" class="nav-link has-dropdown"><i class="fas fa-fire"></i><span>profile</span></a>
                <ul class="dropdown-menu">
                  <li><a class="nav-link" href="index-0.html">My Profile</a></li>
                  <li class="active"><a class="nav-link" href="index.html">Edit Profile</a></li>
                </ul>
              </li> -->
              <li class="menu-header">USER</li>
              <li class="nav-item dropdown">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-user-circle"></i><span>Profile</span></a>
                <ul class="dropdown-menu">
                  <li><a class="nav-link" href="<?= base_url('admin/profile') ?>">My Profile</a></li>
                  <li><a class="nav-link" href="<?= base_url('admin/edit') ?>">Edit Profile</a></li>
                </ul>
              </li>
              <li class="menu-header">Ikan</li>
              <li class="nav-item dropdown">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-fish"></i><span>Ikan</span></a>
                <ul class="dropdown-menu">
                  <li><a class="nav-link" href="<?= base_url('jenis_ikan');?>">Jenis Ikan</a></li>
                  <li><a class="nav-link" href="<?= base_url('type_ikan');?>">Type Ikan</a></li>
                  <li><a class="nav-link" href="<?= base_url('ikan');?>">Ikan</a></li>
                </ul>
              </li>

              <li class="menu-header">Penjualan</li>
              <li><a class="nav-link" href="<?= base_url('invoice1');?>"><i class="fas fa-file-invoice"></i><span>invoice</span></a></li>
              <!-- <li class="menu-header">Laporan</li>
              <li><a class="nav-link" href="<?= base_url('laporan');?>"><i class="far fa-sticky-note"></i><span>Laporan</span></a></li> -->
              <li class="menu-header">Logout</li>
              <li><a class="nav-link" href="<?= base_url('auth/logout');?>"><i class="fas fa-sign-out-alt"></i><span>Logout</span></a></li>
            </ul>
        </aside>
      </div>