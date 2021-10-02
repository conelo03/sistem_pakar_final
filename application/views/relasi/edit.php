 <!-- Begin Page Content -->
 <div class="container-fluid">

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
  <h1 class="h3 mb-0 text-gray-800">Sistem Pakar Karet</h1>
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
                <h1 class="h4 text-gray-900 mb-4">Edit Relasi</h1>
                <span class="text-danger"><?= $this->session->flashdata('error'); ?></span>
              </div>
              <form action="<?php echo base_url() ?>relasi/aksi_edit_relasi/<?= $tingkat_cemas[0]['id_tingkat_cemas'] ?>" method="post" class="user">
                <div class="form-group">
                  <select name="id_tingkat_cemas" class="form-control " id="exampleInputEmail" placeholder="Nama" disabled>
                    <?php foreach($tingkat_cemas as $p) { ?>
                    <option value="<?= $p['id_tingkat_cemas']?>"><?= $p['nama'] ?></option>
                    <?php } ?>
                  </select>  
                </div>
                <div class="form-group">
                    <?php 
                    $kunci = 1;
                    foreach($indikator as $g) { ?>
                        <span class="form-control form-user" for="indikator">
                  <input type="checkbox" name="indikator[]" class=" " id="exampleInputEmail" value="<?php echo $g['id_indikator']; ?>" <?php   if(in_array($g['id_indikator'],$gg)) {echo 'checked';}  ?>> <?= $g['nama'] ?> </span>  <br>
                    <?php $kunci++; } ?>
                </div>
                <button type="submit" class="btn btn-primary btn-user btn-block">
                  Edit
                </button>
              </form>
              <hr>
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