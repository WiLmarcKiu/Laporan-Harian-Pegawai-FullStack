<h2>Hapus admin igd cc</h2>

<?php include '../koneksi.php'; ?>
<?php
$ambil = $koneksi->query("SELECT * FROM admin_igdcc WHERE id_admin_igdcc='$_GET[id]'");
$pecah = $ambil->fetch_assoc();

$koneksi->query("DELETE FROM admin_igdcc WHERE id_admin_igdcc='$_GET[id]'");
echo "<script>alert('Data Telah Dihapus');</script>";
echo "<script>location='adminIgdCc.php';</script>";
?>