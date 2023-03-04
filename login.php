<?php

date_default_timezone_set('Asia/Jakarta');
require 'koneksi.php';

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>KKP SOETTA | LOGIN</title>
    <link rel="stylesheet" href="css/login.css">
    <link rel="shortcut icon" href="img/logo.png" />

</head>

<body>
    <section>
        <div class="login-box">
            <form action="" method="POST" class="was-validated">
                <div class="logo">
                    <img src="img/logo.png" alt="">
                </div>
                <h1>admin</h1>
                <div class="form-group">
                    <input type="text" name="username" id="" placeholder="Username" autocomplete="off" required>
                    <i class="fa-solid fa-user"></i>
                </div>
                <div class="form-group">
                    <input type="password" name="password" id="" placeholder="Password" autocomplete="off" required>
                    <i class="fa-solid fa-lock"></i>
                </div>
                <div class="form-group">
                    <input type="checkbox" name="remember" id="remember-me" placeholder="Password" required>
                    <label for="remember-me">Saya adalah admin</label>
                </div>
                <div class="form-group">
                    <input type="submit" name="login" value="Login">
                </div>
                <div class="back">
                    <a href="index.php"><i class="fa-solid fa-arrow-left"></i> Kembali</a>
                </div>
            </form>

            <?php
            // jika ada tombol login (tombol login ditekan)
            if (isset($_POST["login"])) {
                $username = $_POST["username"];
                $password = $_POST["password"];

                // lakukan query cek akun di tabel admin pada database
                $result = mysqli_query($koneksi, "SELECT * FROM admin WHERE username = '$username' AND password = '$password'");

                // hitung akun yang terresult
                $akunyangcocok = $result->num_rows;

                // jika 1 akun yang cocok maka diloginkan
                if ($akunyangcocok == 1) {
                    //anda sukses login
                    // mendapatkan akun dalam bentuk array
                    $akun = mysqli_fetch_assoc($result);

                    // simpan di session admin
                    $_SESSION["admin"] = $akun;
                    echo "<script>alert('Selamat Datang $akun[username]');</script>";
                    echo "<script>location='admin/index.php';</script>";
                } else {
                    // lakukan query cek akun di tabel admin_t1a pada database
                    $result = mysqli_query($koneksi, "SELECT * FROM admin_t1a WHERE username = '$username' AND password = '$password'");

                    // hitung akun yang terresult
                    $akunyangcocok = $result->num_rows;

                    // jika 1 akun yang cocok maka diloginkan
                    if ($akunyangcocok == 1) {
                        //anda sukses login
                        // mendapatkan akun dalam bentuk array
                        $akun = mysqli_fetch_assoc($result);

                        // simpan di session t1A
                        $_SESSION["t1A"] = $akun;
                        echo "<script>alert('Selamat Datang $akun[username]');</script>";
                        echo "<script>location='t1A/cek.php';</script>";
                    } else {
                        // lakukan query cek akun di tabel admin_igd pada database
                        $result = mysqli_query($koneksi, "SELECT * FROM admin_igdcc WHERE username = '$username' AND password = '$password'");

                        // hitung akun yang terresult
                        $akunyangcocok = $result->num_rows;

                        // jika 1 akun yang cocok maka diloginkan
                        if ($akunyangcocok == 1) {
                            //anda sukses login
                            // mendapatkan akun dalam bentuk array
                            $akun = mysqli_fetch_assoc($result);

                            // simpan di session igdCc
                            $_SESSION["igdCc"] = $akun;
                            echo "<script>alert('Selamat Datang $akun[username]');</script>";
                            echo "<script>location='igdCc/cek.php';</script>";
                        } else {
                            // lakukan query cek akun di tabel admin_t1shapirevip pada database
                            $result = mysqli_query($koneksi, "SELECT * FROM admin_t1shapirevip WHERE username = '$username' AND password = '$password'");

                            // hitung akun yang terresult
                            $akunyangcocok = $result->num_rows;

                            // jika 1 akun yang cocok maka diloginkan
                            if ($akunyangcocok == 1) {
                                //anda sukses login
                                // mendapatkan akun dalam bentuk array
                                $akun = mysqli_fetch_assoc($result);

                                // simpan di session t1ShapireVIP
                                $_SESSION["t1ShapireVIP"] = $akun;
                                echo "<script>alert('Selamat Datang $akun[username]');</script>";
                                echo "<script>location='t1ShapireVIP/cek.php';</script>";
                            } else {
                                // lakukan query cek akun di tabel admin_t2dedomestik pada database
                                $result = mysqli_query($koneksi, "SELECT * FROM admin_t2dedomestik WHERE username = '$username' AND password = '$password'");

                                // hitung akun yang terresult
                                $akunyangcocok = $result->num_rows;

                                // jika 1 akun yang cocok maka diloginkan
                                if ($akunyangcocok == 1) {
                                    //anda sukses login
                                    // mendapatkan akun dalam bentuk array
                                    $akun = mysqli_fetch_assoc($result);

                                    // simpan di session t2DEDomestik
                                    $_SESSION["t2DEDomestik"] = $akun;
                                    echo "<script>alert('Selamat Datang $akun[username]');</script>";
                                    echo "<script>location='t2DEDomestik/cek.php';</script>";
                                } else {
                                    // lakukan query cek akun di tabel admin_t3domestik pada database
                                    $result = mysqli_query($koneksi, "SELECT * FROM admin_t3domestik WHERE username = '$username' AND password = '$password'");

                                    // hitung akun yang terresult
                                    $akunyangcocok = $result->num_rows;

                                    // jika 1 akun yang cocok maka diloginkan
                                    if ($akunyangcocok == 1) {
                                        //anda sukses login
                                        // mendapatkan akun dalam bentuk array
                                        $akun = mysqli_fetch_assoc($result);

                                        // simpan di session t3Domestik
                                        $_SESSION["t3Domestik"] = $akun;
                                        echo "<script>alert('Selamat Datang $akun[username]');</script>";
                                        echo "<script>location='t3Domestik/cek.php';</script>";
                                    } else {
                                        // lakukan query cek akun di tabel admin_t3internasional pada database
                                        $result = mysqli_query($koneksi, "SELECT * FROM admin_t3internasional WHERE username = '$username' AND password = '$password'");

                                        // hitung akun yang terresult
                                        $akunyangcocok = $result->num_rows;

                                        // jika 1 akun yang cocok maka diloginkan
                                        if ($akunyangcocok == 1) {
                                            //anda sukses login
                                            // mendapatkan akun dalam bentuk array
                                            $akun = mysqli_fetch_assoc($result);

                                            // simpan di session t3Internasional
                                            $_SESSION["t3Internasional"] = $akun;
                                            echo "<script>alert('Selamat Datang $akun[username]');</script>";
                                            echo "<script>location='t3Internasional/cek.php';</script>";
                                        } else {
                                            // anda gagal login
                                            echo "<script>alert('Anda Gagal Login Mohon Periksa Kembali Akun Anda');</script>";
                                            echo "<script>location='login.php';</script>";
                                        }
                                    }
                                }
                            }
                        }
                    }
                }
            }
            ?>

        </div>
    </section>
    <script src="https://kit.fontawesome.com/943a58e089.js" crossorigin="anonymous"></script>
</body>

</html>