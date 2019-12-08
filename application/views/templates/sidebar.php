

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?= base_url(); ?>">
        <div class="sidebar-brand-icon rotate-n-15">
          <i class="fas fa-bolt"></i>
        </div>
        <div class="sidebar-brand-text mx-3">PT. SETRUM</div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Heading -->
      <div class="sidebar-heading">
        management
      </div>

      <!-- Nav Item - management -->

      <li class="nav-item">
        <a class="nav-link" href="<?= base_url('management'); ?>">
          <i class="fas fa-fw fa-user"></i>
          <span>Pelanggan</span></a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="<?= base_url('management/tarif'); ?>">
          <i class="fas fa-fw fa-clipboard-list"></i>
          <span>Tarif</span></a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="<?= base_url('management/tagihan'); ?>">
          <i class="fas fa-fw fa-dollar-sign"></i>
          <span>Tagihan</span></a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="<?= base_url('management/pembayaran'); ?>">
          <i class="fas fa-fw fa-money-bill-wave"></i>
          <span>Pembayaran</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">

      <li class="nav-item">
        <a class="nav-link" href="<?= base_url('management/detailpembayaran'); ?>">
          <i class="fas fa-fw fa-clipboard"></i>
          <span>Detail Pembayaran</span></a>
      </li>

      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

    </ul>
    <!-- End of Sidebar -->