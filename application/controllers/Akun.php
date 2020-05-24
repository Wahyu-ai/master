<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Akun extends CI_Controller {
  function __construct()
  {
    parent::__construct();
    ob_start();
    $this->load->helper(array('date'));
    $this->load->model(array('makun'));

    if($this->session->userdata('status') != "login"){
      redirect('login');
    }

  }

  public function profile()
  {
    $data['menu'] = 'akun';
    $id = $this->session->userdata('id');
    $data['row'] = $this->makun->get_akun_name($id);
    $this->load->view('template/vheader.php', $data);
    $this->load->view('template/vmenu.php', $data);
    $this->load->view('akun/vprofil.php', $data);
    $this->load->view('template/vcorejs.php');
    $this->load->view('template/vfooter.php');
  }


}
