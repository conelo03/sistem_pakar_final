<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Indikator_m extends CI_Model {

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
	public $tabel = 'indikator';

	public function get()
	{
		// return $this->db->query("SELECT * FROM indikator order by LENGTH(kode_indikator), kode_indikator");
		return $this->db->select('*, CAST(kode_indikator as SIGNED) AS casted_column')->order_by('length(kode_indikator)')->order_by('kode_indikator')->get($this->tabel);
	}
	
	public function get_array($array){
		$this->db->query("SELECT * FROM $this->tabel WHERE kode_indikator in ('$array')");
	}

	public function get_where($where){
		$this->db->where($where);
		return $this->db->get_where($this->tabel);
	}

	public function insert($kode,$nama,$deskripsi){
		$this->db->query("INSERT INTO $this->tabel(kode_indikator, nama,deskripsi) VALUES ('$kode','$nama','$deskripsi')");
	}

	public function update($kode,$nama,$deskripsi,$id){
		$this->db->query("UPDATE $this->tabel SET kode_indikator = '$kode', nama = '$nama', deskripsi = '$deskripsi' WHERE kode_indikator = '$id'");
	}

	public function delete($id){
		$this->db->query("DELETE FROM $this->tabel WHERE kode_indikator = '$id'");
	}
}
