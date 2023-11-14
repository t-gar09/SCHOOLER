<h2>Detail Pembelian</h2>
<?php
$ambil = $koneksi->query("SELECT * FROM pembelian JOIN pelanggan ON pembelian.id_pelanggan=pelanggan.id_pelanggan WHERE pembelian.id_pembelian='$_GET[id]'");
$detail = $ambil->fetch_assoc();
?>

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

<table class="table table-bordered">
    <thead>
        <tr>
            <th>no</th>
            <th>nama produk</th>
            <th>harga</th>
            <th>jumlah</th>
            <th>subtotal</th>
        </tr>
    </thead>
    <tbody>
        <?php $nomor = 1; ?>
        <?php $ambil = $koneksi->query("SELECT * FROM pembelian_produk 
                                       JOIN produk ON pembelian_produk.id_produk = produk.id_produk
                                       WHERE pembelian_produk.id_pembelian='$_GET[id]'"); ?>
        <?php while ($pecah = $ambil->fetch_assoc()) { ?>
            <tr>
                <td><?php echo $nomor; ?></td>
                <td><?php echo $pecah['nama_produk']; ?></td>
                <td>Rp. <?php echo number_format($pecah['harga']); ?></td>
                <td><?php echo $pecah['jumlah']; ?></td>
                <td>Rp. <?php echo number_format($pecah['subharga']); ?></td>
            </tr>
            <?php $nomor++; ?>
        <?php } ?>
    </tbody>
</table>