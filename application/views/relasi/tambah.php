 <!-- Begin Page Content -->
 <div class="container-fluid">

   <!-- Page Heading -->
   <div class="d-sm-flex align-items-center justify-content-between mb-4">
     <h1 class="h3 mb-0 text-gray-800">Sistem Pakar</h1>
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
                 <h1 class="h4 text-gray-900 mb-4">Tambah Relasi</h1>
                 <span class="text-danger"><?= $this->session->flashdata('error'); ?></span>
               </div>
               <form action="<?php echo base_url() ?>relasi/aksi_tambah_relasi" method="post" class="user">
                 <div class="form-group">
                   <select name="id_penyakit" class="form-control " id="exampleInputEmail" placeholder="Nama">
                     <?php foreach ($penyakit as $p) { ?>
                       <option value="#">Pilih Penyakit</option>
                       <option value="<?= $p['id_penyakit'] ?>"><?= $p['nama'] ?></option>
                     <?php } ?>
                   </select>
                 </div>
                 <div class="form-group">
                   <?php foreach ($gejala as $g) { ?>
                     <span class="form-control form-user" for="gejala">
                       <input type="checkbox" name="gejala[]" class=" " id="exampleInputEmail" value="<?= $g['id_gejala'] ?>"> <?= $g['nama'] ?> </span> <br>
                   <?php } ?>
                 </div>
                 <button type="submit" class="btn btn-primary btn-user btn-block">
                   Tambah
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