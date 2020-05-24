<div class="container-fluid">

  <div class="row">
    <div class="col-md-12">
      <div class="card shadow mb-4">
        <!-- Card Header - Dropdown -->
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
          <h6 class="m-0 font-weight-bold text-primary">Detail Profile</h6>
        </div>
        <!-- Card Body -->
        <div class="card-body">
          <div class="form-group row">
            <label class="col-sm-2">Nama Lengkap</label>
            <div class="col-sm-10 text-primary"> <?=$row->ak_nama;?></div>
          </div>
          <form action="" method="post">
          <div class="form-group row">
            <label class="col-sm-2">Usename</label>
            <div class="col-sm-3 text-primary"> <?=$row->ak_username;?></div>
            <div class="col-sm-2 text-primary"> Ganti Passwrod</div>
            <div class="col-sm-3 text-primary"> <input type="text" class="form-control" name="new_password" required></div>
            <div class="col-sm-2 text-primary">
              <button type="submit" class="btn btn-info btn-sm">Change Password</button>
            </div>
          </div>
          </form>
          <div class="form-group row">
            <label class="col-sm-2">Level</label>
            <div class="col-sm-10 text-primary"> <?=jabatan($row->ak_level);?></div>
          </div>
          <div class="form-group row">
            <label class="col-sm-2">Site Location</label>
            <div class="col-sm-10 text-primary"> <?=$row->st_nama_site;?></div>
          </div>
          <div class="form-group row">
            <label class="col-sm-2">Date Created</label>
            <div class="col-sm-10 text-primary"> <?=nice_date($row->ak_created, 'd-m-Y H:i:s');?></div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
