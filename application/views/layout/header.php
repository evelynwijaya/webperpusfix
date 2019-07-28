<!doctype html>
<html lang="en">

<head>
    <title>E-Library &mdash; by STMIK Kharisma Makassar</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/custom-bs.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/jquery.fancybox.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrap-select.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/fonts/icomoon/style.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/fonts/line-icons/style.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/owl.carousel.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/animate.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/style.css">

<!--    Select2 bootstrap-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2-bootstrap-theme/0.1.0-beta.10/select2-bootstrap.css">
<!--    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2-bootstrap-theme/0.1.0-beta.10/select2-bootstrap.min.css">-->

    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.7/css/select2.css" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.7/css/select2.min.css" rel="stylesheet" />

    <link href="https://unpkg.com/gijgo@1.9.13/css/gijgo.min.css" rel="stylesheet" type="text/css" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.css" rel="stylesheet" type="text/css" />

    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/css/bootstrap-datepicker.css" rel="stylesheet"/>

    <!--    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/css/bootstrap-datetimepicker.css" rel="stylesheet" />-->
<!--    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/css/bootstrap-datetimepicker.min.css" rel="stylesheet" />-->

	<!-- DataTables -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.css">
	<link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css">
	<link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.5.6/css/buttons.bootstrap4.min.css">

<!--	<link rel="stylesheet" href="https://cdn.datatables.net/1.10.18/css/dataTables.bootstrap.min.css">-->
<!--    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.1.0/css/responsive.bootstrap.min.css" type="text/css" />-->
<!--    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.2.1/css/buttons.bootstrap.min.css" type="text/css" />-->
<!--    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.18/css/dataTables.jqueryui.min.css" type="text/css" />-->
</head>

<body id="top">


<div class="site-wrap">

    <div class="site-mobile-menu site-navbar-target">
        <div class="site-mobile-menu-header">
            <div class="site-mobile-menu-close mt-3">
                <span class="icon-close2 js-menu-toggle"></span>
            </div>
        </div>
        <div class="site-mobile-menu-body"></div>
    </div> <!-- .site-mobile-menu -->


    <!-- NAVBAR -->
    <header class="site-navbar mt-3">
        <div class="container-fluid">
            <div class="row align-items-center">
                <div class="site-logo col-6"><a href="<?php echo base_url(); ?>">E-LIBRARY</a></div>

                <nav class="mx-auto site-navigation">
                    <ul class="site-menu js-clone-nav d-none d-xl-block ml-0 pl-0">
                        <li><a href="<?php echo base_url(); ?>" class="nav-link">Home</a></li>
                        <li><a href="<?php echo base_url(); ?>daftarBuku">Buku</a></li>
                        <li><a href="<?php echo base_url(); ?>jurnal/daftarJurnal">Jurnal</a></li>
                        <li><a href="<?php echo base_url(); ?>skripsi/daftarSkripsi">Skripsi</a></li>
                        <?php
                        if ($this->session->userdata('status') == "login" && $this->session->userdata('status_user') == "Admin") {
                            ?>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">Laporan</a>
                                <div class="dropdown-menu">
                                    <!-- <a href="<?php echo base_url(); ?>DaftarPeminjaman" class="dropdown-item">Daftar Peminjaman</a> -->
                                    <a href="<?php echo base_url(); ?>RiwayatPeminjaman" class="dropdown-item">Statistik Peminjaman</a>
                                    <a href="<?php echo base_url(); ?>LaporanBuku" class="dropdown-item">Data Buku</a>
                                </div>
                            </li>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">Master Data</a>
                                <ul class="dropdown-menu">
                                    <a href="<?php echo base_url(); ?>Buku"  class="dropdown-item">Data Buku</a>
                                    <a href="<?php echo base_url(); ?>Jurnal"  class="dropdown-item">Data Jurnal</a>
                                    <a href="<?php echo base_url(); ?>Paper"  class="dropdown-item">Data Paper</a>
                                    <a href="<?php echo base_url(); ?>skripsi"  class="dropdown-item">Data Skripsi</a>
                                    <a href="<?php echo base_url(); ?>Pengarang" class="dropdown-item">Data Pengarang</a>
                                    <a href="<?php echo base_url(); ?>Penerbit" class="dropdown-item">Data Penerbit</a>
                                    <a href="<?php echo base_url(); ?>Peminjaman" class="dropdown-item">Data Peminjaman</a>
                                    <a href="<?php echo base_url(); ?>Peminjaman/pengembalian" class="dropdown-item">Data Pengembalian</a>
                                </ul>
                            </li>
                            <?php
                        }
                        ?>
                        <?php
                        if ($this->session->userdata('status') != "login") {
                            ?>
                            <li class="btn btn-warning border-width-2 d-lg-none"><a href="<?php echo base_url(); ?>login" target="_blank">
                                    Login</a></li>
                            <?php
                        }
                        ?>
                        <?php
                        if ($this->session->userdata('status') == "login") {
                        ?>
                        <li class="btn btn-warning border-width-2 d-lg-none">
                            <a href="#" data-toggle="dropdown" class="dropdown-toggle"><span
                                        class="mr-2 icon-user"></span><?php echo $this->session->userdata('nama_user');?></a>
                            <ul class="dropdown-menu">
                                <a href="<?php echo base_url(); ?>User/logout" class="dropdown-item">Logout</a>
                            </ul>
                            <?php
                            }
                            ?>
                        </li>
                    </ul>
                </nav>

                <div class="right-cta-menu text-right d-flex aligin-items-center col-6">
                    <?php
                    if ($this->session->userdata('status') != "login") {
                        ?>
                        <div class="ml-auto">
                            <a href="<?php echo base_url(); ?>login"
                               class="btn btn-primary border-width-2 d-none d-lg-inline-block"><span
                                        class="mr-2 icon-paper-plane"></span>Login</a>

<!--                            <li class="btn btn-primary dropdown d-none d-lg-inline-block ">-->
<!--                                <a href="#" class="dropdown-toggle text-white" data-toggle="dropdown"><span-->
<!--                                            class="mr-2 icon-bell text-white"> <span class="badge badge-light">4</span></span><span class="" style="font-size:18px;"></span></a>-->
<!--                                <ul class="dropdown-menu">-->
<!--                                    <li class="">-->
<!--                                        <a href="#">-->
<!--                                            <strong>Tes</strong><br />-->
<!--                                            <small><em>ini adalah pesan</em></small>-->
<!--                                        </a>-->
<!--                                    </li>-->
<!--                                    <li class="divider"></li>-->
<!--                                    <li class="">-->
<!--                                        <a href="#">-->
<!--                                            <strong>Tes</strong><br />-->
<!--                                            <small><em>ini adalah pesan</em></small>-->
<!--                                        </a>-->
<!--                                    </li>-->
<!--                                </ul>-->
<!--                            </li>-->
                        </div>
                        <?php
                    }
                    ?>

                    <?php
                    if ($this->session->userdata('status') == "login") {
                        ?>
                        <div class="ml-auto dropdown">
                            <a href="#" data-toggle="dropdown"
                               class="btn btn-primary border-width-2 d-none d-lg-inline-block dropdown-toggle"><span
                                        class="mr-2 icon-user"></span><?php echo $this->session->userdata('nama_user') ?></a>
                            <div class="dropdown-menu">
                                <a href="<?php echo base_url(); ?>User/logout" class="dropdown-item">Logout</a>
                            </div>
                        </div>

                        <?php
                    }
                    ?>
                    <a href="#" class="site-menu-toggle js-menu-toggle d-inline-block d-xl-none mt-lg-2 ml-3"><span
                                class="icon-menu h3 m-0 p-0 mt-2"></span></a>
                </div>

            </div>
        </div>
    </header>
