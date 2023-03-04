<?php
date_default_timezone_set('Asia/Jakarta');
require '../koneksi.php';

if (!isset($_SESSION["igdCc"])) {
    echo "<script>alert('Silahkan Login terlebih dahulu');</script>";
    echo "<script>location='../index.php';</script>";
}
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>KKP SOETTA | IGD CC</title>
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

                                        $dataLaporan = $koneksi->query("SELECT * FROM laporanIgdCc WHERE tgl_lapor = '$tgl_kemarin'");

                                        $laporan = $dataLaporan->fetch_assoc();
                                        ?>

                                        <form action="" method="POST" enctype="multipart/form-data">
                                            <div class="form-group">
                                                <label for="tgl_lapor">Pelaporan Tanggal</label>
                                                <input id="tgl_lapor" type="text" class="form-control" name="tgl_lapor" id="tgl_lapor" value="<?= date("d F Y", strtotime($laporan['tgl_lapor'])) ?>" required disabled>
                                            </div>

                                            <div class="form-group">
                                                <label for="stokAwal_rapidAntibodi">Stok Awal - Rapid Antibodi IGD CC <span class="text-danger"><b>*</b></span></label>
                                                <input type="number" min="0" class="form-control" name="stokAwal_rapidAntibodi" id="stokAwal_rapidAntibodi" value="<?= $laporan['stokAwal_rapidAntibodi']; ?>" required>
                                            </div>

                                            <div class="form-group">
                                                <label for="terimaStok_rapidAntibodi">Terima Stok - Rapid Antibodi IGD CC <span class="text-danger"><b>*</b></span></label>
                                                <input type="number" min="0" class="form-control" name="terimaStok_rapidAntibodi" id="terimaStok_rapidAntibodi" value="<?= $laporan['terimaStok_rapidAntibodi']; ?>" required>
                                            </div>

                                            <div class="form-group">
                                                <label for="pemakaianRapid_antibodi">Pemakaian - Rapid Antibodi IGD CC <span class="text-danger"><b>*</b></span></label>
                                                <input type="number" min="0" class="form-control" name="pemakaianRapid_antibodi" id="pemakaianRapid_antibodi" value="<?= $laporan['pemakaianRapid_antibodi']; ?>" required>
                                            </div>

                                            <div class="form-group">
                                                <label for="hasilRapid_antibodiReaktif">Hasil Rapid Antibodi Reaktif IGD CC <span class="text-danger"><b>*</b></span></label>
                                                <input type="number" min="0" class="form-control" name="hasilRapid_antibodiReaktif" id="hasilRapid_antibodiReaktif" value="<?= $laporan['hasilRapid_antibodiReaktif']; ?>" required>
                                            </div>

                                            <div class="form-group">
                                                <label for="hasilRapid_antibodiNonReaktif">Hasil Rapid Antibodi Non Reaktif IGD CC <span class="text-danger"><b>*</b></span></label>
                                                <input type="number" min="0" class="form-control" name="hasilRapid_antibodiNonReaktif" id="hasilRapid_antibodiNonReaktif" value="<?= $laporan['hasilRapid_antibodiNonReaktif']; ?>" required>
                                            </div>

                                            <div class="form-group">
                                                <label for="stokAwal_rapidAntigen">Stok Awal - Rapid ANTIGEN IGD CC <span class="text-danger"><b>*</b></span></label>
                                                <input type="number" min="0" class="form-control" name="stokAwal_rapidAntigen" id="stokAwal_rapidAntigen" value="<?= $laporan['stokAwal_rapidAntigen']; ?>" required>
                                            </div>

                                            <div class="form-group">
                                                <label for="terimaStok_rapidAntigen">Terima Stok - Rapid ANTIGEN IGD CC <span class="text-danger"><b>*</b></span></label>
                                                <input type="number" min="0" class="form-control" name="terimaStok_rapidAntigen" id="terimaStok_rapidAntigen" value="<?= $laporan['terimaStok_rapidAntigen']; ?>" required>
                                            </div>

                                            <div class="form-group">
                                                <label for="pemakaianRapidAntigen">Pemakaian Rapid ANTIGEN IGD CC <span class="text-danger"><b>*</b></span></label>
                                                <input type="number" min="0" class="form-control" name="pemakaianRapidAntigen" id="pemakaianRapidAntigen" value="<?= $laporan['pemakaianRapidAntigen']; ?>" required>
                                            </div>

                                            <div class="form-group">
                                                <label for="hasilRapid_antigenNegatif">Hasil Rapid ANTIGEN Negatif IGD CC <span class="text-danger"><b>*</b></span></label>
                                                <input type="number" min="0" class="form-control" name="hasilRapid_antigenNegatif" id="hasilRapid_antigenNegatif" value="<?= $laporan['hasilRapid_antigenNegatif']; ?>" required>
                                            </div>

                                            <div class="form-group">
                                                <label for="hasilRapid_antigenPositif">Hasil Rapid ANTIGEN Positif IGD CC <span class="text-danger"><b>*</b></span></label>
                                                <input type="number" min="0" class="form-control" name="hasilRapid_antigenPositif" id="hasilRapid_antigenPositif" value="<?= $laporan['hasilRapid_antigenPositif']; ?>" required>
                                            </div>

                                            <div class="form-group">
                                                <label for="stokAkhir_rapidAntigen">Stok Akhir - Rapid ANTIGEN IGD CC <span class="text-danger"><b>*</b></span></label>
                                                <input type="number" min="0" class="form-control" name="stokAkhir_rapidAntigen" id="stokAkhir_rapidAntigen" value="<?= $laporan['stokAkhir_rapidAntigen']; ?>" required>
                                            </div>

                                            <div class="form-group">
                                                <label for="pengunjungKlinik_berobatJalan">Pengunjung Klinik Berobat Jalan IGD CC <span class="text-danger"><b>*</b></span></label>
                                                <input type="number" min="0" class="form-control" name="pengunjungKlinik_berobatJalan" id="pengunjungKlinik_berobatJalan" value="<?= $laporan['pengunjungKlinik_berobatJalan']; ?>" required>
                                            </div>

                                            <div class="form-group">
                                                <label for="pengunjungKlinik_ltSiaos">Pengunjung Klinik LT/SIAOS IGD CC <span class="text-danger"><b>*</b></span></label>
                                                <input type="number" min="0" class="form-control" name="pengunjungKlinik_ltSiaos" id="pengunjungKlinik_ltSiaos" value="<?= $laporan['pengunjungKlinik_ltSiaos']; ?>" required>
                                            </div>

                                            <div class="form-group">
                                                <label for="pengunjungKlinik_tlt">Pengunjung Klinik TLT IGD CC <span class="text-danger"><b>*</b></span></label>
                                                <input type="number" min="0" class="form-control" name="pengunjungKlinik_tlt" id="pengunjungKlinik_tlt" value="<?= $laporan['pengunjungKlinik_tlt']; ?>" required>
                                            </div>

                                            <div class="form-group">
                                                <label for="pengunjungKlinik_meninggal">Pengunjung Klinik Meninggal IGD CC <span class="text-danger"><b>*</b></span></label>
                                                <input type="number" min="0" class="form-control" name="pengunjungKlinik_meninggal" id="pengunjungKlinik_meninggal" value="<?= $laporan['pengunjungKlinik_meninggal']; ?>" required>
                                            </div>

                                            <div class="form-group">
                                                <label for="jumlahPenerbitan_dokumenSuratIzinAngkutJenazah">Jumlah Penerbitan Dokumen Surat Izin Angkut Jenazah IGD CC <span class="text-danger"><b>*</b></span></label>
                                                <input type="number" min="0" class="form-control" name="jumlahPenerbitan_dokumenSuratIzinAngkutJenazah" id="jumlahPenerbitan_dokumenSuratIzinAngkutJenazah" value="<?= $laporan['jumlahPenerbitan_dokumenSuratIzinAngkutJenazah']; ?>" required>
                                            </div>

                                            <div class="form-group">
                                                <label for="jumlahLaporan_ambulance">Jumlah Laporan Ambulance IGD CC <span class="text-danger"><b>*</b></span></label>
                                                <input type="number" min="0" class="form-control" name="jumlahLaporan_ambulance" id="jumlahLaporan_ambulance" value="<?= $laporan['jumlahLaporan_ambulance']; ?>" required>
                                            </div>

                                            <div class="form-group">
                                                <label for="jumlahLaporan_kll">Jumlah Laporan KLL IGD CC <span class="text-danger"><b>*</b></span></label>
                                                <input type="number" min="0" class="form-control" name="jumlahLaporan_kll" id="jumlahLaporan_kll" value="<?= $laporan['jumlahLaporan_kll']; ?>" required>
                                            </div>

                                            <div class="form-group">
                                                <label for="jumlahLaporan_kejadianK3">Jumlah Laporan Kejadian K3 IGD CC <span class="text-danger"><b>*</b></span></label>
                                                <input type="number" min="0" class="form-control" name="jumlahLaporan_kejadianK3" id="jumlahLaporan_kejadianK3" value="<?= $laporan['jumlahLaporan_kejadianK3']; ?>" required>
                                            </div>

                                            <div class="form-group">
                                                <label for="jumlahLaporan_kematian">Jumlah Laporan Kematian IGD CC <span class="text-danger"><b>*</b></span></label>
                                                <input type="number" min="0" class="form-control" name="jumlahLaporan_kematian" id="jumlahLaporan_kematian" value="<?= $laporan['jumlahLaporan_kematian']; ?>" required>
                                            </div>

                                            <div class="form-group">
                                                <label for="pengirimanSampel_keBbtklpp">Pengiriman Sampel ke BBTKLPP IGD CC <span class="text-danger"><b>*</b></span></label>
                                                <input type="number" min="0" class="form-control" name="pengirimanSampel_keBbtklpp" id="pengirimanSampel_keBbtklpp" value="<?= $laporan['pengirimanSampel_keBbtklpp']; ?>" required>
                                            </div>

                                            <div class="form-group">
                                                <label for="petugas">Petugas IGD CC <span class="text-danger"><b>*</b></span></label>
                                                <textarea type="text" rows="3" class="form-control" name="petugas" id="petugas" required><?= $laporan['petugas']; ?></textarea>
                                            </div>

                                            <div class="form-group">
                                                <label for="laporanKeterangan_tambahan">Laporan/Keterangan Tambahan IGD CC (bila ada)</label>
                                                <textarea type="text" rows="3" class="form-control" name="laporanKeterangan_tambahan" id="laporanKeterangan_tambahan"><?= $laporan['laporanKeterangan_tambahan']; ?>
                                                </textarea>
                                            </div>

                                            <div class="form-group">
                                                <label for="formatLaporan">Unggah Format Laporan IGD CC <span class="text-danger"><b>*</b></span></label>
                                                <p>Laporan : <b><?= $laporan['formatLaporan']; ?></b></p>
                                                <input type="file" class="form-control" name="formatLaporan" id="formatLaporan">
                                                <p class="text-danger" style="font-size: 14px; margin-top: 5px; font-style: italic;">Harap rename dokumen menjadi Laporan IGD CC_tanggal (mis. <b>Laporan IGD CC_090822</b>). Maksimum ukuran dokumen <b>2MB</b>.</p>
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
                                                move_uploaded_file($lokasi, "../laporanIgdCc/" . $nama);
                                                $sql = "UPDATE laporanIgdCc SET
                                            stokAwal_rapidAntibodi = '$_POST[stokAwal_rapidAntibodi]',
                                            terimaStok_rapidAntibodi = '$_POST[terimaStok_rapidAntibodi]',
                                            pemakaianRapid_antibodi = '$_POST[pemakaianRapid_antibodi]',
                                            hasilRapid_antibodiReaktif = '$_POST[hasilRapid_antibodiReaktif]',
                                            hasilRapid_antibodiNonReaktif = '$_POST[hasilRapid_antibodiNonReaktif]',
                                            stokAwal_rapidAntigen = '$_POST[stokAwal_rapidAntigen]',
                                            terimaStok_rapidAntigen = '$_POST[terimaStok_rapidAntigen]',
                                            pemakaianRapidAntigen = '$_POST[pemakaianRapidAntigen]',
                                            hasilRapid_antigenNegatif = '$_POST[hasilRapid_antigenNegatif]',
                                            hasilRapid_antigenPositif= '$_POST[hasilRapid_antigenPositif]',
                                            stokAkhir_rapidAntigen = '$_POST[stokAkhir_rapidAntigen]',
                                            pengunjungKlinik_berobatJalan = '$_POST[pengunjungKlinik_berobatJalan]',
                                            pengunjungKlinik_ltSiaos = '$_POST[pengunjungKlinik_ltSiaos]',
                                            pengunjungKlinik_tlt = '$_POST[pengunjungKlinik_tlt]',
                                            pengunjungKlinik_meninggal = '$_POST[pengunjungKlinik_meninggal]',
                                            jumlahPenerbitan_dokumenSuratIzinAngkutJenazah = '$_POST[jumlahPenerbitan_dokumenSuratIzinAngkutJenazah]',
                                            jumlahLaporan_ambulance = '$_POST[jumlahLaporan_ambulance]',
                                            jumlahLaporan_kll = '$_POST[jumlahLaporan_kll]',
                                            jumlahLaporan_kejadianK3 = '$_POST[jumlahLaporan_kejadianK3]',
                                            jumlahLaporan_kematian = '$_POST[jumlahLaporan_kematian]',
                                            pengirimanSampel_keBbtklpp = '$_POST[pengirimanSampel_keBbtklpp]',
                                            petugas = '$_POST[petugas]',
                                            laporanKeterangan_tambahan = '$_POST[laporanKeterangan_tambahan]',
                                            formatLaporan = '$nama'
                                            WHERE tgl_lapor = CURDATE()";
                                            } else {
                                                $sql = "UPDATE laporanIgdCc SET
                                            stokAwal_rapidAntibodi = '$_POST[stokAwal_rapidAntibodi]',
                                            terimaStok_rapidAntibodi = '$_POST[terimaStok_rapidAntibodi]',
                                            pemakaianRapid_antibodi = '$_POST[pemakaianRapid_antibodi]',
                                            hasilRapid_antibodiReaktif = '$_POST[hasilRapid_antibodiReaktif]',
                                            hasilRapid_antibodiNonReaktif = '$_POST[hasilRapid_antibodiNonReaktif]',
                                            stokAwal_rapidAntigen = '$_POST[stokAwal_rapidAntigen]',
                                            terimaStok_rapidAntigen = '$_POST[terimaStok_rapidAntigen]',
                                            pemakaianRapidAntigen = '$_POST[pemakaianRapidAntigen]',
                                            hasilRapid_antigenNegatif = '$_POST[hasilRapid_antigenNegatif]',
                                            hasilRapid_antigenPositif= '$_POST[hasilRapid_antigenPositif]',
                                            stokAkhir_rapidAntigen = '$_POST[stokAkhir_rapidAntigen]',
                                            pengunjungKlinik_berobatJalan = '$_POST[pengunjungKlinik_berobatJalan]',
                                            pengunjungKlinik_ltSiaos = '$_POST[pengunjungKlinik_ltSiaos]',
                                            pengunjungKlinik_tlt = '$_POST[pengunjungKlinik_tlt]',
                                            pengunjungKlinik_meninggal = '$_POST[pengunjungKlinik_meninggal]',
                                            jumlahPenerbitan_dokumenSuratIzinAngkutJenazah = '$_POST[jumlahPenerbitan_dokumenSuratIzinAngkutJenazah]',
                                            jumlahLaporan_ambulance = '$_POST[jumlahLaporan_ambulance]',
                                            jumlahLaporan_kll = '$_POST[jumlahLaporan_kll]',
                                            jumlahLaporan_kejadianK3 = '$_POST[jumlahLaporan_kejadianK3]',
                                            jumlahLaporan_kematian = '$_POST[jumlahLaporan_kematian]',
                                            pengirimanSampel_keBbtklpp = '$_POST[pengirimanSampel_keBbtklpp]',
                                            petugas = '$_POST[petugas]',
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