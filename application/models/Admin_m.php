<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_m extends CI_Model {

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
    public $tabel = 'admin';

	public function get()
	{
		// return $this->db->query("SELECT * FROM indikator order by LENGTH(kode_indikator), kode_indikator");
		return $this->db->select('*')->get($this->tabel);
	}
	
	public function get_array($array){
		$this->db->query("SELECT * FROM $this->tabel WHERE id_indikator in ('$array')");
	}

	public function get_where($where){
		$this->db->where($where);
		return $this->db->get_where($this->tabel);
	}

	public function insert($nama,$username,$password){
		$this->db->query("INSERT INTO $this->tabel(nama, username, password) VALUES ('$nama','$username','$password')");
	}

	public function update($nama,$username,$password,$id){
		$this->db->query("UPDATE $this->tabel SET nama = '$nama', username = '$username', password = '$password' WHERE id_admin = '$id'");
	}

	public function delete($id){
		$this->db->query("DELETE FROM $this->tabel WHERE id_admin = '$id'");
	}
}
