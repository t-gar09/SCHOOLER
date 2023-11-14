<?php
session_start();
//koneksi ke database
include'koneksi.php';
?>

<!DOCTYPE html>
<html>

<head>
	<title>T-SHOP</title>
	<link rel="stylesheet" href="admin/assets/css/bootstrap.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
	<style>
		body {
			background-color: #f8f9fa;
		}

		.konten {
			padding: 20px;
		}

		.thumbnail {
			border: 1px solid #ddd;
			padding: 15px;
			background-color: #fff;
			border-radius: 10px;
			height: 100%;
		}

		.row {
			display: flex;
			flex-wrap: wrap;
		}

		.col-md-3 {
			flex: 0 0 25%;
			padding: 15px;
		}
	</style>
</head>

<body>

	<?php include 'menu.php'; ?>
	<!-- Konten -->

	<section class="konten">
		<div class="container">
			<h1 class="text-center">List Produk</h1>
			<br>

			<div class="row">

				<?php $ambil = $koneksi->query("SELECT * FROM produk"); ?>
				<?php while ($perproduk = $ambil->fetch_assoc()) { ?>

					<div class="col-md-3">
						<div class="thumbnail">
							<img src="foto_produk/<?php echo $perproduk['foto_produk']; ?>" alt="" class="img-fluid" style="max-width: 250px; max-height: 250px;">
							<div class="caption">
								<h3><?php echo $perproduk['nama_produk']; ?></h3>
								<h5>Rp. <?php echo number_format($perproduk['harga_produk']); ?></h5>
								<a href="beli.php?id=<?php echo $perproduk['id_produk']; ?>" class="btn" style="background-color: #FF6E1E; color: #fff;"> <i class="fas fa-shopping-cart"></i> Beli</a>
								<a href="detail.php?id=<?php echo $perproduk['id_produk']; ?>" class="btn btn-success"><i class="fas fa-info-circle"></i> Detail</a>
							</div>
						</div>


					</div>
				<?php } ?>

			</div>

		</div>

	</section>

</body>

</html>