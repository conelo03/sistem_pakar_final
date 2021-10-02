<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->library('session');
		$this->load->model('admin_m');
	}
	public function index()
	{
		$this->load->view('home/header_login');
		$this->load->view('login/index');
		$this->load->view('home/footer');
	}


	public function logout()
	{
		$this->session->sess_destroy();
		redirect(base_url('login'));
	}

	public function aksi_login()
	{

		$username = $_POST['username'];
		$password = $_POST['password'];
		$user = $this->admin_m->get_where(array('username' => $username, 'password' => $password));
		/*var_dump($email);
		var_dump($password);
		var_dump($user->result_array());
		die; */
		if ($user->num_rows() > 0) {
			$this->session->set_userdata('login', true);
			$user = $user->result_array();
			$sesi = array(
				'nama' => $user[0]['nama'],
				'username' => $user[0]['username'],
				'role' => $user[0]['role'],
			);
			$this->session->set_userdata($sesi);
			if ($this->session->role == 'admin') {
				redirect(base_url('Diagnosa'));
			} else {
				redirect(base_url('Diagnosa'));
			}
		} else {
			redirect(base_url('login'));
		}
	}

	// public function register(){
	// 	$this->load->view('home/header');
	// 	$this->load->view('register/index');
	// 	$this->load->view('home/footer');
	// }

	// public function aksi_register(){
	// 	$this->load->model('user_m');
	// 	$nama = $_POST['nama'];
	// 	$username = $_POST['username'];
	// 	$password = $_POST['password'];
	// 	$this->user_m->insert($nama,$username,$password);
	// 	$this->login();
	// }


}
