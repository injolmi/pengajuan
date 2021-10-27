<?php 
session_start();

include 'config/koneksi.php';

$username = $_POST['username'];
$password = $_POST['password'];

$login = mysqli_query($koneksi, "SELECT * FROM tb_pegawai WHERE username = '$username' AND password= '$password'");
$cek = mysqli_num_rows($login);

if($cek>0){
    $data = mysqli_fetch_assoc($login);

    if ($data['level']=='1') {
        $_SESSION['username']=$username;
        $_SESSION['level']=="1";
        header("location:form/tb_jabatan/view.php");
    }
    else if ($data['level']=='2'){
        $_SESSION['username']=$username;
        $_SESSION['level']=="2";
        header("location:form/tb_pegawai/view.php");
    }

    else{
        header("location:index.php?pesan=gagal");
    }
}

else {
    header("location:index.php?pesan=gagal");
}
?>