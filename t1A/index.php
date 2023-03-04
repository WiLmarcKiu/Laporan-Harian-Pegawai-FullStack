<?php
date_default_timezone_set('Asia/Jakarta');
require '../koneksi.php';

if (!isset($_SESSION["t1A"])) {
    echo "<script>alert('Silahkan Login terlebih dahulu');</script>";
    echo "<script>location='../index.php';</script>";
}
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>KKP SOETTA | T1A</title>
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
                                                <label for="jumlahPesawat_kedatangan">Jumlah Pesawat - Kedatangan T1A <span class="text-danger"><b>*</b></span></label>
                                                <input type="number" min="0" class="form-control" name="jumlahPesawat_kedatangan" id="jumlahPesawat_kedatangan" required>
                                            </div>

                                            <div class="form-group">
                                                <label for="paxKedatangan">Pax - Kedatangan T1A <span class="text-danger"><b>*</b></span></label>
                                                <input type="number" min="0" class="form-control" name="paxKedatangan" id="paxKedatangan" required>
                                            </div>

                                            <div class="form-group">
                                                <label for="personilKedatangan">Personil - Kedatangan T1A <span class="text-danger"><b>*</b></span></label>
                                                <input type="number" min="0" class="form-control" name="personilKedatangan" id="personilKedatangan" required>
                                            </div>

                                            <div class="form-group">
                                                <label for="pengawasanTS_kedatangan">Pengawasan TS - Kedatangan T1A <span class="text-danger"><b>*</b></span></label>
                                                <input type="number" min="0" class="form-control" name="pengawasanTS_kedatangan" id="pengawasanTS_kedatangan" required>
                                            </div>

                                            <div class="form-group">
                                                <label for="jumlahPesawat_keberangkatan">Jumlah Pesawat - Keberangkatan T1A <span class="text-danger"><b>*</b></span></label>
                                                <input type="number" min="0" class="form-control" name="jumlahPesawat_keberangkatan" id="jumlahPesawat_keberangkatan" required>
                                            </div>

                                            <div class="form-group">
                                                <label for="paxKeberangkatan">Pax - Keberangkatan T1A <span class="text-danger"><b>*</b></span></label>
                                                <input type="number" min="0" class="form-control" name="paxKeberangkatan" id="paxKeberangkatan" required>
                                            </div>

                                            <div class="form-group">
                                                <label for="personilKeberangkatan">Personil - Keberangkatan T1A <span class="text-danger"><b>*</b></span></label>
                                                <input type="number" min="0" class="form-control" name="personilKeberangkatan" id="personilKeberangkatan" required>
                                            </div>

                                            <div class="form-group">
                                                <label for="validasiManual_keberangkatan">Validasi Manual - Keberangkatan T1A <span class="text-danger"><b>*</b></span></label>
                                                <input type="number" min="0" class="form-control" name="validasiManual_keberangkatan" id="validasiManual_keberangkatan" required>
                                            </div>

                                            <div class="form-group">
                                                <label for="validasiBy_PL">Validasi by PL - Keberangkatan T1A <span class="text-danger"><b>*</b></span></label>
                                                <input type="number" min="0" class="form-control" name="validasiBy_PL" id="validasiBy_PL" required>
                                            </div>

                                            <div class="form-group">
                                                <label for="berobatKlinik">Berobat Klinik T1A <span class="text-danger"><b>*</b></span></label>
                                                <input type="number" min="0" class="form-control" name="berobatKlinik" id="berobatKlinik" required>
                                            </div>

                                            <div class="form-group">
                                                <label for="LTHamil_klinik">LT Hamil - Klinik T1A <span class="text-danger"><b>*</b></span></label>
                                                <input type="number" min="0" class="form-control" name="LTHamil_klinik" id="LTHamil_klinik" required>
                                            </div>

                                            <div class="form-group">
                                                <label for="LTUmum_klinik">LT Umum - Klinik T1A <span class="text-danger"><b>*</b></span></label>
                                                <input type="number" min="0" class="form-control" name="LTUmum_klinik" id="LTUmum_klinik" required>
                                            </div>

                                            <div class="form-group">
                                                <label for="TLTHamil_klinik">TLT Hamil - Klinik T1A <span class="text-danger"><b>*</b></span></label>
                                                <input type="number" min="0" class="form-control" name="TLTHamil_klinik" id="TLTHamil_klinik" required>
                                            </div>

                                            <div class="form-group">
                                                <label for="TLTUmum_klinik">TLT Umum - Klinik T1A <span class="text-danger"><b>*</b></span></label>
                                                <input type="number" min="0" class="form-control" name="TLTUmum_klinik" id="TLTUmum_klinik" required>
                                            </div>

                                            <div class="form-group">
                                                <label for="rujukKlinik">Rujuk - Klinik T1A <span class="text-danger"><b>*</b></span></label>
                                                <input type="number" min="0" class="form-control" name="rujukKlinik" id="rujukKlinik" required>
                                            </div>

                                            <div class="form-group">
                                                <label for="laporanNotifikasi_penemuanKasusCOVID">Laporan Notifikasi Penemuan Kasus COVID-19 T1A <span class="text-danger"><b>*</b></span></label>
                                                <textarea type="text" rows="3" class="form-control" name="laporanNotifikasi_penemuanKasusCOVID" id="laporanNotifikasi_penemuanKasusCOVID" required></textarea>
                                            </div>

                                            <div class="form-group">
                                                <label for="petugas">Petugas T1A <span class="text-danger"><b>*</b></span></label>
                                                <textarea type="text" rows="3" class="form-control" name="petugas" id="petugas" required></textarea>
                                            </div>

                                            <div class="form-group">
                                                <label for="relawanPagi">Relawan Pagi T1A <span class="text-danger"><b>*</b></span></label>
                                                <textarea type="text" rows="3" class="form-control" name="relawanPagi" id="relawanPagi" required></textarea>
                                            </div>

                                            <div class="form-group">
                                                <label for="relawanMalam">Relawan Malam T1A <span class="text-danger"><b>*</b></span></label>
                                                <textarea type="text" rows="3" class="form-control" name="relawanMalam" id="relawanMalam" required></textarea>
                                            </div>

                                            <div class="form-group">
                                                <label for="laporanKeterangan_tambahan">Laporan/Keterangan Tambahan T1A (bila ada)</label>
                                                <textarea type="text" rows="3" class="form-control" name="laporanKeterangan_tambahan" id="laporanKeterangan_tambahan"></textarea>
                                            </div>

                                            <div class="form-group">
                                                <label for="formatLaporan">Unggah Format Laporan T1A <span class="text-danger"><b>*</b></span></label>
                                                <input type="file" class="form-control" name="formatLaporan" id="formatLaporan">
                                                <p class="text-danger" style="font-size: 14px; margin-top: 5px; font-style: italic;">Harap rename dokumen menjadi Laporan Terminal_tanggal (mis. <b>Laporan T1A_090822</b>). Maksimum ukuran dokumen <b>2MB</b>.</p>
                                            </div>

                                            <button class="btn btn-batal"><i class="fa-solid fa-xmark"></i> Batal</button>&nbsp;

                                            <button type="submit" id="btn-kirim" class="btn" name="kirim"><i class="fa-solid fa-share"></i> Kirim Data</button>

                                        </form>

                                        <?php
                                        if (isset($_POST['kirim'])) {
                                            $nama = $_FILES['formatLaporan']['name'];
                                            $lokasi = $_FILES['formatLaporan']['tmp_name'];
                                            move_uploaded_file($lokasi, "../laporanT1A/" . $nama);
                                            $koneksi->query("INSERT INTO laporanT1A
                                            (tgl_lapor,
                                            jumlahPesawat_kedatangan,
                                            paxKedatangan,
                                            personilKedatangan,
                                            pengawasanTS_kedatangan,
                                            jumlahPesawat_keberangkatan,
                                            paxKeberangkatan,
                                            personilKeberangkatan,
                                            validasiManual_keberangkatan,
                                            validasiBy_PL,
                                            berobatKlinik,
                                            LTHamil_klinik,
                                            LTUmum_klinik,
                                            TLTHamil_klinik,
                                            TLTUmum_klinik,
                                            rujukKlinik,
                                            laporanNotifikasi_penemuanKasusCOVID,
                                            petugas,
                                            relawanPagi,
                                            relawanMalam,
                                            laporanKeterangan_tambahan,
                                            formatLaporan) VALUES 
                                            ('$_POST[tgl_lapor]',
                                            '$_POST[jumlahPesawat_kedatangan]',
                                            '$_POST[paxKedatangan]',
                                            '$_POST[personilKedatangan]',
                                            '$_POST[pengawasanTS_kedatangan]',
                                            '$_POST[jumlahPesawat_keberangkatan]',
                                            '$_POST[paxKeberangkatan]',
                                            '$_POST[personilKeberangkatan]',
                                            '$_POST[validasiManual_keberangkatan]',
                                            '$_POST[validasiBy_PL]',
                                            '$_POST[berobatKlinik]',
                                            '$_POST[LTHamil_klinik]',
                                            '$_POST[LTUmum_klinik]',
                                            '$_POST[TLTHamil_klinik]',
                                            '$_POST[TLTUmum_klinik]',
                                            '$_POST[rujukKlinik]',
                                            '$_POST[laporanNotifikasi_penemuanKasusCOVID]',
                                            '$_POST[petugas]',
                                            '$_POST[relawanPagi]',
                                            '$_POST[relawanMalam]',
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