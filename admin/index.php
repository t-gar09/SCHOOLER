﻿<?php
session_start();
//koneksi ke database
include '../koneksi.php';

if (!isset($_SESSION['admin'])) {
    echo "<script>alert('Anda harus login');</script>";
    echo "<script>location='login.php';</script>";
    header('location:login.php');
    exit();
}
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>TSHOP</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <link href="assets/css/bootstrap.css" rel="stylesheet" />

    <link href="assets/css/font-awesome.css" rel="stylesheet" />

    <link href="assets/js/morris/morris-0.4.3.min.css" rel="stylesheet" />

    <link href="assets/css/custom.css" rel="stylesheet" />

    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
</head>

<body>
    <div id="wrapper">
        <nav class="navbar navbar-default navbar-cls-top " role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a style="background-color: #000; color: #fff;" class="navbar-brand" href="index.php">TSHOP</a> 
            </div>

            <div style="color: white;
padding: 15px 50px 5px 50px;
float: right;
font-size: 16px;"> &nbsp; <a href="index.php?halaman=logout" class="btn btn-warning square-btn-adjust" style="background-color:#FF6E1E;"><i class="bi bi-box-arrow-right"></i> Logout</a> </div>
        </nav>
        <!-- /. NAV TOP  -->
        <nav class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">
                    <li class="text-center">
                        <img src="../Image\logo tshop.png" class="user-image img-responsive" />
                    </li>


                    <li><a href="index.php"><i class="bi bi-speedometer2" style="font-size: 40px;"></i> Home</a></li>
                    <li><a href="index.php?halaman=produk"><i class="bi bi-journal-text" style="font-size: 40px;"></i> Produk</a></li>
                    <li><a href="index.php?halaman=pembelian"><i class="bi bi-cart2" style="font-size: 40px;"></i> Pembelian</a></li>
                    <li><a href="index.php?halaman=pelanggan"><i class="bi bi-people-fill" style="font-size: 40px;"></i> Pelanggan</a></li>
                    <li><a href="index.php?halaman=ongkir"><i class="bi bi-buildings" style="font-size: 40px;"></i> Ongkir</a></li>
                    <li><a href="index.php?halaman=logout"><i class="bi bi-box-arrow-right" style="font-size: 40px;"></i> Logout</a></li>
                </ul>

            </div>

        </nav>
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper">
            <div id="page-inner">
                <?php
                if (isset($_GET['halaman'])) {
                    if ($_GET['halaman'] == "produk") {
                        include 'produk.php';
                    } elseif ($_GET['halaman'] == "pelanggan") {
                        include 'pelanggan.php';
                    } elseif ($_GET['halaman'] == "pembelian") {
                        include 'pembelian.php';
                    } elseif ($_GET['halaman'] == "hapuspelanggan") {
                        include 'hapuspelanggan.php';
                    } elseif ($_GET['halaman'] == "Logout") {
                        include 'Logout.php';
                    } elseif ($_GET['halaman'] == "detail") {
                        include 'detail.php';
                    } elseif ($_GET['halaman'] == "tambahproduk") {
                        include 'tambahproduk.php';
                    } elseif ($_GET['halaman'] == "hapusproduk") {
                        include 'hapusproduk.php';
                    } elseif ($_GET['halaman'] == "ubahproduk") {
                        include 'ubahproduk.php';
                    } elseif ($_GET['halaman'] == "ongkir") {
                        include 'ongkir.php';
                    } elseif ($_GET['halaman'] == "tambahongkir") {
                        include 'tambahongkir.php';
                    } elseif ($_GET['halaman'] == "hapusongkir") {
                        include 'hapusongkir.php';
                    } elseif ($_GET['halaman'] == "logout") {
                        include 'logout.php';
                    }
                } else {
                    include 'home.php';
                }

                ?>
            </div>

        </div>

    </div>

    <script src="assets/js/jquery-1.10.2.js"></script>

    <script src="assets/js/bootstrap.min.js"></script>

    <script src="assets/js/jquery.metisMenu.js"></script>

    <script src="assets/js/morris/raphael-2.1.0.min.js"></script>
    <script src="assets/js/morris/morris.js"></script>

    <script src="assets/js/custom.js"></script>


</body>

</html>