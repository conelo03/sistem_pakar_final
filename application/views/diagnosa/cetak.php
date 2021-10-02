 <!-- Begin Page Content -->
 <div class="container-fluid">

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
  </div>

<div class="container">

    <div class="card">
      <div class="card-body p-0">
        <!-- Nested Row within Card Body -->
        <div class="row">
          <div class="col-lg-12 d-none d-lg-block bg-register-image"></div>
          <div class="col-lg-12">
            <div class="p-5">
              <div class="text-center">
                <h1 class="h4 text-gray-900 mb-4">SISTEM PAKAR TINGKAT KECEMASAN</h1>
              </div>
              <div class="text-center">
                <h2 class="h4 text-gray-900 mb-4">Hasil Diagnosa</h1>
              </div>
              <form>
                <div class="form-group row">
                  <label for="staticEmail" class="col-sm-2 col-form-label">Nama</label>
                  <div class="col-sm-10">
                    <input type="text" name="nama" class="form-control form-control-user" id="exampleInputEmail" placeholder="Masukan Nama" required value="<?= $this->session->userdata('nama_pasien'); ?>" disabled>
                  </div>
                </div>
                <div class="form-group row">
                  <label for="staticEmail" class="col-sm-2 col-form-label">Jenis Kelamin</label>
                  <div class="col-sm-10">
                    <input type="text" name="nama" class="form-control form-control-user" id="exampleInputEmail" placeholder="Masukan Nama" required value="<?= $this->session->userdata('jenis_kelamin'); ?>" disabled>
                  </div>
                </div>
                <div class="form-group row">
                  <label for="staticEmail" class="col-sm-2 col-form-label">Alamat</label>
                  <div class="col-sm-10">
                    <input type="text" name="alamat" class="form-control form-control-user" id="exampleInputEmail" placeholder="Masukan Alamat" required value="<?= $this->session->userdata('alamat'); ?>" disabled>
                  </div>
                </div>
                <div class="form-group row">
                  <label for="staticEmail" class="col-sm-2 col-form-label">Umur</label>
                  <div class="col-sm-10">
                    <input type="text" name="alamat" class="form-control form-control-user" id="exampleInputEmail" placeholder="Masukan Alamat" required value="<?= $this->session->userdata('umur'); ?>" disabled>
                  </div>
                </div>
                <div class="form-group row">
                  <label for="staticEmail" class="col-sm-2 col-form-label">No. HP</label>
                  <div class="col-sm-10">
                    <input type="text" name="no_telp" class="form-control form-control-user" id="exampleInputEmail" placeholder="Masukan No Telepon" required value="<?= $this->session->userdata('no_telp'); ?>" disabled>
                  </div>
                </div>
                <div class="form-group row">
                  <label for="staticEmail" class="col-sm-2 col-form-label">Hasil Diagnosa</label>
                  <div class="col-sm-10">
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
              <div class="row">
                <div class="col-8"></div>
                <div class="col-4">
                  <div class="text-center">
                    <p class="text-gray-900">Jakarta, <?= date('d M Y', strtotime('now')); ?></p>
                    <br/>
                    <br/>
                    <br/>
                    <br/>
                    <br/>
                    <p class="text-gray-900">DOKTER</p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

  </div>



</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->
<script>
  window.print();
</script>