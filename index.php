<?php require 'koneksi.php'; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>KKP SOETTA</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
    <link rel="stylesheet" href="css/swiper-bundle.min.css">
    <link rel="shortcut icon" href="img/logo.png" />
</head>

<body>
    <!-- NAVBAR -->
    <header>
        <div class="navbar">
            <a href="" class="logo"><img src="img/logo.png" alt=""></a>
            <div class="navigation">
                <div class="nav-items">
                    <i class="uil uil-times nav-close-btn"></i>
                    <a href="#home"><i class="uil uil-home"></i>Beranda</a>
                    <a href="#about"><i class="uil uil-comment-alt-question"></i>Tentang Kami</a>
                    <a href="login.php"><i class="uil uil-sign-in-alt"></i>Login</a>
                </div>
            </div>
            <i class="uil uil-apps nav-menu-btn"></i>
        </div>
    </header>
    <!-- END NAVBAR -->



    <!-- HOME -->
    <section id="home" class="home">
        <div class="media-icons">
            <a href=""><i class="uil uil-facebook-f"></i></a>
            <a href=""><i class="uil uil-instagram"></i></a>
            <a href=""><i class="uil uil-youtube"></i></a>
        </div>
        <div class="swiper bg-slider">
            <div class="swiper-wrapper">
                <div class="swiper-slide">
                    <div class="img1"></div>
                    <div class="text-content">
                        <h2 class="title">Welcome !</h2>
                        <p>Portal Sistem Informasi Kantor Kesehatan Pelabuhan Kelas I Soekarno Hatta. Jl. Raya Jengki No. 8, RT/RW 8/2, Kebon Pala, Makassar, Jakarta Timur.</p>
                        <a href="#about"><button class="read-btn">Tentang Kami <i class="uil uil-arrow-right"></i></button></a>
                    </div>
                </div>
                <div class="swiper-slide dark-layer">
                    <div class="img2"></div>
                    <div class="text-content">
                        <h2 class="title">Welcome !</h2>
                        <p>Portal Sistem Informasi Kantor Kesehatan Pelabuhan Kelas I Soekarno Hatta. Jl. Raya Jengki No. 8, RT/RW 8/2, Kebon Pala, Makassar, Jakarta Timur.</p>
                        <a href="#about"><button class="read-btn">Tentang Kami <i class="uil uil-arrow-right"></i></button></a>
                    </div>
                </div>
                <div class="swiper-slide dark-layer">
                    <div class="img3"></div>
                    <div class="text-content">
                        <h2 class="title">Welcome !</h2>
                        <p>Portal Sistem Informasi Kantor Kesehatan Pelabuhan Kelas I Soekarno Hatta. Jl. Raya Jengki No. 8, RT/RW 8/2, Kebon Pala, Makassar, Jakarta Timur.</p>
                        <a href="#about"><button class="read-btn">Tentang Kami <i class="uil uil-arrow-right"></i></button></a>
                    </div>
                </div>
            </div>
        </div>
        <div class="bg-slider-thumbs">
            <div class="swiper-wrapper thumbs-container">
                <img src="img/c1.jpg" class="swiper-slide" alt="">
                <img src="img/c2.jpg" class="swiper-slide" alt="">
                <img src="img/c3.jpg" class="swiper-slide" alt="">
            </div>
        </div>
    </section>
    <!-- END HOME -->



    <!-- ABOUT -->
    <section id="about" class="about section">
        <h2>Tentang Kami</h2>
        <?php $ambil = $koneksi->query("SELECT * FROM tentang_kami"); ?>
        <?php $pecah = $ambil->fetch_assoc() ?>
        <p><?php echo $pecah['isi']; ?></p>
    </section>
    <!-- END ABOUT -->



    <!-- <script src="https://kit.fontawesome.com/70cd04957d.js" crossorigin="anonymous"></script> -->
    <script src="js/swiper-bundle.min.js"></script>
    <script src="js/main.js"></script>

</body>

</html>