<?php $this->load->view('depan/temp/header') ?>
<div class="container">
  <div class="jumbotron jumbotron-fluid" style="background: slateblue;">
    <div class="container">
      <h1 class="display-4"><b>Konsultasi</b></h1>
      <p class="lead">Jawablah pertanyaan dibawah ini sesuai dengan yang anda rasakan dan alami dan jawablah dengan konsisten. Pertanyaan beberapa memiliki kemiripan.</p>
    </div>
  </div>

  <div class="card">
    <div class="card-header">
      <h1 class="h4 text-gray-900">Indikator</h1>
    </div>
    <div class="card-body">
      <div class="row">
        <div class="col-lg-12">
          <div class="p-2">
            <div class="text-center">


              <form action="#" method="post" class="user">
                <div class="form-group">
                  <input type="hidden" name="id_periksa" class="form-control form-control-user" id="exampleInputEmail" placeholder="Masukan Nama" value="<?= $this->session->userdata('id_periksa'); ?>" required>
                </div>
                <p>Apakah ada <?= $indikator[$index]['nama'] ?>?</p>
                <?php
                $index_pars = $index + 1;
                ?>
                <br />
                <br />
                <div class="row">
                  <div class="col-md-6">
                    <a href="<?= base_url('HalamanUser/cek_diagnosa/y/' . $indikator[$index]['kode_indikator'] . '/' . $index_pars) ?>" class="btn btn-primary btn-user btn-block" style="background: slateblue; color: white">Ya</a>
                  </div>
                  <div class="col-md-6">
                    <a href="<?= base_url('HalamanUser/cek_diagnosa/n/' . $indikator[$index]['kode_indikator'] . '/' . $index_pars) ?>" class="btn btn-danger btn-user btn-block" style="color: white">Tidak</a>
                  </div>
                </div>

              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

</div>
<br />
<?php $this->load->view('depan/temp/newfooter') ?>