<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title><?=$title;?></title>

    <link rel="icon" href="<?= Base_url('assets/public/');?>img/favicon1.png">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="<?= Base_url('assets/public/');?>css/bootstrap.min.css">
    <!-- animate CSS -->
    <link rel="stylesheet" href="<?= Base_url('assets/public/');?>css/animate.css">
    <!-- owl carousel CSS -->
    <link rel="stylesheet" href="<?= Base_url('assets/public/');?>css/owl.carousel.min.css">
    <!-- themify CSS -->
    <link rel="stylesheet" href="<?= Base_url('assets/public/');?>css/themify-icons.css">
    <!-- flaticon CSS -->
    <link rel="stylesheet" href="<?= Base_url('assets/public/');?>css/flaticon.css">
    <!-- font awesome CSS -->
    <link rel="stylesheet" href="<?= Base_url('assets/public/');?>css/magnific-popup.css">
    <!-- swiper CSS -->
    <link rel="stylesheet" href="<?= Base_url('assets/public/');?>css/slick.css">
    <!-- style CSS -->
    <link rel="stylesheet" href="<?= Base_url('assets/public/');?>css/style.css">
    <link rel="stylesheet" href="<?= Base_url('assets/vendor/');?>datatables/dataTables.bootstrap4.css">
</head>

<body>
    <!--::header part start::-->
    <header class="main_menu home_menu">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-12">
                    <nav class="navbar navbar-expand-lg navbar-light">
                        <a class="navbar-brand" href="<?= Base_url('#');?>"> <img src="<?= Base_url('assets/public/');?>img/logo6.png" alt="logo"> </a>
                        <button class="navbar-toggler" type="button" data-toggle="collapse"
                            data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                            aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>

                        <div class="collapse navbar-collapse main-menu-item justify-content-end"
                            id="navbarSupportedContent">
                            <ul class="navbar-nav align-items-center">
                                <li class="nav-item active">
                                    <a class="nav-link" href="<?= Base_url('home');?>">Home</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="<?= Base_url('home/tentang');?>">Tentang WBS</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="<?= Base_url('home/alur');?>">Alur Pengaduan</a>
                                </li>
                                <?php if($this->session->userdata('masuk')== TRUE){ ?>
                                <?php 
                                $id= $this->session->userdata('id');
                                $get_pelapor=$this->db->get_where('pelapor',['pelapor_id' => $id])->row_array();

                                ?>
                                <li class="nav-item">
                                    <a class="nav-link" href="<?= Base_url('laporan/riwayat/'.$id);?>">Riwayat Pelaporan</a>
                                </li>
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <?php echo $get_pelapor['pelapor_username']; ?>
                                    </a>
                                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                        <a class="dropdown-item" href="<?= Base_url('home/edit_akun/'.$id);?>">Edit Akun</a>
                                        <a class="dropdown-item" href="<?= Base_url('login/logout');?>">Log Out</a>
                                    </div>
                                </li>
                                <?php } else {}?>
                            </ul>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </header>
    <!-- Header part end-->