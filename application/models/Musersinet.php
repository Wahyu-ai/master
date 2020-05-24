<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Musersinet extends CI_Model {

  //tabel tbl_users_inet
  public $ui_id;
  public $ui_nama_user;
  public $ui_mac_address;
  public $ui_site_id;
  public $ui_atasan_id;
  public $ui_status;
  public $ui_tgl_terdaftar;
  public $ui_tgl_approved;
  public $ui_manager_id;

  public function get_data_users_inet()
  {
    // $query = $this->db->get('tbl_users_inet');
    $site_id = $this->session->userdata('site_id');
    if($this->session->userdata('level') == 1){ //jika Administrator muncul semua data
      $sql = "SELECT * FROM tbl_users_inet INNER JOIN tbl_akun ON ui_atasan_id = tbl_akun.ak_id INNER JOIN tbl_site ON ui_site_id = tbl_site.st_id";
    }else{ //jika tidak muncul sesuai akun site login
      $sql = "SELECT * FROM tbl_users_inet INNER JOIN tbl_akun ON ui_atasan_id = tbl_akun.ak_id INNER JOIN tbl_site ON ui_site_id = tbl_site.st_id WHERE ui_site_id = '$site_id'";
    }
    $query = $this->db->query($sql);
    return $query->result();
  }

  public function get_data_users_inet_byid($id)
  {
    $sql = "SELECT * FROM tbl_users_inet WHERE ui_id = '{$id}'";
    $query = $this->db->query($sql);
    return $query->row();
  }

  public function insert_users_inet()
  {
    $this->ui_nama_user   = $_POST['user_nama'];
    $this->ui_mac_address = $_POST['user_mac_address'];
    $this->ui_site_id     = $_POST['user_site_id'];
    $this->ui_atasan_id   = $_POST['user_atasan_id'];
    $this->ui_status      = 0; //belum di approved
    $this->ui_tgl_terdaftar = date('Y-m-d h:m:i');
    $save = $this->db->insert('tbl_users_inet', $this);
    if(!$save){
      return false;
    }else{
      return true;
    }
  }

  public function update_users_inet()
  {
    $id = $_POST['user_id'];
    $ui_nama_user   = $_POST['user_nama'];
    $ui_mac_address = $_POST['user_mac_address'];
    $ui_site_id     = $_POST['user_site_id'];
    $ui_atasan_id   = $_POST['user_atasan_id'];

    $data = array(
      'ui_nama_user' => $ui_nama_user,
      'ui_mac_address' => $ui_mac_address,
      'ui_site_id' => $ui_site_id,
      'ui_atasan_id' => $ui_atasan_id
    );

    $this->db->where('ui_id', $id);
    $query = $this->db->update('tbl_users_inet', $data);

    if(!$query){
      return false;
    }else{
      return true;
    }
  }

  public function delete_users_inet($id)
  {
    $this->db->where('ui_id', $id);
    $query = $this->db->delete('tbl_users_inet');
    if(!$query){
      return false;
    }else{
      return true;
    }
  }

}
