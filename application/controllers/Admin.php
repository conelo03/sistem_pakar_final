<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	function __construct()
	{
	    parent::__construct();
	    if ($this->session->userdata('login') != true)
	    {
	      $url=base_url().'login';
	      redirect($url);
	    }
	    $this->load->library('session');
	    $this->load->model('indikator_m');
	    $this->load->model('admin_m');
	}

	public function index()
	{
		$data['title'] = 'Data Admin';
		$data['user'] = $this->db->get_where('admin', ['username' => $this->session->userdata('username')])->row_array();

		$admin = $this->admin_m->get();
		if ($admin->num_rows() > 0) {
			$admin = $admin->result_array();
			$data['admin'] = $admin;
		} else {
			$data['admin'] = NULL;
		}

		$this->load->view('templates/header', $data);
	    $this->load->view('templates/sidebar', $data);
	    $this->load->view('templates/topbar', $data);
	    $this->load->view('admin/index', $data);
	    $this->load->view('templates/footer');

	}

	public function hapus_admin($id){
		$this->admin_m->delete($id);
		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Berhasil Dihapus!</div>');
		redirect(base_url('admin'));
	}

	public function aksi_edit_admin($id){
		$nama = $_POST['nama'];
		$username = $_POST['username'];
		$password = $_POST['password'];
		$this->admin_m->update($nama,$username,$password,$id);
		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Berhasil Diedit!</div>');
		redirect(base_url('admin'));
	}

	public function aksi_tambah_admin(){
		$nama = $_POST['nama'];
		$username = $_POST['username'];
		$password = $_POST['password'];
		$this->admin_m->insert($nama, $username, $password);
		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Berhasil Disimpan!</div>');
		redirect(base_url('admin'));
	}
}
