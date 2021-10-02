<div class="container-fluid">

  <!-- Page Heading -->
  <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
  <div class="row">
    <div class="col-lg">
      <?= $this->session->flashdata('message'); ?>


      <div class="card shadow mb-4">
        <div class="card-header py-3">
          <a href="" class="btn btn-primary" style="background: slateblue; color: white;" data-toggle="modal" data-target="#tambah"><span class="fa fa-plus"> </span> Tambah Relasi</a>
        </div>

        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-hover" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Tingkat Cemas</th>
                  <th>Indikator</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <tbody>
                <?php if ($relasi != NULL) {
                  $no = 1;
                  foreach ($relasi as $g => $value) { ?>
                    <tr>
                      <td><?= $no++ ?></td>
                      <td><?= $g ?></td>
                      <td>
                        <?php
                        foreach ($value['indikator'] as $key) {
                          echo $key . ', ';
                        }
                        ?>
                      </td>
                      <td>
                        <a class="btn btn-primary" style="background: slateblue; color: white;" data-toggle="modal" data-target="#edit<?= $value['kode_tingkat_cemas'] ?>">
                          Edit</a>
                        <a onclick="return confirm('Apakah kamu yakin akan menghapus data ini ?')" href="<?= base_url() ?>relasi/hapus_relasi/<?= $value['kode_tingkat_cemas'] ?>" class="btn btn-danger ">
                          <span class="text">Hapus</span>
                        </a>
                      </td>
                    </tr>
                  <?php }
                } else { ?>
                  <tr>
                    <td>Tidak ada data</td>
                  </tr>
                <?php } ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="tambah" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah Relasi</h5>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <form class="form-horizontal" action="<?php echo base_url() . 'relasi/aksi_tambah_relasi' ?>" method="post" enctype="multipart/form-data">
        <div class="modal-body">
          <div class="form-group">
            <select name="kode_tingkat_cemas" class="form-control " id="exampleInputEmail" placeholder="Nama">
              <?php foreach ($tingkat_cemas as $p) { ?>
                <option value="#">Pilih tingkat_cemas</option>
                <option value="<?= $p['kode_tingkat_cemas'] ?>"><?= $p['nama'] ?></option>
              <?php } ?>
            </select>
          </div>
          <div class="form-group">
            <?php foreach ($indikator as $g) { ?>
              <span class="form-control form-user" for="indikator">
                <input type="checkbox" name="indikator[]" class=" " id="exampleInputEmail" value="<?= $g['kode_indikator'] ?>"> <?= $g['nama'] ?> 
              </span> <br>
            <?php } ?>
          </div>
        </div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <button type="submit" class="btn btn-primary" id="simpan">Tambah</button>
        </div>
      </form>
    </div>
  </div>
</div> 

<?php foreach ($relasi as $r => $value) : ?>
  <div class="modal fade" id="edit<?= $value['kode_tingkat_cemas']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Edit Relasi</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <form class="form-horizontal" action="<?php echo base_url() . 'relasi/aksi_edit_relasi/' . $value['kode_tingkat_cemas']; ?>" method="post" enctype="multipart/form-data">
          <div class="modal-body">
            <div class="form-group">
              <select name="kode_tingkat_cemas" class="form-control " id="exampleInputEmail" placeholder="Nama" disabled>
                <?php
                $id_relasi    = $value['id_relasi'];
                $kode_tingkat_cemas  = $value['kode_tingkat_cemas'];
                $tingkat_cemas = $this->db->query("SELECT r.id_relasi, r.kode_indikator, r.kode_tingkat_cemas, p.nama, p.deskripsi, p.solusi FROM relasi r JOIN tingkat_kecemasan p ON r.kode_tingkat_cemas = p.kode_tingkat_cemas WHERE id_relasi = '$id_relasi'")->result_array();
                foreach ($tingkat_cemas as $p) { ?>
                  <option value="<?= $p['kode_tingkat_cemas'] ?>"><?= $p['nama'] ?></option>
                <?php } ?>
              </select>
            </div>
            <div class="form-group">
              <?php
              $indikator = $this->db->get('indikator')->result_array();

              $this->db->select('kode_indikator');
              $this->db->from('relasi');
              $this->db->join('tingkat_kecemasan', 'relasi.kode_tingkat_cemas = tingkat_kecemasan.kode_tingkat_cemas');
              $this->db->where('relasi.kode_tingkat_cemas', $kode_tingkat_cemas);
              $indikator_array = $this->db->get()->result_array();
              $gg = [];
              for ($i = 0; $i < count($indikator_array); $i++) {
                $gg[$i] = $indikator_array[$i]['kode_indikator'];
              }
              $kunci = 1;
              foreach($indikator as $g) { ?>
                  <span class="form-control form-user" for="gejala">
                    <input type="checkbox" name="indikator[]" class=" " id="exampleInputEmail" value="<?php echo $g['kode_indikator']; ?>" 
                    <?php if(in_array($g['kode_indikator'], $gg)) {echo 'checked';}  ?>> <?= $g['nama'] ?>
                  </span>  
                  <br>
              <?php $kunci++; } ?>
            </div>
          </div>
          <div class="modal-footer">
            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
            <button type="submit" class="btn btn-primary" id="simpan">Tambah</button>
          </div>
        </form>
      </div>
    </div>
  </div> 
<?php endforeach; ?> 