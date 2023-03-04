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
                            </span> Laporan T1A
                        </h3>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Laporan T1A</li>
                            </ol>
                        </nav>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Daftar Laporan T1A</h4>
                            <hr>
                            <!-- <a href="" class="btn btn-sm btn-gradient-primary mb-3" title="Unduh Pdf Laporan Keseluruhan"><i class="mdi mdi-cloud-download"></i></a> -->
                            <div class="table-responsive">
                                <table id="example1" class="table table-hover">
                                    <thead class="table-secondary">
                                        <tr>
                                            <th>No</th>
                                            <th>Aksi</th>
                                            <th>Pelaporan Tanggal</th>
                                            <th>Petugas</th>
                                            <th>Format Laporan</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $nomor = 1; ?>
                                        <?php $ambil = mysqli_query($koneksi, "SELECT * FROM laporanT1A"); ?>
                                        <?php while ($data = $ambil->fetch_assoc()) { ?>
                                            <tr>
                                                <td><?= $nomor; ?></td>
                                                <td>
                                                    <a href="" class="btn btn-sm btn-gradient-primary" data-toggle="modal" data-target="#Detail<?= $data['id_laporanT1A']; ?>" title="Detail Laporan"><i class="mdi mdi-eye"></i> Detail Laporan</a>
                                                </td>
                                                <td><?= date("d F Y", strtotime($data['tgl_lapor'])) ?></td>
                                                <td><?= $data['petugas']; ?></td>
                                                <td><?= $data['formatLaporan']; ?></td>
                                            </tr>

                                            <!-- Modal Detail Data -->
                                            <div class="modal fade" id="Detail<?= $data['id_laporanT1A']; ?>" tabindex="-1" role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="ModalLabel">Detail Laporan T1A</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="border: none; outline: none;">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form method="POST" enctype="multipart/form-data">
                                                                <div class="form-group">
                                                                    <label class="col-form-label">Pelaporan Tanggal T1A :</label>
                                                                    <input type="text" class="form-control" value="<?= date("d F Y", strtotime($data['tgl_lapor'])) ?>" disabled>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="col-form-label">Jumlah Pesawat - Kedatangan T1A :</label>
                                                                    <input type="text" class="form-control" value="<?= $data['jumlahPesawat_kedatangan']; ?>" disabled>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="col-form-label">Pax - Kedatangan T1A :</label>
                                                                    <input type="text" class="form-control" value="<?= $data['paxKedatangan']; ?>" disabled>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="col-form-label">Personil - Kedatangan T1A :</label>
                                                                    <input type="text" class="form-control" value="<?= $data['personilKedatangan']; ?>" disabled>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="col-form-label">Pengawasan TS - Kedatangan T1A :</label>
                                                                    <input type="text" class="form-control" value="<?= $data['pengawasanTS_kedatangan']; ?>" disabled>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="col-form-label">Jumlah Pesawat - Keberangkatan T1A :</label>
                                                                    <input type="text" class="form-control" value="<?= $data['jumlahPesawat_keberangkatan']; ?>" disabled>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="col-form-label">Pax - Keberangkatan T1A :</label>
                                                                    <input type="text" class="form-control" value="<?= $data['paxKeberangkatan']; ?>" disabled>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="col-form-label">Personil - Keberangkatan T1A :</label>
                                                                    <input type="text" class="form-control" value="<?= $data['personilKeberangkatan']; ?>" disabled>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="col-form-label">Validasi Manual - Keberangkatan T1A :</label>
                                                                    <input type="text" class="form-control" value="<?= $data['validasiManual_keberangkatan']; ?>" disabled>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="col-form-label">Validasi by PL - Keberangkatan T1A :</label>
                                                                    <input type="text" class="form-control" value="<?= $data['validasiBy_PL']; ?>" disabled>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="col-form-label">Berobat Klinik T1A :</label>
                                                                    <input type="text" class="form-control" value="<?= $data['berobatKlinik']; ?>" disabled>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="col-form-label">LT Hamil - Klinik T1A :</label>
                                                                    <input type="text" class="form-control" value="<?= $data['LTHamil_klinik']; ?>" disabled>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="col-form-label">LT Umum - Klinik T1A :</label>
                                                                    <input type="text" class="form-control" value="<?= $data['LTUmum_klinik']; ?>" disabled>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="col-form-label">TLT Hamil - Klinik T1A :</label>
                                                                    <input type="text" class="form-control" value="<?= $data['TLTHamil_klinik']; ?>" disabled>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="col-form-label">TLT Umum - Klinik T1A :</label>
                                                                    <input type="text" class="form-control" value="<?= $data['TLTUmum_klinik']; ?>" disabled>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="col-form-label">Rujuk - Klinik T1A :</label>
                                                                    <input type="text" class="form-control" value="<?= $data['rujukKlinik']; ?>" disabled>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="col-form-label">Laporan Notifikasi Penemuan Kasus COVID-19 T1A :</label>
                                                                    <textarea type="text" rows="3" class="form-control" disabled><?= $data['laporanNotifikasi_penemuanKasusCOVID']; ?></textarea>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="col-form-label">Petugas T1A :</label>
                                                                    <textarea type="text" rows="3" class="form-control" disabled><?= $data['petugas']; ?></textarea>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="col-form-label">Relawan Pagi T1A :</label>
                                                                    <textarea type="text" rows="3" class="form-control" disabled><?= $data['relawanPagi']; ?></textarea>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="col-form-label">Relawan Malam T1A :</label>
                                                                    <textarea type="text" rows="3" class="form-control" disabled><?= $data['relawanMalam']; ?></textarea>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="col-form-label">Laporan/Keterangan Tambahan T1A (bila ada) :</label>
                                                                    <textarea type="text" rows="4" class="form-control" disabled><?= $data['laporanKeterangan_tambahan']; ?></textarea>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="col-form-label">Format Laporan T1A :</label>
                                                                    <br>
                                                                    <a href="unduhLaporan_t1A.php?filename=<?= $data['formatLaporan']; ?>" class="btn btn-gradient-primary"><i class="mdi mdi-cloud-download"></i> Unduh Laporan</a>
                                                                </div>
                                                            </form>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-light" data-dismiss="modal">Tutup</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- End Modal Detail Data -->

                                            <?php $nomor++; ?>
                                        <?php } ?>
                                    </tbody>
                                </table>
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