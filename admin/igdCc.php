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
                            </span> Laporan IGD CC
                        </h3>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Laporan IGD CC</li>
                            </ol>
                        </nav>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Daftar Laporan IGD CC</h4>
                            <hr>
                            <a href="excelIgdCc.php" class="btn btn-sm btn-gradient-primary mb-3" title="Unduh Laporan Keseluruhan"><i class="mdi mdi-cloud-download"></i> Unduh Excel</a>
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
                                        <?php $ambil = mysqli_query($koneksi, "SELECT * FROM laporanIgdCc"); ?>
                                        <?php while ($data = $ambil->fetch_assoc()) { ?>
                                            <tr>
                                                <td><?= $nomor; ?></td>
                                                <td>
                                                    <a href="" class="btn btn-sm btn-gradient-primary" data-toggle="modal" data-target="#Detail<?= $data['id_laporanIgdCc']; ?>" title="Detail Laporan"><i class="mdi mdi-eye"></i> Detail Laporan</a>
                                                </td>
                                                <td><?= date("d F Y", strtotime($data['tgl_lapor'])) ?></td>
                                                <td><?= $data['petugas']; ?></td>
                                                <td><?= $data['formatLaporan']; ?></td>
                                            </tr>

                                            <!-- Modal Detail Data -->
                                            <div class="modal fade" id="Detail<?= $data['id_laporanIgdCc']; ?>" tabindex="-1" role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="ModalLabel">Detail Laporan IGD CC</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="border: none; outline: none;">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form method="POST" enctype="multipart/form-data">
                                                                <div class="form-group">
                                                                    <label class="col-form-label">Pelaporan Tanggal IGD CC :</label>
                                                                    <input type="text" class="form-control" value="<?= date("d F Y", strtotime($data['tgl_lapor'])) ?>" disabled>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="col-form-label">Stok Awal - Rapid Antibodi IGD CC :</label>
                                                                    <input type="text" class="form-control" value="<?= $data['stokAwal_rapidAntibodi']; ?>" disabled>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="col-form-label">Terima Stok - Rapid Antibodi IGD CC :</label>
                                                                    <input type="text" class="form-control" value="<?= $data['terimaStok_rapidAntibodi']; ?>" disabled>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="col-form-label">Pemakaian - Rapid Antibodi IGD CC :</label>
                                                                    <input type="text" class="form-control" value="<?= $data['pemakaianRapid_antibodi']; ?>" disabled>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="col-form-label">Hasil Rapid Antibodi Reaktif IGD CC :</label>
                                                                    <input type="text" class="form-control" value="<?= $data['hasilRapid_antibodiReaktif']; ?>" disabled>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="col-form-label">Hasil Rapid Antibodi Non Reaktif IGD CC :</label>
                                                                    <input type="text" class="form-control" value="<?= $data['hasilRapid_antibodiNonReaktif']; ?>" disabled>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="col-form-label">Stok Awal - Rapid ANTIGEN IGD CC :</label>
                                                                    <input type="text" class="form-control" value="<?= $data['stokAwal_rapidAntigen']; ?>" disabled>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="col-form-label">Terima Stok - Rapid ANTIGEN IGD CC :</label>
                                                                    <input type="text" class="form-control" value="<?= $data['terimaStok_rapidAntigen']; ?>" disabled>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="col-form-label">Pemakaian Rapid ANTIGEN IGD CC :</label>
                                                                    <input type="text" class="form-control" value="<?= $data['pemakaianRapidAntigen']; ?>" disabled>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="col-form-label">Hasil Rapid ANTIGEN Negatif IGD CC :</label>
                                                                    <input type="text" class="form-control" value="<?= $data['hasilRapid_antigenNegatif']; ?>" disabled>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="col-form-label">Hasil Rapid ANTIGEN Positif IGD CC :</label>
                                                                    <input type="text" class="form-control" value="<?= $data['hasilRapid_antigenPositif']; ?>" disabled>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="col-form-label">Stok Akhir - Rapid ANTIGEN IGD CC :</label>
                                                                    <input type="text" class="form-control" value="<?= $data['stokAkhir_rapidAntigen']; ?>" disabled>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="col-form-label">Pengunjung Klinik Berobat Jalan IGD CC :</label>
                                                                    <input type="text" class="form-control" value="<?= $data['pengunjungKlinik_berobatJalan']; ?>" disabled>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="col-form-label">Pengunjung Klinik LT/SIAOS IGD CC :</label>
                                                                    <input type="text" class="form-control" value="<?= $data['pengunjungKlinik_ltSiaos']; ?>" disabled>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="col-form-label">Pengunjung Klinik TLT IGD CC :</label>
                                                                    <input type="text" class="form-control" value="<?= $data['pengunjungKlinik_tlt']; ?>" disabled>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="col-form-label">Pengunjung Klinik Meninggal IGD CC :</label>
                                                                    <input type="text" class="form-control" value="<?= $data['pengunjungKlinik_meninggal']; ?>" disabled>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="col-form-label">Jumlah Penerbitan Dokumen Surat Izin Angkut Jenazah IGD CC :</label>
                                                                    <input type="text" class="form-control" value="<?= $data['jumlahPenerbitan_dokumenSuratIzinAngkutJenazah']; ?>" disabled>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="col-form-label">Jumlah Laporan Ambulance IGD CC :</label>
                                                                    <input type="text" class="form-control" value="<?= $data['jumlahLaporan_ambulance']; ?>" disabled>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="col-form-label">Jumlah Laporan KLL IGD CC :</label>
                                                                    <input type="text" class="form-control" value="<?= $data['jumlahLaporan_kll']; ?>" disabled>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="col-form-label">Jumlah Laporan Kejadian K3 IGD CC :</label>
                                                                    <input type="text" class="form-control" value="<?= $data['jumlahLaporan_kejadianK3']; ?>" disabled>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="col-form-label">Jumlah Laporan Kematian IGD CC :</label>
                                                                    <input type="text" class="form-control" value="<?= $data['jumlahLaporan_kematian']; ?>" disabled>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="col-form-label">Pengiriman Sampel ke BBTKLPP IGD CC :</label>
                                                                    <input type="text" class="form-control" value="<?= $data['pengirimanSampel_keBbtklpp']; ?>" disabled>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="col-form-label">Petugas IGD CC :</label>
                                                                    <input type="text" class="form-control" value="<?= $data['petugas']; ?>" disabled>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="col-form-label">Laporan/Keterangan Tambahan IGD CC :</label>
                                                                    <textarea type="text" rows="4" class="form-control" disabled><?= $data['laporanKeterangan_tambahan']; ?></textarea>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="col-form-label">Format Laporan IGD CC :</label>
                                                                    <br>
                                                                    <a href="unduhLaporan_igdCc.php?filename=<?= $data['formatLaporan']; ?>" class="btn btn-gradient-primary"><i class="mdi mdi-cloud-download"></i> Unduh Laporan</a>
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