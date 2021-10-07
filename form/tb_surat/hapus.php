<?php
include('../../config/koneksi.php');
$id_surat =$_GET['id_surat'];
$hapus="DELETE FROM tb_surat_keterangan WHERE id_surat='$id_surat'";
mysql_query($hapus);
echo"
<script>
alert('Berhasil Dihapus');
window.location='view.php';
</script>";
?>