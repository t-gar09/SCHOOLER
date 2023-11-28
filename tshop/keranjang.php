<?php
session_start();
include 'koneksi.php';

if (empty($_SESSION["keranjang"]) || !is_array($_SESSION["keranjang"])) {
    echo "<script>alert('Keranjang kosong, Silahkan belanja');</script>";
    echo "<script>location = 'index.php';</script>";
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Keranjang Belanja</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>

<body>
    <?php include 'menu.php'; ?>
    <section class="kontent">
        <div class="container">
            <h1 class="mb-4 text-center">Keranjang Belanja</h1>
            <hr>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Produk</th>
                        <th>Stok</th>
                        <th>Harga</th>
                        <th>Jumlah</th>
                        <th>Subharga</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $nomor = 1;
                    $totalHarga = 0; // Initialize the total price
                    foreach ($_SESSION["keranjang"] as $id_produk => $jumlah) {
                        // Fetch product details
                        $ambil = $koneksi->query("SELECT * FROM produk WHERE id_produk='$id_produk'");
                        if ($ambil && $ambil->num_rows > 0) {
                            $pecah = $ambil->fetch_assoc();
                            $subharga = $pecah["harga_produk"] * $jumlah;
                            $totalHarga += $subharga; // Add subharga to totalHarga
                            ?>
                            <tr>
                                <td><?php echo $nomor; ?></td>
                                <td><?php echo $pecah['nama_produk']; ?></td>
                                <td><?php echo $pecah['stok_produk']; ?></td>
                                <td>Rp. <?php echo number_format($pecah['harga_produk']); ?></td>
                                <td>
                                    <form method="post" action="ubahjumlah.php?id=<?php echo $id_produk; ?>">
                                        <input type="number" name="jumlah" value="<?php echo $jumlah; ?>" min="1" max="<?php echo $pecah['stok_produk']; ?>">
                                        <button type="submit" class="btn btn-sm btn-primary"><i class="bi bi-pencil-square"></i> Edit</button>
                                    </form>
                                </td>
                                <td>Rp. <?php echo number_format($subharga); ?></td>
                                <td>
                                    <a href="hapuskeranjang.php?id=<?php echo $id_produk; ?>" class="btn btn-danger"><i class="bi bi-trash"></i></a>
                                </td>
                            </tr>
                            <?php
                            $nomor++;
                        }
                    }
                    ?>
                </tbody>
            </table>
            <h4>Total Belanja: Rp. <?php echo number_format($totalHarga); ?></h4>
            <a href="index.php" class="btn btn-outline-secondary"><i class="bi bi-arrow-left-circle"></i> Lanjutkan Belanja</a>
            <a href="checkout.php" class="btn btn-primary"><i class="bi bi-cart2"></i> Checkout</a>
        </div>
    </section>
    <!-- Bootstrap JS and Popper.js (Optional) -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
</body>
</html>
