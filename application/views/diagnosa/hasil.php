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
                    Pertanyaan : 
                  </div>
                  <div class="form-user">
                    <?php
                      foreach ($pertanyaan as $key) {
                        $p = $this->db->get_where('indikator',['kode_indikator' => $key['pilihan']])->row_array();
                        echo "- " . $p['nama']. " ? ". ($key['jawaban'] == 'y' ? 'Ya' : 'Tidak');
                        echo "<br/>";
                      }
                    ?>
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
                      <a href="<?= base_url('Diagnosa') ?>"><button class="btn btn-primary btn-user btn-block" >Kembali</button></a><br/>
                      <a href="<?= base_url('Diagnosa/cetak/' . $this->session->userdata('id_periksa')) ?>" target="_blank"><button class="btn btn-primary btn-user btn-block" >Print</button></a>
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