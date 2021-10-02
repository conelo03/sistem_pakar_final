 <!-- Begin Page Content -->
 <div class="container-fluid">

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
  </div>

<div class="container">

    <div class="card o-hidden border-0 shadow-lg my-5">
      <div class="card-body p-0">
        <!-- Nested Row within Card Body -->
        <div class="row">
          <div class="col-lg-12 d-none d-lg-block bg-register-image"></div>
          <div class="col-lg-12">
            <div class="p-5">
              <div class="text-center">
                <h1 class="h4 text-gray-900 mb-4">SISTEM PAKAR JANTUNG</h1>
              </div>
              <div class="text-center">
                <h2 class="h4 text-gray-900 mb-4">Hasil Diagnosa</h1>
              </div>
              <form>
                <div class="form-group row">
                  <label for="staticEmail" class="col-sm-2 col-form-label">Nama</label>
                  <div class="col-sm-10">
                    <input type="text" name="nama" class="form-control form-control-user" id="exampleInputEmail" placeholder="Masukan Nama" required value="<?= $tingkat_cemas[0]->nama_pasien; ?>" disabled>
                  </div>
                </div>
                <div class="form-group row">
                  <label for="staticEmail" class="col-sm-2 col-form-label">Jenis Kelamin</label>
                  <div class="col-sm-10">
                    <input type="text" name="nama" class="form-control form-control-user" id="exampleInputEmail" placeholder="Masukan Nama" required value="<?= $tingkat_cemas[0]->jenis_kelamin; ?>" disabled>
                  </div>
                </div>
                <div class="form-group row">
                  <label for="staticEmail" class="col-sm-2 col-form-label">Alamat</label>
                  <div class="col-sm-10">
                    <input type="text" name="alamat" class="form-control form-control-user" id="exampleInputEmail" placeholder="Masukan Alamat" required value="<?= $tingkat_cemas[0]->alamat; ?>" disabled>
                  </div>
                </div>
                <div class="form-group row">
                  <label for="staticEmail" class="col-sm-2 col-form-label">Umur</label>
                  <div class="col-sm-10">
                    <input type="text" name="alamat" class="form-control form-control-user" id="exampleInputEmail" placeholder="Masukan Alamat" required value="<?= $tingkat_cemas[0]->umur; ?>" disabled>
                  </div>
                </div>
                <div class="form-group row">
                  <label for="staticEmail" class="col-sm-2 col-form-label">No. HP</label>
                  <div class="col-sm-10">
                    <input type="text" name="no_telp" class="form-control form-control-user" id="exampleInputEmail" placeholder="Masukan No Telepon" required value="<?= $tingkat_cemas[0]->no_telp; ?>" disabled>
                  </div>
                </div>
                <div class="form-group row">
                  <label for="staticEmail" class="col-sm-2 col-form-label">Hasil Diagnosa</label>
                  <div class="col-sm-10">
                  </div>
                </div>
                <div class="form-group">
                  <?php 
                    if (count($tingkat_cemas) == 1){?>
                      <div class="card text-white bg-success mb-3">
                        <div class="card-body">
                          <div class="form-user">
                            Kemungkinan tingkat_cemas <?= $tingkat_cemas[0]->nama; ?> = <?= round($peluang, 2) . ' %'; ?>
                          </div>
                           <div class="form-user">
                              <?php $id_tingkat_cemas = $tingkat_cemas[0]['id_tingkat_cemas'];
                              $get_solusi = $this->db->get_where('tingkat_cemas', ['id_tingkat_cemas' => $id_tingkat_cemas])->row_array();
                              ?>
                              Solusinya adalah <?= $get_solusi['solusi']?> 
                          </div>
                        </div>
                      </div>
                  <?php 
                  } else {
                    for ($x=0;$x < count($tingkat_cemas);$x++){
                      if (round($tingkat_cemas[$x]->peluang, 2) == round($tingkat_cemas[0]->peluang, 2)) { 
                  ?>
                        <div class="card text-white bg-success mb-3">
                          <div class="card-body">
                            <div class="form-user">
                              Kemungkinan tertinggi adalah tingkat_cemas <?= $tingkat_cemas[$x]->tingkat_cemas; ?> = <?= round($tingkat_cemas[$x]->peluang, 2) . ' %'; ?>
                            </div>
                            <div class="form-user">
                                <?php $id_tingkat_cemas = $tingkat_cemas[$x]->id_tingkat_cemas;
                                $get_solusi = $this->db->get_where('tingkat_cemas', ['id_tingkat_cemas' => $id_tingkat_cemas])->row_array();
                                ?>
                                Solusinya adalah <?= $get_solusi['solusi']?> 
                            </div>
                          </div>
                        </div>
                        <?php } else { ?>
                          <div class="form-user">
                            Kemungkinan tingkat_cemas <?= $tingkat_cemas[$x]->nama; ?> = <?= round($tingkat_cemas[$x]->peluang, 2) . ' %'; ?>
                          </div>
                          <div class="form-user">
                              <?php $id_tingkat_cemas = $tingkat_cemas[$x]->id_tingkat_cemas;
                              $get_solusi = $this->db->get_where('tingkat_cemas', ['id_tingkat_cemas' => $id_tingkat_cemas])->row_array();
                              ?>
                              Solusinya adalah <?= $get_solusi['solusi']?> 
                          </div>
                        <?php }
                      ?>
                      <br/>
                    <?php } ?>
                  <?php }?>
                </div>
              </form>
              <div class="row">
                <div class="col-8"></div>
                <div class="col-4">
                  <div class="text-center">
                    <p class="text-gray-900">Sumedang, <?= date('d M Y', strtotime('now')); ?></p>
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