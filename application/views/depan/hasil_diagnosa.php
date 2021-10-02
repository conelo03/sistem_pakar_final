<?php $this->load->view('depan/temp/header') ?>
<div class="container">
  <div class="jumbotron jumbotron-fluid" style="background: slateblue;">
    <div class="container">
      <h1 class="display-10">Hasil Diagnosa Tingkat Kecemasan Orang Tua Terhadap Proses PJJ Di Masa Pandemi COVID-19</h1>
      <p class="lead">Perhatikan hasil diagnosa dibawah!</p>
    </div>
  </div>

  <div class="card">
    <div class="card-header">
      <h3 class="h4 text-gray-900">Hasil Diagnosa</h3>
    </div>
    <div class="card-body">
      <div class="row">
        <div class="col-lg-12">
          <div class="p-2">
            <form action="#" method="post" class="user">

              <div class="form-group">
                <div class="form-user">
                  Pertanyaan :
                </div>
                <div class="form-user">
                  <?php
                  foreach ($pertanyaan as $key) {
                    $p = $this->db->get_where('indikator', ['kode_indikator' => $key['pilihan']])->row_array();
                    echo "- " . $p['nama'] . " ? " . ($key['jawaban'] == 'y' ? 'Ya' : 'Tidak');
                    echo "<br/>";
                  }
                  ?>
                </div>


              </div>

              <div class="form-group">
                <div class="form-user">
                  Diagnosa :
                </div>
                <div class="form-user">
                  <?= $tingkat_cemas['nama'] ?>
                </div>
              </div>
              <div class="form-group">
                <div class="form-user">
                  Solusi :
                </div>
                <div class="form-user">
                  <?= $tingkat_cemas['solusi'] ?>
                </div>

              </div>


            </form>
            <a href="<?php echo base_url() ?>"><button class="btn  btn-user btn-block" style="background: slateblue; color:white">Kembali</button></a><br />
            <a href="<?= base_url('HalamanUser/cetak_diagnosa/' . $this->session->userdata('id_periksa')) ?>" target="_blank"><button class="btn  btn-user btn-block" style="background: slateblue; color:white">Print</button></a>
            <!-- <button class="btn btn-primary btn-user btn-block" onClick="print()">Print</button> -->
            <hr>

          </div>
        </div>
      </div>
    </div>
  </div>

</div>
<br />
<?php $this->load->view('depan/temp/footer') ?>