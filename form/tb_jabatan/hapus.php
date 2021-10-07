<?php
include('../../config/koneksi.php');
$id_jabatan =$_GET['id_jabatan'];
mysqli_query($koneksi,"delete from tb_jabatan where id_jabatan='$id_jabatan'");

echo"
<script>
alert('Berhasil Dihapus');
window.location='view.php';
</script>";
?>