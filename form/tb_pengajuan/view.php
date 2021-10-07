<?php 
include "../../AdminLTE/sidebar.php";
include "../../AdminLTE/header.php";
 ?>
<!DOCTYPE html>
<html>
<head>
	<title>Data Pengajuan</title>
</head>
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

	<div class="wrap">
		<div class="container">
				<h2 align="center">Data Pengajuan</h2>

	<table id="example" class="table table-striped table-bordered" style="width:100%">
     
		<tr style="background-color: #A9A9A9">
			<center><a href="pengajuan.php" class="btn btn-success">Tambah Data</a></center>
			<br>
			<td align="center">No</td>
			<td align="center">Id Pengajuan</td>
			<td align="center">Nama Pegawai</td>
			<td align="center">Nama Mahasiswa</td>
			<td align="center">Perihal</td>
			<td align="center">Alasan</td>
			<td align="center">Verifikasi</td>
			<td align="center">No SK</td>
			<td align="center">Tanggal Surat</td>
			<td align="center">Tahun Akademik</td>
			<td align="center">Berita Acara</td>
			<td align="center">Update</td>
		</tr>
		<?php
		include"../../config/koneksi.php";
		$no=1;
		$tampil = mysqli_query($koneksi,"select a.id_pengajuan, b.nama_pegawai, c.nama_mahasiswa, a.perihal,a.alasan, a.verifikasi, a.no_sk, a.tgl_surat, a.tahun_akademik, a.berita_acara from tb_pengajuan as a, tb_pegawai as b, tb_mahasiswa as c where a.nip=b.nip and a.npm=c.npm");
		while($data=mysqli_fetch_array($tampil)){
		?>
		<tr style="color: black;">
			<td><?php echo $no++;?></td>
			<td><?php echo $data['id_pengajuan'];?></td>
			<td><?php echo $data['nama_pegawai'];?></td>
			<td><?php echo $data['nama_mahasiswa'];?></td>
			<td><?php echo $data['perihal'];?></td>
			<td><?php echo $data['alasan'];?></td>
			<td><?php echo $data['verifikasi'];?></td>
			<td><?php echo $data['no_sk'];?></td>
			<td><?php echo $data['tgl_surat'];?></td>
			<td><?php echo $data['tahun_akademik'];?></td>
			<td><img src="../berita_acara/<?php echo $data['berita_acara'];?>"width="100px" height="100px"></td>
			<td>
				<a href="formedit.php?id_pengajuan=<?php echo $data['id_pengajuan'] ?>">Ubah</a> |
				<a href="hapus.php?id_pengajuan=<?php echo $data['id_pengajuan'] ?>">Hapus</a>
			</td>
		</tr>
		<?php
		}
		?>		
		</table>
			</div>
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
<!-- jQuery -->
<script src="../../plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- DataTables  & Plugins -->
<script src="../../plugins/datatables/jquery.dataTables.min.js"></script>
<script src="../../plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="../../plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="../../plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="../../plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="../../plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="../../plugins/jszip/jszip.min.js"></script>
<script src="../../plugins/pdfmake/pdfmake.min.js"></script>
<script src="../../plugins/pdfmake/vfs_fonts.js"></script>
<script src="../../plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="../../plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="../../plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
<!-- AdminLTE App -->
<script src="../../dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../../dist/js/demo.js"></script>
<!-- Page specific script -->
<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>
</html>