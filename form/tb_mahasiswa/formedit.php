<html>
<head>
	<title>Edit Data</title>
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
<?php
include"../../config/koneksi.php";
include "../../AdminLTE/sidebar.php";
include "../../AdminLTE/header.php";
$npm=$_GET['npm'];
$edit = mysqli_query($koneksi,"select * from tb_mahasiswa where npm='$npm'");
while($data = mysqli_fetch_array($edit)){
?>
<div class="w-50 mx-auto border p-3 mt-5">
	<h4 class="mb"><i class="fa fa-angle-right"></i> Edit Data Mahasiswa</h4>
		<form action="edit.php" method="POST">
			<label>NIM</label>
			<input type="text" name="npm" class="form-control" value="<?php echo $data['npm'];?>" readonly>

			<label>Nama Mahasiswa</label>
			<input type="text" name="nama_mahasiswa"  class="form-control" value="<?php echo $data['nama_mahasiswa'];?>" required>

			<label>Jurusan</label>
			<select name="id_prodi" id="id_prodi" class="form-control" value="<?php echo $data['id_prodi'];?>" required="required">
                        <option value="">--Jurusan--</option>
                        <?php 
                        $sql_nama = mysqli_query($koneksi, "SELECT * FROM tb_prodi") or die (mysqli_error($koneksi));
                        while ($data_nama = mysqli_fetch_array($sql_nama)) {
                        echo '<option value ="'.$data_nama['id_prodi'].'">'.$data_nama['prodi'].'</option>';
                        }
                        ?>
                      </select>

      <label>Kelas</label>
      <input type="text" name="kelas"  class="form-control" value="<?php echo $data['kelas'];?>" required>

      <label>Semester</label>
      <input type="text" name="semester"  class="form-control" value="<?php echo $data['semester'];?>" required>

			<label>No Telepon</label>
			<input type="number" name="no_telepon"  class="form-control" value="<?php echo $data['no_telepon'];?>" required>

		<div class="form-group">
        <label class="col-sm-2 col-sm-2 control-label"></label>
			<div class="col-sm-10">
				
				<input class="btn btn-sm btn-success" name="submit" type="submit" value="Simpan">
				<a href="view.php" class="btn btn-sm btn-danger">Batal </a>
			</div>
		</div>
		</form>
        <?php 
  }
  ?>
	</div>
</body>
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
</html>
