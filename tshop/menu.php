<?php
//koneksi ke database
include 'koneksi.php';
include 'navbar.php';
?>

<br>
<br>
    <!-- ...:::: Start Shop Section:::... -->
    <div class="shop-section">
        <div class="container">
            <div class="row flex-column-reverse flex-lg-row">
                <div class="col-lg-12">
                    <!-- Start Shop Product Sorting Section -->
                    <div class="shop-sort-section">
                        <div class="container">
                            <div class="row">
                                <!-- Start Sort Wrapper Box -->
                                <div class="sort-box d-flex justify-content-between align-items-md-center align-items-start flex-md-row flex-column"
                                    data-aos="fade-up" data-aos-delay="0">
                                </div> 
                                <!-- Start Sort Wrapper Box -->
                            </div>
                        </div>
                    </div> <!-- End Section Content -->
<!-- Katalog -->

<div class="sort-product-tab-wrapper">
                        <div class="container">
                            <div class="row">
                                <div class="col-12">
                                    <div class="tab-content">

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
                </div> <!-- End Shop Product Sorting Section  -->
            </div>
        </div>
    </div> <!-- ...:::: End Shop Section:::... -->

<?php
//koneksi ke database
include 'footer.php';
?>

    <!-- material-scrolltop button -->
    <button class="material-scrolltop" type="button"></button>
    
    

    <!-- ::::::::::::::All JS Files here :::::::::::::: -->
    <!-- Global Vendor, plugins JS -->
    <!-- <script src="assets/js/vendor/modernizr-3.11.2.min.js"></script>
    <script src="assets/js/vendor/jquery-3.5.1.min.js"></script>
    <script src="assets/js/vendor/jquery-migrate-3.3.0.min.js"></script>
    <script src="assets/js/vendor/popper.min.js"></script>
    <script src="assets/js/vendor/bootstrap.min.js"></script>
    <script src="assets/js/vendor/jquery-ui.min.js"></script>  -->

    <!--Plugins JS-->
    <!-- <script src="assets/js/plugins/swiper-bundle.min.js"></script>
    <script src="assets/js/plugins/material-scrolltop.js"></script>
    <script src="assets/js/plugins/jquery.nice-select.min.js"></script>
    <script src="assets/js/plugins/jquery.zoom.min.js"></script>
    <script src="assets/js/plugins/venobox.min.js"></script>
    <script src="assets/js/plugins/jquery.waypoints.js"></script>
    <script src="assets/js/plugins/jquery.lineProgressbar.js"></script>
    <script src="assets/js/plugins/aos.min.js"></script>
    <script src="assets/js/plugins/jquery.instagramFeed.js"></script>
    <script src="assets/js/plugins/ajax-mail.js"></script> -->

    <!-- Use the minified version files listed below for better performance and remove the files listed above -->
    <script src="assets/js/vendor/vendor.min.js"></script>
    <script src="assets/js/plugins/plugins.min.js"></script>

    <!-- Main JS -->
    <script src="assets/js/main.js"></script>
</body>

</html>

