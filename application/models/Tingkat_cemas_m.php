<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tingkat_cemas_m extends CI_Model {

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
	public $tabel = 'tingkat_kecemasan';
	public function get()
	{
		return $this->db->order_by('kode_tingkat_cemas', 'ASC')->get($this->tabel);
	}
	
	public function get_unrelated()
	{
		return $this->db->query("SELECT p.kode_tingkat_cemas, p.nama, r.kode_indikator FROM $this->tabel p LEFT JOIN relasi r ON p.kode_tingkat_cemas = r.kode_tingkat_cemas WHERE r.kode_tingkat_cemas is null;");
	}

	public function get_where($where){
		$this->db->where($where);
		return $this->db->get_where($this->tabel);
	}

	public function insert($kode,$nama,$deskripsi,$solusi){
		$this->db->query("INSERT INTO $this->tabel(kode_tingkat_cemas, nama,deskripsi,solusi) VALUES ('$kode','$nama','$deskripsi','$solusi')");
	}

	public function update($kode,$nama,$deskripsi,$solusi,$id){
		$this->db->query("UPDATE $this->tabel SET kode_tingkat_cemas = '$kode', nama = '$nama', deskripsi = '$deskripsi', solusi = '$solusi' WHERE kode_tingkat_cemas = '$id'");
	}

	public function get_where_relasi($id_relasi)
	{
		return $this->db->query("SELECT r.id_relasi, r.id_indikator, r.kode_tingkat_cemas, p.nama, p.deskripsi, p.solusi FROM relasi r JOIN tingkat_cemas p ON r.kode_tingkat_cemas = p.kode_tingkat_cemas WHERE id_relasi = '$id_relasi'");
	}

	public function delete($id){
		$this->db->query("DELETE FROM $this->tabel WHERE kode_tingkat_cemas = '$id'");
	}
	
}
