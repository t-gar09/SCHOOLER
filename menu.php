	<!-- Navbar -->
	<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TSHOP</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <!-- Font Awesome CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        body {
            background-color: #f8f9fa;
        }

        .navbar {
            background-color: #000000 ;
            padding: 15px 0;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .navbar-brand img {
            width: 160px; 
            height: auto;
            margin-right: 10px; 
        }

        .navbar-brand {
            color: #ffffff;
            font-size: 26px; 
            font-weight: bold;
        }

        .navbar-nav .nav-item .nav-link {
            color: #ffffff;
            font-size: 20px; 
			text-decoration: none;
        }

        .navbar-toggler-icon {
            background-color: #ffffff;
        }
    </style>
</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-light">
	<div class="container">
            <a class="navbar-brand" href="index.php">
                <img src="Image\logo schooler.png" alt="">
            </a>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="index.php"><i class="fas fa-home"></i> Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="keranjang.php"><i class="fas fa-shopping-cart"></i> Keranjang</a>
                    </li>
                    <?php if (isset($_SESSION["pelanggan"])): ?>
                        <li class="nav-item">
                            <a class="nav-link" href="logout.php"><i class="fas fa-sign-out-alt"></i> Logout</a>
                        </li>
                    <?php else: ?>
                        <li class="nav-item">
                            <a class="nav-link" href="login.php"><i class="fas fa-sign-in-alt"></i> Login</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="daftar.php"><i class="fas fa-user-plus"></i> Daftar</a>
                        </li>
                    <?php endif ?>
                    <li class="nav-item">
                        <a class="nav-link" href="checkout.php"><i class="fas fa-clipboard-check"></i> Checkout</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Your content goes here -->

    <!-- Bootstrap JS and Popper.js (Optional) -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
</body>

</html>

