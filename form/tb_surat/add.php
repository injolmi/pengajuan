 <?php
include('../../config/koneksi.php');
include('../../config/koneksi2.php');

$id_surat   =$_POST['id_surat'];
$id_verifikasi   =$_POST['id_verifikasi'];
$nip   =$_POST['nip'];
$no_sk   =$_POST['no_sk'];
$tgl_surat   =$_POST['tgl_surat'];
$tahun_akademik   =$_POST['tahun_akademik'];

$simpan =mysql_query("INSERT INTO tb_surat_keterangan VALUES('$id_surat','$id_verifikasi','$nip','$no_sk','$tgl_surat','$tahun_akademik')") or die(mysql_error());

if($simpan){

echo "<script>alert('Data Berhasil Disimpan');
window.location='view.php'</script>";
}else{

echo "<script>alert('Data Gagal Disimpan');
window.location='view.php'</script>";
        }
?>