<?php
date_default_timezone_set('Asia/Jakarta');
require '../koneksi.php';

if (!isset($_SESSION["t1ShapireVIP"])) {
    echo "<script>alert('Silahkan Login terlebih dahulu');</script>";
    echo "<script>location='../index.php';</script>";
}
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>KKP SOETTA | T1 SHAPIRE VIP</title>
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
                                        <form action="" method="POST" enctype="multipart/form-data">
                                            <div class="form-group">
                                                <label for="tgl_lapor">Pelaporan Tanggal <span class="text-danger"><b>*</b></span></label>
                                                <input type="date" class="form-control" name="tgl_lapor" id="tgl_lapor" required>
                                            </div>

                                            <div class="form-group">
                                                <label for="kedatanganDomestik_flight">Kedatangan Domestik (flight) T1 Shapire VIP <span class="text-danger"><b>*</b></span></label>
                                                <input type="number" min="0" class="form-control" name="kedatanganDomestik_flight" id="kedatanganDomestik_flight" required>
                                            </div>

                                            <div class="form-group">
                                                <label for="paxKedatangan_domestik">Pax - Kedatangan Domestik T1 Shapire VIP <span class="text-danger"><b>*</b></span></label>
                                                <input type="number" min="0" class="form-control" name="paxKedatangan_domestik" id="paxKedatangan_domestik" required>
                                            </div>

                                            <div class="form-group">
                                                <label for="personilKedatangan_domestik">Personil - Kedatangan Domestik T1 Shapire VIP <span class="text-danger"><b>*</b></span></label>
                                                <input type="number" min="0" class="form-control" name="personilKedatangan_domestik" id="personilKedatangan_domestik" required>
                                            </div>

                                            <div class="form-group">
                                                <label for="keberangkatanDomestik_flight">Keberangkatan Domestik (flight) T1 Shapire VIP <span class="text-danger"><b>*</b></span></label>
                                                <input type="number" min="0" class="form-control" name="keberangkatanDomestik_flight" id="keberangkatanDomestik_flight" required>
                                            </div>

                                            <div class="form-group">
                                                <label for="paxKeberangkatan_domestik">Pax - Keberangkatan Domestik T1 Shapire VIP <span class="text-danger"><b>*</b></span></label>
                                                <input type="number" min="0" class="form-control" name="paxKeberangkatan_domestik" id="paxKeberangkatan_domestik" required>
                                            </div>

                                            <div class="form-group">
                                                <label for="personilKeberangkatan_domsetik">Personil - Keberangkatan Domestik T1 Shapire VIP <span class="text-danger"><b>*</b></span></label>
                                                <input type="number" min="0" class="form-control" name="personilKeberangkatan_domsetik" id="personilKeberangkatan_domsetik" required>
                                            </div>

                                            <div class="form-group">
                                                <label for="eHACPL_keberangkatanDomestik">eHAC/PL - Keberangkatan Domestik T1 Shapire VIP <span class="text-danger"><b>*</b></span></label>
                                                <input type="number" min="0" class="form-control" name="eHACPL_keberangkatanDomestik" id="eHACPL_keberangkatanDomestik" required>
                                            </div>

                                            <div class="form-group">
                                                <label for="noneHAC_validasiManualKeberangkatanDomestik">Non eHAC/Validasi Manual - Keberangkatan Domestik T1 Shapire VIP <span class="text-danger"><b>*</b></span></label>
                                                <input type="number" min="0" class="form-control" name="noneHAC_validasiManualKeberangkatanDomestik" id="noneHAC_validasiManualKeberangkatanDomestik" required>
                                            </div>

                                            <div class="form-group">
                                                <label for="kedatanganINTL_flight">Kedatangan INTL (flight) T1 Shapire VIP <span class="text-danger"><b>*</b></span></label>
                                                <input type="number" min="0" class="form-control" name="kedatanganINTL_flight" id="kedatanganINTL_flight" required>
                                            </div>

                                            <div class="form-group">
                                                <label for="paxKedatangan_INTLFlight">Pax - Kedatangan INTL (flight) T1 Shapire VIP <span class="text-danger"><b>*</b></span></label>
                                                <input type="number" min="0" class="form-control" name="paxKedatangan_INTLFlight" id="paxKedatangan_INTLFlight" required>
                                            </div>

                                            <div class="form-group">
                                                <label for="personilKedatangan_INTL">Personil - Kedatangan INTL T1 Shapire VIP <span class="text-danger"><b>*</b></span></label>
                                                <input type="number" min="0" class="form-control" name="personilKedatangan_INTL" id="personilKedatangan_INTL" required>
                                            </div>

                                            <div class="form-group">
                                                <label for="hasilScan_PLHijau">Hasil Scan PL Hijau T1 Shapire VIP <span class="text-danger"><b>*</b></span></label>
                                                <input type="number" min="0" class="form-control" name="hasilScan_PLHijau" id="hasilScan_PLHijau" required>
                                            </div>

                                            <div class="form-group">
                                                <label for="hasilScan_PLMerah">Hasil Scan PL Merah T1 Shapire VIP <span class="text-danger"><b>*</b></span></label>
                                                <input type="number" min="0" class="form-control" name="hasilScan_PLMerah" id="hasilScan_PLMerah" required>
                                            </div>

                                            <div class="form-group">
                                                <label for="tidakScan_PL">Tidak Scan PL T1 Shapire VIP <span class="text-danger"><b>*</b></span></label>
                                                <input type="number" min="0" class="form-control" name="tidakScan_PL" id="tidakScan_PL" required>
                                            </div>

                                            <div class="form-group">
                                                <label for="WNIVaksinasi_COVIDLengkap">WNI - Vaksinasi COVID19 Lengkap T1 Shapire VIP <span class="text-danger"><b>*</b></span></label>
                                                <input type="number" min="0" class="form-control" name="WNIVaksinasi_COVIDLengkap" id="WNIVaksinasi_COVIDLengkap" required>
                                            </div>

                                            <div class="form-group">
                                                <label for="WNAVaksinasi_COVIDLengkap">WNA - Vaksinasi COVID19 Lengkap T1 Shapire VIP <span class="text-danger"><b>*</b></span></label>
                                                <input type="number" min="0" class="form-control" name="WNAVaksinasi_COVIDLengkap" id="WNAVaksinasi_COVIDLengkap" required>
                                            </div>

                                            <div class="form-group">
                                                <label for="WNIVaksinasi_COVIDBelumLengkap">WNI - Vaksinasi COVID19 Belum Lengkap T1 Shapire VIP <span class="text-danger"><b>*</b></span></label>
                                                <input type="number" min="0" class="form-control" name="WNIVaksinasi_COVIDBelumLengkap" id="WNIVaksinasi_COVIDBelumLengkap" required>
                                            </div>

                                            <div class="form-group">
                                                <label for="WNAVaksinasi_COVIDBelumLengkap">WNA - Vaksinasi COVID19 Belum Lengkap T1 Shapire VIP <span class="text-danger"><b>*</b></span></label>
                                                <input type="number" min="0" class="form-control" name="WNAVaksinasi_COVIDBelumLengkap" id="WNAVaksinasi_COVIDBelumLengkap" required>
                                            </div>

                                            <div class="form-group">
                                                <label for="WNIPCR_onArrival">WNI - PCR on Arrival T1 Shapire VIP <span class="text-danger"><b>*</b></span></label>
                                                <input type="number" min="0" class="form-control" name="WNIPCR_onArrival" id="WNIPCR_onArrival" required>
                                            </div>

                                            <div class="form-group">
                                                <label for="WNAPCR_onArrival">WNA - PCR on Arrival T1 Shapire VIP <span class="text-danger"><b>*</b></span></label>
                                                <input type="number" min="0" class="form-control" name="WNAPCR_onArrival" id="WNAPCR_onArrival" required>
                                            </div>

                                            <div class="form-group">
                                                <label for="keberangkatanINTL_flight">Keberangkatan INTL (flight) T1 Shapire VIP <span class="text-danger"><b>*</b></span></label>
                                                <input type="number" min="0" class="form-control" name="keberangkatanINTL_flight" id="keberangkatanINTL_flight" required>
                                            </div>

                                            <div class="form-group">
                                                <label for="paxKeberangkatan_INTL">Pax - Keberangkatan INTL T1 Shapire VIP <span class="text-danger"><b>*</b></span></label>
                                                <input type="number" min="0" class="form-control" name="paxKeberangkatan_INTL" id="paxKeberangkatan_INTL" required>
                                            </div>

                                            <div class="form-group">
                                                <label for="personilKeberangkatan_INTL">Personil - Keberangkatan INTL T1 Shapire VIP <span class="text-danger"><b>*</b></span></label>
                                                <input type="number" min="0" class="form-control" name="personilKeberangkatan_INTL" id="personilKeberangkatan_INTL" required>
                                            </div>

                                            <div class="form-group">
                                                <label for="rincianPemeriksaan_dokKesehatanVaksinasiCovidPesawatChapterDOM">Rincian Pemeriksaan Dokumen Kesehatan (Vaksinasi COVID19) - Pesawat Charter DOM T1 Shapire VIP <span class="text-danger"><b>*</b></span> <br><br><em>Isikan sesuai format lengkap berurutan dipisahkan dengan tanda koma (,). Contoh :</em> <br>
                                                    <p class="text-danger"><em><b>PT PTN / T7-ROB / CGK-MLG / 05.30 WIB Pax : 9 Orang (Dosis Booster), Personil : 3 Orang (Dosis Booster), PT TriMG / PK-RDA / CGK-JOG / 07.00 WIB Pax : 0, Personil : 3 Orang (Dosis Booster)</b></em></p>
                                                </label>
                                                <textarea type="text" rows="3" class="form-control" name="rincianPemeriksaan_dokKesehatanVaksinasiCovidPesawatChapterDOM" id="rincianPemeriksaan_dokKesehatanVaksinasiCovidPesawatChapterDOM" required></textarea>
                                            </div>

                                            <div class="form-group">
                                                <label for="rincianPemeriksaan_dokKesehatanVaksinasiCovidPesawatChapterINT">Rincian Pemeriksaan Dokumen Kesehatan (Vaksinasi COVID19) - Pesawat Charter INT T1 Shapire VIP <span class="text-danger"><b>*</b></span> <br><br><em>Isikan sesuai format lengkap berurutan dipisahkan dengan tanda koma (,). Contoh :</em> <br>
                                                    <p class="text-danger"><em><b>PT PTN / T7-ROB / CGK-MLG / 05.30 WIB Pax : 9 Orang (Dosis Booster), Personil : 3 Orang (Dosis Booster), PT TriMG / PK-RDA / CGK-JOG / 07.00 WIB Pax : 0, Personil : 3 Orang (Dosis Booster)</b></em></p>
                                                </label>
                                                <textarea type="text" rows="3" class="form-control" name="rincianPemeriksaan_dokKesehatanVaksinasiCovidPesawatChapterINT" id="rincianPemeriksaan_dokKesehatanVaksinasiCovidPesawatChapterINT" required></textarea>
                                            </div>

                                            <div class="form-group">
                                                <label for="kesimpulanPemeriksaan_tandaGejalaPengawasanDokumenKesehatan">Kesimpulan Pemeriksaan Tanda Gejala dan Pengawasan Dokumen Kesehatan T1 Shapire VIP <span class="text-danger"><b>*</b></span></label>
                                                <textarea type="text" rows="3" class="form-control" name="kesimpulanPemeriksaan_tandaGejalaPengawasanDokumenKesehatan" id="kesimpulanPemeriksaan_tandaGejalaPengawasanDokumenKesehatan" required></textarea>
                                            </div>

                                            <div class="form-group">
                                                <label for="petugas">Petugas T1 Shapire VIP <span class="text-danger"><b>*</b></span></label>
                                                <input type="text" class="form-control" name="petugas" id="petugas" required>
                                            </div>

                                            <div class="form-group">
                                                <label for="laporanKeterangan_tambahan">Laporan/Keterangan Tambahan T1 Shapire VIP (bila ada) </label>
                                                <textarea type="text" rows="3" class="form-control" name="laporanKeterangan_tambahan" id="laporanKeterangan_tambahan"></textarea>
                                            </div>

                                            <div class="form-group">
                                                <label for="formatLaporan">Unggah Format Laporan T1 Shapire VIP <span class="text-danger"><b>*</b></span></label>
                                                <input type="file" class="form-control" name="formatLaporan" id="formatLaporan">
                                                <p class="text-danger" style="font-size: 14px; margin-top: 5px; font-style: italic;">Harap rename dokumen menjadi Laporan Terminal_tanggal (mis. <b>Laporan Laporan T1_090822</b>). Maksimum ukuran dokumen <b>2MB</b>.</p>
                                            </div>

                                            <button class="btn btn-batal"><i class="fa-solid fa-xmark"></i> Batal</button>&nbsp;

                                            <button type="submit" id="btn-kirim" class="btn" name="kirim"><i class="fa-solid fa-share"></i> Kirim Data</button>

                                        </form>

                                        <?php
                                        if (isset($_POST['kirim'])) {
                                            $nama = $_FILES['formatLaporan']['name'];
                                            $lokasi = $_FILES['formatLaporan']['tmp_name'];
                                            move_uploaded_file($lokasi, "../laporanT1ShapireVIP/" . $nama);
                                            $koneksi->query("INSERT INTO laporanT1ShapireVIP
                                            (tgl_lapor,
                                            kedatanganDomestik_flight,
                                            paxKedatangan_domestik,
                                            personilKedatangan_domestik,
                                            keberangkatanDomestik_flight,
                                            paxKeberangkatan_domestik,
                                            personilKeberangkatan_domsetik,
                                            eHACPL_keberangkatanDomestik,
                                            noneHAC_validasiManualKeberangkatanDomestik,
                                            kedatanganINTL_flight,
                                            paxKedatangan_INTLFlight,
                                            personilKedatangan_INTL,
                                            hasilScan_PLHijau,
                                            hasilScan_PLMerah,
                                            tidakScan_PL,
                                            WNIVaksinasi_COVIDLengkap,
                                            WNAVaksinasi_COVIDLengkap,
                                            WNIVaksinasi_COVIDBelumLengkap,
                                            WNAVaksinasi_COVIDBelumLengkap,
                                            WNIPCR_onArrival,
                                            WNAPCR_onArrival,
                                            keberangkatanINTL_flight,
                                            paxKeberangkatan_INTL,
                                            personilKeberangkatan_INTL,
                                            rincianPemeriksaan_dokKesehatanVaksinasiCovidPesawatChapterDOM,
                                            rincianPemeriksaan_dokKesehatanVaksinasiCovidPesawatChapterINT,
                                            kesimpulanPemeriksaan_tandaGejalaPengawasanDokumenKesehatan,
                                            petugas,
                                            laporanKeterangan_tambahan,
                                            formatLaporan) VALUES 
                                            ('$_POST[tgl_lapor]',
                                            '$_POST[kedatanganDomestik_flight]',
                                            '$_POST[paxKedatangan_domestik]',
                                            '$_POST[personilKedatangan_domestik]',
                                            '$_POST[keberangkatanDomestik_flight]',
                                            '$_POST[paxKeberangkatan_domestik]',
                                            '$_POST[personilKeberangkatan_domsetik]',
                                            '$_POST[eHACPL_keberangkatanDomestik]',
                                            '$_POST[noneHAC_validasiManualKeberangkatanDomestik]',
                                            '$_POST[kedatanganINTL_flight]',
                                            '$_POST[paxKedatangan_INTLFlight]',
                                            '$_POST[personilKedatangan_INTL]',
                                            '$_POST[hasilScan_PLHijau]',
                                            '$_POST[hasilScan_PLMerah]',
                                            '$_POST[tidakScan_PL]',
                                            '$_POST[WNIVaksinasi_COVIDLengkap]',
                                            '$_POST[WNAVaksinasi_COVIDLengkap]',
                                            '$_POST[WNIVaksinasi_COVIDBelumLengkap]',
                                            '$_POST[WNAVaksinasi_COVIDBelumLengkap]',
                                            '$_POST[WNIPCR_onArrival]',
                                            '$_POST[WNAPCR_onArrival]',
                                            '$_POST[keberangkatanINTL_flight]',
                                            '$_POST[paxKeberangkatan_INTL]',
                                            '$_POST[personilKeberangkatan_INTL]',
                                            '$_POST[rincianPemeriksaan_dokKesehatanVaksinasiCovidPesawatChapterDOM]',
                                            '$_POST[rincianPemeriksaan_dokKesehatanVaksinasiCovidPesawatChapterINT]',
                                            '$_POST[kesimpulanPemeriksaan_tandaGejalaPengawasanDokumenKesehatan]',
                                            '$_POST[petugas]',
                                            '$_POST[laporanKeterangan_tambahan]',
                                            '$nama')");

                                            echo "<script>alert('Data Berhasil Dikirim');</script>";
                                            echo "<script>location='selesai.php';</script>";
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
    <script>
        const btnBatal = document.querySelector(".btn-batal");
        btnBatal.addEventListener("click", () => {
            window.location.reload(true);
        });
    </script>

    <script src="../js/jquery.3.2.1.min.js"></script>
    <script src="../js/popper.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script src="https://kit.fontawesome.com/943a58e089.js" crossorigin="anonymous"></script>
</body>

</html>