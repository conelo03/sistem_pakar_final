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
                    <a href="" class="btn btn-primary" style="background: slateblue; color: white;" data-toggle="modal" data-target="#tambah"><span class="fa fa-plus"> </span> Tambah Indikator</a>
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover" id="myTable">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Kode</th>
                                    <th scope="col">Nama Indikator</th>
                                    <th scope="col">Deskripsi</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if ($indikator != NULL) {
                                    $no = 1;
                                    foreach ($indikator as $g) { ?>
                                        <tr>
                                            <td scope="row"><?= $no++; ?></td>
                                            <td><?= $g['kode_indikator'] ?></td>
                                            <td><?= $g['nama'] ?></td>
                                            <td><?= $g['deskripsi'] ?></td>
                                            <td><a class="btn" style="background: slateblue; color: white;" data-toggle="modal" data-target="#edit<?= $g['kode_indikator'] ?>">
                                                    Edit</a>
                                                <a onclick="return confirm('Apakah kamu yakin akan menghapus data ini ?')" href="<?= base_url() ?>indikator/hapus_indikator/<?= $g['kode_indikator'] ?>" class="btn btn-danger ">
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
                <h5 class="modal-title" id="exampleModalLabel">Tambah Indikator</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <form class="form-horizontal" action="<?php echo base_url() . 'indikator/aksi_tambah_indikator' ?>" method="post" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="form-group">
                        <input type="text" name="kode" class="form-control form-control-user" id="exampleInputEmail" placeholder="Kode" required>
                    </div>
                    <div class="form-group">
                        <input type="text" name="nama" class="form-control form-control-user" id="exampleInputEmail" placeholder="Nama" required>
                    </div>
                    <div class="form-group">
                        <input type="text" name="deskripsi" class="form-control form-control-user" id="exampleInputEmail" placeholder="Deskripsi" required>
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
if ($indikator != NULL) {
    foreach ($indikator as $g) { ?>
        <div class="modal fade" id="edit<?= $g['kode_indikator'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Pilih Indikator</h5>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <form class="form-horizontal" action="<?php echo base_url() . 'indikator/aksi_edit_indikator/' . $g['kode_indikator'] ?>" method="post" enctype="multipart/form-data">
                        <div class="modal-body">
                            <div class="form-group">
                                Kode :
                                <input type="text" name="kode" class="form-control form-control-user" id="exampleInputEmail" value="<?= $g['kode_indikator'] ?>" required>
                            </div>
                            <div class="form-group">
                                Nama :
                                <input type="hidden" name="id" class="form-control" id="inputUserName" value="<?= $g['kode_indikator'] ?>" required>
                                <input type="text" name="nama" class="form-control form-control-user" id="exampleInputEmail" value="<?= $g['nama'] ?>" required>
                            </div>
                            <div class="form-group">
                                Deskripsi :
                                <input type="text" name="deskripsi" class="form-control form-control-user" id="exampleInputEmail" value="<?= $g['deskripsi'] ?>" required>
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