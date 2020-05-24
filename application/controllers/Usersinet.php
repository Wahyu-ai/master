<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usersinet extends CI_Controller {
  function __construct()
  {
    parent::__construct();
    ob_start();
    $this->load->helper(array('date'));
    $this->load->model(array('musersinet','msites'));

    if($this->session->userdata('status') != "login"){
      redirect('login');
    }

    function cek_status_approve($var, $tgl){
      if($var == 0){
        echo "<span class='text-danger'>Not Approved</span>";
      }else{
        echo "<span class='text-success'>√ Approved</span>";
        echo "<br /><span class='text-xs text-gray[800]'>".tgl_indo($tgl)."</span>";
      }
    }

    function tgl_indo($bad_date){
      return nice_date($bad_date, 'd-m-Y H:i:s');
    }

  }

  public function index()
  {
    $data['menu'] = 'usersinet';
    $data['result'] = $this->musersinet->get_data_users_inet();
    $this->load->view('template/vheader.php', $data);
    $this->load->view('template/vmenu.php', $data);
    $this->load->view('usersnet/vindex.php', $data);
    $this->load->view('template/vcorejs.php');
    $this->load->view('usersnet/vusersinetjs.php');
    $this->load->view('template/vfooter.php');
  }

  public function registrasi()
  {
    $data['menu'] = 'usersinet';
    $data['sites'] = $this->msites->get_all_sites();
    $this->load->view('template/vheader.php', $data);
    $this->load->view('template/vmenu.php', $data);
    $this->load->view('usersnet/vadd.php', $data);
    $this->load->view('template/vcorejs.php');
    $this->load->view('template/vfooter.php');
  }

  public function save_add()
  {
    if (!$this->musersinet->insert_users_inet()) {
      $errNo   = $this->db->_error_number();
      $errMess = $this->db->_error_message();
      $this->session->set_flashdata('error', 'Error : '.$errNo.':'.$errMess.'');
    } else {
      $this->session->set_flashdata('msg', 'Data Berhasil Di Simpan');
    }

    redirect('usersinet/registrasi');
  }

  public function approved($id, $stm){
    $mng_id = $this->session->userdata('id');
    if($stm == 'yes'){
      $sql = "UPDATE tbl_users_inet SET ui_status = '1', ui_tgl_approved = now(), ui_manager_id = '{$mng_id}' WHERE ui_id = '{$id}'";
    }

    if($stm == 'no'){
      $sql = "UPDATE tbl_users_inet SET ui_status = '0', ui_tgl_approved = now(), ui_manager_id = '{$mng_id}' WHERE ui_id = '{$id}'";
    }

    $query = $this->db->query($sql);
    if (!$query) {
      $errNo   = $this->db->_error_number();
      $errMess = $this->db->_error_message();
      $this->session->set_flashdata('error', 'Error : '.$errNo.':'.$errMess.'');
    } else {
      $this->session->set_flashdata('msg', 'Data Berhasil '.ucfirst($stm).' Approved');
    }

    redirect('usersinet/index');
  }

  public function edit($id)
  {
    $data['menu'] = 'usersinet';
    $data['sites'] = $this->msites->get_all_sites();
    $data['users'] = $this->musersinet->get_data_users_inet_byid($id);
    $this->load->view('template/vheader.php', $data);
    $this->load->view('template/vmenu.php', $data);
    $this->load->view('usersnet/vedit.php', $data);
    $this->load->view('template/vcorejs.php');
    $this->load->view('template/vfooter.php');
  }

  public function save_edit()
  {
    if (!$this->musersinet->update_users_inet()) {
      $errNo   = $this->db->_error_number();
      $errMess = $this->db->_error_message();
      $this->session->set_flashdata('error', 'Error : '.$errNo.':'.$errMess.'');
    } else {
      $this->session->set_flashdata('msg', 'Data Berhasil Di Update');
    }

    redirect('usersinet/index');
  }

  public function delete($id)
  {
    if (!$this->musersinet->delete_users_inet($id)) {
      $errNo   = $this->db->_error_number();
      $errMess = $this->db->_error_message();
      $this->session->set_flashdata('error', 'Error : '.$errNo.':'.$errMess.'');
    } else {
      $this->session->set_flashdata('msg', 'Data Berhasil Di Hapus');
    }

    redirect('usersinet/index');
  }

}
