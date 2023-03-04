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
                            </span> Laporan T3 Domestik
                        </h3>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Laporan T3 Domestik</li>
                            </ol>
                        </nav>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Daftar Laporan T3 Domestik</h4>
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
                                        <?php $ambil = mysqli_query($koneksi, "SELECT * FROM laporanT3Domestik"); ?>
                                        <?php while ($data = $ambil->fetch_assoc()) { ?>
                                            <tr>
                                                <td><?= $nomor; ?></td>
                                                <td>
                                                    <a href="" class="btn btn-sm btn-gradient-primary" data-toggle="modal" data-target="#Detail<?= $data['id_laporanT3Domestik']; ?>" title="Detail Laporan"><i class="mdi mdi-eye"></i> Detail Laporan</a>
                                                </td>
                                                <td><?= date("d F Y", strtotime($data['tgl_lapor'])) ?></td>
                                                <td><?= $data['petugas']; ?></td>
                                                <td><?= $data['formatLaporan']; ?></td>
                                            </tr>

                                            <!-- Modal Detail Data -->
                                            <div class="modal fade" id="Detail<?= $data['id_laporanT3Domestik']; ?>" tabindex="-1" role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="ModalLabel">Detail Laporan T3 Domestik</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="border: none; outline: none;">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form method="POST" enctype="multipart/form-data">
                                                                <div class="form-group">
                                                                    <label class="col-form-label">Pelaporan Tanggal T3 Domestik :</label>
                                                                    <input type="text" class="form-control" value="<?= date("d F Y", strtotime($data['tgl_lapor'])) ?>" disabled>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="col-form-label">Kedatangan (flight) T3 Domestik :</label>
                                                                    <input type="text" class="form-control" value="<?= $data['kedatanganFlight']; ?>" disabled>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="col-form-label">Cargo - Kedatangan T3 Domestik :</label>
                                                                    <input type="text" class="form-control" value="<?= $data['cargoKedatangan']; ?>" disabled>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="col-form-label">Pax - Kedatangan T3 Domestik :</label>
                                                                    <input type="text" class="form-control" value="<?= $data['paxKedatangan']; ?>" disabled>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="col-form-label">Cabin Crew - Kedatangan T3 Domestik :</label>
                                                                    <input type="text" class="form-control" value="<?= $data['cabinCrew_kedatangan']; ?>" disabled>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="col-form-label">Keberangkatan (flight) T3 Domestik :</label>
                                                                    <input type="text" class="form-control" value="<?= $data['keberangkatanFlight']; ?>" disabled>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="col-form-label">Cargo - Keberangkatan T3 Domestik :</label>
                                                                    <input type="text" class="form-control" value="<?= $data['cargoKeberangkatan']; ?>" disabled>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="col-form-label">Pax - Keberangkatan T3 Domestik :</label>
                                                                    <input type="text" class="form-control" value="<?= $data['paxKeberangkatan']; ?>" disabled>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="col-form-label">Cabin Crew - Keberangkatan T3 Domestik (Jumlah tes COVID-19 dan maskapai) :</label>
                                                                    <input type="text" class="form-control" value="<?= $data['cabinCrew_keberangkatan']; ?>" disabled>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="col-form-label">Laporan Validasi Manual Keberangkatan T3 Domestik :</label>
                                                                    <textarea type="text" rows="3" class="form-control" disabled><?= $data['laporanValidasi_manualKeberangkatan']; ?></textarea>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="col-form-label">Validasi ke Hongkong T3 Domestik :</label>
                                                                    <input type="text" class="form-control" value="<?= $data['validasiHongkong']; ?>" disabled>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="col-form-label">Profil Penapisan dengan PeduliLindungi T3 Domestik :</label>
                                                                    <input type="text" class="form-control" value="<?= $data['profilPenapisan_PL']; ?>" disabled>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="col-form-label">Data WNA/WNI selesai masa Karantina T3 Domestik :</label>
                                                                    <input type="text" class="form-control" value="<?= $data['dataWNA_WNISelesaiKarantina']; ?>" disabled>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="col-form-label">Laporan PE T3 Domestik :</label>
                                                                    <textarea type="text" rows="3" class="form-control" disabled><?= $data['laporanPE']; ?></textarea>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="col-form-label">Berobat Klinik T3 Domestik :</label>
                                                                    <input type="text" class="form-control" value="<?= $data['berobatKlinik']; ?>" disabled>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="col-form-label">LT Hamil T3 Domestik :</label>
                                                                    <input type="text" class="form-control" value="<?= $data['LTHamil']; ?>" disabled>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="col-form-label">LT Umum T3 Domestik :</label>
                                                                    <input type="text" class="form-control" value="<?= $data['LTUmum']; ?>" disabled>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="col-form-label">TLT Hamil T3 Domestik :</label>
                                                                    <input type="text" class="form-control" value="<?= $data['TLTHamil']; ?>" disabled>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="col-form-label">TLT Umum T3 Domestik :</label>
                                                                    <input type="text" class="form-control" value="<?= $data['TLTUmum']; ?>" disabled>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="col-form-label">Laporan Kematian T3 Domestik :</label>
                                                                    <textarea type="text" rows="3" class="form-control" disabled><?= $data['laporanKematian']; ?></textarea>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="col-form-label">Data Calon pax dengan Antigen/PCR Positif T3 Domestik :</label>
                                                                    <input type="text" class="form-control" value="<?= $data['dataCalon_paxAntigenPCRPositif']; ?>" disabled>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="col-form-label">Kesimpulan pemeriksaan suhu pax dan personil T3 Domestik :</label>
                                                                    <textarea type="text" rows="3" class="form-control" disabled><?= $data['kesimpulanPemeriksaan_suhuPaxPersonil']; ?></textarea>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="col-form-label">Petugas T3 Domestik :</label>
                                                                    <textarea type="text" rows="3" class="form-control" disabled><?= $data['petugas']; ?></textarea>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="col-form-label">Tenaga Bantuan Pagi T3 Domestik :</label>
                                                                    <textarea type="text" rows="3" class="form-control" disabled><?= $data['tenagaBantuan_pagi']; ?></textarea>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="col-form-label">Tenaga Bantuan Malam T3 Domestik :</label>
                                                                    <textarea type="text" rows="3" class="form-control" disabled><?= $data['tenagaBantuan_malam']; ?></textarea>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="col-form-label">Laporan/Keterangan Tambahan T3 Domestik (bila ada) :</label>
                                                                    <textarea type="text" rows="4" class="form-control" disabled><?= $data['laporanKeterangan_tambahan']; ?></textarea>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="col-form-label">Format Laporan T3 Domestik :</label>
                                                                    <br>
                                                                    <a href="unduhLaporan_t3Domestik.php?filename=<?= $data['formatLaporan']; ?>" class="btn btn-gradient-primary"><i class="mdi mdi-cloud-download"></i> Unduh Laporan</a>
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