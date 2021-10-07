<?php
include('../../config/koneksi.php');
$id_pengajuan =$_GET['id_pengajuan'];
mysqli_query($koneksi,"delete from tb_pengajuan where id_pengajuan='$id_pengajuan'";
echo"
<script>
alert('Berhasil Dihapus');
window.location='view.php';
</script>";
?>