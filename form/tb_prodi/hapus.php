<?php
include('../../config/koneksi.php');
$id_prodi =$_GET['id_prodi'];
mysqli_query($koneksi,"delete from tb_prodi where id_prodi='$id_prodi'");

echo"
<script>
alert('Berhasil Dihapus');
window.location='view.php';
</script>";
?>