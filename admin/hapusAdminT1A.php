<h2>Hapus admin t1a</h2>

<?php include '../koneksi.php'; ?>
<?php
$ambil = $koneksi->query("SELECT * FROM admin_t1a WHERE id_admin_t1a='$_GET[id]'");
$pecah = $ambil->fetch_assoc();

$koneksi->query("DELETE FROM admin_t1a WHERE id_admin_t1a='$_GET[id]'");
echo "<script>alert('Data Telah Dihapus');</script>";
echo "<script>location='adminT1A.php';</script>";
?>