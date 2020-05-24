<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Msites extends CI_Model {
  //tabel tbl_users_inet
  public $st_id;
  public $st_nama_site;

  public function get_all_sites()
  {
    $query = $this->db->get('tbl_site');
    return $query->result();
  }

}
