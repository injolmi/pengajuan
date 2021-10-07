<?php
include('../../config/koneksi.php');

$id_prodi	=$_POST['id_prodi'];
$prodi	=$_POST['prodi'];


$update	= mysqli_query ($koneksi, "update tb_prodi set prodi='$prodi' where id_prodi='$id_prodi'");

if($update){

echo "<script>alert('Yess Data Berhasil Diubah');
window.location='view.php'</script>";
}else{

echo "<script>alert('Aduhh Data Gagal Diubah');
window.location='view.php'</script>";
		}
?>