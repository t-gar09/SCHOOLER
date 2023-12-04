<?php
session_start();
include 'navbar.php';
include 'koneksi.php';
include 'navbar.php';
  
if (empty($_SESSION["keranjang"]) || !is_array($_SESSION["keranjang"])) {
    echo "<script>alert('Keranjang kosong, Silahkan belanja');</script>";
    echo "<script>location = 'menu.php';</script>";
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Keranjang Belanja</title>
</head>

<body>
<<<<<<< HEAD
    
=======
>>>>>>> 2aedf6bbdea2d070f0f07ee2c8d399dbe8a49726
    <section class="kontent">
        <div class="container">
            <h1 class="mb-4 text-center">Keranjang Belanja</h1>
            <hr>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Produk</th>
                        <th>Kategori</th>
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
                                <td><?php echo $pecah['kategori']; ?></td>
                                <td><?php echo $pecah['stok_produk']; ?></td>
                                <td>Rp. <?php echo number_format($pecah['harga_produk']); ?></td>
                                <td>
                                    <form method="post" action="ubahjumlah.php?id=<?php echo $id_produk; ?>">
                                        <input type="number" name="jumlah" value="<?php echo $jumlah; ?>" min="1" max="<?php echo $pecah['stok_produk']; ?>">
<<<<<<< HEAD
                                        <button type="submit" class="btn btn-lg btn-black-default-hover"><i class="fa fa-pencil-square"></i>Edit</button>
=======
                                        <button type="submit" class="btn btn-md btn-black-default-hover"><i class="bi bi-pencil-square"></i> Edit</button>
>>>>>>> 2aedf6bbdea2d070f0f07ee2c8d399dbe8a49726
                                    </form>
                                </td>
                                <td>Rp. <?php echo number_format($subharga); ?></td>
                                <td>
<<<<<<< HEAD
                                    <a href="hapuskeranjang.php?id=<?php echo $id_produk; ?>" class="btn btn-lg btn-black-default-hover"><i class="fa fa-trash"></i></a>

=======
                                <a href="hapuskeranjang.php?id=<?php echo $id_produk; ?>" class="btn btn-md btn-black-default-hover"><i class="fa fa-trash"></i></a>
>>>>>>> 2aedf6bbdea2d070f0f07ee2c8d399dbe8a49726
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
<<<<<<< HEAD
            <a href="menu.php" class="btn btn-lg btn-black-default-hover"><i class="fa fa-arrow-left-circle"></i> Lanjutkan Belanja</a>
            <a href="checkout.php" class="btn btn-lg btn-black-default-hover"><i class="fa fa-cart2"></i> Checkout</a>
=======
            <a href="index.php" class="btn btn-md btn-black-default-hover"><i class="bi bi-arrow-left-circle"></i> Lanjutkan Belanja</a>
            <a href="checkout.php" class="btn btn-md btn-black-default-hover"><i class="bi bi-cart2"></i> Checkout</a>
>>>>>>> 2aedf6bbdea2d070f0f07ee2c8d399dbe8a49726
        </div>
    </section>
</body>
</html>
