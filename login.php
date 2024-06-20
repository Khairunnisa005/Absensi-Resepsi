<?php

include("koneksi.php");

// Login
if (isset($_POST['login'])) {
    // Inisialisasi variabel
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Melakukan query untuk memeriksa username dan password
    $cek = mysqli_query($koneksi, "SELECT * FROM user WHERE username='$username' AND password='$password'");
    $hitung = mysqli_num_rows($cek);

    if ($hitung > 0) {
        // Ambil data pengguna
        $data = mysqli_fetch_assoc($cek);

        // Simpan data pengguna dalam session
        $_SESSION['login'] = 'True';
        $_SESSION['username'] = $username;
        $_SESSION['nama_user'] = $data['nama_user'];

        // Tampilkan pesan selamat datang
        echo '<script>
                alert("Selamat datang ' . $data['nama_user'] . ' di Dashboard Admin !");
                location.href="index.php";
              </script>';
    } else {
        // Jika data tidak ditemukan, maka gagal login
        echo '<script>
                alert("Username atau Password salah!");
                location.href="login.php";
              </script>';
    }
}

if(!isset($_SESSION['login'])) {
    // Kalo tidak ada session yang terbentuk, tidak boleh masuk web
} else {
    // Kalo sudah login, tidak bisa ke halaman 'login.php' kecuali klik 'Logout' dulu
    header('location:index.php');
}

?>


<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Login</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body class="bg-gradient-white">

    <div class="container">
       

        <!-- Outer Row -->
        <div class="row justify-content-center">
            <div class="col-xl-10 col-lg-12 col-md-9 ">
                
                <br><br><br><br>   
                <div class="card o-hidden border-0 shadow-lg m-1">
                    <div class="card-body p-0">
                        <div class="p-1 mb-1"></div>
                        <div class="ml-3 mt-1" >
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-4"><img src="img/sampul.jpg" d-none d-lg-block></div>
                            <div class="col-lg 2"></div>
                            <div class="col-lg-6">
                                <div class="p-4">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Selamat Datang!</h1>
                                    </div>
                                    <form class="user" method="post">
                                        <div class="form-group">
                                            <input type="text" class="form-control form-control-user"
                                                id="InputUsername" name="username" placeholder="Masukkan Nama Pengguna" required>
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control form-control-user"
                                                id="InputPassword" name="password" placeholder="Masukkan Sandi" required>
                                        </div>
                                        <button class="btn btn-primary btn-user btn-block" type="submit"
                                        name="login">Masuk
                                        </button>
                                    </form>
                                    <hr>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

</body>

</html>