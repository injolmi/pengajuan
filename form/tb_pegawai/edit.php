<?php
include('../../config/koneksi.php');

$nip   =$_POST['nip'];
$nama_pegawai   =$_POST['nama_pegawai'];
$id_jabatan   =$_POST['id_jabatan'];
$no_telp_pegawai   =$_POST['no_telp_pegawai'];
$username   =$_POST['username'];
$password   =$_POST['password'];
$level   =$_POST['level'];

$foto_pegawai	=$_FILES["foto_pegawai"]["name"];
$tmp_name	=$_FILES["foto_pegawai"]["tmp_name"];
move_uploaded_file($tmp_name, "../foto_pegawai/".$foto_pegawai);

$ttd_pegawai	=$_FILES["ttd_pegawai"]["name"];
$tmp_name	=$_FILES["ttd_pegawai"]["tmp_name"];
move_uploaded_file($tmp_name, "../ttd_pegawai/".$ttd_pegawai);


$update	= mysqli_query ($koneksi, "update tb_pegawai set nama_pegawai='$nama_pegawai', id_jabatan='$id_jabatan', no_telp_pegawai='$no_telp_pegawai', username='$username', password='$password' , level='$level' , foto_pegawai='$foto_pegawai' , ttd_pegawai='$ttd_pegawai' where nip='$nip'");

if($update){

echo "<script>alert('Yess Data Berhasil Diubah');
window.location='view.php'</script>";
}else{

echo "<script>alert('Aduhh Data Gagal Diubah');
window.location='view.php'</script>";
		}
?>