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
                 <h1 class="h4 text-gray-900 mb-4">Edit Gejala</h1>
               </div>
               <form action="<?php echo base_url() ?>indikator/aksi_edit_gejala/<?= $indikator[0]['id_indikator'] ?>" method="post" class="user">
                 <div class="form-group">
                   <input type="text" name="nama" class="form-control form-control-user" value="<?= $indikator[0]['nama'] ?>" id="exampleInputEmail" placeholder="Nama">
                 </div>
                 <div class="form-group">
                   <input type="text" name="deskripsi" class="form-control form-control-user" value="<?= $indikator[0]['deskripsi'] ?>" id="exampleInputEmail" placeholder="Deskripsi">
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