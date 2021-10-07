<?php
include('../../config/koneksi.php');
$nip =$_GET['nip'];
mysqli_query($koneksi,"delete from tb_pegawai where nip='$nip'");
echo"
<script>
alert('Berhasil Dihapus');
window.location='view.php';
</script>";
?>