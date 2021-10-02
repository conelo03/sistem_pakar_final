<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Indikator extends CI_Controller {

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
		$data['title'] = 'Data Indikator';
		$data['user'] = $this->db->get_where('admin', ['username' => $this->session->userdata('username')])->row_array();

		$indikator = $this->indikator_m->get();
		if ($indikator->num_rows() > 0) {
			$indikator = $indikator->result_array();
			$data['indikator'] = $indikator;
		} else {
			$data['indikator'] = NULL;
		}

		$this->load->view('templates/header', $data);
	    $this->load->view('templates/sidebar', $data);
	    $this->load->view('templates/topbar', $data);
	    $this->load->view('indikator/index', $data);
	    $this->load->view('templates/footer');

	}

	public function hapus_indikator($id){
		$this->indikator_m->delete($id);
		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Berhasil Dihapus!</div>');
		redirect(base_url('Indikator'));
	}

	public function aksi_edit_indikator($id){
		$kode = $_POST['kode'];
		$nama = $_POST['nama'];
		$deskripsi = $_POST['deskripsi'];
		$this->indikator_m->update($kode,$nama,$deskripsi,$id);
		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Berhasil Diedit!</div>');
		redirect(base_url('Indikator'));
	}

	public function aksi_tambah_indikator(){
		$nama = $_POST['nama'];
		$kode = $_POST['kode'];
		$deskripsi = $_POST['deskripsi'];
		$this->indikator_m->insert($kode, $nama, $deskripsi);
		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Berhasil Disimpan!</div>');
		redirect(base_url('Indikator'));
	}
}
