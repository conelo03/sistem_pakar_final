<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    if ($this->session->userdata('login') != true)
    {
      $url=base_url().'login';
      redirect($url);
    }
  }

  public function index()
  {
    $data['title'] = 'Dashboard';
    $data['user'] = $this->db->get_where('admin', ['username' => $this->session->userdata('username')])->row_array();

    $this->load->view('templates/header', $data);
    $this->load->view('templates/sidebar', $data);
    $this->load->view('templates/topbar', $data);
    $this->load->view('dashboard', $data);
    $this->load->view('templates/footer');
  }
    
    public function dashboard_user()
    {
        $data['title'] = 'Dashboard User';
        $data['user'] = $this->db->get_where('admin', ['username' => $this->session->userdata('username')])->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('dashboard_user', $data);
        $this->load->view('templates/footer');
    }
}
