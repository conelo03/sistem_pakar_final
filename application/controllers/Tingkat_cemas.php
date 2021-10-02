<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Tingkat_cemas extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		if ($this->session->userdata('login') != true) {
			$url = base_url() . 'login';
			redirect($url);
		}
		$this->load->library('session');
		$this->load->model('tingkat_cemas_m');
		$this->load->model('indikator_m');
		$this->load->model('admin_m');
	}

	public function index()
	{

		$data['title'] = 'Data Tingkat Kecemasan';
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
		$this->load->view('tingkat_cemas/index', $data);
		$this->load->view('templates/footer');
	}

	public function hapus_tingkat_cemas($id)
	{
		$this->tingkat_cemas_m->delete($id);
		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Berhasil Dihapus!</div>');
		redirect(base_url('tingkat_cemas'));
	}

	public function aksi_edit_tingkat_cemas($id)
	{
		$kode = $_POST['kode'];
		$nama = $_POST['nama'];
		$deskripsi = $_POST['deskripsi'];
		$solusi = str_replace("<br />", '', nl2br($_POST['solusi']));
		$this->tingkat_cemas_m->update($kode, $nama, $deskripsi, $solusi, $id);
		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Berhasil Diedit!</div>');
		redirect(base_url('tingkat_cemas'));
	}

	public function aksi_tambah_tingkat_cemas()
	{
		$kode = $_POST['kode'];
		$nama = $_POST['nama'];
		$deskripsi = $_POST['deskripsi'];
		$solusi = str_replace("<br />", '', nl2br($_POST['solusi']));
		$this->tingkat_cemas_m->insert($kode, $nama, $deskripsi, $solusi);
		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Berhasil Disimpan!</div>');
		redirect(base_url('tingkat_cemas'));
	}
}
