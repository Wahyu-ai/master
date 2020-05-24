<?php
$site = $this->session->userdata('site_id');
function selected_site($site, $id){
  if($site == $id){
    echo "selected";
  }
}
?>
<div class="container-fluid">

  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <a href="<?=site_url('usersinet')?>" class="btn btn-sm text-white btn-primary shadow-sm"><i class="fa fa-angle-left"></i> Kembali ke Data Users</a>
  </div>

  <?php if($this->session->flashdata('msg')): ?>
    <div class="alert alert-success"><?=$this->session->flashdata('msg'); ?></div>
  <?php endif; ?>

  <div class="row">
    <div class="col-md-12">
      <div class="card shadow mb-4">
        <!-- Card Header - Dropdown -->
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
          <h6 class="m-0 font-weight-bold text-primary">Registrasi Data Users Inet</h6>
        </div>
        <!-- Card Body -->
        <div class="card-body">
          <form action="<?=site_url('usersinet/save_add')?>" method="post">
            <div class="form-group row">
              <label class="col-sm-2 col-form-label">Nama User</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" name="user_nama" required>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-sm-2 col-form-label">Mac Address</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" name="user_mac_address" placeholder="00-00-00-00-00-00" required>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-sm-2 col-form-label">Site Location</label>
              <div class="col-sm-10">
                <select class="form-control" name="user_site_id">
                  <option value="">--pilih site --</option>
                  <?php foreach ($sites as $s): ?>
                    <option value="<?=$s->st_id;?>" <?=selected_site($site, $s->st_id)?>><?=$s->st_nama_site;?></option>
                  <?php endforeach; ?>
                </select>
              </div>
            </div>

            <div class="form-group row">
              <label class="col-sm-2 col-form-label">Nama Atasan</label>
              <div class="col-sm-10">
                <input type="text" value="<?=$this->session->userdata("nama")?>" class="form-control" readonly>
                <input type="hidden" name="user_atasan_id" value="<?=$this->session->userdata("id")?>">
              </div>
            </div>

            <div class="form-group row">
              <label class="col-sm-2 col-form-label"></label>
              <div class="col-sm-10">
                <button type="submit" class="btn btn-success shadow-sm"><i class="fa fa-save"></i> Submit</button>
              </div>
            </div>


          </form>
        </div>
      </div>
    </div>
  </div>
</div>
