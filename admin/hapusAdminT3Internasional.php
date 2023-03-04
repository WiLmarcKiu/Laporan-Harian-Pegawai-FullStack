<h2>Hapus admin t3 internasional</h2>

<?php include '../koneksi.php'; ?>
<?php
$ambil = $koneksi->query("SELECT * FROM admin_t3internasional WHERE id_admin_t3internasional='$_GET[id]'");
$pecah = $ambil->fetch_assoc();

$koneksi->query("DELETE FROM admin_t3internasional WHERE id_admin_t3internasional='$_GET[id]'");
echo "<script>alert('Data Telah Dihapus');</script>";
echo "<script>location='adminT3Internasional.php';</script>";
?>