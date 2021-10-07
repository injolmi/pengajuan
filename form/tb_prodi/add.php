 <?php
include('../../config/koneksi.php');

$id_prodi   =$_POST['id_prodi'];
$prodi   =$_POST['prodi'];


$simpan = mysqli_query($koneksi,"insert into tb_prodi values('$id_prodi','$prodi')");

if($simpan){

echo "<script>alert('Data Berhasil Disimpan');
window.location='view.php'</script>";
}else{

echo "<script>alert('Data Gagal Disimpan');
window.location='view.php'</script>";
        }
?>