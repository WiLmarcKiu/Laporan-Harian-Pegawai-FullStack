<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
        <li class="nav-item nav-profile">
            <a href="#" class="nav-link">
                <div class="nav-profile-image">
                    <?php
                    // mendapatkan id_admin yang login
                    $id_admin = $_SESSION["admin"]["id_admin"];

                    $ambil = $koneksi->query("SELECT * FROM admin WHERE id_admin ='$id_admin'");
                    $pecah = $ambil->fetch_assoc();
                    ?>
                    <img src="../img/logo.png" alt="profile">
                    <span class="login-status online"></span>
                    <!--change to offline or busy as needed-->
                </div>
                <div class="nav-profile-text d-flex flex-column">
                    <span class="font-weight-bold mb-2"><?php echo $_SESSION['admin']['username']; ?></span>
                    <span class="text-secondary text-small">Operator Sistem</span>
                </div>
                <i class="mdi mdi-bookmark-check text-success nav-profile-badge"></i>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="index.php">
                <span class="menu-title">Dashboard</span>
                <i class="mdi mdi-home menu-icon"></i>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="tentang_kami.php">
                <span class="menu-title">Tentang Kami</span>
                <i class="mdi mdi-forum menu-icon"></i>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#general-pages2" aria-expanded="false" aria-controls="general-pages">
                <span class="menu-title">Admin</span>
                <i class="menu-arrow"></i>
                <i class="mdi mdi-account-circle menu-icon"></i>
            </a>
            <div class="collapse" id="general-pages2">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="adminIgdCC.php"> IGD CC </a></li>
                    <li class="nav-item"> <a class="nav-link" href="adminT1A.php"> TIA </a></li>
                    <li class="nav-item"> <a class="nav-link" href="adminT1ShapireVIP.php"> T1 Shapire VIP </a></li>
                    <li class="nav-item"> <a class="nav-link" href="adminT2DEDomestik.php"> T2 D-E Domestik </a></li>
                    <li class="nav-item"> <a class="nav-link" href="adminT3Domestik.php"> T3 Domestik </a></li>
                    <li class="nav-item"> <a class="nav-link" href="adminT3Internasional.php"> T3 Internasional </a></li>
                </ul>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#general-pages1" aria-expanded="false" aria-controls="general-pages">
                <span class="menu-title">Laporan</span>
                <i class="menu-arrow"></i>
                <i class="mdi mdi mdi-file-document menu-icon"></i>
            </a>
            <div class="collapse" id="general-pages1">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="igdCc.php"> IGD CC </a></li>
                    <li class="nav-item"> <a class="nav-link" href="t1a.php"> TIA </a></li>
                    <li class="nav-item"> <a class="nav-link" href="t1ShapireVIP.php"> T1 Shapire VIP </a></li>
                    <li class="nav-item"> <a class="nav-link" href="t2DEDomestik.php"> T2 D-E Domestik </a></li>
                    <li class="nav-item"> <a class="nav-link" href="t3Domestik.php"> T3 Domestik </a></li>
                    <li class="nav-item"> <a class="nav-link" href="t3Internasional.php"> T3 Internasional </a></li>
                </ul>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#general-pages" aria-expanded="false" aria-controls="general-pages">
                <span class="menu-title">Pengaturan</span>
                <i class="menu-arrow"></i>
                <i class="mdi mdi mdi-wrench menu-icon"></i>
            </a>
            <div class="collapse" id="general-pages">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="dataAdmin.php"> Data Admin </a></li>
                    <li class="nav-item"> <a class="nav-link full-screen-link" href="#" id="fullscreen-button"> Fullscreen </a></li>
                    <li class="nav-item"> <a class="nav-link" href="signout.php"> Signout </a></li>
                </ul>
            </div>
        </li>
    </ul>
</nav>