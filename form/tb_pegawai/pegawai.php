<?php
include "../../AdminLTE/sidebar.php";
include "../../AdminLTE/header.php";
include '../../config/koneksi.php';
?>

<!DOCTYPE html>
<html>
<head>
  <title>Tambah Data | Pegawai</title>
</head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
  <link rel="stylesheet" href="../../AdminLTE/https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../../AdminLTE/plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="../../AdminLTE/https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="../../AdminLTE/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="../../AdminLTE/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="../../AdminLTE/plugins/jqvmap/jqvmap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../../AdminLTE/dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="../../AdminLTE/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="../../AdminLTE/plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="../../AdminLTE/plugins/summernote/summernote-bs4.min.css">
<body>
<div class="w-50 mx-auto border p-3 mt-5">
  <h4 class="mb"><i class="fa fa-angle-right"></i> Input Data Pegawai</h4>
    <form action="add.php" method="POST" enctype="multipart/form-data">
      <label>NIP</label>
      <input type="text" name="nip"  class="form-control" required>

      <label>Nama Pegawai</label>
      <input type="text" name="nama_pegawai"  class="form-control" required>

      <label>Jabatan</label>
      <select name="id_jabatan" id="id_jabatan" class="form-control" required="required">
                        <option value="">--Jabatan--</option>
                        <?php 
                        $sql_nama = mysqli_query($conn, "SELECT * FROM tb_jabatan") or die (mysqli_error($conn));
                        while ($data_nama = mysqli_fetch_array($sql_nama)) {
                        echo '<option value ="'.$data_nama['id_jabatan'].'">'.$data_nama['jabatan'].'</option>';
                        }
                        ?>
                      </select>

      <label>No Telepon</label>
      <input type="text" name="no_telp_pegawai"  class="form-control" required>

      <label>Username</label>
      <input type="text" name="username"  class="form-control" required>

      <label>Password</label>
      <input type="text" name="password" class="form-control" required>

      <label>Level</label>
      <select name="level" class="form-control" required="required">
      <option >--Level--</option>
      <option >1</option>
      <option >2</option>
      </select>

      <label>Foto Pegawai</label>
      <input type="file" name="foto_pegawai"  class="form-control" required>

      <label>Tanda Tangan Pegawai</label>
      <input type="file" name="ttd_pegawai" class="form-control" required>

    <div class="form-group">
        <label class="col-sm-2 col-sm-2 control-label"></label>
      <div class="col-sm-10">
        
        <input class="btn btn-sm btn-success" name="submit" type="submit" value="Simpan">
        <a href="view.php" class="btn btn-sm btn-danger">Batal </a>
      </div>
    </div>
    </form>
  </div>
    <!-- jQuery -->
<script src="../../AdminLTE/plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="../../AdminLTE/plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="../../AdminLTE/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="../../AdminLTE/plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="../../AdminLTE/plugins/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<script src="../../AdminLTE/plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="../../AdminLTE/plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<script src="../../AdminLTE/plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="../../AdminLTE/plugins/moment/moment.min.js"></script>
<script src="../../AdminLTE/plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="../../AdminLTE/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="../../AdminLTE/plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="../../AdminLTE/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="../../AdminLTE/dist/js/adminlte.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../../AdminLTE/dist/js/demo.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="../../AdminLTE/dist/js/pages/dashboard.js"></script>
</body>
</html>