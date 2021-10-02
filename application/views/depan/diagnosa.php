<?php $this->load->view('depan/temp/header') ?>
<div class="container">
  <div class="jumbotron jumbotron-fluid" style="background: slateblue;">
    <div class="container">
      <h1 class="display-10">Diagnosa Tingkat Kecemasan Orang Tua Terhadap Proses PJJ Di Masa Pandemi COVID-19</h1>
      <p class="lead">Diagnosa Sekarang!</p>
    </div>
  </div>

  <div class="card">
    <div class="card-header">
      <h1 class="h4 text-gray-900">Silahkan isi form Biodata</h1>
    </div>
    <div class="card-body">
      <div class="row">
        <div class="col-lg-12">
          <div class="p-2">
            <div class="text-center">
              <form action="<?= base_url() ?>HalamanUser/simpan_pasien" method="post" class="user">
                <div class="form-group">
                  <input type="text" name="nama" class="form-control form-control-user" id="exampleInputEmail" placeholder="Masukan Nama" required>
                </div>
                <div class="form-group">
                  <input type="text" name="no_telp" class="form-control form-control-user" id="exampleInputEmail" placeholder="Masukan No Telepon" required>
                </div>
                <div class="form-group">
                  <input type="text" name="alamat" class="form-control form-control-user" id="exampleInputEmail" placeholder="Masukan Alamat" required>
                </div>
                <div class="form-group">
                  <input type="number" name="umur" class="form-control form-control-user" id="exampleInputEmail" placeholder="Masukan Umur" required>
                </div>
                <div class="form-group">
                  <!-- Default inline 1-->
                  <div class="custom-control custom-radio custom-control-inline">
                    <input type="radio" class="custom-control-input" id="defaultInline1" name="jenis_kelamin" value="Laki - Laki">
                    <label class="custom-control-label" for="defaultInline1">Laki - Laki</label>
                  </div>

                  <!-- Default inline 2-->
                  <div class="custom-control custom-radio custom-control-inline">
                    <input type="radio" class="custom-control-input" id="defaultInline2" name="jenis_kelamin" value="Perempuan">
                    <label class="custom-control-label" for="defaultInline2">Perempuan</label>
                  </div>
                </div>
                <button class="btn btn-dark btn-user btn-block" type="submit">Mulai Diagnosa</button>

              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

</div>
<br />
<?php $this->load->view('depan/temp/footer') ?>