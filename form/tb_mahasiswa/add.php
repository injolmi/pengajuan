<?php
include('../../config/koneksi.php');

$npm   =$_POST['npm'];
$nama_mahasiswa   =$_POST['nama_mahasiswa'];
$id_prodi   =$_POST['id_prodi'];
$kelas   =$_POST['kelas'];
$semester   =$_POST['semester'];
$no_telepon   =$_POST['no_telepon'];

$simpan = mysqli_query($koneksi,"insert into tb_mahasiswa values('$npm','$nama_mahasiswa','$id_prodi','$kelas','$semester','$no_telepon')");

if($simpan){

echo "<script>alert('Data Berhasil Disimpan');
window.location='view.php'</script>";
}else{

echo "<script>alert('Data Gagal Disimpan');
window.location='view.php'</script>";
        }
?>