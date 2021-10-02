<?php $this->load->view('depan/temp/header') ?>
<div class="container">
  <div class="jumbotron jumbotron-fluid" style="background: slateblue;">
    <div class="container">
      <h1 class="display-10">Tingkat Kecemasan</h1>
      <p class="display-10">Tingkat Kecemasan Orang Tua Terhadap Proses PJJ Di Masa Pandemi COVID-19</p>
    </div>
  </div>
  <?php foreach ($tingkat_cemas as $key) { ?>
    <div class="card">
      <div class="card-header" style="background-color: slateblue;">
        <b><?= $key['nama'] ?></b>
      </div>
      <div class="card-body">
        <b>Definisi :</b> <br />
        <?= $key['deskripsi'] ?>
      </div>
      <div class="card-body">
        <b>Solusi :</b> <br />
        <?= $key['solusi'] ?>
      </div>
    </div>
  <?php } ?>

</div>
<br />
<?php $this->load->view('depan/temp/footer') ?>