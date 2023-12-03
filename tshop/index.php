<?php
session_start();
//koneksi ke database
include'koneksi.php';
?>


<body>
    <?php include 'navbar.php'; ?>
	<?php include 'menu.php'; ?>
	<!-- Konten -->

	<div class="sort-product-tab-wrapper">
                        <div class="container">
                            <div class="row">
                                <div class="col-12">
                                    <div class="tab-content">
			<h1 class="text-center">List Produk</h1>
			<br>

			<div class="row">

				<?php $ambil = $koneksi->query("SELECT * FROM produk"); ?>
				<?php while ($perproduk = $ambil->fetch_assoc()) { ?>  

					<div class="col-md-3">
						<div class="thumbnail">
						    <div class="product-default-single-item product-color--golden"
                                data-aos="fade-up" data-aos-delay="0">
                                        <div class="image-box">
                                                            
                                            <img src="foto_produk/<?php echo $perproduk['foto_produk']; ?>" alt="" class="img-fluid" style="max-width: 250px; max-height: 250px;">
                                                                
                                                            
                                            <div class="action-link">
                                                                <div class="action-link-left">
                                                                    <a href="beli.php?id=<?php echo $perproduk['id_produk']; ?>" 
                                                                    data-bs-target="#modalAddcart">Add to Cart</a>
                                                                </div>   
                                                            </div>
                                            </div>
                                                        <div class="content">
                                                            <div class="content-left">
                                                                <h6 class="title">
                                                                    <?php echo $perproduk['nama_produk']; ?></a></h6>
                                                            </div>
                                                            <div class="content-right">
                                                                <span class="price"><?php echo number_format($perproduk['harga_produk']); ?></span>
                                                            </div>

                                        </div>	
                            </div>
						
                        </div>


					</div>
				<?php } ?>

			</div>

		</div>
    <!--End Konten-->

	</section>

</body>

