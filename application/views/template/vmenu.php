<?php
function menu_active($menu,$menupilih){
  if($menu == $menupilih){
    return "active";
  }
}
?>
<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

  <!-- Sidebar - Brand -->
  <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?=base_url()?>">
    <div class="sidebar-brand-icon rotate-n-15">
      <img src="<?=base_url()?>images/favicon.png" alt="logo RLU" height="50">
    </div>
    <div class="sidebar-brand-text mx-3 text-warning h5">RLU-Inet</div>
  </a>

  <!-- Divider -->
  <hr class="sidebar-divider my-0">

  <!-- Nav Item - Dashboard -->
  <li class="nav-item <?=menu_active($menu,'dashboard')?>">
    <a class="nav-link" href="<?=site_url('dashboard')?>">
      <i class="fas fa-fw fa-tachometer-alt"></i>
      <span>Dashboard</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
      MASTER
    </div>

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item <?=menu_active($menu,'usersinet')?>">
      <a class="nav-link" href="<?=site_url('usersinet')?>">
        <i class="fas fa-fw fa-table"></i><span>Data User Inet</span>
      </a>
    </li>

    <li class="nav-item">
      <a class="nav-link" href="charts.html">
        <i class="fas fa-fw fa-map-marked-alt"></i><span>Data Sites</span>
      </a>
    </li>

    <li class="nav-item">
      <a class="nav-link" href="charts.html">
        <i class="fas fa-fw fa-users"></i><span>Data Akun</span>
      </a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Nav Item - Charts -->
    <li class="nav-item">
      <a class="nav-link" href="charts.html">
        <i class="fas fa-fw fa-exclamation-circle"></i>
        <span>About</span>
      </a>
    </li>

    <li class="nav-item">
      <a class="nav-link" href="<?=site_url('login/logout')?>">
        <i class="fas fa-fw fa-sign-out-alt"></i>
        <span>Keluar</span>
      </a>
    </li>
    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
      <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

  </ul>
  <!-- End of Sidebar -->

  <!-- Content Wrapper close tag ada di vfooter.php-->
  <div id="content-wrapper" class="d-flex flex-column">

    <!-- Main Content close tag di vfooter.php -->
    <div id="content">

      <?php $this->load->view('template/vtopbar');?>
