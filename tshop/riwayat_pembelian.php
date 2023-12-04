<?php
session_start();
include 'koneksi.php';
<<<<<<< HEAD
=======
include 'navbar.php';
if (!isset($_SESSION["pelanggan"])) {
    echo "<script>alert('Anda harus login terlebih dahulu');</script>";
    echo "<script>location='login.php';</script>";
}
>>>>>>> 2aedf6bbdea2d070f0f07ee2c8d399dbe8a49726
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Riwayat Pembayaran</title>
<<<<<<< HEAD
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
=======

>>>>>>> 2aedf6bbdea2d070f0f07ee2c8d399dbe8a49726
</head>
<body>
    <div class="container">
        <h1>Riwayat Pembelian</h1>

        <?php
        $id_pelanggan = $_SESSION['pelanggan']['id_pelanggan'];
        $ambil_pembelian = $koneksi->query("SELECT pembelian.*, GROUP_CONCAT(produk.nama_produk SEPARATOR ', ') AS nama_produk, GROUP_CONCAT(produk.kategori SEPARATOR ', ') AS kategori_produk, SUM(pembelian_produk.subharga) AS harga_total_produk, ongkir.tarif AS harga_ongkir FROM pembelian LEFT JOIN pembelian_produk ON pembelian.id_pembelian = pembelian_produk.id_pembelian LEFT JOIN produk ON pembelian_produk.id_produk = produk.id_produk LEFT JOIN ongkir ON pembelian.id_ongkir = ongkir.id_ongkir WHERE pembelian.id_pelanggan='$id_pelanggan' GROUP BY pembelian.id_pembelian");
        ?>

        <table class="table">
            <thead>
                <tr>
                    <th>No</th>
                    <th>ID Pembelian</th>
                    <th>Tanggal Pembelian</th>
                    <th>Nama Produk</th>
                    <th>Kategori</th>
                    <th>Harga Produk</th>
                    <th>Harga Ongkir</th>
                    <th>Harga Total</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $nomor = 1;
                while ($data_pembelian = $ambil_pembelian->fetch_assoc()) {
                ?>
                    <tr>
                        <td><?php echo $nomor; ?></td>
                        <td><?php echo $data_pembelian['id_pembelian']; ?></td>
                        <td><?php echo $data_pembelian['tanggal_pembelian']; ?></td>
                        <td><?php echo $data_pembelian['nama_produk']; ?></td>
                        <td><?php echo $data_pembelian['kategori_produk']; ?></td>
                        <td><?php echo number_format($data_pembelian['harga_total_produk'], 0, ',', '.'); ?></td>
                        <td><?php echo number_format($data_pembelian['harga_ongkir'], 0, ',', '.'); ?></td>
                        <td><?php echo number_format(($data_pembelian['harga_total_produk'] + $data_pembelian['harga_ongkir']), 0, ',', '.'); ?></td>
                    </tr>
                <?php
                    $nomor++;
                }
                ?>
            </tbody>
        </table>
    </div>
<<<<<<< HEAD
    <!-- Bootstrap JS (Optional) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
=======
>>>>>>> 2aedf6bbdea2d070f0f07ee2c8d399dbe8a49726
</body>
</html>
