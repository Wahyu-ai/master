<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mdashboard extends CI_Model {

  public function get_site_count()
  {
    // $this->db->like('title', 'match');
    return $this->db->count_all('tbl_site');
  }

  public function get_users_active_count()
  {
    return $this->db->where('ui_status',1)->count_all_results('tbl_users_inet');
  }

  public function get_users_not_active_count()
  {
    return $this->db->where('ui_status',0)->count_all_results('tbl_users_inet');
  }

  public function get_akun_active_count()
  {
    return $this->db->where('ak_status',1)->count_all_results('tbl_akun');
  }

  public function get_site_per_users_count()
  {
    return $this->db->query('SELECT st_nama_site, st_bgcolor, st_bgcolor_hover, COUNT(*) as jlh FROM tbl_users_inet, tbl_site WHERE ui_site_id = st_id GROUP BY st_nama_site')->result();
  }

}
