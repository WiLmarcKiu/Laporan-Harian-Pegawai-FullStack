-- phpMyAdmin SQL Dump
-- version 4.8.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 03 Sep 2022 pada 16.15
-- Versi server: 10.1.31-MariaDB
-- Versi PHP: 7.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kkpsoetta`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`id_admin`, `username`, `password`) VALUES
(1, 'Admin KKP', 'admin');

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin_igdcc`
--

CREATE TABLE `admin_igdcc` (
  `id_admin_igdcc` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `admin_igdcc`
--

INSERT INTO `admin_igdcc` (`id_admin_igdcc`, `username`, `password`) VALUES
(1, 'Admin IGD CC', 'igdcc');

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin_t1a`
--

CREATE TABLE `admin_t1a` (
  `id_admin_t1a` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `admin_t1a`
--

INSERT INTO `admin_t1a` (`id_admin_t1a`, `username`, `password`) VALUES
(1, 'Admin T1A', 't1a');

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin_t1shapirevip`
--

CREATE TABLE `admin_t1shapirevip` (
  `id_admin_t1shapirevip` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `admin_t1shapirevip`
--

INSERT INTO `admin_t1shapirevip` (`id_admin_t1shapirevip`, `username`, `password`) VALUES
(1, 'Admin T1 Shapire VIP', 't1shapirevip');

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin_t2dedomestik`
--

CREATE TABLE `admin_t2dedomestik` (
  `id_admin_t2dedomestik` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `admin_t2dedomestik`
--

INSERT INTO `admin_t2dedomestik` (`id_admin_t2dedomestik`, `username`, `password`) VALUES
(1, 'Admin T2 D-E Domestik', 't2dedomestik');

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin_t3domestik`
--

CREATE TABLE `admin_t3domestik` (
  `id_admin_t3domestik` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `admin_t3domestik`
--

INSERT INTO `admin_t3domestik` (`id_admin_t3domestik`, `username`, `password`) VALUES
(1, 'Admin T3 Domestik', 't3domestik');

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin_t3internasional`
--

CREATE TABLE `admin_t3internasional` (
  `id_admin_t3internasional` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `admin_t3internasional`
--

INSERT INTO `admin_t3internasional` (`id_admin_t3internasional`, `username`, `password`) VALUES
(1, 'Admin T3 Internasional', 't3internasional');

-- --------------------------------------------------------

--
-- Struktur dari tabel `laporanigdcc`
--

CREATE TABLE `laporanigdcc` (
  `id_laporanIgdCc` bigint(20) NOT NULL,
  `tgl_lapor` date NOT NULL,
  `stokAwal_rapidAntibodi` bigint(20) NOT NULL,
  `terimaStok_rapidAntibodi` bigint(20) NOT NULL,
  `pemakaianRapid_antibodi` bigint(20) NOT NULL,
  `hasilRapid_antibodiReaktif` bigint(20) NOT NULL,
  `hasilRapid_antibodiNonReaktif` bigint(20) NOT NULL,
  `stokAwal_rapidAntigen` bigint(20) NOT NULL,
  `terimaStok_rapidAntigen` bigint(20) NOT NULL,
  `pemakaianRapidAntigen` bigint(20) NOT NULL,
  `hasilRapid_antigenNegatif` bigint(20) NOT NULL,
  `hasilRapid_antigenPositif` bigint(20) NOT NULL,
  `stokAkhir_rapidAntigen` bigint(20) NOT NULL,
  `pengunjungKlinik_berobatJalan` bigint(20) NOT NULL,
  `pengunjungKlinik_ltSiaos` bigint(20) NOT NULL,
  `pengunjungKlinik_tlt` bigint(20) NOT NULL,
  `pengunjungKlinik_meninggal` bigint(20) NOT NULL,
  `jumlahPenerbitan_dokumenSuratIzinAngkutJenazah` bigint(20) NOT NULL,
  `jumlahLaporan_ambulance` bigint(20) NOT NULL,
  `jumlahLaporan_kll` bigint(20) NOT NULL,
  `jumlahLaporan_kejadianK3` bigint(20) NOT NULL,
  `jumlahLaporan_kematian` bigint(20) NOT NULL,
  `pengirimanSampel_keBbtklpp` bigint(20) NOT NULL,
  `petugas` mediumtext NOT NULL,
  `laporanKeterangan_tambahan` mediumtext NOT NULL,
  `formatLaporan` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `laporant1a`
--

CREATE TABLE `laporant1a` (
  `id_laporanT1A` int(11) NOT NULL,
  `tgl_lapor` date NOT NULL,
  `jumlahPesawat_kedatangan` bigint(20) NOT NULL,
  `paxKedatangan` bigint(20) NOT NULL,
  `personilKedatangan` bigint(20) NOT NULL,
  `pengawasanTS_kedatangan` bigint(20) NOT NULL,
  `jumlahPesawat_keberangkatan` bigint(20) NOT NULL,
  `paxKeberangkatan` bigint(20) NOT NULL,
  `personilKeberangkatan` bigint(20) NOT NULL,
  `validasiManual_keberangkatan` bigint(20) NOT NULL,
  `validasiBy_PL` bigint(20) NOT NULL,
  `berobatKlinik` bigint(20) NOT NULL,
  `LTHamil_klinik` bigint(20) NOT NULL,
  `LTUmum_klinik` bigint(20) NOT NULL,
  `TLTHamil_klinik` bigint(20) NOT NULL,
  `TLTUmum_klinik` bigint(20) NOT NULL,
  `rujukKlinik` bigint(20) NOT NULL,
  `laporanNotifikasi_penemuanKasusCOVID` mediumtext NOT NULL,
  `petugas` mediumtext NOT NULL,
  `relawanPagi` mediumtext NOT NULL,
  `relawanMalam` mediumtext NOT NULL,
  `laporanKeterangan_tambahan` mediumtext NOT NULL,
  `formatLaporan` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `laporant1a`
--

INSERT INTO `laporant1a` (`id_laporanT1A`, `tgl_lapor`, `jumlahPesawat_kedatangan`, `paxKedatangan`, `personilKedatangan`, `pengawasanTS_kedatangan`, `jumlahPesawat_keberangkatan`, `paxKeberangkatan`, `personilKeberangkatan`, `validasiManual_keberangkatan`, `validasiBy_PL`, `berobatKlinik`, `LTHamil_klinik`, `LTUmum_klinik`, `TLTHamil_klinik`, `TLTUmum_klinik`, `rujukKlinik`, `laporanNotifikasi_penemuanKasusCOVID`, `petugas`, `relawanPagi`, `relawanMalam`, `laporanKeterangan_tambahan`, `formatLaporan`) VALUES
(1, '2022-08-31', 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, '16', 'Aron', 'Elma', 'Nilsan', '                                                                                                                                                                                                ', 'pengumuman.png');

-- --------------------------------------------------------

--
-- Struktur dari tabel `laporant1shapirevip`
--

CREATE TABLE `laporant1shapirevip` (
  `id_laporanT1ShapireVIP` bigint(20) NOT NULL,
  `tgl_lapor` date NOT NULL,
  `kedatanganDomestik_flight` bigint(20) NOT NULL,
  `paxKedatangan_domestik` bigint(20) NOT NULL,
  `personilKedatangan_domestik` bigint(20) NOT NULL,
  `keberangkatanDomestik_flight` bigint(20) NOT NULL,
  `paxKeberangkatan_domestik` bigint(20) NOT NULL,
  `personilKeberangkatan_domsetik` bigint(20) NOT NULL,
  `eHACPL_keberangkatanDomestik` bigint(20) NOT NULL,
  `noneHAC_validasiManualKeberangkatanDomestik` bigint(20) NOT NULL,
  `kedatanganINTL_flight` bigint(20) NOT NULL,
  `paxKedatangan_INTLFlight` bigint(20) NOT NULL,
  `personilKedatangan_INTL` bigint(20) NOT NULL,
  `hasilScan_PLHijau` bigint(20) NOT NULL,
  `hasilScan_PLMerah` bigint(20) NOT NULL,
  `tidakScan_PL` bigint(20) NOT NULL,
  `WNIVaksinasi_COVIDLengkap` bigint(20) NOT NULL,
  `WNAVaksinasi_COVIDLengkap` bigint(20) NOT NULL,
  `WNIVaksinasi_COVIDBelumLengkap` bigint(20) NOT NULL,
  `WNAVaksinasi_COVIDBelumLengkap` bigint(20) NOT NULL,
  `WNIPCR_onArrival` bigint(20) NOT NULL,
  `WNAPCR_onArrival` bigint(20) NOT NULL,
  `keberangkatanINTL_flight` bigint(20) NOT NULL,
  `paxKeberangkatan_INTL` bigint(20) NOT NULL,
  `personilKeberangkatan_INTL` bigint(20) NOT NULL,
  `rincianPemeriksaan_dokKesehatanVaksinasiCovidPesawatChapterDOM` mediumtext NOT NULL,
  `rincianPemeriksaan_dokKesehatanVaksinasiCovidPesawatChapterINT` mediumtext NOT NULL,
  `kesimpulanPemeriksaan_tandaGejalaPengawasanDokumenKesehatan` mediumtext NOT NULL,
  `petugas` mediumtext NOT NULL,
  `laporanKeterangan_tambahan` mediumtext NOT NULL,
  `formatLaporan` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `laporant1shapirevip`
--

INSERT INTO `laporant1shapirevip` (`id_laporanT1ShapireVIP`, `tgl_lapor`, `kedatanganDomestik_flight`, `paxKedatangan_domestik`, `personilKedatangan_domestik`, `keberangkatanDomestik_flight`, `paxKeberangkatan_domestik`, `personilKeberangkatan_domsetik`, `eHACPL_keberangkatanDomestik`, `noneHAC_validasiManualKeberangkatanDomestik`, `kedatanganINTL_flight`, `paxKedatangan_INTLFlight`, `personilKedatangan_INTL`, `hasilScan_PLHijau`, `hasilScan_PLMerah`, `tidakScan_PL`, `WNIVaksinasi_COVIDLengkap`, `WNAVaksinasi_COVIDLengkap`, `WNIVaksinasi_COVIDBelumLengkap`, `WNAVaksinasi_COVIDBelumLengkap`, `WNIPCR_onArrival`, `WNAPCR_onArrival`, `keberangkatanINTL_flight`, `paxKeberangkatan_INTL`, `personilKeberangkatan_INTL`, `rincianPemeriksaan_dokKesehatanVaksinasiCovidPesawatChapterDOM`, `rincianPemeriksaan_dokKesehatanVaksinasiCovidPesawatChapterINT`, `kesimpulanPemeriksaan_tandaGejalaPengawasanDokumenKesehatan`, `petugas`, `laporanKeterangan_tambahan`, `formatLaporan`) VALUES
(1, '2022-09-01', 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 'PT PTN / T7-ROB / CGK-MLG / 05.30 WIB Pax : 9 Orang (Dosis Booster)', 'PT PTN / T7-ROB / CGK-MLG / 05.30 WIB Pax : 9 Orang (Dosis Booster)', 'Baik', 'Vito', '', 'elma.png'),
(2, '2022-09-03', 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, '24', '25', '26', '27', '', 'bacaan.png');

-- --------------------------------------------------------

--
-- Struktur dari tabel `laporant2dedomestik`
--

CREATE TABLE `laporant2dedomestik` (
  `id_laporanT2DEDomestik` bigint(20) NOT NULL,
  `tgl_lapor` date NOT NULL,
  `kedatanganFlight` bigint(20) NOT NULL,
  `paxKedatangan_flight` bigint(20) NOT NULL,
  `personilKedatangan_flight` bigint(20) NOT NULL,
  `keberangkatanFlight` bigint(20) NOT NULL,
  `paxKeberangkatan_flight` bigint(20) NOT NULL,
  `personilKeberangkatan_flight` bigint(20) NOT NULL,
  `validasiManual` bigint(20) NOT NULL,
  `rincianValidasi_manual` bigint(20) NOT NULL,
  `validasiPeduli_lindungi` bigint(20) NOT NULL,
  `berobatKlinik` bigint(20) NOT NULL,
  `LTHamil` bigint(20) NOT NULL,
  `LTUmum` bigint(20) NOT NULL,
  `TLTHamil` bigint(20) NOT NULL,
  `TLTUmum` bigint(20) NOT NULL,
  `rujuk` bigint(20) NOT NULL,
  `laporanNotif_penemuanKasusCOVID` mediumtext NOT NULL,
  `petugas` mediumtext NOT NULL,
  `relawanPagi` mediumtext NOT NULL,
  `relawanMalam` mediumtext NOT NULL,
  `laporanKeterangan_tambahan` mediumtext NOT NULL,
  `formatLaporan` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `laporant2dedomestik`
--

INSERT INTO `laporant2dedomestik` (`id_laporanT2DEDomestik`, `tgl_lapor`, `kedatanganFlight`, `paxKedatangan_flight`, `personilKedatangan_flight`, `keberangkatanFlight`, `paxKeberangkatan_flight`, `personilKeberangkatan_flight`, `validasiManual`, `rincianValidasi_manual`, `validasiPeduli_lindungi`, `berobatKlinik`, `LTHamil`, `LTUmum`, `TLTHamil`, `TLTUmum`, `rujuk`, `laporanNotif_penemuanKasusCOVID`, `petugas`, `relawanPagi`, `relawanMalam`, `laporanKeterangan_tambahan`, `formatLaporan`) VALUES
(1, '2022-09-01', 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, '16', 'Vito', 'Elma', 'Nilsan', '                                                ', 'elma.png'),
(4, '2022-09-03', 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, '16', '17', '18', '19', '                                                ', 'profil.png');

-- --------------------------------------------------------

--
-- Struktur dari tabel `laporant3domestik`
--

CREATE TABLE `laporant3domestik` (
  `id_laporanT3Domestik` bigint(20) NOT NULL,
  `tgl_lapor` date NOT NULL,
  `kedatanganFlight` bigint(20) NOT NULL,
  `cargoKedatangan` bigint(20) NOT NULL,
  `paxKedatangan` bigint(20) NOT NULL,
  `cabinCrew_kedatangan` bigint(20) NOT NULL,
  `keberangkatanFlight` bigint(20) NOT NULL,
  `cargoKeberangkatan` bigint(20) NOT NULL,
  `paxKeberangkatan` bigint(20) NOT NULL,
  `cabinCrew_keberangkatan` bigint(20) NOT NULL,
  `laporanValidasi_manualKeberangkatan` mediumtext NOT NULL,
  `validasiHongkong` bigint(20) NOT NULL,
  `profilPenapisan_PL` bigint(20) NOT NULL,
  `dataWNA_WNISelesaiKarantina` bigint(20) NOT NULL,
  `laporanPE` mediumtext NOT NULL,
  `berobatKlinik` bigint(20) NOT NULL,
  `LTHamil` bigint(20) NOT NULL,
  `LTUmum` bigint(20) NOT NULL,
  `TLTHamil` bigint(20) NOT NULL,
  `TLTUmum` bigint(20) NOT NULL,
  `laporanKematian` mediumtext NOT NULL,
  `dataCalon_paxAntigenPCRPositif` bigint(20) NOT NULL,
  `kesimpulanPemeriksaan_suhuPaxPersonil` mediumtext NOT NULL,
  `petugas` mediumtext NOT NULL,
  `tenagaBantuan_pagi` mediumtext NOT NULL,
  `tenagaBantuan_malam` mediumtext NOT NULL,
  `laporanKeterangan_tambahan` mediumtext NOT NULL,
  `formatLaporan` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `laporant3domestik`
--

INSERT INTO `laporant3domestik` (`id_laporanT3Domestik`, `tgl_lapor`, `kedatanganFlight`, `cargoKedatangan`, `paxKedatangan`, `cabinCrew_kedatangan`, `keberangkatanFlight`, `cargoKeberangkatan`, `paxKeberangkatan`, `cabinCrew_keberangkatan`, `laporanValidasi_manualKeberangkatan`, `validasiHongkong`, `profilPenapisan_PL`, `dataWNA_WNISelesaiKarantina`, `laporanPE`, `berobatKlinik`, `LTHamil`, `LTUmum`, `TLTHamil`, `TLTUmum`, `laporanKematian`, `dataCalon_paxAntigenPCRPositif`, `kesimpulanPemeriksaan_suhuPaxPersonil`, `petugas`, `tenagaBantuan_pagi`, `tenagaBantuan_malam`, `laporanKeterangan_tambahan`, `formatLaporan`) VALUES
(1, '2022-09-02', 1, 2, 3, 4, 5, 6, 7, 8, '9', 10, 11, 12, '13', 14, 15, 16, 17, 18, '19', 20, '21', '22', '23', '24', '', 'home.png'),
(2, '2022-09-03', 1, 2, 3, 4, 5, 6, 7, 8, '9', 10, 11, 12, '13', 14, 15, 16, 17, 18, '19', 20, '21', '22', '23', '24', '', 'home.png');

-- --------------------------------------------------------

--
-- Struktur dari tabel `laporant3internasional`
--

CREATE TABLE `laporant3internasional` (
  `id_laporanT3Internasional` bigint(20) NOT NULL,
  `tgl_lapor` date NOT NULL,
  `kedatanganFlight` bigint(20) NOT NULL,
  `paxKedatangan_flight` bigint(20) NOT NULL,
  `personilKedatangan` bigint(20) NOT NULL,
  `penerbanganKargo_pesawat` bigint(20) NOT NULL,
  `penerbanganKargo_personil` bigint(20) NOT NULL,
  `scanPL_merahPenumpang` bigint(20) NOT NULL,
  `vaksinTidak_lengkap` bigint(20) NOT NULL,
  `belumIntegrasi_PL` bigint(20) NOT NULL,
  `belumAda_PL` bigint(20) NOT NULL,
  `scanPL_hijauPenumpang` bigint(20) NOT NULL,
  `jumlahPresentase_penumpangWNI` varchar(500) NOT NULL,
  `jumlahPresentase_penumpangWNA` varchar(500) NOT NULL,
  `WNIVaksinasi_tidakLengkap` bigint(20) NOT NULL,
  `WNIDibawah18_vaksinasiTidakLengkap` bigint(20) NOT NULL,
  `WNIKomorbid_vaksinasiTidakLengkap` bigint(20) NOT NULL,
  `WNILainnya_vaksinasiTidakLengkap` bigint(20) NOT NULL,
  `WNAVaksinasi_tidakLengkap` bigint(20) NOT NULL,
  `WNADibawah18_vaksinasiTidakLengkap` bigint(20) NOT NULL,
  `WNAKomorbid_vaksinasiTidakLengkap` bigint(20) NOT NULL,
  `WNALainnya_vaksinasiTidakLengkap` bigint(20) NOT NULL,
  `WNIVaksinasi_lengkap` bigint(20) NOT NULL,
  `WNAVaksinasi_lengkap` bigint(20) NOT NULL,
  `WNISwab_PCRKedatangan` bigint(20) NOT NULL,
  `WNASwab_PCRKedatangan` bigint(20) NOT NULL,
  `ikterik` bigint(20) NOT NULL,
  `rujukan` bigint(20) NOT NULL,
  `penerbitanSurat_LT` bigint(20) NOT NULL,
  `penerbitanSurat_TLT` bigint(20) NOT NULL,
  `jumlahPasien` bigint(20) NOT NULL,
  `laporanKematian` mediumtext NOT NULL,
  `tolakMasuk` bigint(20) NOT NULL,
  `karantinaWisma` bigint(20) NOT NULL,
  `karantinaHotel` bigint(20) NOT NULL,
  `laporanKedatangan_jamaah` mediumtext NOT NULL,
  `laporanPengamatan_gejalaTandaCOVID` mediumtext NOT NULL,
  `laporanDisinfeksi_areaKedatangan` mediumtext NOT NULL,
  `perwiraJaga` mediumtext NOT NULL,
  `anggota` mediumtext NOT NULL,
  `timShift_pagiTenagaBantuanCOVID` mediumtext NOT NULL,
  `timShift_malamTenagaBantuanCOVID` mediumtext NOT NULL,
  `laporanKeterangan_tambahan` mediumtext NOT NULL,
  `formatLaporan` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `laporant3internasional`
--

INSERT INTO `laporant3internasional` (`id_laporanT3Internasional`, `tgl_lapor`, `kedatanganFlight`, `paxKedatangan_flight`, `personilKedatangan`, `penerbanganKargo_pesawat`, `penerbanganKargo_personil`, `scanPL_merahPenumpang`, `vaksinTidak_lengkap`, `belumIntegrasi_PL`, `belumAda_PL`, `scanPL_hijauPenumpang`, `jumlahPresentase_penumpangWNI`, `jumlahPresentase_penumpangWNA`, `WNIVaksinasi_tidakLengkap`, `WNIDibawah18_vaksinasiTidakLengkap`, `WNIKomorbid_vaksinasiTidakLengkap`, `WNILainnya_vaksinasiTidakLengkap`, `WNAVaksinasi_tidakLengkap`, `WNADibawah18_vaksinasiTidakLengkap`, `WNAKomorbid_vaksinasiTidakLengkap`, `WNALainnya_vaksinasiTidakLengkap`, `WNIVaksinasi_lengkap`, `WNAVaksinasi_lengkap`, `WNISwab_PCRKedatangan`, `WNASwab_PCRKedatangan`, `ikterik`, `rujukan`, `penerbitanSurat_LT`, `penerbitanSurat_TLT`, `jumlahPasien`, `laporanKematian`, `tolakMasuk`, `karantinaWisma`, `karantinaHotel`, `laporanKedatangan_jamaah`, `laporanPengamatan_gejalaTandaCOVID`, `laporanDisinfeksi_areaKedatangan`, `perwiraJaga`, `anggota`, `timShift_pagiTenagaBantuanCOVID`, `timShift_malamTenagaBantuanCOVID`, `laporanKeterangan_tambahan`, `formatLaporan`) VALUES
(1, '2022-09-02', 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, '11', '12', 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, 26, 27, 28, 29, '30', 31, 32, 33, '34', '35', '36', 'El', 'Vito', 'Elma', 'Nilsan', '', 'CamScanner 07-16-2022 20.05_2.jpg'),
(2, '2022-09-03', 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, '11', '12', 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, 26, 27, 28, 29, '30', 31, 32, 33, '34', '35', '36', '37', '38', '39', '40', '', 'elma.png');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tentang_kami`
--

CREATE TABLE `tentang_kami` (
  `id_tentang_kami` int(11) NOT NULL,
  `isi` mediumtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tentang_kami`
--

INSERT INTO `tentang_kami` (`id_tentang_kami`, `isi`) VALUES
(1, 'Sesuai dengan Peraturan Mentri Kesehatan Republik Indonesia No. 33 Tahun 2021 tentang Organisasi dan Tata Kerja Kantor Kesehatan Pelabuhan, maka Kantor Kesehatan Pelabuhan (KKP) Kelas I Soekarno Hatta adalah Unit Pelaksana Teknis (UPT) Kementrian Kesehatan yang berada dibawah dan bertanggung jawab kepada Direktur Jendral Pencegahan dan Pengendalian Penyakit (P2P).\r\n\r\nKKP Kelas I Soekarno Hatta mempunyai tugas melaksanakan upaya cegah tangkal keluar atau masuknya penyakit dan / atau faktor risiko kesehatan di wilayah kerja Bandar Udara Soekarno Hattta.\r\n\r\nDalam melaksanakan tugas tersebut KKK Soekarno Hatta melaksanakan fungsi :\r\na. Penyusunan rencana, kegiatan, dan anggaran;\r\nb. Pelaksanaan pengawasan terhadap penyakit dan faktor risiko kesehatan pada alat angkut, orang, barang, dan / atau lingkungan;\r\nc. Pelaksanaan pencegahan terhadap penyakit dan faktor risiko kesehatan pada alat angkut, orang, barang, dan / atau lingkungan;\r\nd. Pelaksanaan respon terhadap penyakit dan faktor risiko kesehatan pada alat angkut, orang, barang, dan / atau lingkungan;\r\ne. Pelaksanaan pelayanan kesehatan pada kegawatdaruratan dan situasi khusus;\r\nf. Pelaksanaan penindakan pelanggaran di bidang kekarantinaan kesehatan;\r\ng. Pengelolaan data dan informasi di  bidang kekarantinaan kesehatan;\r\nh. Pelaksanaan jejaring, koordinasi, dan kerja sama di bidang kekarantinaan kesehatan;\r\ni. Pelaksanaan bimbingan teknis bidang kekarantinaan kesehatan;\r\nj. Pelaksanaan pemantauan, evaluasi, dan pelaporan di bidang kekarantinaan kesehatan; dan\r\nk. Pelaksanaan urusan administrasi KKP.');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indeks untuk tabel `admin_igdcc`
--
ALTER TABLE `admin_igdcc`
  ADD PRIMARY KEY (`id_admin_igdcc`);

--
-- Indeks untuk tabel `admin_t1a`
--
ALTER TABLE `admin_t1a`
  ADD PRIMARY KEY (`id_admin_t1a`);

--
-- Indeks untuk tabel `admin_t1shapirevip`
--
ALTER TABLE `admin_t1shapirevip`
  ADD PRIMARY KEY (`id_admin_t1shapirevip`);

--
-- Indeks untuk tabel `admin_t2dedomestik`
--
ALTER TABLE `admin_t2dedomestik`
  ADD PRIMARY KEY (`id_admin_t2dedomestik`);

--
-- Indeks untuk tabel `admin_t3domestik`
--
ALTER TABLE `admin_t3domestik`
  ADD PRIMARY KEY (`id_admin_t3domestik`);

--
-- Indeks untuk tabel `admin_t3internasional`
--
ALTER TABLE `admin_t3internasional`
  ADD PRIMARY KEY (`id_admin_t3internasional`);

--
-- Indeks untuk tabel `laporanigdcc`
--
ALTER TABLE `laporanigdcc`
  ADD PRIMARY KEY (`id_laporanIgdCc`);

--
-- Indeks untuk tabel `laporant1a`
--
ALTER TABLE `laporant1a`
  ADD PRIMARY KEY (`id_laporanT1A`);

--
-- Indeks untuk tabel `laporant1shapirevip`
--
ALTER TABLE `laporant1shapirevip`
  ADD PRIMARY KEY (`id_laporanT1ShapireVIP`);

--
-- Indeks untuk tabel `laporant2dedomestik`
--
ALTER TABLE `laporant2dedomestik`
  ADD PRIMARY KEY (`id_laporanT2DEDomestik`);

--
-- Indeks untuk tabel `laporant3domestik`
--
ALTER TABLE `laporant3domestik`
  ADD PRIMARY KEY (`id_laporanT3Domestik`);

--
-- Indeks untuk tabel `laporant3internasional`
--
ALTER TABLE `laporant3internasional`
  ADD PRIMARY KEY (`id_laporanT3Internasional`);

--
-- Indeks untuk tabel `tentang_kami`
--
ALTER TABLE `tentang_kami`
  ADD PRIMARY KEY (`id_tentang_kami`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `admin_igdcc`
--
ALTER TABLE `admin_igdcc`
  MODIFY `id_admin_igdcc` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `laporanigdcc`
--
ALTER TABLE `laporanigdcc`
  MODIFY `id_laporanIgdCc` bigint(20) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
