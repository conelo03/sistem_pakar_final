 <!-- Begin Page Content -->
 <div class="container-fluid">

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
  <h1 class="h3 mb-0 text-gray-800"><?= $title; ?></h1>
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
                
                <h1 class="h4 text-gray-900 mb-4">Input Biodata</h1>
                <form action="<?= base_url() ?>home/cek" method="post" class="user">
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
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="card o-hidden border-0 shadow-lg my-5">
      <div class="card-body p-0">
        <!-- Nested Row within Card Body -->
        <div class="row">
          <div class="col-lg-12 d-none d-lg-block bg-register-image"></div>
          <div class="col-lg-12">
            <div class="p-5">
              <div class="text-center">
                <h1 class="h4 text-gray-900 mb-4">Pilih Idikator!</h1>
                <span class="text-danger"><?php if ($this->session->flashdata('error')) {echo $this->session->flashdata('error');} ?></span>
              </div>
              <!-- <form action="<?= base_url() ?>home/cek" method="post" class="user"> -->
                  
                <div class="form-group">
                    <?php 
                    $no = 0;
                    foreach($indikator as $g) { 
                      $no +=1;
                    ?>
                    
                      <?= $g['nama'] ?> <br/>
                        <div class="custom-control custom-radio custom-control-inline">
                          <input type="radio" class="custom-control-input" id="x1<?= $no ?>" name="indikator<?= $no ?>" value="<?= $g['id_gejala'] ?>" required>
                          <label class="custom-control-label" for="x1<?= $no ?>">Ya</label>
                        </div>

                        <!-- Default inline 2-->
                        <div class="custom-control custom-radio custom-control-inline">
                          <input type="radio" class="custom-control-input" id="x2<?= $no ?>" name="indikator<?= $no ?>" value="" required>
                          <label class="custom-control-label" for="x2<?= $no ?>" >Tidak</label>
                        </div>
                      <br><br>
                      
                    <?php } ?>
                    <input type="hidden" name="num" value="<?= $no ?>">
                </div>
                
                <button class="btn btn-primary btn-user btn-block" type="submit">Cek</button>
                    </form>
                
                <hr>
               
            </div>
          </div>
        </div>
      </div>
    </div>

  </div>



</div>