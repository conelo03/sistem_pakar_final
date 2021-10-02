<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Diagnosa extends CI_Controller {
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
        $this->db->query("DELETE from rule_temp");

        $this->session->unset_userdata('id_periksa');  
        $this->session->unset_userdata('nama_pasien'); 
        $this->session->unset_userdata('no_telp'); 
        $this->session->unset_userdata('alamat'); 
        $this->session->unset_userdata('umur'); 
        $this->session->unset_userdata('jenis_kelamin'); 
        $this->session->unset_userdata('kode_tingkat_cemas'); 
        //die();
		$data['title'] = 'Uji Coba Diagnosa';
		$data['user'] = $this->db->get_where('admin', ['username' => $this->session->userdata('username')])->row_array();

		$this->load->view('templates/header', $data);
	    $this->load->view('templates/sidebar', $data);
	    $this->load->view('templates/topbar', $data);
	    $this->load->view('diagnosa/index', $data);
	    $this->load->view('templates/footer');
	}

	public function simpan_pasien(){

        $id_periksa = uniqid('periksa');
        $data['title'] = 'Uji Coba Diagnosa';
        $data['user'] = $this->db->get_where('admin', ['username' => $this->session->userdata('username')])->row_array();
        
        $sesi_uji_coba = array(
            'id_periksa'    => $id_periksa,
            'nama_pasien'          => $this->input->post('nama'),
            'no_telp'       => $this->input->post('no_telp'),
            'alamat'        => $this->input->post('alamat'),
            'umur'          => $this->input->post('umur'),
            'jenis_kelamin' => $this->input->post('jenis_kelamin'),
        );

        $this->session->set_userdata($sesi_uji_coba);  
		redirect('Diagnosa/cek');
	}

    public function cek($jawaban = null, $id= null, $index = 0){
        $data['title'] = 'Uji Coba Diagnosa';
        $data['user'] = $this->db->get_where('admin', ['username' => $this->session->userdata('username')])->row_array();

        if(is_null($jawaban) && is_null($id)){
            $data['indikator'] = $this->db->get('indikator')->result_array();
            $data['index'] = 0;
        } else {
            $cek = $this->db->get_where('rule_temp', ['pilihan' => $id])->num_rows();
            if($cek == 0){
                $this->db->insert('rule_temp', [
                    'id_periksa'    => $this->session->userdata('id_periksa'),
                    'pilihan'          => $id,
                    'jawaban'       => $jawaban
                ]); 
            }
            $data['index'] = $index;
            $data['indikator'] = $this->db->get('indikator')->result_array();
            if(empty($data['indikator'][$index])){
                redirect('Diagnosa/hasil');
            } 
        }

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('diagnosa/pertanyaan', $data);
        $this->load->view('templates/footer');
    }

    public function hasil(){
        $data['title'] = 'Hasil Diagnosa';
        $data['user'] = $this->db->get_where('admin', ['username' => $this->session->userdata('username')])->row_array();
        $data['pertanyaan'] = $this->db->get('rule_temp')->result_array(); 

        if(empty($data['pertanyaan'])){
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert" >Belum ada diagnosa! Silahkan input data baru.<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
            redirect('Diagnosa');
        }

        $id_periksa = $this->session->userdata('id_periksa');
        $rule = $this->db->get_where('rule_temp',[ 'id_periksa' => $id_periksa, 'jawaban' => 'y'])->result_array();

        $gej = array();
        foreach ($rule as $key) {
            $gej[] = $key['pilihan'];
        }

        $indikator = $gej;

        $no  = 0;
        $i = 1;
        $n = [];
        // print_r($indikator);echo "</br>";
        for ($l=0; $l < count($indikator); $l++) { 
            $m = $this->db->get_where('indikator', [
                'kode_indikator' => $indikator[$l]
            ])->row();
            $n[$l] = $m->nama;
        }
        for ($k = 0; $k < count($indikator); $k++) {
            $this->db->select('relasi.kode_tingkat_cemas, nama'); 
            $this->db->from('relasi');
            $this->db->join('tingkat_kecemasan', 'relasi.kode_tingkat_cemas = tingkat_kecemasan.kode_tingkat_cemas');
            $this->db->where('kode_indikator', $indikator[0]);
            for ($a = 1; $a < count($indikator); $a++) {
                $this->db->or_where('kode_indikator', $indikator[$a]);    
            }
            $b = $this->db->get()->result();
            $v = [];
            $no = 0;
            for ($c=0; $c < count($b); $c++) {
                if ($c == 0) {
                  $x = 1;
                } else {
                  if ($b[$c]->kode_tingkat_cemas == $b[$c - 1]->kode_tingkat_cemas) {
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
                $kode_tingkat_cemas = $b[0]->kode_tingkat_cemas;
                //var_dump($kode_tingkat_cemas);
                
                $get_tot_indikator = $this->db->get_where('relasi', ['kode_tingkat_cemas' => $kode_tingkat_cemas])->num_rows();
                //$peluang = count($indikator)/$get_tot_indikator * 100;
                $peluang = count($indikator);
                $data['tingkat_cemas'] = $v;
                $data['peluang'] = $peluang;
            } else {
               if ($k == count($indikator) - 1) {
                    $peluang= array();
                    for ($z = 0; $z < count($v); $z++) {
                        $this->db->select('kode_indikator');
                        $this->db->from('relasi');
                        $this->db->where('kode_tingkat_cemas', $v[$z]->kode_tingkat_cemas);
                        $d = $this->db->get()->result_array();
                        $data1 = array();
                        for ($s = 0; $s < count($d); $s++) {
                            $data1[] = $d[$s]['kode_indikator'];
                        }
                        $data3 = [];
                        $q     = 0;
                        for ($l = 0; $l < count($indikator); $l++) {
                            $data2  = in_array($indikator[$l], $data1);
                            if ($data2) {
                                $data3[$q] = $indikator[$l];
                                $q++;
                            }
                        }
                        //$peluang[$z] = count($data3) / count($data1) * 100;
                        $peluang[$z] = count($data3);
                
                    }
                    $data['tingkat_cemas']   = $v;
                    $data['peluang']    = $peluang;
                    $data['tertinggi']  = max($peluang);
                } else {
                    $i++;    
                } 
            }
        }

        $tingkat_cemas_terpilih = array();
        $peluang_terpilih = array();
        for ($i=0; $i < count($data['tingkat_cemas']); $i++) {
            if (is_array($data['peluang'])) {
                 $peluang = $data['peluang'][$i];
                 
             } else {
                 $peluang = $data['peluang'];
             }
             $peluang_terpilih[] = $peluang;
            $tingkat_cemas_terpilih[] = $data['tingkat_cemas'][$i]->kode_tingkat_cemas; 
        }     

        $max_peluang = max($peluang_terpilih);
        $index = array_search($max_peluang, $peluang_terpilih);
        $id_periksa = $this->session->userdata('id_periksa');
        $kode_tingkat_cemas = $tingkat_cemas_terpilih[$index];
        $cek_id = $this->db->get_where('hasil', ['id_periksa' => $id_periksa])->num_rows();

        if($cek_id == 0){
            $hasil_uji_coba = array(
                'kode_tingkat_cemas' => $kode_tingkat_cemas,
            );

            $this->session->set_userdata($hasil_uji_coba); 
        }
        $data['tingkat_cemas'] = $this->db->get_where('tingkat_kecemasan', ['kode_tingkat_cemas' => $kode_tingkat_cemas])->row_array(); 

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('diagnosa/hasil', $data);
        $this->load->view('templates/footer');
    }

    public function cetak($id_periksa = null){
        if($id_periksa == null){
            $id_periksa = $this->session->userdata('id_periksa');
        }
        //$data['pasien'] = $this->db->get_where('pasien', ['id_periksa' => $id_periksa])->row_array();
        $data['title'] = 'Hasil Diagnosa';
        $data['user'] = $this->db->get_where('admin', ['username' => $this->session->userdata('username')])->row_array();
        $data['pertanyaan'] = $this->db->get('rule_temp')->result_array(); 

        if(empty($data['pertanyaan'])){
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert" >Belum ada diagnosa! Silahkan input data baru.<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
            redirect('Diagnosa');
        }

        $id_periksa = $this->session->userdata('id_periksa');
        $rule = $this->db->get_where('rule_temp',[ 'id_periksa' => $id_periksa, 'jawaban' => 'y'])->result_array();

        $gej = array();
        foreach ($rule as $key) {
            $gej[] = $key['pilihan'];
        }

        $indikator = $gej;

        $no  = 0;
        $i = 1;
        $n = [];
        // print_r($indikator);echo "</br>";
        for ($l=0; $l < count($indikator); $l++) { 
            $m = $this->db->get_where('indikator', [
                'kode_indikator' => $indikator[$l]
            ])->row();
            $n[$l] = $m->nama;
        }
        for ($k = 0; $k < count($indikator); $k++) {
            $this->db->select('relasi.kode_tingkat_cemas, nama'); 
            $this->db->from('relasi');
            $this->db->join('tingkat_kecemasan', 'relasi.kode_tingkat_cemas = tingkat_kecemasan.kode_tingkat_cemas');
            $this->db->where('kode_indikator', $indikator[0]);
            for ($a = 1; $a < count($indikator); $a++) {
                $this->db->or_where('kode_indikator', $indikator[$a]);    
            }
            $b = $this->db->get()->result();
            $v = [];
            $no = 0;
            for ($c=0; $c < count($b); $c++) {
                if ($c == 0) {
                  $x = 1;
                } else {
                  if ($b[$c]->kode_tingkat_cemas == $b[$c - 1]->kode_tingkat_cemas) {
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
                $kode_tingkat_cemas = $b[0]->kode_tingkat_cemas;
                var_dump($kode_tingkat_cemas);
                
                $get_tot_indikator = $this->db->get_where('relasi', ['kode_tingkat_cemas' => $kode_tingkat_cemas])->num_rows();
                //$peluang = count($indikator)/$get_tot_indikator * 100;
                $peluang = count($indikator);
                $data['tingkat_cemas'] = $v;
                $data['peluang'] = $peluang;
            } else {
               if ($k == count($indikator) - 1) {
                    $peluang= array();
                    for ($z = 0; $z < count($v); $z++) {
                        $this->db->select('kode_indikator');
                        $this->db->from('relasi');
                        $this->db->where('kode_tingkat_cemas', $v[$z]->kode_tingkat_cemas);
                        $d = $this->db->get()->result_array();
                        $data1 = array();
                        for ($s = 0; $s < count($d); $s++) {
                            $data1[] = $d[$s]['kode_indikator'];
                        }
                        $data3 = [];
                        $q     = 0;
                        for ($l = 0; $l < count($indikator); $l++) {
                            $data2  = in_array($indikator[$l], $data1);
                            if ($data2) {
                                $data3[$q] = $indikator[$l];
                                $q++;
                            }
                        }
                        //$peluang[$z] = count($data3) / count($data1) * 100;
                        $peluang[$z] = count($data3);
                
                    }
                    $data['tingkat_cemas']   = $v;
                    $data['peluang']    = $peluang;
                    $data['tertinggi']  = max($peluang);
                } else {
                    $i++;    
                } 
            }
        }

        $tingkat_cemas_terpilih = array();
        $peluang_terpilih = array();
        for ($i=0; $i < count($data['tingkat_cemas']); $i++) {
            if (is_array($data['peluang'])) {
                 $peluang = $data['peluang'][$i];
                 
             } else {
                 $peluang = $data['peluang'];
                 
             }
             $peluang_terpilih[] = $peluang;
            $tingkat_cemas_terpilih[] = $data['tingkat_cemas'][$i]->kode_tingkat_cemas; 
        }     

        $max_peluang = max($peluang_terpilih);
        $index = array_search($max_peluang, $peluang_terpilih);
        $id_periksa = $this->session->userdata('id_periksa');
        $kode_tingkat_cemas = $tingkat_cemas_terpilih[$index];
        $cek_id = $this->db->get_where('hasil', ['id_periksa' => $id_periksa])->num_rows();
        if($cek_id == 0){
           $hasil_uji_coba = array(
                'kode_tingkat_cemas' => $kode_tingkat_cemas,
            );

            $this->session->set_userdata($hasil_uji_coba); 
        }
        $data['tingkat_cemas'] = $this->db->get_where('tingkat_kecemasan', ['kode_tingkat_cemas' => $kode_tingkat_cemas])->row_array(); 

        $this->load->view('templates/header', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('diagnosa/cetak', $data);
        
    }
	
}
