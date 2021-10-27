<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>CRUD TABEL JABATAN</title>
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../../AdminLTE/plugins/fontawesome-free/css/all.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="../../AdminLTE/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="../../AdminLTE/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="../../AdminLTE/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../../AdminLTE/dist/css/adminlte.min.css">
</head>

<body class="hold-transition sidebar-mini">
  <div class="wrapper">
   <?php
include "../../AdminLTE/sidebar.php";
include "../../AdminLTE/header.php";
include "../../config/koneksi.php";
?>




    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">


     <div class="card">
        <div class="card-header">
        	<h1>Data Mahasiswa</h1>
          <h3 class="card-title">Berikut merupakan data mahasiswa</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
          <a data-toggle="modal" data-target="#modal-tambah" class="btn btn-success pull-right"><i class="fas fa-plus"></i><span>Tambah Data</span></a>
          <br></br>
          <table id="example1" class="table table-bordered table-striped">

        <thead>
            <tr>
                <th>
                    <center>No</center>
                </th>

                <th>
                    <center>NPM</center>
                </th>

                <th>
                    <center>Nama Mahasiswa</center>
                </th>

                <th>
                    <center>Program Studi</center>
                </th>

                <th>
                    <center>Kelas</center>
                </th>

                <th>
                    <center>Semester</center>
                </th>

                <th>
                    <center>No Telepon</center>
                </th>
               
                <th>
                    <center>Aksi</center>
                </th>
            </tr>
        </thead>

  
          <?php
              include "../../config/koneksi.php";
              $i=1;
              $tampil = mysqli_query($koneksi,"SELECT a.npm, a.nama_mahasiswa, b.prodi, a.kelas,a.semester, a.no_telepon FROM tb_mahasiswa as a, tb_prodi as b WHERE a.id_prodi=b.id_prodi");
		while($data = mysqli_fetch_array($tampil)){
          ?>

<tbody>
            <tr>
                <td>
                    <center><?= $i++?></center>
                </td>
                   <td>
                    <center><?php echo $data["npm"] ?></center>
                </td>
                <td>
                    <center><?php echo $data["nama_mahasiswa"] ?></center>
                </td>
                <td>
                    <center><?php echo $data["prodi"] ?></center>
                </td>
                <td>
                    <center><?php echo $data["kelas"] ?></center>
                </td>
                <td>
                    <center><?php echo $data["semester"] ?></center>
                </td>
                <td>
                    <center><?php echo $data["no_telepon"] ?></center>
                </td>
                
        <td>
          <div class="w3-dropdown-hover">

            <div class="w3-dropdown-content w3-bar-block w3-card-4">
                
<!-- modal edit -->
<div class="modal fade" id="modal-edit<?php echo $data['npm']; ?>">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Edit Data Jabatan</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="POST" action="edit.php">
          <div class="form-group">
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
          </div>

      </div>

      <div class="modal-footer justify-content-between">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="edit" id="edit" class="btn btn-primary" name="edit">Save changes</button>
      </div>
      </form>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<!-- /.modal -->     


              <center> 
                      <a data-toggle="modal" data-target="#modal-edit<?php echo $data["npm"]; ?>" class="btn btn-outline-primary" > Edit</a>

                      <a href="hapus.php?npm=<?php echo $data["npm"]; ?>" class="btn btn-outline-danger" > Hapus</a>
              </center>
            </div>
          </div>
        </td>
      </tr>

<?php
}
?>
  </tbody>
      </table>
    </div>
    <!-- /.card-body -->
  </div>
  <!-- /.card -->
</div>
<!-- /.content-wrapper -->          
                
<?php
include '../../AdminLTE/footer.php';
?>               

 <!-- modal tambah -->
    <div class="modal fade" id="modal-tambah">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title">Tambah Data Jabatan</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form method="post" action="add.php">
              <!-- <div class="form-row"> -->


              <div class="form-group">
                <label>NIM</label>
      			<input type="text" name="npm"  class="form-control" required>

      			<label>Nama Mahasiswa</label>
      			<input type="text" name="nama_mahasiswa"  class="form-control" required>

      			<label>Program Studi</label>
      			<select name="id_prodi" id="id_prodi" class="form-control" required="required">
                        <option value="">--Prodi--</option>
                        <?php 
                        $sql_nama = mysqli_query($koneksi, "SELECT * FROM tb_prodi") or die (mysqli_error($koneksi));
                        while ($data_nama = mysqli_fetch_array($sql_nama)) {
                        echo '<option value ="'.$data_nama['id_prodi'].'">'.$data_nama['prodi'].'</option>';
                        }
                        ?>
                      </select>

      <label>Kelas</label>
      <input type="text" name="kelas"  class="form-control" required>

      <label>Semester</label>
      <input type="number" name="semester"  class="form-control" required>

      <label>No Telepon</label>
      <input type="number" name="no_telepon"  class="form-control" required>
              </div>
              <!-- </div> -->

              <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="tambah" class="btn btn-primary" id="tambah" name="submit">Save changes</button>
              </div>

          </form>
        </div>
        <!-- /.modal-content -->
      </div>
      <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->
  </div>
</div>
<!-- End Modal Tambah -->




<!-- jQuery -->
  <script src="../../AdminLTE/plugins/jquery/jquery.min.js"></script>
  <!-- Bootstrap 4 -->
  <script src="../../AdminLTE/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- DataTables  & Plugins -->
  <script src="../../AdminLTE/plugins/datatables/jquery.dataTables.min.js"></script>
  <script src="../../AdminLTE/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
  <script src="../../AdminLTE/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
  <script src="../../AdminLTE/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
  <script src="../../AdminLTE/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
  <script src="../../AdminLTE/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
  <script src="../../AdminLTE/plugins/jszip/jszip.min.js"></script>
  <script src="../../AdminLTE/plugins/pdfmake/pdfmake.min.js"></script>
  <script src="../../AdminLTE/plugins/pdfmake/vfs_fonts.js"></script>
  <script src="../../AdminLTE/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
  <script src="../../AdminLTE/plugins/datatables-buttons/js/buttons.print.min.js"></script>
  <script src="../../AdminLTE/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
  <!-- AdminLTE App -->
  <script src="../../AdminLTE/dist/js/adminlte.min.js"></script>
  <!-- AdminLTE for demo purposes -->
  <script src="../../AdminLTE/dist/js/demo.js"></script>
  <!-- Page specific script -->
  <script>
    $(function() {
      $("#example1").DataTable({
        "responsive": true,
        "lengthChange": false,
        "autoWidth": false,
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
</body>

</html>







