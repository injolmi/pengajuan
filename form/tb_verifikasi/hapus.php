<?php
include('../../config/koneksi.php');
$id_verifikasi =$_GET['id_verifikasi'];
$hapus="DELETE FROM tb_verifikasi WHERE id_verifikasi='$id_verifikasi'";
mysql_query($hapus);
echo"
<script>
alert('Berhasil Dihapus');
window.location='view.php';
</script>";
?>