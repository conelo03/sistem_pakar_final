 <!-- Begin Page Content -->
 <div class="container-fluid">

     <!-- Page Heading -->
     <div class="d-sm-flex align-items-center justify-content-between mb-4">
     </div>

     <div class="container">
         <div class="row justify-content-center mt-5 pt-lg-5">

             <div class="col-xl-10 col-lg-12 col-md-9">

                 <div class="card o-hidden border-0 shadow-lg">
                     <div class="card-body p-lg-5 p-0">
                         <!-- Nested Row within Card Body -->
                         <div class="row">
                             <br />
                             <div class="col-lg-6 d-none d-lg-block">
                                 <br />
                                 <br />
                                 <img src="<?= base_url() ?>assets/img/admin.jpg" width="430px" />
                             </div>
                             <div class="col-lg-6">
                                 <div class="p-5">
                                     <div class="text-center mb-4">
                                         <h1 class="h4 text-gray-900">Halaman Admin</h1>
                                         <span class="text-muted">CRUD</span>
                                     </div>
                                     <?= $this->session->flashdata('pesan'); ?>
                                     <form action="<?php echo base_url() ?>Login/aksi_login" method="post" class="user">
                                         <div class="form-group">
                                             <input type="text" name="username" class="form-control form-control-user" placeholder="Username">
                                         </div>
                                         <div class="form-group">
                                             <input type="password" name="password" class="form-control form-control-user" placeholder="Password">
                                         </div>
                                         <button type="submit" class="btn btn-user btn-block" style="background: slateblue; color: white;">
                                             Login
                                         </button>
                                         <a class="btn btn-sm btn-primary btn-user btn-block" style="background: slateblue; color: white;" href="<?php echo base_url() ?>">Kembali Ke Beranda</a>
                                     </form>
                                 </div>
                             </div>
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