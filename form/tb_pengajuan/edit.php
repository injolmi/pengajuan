<?php
include('../../config/koneksi.php');

$id_pengajuan   =$_POST['id_pengajuan'];
$nip   =$_POST['nip'];
$npm   =$_POST['npm'];
$perihal   =$_POST['perihal'];
$alasan   =$_POST['alasan'];
$verifikasi   =$_POST['verifikasi'];
$no_sk   =$_POST['no_sk'];
$tgl_surat   =$_POST['tgl_surat'];
$tahun_akademik   =$_POST['tahun_akademik'];

$berita_acara	=$_FILES["berita_acara"]["name"];
$tmp_name	=$_FILES["berita_acara"]["tmp_name"];
move_uploaded_file($tmp_name, "../berita_acara/".$berita_acara);


$update	= mysqli_query ($koneksi, "update tb_pengajuan SET nip='$nip', npm='$npm', perihal='$perihal', alasan='$alasan', verifikasi='$verifikasi', no_sk='$no_sk', tgl_surat='$tgl_surat', tahun_akademik='$tahun_akademik', berita_acara='$berita_acara' WHERE id_pengajuan='$id_pengajuan'");

if($update){

echo "<script>alert('Yess Data Berhasil Diubah');
window.location='view.php'</script>";
}else{

echo "<script>alert('Aduhh Data Gagal Diubah');
window.location='view.php'</script>";
		}
?>