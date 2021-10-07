<?php
include('../../config/koneksi.php');

$id_jabatan	=$_POST['id_jabatan'];
$jabatan	=$_POST['jabatan'];


$update	= mysqli_query ($koneksi, "update tb_jabatan set jabatan='$jabatan' where id_jabatan='$id_jabatan'");

if($update){

echo "<script>alert('Yess Data Berhasil Diubah');
window.location='view.php'</script>";
}else{

echo "<script>alert('Aduhh Data Gagal Diubah');
window.location='view.php'</script>";
		}
?>