 <!-- Begin Page Content -->
 <div class="container-fluid">

   <!-- Page Heading -->
   <div class="d-sm-flex align-items-center justify-content-between mb-4">
     <h1 class="h3 mb-0 text-gray-800"><?= $title; ?></h1>
   </div>
   <?= $this->session->flashdata('message'); ?>

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
                 <form action="<?= base_url() ?>Diagnosa/simpan_pasien" method="post" class="user">
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
                   <button class="btn btn-user btn-block" style="background: slateblue; color: white;" type="submit">Cek</button>
                 </form>
               </div>
             </div>
           </div>
         </div>
       </div>
     </div>
   </div>



 </div>