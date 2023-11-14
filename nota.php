<?php
session_start();
include 'koneksi.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nota Pembelian</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>

<body>

    <?php include 'menu.php'; ?>

    <section class="kontent">
        <div class="container">

            <h2 class="mt-4 mb-4">Detail Pembelian</h2>
            <?php
            $ambil = $koneksi->query("SELECT * FROM pembelian JOIN pelanggan ON pembelian.id_pelanggan=pelanggan.id_pelanggan WHERE pembelian.id_pembelian='$_GET[id]'");
            $detail = $ambil->fetch_assoc();
            ?>

            <div class="mb-4" id="print-content">
                <strong>Nama Pelanggan: <?php echo $detail['nama_pelanggan']; ?></strong> <br>
				<strong>Alamat Tujuan: <?php echo $detail['alamat_pelanggan']; ?></strong> <br>
                <strong>Alamat Pengiriman: <?php echo $detail['alamat_pengirim']; ?></strong> <br>
                <p>
                    No Telp:<?php echo $detail['telepon_pelanggan']; ?> <br>
                    Email: <?php echo $detail['email_pelanggan']; ?>
                </p>

                <p>
                    Tanggal: <?php echo $detail['tanggal_pembelian']; ?> <br>
                    Total: Rp. <?php echo number_format($detail['total_pembelian']); ?>
                </p>
            </div>

            <table class="table table-bordered" id="print-table">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Produk</th>
                        <th>Harga</th>
                        <th>Jumlah</th>
                        <th>Subtotal</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $nomor = 1; ?>
                    <?php $ambil = $koneksi->query("SELECT * FROM pembelian_produk JOIN produk ON pembelian_produk.id_produk = produk.id_produk WHERE pembelian_produk.id_pembelian='$_GET[id]'");?>
                    <?php while ($pecah = $ambil->fetch_assoc()) { ?>
                        <tr>
                            <td><?php echo $nomor; ?></td>
                            <td><?php echo $pecah['nama_produk']; ?></td>
                            <td>Rp. <?php echo number_format($pecah['harga_produk']); ?></td>
                            <td><?php echo $pecah['jumlah']; ?></td>
                            <td>
                                Rp. <?php echo number_format($pecah['harga_produk'] * $pecah['jumlah']); ?>
                            </td>
                        </tr>
                        <?php $nomor++; ?>
                    <?php } ?>
                </tbody>
            </table>

            <div class="row" id="print-alert">
                <div class="col-md-7">
                    <div class="alert alert-success"  style="background-color: #FF6E1E; color: #fff;">
                        <p>
                            Silahkan melakukan pembayaran Rp. <?php echo number_format($detail['total_pembelian']); ?> ke: <br>
                            <strong>BANK MANDIRI 696969 AN. MUHAMMAD RENDI ADRIANSYAH</strong>
							<br>
							<p>atau</p>
							<strong>DANA/OVO 08912690998 AN. MUHAMMAD RENDI ADRIANSYAH</strong>
                        </p>
                    </div>
                </div>
            </div>

            <button class="btn btn-primary" onclick="printNota()">Cetak Nota</button>

        </div>
    </section>

    <!-- Bootstrap JS and Popper.js (Optional) -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>

    <script>
        function printNota() {
            var printContent = document.getElementById("print-content").innerHTML;
            var printTable = document.getElementById("print-table").outerHTML;
            var printAlert = document.getElementById("print-alert").innerHTML;

            var originalContent = document.body.innerHTML;

            document.body.innerHTML = printContent + printTable + printAlert;

            window.print();

            document.body.innerHTML = originalContent;
        }
    </script>

</body>

</html>
