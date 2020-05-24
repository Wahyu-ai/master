<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Makun extends CI_Model {
  //tabel tbl_akun
  public $ak_id;
  // dst

  public function get_akun_name($id)
  {
    $query = $this->db->query("SELECT * FROM tbl_akun INNER JOIN tbl_site ON st_id = ak_site_id WHERE ak_id = '{$id}'");
    return $query->first_row();
  }



}
