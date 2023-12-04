<?php
include'koneksi.php';

if ($koneksi->connect_error) {
    die("Koneksi Gagal: " . $koneksi->connect_error);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar</title>
    <link rel="stylesheet" href="admin/assets/css/bootstrap.css">
</head>

<body>
    <?php include 'menu.php'; ?>

    <div class="container mt-5">
        <div class="row">
            <div class="col-md-6 mx-auto">
                <div class="panel panel-default mt-5">
                    <div class="panel-heading">
                        <h2 class="panel-title text-center">Register User</h2>
                    </div>
                    <div class="panel-body">
                        <form method="post" class="form-horizontal">
                            <div class="form-group">
                                <label class="control-label col-md-3">Nama</label>
                                <div class="col-md-7">
                                    <input type="text" class="form-control" name="nama" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3">Email</label>
                                <div class="col-md-7">
                                    <input type="email" class="form-control" name="email" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3">Password</label>
                                <div class="col-md-7">
                                    <input type="password" class="form-control" name="password" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3">Alamat</label>
                                <div class="col-md-7">
                                    <textarea class="form-control" name="alamat" required></textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3">Telp/Hp</label>
                                <div class="col-md-7">
                                    <input type="tel" class="form-control" name="telepon" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-7 col-md-offset-3">
                                    <button class="btn btn-primary w-100" name="daftar" style="background-color: #EE4D2D;">Daftar</button>
                                </div>
                            </div>
                        </form>

                        <?php
                        if (isset($_POST["daftar"])) {
                            $nama = $_POST["nama"];
                            $email = $_POST["email"];
                            $password = $_POST["password"];
                            $alamat = $_POST["alamat"];
                            $telepon = $_POST["telepon"];

                            // Validasi data input
                            if (empty($nama) || empty($email) || empty($password) || empty($alamat) || empty($telepon)) {
                                echo "<script>alert('Semua field harus diisi');</script>";
                            } else {
                                // Cek apakah email sudah digunakan
                                $stmt = $koneksi->prepare("SELECT * FROM pelanggan WHERE email_pelanggan=?");
                                $stmt->bind_param("s", $email);
                                $stmt->execute();
                                $result = $stmt->get_result();
                                $stmt->close();

                                if ($result->num_rows > 0) {
                                    echo "<script>alert('Pendaftaran gagal, email sudah digunakan');</script>";
                                } else {
                                    // Insert data pelanggan
                                    $stmt = $koneksi->prepare("INSERT INTO pelanggan(email_pelanggan, password_pelanggan, nama_pelanggan, telepon_pelanggan, alamat_pelanggan) VALUES (?, ?, ?, ?, ?)");
                                    $stmt->bind_param("sssss", $email, $password, $nama, $telepon, $alamat);
                                    $stmt->execute();
                                    $stmt->close();

                                    echo "<script>alert('Pendaftaran sukses, silahkan login');</script>";
                                    echo "<script>location = 'login.php';</script>";
                                }
                            }
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
