 <?php
include('../../config/koneksi.php');
include('../../config/koneksi2.php');

$id_verifikasi   =$_POST['id_verifikasi'];
$id_pengajuan   =$_POST['id_pengajuan'];
$nip   =$_POST['nip'];
$tgl_keluar   =$_POST['tgl_keluar'];

$simpan =mysql_query("INSERT INTO tb_verifikasi VALUES('$id_verifikasi','$id_pengajuan','$nip','$tgl_keluar')") or die(mysql_error());

if($simpan){

echo "<script>alert('Data Berhasil Disimpan');
window.location='view.php'</script>";
}else{

echo "<script>alert('Data Gagal Disimpan');
window.location='view.php'</script>";
        }
?>