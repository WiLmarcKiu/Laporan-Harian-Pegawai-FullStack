<?php
date_default_timezone_set('Asia/Jakarta');
require '../koneksi.php';

$tgl_kemarin    = date('Y-m-d', strtotime("-1 day", strtotime(date("Y-m-d"))));

$ambil = $koneksi->query("SELECT * FROM laporanT1ShapireVIP WHERE tgl_lapor = '$tgl_kemarin'");

// cek data yang sama
$cek = $ambil->num_rows;

if ($cek == 1) {
    echo "<script>location='selesai.php';</script>";
} else {
    echo "<script>location='index.php';</script>";
}
