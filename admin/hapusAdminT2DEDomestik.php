<h2>Hapus admin t2 d-e domestik</h2>

<?php include '../koneksi.php'; ?>
<?php
$ambil = $koneksi->query("SELECT * FROM admin_t2dedomestik WHERE id_admin_t2dedomestik='$_GET[id]'");
$pecah = $ambil->fetch_assoc();

$koneksi->query("DELETE FROM admin_t2dedomestik WHERE id_admin_t2dedomestik='$_GET[id]'");
echo "<script>alert('Data Telah Dihapus');</script>";
echo "<script>location='adminT2DEDomestik.php';</script>";
?>