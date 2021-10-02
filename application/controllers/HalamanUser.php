<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class HalamanUser extends CI_Controller {

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

    function __construct()
    {
        parent::__construct();
        $this->load->model('tingkat_cemas_m');
    }


	public function index()
	{
		$data['title'] = 'Beranda';
		$this->load->view('depan/beranda', $data);
	}

	public function tingkat_kecemasan()
	{
		$data['title'] = 'Tingkat Kecemasan';
        $tingkat_cemas = $this->tingkat_cemas_m->get();
        if ($tingkat_cemas->num_rows() > 0) {
            $tingkat_cemas = $tingkat_cemas->result_array();
            $data['tingkat_cemas'] = $tingkat_cemas;
        } else {
            $data['tingkat_cemas'] = NULL;
        }
		$this->load->view('depan/tingkat_kecemasan', $data);
	}

	public function diagnosa()
	{
		$this->db->query("DELETE from rule_temp");
        $this->session->unset_userdata('id_periksa');
		$data['title'] = 'Dianosa';
		$this->load->view('depan/diagnosa', $data);
	}

	public function simpan_pasien(){

        $id_periksa = uniqid('periksa');
        $data['title'] = 'Cek Diagnosa';
   
        $this->db->insert('pasien', [
            'id_periksa'    => $id_periksa,
            'nama'          => $this->input->post('nama'),
            'no_telp'       => $this->input->post('no_telp'),
            'alamat'        => $this->input->post('alamat'),
            'umur'          => $this->input->post('umur'),
            'jenis_kelamin' => $this->input->post('jenis_kelamin'),
        ]); 

        $this->session->set_userdata('id_periksa', $id_periksa);  
		redirect('HalamanUser/cek_diagnosa');
	}

	public function cek_diagnosa($jawaban = null, $id= null, $index = 0){
        $data['title'] = 'Cek Diagnosa';

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
                redirect('HalamanUser/hasil_diagnosa');
            } 
        }

        $this->load->view('depan/pertanyaan', $data);
    }

    public function hasil_diagnosa(){
        $data['title'] = 'Hasil Diagnosa';
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
            $this->db->insert('hasil', [
                'id_periksa'    => $id_periksa,
                'kode_tingkat_cemas' => $kode_tingkat_cemas,
            ]); 
        }
        $data['tingkat_cemas'] = $this->db->get_where('tingkat_kecemasan', ['kode_tingkat_cemas' => $kode_tingkat_cemas])->row_array(); 

        $this->load->view('depan/hasil_diagnosa', $data);
    }

    public function cetak_diagnosa($id_periksa = null){
        if($id_periksa == null){
            $id_periksa = $this->session->userdata('id_periksa');
        }
        $data['pasien'] = $this->db->get_where('pasien', ['id_periksa' => $id_periksa])->row_array();
        $data['title'] = 'Hasil Diagnosa';
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
            $this->db->insert('hasil', [
                'id_periksa'    => $id_periksa,
                'kode_tingkat_cemas' => $kode_tingkat_cemas,
            ]); 
        }
        $data['tingkat_cemas'] = $this->db->get_where('tingkat_kecemasan', ['kode_tingkat_cemas' => $kode_tingkat_cemas])->row_array(); 

        $this->load->view('depan/cetak_diagnosa', $data);
        
    }

    public function riwayat_diagnosa()
	{
		$data['title'] = 'Riwayat Diagnosa';
		$this->load->view('depan/riwayat_diagnosa', $data);
	}
}
