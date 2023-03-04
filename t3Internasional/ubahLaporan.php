<?php
date_default_timezone_set('Asia/Jakarta');
require '../koneksi.php';

if (!isset($_SESSION["t3Internasional"])) {
    echo "<script>alert('Silahkan Login terlebih dahulu');</script>";
    echo "<script>location='../index.php';</script>";
}
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>KKP SOETTA | T3 INTERNASIONAL</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- theme stylesheet-->
    <!-- CSS Files -->
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <!-- <link rel="stylesheet" href="../assets/css/atlantis.min.css"> -->
    <link rel="shortcut icon" href="../img/logo.png" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Koulen&family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&family=Montserrat&family=Nunito:wght@400;600;700&family=Pacifico&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Staatliches&display=swap" rel="stylesheet">
</head>
<style>
    html {
        min-height: 100%;
    }

    body {
        font-family: 'Poppins', sans-serif;
    }

    .breadcrumb {
        display: flex;
        flex-wrap: wrap;
        padding: 20px 30px;
        margin-bottom: 1rem;
        list-style: none;
        margin: 30px;
        background-color: rgba(255, 255, 255, 0.4);
        box-shadow: 0 0 15px rgba(8, 7, 16, 0.6);
    }

    .breadcrumb li a {
        text-decoration: none;
        color: #FFF;
        font-weight: 600;
    }

    .content {
        padding: 40px 30px;
    }

    .content .card {
        padding: 20px;
    }

    .content .card {
        background-color: rgba(255, 255, 255, 0.4);
        box-shadow: 0 0 15px rgba(8, 7, 16, 0.6);
    }

    .bg img {
        position: fixed;
        z-index: 10;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
    }

    .nav .nav-item .nav-link.active {
        background: #FFF;
    }

    .nav .nav-item .nav-link.active:hover {
        letter-spacing: 0;
    }

    .nav .nav-item .nav-link {
        transition: .3s ease;
    }

    .nav .nav-item .nav-link:hover {
        letter-spacing: 1px;
    }

    .garis {
        border: 1.2px solid #000;
        width: 100%;
        margin: 25px 0;
    }

    .form-group {
        margin-bottom: 30px;
    }

    #btn-kirim {
        background: #57C0E0;
        color: #FFF;
        transition: .5s ease;
    }

    #btn-kirim:hover {
        background: #183153;
    }

    .btn.btn-batal {
        background: #FFF;
        color: #000;
        transition: .5s ease;
    }

    .btn.btn-batal:hover {
        background: #FF6C63;
        color: #FFF;
    }

    input#tgl_lapor:hover {
        cursor: no-drop;
    }
</style>

<body style="background: #99CCCD;">
    <div class="container">
        <div class="content">
            <div class="bg">
                <img src="../img/logo.png" alt="">
            </div>
            <div class="card" style="width: 100%; position: relative; z-index: 20;">
                <div class="card-body">
                    <ul class="nav nav-pills nav-primary" id="pills-tab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active text-dark" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">Home</a>
                        </li>
                        <li class="nav-item">
                            <a href="../admin/signout.php" class="nav-link text-dark" aria-selected="false">Logout</a>
                        </li>
                    </ul>
                    <div class="tab-content mt-2" id="pills-tabContent">
                        <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                            <div class="home">
                                <div class="row justify-content-center">
                                    <div class="col-md-8 mt-4">
                                        <h4><span class="efek-ketik"></span></h4>
                                        <p>Awas COVID-19 Report adalah platform pengumpulan data pelaporan pengawasan COVID-19 untuk kemudahan kompilasi di terminal maupun IGD CC KKP Soetta.
                                        <div class="garis"></div>
                                        Keterangan : <br>1. Mohon agar disiapkan dokumen format laporan dengan ekstensi file PDF atau DOC. <br>2. Apabila tidak ada data yang diperoleh maka ditulis dengan angka nol (0) <br>3. Tanda bintang berwarna merah (<span class="text-danger"><b>*</b></span>) artinya wajib diisi !
                                        </p>
                                        <div class="garis"></div>
                                    </div>
                                </div>
                                <div class="row justify-content-center">
                                    <div class="col-md-6">
                                        <?php
                                        $tgl_kemarin = date('Y-m-d', strtotime("-1 day", strtotime(date("Y-m-d"))));

                                        $dataLaporan = $koneksi->query("SELECT * FROM laporanT3Internasional WHERE tgl_lapor = '$tgl_kemarin'");

                                        $laporan = $dataLaporan->fetch_assoc();
                                        ?>

                                        <form action="" method="POST" enctype="multipart/form-data">
                                            <div class="form-group">
                                                <label for="tgl_lapor">Pelaporan Tanggal</label>
                                                <input id="tgl_lapor" type="text" class="form-control" name="tgl_lapor" id="tgl_lapor" value="<?= date("d F Y", strtotime($laporan['tgl_lapor'])) ?>" required disabled>
                                            </div>

                                            <div class="form-group">
                                                <label for="kedatanganFlight">Kedatangan (flight) T3 International <span class="text-danger"><b>*</b></span></label>
                                                <input type="number" min="0" class="form-control" name="kedatanganFlight" id="kedatanganFlight" value="<?= $laporan['kedatanganFlight']; ?>" required>
                                            </div>

                                            <div class="form-group">
                                                <label for="paxKedatangan_flight">Pax - Kedatangan T3 International <span class="text-danger"><b>*</b></span></label>
                                                <input type="number" min="0" class="form-control" name="paxKedatangan_flight" id="paxKedatangan_flight" value="<?= $laporan['paxKedatangan_flight']; ?>" required>
                                            </div>

                                            <div class="form-group">
                                                <label for="personilKedatangan">Personil - Kedatangan T3 International <span class="text-danger"><b>*</b></span></label>
                                                <input type="number" min="0" class="form-control" name="personilKedatangan" id="personilKedatangan" value="<?= $laporan['personilKedatangan']; ?>" required>
                                            </div>

                                            <div class="form-group">
                                                <label for="penerbanganKargo_pesawat">Penerbangan Kargo Pesawat T3 International <span class="text-danger"><b>*</b></span></label>
                                                <input type="number" min="0" class="form-control" name="penerbanganKargo_pesawat" id="penerbanganKargo_pesawat" value="<?= $laporan['penerbanganKargo_pesawat']; ?>" required>
                                            </div>

                                            <div class="form-group">
                                                <label for="penerbanganKargo_personil">Penerbangan Kargo Personil T3 International <span class="text-danger"><b>*</b></span></label>
                                                <input type="number" min="0" class="form-control" name="penerbanganKargo_personil" id="penerbanganKargo_personil" value="<?= $laporan['penerbanganKargo_personil']; ?>" required>
                                            </div>

                                            <div class="form-group">
                                                <label for="scanPL_merahPenumpang">Scan PL Merah Penumpang T3 International <span class="text-danger"><b>*</b></span></label>
                                                <input type="number" min="0" class="form-control" name="scanPL_merahPenumpang" id="scanPL_merahPenumpang" value="<?= $laporan['scanPL_merahPenumpang']; ?>" required>
                                            </div>

                                            <div class="form-group">
                                                <label for="vaksinTidak_lengkap">Vaksin Tidak Lengkap T3 International <span class="text-danger"><b>*</b></span></label>
                                                <input type="number" min="0" class="form-control" name="vaksinTidak_lengkap" id="vaksinTidak_lengkap" value="<?= $laporan['vaksinTidak_lengkap']; ?>" required>
                                            </div>

                                            <div class="form-group">
                                                <label for="belumIntegrasi_PL">Belum integrasi PL T3 International <span class="text-danger"><b>*</b></span> <br>Jumlah tes COVID-19 dan maskapai</label>
                                                <input type="number" min="0" class="form-control" name="belumIntegrasi_PL" id="belumIntegrasi_PL" value="<?= $laporan['belumIntegrasi_PL']; ?>" required>
                                            </div>

                                            <div class="form-group">
                                                <label for="belumAda_PL">Belum ada PeduliLindungi T3 International <span class="text-danger"><b>*</b></span></label>
                                                <input type="number" min="0" class="form-control" name="belumAda_PL" id="belumAda_PL" value="<?= $laporan['belumAda_PL']; ?>" required>
                                            </div>

                                            <div class="form-group">
                                                <label for="scanPL_hijauPenumpang">Scan PL Hijau Penumpang T3 International <span class="text-danger"><b>*</b></span></label>
                                                <input type="number" min="0" class="form-control" name="scanPL_hijauPenumpang" id="scanPL_hijauPenumpang" value="<?= $laporan['scanPL_hijauPenumpang']; ?>" required>
                                            </div>

                                            <div class="form-group">
                                                <label for="jumlahPresentase_penumpangWNI">Jumlah dan Persentase Penumpang WNI T3 International <span class="text-danger"><b>*</b></span></label>
                                                <input type="text" class="form-control" name="jumlahPresentase_penumpangWNI" id="jumlahPresentase_penumpangWNI" value="<?= $laporan['jumlahPresentase_penumpangWNI']; ?>" required>
                                            </div>

                                            <div class="form-group">
                                                <label for="jumlahPresentase_penumpangWNA">Jumlah dan Persentase Penumpang WNA T3 International <span class="text-danger"><b>*</b></span></label>
                                                <input type="text" class="form-control" name="jumlahPresentase_penumpangWNA" id="jumlahPresentase_penumpangWNA" value="<?= $laporan['jumlahPresentase_penumpangWNA']; ?>" required>
                                            </div>

                                            <div class="form-group">
                                                <label for="WNIVaksinasi_tidakLengkap">WNI Vaksinasi Tidak Lengkap T3 International <span class="text-danger"><b>*</b></span></label>
                                                <input type="number" min="0" class="form-control" name="WNIVaksinasi_tidakLengkap" id="WNIVaksinasi_tidakLengkap" value="<?= $laporan['WNIVaksinasi_tidakLengkap']; ?>" required>
                                            </div>

                                            <div class="form-group">
                                                <label for="WNIDibawah18_vaksinasiTidakLengkap">WNI dibawah 18 Tahun - Vaksinasi Tidak Lengkap T3 International <span class="text-danger"><b>*</b></span></label>
                                                <input type="number" min="0" class="form-control" name="WNIDibawah18_vaksinasiTidakLengkap" id="WNIDibawah18_vaksinasiTidakLengkap" value="<?= $laporan['WNIDibawah18_vaksinasiTidakLengkap']; ?>" required>
                                            </div>

                                            <div class="form-group">
                                                <label for="WNIKomorbid_vaksinasiTidakLengkap">WNI komorbid - Vaksinasi Tidak Lengkap T3 International <span class="text-danger"><b>*</b></span></label>
                                                <input type="number" min="0" class="form-control" name="WNIKomorbid_vaksinasiTidakLengkap" id="WNIKomorbid_vaksinasiTidakLengkap" value="<?= $laporan['WNIKomorbid_vaksinasiTidakLengkap']; ?>" required>
                                            </div>

                                            <div class="form-group">
                                                <label for="WNILainnya_vaksinasiTidakLengkap">WNI Lainnya - Vaksinasi Tidak Lengkap T3 International <span class="text-danger"><b>*</b></span></label>
                                                <input type="number" min="0" class="form-control" name="WNILainnya_vaksinasiTidakLengkap" id="WNILainnya_vaksinasiTidakLengkap" value="<?= $laporan['WNILainnya_vaksinasiTidakLengkap']; ?>" required>
                                            </div>

                                            <div class="form-group">
                                                <label for="WNAVaksinasi_tidakLengkap">WNA Vaksinasi Tidak Lengkap T3 International <span class="text-danger"><b>*</b></span></label>
                                                <input type="number" min="0" class="form-control" name="WNAVaksinasi_tidakLengkap" id="WNAVaksinasi_tidakLengkap" value="<?= $laporan['WNAVaksinasi_tidakLengkap']; ?>" required>
                                            </div>

                                            <div class="form-group">
                                                <label for="WNADibawah18_vaksinasiTidakLengkap">WNA dibawah 18 Tahun - Vaksinasi Tidak Lengkap T3 International <span class="text-danger"><b>*</b></span></label>
                                                <input type="number" min="0" class="form-control" name="WNADibawah18_vaksinasiTidakLengkap" id="WNADibawah18_vaksinasiTidakLengkap" value="<?= $laporan['WNADibawah18_vaksinasiTidakLengkap']; ?>" required>
                                            </div>

                                            <div class="form-group">
                                                <label for="WNAKomorbid_vaksinasiTidakLengkap">WNA komorbid - Vaksinasi Tidak Lengkap T3 International <span class="text-danger"><b>*</b></span></label>
                                                <input type="number" min="0" class="form-control" name="WNAKomorbid_vaksinasiTidakLengkap" id="WNAKomorbid_vaksinasiTidakLengkap" value="<?= $laporan['WNAKomorbid_vaksinasiTidakLengkap']; ?>" required>
                                            </div>

                                            <div class="form-group">
                                                <label for="WNALainnya_vaksinasiTidakLengkap">WNA Lainnya - Vaksinasi Tidak Lengkap T3 International <span class="text-danger"><b>*</b></span></label>
                                                <input type="number" min="0" class="form-control" name="WNALainnya_vaksinasiTidakLengkap" id="WNALainnya_vaksinasiTidakLengkap" value="<?= $laporan['WNALainnya_vaksinasiTidakLengkap']; ?>" required>
                                            </div>

                                            <div class="form-group">
                                                <label for="WNIVaksinasi_lengkap">WNI Vaksinasi Lengkap T3 International <span class="text-danger"><b>*</b></span></label>
                                                <input type="number" min="0" class="form-control" name="WNIVaksinasi_lengkap" id="WNIVaksinasi_lengkap" value="<?= $laporan['WNIVaksinasi_lengkap']; ?>" required>
                                            </div>

                                            <div class="form-group">
                                                <label for="WNAVaksinasi_lengkap">WNA Vaksinasi Lengkap T3 International <span class="text-danger"><b>*</b></span></label>
                                                <input type="number" min="0" class="form-control" name="WNAVaksinasi_lengkap" id="WNAVaksinasi_lengkap" value="<?= $laporan['WNAVaksinasi_lengkap']; ?>" required>
                                            </div>

                                            <div class="form-group">
                                                <label for="WNISwab_PCRKedatangan">WNI dilakukan swab PCR di Kedatangan T3 International <span class="text-danger"><b>*</b></span></label>
                                                <input type="number" min="0" class="form-control" name="WNISwab_PCRKedatangan" id="WNISwab_PCRKedatangan" value="<?= $laporan['WNISwab_PCRKedatangan']; ?>" required>
                                            </div>

                                            <div class="form-group">
                                                <label for="WNASwab_PCRKedatangan">WNA dilakukan swab PCR di Kedatangan T3 International <span class="text-danger"><b>*</b></span></label>
                                                <input type="number" min="0" class="form-control" name="WNASwab_PCRKedatangan" id="WNASwab_PCRKedatangan" value="<?= $laporan['WNASwab_PCRKedatangan']; ?>" required>
                                            </div>

                                            <div class="form-group">
                                                <label for="ikterik">Ikterik T3 International <span class="text-danger"><b>*</b></span></label>
                                                <input type="number" min="0" class="form-control" name="ikterik" id="ikterik" value="<?= $laporan['ikterik']; ?>" required>
                                            </div>

                                            <div class="form-group">
                                                <label for="rujukan">Rujukan T3 International <span class="text-danger"><b>*</b></span></label>
                                                <input type="number" min="0" class="form-control" name="rujukan" id="rujukan" value="<?= $laporan['rujukan']; ?>" required>
                                            </div>

                                            <div class="form-group">
                                                <label for="penerbitanSurat_LT">Penerbitan Surat LT T3 International <span class="text-danger"><b>*</b></span></label>
                                                <input type="number" min="0" class="form-control" name="penerbitanSurat_LT" id="penerbitanSurat_LT" value="<?= $laporan['penerbitanSurat_LT']; ?>" required>
                                            </div>

                                            <div class="form-group">
                                                <label for="penerbitanSurat_TLT">Penerbitan Surat TLT T3 International <span class="text-danger"><b>*</b></span></label>
                                                <input type="number" min="0" class="form-control" name="penerbitanSurat_TLT" id="penerbitanSurat_TLT" value="<?= $laporan['penerbitanSurat_TLT']; ?>" required>
                                            </div>

                                            <div class="form-group">
                                                <label for="jumlahPasien">Jumlah Pasien T3 International <span class="text-danger"><b>*</b></span></label>
                                                <input type="number" min="0" class="form-control" name="jumlahPasien" id="jumlahPasien" value="<?= $laporan['jumlahPasien']; ?>" required>
                                            </div>

                                            <div class="form-group">
                                                <label for="laporanKematian">Laporan Kematian T3 International <span class="text-danger"><b>*</b></span></label>
                                                <textarea type="text" rows="3" class="form-control" name="laporanKematian" id="laporanKematian" required><?= $laporan['laporanKematian']; ?></textarea>
                                            </div>

                                            <div class="form-group">
                                                <label for="tolakMasuk">Tolak Masuk T3 International <span class="text-danger"><b>*</b></span></label>
                                                <input type="number" min="0" class="form-control" name="tolakMasuk" id="tolakMasuk" value="<?= $laporan['tolakMasuk']; ?>" required>
                                            </div>

                                            <div class="form-group">
                                                <label for="karantinaWisma">Karantina Wisma T3 International <span class="text-danger"><b>*</b></span></label>
                                                <input type="number" min="0" class="form-control" name="karantinaWisma" id="karantinaWisma" value="<?= $laporan['karantinaWisma']; ?>" required>
                                            </div>

                                            <div class="form-group">
                                                <label for="karantinaHotel">Karantina Hotel T3 International <span class="text-danger"><b>*</b></span></label>
                                                <input type="number" min="0" class="form-control" name="karantinaHotel" id="karantinaHotel" value="<?= $laporan['karantinaHotel']; ?>" required>
                                            </div>

                                            <div class="form-group">
                                                <label for="laporanKedatangan_jamaah">Laporan Kedatangan Jamaah T3 International <span class="text-danger"><b>*</b></span></label>
                                                <textarea type="text" rows="3" class="form-control" name="laporanKedatangan_jamaah" id="laporanKedatangan_jamaah" required><?= $laporan['laporanKedatangan_jamaah']; ?></textarea>
                                            </div>

                                            <div class="form-group">
                                                <label for="laporanPengamatan_gejalaTandaCOVID">Laporan Pengamatan Gejala dan Tanda COVID-19 T3 International <span class="text-danger"><b>*</b></span></label>
                                                <textarea type="text" rows="3" class="form-control" name="laporanPengamatan_gejalaTandaCOVID" id="laporanPengamatan_gejalaTandaCOVID" required><?= $laporan['laporanPengamatan_gejalaTandaCOVID']; ?></textarea>
                                            </div>

                                            <div class="form-group">
                                                <label for="laporanDisinfeksi_areaKedatangan">Laporan Disinfeksi Area Kedatangan T3 Internasional T3 International <span class="text-danger"><b>*</b></span></label>
                                                <textarea type="text" rows="3" class="form-control" name="laporanDisinfeksi_areaKedatangan" id="laporanDisinfeksi_areaKedatangan" required><?= $laporan['laporanDisinfeksi_areaKedatangan']; ?></textarea>
                                            </div>

                                            <div class="form-group">
                                                <label for="perwiraJaga">Perwira Jaga T3 International <span class="text-danger"><b>*</b></span></label>
                                                <textarea type="text" rows="3" class="form-control" name="perwiraJaga" id="perwiraJaga" required><?= $laporan['perwiraJaga']; ?></textarea>
                                            </div>

                                            <div class="form-group">
                                                <label for="anggota">Anggota T3 International <span class="text-danger"><b>*</b></span></label>
                                                <textarea type="text" rows="3" class="form-control" name="anggota" id="anggota" required><?= $laporan['anggota']; ?></textarea>
                                            </div>

                                            <div class="form-group">
                                                <label for="timShift_pagiTenagaBantuanCOVID">Tim Shift PAGI Tenaga Bantuan COVID-19 KKP T3I <span class="text-danger"><b>*</b></span></label>
                                                <textarea type="text" rows="3" class="form-control" name="timShift_pagiTenagaBantuanCOVID" id="timShift_pagiTenagaBantuanCOVID" required><?= $laporan['timShift_pagiTenagaBantuanCOVID']; ?></textarea>
                                            </div>

                                            <div class="form-group">
                                                <label for="timShift_malamTenagaBantuanCOVID">Tim Shift MALAM Tenaga Bantuan COVID-19 KKP T3I <span class="text-danger"><b>*</b></span></label>
                                                <textarea type="text" rows="3" class="form-control" name="timShift_malamTenagaBantuanCOVID" id="timShift_malamTenagaBantuanCOVID" required><?= $laporan['timShift_malamTenagaBantuanCOVID']; ?></textarea>
                                            </div>

                                            <div class="form-group">
                                                <label for="laporanKeterangan_tambahan">Laporan/Keterangan Tambahan T3 International (bila ada) </label>
                                                <textarea type="text" rows="3" class="form-control" name="laporanKeterangan_tambahan" id="laporanKeterangan_tambahan"><?= $laporan['laporanKeterangan_tambahan']; ?></textarea>
                                            </div>

                                            <div class="form-group">
                                                <label for="formatLaporan">Unggah Format Laporan T3 International <span class="text-danger"><b>*</b></span></label>
                                                <p>Laporan : <b><?= $laporan['formatLaporan']; ?></b></p>
                                                <input type="file" class="form-control" name="formatLaporan" id="formatLaporan">
                                                <p class="text-danger" style="font-size: 14px; margin-top: 5px; font-style: italic;">Harap rename dokumen menjadi Laporan Terminal_tanggal (mis. <b>Laporan T1_090822</b>). Maksimum ukuran dokumen <b>2MB</b>.</p>
                                            </div>

                                            <a href="selesai.php" class="btn btn-batal"><i class="fa-solid fa-xmark"></i> Batal</a>&nbsp;

                                            <button type="submit" id="btn-kirim" class="btn" name="ubah"><i class="fa-solid fa-share"></i> Kirim Perubahan</button>

                                        </form>

                                        <?php
                                        if (isset($_POST['ubah'])) {
                                            $nama = $_FILES['formatLaporan']['name'];
                                            $lokasi = $_FILES['formatLaporan']['tmp_name'];

                                            // jika format laporan diubah
                                            if (!empty($lokasi)) {
                                                move_uploaded_file($lokasi, "../laporanT3Internasional/" . $nama);
                                                $sql = "UPDATE laporanT3Internasional SET
                                            kedatanganFlight = '$_POST[kedatanganFlight]',
                                            paxKedatangan_flight = '$_POST[paxKedatangan_flight]',
                                            personilKedatangan = '$_POST[personilKedatangan]',
                                            penerbanganKargo_pesawat = '$_POST[penerbanganKargo_pesawat]',
                                            penerbanganKargo_personil = '$_POST[penerbanganKargo_personil]',
                                            scanPL_merahPenumpang = '$_POST[scanPL_merahPenumpang]',
                                            vaksinTidak_lengkap = '$_POST[vaksinTidak_lengkap]',
                                            belumIntegrasi_PL = '$_POST[belumIntegrasi_PL]',
                                            belumAda_PL = '$_POST[belumAda_PL]',
                                            scanPL_hijauPenumpang= '$_POST[scanPL_hijauPenumpang]',
                                            jumlahPresentase_penumpangWNI = '$_POST[jumlahPresentase_penumpangWNI]',
                                            jumlahPresentase_penumpangWNA = '$_POST[jumlahPresentase_penumpangWNA]',
                                            WNIVaksinasi_tidakLengkap = '$_POST[WNIVaksinasi_tidakLengkap]',
                                            WNIDibawah18_vaksinasiTidakLengkap = '$_POST[WNIDibawah18_vaksinasiTidakLengkap]',
                                            WNIKomorbid_vaksinasiTidakLengkap = '$_POST[WNIKomorbid_vaksinasiTidakLengkap]',
                                            WNILainnya_vaksinasiTidakLengkap = '$_POST[WNILainnya_vaksinasiTidakLengkap]',
                                            WNAVaksinasi_tidakLengkap = '$_POST[WNAVaksinasi_tidakLengkap]',
                                            WNADibawah18_vaksinasiTidakLengkap = '$_POST[WNADibawah18_vaksinasiTidakLengkap]',
                                            WNAKomorbid_vaksinasiTidakLengkap = '$_POST[WNAKomorbid_vaksinasiTidakLengkap]',
                                            WNALainnya_vaksinasiTidakLengkap = '$_POST[WNALainnya_vaksinasiTidakLengkap]',
                                            WNIVaksinasi_lengkap = '$_POST[WNIVaksinasi_lengkap]',
                                            WNAVaksinasi_lengkap = '$_POST[WNAVaksinasi_lengkap]',
                                            WNISwab_PCRKedatangan = '$_POST[WNISwab_PCRKedatangan]',
                                            WNASwab_PCRKedatangan = '$_POST[WNASwab_PCRKedatangan]',
                                            ikterik = '$_POST[ikterik]',
                                            rujukan = '$_POST[rujukan]',
                                            penerbitanSurat_LT = '$_POST[penerbitanSurat_LT]',
                                            penerbitanSurat_TLT = '$_POST[penerbitanSurat_TLT]',
                                            jumlahPasien = '$_POST[jumlahPasien]',
                                            laporanKematian = '$_POST[laporanKematian]',
                                            tolakMasuk = '$_POST[tolakMasuk]',
                                            karantinaWisma = '$_POST[karantinaWisma]',
                                            karantinaHotel = '$_POST[karantinaHotel]',
                                            laporanKedatangan_jamaah = '$_POST[laporanKedatangan_jamaah]',
                                            laporanPengamatan_gejalaTandaCOVID = '$_POST[laporanPengamatan_gejalaTandaCOVID]',
                                            laporanDisinfeksi_areaKedatangan = '$_POST[laporanDisinfeksi_areaKedatangan]',
                                            perwiraJaga = '$_POST[perwiraJaga]',
                                            anggota = '$_POST[anggota]',
                                            timShift_pagiTenagaBantuanCOVID = '$_POST[timShift_pagiTenagaBantuanCOVID]',
                                            timShift_malamTenagaBantuanCOVID = '$_POST[timShift_malamTenagaBantuanCOVID]',
                                            laporanKeterangan_tambahan = '$_POST[laporanKeterangan_tambahan]',
                                            formatLaporan = '$nama'
                                            WHERE tgl_lapor = CURDATE()";
                                            } else {
                                                $sql = "UPDATE laporanT3Internasional SET
                                            kedatanganFlight = '$_POST[kedatanganFlight]',
                                            paxKedatangan_flight = '$_POST[paxKedatangan_flight]',
                                            personilKedatangan = '$_POST[personilKedatangan]',
                                            penerbanganKargo_pesawat = '$_POST[penerbanganKargo_pesawat]',
                                            penerbanganKargo_personil = '$_POST[penerbanganKargo_personil]',
                                            scanPL_merahPenumpang = '$_POST[scanPL_merahPenumpang]',
                                            vaksinTidak_lengkap = '$_POST[vaksinTidak_lengkap]',
                                            belumIntegrasi_PL = '$_POST[belumIntegrasi_PL]',
                                            belumAda_PL = '$_POST[belumAda_PL]',
                                            scanPL_hijauPenumpang= '$_POST[scanPL_hijauPenumpang]',
                                            jumlahPresentase_penumpangWNI = '$_POST[jumlahPresentase_penumpangWNI]',
                                            jumlahPresentase_penumpangWNA = '$_POST[jumlahPresentase_penumpangWNA]',
                                            WNIVaksinasi_tidakLengkap = '$_POST[WNIVaksinasi_tidakLengkap]',
                                            WNIDibawah18_vaksinasiTidakLengkap = '$_POST[WNIDibawah18_vaksinasiTidakLengkap]',
                                            WNIKomorbid_vaksinasiTidakLengkap = '$_POST[WNIKomorbid_vaksinasiTidakLengkap]',
                                            WNILainnya_vaksinasiTidakLengkap = '$_POST[WNILainnya_vaksinasiTidakLengkap]',
                                            WNAVaksinasi_tidakLengkap = '$_POST[WNAVaksinasi_tidakLengkap]',
                                            WNADibawah18_vaksinasiTidakLengkap = '$_POST[WNADibawah18_vaksinasiTidakLengkap]',
                                            WNAKomorbid_vaksinasiTidakLengkap = '$_POST[WNAKomorbid_vaksinasiTidakLengkap]',
                                            WNALainnya_vaksinasiTidakLengkap = '$_POST[WNALainnya_vaksinasiTidakLengkap]',
                                            WNIVaksinasi_lengkap = '$_POST[WNIVaksinasi_lengkap]',
                                            WNAVaksinasi_lengkap = '$_POST[WNAVaksinasi_lengkap]',
                                            WNISwab_PCRKedatangan = '$_POST[WNISwab_PCRKedatangan]',
                                            WNASwab_PCRKedatangan = '$_POST[WNASwab_PCRKedatangan]',
                                            ikterik = '$_POST[ikterik]',
                                            rujukan = '$_POST[rujukan]',
                                            penerbitanSurat_LT = '$_POST[penerbitanSurat_LT]',
                                            penerbitanSurat_TLT = '$_POST[penerbitanSurat_TLT]',
                                            jumlahPasien = '$_POST[jumlahPasien]',
                                            laporanKematian = '$_POST[laporanKematian]',
                                            tolakMasuk = '$_POST[tolakMasuk]',
                                            karantinaWisma = '$_POST[karantinaWisma]',
                                            karantinaHotel = '$_POST[karantinaHotel]',
                                            laporanKedatangan_jamaah = '$_POST[laporanKedatangan_jamaah]',
                                            laporanPengamatan_gejalaTandaCOVID = '$_POST[laporanPengamatan_gejalaTandaCOVID]',
                                            laporanDisinfeksi_areaKedatangan = '$_POST[laporanDisinfeksi_areaKedatangan]',
                                            perwiraJaga = '$_POST[perwiraJaga]',
                                            anggota = '$_POST[anggota]',
                                            timShift_pagiTenagaBantuanCOVID = '$_POST[timShift_pagiTenagaBantuanCOVID]',
                                            timShift_malamTenagaBantuanCOVID = '$_POST[timShift_malamTenagaBantuanCOVID]',
                                            laporanKeterangan_tambahan = '$_POST[laporanKeterangan_tambahan]'
                                            WHERE tgl_lapor = CURDATE()";
                                            }

                                            $koneksi->query($sql);
                                            if ($koneksi) {

                                                echo "<script>alert('Data Berhasil Diubah');</script>";
                                                echo "<script>location='selesai.php';</script>";
                                            } else {
                                                echo "<script>alert('Data Gagal Diubah');</script>";
                                                echo "<script>location='ubahLaporan.php';</script>";
                                            }
                                        }
                                        ?>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    <!--   Core JS Files   -->
    <script src="https://cdn.jsdelivr.net/npm/typed.js@2.0.12"></script>
    <script>
        //? EFEK KETIK
        var typingEffect = new Typed(".efek-ketik", {
            strings: ["Awas COVID-19 Report"],
            loop: true,
            typeSpeed: 110,
            backSpeed: 140,
            backDelay: 2000,
        });
    </script>

    <script src="../js/jquery.3.2.1.min.js"></script>
    <script src="../js/popper.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script src="https://kit.fontawesome.com/943a58e089.js" crossorigin="anonymous"></script>
</body>

</html>