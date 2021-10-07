<?php
include('../../config/koneksi.php');
$npm =$_GET['npm'];
mysqli_query($koneksi,"delete from tb_mahasiswa where npm='$npm'");
echo"
<script>
alert('Berhasil Dihapus');
window.location='view.php';
</script>";
?>