<!-- End of Main Content -->
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
    <div class="row">
        <div class="col-lg">
            <?= $this->session->flashdata('message'); ?>


            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <a href="" class="btn btn-primary" style="background: slateblue; color: white;" data-toggle="modal" data-target="#tambah"><span class="fa fa-plus"> </span> Tambah Admin</a>
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover" id="myTable">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Nama</th>
                                    <th scope="col">Username</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if ($admin != NULL) {
                                    $no = 1;
                                    foreach ($admin as $g) { ?>
                                        <tr>
                                            <td scope="row"><?= $no++; ?></td>
                                            <td><?= $g['nama'] ?></td>
                                            <td><?= $g['username'] ?></td>
                                            <td><a class="btn" style="background: slateblue; color: white;" data-toggle="modal" data-target="#edit<?= $g['id_admin'] ?>">
                                                    Edit</a>
                                                <a onclick="return confirm('Apakah kamu yakin akan menghapus data ini ?')" href="<?= base_url() ?>admin/hapus_admin/<?= $g['id_admin'] ?>" class="btn btn-danger ">
                                                    <span class="text">Hapus</span>
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
<!-- /.container-fluid -->
<div class="modal fade" id="tambah" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Admin</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <form class="form-horizontal" action="<?php echo base_url() . 'admin/aksi_tambah_admin' ?>" method="post" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="form-group">
                        <input type="text" name="nama" class="form-control form-control-user" id="exampleInputEmail" placeholder="Nama" required>
                    </div>
                    <div class="form-group">
                        <input type="text" name="username" class="form-control form-control-user" id="exampleInputEmail" placeholder="Username" required>
                    </div>
                    <div class="form-group">
                        <input type="password" name="password" class="form-control form-control-user" id="exampleInputEmail" placeholder="Password" required>
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

<?php
if ($admin != NULL) {
    foreach ($admin as $g) { ?>
        <div class="modal fade" id="edit<?= $g['id_admin'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Pilih Admin</h5>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <form class="form-horizontal" action="<?php echo base_url() . 'admin/aksi_edit_admin/' . $g['id_admin'] ?>" method="post" enctype="multipart/form-data">
                        <div class="modal-body">
                            <div class="form-group">
                                Nama :
                                <input type="text" name="nama" class="form-control form-control-user" id="exampleInputEmail" value="<?= $g['nama'] ?>" required>
                            </div>
                            <div class="form-group">
                                Username :
                                <input type="hidden" name="id" class="form-control" id="inputUserName" value="<?= $g['id_admin'] ?>" required>
                                <input type="text" name="username" class="form-control form-control-user" id="exampleInputEmail" value="<?= $g['username'] ?>" required>
                            </div>
                            <div class="form-group">
                                Password :
                                <input type="password" name="password" class="form-control form-control-user" id="exampleInputEmail" value="<?= $g['password'] ?>" required>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                            <button type="submit" class="btn btn-primary" id="simpan">Edit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    <?php }
} else { ?>
    <tr>
        <td>Tidak ada data</td>
    </tr>
<?php } ?>