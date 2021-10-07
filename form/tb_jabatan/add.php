 <?php
include('../../config/koneksi.php');

$id_jabatan   =$_POST['id_jabatan'];
$jabatan   =$_POST['jabatan'];


$simpan = mysqli_query($koneksi,"insert into tb_jabatan values('$id_jabatan','$jabatan')");

if($simpan){

echo "<script>alert('Data Berhasil Disimpan');
window.location='view.php'</script>";
}else{

echo "<script>alert('Data Gagal Disimpan');
window.location='view.php'</script>";
        }
?>