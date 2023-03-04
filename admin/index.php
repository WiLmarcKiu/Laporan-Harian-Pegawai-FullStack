<?php
session_start();
if (!isset($_SESSION['admin'])) {
    echo "<script>alert('Anda belum Sign In');</script>";
    echo "<script>location='../login.php';</script>";
    exit;
}
include '../koneksi.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>KKP SOETTA | ADMIN</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="assets/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="assets/vendors/css/vendor.bundle.base.css">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="assets/css/style.css">
    <!-- End layout styles -->
    <link rel="shortcut icon" href="../img/logo.png" />

    <style>
        .dropdown-menu[data-bs-popper] {
            left: unset !important;
            right: 0 !important;
        }

        .chartjs-render-monitor {
            display: block !important;
            width: 100% !important;
            height: 230px !important;
        }

        nav .breadcrumb .breadcrumb-item a {
            text-decoration: none !important;
            color: #000;
        }

        nav .breadcrumb .breadcrumb-item a:hover {
            color: #B66DFF;
        }
    </style>
</head>

<body>
    <div class="container-scroller">
        <!-- <div class="row p-0 m-0 proBanner" id="proBanner">
            <div class="col-md-12 p-0 m-0">
                <div class="card-body card-body-padding d-flex align-items-center justify-content-between">
                    <div class="ps-lg-1">
                        <div class="d-flex align-items-center justify-content-between">
                            <p class="mb-0 font-weight-medium me-3 buy-now-text">Free 24/7 customer support, updates, and more with this template!</p>
                            <a href="https://www.bootstrapdash.com/product/purple-bootstrap-admin-template/?utm_source=organic&utm_medium=banner&utm_campaign=buynow_demo" target="_blank" class="btn me-2 buy-now-btn border-0">Get Pro</a>
                        </div>
                    </div>
                    <div class="d-flex align-items-center justify-content-between">
                        <a href="https://www.bootstrapdash.com/product/purple-bootstrap-admin-template/"><i class="mdi mdi-home me-3 text-white"></i></a>
                        <button id="bannerClose" class="btn border-0 p-0">
                            <i class="mdi mdi-close text-white me-0"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div> -->
        <!-- partial:partials/_navbar.html -->
        <?php include 'navTop.php'; ?>
        <!-- partial -->
        <div class="container-fluid page-body-wrapper">
            <!-- partial:partials/_sidebar.html -->
            <?php include 'navSide.php'; ?>
            <!-- partial -->
            <div class="main-panel">
                <div class="content-wrapper">
                    <div class="page-header">
                        <h3 class="page-title">
                            <span class="page-title-icon bg-gradient-primary text-white me-2">
                                <i class="mdi mdi-home"></i>
                            </span> Dashboard
                        </h3>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                                <li class="breadcrumb-item active" aria-current="page"></li>
                            </ol>
                        </nav>
                    </div>
                    <div class="row">
                        <div class="col-md-4 grid-margin stretch-card">
                            <div class="card bg-gradient-danger">
                                <a href="igdCc.php" class=" text-white" style="text-decoration: none;">
                                    <div class="card-body">
                                        <div class="d-flex flex-row align-items-top">
                                            <i class="mdi mdi-airplane icon-lg" style="margin-right: 8px !important;"></i>
                                            <div class="ml-3">
                                                <?php
                                                $data_igdcc = mysqli_query($koneksi, "SELECT * FROM laporanIgdCc");
                                                $jumlah_igdcc = mysqli_num_rows($data_igdcc);
                                                ?>
                                                <h4>IGD CC</h4>
                                                <p class="mt-2 card-text"><?php echo "$jumlah_igdcc"; ?> data</p>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="col-md-4 grid-margin stretch-card">
                            <div class="card bg-gradient-primary">
                                <a href="t1a.php" class="text-white" style="text-decoration: none;">
                                    <div class="card-body">
                                        <div class="d-flex flex-row align-items-top">
                                            <i class="mdi mdi-airplane icon-lg" style="margin-right: 8px !important;"></i>
                                            <div class="ml-3">
                                                <?php
                                                $data_igdcc = mysqli_query($koneksi, "SELECT * FROM admin_igdcc");
                                                $jumlah_igdcc = mysqli_num_rows($data_igdcc);
                                                ?>
                                                <h4>T1A</h4>
                                                <p class="mt-2 card-text"><?php echo "$jumlah_igdcc"; ?> data</p>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="col-md-4 grid-margin stretch-card">
                            <div class="card bg-gradient-success">
                                <a href="t1ShapireVIP.php" class="text-white" style="text-decoration: none;">
                                    <div class="card-body">
                                        <div class="d-flex flex-row align-items-top">
                                            <i class="mdi mdi-airplane icon-lg" style="margin-right: 8px !important;"></i>
                                            <div class="ml-3">
                                                <?php
                                                $data_igdcc = mysqli_query($koneksi, "SELECT * FROM admin_igdcc");
                                                $jumlah_igdcc = mysqli_num_rows($data_igdcc);
                                                ?>
                                                <h4>T1 Shapire VIP</h4>
                                                <p class="mt-2 card-text"><?php echo "$jumlah_igdcc"; ?> data</p>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="col-md-4 grid-margin stretch-card">
                            <div class="card bg-gradient-danger">
                                <a href="t2DEDomestik.php" class="text-white" style="text-decoration: none;">
                                    <div class="card-body">
                                        <div class="d-flex flex-row align-items-top">
                                            <i class="mdi mdi-airplane icon-lg" style="margin-right: 8px !important;"></i>
                                            <div class="ml-3">
                                                <?php
                                                $data_igdcc = mysqli_query($koneksi, "SELECT * FROM admin_igdcc");
                                                $jumlah_igdcc = mysqli_num_rows($data_igdcc);
                                                ?>
                                                <h4>T2 D-E Domestik</h4>
                                                <p class="mt-2 card-text"><?php echo "$jumlah_igdcc"; ?> data</p>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="col-md-4 grid-margin stretch-card">
                            <div class="card bg-gradient-primary">
                                <a href="t3Domestik.php" class="text-white" style="text-decoration: none;">
                                    <div class="card-body">
                                        <div class="d-flex flex-row align-items-top">
                                            <i class="mdi mdi-airplane icon-lg" style="margin-right: 8px !important;"></i>
                                            <div class="ml-3">
                                                <?php
                                                $data_igdcc = mysqli_query($koneksi, "SELECT * FROM admin_igdcc");
                                                $jumlah_igdcc = mysqli_num_rows($data_igdcc);
                                                ?>
                                                <h4>T3 Domestik</h4>
                                                <p class="mt-2 card-text"><?php echo "$jumlah_igdcc"; ?> data</p>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="col-md-4 grid-margin stretch-card">
                            <div class="card bg-gradient-success">
                                <a href="t3Internasional.php" class="text-white" style="text-decoration: none;">
                                    <div class="card-body">
                                        <div class="d-flex flex-row align-items-top">
                                            <i class="mdi mdi-airplane icon-lg" style="margin-right: 8px !important;"></i>
                                            <div class="ml-3">
                                                <?php
                                                $data_igdcc = mysqli_query($koneksi, "SELECT * FROM admin_igdcc");
                                                $jumlah_igdcc = mysqli_num_rows($data_igdcc);
                                                ?>
                                                <h4>T3 Internasional</h4>
                                                <p class="mt-2 card-text"><?php echo "$jumlah_igdcc"; ?> data</p>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                    <!-- <div class="row">
                        <div class="col-md-12 grid-margin stretch-card">
                            <div class="card">
                                <div class="card-body">
                                    <div class="clearfix">
                                        <h4 class="card-title float-left">Visit And Sales Statistics</h4>
                                        <div id="visit-sale-chart-legend" class="rounded-legend legend-horizontal legend-top-right float-right"></div>
                                    </div>
                                    <canvas id="visit-sale-chart" class="mt-4"></canvas>
                                </div>
                            </div>
                        </div>
                    </div> -->
                </div>
                <!-- content-wrapper ends -->
                <!-- partial:partials/_footer.html -->
                <?php include 'footer.php'; ?>
                <!-- partial -->
            </div>
            <!-- main-panel ends -->
        </div>
        <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="assets/vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <script src="assets/vendors/chart.js/Chart.min.js"></script>
    <script src="assets/js/jquery.cookie.js" type="text/javascript"></script>
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="assets/js/off-canvas.js"></script>
    <script src="assets/js/hoverable-collapse.js"></script>
    <script src="assets/js/misc.js"></script>
    <!-- endinject -->
    <!-- Custom js for this page -->
    <script src="assets/js/dashboard.js"></script>
    <script src="assets/js/todolist.js"></script>
    <!-- End custom js for this page -->
</body>

</html>