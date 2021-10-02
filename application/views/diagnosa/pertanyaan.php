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
                
                <h1 class="h4 text-gray-900 mb-4">Indikator</h1>
                <form action="#" method="post" class="user">
                <div class="form-group">
                  <input type="hidden" name="id_periksa" class="form-control form-control-user" id="exampleInputEmail" placeholder="Masukan Nama" value="<?= $this->session->userdata('id_periksa'); ?>" required>
                </div>
                <?= $indikator[$index]['nama'] ?>
                <?php 
                $index_pars = $index+1;
                ?>
                <br/>
                <br/>
                <div class="row">
                  <div class="col-md-6">
                    <a href="<?= base_url('Diagnosa/cek/y/'.$indikator[$index]['kode_indikator'].'/'.$index_pars) ?>" class="btn btn-primary btn-user btn-block" style="color: white">Ya</a>
                  </div>
                  <div class="col-md-6">
                    <a href="<?= base_url('Diagnosa/cek/n/'.$indikator[$index]['kode_indikator'].'/'.$index_pars) ?>" class="btn btn-danger btn-user btn-block" style="color: white">Tidak</a>
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



</div>