<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="./assets/img//apple-icon.png">
    <link rel="icon" type="image/png" href="./assets/img//favicon.png">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>
        Paper Kit by Creative Tim
    </title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
    <!--     Fonts and icons     -->
    <link href="<?= base_url(); ?>https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
    <link href="<?= base_url(); ?>https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
    <!-- CSS Files -->
    <link href="<?= base_url(); ?>./assets/css/bootstrap.min.css" rel="stylesheet" />
    <link href="<?= base_url(); ?>./assets/css/paper-kit.css?v=2.2.0" rel="stylesheet" />
    <!-- CSS Just for demo purpose, don't include it in your project -->
    <link href="<?= base_url(); ?>./assets/demo/demo.css" rel="stylesheet" />
</head>

<body class="index-page sidebar-collapse">
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg fixed-top navbar-dark " color-on-scroll="300">
        <div class="container">
            <div class="navbar-translate">
                <a class="navbar-brand" href="https://demos.creative-tim.com/paper-kit/index.html" rel="tooltip" title="Coded by Creative Tim" data-placement="bottom" target="_blank">
                    Paper Kit 2
                </a>
                <button class="navbar-toggler navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-bar bar1"></span>
                    <span class="navbar-toggler-bar bar2"></span>
                    <span class="navbar-toggler-bar bar3"></span>
                </button>
            </div>
            <div class="collapse navbar-collapse " id="navigation">
                <ul class="navbar-nav">
                    <li class="nav-item <?php if (current_url() == base_url('')) {
                                            echo 'active';
                                        } ?>">
                        <a class="btn btn-primary btn-round" href="<?php echo base_url(''); ?>">Beranda</a>
                    </li>
                    <div class="container pr-6"></div>
                    <li class="nav-item <?php if (current_url() == base_url('HalamanUser/tingkat_kecemasan')) {
                                            echo 'active';
                                        } ?>">
                        <a class="btn btn-primary btn-round" href="<?php echo base_url('HalamanUser/tingkat_kecemasan'); ?>">Tingkat Kecemasan</a>
                    </li>
                    <div class="container pr-6"></div>
                    <li class="nav-item <?php if (current_url() == base_url('HalamanUser/diagnosa')) {
                                            echo 'active';
                                        } ?>">
                        <a class="btn btn-primary btn-round" href="<?php echo base_url('HalamanUser/diagnosa'); ?>">Diagnosa</a>
                    </li>
                    <div class="container pr-6"></div>
                    <li class="nav-item <?php if (current_url() == base_url('HalamanUser/riwayat_diagnosa')) {
                                            echo 'active';
                                        } ?>">
                        <a class="btn btn-primary btn-round" href="<?php echo base_url('HalamanUser/riwayat_diagnosa'); ?>">Hasil</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- End Navbar -->