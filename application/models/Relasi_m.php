<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Relasi_m extends CI_Model {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public $tabel = 'relasi';

	public function get_where($kode_indikator)
	{
		return $this->db->query("SELECT r.id_relasi, r.kode_indikator, r.kode_tingkat_cemas, p.nama, p.deskripsi, p.solusi FROM relasi r JOIN tingkat_cemas p ON r.kode_tingkat_cemas = p.kode_tingkat_cemas WHERE kode_indikator = '$kode_indikator'");
	}

	public function get_memasuki_indikator($kode_indikator)
	{
		return $this->db->query("SELECT r.id_relasi, r.kode_indikator, r.kode_tingkat_cemas, p.nama, p.deskripsi, p.solusi FROM relasi r JOIN tingkat_cemas p ON r.kode_tingkat_cemas = p.kode_tingkat_cemas WHERE kode_indikator like '%$kode_indikator%'");
	}

	public function insert($kode_tingkat_cemas,$kode_indikator){
		$this->db->query("INSERT INTO $this->tabel(kode_tingkat_cemas,kode_indikator) VALUES ('$kode_tingkat_cemas','$kode_indikator')");
	}

	public function get()
	{
		return $this->db->query("SELECT r.id_relasi, r.kode_indikator, r.kode_tingkat_cemas, g.nama as nama_indikator, p.nama as nama_tingkat_cemas, p.deskripsi, p.solusi FROM relasi r JOIN tingkat_cemas p join indikator g ON r.kode_tingkat_cemas = p.kode_tingkat_cemas and r.kode_indikator = g.kode_indikator");
	}

	public function delete($id){
		// $this->db->query("DELETE FROM $this->tabel WHERE id_relasi = '$id'");
		$this->db->where('kode_tingkat_cemas', $id);
		$this->db->delete('relasi');
	}

	public function update($kode_tingkat_cemas, $kode_indikator){
		$this->db->query("UPDATE $this->tabel SET kode_indikator = '$kode_indikator' WHERE kode_tingkat_cemas = '$kode_tingkat_cemas'");
		// $this->db->insert('relasi',)
	}
}
