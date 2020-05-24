<div class="container-fluid">

<?php if($this->session->userdata('level') != 1){ ?>
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <a href="<?=site_url('usersinet/registrasi');?>" class="btn btn-sm btn-success shadow-sm"><i class="fas fa-user-plus fa-sm text-white"></i> Daftarkan User Baru</a>
  </div>
<?php } ?>

  <?php if($this->session->flashdata('msg')): ?>
    <div class="alert alert-info"><?=$this->session->flashdata('msg'); ?></div>
  <?php endif; ?>

  <div class="row">
    <div class="col-md-12">
      <div class="card shadow mb-4">
        <!-- Card Header - Dropdown -->
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
          <h6 class="m-0 font-weight-bold text-primary">Data Users Inet</h6>
        </div>
        <!-- Card Body -->
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-sm table-bordered table-hover" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr style="background-color:#5c89ff; color:white;">
                  <th>No</th>
                  <th>Nama User</th>
                  <th>Mac Address</th>
                  <th>Asal Site</th>
                  <th>Atasan</th>
                  <th>Tgl di Daftarkan</th>
                  <th>Status</th>
                  <th>Di Approve Oleh</th>
                  <th>Menu</th>
                </tr>
              </thead>
              <tbody>
                <?php $n=1; foreach ($result as $r): ?>
                  <tr>
                    <td><?=$n++;?></td>
                    <td><?=$r->ui_nama_user;?></td>
                    <td><?=$r->ui_mac_address;?></td>
                    <td><?=$r->st_nama_site;?></td>
                    <td><?=$r->ak_nama;?></td>
                    <td><span class="text-xs"><?=tgl_indo($r->ui_tgl_terdaftar);?></span></td>
                    <td><?=cek_status_approve($r->ui_status, $r->ui_tgl_approved);?></td>
                    <td><?
                    if ($r->ui_status != 0) {

                      $CI =& get_instance();
                      $CI->load->model('makun');
                      $row = $CI->makun->get_akun_name($r->ui_manager_id);
                      echo $row->ak_nama;
                    }
                    ?></td>
                    <td>

                      <?php if($this->session->userdata('level') == 2){ ?>
                        <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#modalApproved<?=$n;?>">
                          <span class="icon text-white"><i class="fas fa-check"></i></span>
                        </button>
                      <?php } ?>

                      <?php if($this->session->userdata('level') == 3){ ?>
                        <a href="<?=site_url('usersinet/edit/'.$r->ui_id);?>" class="btn btn-info btn-xs">
                          <span class="icon text-white"><i class="fa fa-edit"></i></span>
                        </a>
                        <a href="#" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#modalDelete<?=$n;?>">
                          <span class="icon text-white"><i class="fa fa-times"></i></span>
                        </a>
                      <?php } ?>

                      <!-- Modal Approved-->
                      <div class="modal fade" id="modalApproved<?=$n;?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title">Approved Confirmation</h5>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <div class="modal-body">
                              Anda yakin akan melakukan Approved data user ini ?
                            </div>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>

                              <?php if($r->ui_status != 1) {?>
                                <a href="<?=site_url('usersinet/approved/').$r->ui_id.'/yes';?>" class="btn btn-success">√ Approved</a>
                              <?php } else{ ?>
                                <a href="<?=site_url('usersinet/approved/').$r->ui_id.'/no';?>" class="btn btn-warning">Batalkan Approved</a>
                              <?php } ?>

                            </div>
                          </div>
                        </div>
                      </div>
                      <!-- end Modal -->

                      <!-- Modal Approved-->
                      <div class="modal fade" id="modalDelete<?=$n;?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title">Delete Confirmation</h5>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <div class="modal-body">
                              Anda yakin akan Hapus data user ini ?
                            </div>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                <a href="<?=site_url('usersinet/delete/'.$r->ui_id);?>" class="btn btn-danger"> Ya </a>

                            </div>
                          </div>
                        </div>
                      </div>
                      <!-- end Modal -->

                    </td>
                  </tr>
                <?php endforeach; ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
