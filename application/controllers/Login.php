<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
  function __construct()
  {
    parent::__construct();
    ob_start();
    $this->load->library('Session');
  }

  public function index()
  {
    if($this->session->userdata('status') == 'login'){
      redirect('dashboard');
    } else {
      // $this->session->set_flashdata('msg', 'session berakahir');
      $this->load->view('vlogin');
    }
  }

  public function login_act() {
    $username = $this->input->post('ak_username');
    $password = md5($this->input->post('ak_password'));
    $sql = "SELECT * FROM tbl_akun WHERE ak_username = ? AND ak_password = ?";
    $query = $this->db->query($sql, array($username, $password));

    if (!$query) {
      $this->session->set_flashdata('msg', 'Login Gagal !');
      redirect('login');
    }

    $row = $query->first_row();
    // vdebug($query);
    // die();
    if ($row != NULL) {
      $nama       = $row->ak_nama;
      $user_id    = $row->ak_id;
      $user_level = $row->ak_level;
      $user_site_id = $row->ak_site_id;

      $data_session = array(
        'id' => $user_id,
        'username' => $username,
        'nama' => $nama,
        'status' => "login",
        'level' => $user_level,
        'site_id' => $user_site_id
      );

      $this->session->set_userdata($data_session);
      redirect('dashboard/index');
    } else {
      $this->session->set_flashdata('msg', 'Login Gagal !');
      redirect('login');
    }
  }

  function logout(){
    $this->session->set_flashdata('msg', 'session berakahir');
    $this->session->unset_userdata("id");
    $this->session->unset_userdata("username");
    $this->session->unset_userdata("nama");
    $this->session->unset_userdata("status");
    $this->session->unset_userdata("level");
    $this->session->unset_userdata("site_id");
    $this->session->sess_destroy();
    ob_clean();
    redirect(base_url());
  }
}
