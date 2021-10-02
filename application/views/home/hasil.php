 <!-- Begin Page Content -->
 <div class="container-fluid">

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
  <h1 class="h3 mb-0 text-gray-800"><?= $title; ?></h1>
  </div>

<div class="container" id="hasilDiagnosa">

    <div class="card o-hidden border-0 shadow-lg my-5">
      <div class="card-body p-0">
        <!-- Nested Row within Card Body -->
        <div class="row">
          <div class="col-lg-12 d-none d-lg-block bg-register-image"></div>
          <div class="col-lg-12">
            <div class="p-5">
              <div class="text-center">
                <h1 class="h4 text-gray-900 mb-4">Hasil Diagnosa</h1>
              </div>
              <form action="#" method="post" class="user">
                  
                <div class="form-group">
                  <div class="form-user">
                    Gejala yang dipilih : 
                  </div>
                  <div class="form-user">
                    <?php
                      foreach ($indikator as $key) {
                        echo "- " . $key;
                        echo "<br/>";
                      }
                    ?>
                  </div>tor
                        <?php 
                        if($tingkat_cemas != NULL) { ?>
                          <?php if (count($tingkat_cemas) == 1){?>
                            <div class="form-user">
                                  Kemungkinan penyakit <?= $tingkat_cemas[0]->nama; ?> = <?= round($peluang, 2) . ' %'; ?>
                              </div>
                               <div class="form-user">
                                  <?php $id_tingkat_cemas = $tingkat_cemas[0]['id_tingkat_cemas'];
                                  $get_solusi = $this->db->get_where('tingkat_cemas', ['id_tingkat_cemas' => $id_tingkat_cemas])->row_array();
                                  ?>
                                  Solusinya adalah <?= $get_solusi['solusi']?> 
                              </div>
                          <?php  } else {
                              for ($x=0;$x<count($tingkat_cemas);$x++){
                                if (round($peluang[$x], 2) == round($tertinggi, 2)) { ?>
                                  <div class="card text-white bg-success mb-3">
                                    <div class="card-body">
                                      <div class="form-user">
                                        Kemungkinan tertinggi adalah penyakit <?= $tingkat_cemas[$x]->nama; ?> = <?= round($peluang[$x], 2) . ' %'; ?>
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
                                    Kemungkinan penyakit <?= $tingkat_cemas[$x]->nama; ?> = <?= round($peluang[$x], 2) . ' %'; ?>
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
                      <?php  } else { ?>
                        <div class=" form-user">
                                Penyakit tidak diketahui karena gejala belum spesifik<br>
                     <?php }
                        ?>
                   
                </div>
                
                
                      </form>
                      <a href="<?= base_url('Home') ?>"><button class="btn btn-primary btn-user btn-block" >Kembali</button></a><br/>
                      <a href="<?= base_url('cetak/print/' . $id_periksa) ?>" target="_blank"><button class="btn btn-primary btn-user btn-block" >Print</button></a>
                      <!-- <button class="btn btn-primary btn-user btn-block" onClick="print()">Print</button> -->
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
<!-- <script type="text/javascript">
  function print() {
    print = $('#hasilDiagnosa').html();
    document.body.innerHTML = print;
    window.print();
  }
</script> -->