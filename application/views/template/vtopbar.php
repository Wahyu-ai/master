<!-- Topbar -->
<nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

  <!-- Sidebar Toggle (Topbar) -->
  <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
    <i class="fa fa-bars"></i>
  </button>

  <?php
  //AMbil data nama site users login, secara instans
  $site_id = $this->session->userdata('site_id');
  $sql ="SELECT * FROM tbl_site WHERE st_id = {$site_id}";
  $query = $this->db->query($sql);
  $row = $query->row();
  echo "<h4> Site : ".$row->st_nama_site."</h4>";
  ?>
  <!-- Sistem informasi Pendaftaran Inet -->
  <!-- Topbar Search -->
  <!-- <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
  <div class="input-group">
  <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
  <div class="input-group-append">
  <button class="btn btn-primary" type="button">
  <i class="fas fa-search fa-sm"></i>
</button>
</div>
</div>
</form> -->

<!-- Topbar Navbar -->
<ul class="navbar-nav ml-auto">

  <!-- Nav Item - Alerts -->
  <li class="nav-item dropdown no-arrow mx-1">
    <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
      <i class="fas fa-bell fa-fw"></i>
      <!-- Counter - Alerts -->
      <span class="badge badge-danger badge-counter">3+</span>
    </a>
  </li>


  <div class="topbar-divider d-none d-sm-block"></div>
<?php
function jabatan($lvl){
  if ($lvl == 1) {
    echo "( Administrator )";
  }
  if ($lvl == 2) {
    echo "( Manager )";
  }
  if ($lvl == 3) {
    echo "( KTU)";
  }
}
?>
  <!-- Nav Item - User Information -->
  <li class="nav-item dropdown no-arrow">
    <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
      <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?=jabatan($this->session->userdata('level'))?> <?=$this->session->userdata('nama')?></span>
      <img class="img-profile rounded-circle" src="<?=base_url()?>images/user.png">
    </a>
    <!-- Dropdown - User Information -->
    <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
      <a class="dropdown-item" href="<?=site_url('akun/profile/'.$this->session->userdata('id'))?>">
        <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
        Profile
      </a>
      <div class="dropdown-divider"></div>
      <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
        <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
        Logout
      </a>
    </div>
  </li>

</ul>

</nav>
<!-- End of Topbar -->
