<?php
date_default_timezone_set('Asia/Jakarta');
require '../koneksi.php';

if (!isset($_SESSION["t3Domestik"])) {
    echo "<script>alert('Silahkan Login terlebih dahulu');</script>";
    echo "<script>location='../index.php';</script>";
}
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>KKP SOETTA | T3 DOMESTIK</title>
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

                                        $dataLaporan = $koneksi->query("SELECT * FROM laporanT3Domestik WHERE tgl_lapor = '$tgl_kemarin'");

                                        $laporan = $dataLaporan->fetch_assoc();
                                        ?>

                                        <form action="" method="POST" enctype="multipart/form-data">
                                            <div class="form-group">
                                                <label for="tgl_lapor">Pelaporan Tanggal</label>
                                                <input id="tgl_lapor" type="text" class="form-control" name="tgl_lapor" id="tgl_lapor" value="<?= date("d F Y", strtotime($laporan['tgl_lapor'])) ?>" required disabled>
                                            </div>

                                            <div class="form-group">
                                                <label for="kedatanganFlight">Kedatangan (flight) T3 Domestik <span class="text-danger"><b>*</b></span></label>
                                                <input type="number" min="0" class="form-control" name="kedatanganFlight" id="kedatanganFlight" value="<?= $laporan['kedatanganFlight']; ?>" required>
                                            </div>

                                            <div class="form-group">
                                                <label for="cargoKedatangan">Cargo - Kedatangan T3 Domestik <span class="text-danger"><b>*</b></span></label>
                                                <input type="number" min="0" class="form-control" name="cargoKedatangan" id="cargoKedatangan" value="<?= $laporan['cargoKedatangan']; ?>" required>
                                            </div>

                                            <div class="form-group">
                                                <label for="paxKedatangan">Pax - Kedatangan T3 Domestik <span class="text-danger"><b>*</b></span></label>
                                                <input type="number" min="0" class="form-control" name="paxKedatangan" id="paxKedatangan" value="<?= $laporan['paxKedatangan']; ?>" required>
                                            </div>

                                            <div class="form-group">
                                                <label for="cabinCrew_kedatangan">Cabin Crew - Kedatangan T3 Domestik <span class="text-danger"><b>*</b></span></label>
                                                <input type="number" min="0" class="form-control" name="cabinCrew_kedatangan" id="cabinCrew_kedatangan" value="<?= $laporan['cabinCrew_kedatangan']; ?>" required>
                                            </div>

                                            <div class="form-group">
                                                <label for="keberangkatanFlight">Keberangkatan (flight) T3 Domestik <span class="text-danger"><b>*</b></span></label>
                                                <input type="number" min="0" class="form-control" name="keberangkatanFlight" id="keberangkatanFlight" value="<?= $laporan['keberangkatanFlight']; ?>" required>
                                            </div>

                                            <div class="form-group">
                                                <label for="cargoKeberangkatan">Cargo - Keberangkatan T3 Domestik <span class="text-danger"><b>*</b></span></label>
                                                <input type="number" min="0" class="form-control" name="cargoKeberangkatan" id="cargoKeberangkatan" value="<?= $laporan['cargoKeberangkatan']; ?>" required>
                                            </div>

                                            <div class="form-group">
                                                <label for="paxKeberangkatan">Pax - Keberangkatan T3 Domestik <span class="text-danger"><b>*</b></span></label>
                                                <input type="number" min="0" class="form-control" name="paxKeberangkatan" id="paxKeberangkatan" value="<?= $laporan['paxKeberangkatan']; ?>" required>
                                            </div>

                                            <div class="form-group">
                                                <label for="cabinCrew_keberangkatan">Cabin Crew - Keberangkatan T3 Domestik <span class="text-danger"><b>*</b></span> <br>Jumlah tes COVID-19 dan maskapai</label>
                                                <input type="number" min="0" class="form-control" name="cabinCrew_keberangkatan" id="cabinCrew_keberangkatan" value="<?= $laporan['cabinCrew_keberangkatan']; ?>" required>
                                            </div>

                                            <div class="form-group">
                                                <label for="laporanValidasi_manualKeberangkatan">Laporan Validasi Manual Keberangkatan T3 Domestik <span class="text-danger"><b>*</b></span></label>
                                                <textarea type="text" rows="3" class="form-control" name="laporanValidasi_manualKeberangkatan" id="laporanValidasi_manualKeberangkatan" required><?= $laporan['laporanValidasi_manualKeberangkatan']; ?></textarea>
                                            </div>

                                            <div class="form-group">
                                                <label for="validasiHongkong">Validasi ke Hongkong T3 Domestik <span class="text-danger"><b>*</b></span></label>
                                                <input type="number" min="0" class="form-control" name="validasiHongkong" id="validasiHongkong" value="<?= $laporan['validasiHongkong']; ?>" required>
                                            </div>

                                            <div class="form-group">
                                                <label for="profilPenapisan_PL">Profil Penapisan dengan PeduliLindungi T3 Domestik <span class="text-danger"><b>*</b></span></label>
                                                <input type="number" min="0" class="form-control" name="profilPenapisan_PL" id="profilPenapisan_PL" value="<?= $laporan['profilPenapisan_PL']; ?>" required>
                                            </div>

                                            <div class="form-group">
                                                <label for="dataWNA_WNISelesaiKarantina">Data WNA/WNI selesai masa Karantina T3 Domestik <span class="text-danger"><b>*</b></span></label>
                                                <input type="number" min="0" class="form-control" name="dataWNA_WNISelesaiKarantina" id="dataWNA_WNISelesaiKarantina" value="<?= $laporan['dataWNA_WNISelesaiKarantina']; ?>" required>
                                            </div>

                                            <div class="form-group">
                                                <label for="laporanPE">Laporan PE T3 Domestik <span class="text-danger"><b>*</b></span></label>
                                                <textarea type="text" rows="3" class="form-control" name="laporanPE" id="laporanPE" required><?= $laporan['laporanPE']; ?></textarea>
                                            </div>

                                            <div class="form-group">
                                                <label for="berobatKlinik">Berobat Klinik T3 Domestik <span class="text-danger"><b>*</b></span></label>
                                                <input type="number" min="0" class="form-control" name="berobatKlinik" id="berobatKlinik" value="<?= $laporan['berobatKlinik']; ?>" required>
                                            </div>

                                            <div class="form-group">
                                                <label for="LTHamil">LT Hamil T3 Domestik <span class="text-danger"><b>*</b></span></label>
                                                <input type="number" min="0" class="form-control" name="LTHamil" id="LTHamil" value="<?= $laporan['LTHamil']; ?>" required>
                                            </div>

                                            <div class="form-group">
                                                <label for="LTUmum">LT Umum T3 Domestik <span class="text-danger"><b>*</b></span></label>
                                                <input type="number" min="0" class="form-control" name="LTUmum" id="LTUmum" value="<?= $laporan['LTUmum']; ?>" required>
                                            </div>

                                            <div class="form-group">
                                                <label for="TLTHamil">TLT Hamil T3 Domestik <span class="text-danger"><b>*</b></span></label>
                                                <input type="number" min="0" class="form-control" name="TLTHamil" id="TLTHamil" value="<?= $laporan['TLTHamil']; ?>" required>
                                            </div>

                                            <div class="form-group">
                                                <label for="TLTUmum">TLT Umum T3 Domestik <span class="text-danger"><b>*</b></span></label>
                                                <input type="number" min="0" class="form-control" name="TLTUmum" id="TLTUmum" value="<?= $laporan['TLTUmum']; ?>" required>
                                            </div>

                                            <div class="form-group">
                                                <label for="laporanKematian">Laporan Kematian T3 Domestik <span class="text-danger"><b>*</b></span></label>
                                                <textarea type="text" rows="3" class="form-control" name="laporanKematian" id="laporanKematian" required><?= $laporan['laporanKematian']; ?></textarea>
                                            </div>

                                            <div class="form-group">
                                                <label for="dataCalon_paxAntigenPCRPositif">Data Calon pax dengan Antigen/PCR Positif T3 Domestik <span class="text-danger"><b>*</b></span></label>
                                                <input type="number" min="0" class="form-control" name="dataCalon_paxAntigenPCRPositif" id="dataCalon_paxAntigenPCRPositif" value="<?= $laporan['dataCalon_paxAntigenPCRPositif']; ?>" required>
                                            </div>

                                            <div class="form-group">
                                                <label for="kesimpulanPemeriksaan_suhuPaxPersonil">Kesimpulan pemeriksaan suhu pax dan personil T3 Domestik <span class="text-danger"><b>*</b></span></label>
                                                <textarea type="text" rows="3" class="form-control" name="kesimpulanPemeriksaan_suhuPaxPersonil" id="kesimpulanPemeriksaan_suhuPaxPersonil" required><?= $laporan['kesimpulanPemeriksaan_suhuPaxPersonil']; ?></textarea>
                                            </div>

                                            <div class="form-group">
                                                <label for="petugas">Petugas T3 Domestik <span class="text-danger"><b>*</b></span></label>
                                                <textarea type="text" rows="3" class="form-control" name="petugas" id="petugas" required><?= $laporan['petugas']; ?></textarea>
                                            </div>

                                            <div class="form-group">
                                                <label for="tenagaBantuan_pagi">Tenaga Bantuan Pagi T3 Domestik <span class="text-danger"><b>*</b></span></label>
                                                <textarea type="text" rows="3" class="form-control" name="tenagaBantuan_pagi" id="tenagaBantuan_pagi" required><?= $laporan['tenagaBantuan_pagi']; ?></textarea>
                                            </div>

                                            <div class="form-group">
                                                <label for="tenagaBantuan_malam">Tenaga Bantuan Malam T3 Domestik <span class="text-danger"><b>*</b></span></label>
                                                <textarea type="text" rows="3" class="form-control" name="tenagaBantuan_malam" id="tenagaBantuan_malam" required><?= $laporan['tenagaBantuan_malam']; ?></textarea>
                                            </div>

                                            <div class="form-group">
                                                <label for="laporanKeterangan_tambahan">Laporan/Keterangan Tambahan T3 Domestik (bila ada) </label>
                                                <textarea type="text" rows="3" class="form-control" name="laporanKeterangan_tambahan" id="laporanKeterangan_tambahan"><?= $laporan['laporanKeterangan_tambahan']; ?></textarea>
                                            </div>

                                            <div class="form-group">
                                                <label for="formatLaporan">Unggah Format Laporan T3 Domestik <span class="text-danger"><b>*</b></span></label>
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
                                                move_uploaded_file($lokasi, "../laporanT3Domestik/" . $nama);
                                                $sql = "UPDATE laporanT3Domestik SET
                                            kedatanganFlight = '$_POST[kedatanganFlight]',
                                            cargoKedatangan = '$_POST[cargoKedatangan]',
                                            paxKedatangan = '$_POST[paxKedatangan]',
                                            cabinCrew_kedatangan = '$_POST[cabinCrew_kedatangan]',
                                            keberangkatanFlight = '$_POST[keberangkatanFlight]',
                                            cargoKeberangkatan = '$_POST[cargoKeberangkatan]',
                                            paxKeberangkatan = '$_POST[paxKeberangkatan]',
                                            cabinCrew_keberangkatan = '$_POST[cabinCrew_keberangkatan]',
                                            laporanValidasi_manualKeberangkatan = '$_POST[laporanValidasi_manualKeberangkatan]',
                                            validasiHongkong= '$_POST[validasiHongkong]',
                                            profilPenapisan_PL = '$_POST[profilPenapisan_PL]',
                                            dataWNA_WNISelesaiKarantina = '$_POST[dataWNA_WNISelesaiKarantina]',
                                            laporanPE = '$_POST[laporanPE]',
                                            berobatKlinik = '$_POST[berobatKlinik]',
                                            LTHamil = '$_POST[LTHamil]',
                                            LTUmum = '$_POST[LTUmum]',
                                            TLTHamil = '$_POST[TLTHamil]',
                                            TLTUmum = '$_POST[TLTUmum]',
                                            laporanKematian = '$_POST[laporanKematian]',
                                            dataCalon_paxAntigenPCRPositif = '$_POST[dataCalon_paxAntigenPCRPositif]',
                                            kesimpulanPemeriksaan_suhuPaxPersonil = '$_POST[kesimpulanPemeriksaan_suhuPaxPersonil]',
                                            petugas = '$_POST[petugas]',
                                            tenagaBantuan_pagi = '$_POST[tenagaBantuan_pagi]',
                                            tenagaBantuan_malam = '$_POST[tenagaBantuan_malam]',
                                            laporanKeterangan_tambahan = '$_POST[laporanKeterangan_tambahan]',
                                            formatLaporan = '$nama'
                                            WHERE tgl_lapor = CURDATE()";
                                            } else {
                                                $sql = "UPDATE laporanT3Domestik SET
                                            kedatanganFlight = '$_POST[kedatanganFlight]',
                                            cargoKedatangan = '$_POST[cargoKedatangan]',
                                            paxKedatangan = '$_POST[paxKedatangan]',
                                            cabinCrew_kedatangan = '$_POST[cabinCrew_kedatangan]',
                                            keberangkatanFlight = '$_POST[keberangkatanFlight]',
                                            cargoKeberangkatan = '$_POST[cargoKeberangkatan]',
                                            paxKeberangkatan = '$_POST[paxKeberangkatan]',
                                            cabinCrew_keberangkatan = '$_POST[cabinCrew_keberangkatan]',
                                            laporanValidasi_manualKeberangkatan = '$_POST[laporanValidasi_manualKeberangkatan]',
                                            validasiHongkong= '$_POST[validasiHongkong]',
                                            profilPenapisan_PL = '$_POST[profilPenapisan_PL]',
                                            dataWNA_WNISelesaiKarantina = '$_POST[dataWNA_WNISelesaiKarantina]',
                                            laporanPE = '$_POST[laporanPE]',
                                            berobatKlinik = '$_POST[berobatKlinik]',
                                            LTHamil = '$_POST[LTHamil]',
                                            LTUmum = '$_POST[LTUmum]',
                                            TLTHamil = '$_POST[TLTHamil]',
                                            TLTUmum = '$_POST[TLTUmum]',
                                            laporanKematian = '$_POST[laporanKematian]',
                                            dataCalon_paxAntigenPCRPositif = '$_POST[dataCalon_paxAntigenPCRPositif]',
                                            kesimpulanPemeriksaan_suhuPaxPersonil = '$_POST[kesimpulanPemeriksaan_suhuPaxPersonil]',
                                            petugas = '$_POST[petugas]',
                                            tenagaBantuan_pagi = '$_POST[tenagaBantuan_pagi]',
                                            tenagaBantuan_malam = '$_POST[tenagaBantuan_malam]',
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