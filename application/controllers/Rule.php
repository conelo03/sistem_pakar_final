<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Rule extends CI_Controller {

	function __construct()
	{
	    parent::__construct();
	    if ($this->session->userdata('login') != true)
	    {
	      $url=base_url().'login';
	      redirect($url);
	    }
	    $this->load->library('session');
	    $this->load->model('tingkat_cemas_m');
	    $this->load->model('admin_m');
	}

	public function index()
	{
		$data['title'] = 'Rule';
		$data['user'] = $this->db->get_where('admin', ['username' => $this->session->userdata('username')])->row_array();

		$tingkat_cemas = $this->tingkat_cemas_m->get();
		if ($tingkat_cemas->num_rows() > 0) {
			$tingkat_cemas = $tingkat_cemas->result_array();
			$data['tingkat_cemas'] = $tingkat_cemas;
		} else {
			$data['tingkat_cemas'] = NULL;
		}

		$this->load->view('templates/header', $data);
	    $this->load->view('templates/sidebar', $data);
	    $this->load->view('templates/topbar', $data);
	    $this->load->view('rule/index', $data);
	    $this->load->view('templates/footer');
	}
}
