<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

  function __construct(){
    parent::__construct();

    $this->load->model(array('mdashboard'));

    if($this->session->userdata('status') != "login"){
      redirect('login');
    }
  }

  public function index()
  {
    $data['menu'] = 'dashboard';

    $data['count_site'] = $this->mdashboard->get_site_count();
    $data['count_users_active'] = $this->mdashboard->get_users_active_count();
    $data['count_users_not_active'] = $this->mdashboard->get_users_not_active_count();
    $data['count_akun_active'] = $this->mdashboard->get_akun_active_count();
    $data['count_users_per_site'] = $this->mdashboard->get_site_per_users_count();

    $this->load->view('template/vheader.php', $data);
    $this->load->view('template/vmenu.php', $data);
    $this->load->view('dashboard/vindex.php');
    $this->load->view('template/vcorejs.php');
    $this->load->view('dashboard/vdashboardjs.php');
    $this->load->view('template/vfooter.php');
  }
}
