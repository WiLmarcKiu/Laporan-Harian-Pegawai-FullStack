<?php

require '../koneksi.php';

//? CONVERT EXCEL
header("Content-type:application/vnd-ms-excel");
header("Content-Disposition: attachment; filename=Laporan Keseluruhan IGD CC.xls");

?>

<h2>
    <center>Laporan Keseluruhan IGD CC</center>
</h2>

<table border="1" cellpadding="10" cellspacing="0">
    <tr>
        <th>No</th>
        <th>Pelaporan Tanggal</th>
        <th>Stok Awal - Rapid Antibodi</th>
        <th>Terima Stok - Rapid Antibodi</th>
        <th>Pemakaian - Rapid Antibodi</th>
        <th>Hasil Rapid Antibodi Reaktif</th>
        <th>Hasil Rapid Antibodi Non Reaktif</th>
        <th>Stok Awal - Rapid ANTIGEN</th>
        <th>Terima Stok - Rapid ANTIGEN</th>
        <th>Pemakaian Rapid ANTIGEN</th>
        <th>Hasil Rapid ANTIGEN Negatif</th>
        <th>Hasil Rapid ANTIGEN Positif</th>
        <th>Stok Akhir - Rapid ANTIGEN</th>
        <th>Pengunjung Klinik Berobat Jalan</th>
        <th>Pengunjung Klinik LT/SIAOS</th>
        <th>Pengunjung Klinik TLT</th>
        <th>Pengunjung Klinik Meninggal</th>
        <th>Jumlah Penerbitan Dokumen Surat Izin Angkut Jenazah</th>
        <th>Jumlah Laporan Ambulance</th>
        <th>Jumlah Laporan KLL</th>
        <th>Jumlah Laporan Kejadian K3</th>
        <th>Jumlah Laporan Kematian</th>
        <th>Pengiriman Sampel ke BBTKLPP</th>
        <th>Petugas</th>
        <th>Laporan/Keterangan Tambahan</th>
        <th>Format Laporan</th>
    </tr>
    <?php $nomor = 1; ?>
    <?php $ambil = mysqli_query($koneksi, "SELECT * FROM laporanIgdCc"); ?>
    <?php while ($data = $ambil->fetch_assoc()) { ?>
        <tr>
            <td><?= $nomor; ?></td>
            <td><?= date("d F Y", strtotime($data['tgl_lapor'])) ?></td>
            <td><?= $data['stokAwal_rapidAntibodi']; ?></td>
            <td><?= $data['terimaStok_rapidAntibodi']; ?></td>
            <td><?= $data['pemakaianRapid_antibodi']; ?></td>
            <td><?= $data['hasilRapid_antibodiReaktif']; ?></td>
            <td><?= $data['hasilRapid_antibodiNonReaktif']; ?></td>
            <td><?= $data['stokAwal_rapidAntigen']; ?></td>
            <td><?= $data['terimaStok_rapidAntigen']; ?></td>
            <td><?= $data['pemakaianRapid_antibodi']; ?></td>
            <td><?= $data['hasilRapid_antigenNegatif']; ?></td>
            <td><?= $data['hasilRapid_antigenPositif']; ?></td>
            <td><?= $data['stokAkhir_rapidAntigen']; ?></td>
            <td><?= $data['pengunjungKlinik_berobatJalan']; ?></td>
            <td><?= $data['pengunjungKlinik_ltSiaos']; ?></td>
            <td><?= $data['pengunjungKlinik_tlt']; ?></td>
            <td><?= $data['pengunjungKlinik_meninggal']; ?></td>
            <td><?= $data['jumlahPenerbitan_dokumenSuratIzinAngkutJenazah']; ?></td>
            <td><?= $data['jumlahLaporan_ambulance']; ?></td>
            <td><?= $data['jumlahLaporan_kll']; ?></td>
            <td><?= $data['jumlahLaporan_kejadianK3']; ?></td>
            <td><?= $data['jumlahLaporan_kematian']; ?></td>
            <td><?= $data['pengirimanSampel_keBbtklpp']; ?></td>
            <td><?= $data['petugas']; ?></td>
            <td><?= $data['laporanKeterangan_tambahan']; ?></td>
            <td><?= $data['formatLaporan']; ?></td>
        </tr>

        <?php $nomor++; ?>
    <?php } ?>
</table>