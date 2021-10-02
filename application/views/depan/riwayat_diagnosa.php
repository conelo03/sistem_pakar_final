<?php $this->load->view('depan/temp/header') ?>
<div class="container">
  <div class="jumbotron jumbotron-fluid" style="background: slateblue;">
    <div class="container">
      <h3 class="display-10">Hasil Keseluruhan Diagnosa Tingkat Kecemasan Orang Tua Terhadap Proses PJJ Di Masa Pandemi COVID-19 Pada Website Sistem Pakar</h3>
      <p class="lead"></p>
    </div>
  </div>

  <div class="card">
    <div class="card-header">
      <h1 class="h4 text-gray-900">Laporan</h1>
    </div>
    <div class="card-body">
      <div class="row">
        <div class="col-lg-12">
          <div class="chart-pie pt-4">
            <canvas style="height: 300px" id="myPieChart"></canvas>

          </div>
          <div class="mt-4 text-center small">
            <?php
            $arr_color = ['#4e73df', '#1cc88a', '#36b9cc', '#36b9cc'];
            $get_p = $this->db->group_by('kode_tingkat_cemas')->get('hasil')->result_array();
            $i = 0;
            foreach ($get_p as $p) {
              $get_tk = $this->db->get_where('tingkat_kecemasan', ['kode_tingkat_cemas' => $p['kode_tingkat_cemas']])->row_array();
              $get_all = $this->db->get_where('hasil')->num_rows();
              $get_jml = $this->db->get_where('hasil', ['kode_tingkat_cemas' => $p['kode_tingkat_cemas']])->num_rows();

              if ($get_all == 0 || $get_jml == 0) {
                $jml = 0;
              } else {
                $jml = $get_jml / $get_all * 100;
              }


            ?>
              <span class="mr-2">
                <i class="fas fa-circle" style="color: <?= $arr_color[$i] ?>"></i> <?= $get_tk['nama'] . ' : ' . intval($jml) . '%' . ' (' . $get_jml . ')'; ?>
              </span>
            <?php $i++;
            } ?>
          </div>

        </div>
      </div>
    </div>
  </div>

</div>
<br />

<?php $this->load->view('depan/temp/footer') ?>