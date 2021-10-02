<?php $this->load->view('depan/temp/header') ?>

<body>


  <section id="selamatdatang" class="selamatdatang">
    <div class="row">
      <div class="col">
        <div class="container text-center pt-3">
          <div class="jumbotron jumbotron-fluid" style="background-color: slateblue;">
            <img src="assets/img/cemas.png" alt="" width="70%" style="border-radius: 50%;">
            <h3 class="pt-3">Selamat Datang di Website Sistem Pakar Diagnosa Tingkat Kecemasan Orang Tua Terhadap Proses Pembelajaran Jarak Jauh (PJJ) di Masa Pandemi Covid-19</h3>
            <hr class="my-4">
            <a class="btn btn-outline-dark" href="<?php echo base_url("HalamanUser/diagnosa") ?>" role="button">MULAI DIAGNOSA!</a>
          </div>
        </div>
      </div>
    </div>

  </section>
  <!-- WL -->
  <!-- <section id="profile" class="profile">
    <div class="container text-center">
      <div class="jumbotron jumbotron-fluid" style="background-color: white;">

        <h3>Apa itu tingkat kecemasan?</h3>
        <hr class="my-4">
        <a class="btn btn-outline-dark" href="<?php echo base_url("HalamanUser/tingkat_kecemasan") ?>" role="button">CEK DISINI</a>
      </div>
    </div>
  </section> -->

  <section id="tc" class="tc">
    <div class="container">
      <div class="row pb-5">
        <div class="col">
          <img src="assets/img/cemas.png" width="100%" style="border-radius: 50%;" alt="">
        </div>
        <div class="col text-center">
          <br><br><br><br><br>
          <h3>Apa itu Tingkat Kecemasan?</h3>
          <hr class="my-4">
          <a class="btn btn-outline-dark" href="<?php echo base_url("HalamanUser/tingkat_kecemasan") ?>" role="button">CEK DISINI</a>
        </div>
      </div>
    </div>

  </section>

  <section id="hsl" class="hsl">
    <div class="container" style="background: slateblue;">
      <div class="row pb-5">
        <div class="col text-center pt-5">
          <h3>Laporan yang didapat berdasarkan hasil diagnosa yang dilakukan oleh orang tua seorang anak yang melakukan proses Proses Pembelajaran Jarak Jauh di Masa Pandemi Covid-19</h3>
          <hr class="my-4">
          <a class="btn btn-outline-dark" href="<?php echo base_url("HalamanUser/riwayat_diagnosa") ?>" role="button">CEK DIAGRAM</a>
        </div>
        <div class="col pt-5">
          <img src="assets/img/cemas.png" width="100%" style="border-radius: 50%;" alt="">
        </div>
      </div>
    </div>
    </div>
    <br />
    <?php $this->load->view('depan/temp/footer') ?>