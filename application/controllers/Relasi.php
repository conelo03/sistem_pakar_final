<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Relasi extends CI_Controller {

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
	    $this->load->model('indikator_m');
	    $this->load->model('admin_m');
	    $this->load->model('relasi_m');
	}
	public function index()
	{
		$data['title']	= 'Data Relasi';
		$data['user'] 	= $this->db->get_where('admin', ['username' => $this->session->userdata('username')])->row_array();
		$m 	= $this->db->get('tingkat_kecemasan')->result();
		$data['relasi']	= [];
		foreach ($m as $key) {
			$n 	= $this->db->get_where('relasi', [
				'kode_tingkat_cemas'	=> $key->kode_tingkat_cemas
			])->result();
			// print_r(count($n));
			if (count($n) !== 0) {
				$data['relasi'][$key->nama]					= [];
				$data['relasi'][$key->nama]['kode_tingkat_cemas']	= $key->kode_tingkat_cemas;
				$data['relasi'][$key->nama]['id_relasi']	= $n[0]->id_relasi;
				$data['relasi'][$key->nama]['indikator']		= [];
				for ($i=0; $i < count($n); $i++) {
					$b 	= $this->db->get_where('indikator', [
						'kode_indikator'	=> $n[$i]->kode_indikator
					])->row();
					$data['relasi'][$key->nama]['indikator'][$i]	= $b->nama;
				}
			}
			
		}

		$data['indikator'] = $this->indikator_m->get()->result_array();
		$data['tingkat_cemas'] = [];
		$tingkat_cemas = $this->tingkat_cemas_m->get_unrelated();
		if ($tingkat_cemas->num_rows() > 0) {
			$tingkat_cemas = $tingkat_cemas->result_array();
			$data['tingkat_cemas'] = $tingkat_cemas;
		} else {
			$data['tingkat_cemas'] = [];
		}
		
		$this->load->view('templates/header', $data);
	    $this->load->view('templates/sidebar', $data);
	    $this->load->view('templates/topbar', $data);
	    $this->load->view('relasi/index', $data);
	    $this->load->view('templates/footer');
	}

	public function aksi_edit_relasi($id)
	{
		// print_r($id);die();
		$kode_tingkat_cemas = $id;
		if (isset($_POST['indikator'])) {
			$indikator = $_POST['indikator'];
			$kode_indikator = implode(',',$indikator);
			$this->db->where('kode_tingkat_cemas', $kode_tingkat_cemas);
			$this->db->delete('relasi');
			for ($i=0; $i < count($indikator); $i++) { 
				// $this->relasi_m->update($id_tingkat_cemas, $indikator[$i]);
				$this->db->insert('relasi', [
					'kode_indikator'		=> $indikator[$i],
					'kode_tingkat_cemas'	=> $kode_tingkat_cemas
				]);
			}
			// $this->relasi_m->update($id_tingkat_cemas, $id_indikator);
			// print_r($id_tingkat_cemas);
			// print_r($id_indikator);die();
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Berhasil Disimpan!</div>');
			redirect(base_url('relasi'));
		} else {
			$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Data Error!</div>');
			redirect(base_url('relasi'));
		} 
	}

	public function aksi_tambah_relasi(){
		// print_r($this->input->post());die();
		$kode_tingkat_cemas = $_POST['kode_tingkat_cemas'];
		if (isset($_POST['indikator'])) {
			$indikator = $this->input->post('indikator');
			foreach ($indikator as $key) {
				$this->db->insert('relasi', [
					'kode_indikator'		=> $key,
					'kode_tingkat_cemas'	=> $kode_tingkat_cemas
				]);
			}

			// $indikator = $_POST['indikator'];
			// $id_indikator = implode(',',$indikator);
			// $this->relasi_m->insert($id_tingkat_cemas,$id_indikator);
		} else {
			$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Data Error!</div>');

			redirect(base_url('relasi'));
		}
		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Berhasil Disimpan!</div>');

		redirect(base_url('relasi'));
	}

	public function hapus_relasi($id){
		$this->relasi_m->delete($id);
		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Berhasil Dihapus!</div>');
		redirect(base_url('relasi'));
	}
}
