<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
  <link rel="stylesheet" href="<?= base_url(); ?>assets/plugins/fontawesome-free/css/all.min.css">
  <link href="<?= base_url('assets/'); ?>vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="<?= base_url('assets/'); ?>vendor/font-awesome/css/font-awesome.css" rel="stylesheet" type="text/css">
  <link href="<?= base_url('assets/'); ?>vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">


  <title>Sistem Pakar</title>
</head>

<body class="bg-light">
  <!-- Begin Page Content -->
  <div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
    </div>

    <div class="container">

      <div class="card">
        <div class="card-body p-0">
          <!-- Nested Row within Card Body -->
          <div class="row">
            <div class="col-lg-12 d-none d-lg-block bg-register-image"></div>
            <div class="col-lg-12">
              <div class="p-5">
                <div class="text-center">
                  <h1 class="h4 text-gray-900 mb-4">SISTEM PAKAR TINGKAT KECEMASAN</h1>
                </div>
                <div class="text-center">
                  <h2 class="h4 text-gray-900 mb-4">Hasil Diagnosa</h1>
                </div>
                <form>
                  <div class="form-group row">
                    <label for="staticEmail" class="col-sm-2 col-form-label">Nama</label>
                    <div class="col-sm-10">
                      <input type="text" name="nama" class="form-control form-control-user" id="exampleInputEmail" placeholder="Masukan Nama" required value="<?= $pasien['nama']; ?>" disabled>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="staticEmail" class="col-sm-2 col-form-label">Jenis Kelamin</label>
                    <div class="col-sm-10">
                      <input type="text" name="nama" class="form-control form-control-user" id="exampleInputEmail" placeholder="Masukan Nama" required value="<?= $pasien['jenis_kelamin']; ?>" disabled>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="staticEmail" class="col-sm-2 col-form-label">Alamat</label>
                    <div class="col-sm-10">
                      <input type="text" name="alamat" class="form-control form-control-user" id="exampleInputEmail" placeholder="Masukan Alamat" required value="<?= $pasien['alamat']; ?>" disabled>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="staticEmail" class="col-sm-2 col-form-label">Umur</label>
                    <div class="col-sm-10">
                      <input type="text" name="alamat" class="form-control form-control-user" id="exampleInputEmail" placeholder="Masukan Alamat" required value="<?= $pasien['umur']; ?>" disabled>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="staticEmail" class="col-sm-2 col-form-label">No. HP</label>
                    <div class="col-sm-10">
                      <input type="text" name="no_telp" class="form-control form-control-user" id="exampleInputEmail" placeholder="Masukan No Telepon" required value="<?= $pasien['no_telp']; ?>" disabled>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="staticEmail" class="col-sm-2 col-form-label">Hasil Diagnosa</label>
                    <div class="col-sm-10">
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
                <div class="row">
                  <div class="col-8"></div>
                  <div class="col-4">
                    <div class="text-center">
                      <p class="text-gray-900">Bekasi, <?= date('d M Y', strtotime('now')); ?></p>
                      <br />
                      <br />
                      <br />
                      <br />
                      <br />
                      <p class="text-gray-900">Dr.Sulistyaningsih </p>
                    </div>
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
  <script>
    window.print();
  </script>
  <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>

</html>