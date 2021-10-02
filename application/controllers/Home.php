<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
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
        $this->load->model('relasi_m');
	}
	public function index()
	{
        if (isset($this->session->gejala)) {
            unset($_SESSION['gejala']);
            var_dump($this->session->gejala);
        }
        //die();
		$data['title'] = 'Cek Diagnosa';
		$data['user'] = $this->db->get_where('admin', ['username' => $this->session->userdata('username')])->row_array();
		$data['gejala'] = $this->indikator_m->get()->result_array();

		$this->load->view('templates/header', $data);
	    $this->load->view('templates/sidebar', $data);
	    $this->load->view('templates/topbar', $data);
	    $this->load->view('home/index', $data);
	    $this->load->view('templates/footer');
	}

	public function cek(){
        if (isset($this->session->gejala)) {
            $gejala = $this->session->gejala;
        } else {
            $num = $this->input->post('num');
            $gej = array();
            for ($i=1; $i <= $num; $i++) {
                $str = 'gejala'.$i;
                if($this->input->post($str) != null){
                    $gej[] = $this->input->post($str);
                }
            }
            $gejala = $gej;
            $this->session->gejala = $gejala;
            // $gejala      = $_POST['gejala'];
        }
        
		// if () {
            
            $no          = 0;
            $i = 1;
            $n = [];
            // print_r($gejala);echo "</br>";
            for ($l=0; $l < count($gejala); $l++) { 
                $m = $this->db->get_where('gejala', [
                    'id_gejala' => $gejala[$l]
                ])->row();
                $n[$l] = $m->nama;
            }
            for ($k = 0; $k < count($gejala); $k++) {
                $this->db->select('relasi.id_penyakit, nama'); 
                $this->db->from('relasi');
                $this->db->join('penyakit', 'relasi.id_penyakit = penyakit.id_penyakit');
                $this->db->where('id_gejala', $gejala[0]);
                for ($a = 1; $a < count($gejala); $a++) {
                    $this->db->or_where('id_gejala', $gejala[$a]);    
                }
                $b = $this->db->get()->result();
                $v = [];
                $no = 0;
                for ($c=0; $c < count($b); $c++) {
                    if ($c == 0) {
                      $x = 1;
                    } else {
                      if ($b[$c]->id_penyakit == $b[$c - 1]->id_penyakit) {
                        $x = 0;
                      } else {
                        $x = 1;
                      }
                    }
                    if ($x == 1) {
                      $v[$no] = $b[$c];
                      $no++;
                    }
                }
                // print_r($v);echo "</br>";
                if (count($v) == 1) {
                    $id_penyakit = $data[0]['id_penyakit'];
                    $get_tot_gejala = $this->db->get_where('relasi', ['id_penyakit' => $id_penyakit])->num_rows();
                    $peluang = count($gejala)/$get_tot_gejala * 100;
                    $data['penyakit'] = $data;
                    $data['peluang'] = $peluang;
                } else {
                   if ($k == count($gejala) - 1) {
                        $peluang= array();
                        for ($z = 0; $z < count($v); $z++) {
                            $this->db->select('id_gejala');
                            $this->db->from('relasi');
                            $this->db->where('id_penyakit', $v[$z]->id_penyakit);
                            $d = $this->db->get()->result_array();
                            $data1 = array();
                            for ($s = 0; $s < count($d); $s++) {
                                $data1[] = $d[$s]['id_gejala'];
                            }
                            $data3 = [];
                            $q     = 0;
                            for ($l = 0; $l < count($gejala); $l++) {
                                $data2  = in_array($gejala[$l], $data1);
                                if ($data2) {
                                    $data3[$q] = $gejala[$l];
                                    $q++;
                                }
                            }
                            $peluang[$z] = count($data3) / count($data1) * 100;
                    
                        }
                        $data['penyakit']   = $v;
                        $data['peluang']    = $peluang;
                        $data['tertinggi']  = max($peluang);
                    } else {
                        $i++;    
                    } 
                }
            }
            $id_periksa = uniqid('periksa');
            for ($i=0; $i < count($data['penyakit']); $i++) {
                if (count($data['peluang']) > 1) {
                     $peluang = $data['peluang'][$i];
                 } else {
                     $peluang = $data['peluang'];
                 }
                  
                $this->db->insert('hasil', [
                    'id_periksa'    => $id_periksa,
                    'nama'          => $this->input->post('nama'),
                    'no_telp'       => $this->input->post('no_telp'),
                    'alamat'        => $this->input->post('alamat'),
                    'umur'          => $this->input->post('umur'),
                    'jenis_kelamin' => $this->input->post('jenis_kelamin'),
                    'penyakit'      => $data['penyakit'][$i]->nama,
                    'peluang'       => $peluang
                ]);    
            }      
		// } else {
		// 	$this->session->set_flashdata('error', 'silahkan pilih gejala jangan sampai kososng');
		// 	redirect(base_url('home'));
		// }
        $data['id_periksa'] = $id_periksa;
        $data['title'] = 'Hasil Diagnosa';
        $data['user'] = $this->db->get_where('admin', ['email' => $this->session->userdata('email')])->row_array();
        $data['gejala'] = $n;
		$this->load->view('templates/header', $data);
	    $this->load->view('templates/sidebar', $data);
	    $this->load->view('templates/topbar', $data);
	    $this->load->view('home/hasil', $data);
	    $this->load->view('templates/footer');
	}

    public function cok(){
        
        
        if (isset($_POST['gejala'])) {
            $gejala      = $_POST['gejala'];
//            $penyakit    = [];
            $no          = 0;
            $i = 1;
            for ($k = 0; $k < count($gejala); $k++) {
                $this->db->select('relasi.id_penyakit, nama'); 
                $this->db->from('relasi');
                $this->db->join('penyakit', 'relasi.id_penyakit = penyakit.id_penyakit');
                for ($a = 0; $a < $i; $a++) {
                    $this->db->where('id_gejala', $gejala[$k]);    
                }
                $data = $this->db->get()->result_array();
                if (count($data) == 1) {
                    $penyakit = $data[0]['nama'];
                    
                } else {
                   if ($k == count($gejala) - 1) {
//                        $penyakit = 'Gejala tidak terlalu spesifik';
                        $peluang;
                        for ($z = 0; $z < count($data); $z++) {
                            $this->db->select('id_gejala');
                            $this->db->from('relasi');
                            $this->db->where('id_penyakit', $data[$z]['id_penyakit']);
                            $d = $this->db->get()->result_array();
                            $data1 = [];
                            for ($s = 0; $s < count($d); $s++) {
                                $data1[$s] = $d[$s]['id_gejala'];
                            }
                            $data3 = [];
                            $q     = 0;
                            for ($l = 0; $l < count($gejala); $l++) {
                                $data2  = array_search($gejala[$l], $data1);
                                if ($data2) {
                                    $data3[$q] = $gejala[$l];
                                    $q++;
                                }
                            }
                            $peluang = count($data3) / count($data1) * 100;
                        }
                    } else {
                        $i++;    
                    } 
                }
            }
    
            $id_gejala = implode(',',$gejala);
            $penyakit = $this->relasi_m->get_where($id_gejala);
            $memasuki_gejala = $this->relasi_m->get_memasuki_gejala($id_gejala)->result_array();
            $data['penyakit'] = $penyakit->result_array();
            $data['memasuki_gejala'] = $memasuki_gejala;
        } else {
            $this->session->set_flashdata('error', 'silahkan pilih gejala jangan sampai kososng');
            redirect(base_url('home'));
        }
        $data['title'] = 'Hasil Diagnosa';
        $data['user'] = $this->db->get_where('admin', ['email' => $this->session->userdata('email')])->row_array();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('home/hasil', $data);
        $this->load->view('templates/footer');
    }

	
}
