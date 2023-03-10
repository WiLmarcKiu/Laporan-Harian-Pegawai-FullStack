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
    <!-- DataTables -->
    <link rel="stylesheet" href="plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
</head>
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

<body>
    <div class="container-scroller">
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
                            </span> Admin
                        </h3>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Admin</li>
                            </ol>
                        </nav>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Data Admin</h4>
                            <hr>
                            <?php
                            // mendapatkan id_admin yang login
                            $id_admin = $_SESSION["admin"]["id_admin"];

                            $ambil = $koneksi->query("SELECT * FROM admin WHERE id_admin ='$id_admin'");
                            $pecah = $ambil->fetch_assoc();
                            ?>
                            <div class="row justify-content-center align-items-center">
                                <div class="col-lg-4">
                                    <div class="text-center pb-4">
                                        <img src="../img/logo.png" style="width: 200px; height: 200px;" alt="profile" class="img-lg rounded-circle mb-3" />
                                        <p><b><?php echo $pecah["username"]; ?></b></p>
                                        <!-- <div class="d-flex justify-content-between">
                                            <button class="btn btn-gradient-success">Hire Me</button>
                                            <button class="btn btn-gradient-success">Follow</button>
                                        </div> -->
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <form action="" method="POST">
                                        <div class="form-group" style="width: 100% !important;">
                                            <label for="">Username :</label>
                                            <input type="username" class="form-control" name="username" required value="<?php echo $pecah["username"]; ?>" disabled>
                                        </div>
                                        <div class="form-group" style="width: 100% !important;">
                                            <label for="">Password :</label>
                                            <input type="text" class="form-control" name="password" required value="<?php echo $pecah["password"]; ?>" disabled>
                                        </div>
                                        <a href="index.php" class="btn btn-gradient-primary">Dashboard</a>
                                    </form>
                                    <?php
                                    // $ambil = $koneksi->query("SELECT * FROM admin WHERE id_admin='$_GET[id]'");
                                    // $pecah = $ambil->fetch_assoc();
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
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
    <!-- jQuery -->
    <script src="plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- plugins:js -->
    <script src="assets/vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="assets/js/off-canvas.js"></script>
    <script src="assets/js/hoverable-collapse.js"></script>
    <script src="assets/js/misc.js"></script>
    <!-- endinject -->
    <!-- Custom js for this page -->
    <!-- End custom js for this page -->
    <!-- DataTables  & Plugins -->
    <?php include 'jsDataTable.php'; ?>
</body>

</html>