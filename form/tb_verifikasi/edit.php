<?php
include('../../config/koneksi.php');
include('../../config/koneksi2.php');

$id_verifikasi   =$_POST['id_verifikasi'];
$id_pengajuan   =$_POST['id_pengajuan'];
$nip   =$_POST['nip'];
$tgl_keluar   =$_POST['tgl_keluar'];


$update	=mysql_query("UPDATE tb_verifikasi SET id_pengajuan='$id_pengajuan', nip='$nip', tgl_keluar='$tgl_keluar' WHERE id_verifikasi='$id_verifikasi'")or die(mysql_error());

if($update){

echo "<script>alert('Yess Data Berhasil Diubah');
window.location='view.php'</script>";
}else{

echo "<script>alert('Aduhh Data Gagal Diubah');
window.location='view.php'</script>";
		}
?>