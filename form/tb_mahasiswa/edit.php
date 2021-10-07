<?php
include('../../config/koneksi.php');

$npm   =$_POST['npm'];
$nama_mahasiswa   =$_POST['nama_mahasiswa'];
$id_prodi   =$_POST['id_prodi'];
$kelas   =$_POST['kelas'];
$semester   =$_POST['semester'];
$no_telepon   =$_POST['no_telepon'];

$update	= mysqli_query ($koneksi, "update tb_mahasiswa set nama_mahasiswa='$nama_mahasiswa', id_prodi='$id_prodi', kelas='$kelas', semester='$semester', no_telepon='$no_telepon' where npm='$npm'");

if($update){

echo "<script>alert('Yess Data Berhasil Diubah');
window.location='view.php'</script>";
}else{

echo "<script>alert('Aduhh Data Gagal Diubah');
window.location='view.php'</script>";
		}
?>