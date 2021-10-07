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

$simpan = mysqli_query($koneksi,"insert into tb_pengajuan VALUES('$id_pengajuan','$nip','$npm','$perihal','$alasan', '$verifikasi', '$no_sk', '$tgl_surat', '$tahun_akademik','$berita_acara')");

if($simpan){

echo "<script>alert('Data Berhasil Disimpan');
window.location='view.php'</script>";
}else{

echo "<script>alert('Data Gagal Disimpan');
window.location='view.php'</script>";
        }
?>