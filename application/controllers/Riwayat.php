<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Riwayat extends CI_Controller
{

	public function index()
	{
		$data['riwayat']	= $this->db->select('*, pasien.nama as namapasien')
			->from('hasil')
			->join('pasien', 'pasien.id_periksa=hasil.id_periksa')
			->join('tingkat_kecemasan', 'tingkat_kecemasan.kode_tingkat_cemas=hasil.kode_tingkat_cemas')
			->get()->result();

		$data['title'] 		= 'Riwayat Diagnosa';
		$data['user'] = $this->db->get_where('admin', ['username' => $this->session->userdata('username')])->row_array();
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('riwayat', $data);
		$this->load->view('templates/footer');
	}
}
