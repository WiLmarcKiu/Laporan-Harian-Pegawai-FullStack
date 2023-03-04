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
                            </span> Laporan T3 Internasional
                        </h3>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Laporan T3 Internasional</li>
                            </ol>
                        </nav>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Daftar Laporan T3 Internasional</h4>
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
                                        <?php $ambil = mysqli_query($koneksi, "SELECT * FROM laporanT3Internasional"); ?>
                                        <?php while ($data = $ambil->fetch_assoc()) { ?>
                                            <tr>
                                                <td><?= $nomor; ?></td>
                                                <td>
                                                    <a href="" class="btn btn-sm btn-gradient-primary" data-toggle="modal" data-target="#Detail<?= $data['id_laporanT3Internasional']; ?>" title="Detail Laporan"><i class="mdi mdi-eye"></i> Detail Laporan</a>
                                                </td>
                                                <td><?= date("d F Y", strtotime($data['tgl_lapor'])) ?></td>
                                                <td><?= $data['perwiraJaga']; ?></td>
                                                <td><?= $data['formatLaporan']; ?></td>
                                            </tr>

                                            <!-- Modal Detail Data -->
                                            <div class="modal fade" id="Detail<?= $data['id_laporanT3Internasional']; ?>" tabindex="-1" role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="ModalLabel">Detail Laporan T3 Internasional</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="border: none; outline: none;">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form method="POST" enctype="multipart/form-data">
                                                                <div class="form-group">
                                                                    <label class="col-form-label">Pelaporan Tanggal T3 Internasional :</label>
                                                                    <input type="text" class="form-control" value="<?= date("d F Y", strtotime($data['tgl_lapor'])) ?>" disabled>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="col-form-label">Kedatangan (flight) T3 International :</label>
                                                                    <input type="text" class="form-control" value="<?= $data['kedatanganFlight']; ?>" disabled>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="col-form-label">Pax - Kedatangan T3 International :</label>
                                                                    <input type="text" class="form-control" value="<?= $data['paxKedatangan_flight']; ?>" disabled>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="col-form-label">Personil - Kedatangan T3 International :</label>
                                                                    <input type="text" class="form-control" value="<?= $data['personilKedatangan']; ?>" disabled>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="col-form-label">Penerbangan Kargo Pesawat T3 International :</label>
                                                                    <input type="text" class="form-control" value="<?= $data['penerbanganKargo_pesawat']; ?>" disabled>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="col-form-label">Penerbangan Kargo Personil T3 International :</label>
                                                                    <input type="text" class="form-control" value="<?= $data['penerbanganKargo_personil']; ?>" disabled>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="col-form-label">Scan PL Merah Penumpang T3 International :</label>
                                                                    <input type="text" class="form-control" value="<?= $data['scanPL_merahPenumpang']; ?>" disabled>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="col-form-label">Vaksin Tidak Lengkap T3 International :</label>
                                                                    <input type="text" class="form-control" value="<?= $data['vaksinTidak_lengkap']; ?>" disabled>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="col-form-label">Belum integrasi PL T3 International (Jumlah tes COVID-19 dan maskapai) :</label>
                                                                    <input type="text" class="form-control" value="<?= $data['belumIntegrasi_PL']; ?>" disabled>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="col-form-label">Belum ada PeduliLindungi T3 International :</label>
                                                                    <input type="text" class="form-control" value="<?= $data['belumAda_PL']; ?>" disabled>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="col-form-label">Scan PL Hijau Penumpang T3 International :</label>
                                                                    <input type="text" class="form-control" value="<?= $data['scanPL_hijauPenumpang']; ?>" disabled>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="col-form-label">Jumlah dan Persentase Penumpang WNI T3 International :</label>
                                                                    <input type="text" class="form-control" value="<?= $data['jumlahPresentase_penumpangWNI']; ?>" disabled>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="col-form-label">Jumlah dan Persentase Penumpang WNA T3 International :</label>
                                                                    <input type="text" class="form-control" value="<?= $data['jumlahPresentase_penumpangWNA']; ?>" disabled>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="col-form-label">WNI Vaksinasi Tidak Lengkap T3 International :</label>
                                                                    <input type="text" class="form-control" value="<?= $data['WNIVaksinasi_tidakLengkap']; ?>" disabled>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="col-form-label">WNI dibawah 18 Tahun - Vaksinasi Tidak Lengkap T3 International :</label>
                                                                    <input type="text" class="form-control" value="<?= $data['WNIDibawah18_vaksinasiTidakLengkap']; ?>" disabled>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="col-form-label">WNI komorbid - Vaksinasi Tidak Lengkap T3 International :</label>
                                                                    <input type="text" class="form-control" value="<?= $data['WNIKomorbid_vaksinasiTidakLengkap']; ?>" disabled>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="col-form-label">WNI Lainnya - Vaksinasi Tidak Lengkap T3 International :</label>
                                                                    <input type="text" class="form-control" value="<?= $data['WNILainnya_vaksinasiTidakLengkap']; ?>" disabled>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="col-form-label">WNA Vaksinasi Tidak Lengkap T3 International :</label>
                                                                    <input type="text" class="form-control" value="<?= $data['WNAVaksinasi_tidakLengkap']; ?>" disabled>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="col-form-label">WNA dibawah 18 Tahun - Vaksinasi Tidak Lengkap T3 International :</label>
                                                                    <input type="text" class="form-control" value="<?= $data['WNADibawah18_vaksinasiTidakLengkap']; ?>" disabled>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="col-form-label">WNA komorbid - Vaksinasi Tidak Lengkap T3 International :</label>
                                                                    <input type="text" class="form-control" value="<?= $data['WNAKomorbid_vaksinasiTidakLengkap']; ?>" disabled>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="col-form-label">WNA Lainnya - Vaksinasi Tidak Lengkap T3 International :</label>
                                                                    <input type="text" class="form-control" value="<?= $data['WNALainnya_vaksinasiTidakLengkap']; ?>" disabled>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="col-form-label">WNI Vaksinasi Lengkap T3 International :</label>
                                                                    <input type="text" class="form-control" value="<?= $data['WNIVaksinasi_lengkap']; ?>" disabled>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="col-form-label">WNA Vaksinasi Lengkap T3 International :</label>
                                                                    <input type="text" class="form-control" value="<?= $data['WNAVaksinasi_lengkap']; ?>" disabled>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="col-form-label">WNI dilakukan swab PCR di Kedatangan T3 International :</label>
                                                                    <input type="text" class="form-control" value="<?= $data['WNISwab_PCRKedatangan']; ?>" disabled>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="col-form-label">WNA dilakukan swab PCR di Kedatangan T3 International :</label>
                                                                    <input type="text" class="form-control" value="<?= $data['WNASwab_PCRKedatangan']; ?>" disabled>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="col-form-label">Ikterik T3 International :</label>
                                                                    <input type="text" class="form-control" value="<?= $data['ikterik']; ?>" disabled>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="col-form-label">Rujukan T3 International :</label>
                                                                    <input type="text" class="form-control" value="<?= $data['rujukan']; ?>" disabled>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="col-form-label">Penerbitan Surat LT T3 International :</label>
                                                                    <input type="text" class="form-control" value="<?= $data['penerbitanSurat_LT']; ?>" disabled>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="col-form-label">Penerbitan Surat TLT T3 International :</label>
                                                                    <input type="text" class="form-control" value="<?= $data['penerbitanSurat_TLT']; ?>" disabled>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="col-form-label">Jumlah Pasien T3 International :</label>
                                                                    <input type="text" class="form-control" value="<?= $data['jumlahPasien']; ?>" disabled>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="col-form-label">Laporan Kematian T3 International :</label>
                                                                    <textarea type="text" rows="3" class="form-control" disabled><?= $data['laporanKematian']; ?></textarea>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="col-form-label">Tolak Masuk T3 International :</label>
                                                                    <input type="text" class="form-control" value="<?= $data['tolakMasuk']; ?>" disabled>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="col-form-label">Karantina Wisma T3 International :</label>
                                                                    <input type="text" class="form-control" value="<?= $data['karantinaWisma']; ?>" disabled>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="col-form-label">Karantina Hotel T3 International :</label>
                                                                    <input type="text" class="form-control" value="<?= $data['karantinaHotel']; ?>" disabled>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="col-form-label">Laporan Kedatangan Jamaah T3 International :</label>
                                                                    <textarea type="text" rows="3" class="form-control" disabled><?= $data['laporanKedatangan_jamaah']; ?></textarea>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="col-form-label">Laporan Pengamatan Gejala dan Tanda COVID-19 T3 International :</label>
                                                                    <textarea type="text" rows="3" class="form-control" disabled><?= $data['laporanPengamatan_gejalaTandaCOVID']; ?></textarea>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="col-form-label">Laporan Disinfeksi Area Kedatangan T3 Internasional T3 International :</label>
                                                                    <textarea type="text" rows="3" class="form-control" disabled><?= $data['laporanDisinfeksi_areaKedatangan']; ?></textarea>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="col-form-label">Perwira Jaga T3 International :</label>
                                                                    <textarea type="text" rows="3" class="form-control" disabled><?= $data['perwiraJaga']; ?></textarea>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="col-form-label">Anggota T3 International :</label>
                                                                    <textarea type="text" rows="3" class="form-control" disabled><?= $data['anggota']; ?></textarea>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="col-form-label">Tim Shift PAGI Tenaga Bantuan COVID-19 KKP T3I :</label>
                                                                    <textarea type="text" rows="3" class="form-control" disabled><?= $data['timShift_pagiTenagaBantuanCOVID']; ?></textarea>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="col-form-label">Tim Shift MALAM Tenaga Bantuan COVID-19 KKP T3I :</label>
                                                                    <textarea type="text" rows="3" class="form-control" disabled><?= $data['timShift_malamTenagaBantuanCOVID']; ?></textarea>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="col-form-label">Laporan/Keterangan Tambahan T3 Internasional (bila ada) :</label>
                                                                    <textarea type="text" rows="4" class="form-control" disabled><?= $data['laporanKeterangan_tambahan']; ?></textarea>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="col-form-label">Format Laporan T3 Internasional :</label>
                                                                    <br>
                                                                    <a href="unduhLaporan_t3Internasional.php?filename=<?= $data['formatLaporan']; ?>" class="btn btn-gradient-primary"><i class="mdi mdi-cloud-download"></i> Unduh Laporan</a>
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