<?php
include('../../config/koneksi.php');

$id_surat   =$_POST['id_surat'];
$id_verifikasi   =$_POST['id_verifikasi'];
$nip   =$_POST['nip'];
$no_sk   =$_POST['no_sk'];
$tgl_surat   =$_POST['tgl_surat'];
$tahun_akademik   =$_POST['tahun_akademik'];


$update	=mysql_query("UPDATE tb_surat_keterangan SET id_verifikasi='$id_verifikasi', nip='$nip', no_sk='$no_sk', tgl_surat='$tgl_surat', tahun_akademik='$tahun_akademik' WHERE id_surat='$id_surat'")or die(mysql_error());

if($update){

echo "<script>alert('Yess Data Berhasil Diubah');
window.location='view.php'</script>";
}else{

echo "<script>alert('Aduhh Data Gagal Diubah');
window.location='view.php'</script>";
		}
?>