<!-- Footer -->
<footer class="sticky-footer bg-white">
    <div class="container my-auto ">
        <div class="copyright text-center my-auto ">
            <span>©2021 Copyright Sistem Pakar Skripsi 2021 by Muhammad Iqbal Darmawan</span>
        </div>
        <div class="copyright text-center my-auto">
            <span></span>
        </div>
    </div>
</footer>
<!-- End of Footer -->

</div>
<!-- End of Content Wrapper -->

</div>
<!-- End of Page Wrapper -->

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>

<!-- Logout Modal-->


<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                <a class="btn btn-primary" href="<?= base_url('login/logout'); ?>">Logout</a>
            </div>
        </div>
    </div>
</div>

<!-- Page level plugins -->


<!-- Bootstrap core JavaScript-->
<script src="<?= base_url('assets/'); ?>vendor/jquery/jquery.min.js"></script>
<script src="<?= base_url('assets/'); ?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="<?= base_url('assets/'); ?>vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="<?= base_url('assets/'); ?>js/sb-admin-2.min.js"></script>
<!--<script src="<?= base_url() ?>assets/js/demo/datatables-demo.js"></script>-->
<script src="<?= base_url('assets/'); ?>vendor/datatables/jquery.dataTables.min.js"></script>
<script src="<?= base_url('assets/'); ?>vendor/datatables/dataTables.bootstrap4.min.js"></script>
<script src="<?= base_url('assets/'); ?>js/demo/datatables-demo.js"></script>
<script src="<?= base_url(); ?>assets/vendor/ckeditor/ckeditor.js"></script>

<!-- Ubah Kategori-->
<script>
    $(document).ready(function() {
        $('#myTable').DataTable();
    });
    $('.tambahKategori').on('click', function() {

        $('#newKategoriModalLabel').html('Buat Kategori');
        $('.modal-footer button[type=submit]').html(' Simpan');
    });
    $('.tampilModalUbah').on('click', function() {
        $('#newKategoriModalLabel').html('Ubah Kategori');
        $('.modal-footer button[type=submit]').html('Ubah Data');
        $('.alamatKategori form').attr('action', '<?= base_url("master/ubahkategori"); ?>');

        const id = $(this).data('id');

        $.ajax({
            url: "<?= base_url('master/ubahkategori'); ?>",
            data: {
                id: id
            },
            method: 'post',
            dataType: 'json',

            success: function(data) {
                $('#kategori').val(data.kategori);
                $('#id').val(data.id);

            }
        });
    });
</script>
<!-- Ubah Jabatan-->
<script>
    $('.tambahjabatan').on('click', function() {

        $('#newJabatanModalLabel').html('Buat Jabatan');
        $('.modal-footer button[type=submit]').html(' Simpan');
    });
    $('.tampilModalUbah').on('click', function() {
        $('#newJabatanModalLabel').html('Ubah Jabatan');
        $('.modal-footer-1 button[type=submit]').html('Ubah Data');
        $('.alamatJabatan form').attr('action', '<?= base_url("master/ubahjabatan"); ?>');

        const id = $(this).data('id');

        $.ajax({
            url: "<?= base_url('master/ubahjabatan'); ?>",
            data: {
                id: id
            },
            method: 'post',
            dataType: 'json',

            success: function(data) {
                $('#jabatan').val(data.jabatan);
                $('#id').val(data.id);

            }
        });
    });
</script>

<!-- Ubah Access Role-->
<script>
    $('.custom-file-input').on('change', function() {
        let fileName = $(this).val().split('\\').pop();
        $(this).next('.custom-file-label').addClass("selected").html(fileName);
    });



    $('.form-check-input').on('click', function() {
        const menuId = $(this).data('menu');
        const roleId = $(this).data('role');

        $.ajax({
            url: "<?= base_url('admin/changeaccess'); ?>",
            type: 'post',
            data: {
                menuId: menuId,
                roleId: roleId
            },
            success: function() {
                document.location.href = "<?= base_url('admin/roleaccess/'); ?>" + roleId;
            }
        });

    });
</script>
<!-- Ubah Tindak Lanjut Lapporan -->
<script>
    $('.tidakvalid').on('click', function() {
        $('#tindaklanjutLabel').html('Masukan Ke Daftar Tidak Valid');
        $('#text1').html('Sistem akan memasukan ke daftar tidak valid!');
        $('#text2').html('Apakah anda yakin akan memasukan laporan tersebut ke daftar tidak valid?');
        $('#status').val('3');

        const id = $(this).data('id');

        $.ajax({
            url: "<?= base_url('wbs/tindaklanjut/'); ?>",
            data: {
                id: id
            },
            method: 'post',
            dataType: 'json',

            success: function(data) {
                $('#id').val(data.id);
            }
        });
    });
    $('.tindaklanjut').on('click', function() {
        $('#tindaklanjutLabel').html('Masukan Ke Daftar Verifikasi');

        const id = $(this).data('id');

        $.ajax({
            url: "<?= base_url('wbs/tindaklanjut/'); ?>",
            data: {
                id: id
            },
            method: 'post',
            dataType: 'json',

            success: function(data) {
                // $('#nama_pelapor').val(data.nama_pelapor);
                // $('#tlp').val(data.tlp);
                // $('#email').val(data.email);
                // $('#kategori').val(data.kategori);
                // $('#nama_dilaporkan').val(data.nama_dilaporkan);
                // $('#jabatan').val(data.jabatan);
                // $('#tempat').val(data.tempat);
                // $('#kronologi').val(data.kronologi);
                // $('#bukti1').val(data.bukti1);
                // $('#bukti2').val(data.bukti2);
                // $('#bukti3').val(data.bukti3);
                // $('#tgl_kejadian').val(data.tgl_kejadian);
                // $('#tgl_pembuatan').val(data.tgl_pembuatan);
                // $('#kode').val(data.kode);
                // $('#status').val(data.status);
                $('#id').val(data.id);
            }
        });
    });
</script>

</body>

</html>