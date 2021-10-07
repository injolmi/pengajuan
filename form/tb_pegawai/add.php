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

$simpan = mysqli_query($koneksi,"insert into tb_pegawai values('$nip','$nama_pegawai','$id_jabatan','$no_telp_pegawai','$username','$password','$level','$foto_pegawai','$ttd_pegawai')");

if($simpan){

echo "<script>alert('Data Berhasil Disimpan');
window.location='view.php'</script>";
}else{

echo "<script>alert('Data Gagal Disimpan');
window.location='view.php'</script>";
        }
?>