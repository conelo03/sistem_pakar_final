<!-- End of Main Content -->
<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
  <div class="row">
    <div class="col-lg">
      <?= $this->session->flashdata('message'); ?>


      <div class="card shadow mb-4">
        <!-- <div class="card-header py-3">
                    <a href="" class="btn btn-primary" data-toggle="modal" data-target="#tambah"><span class="fa fa-plus"> </span> Tambah </a>
                </div> -->

        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-hover" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Nama</th>
                  <th>Alamat</th>
                  <th>Umur</th>
                  <th>No. Telp</th>
                  <th>Jenis Kelamin</th>
                  <th>Diagnosa</th>
                </tr>
              </thead>
              <tbody>
                <?php
                // print_r($riwayat);die(); 
                if ($riwayat != NULL) {
                  $no = 1;
                  for ($i = 0; $i < count($riwayat); $i++) {
                    if ($i == 0) {
                      $n = 1;
                    } else {
                      if ($riwayat[$i]->id_periksa == $riwayat[$i - 1]->id_periksa) {
                        // $i++;
                        $n = 0;
                      } else if ($riwayat[$i]->id_periksa !== $riwayat[$i - 1]->id_periksa) {
                        $n = 1;
                      }
                    }
                    if ($n == 1) { ?>
                      <tr>
                        <td><?= $no++ ?></td>
                        <td><?= $riwayat[$i]->namapasien ?></td>
                        <td><?= $riwayat[$i]->alamat ?></td>
                        <td><?= $riwayat[$i]->umur ?></td>
                        <td><?= $riwayat[$i]->no_telp ?></td>
                        <td><?= $riwayat[$i]->jenis_kelamin ?></td>
                        <td><?= $riwayat[$i]->nama ?></td>
                      </tr>
                  <?php }
                  }
                  // foreach($riwayat as $g) { 
                  //   $m = $this->db->get_where('hasil', [
                  //     'id_periksa'  => $g->id_periksa
                  //   ])->row();  
                  // }
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