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
   session_start();
include "../../AdminLTE/sidebar.php";
include "../../AdminLTE/header.php";
include "../../config/koneksi.php";
?>




    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">


     <div class="card">
        <div class="card-header">
        	<h1>Data Pegawai</h1>
          <h3 class="card-title">Berikut merupakan data Pegawai</h3>
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
                    <center>NIP</center>
                </th>

                <th>
                    <center>Nama Pegawai</center>
                </th>

                <th>
                    <center>Jabatan</center>
                </th>

                <th>
                    <center>Foto Pegawai</center>
                </th>

                <th>
                    <center>Tanda Tangan Pegawai</center>
                </th>
               
                <th>
                    <center>Aksi</center>
                </th>
            </tr>
        </thead>

  
          <?php
              include "../../config/koneksi.php";
              $i=1;
		$tampil = mysqli_query($koneksi,"SELECT a.nip, a.nama_pegawai, b.jabatan, a.no_telp_pegawai,a.username, a.password,a.level, a.foto_pegawai, a.ttd_pegawai FROM tb_pegawai as a, tb_jabatan as b WHERE a.id_jabatan=b.id_jabatan");
		while($data = mysqli_fetch_array($tampil)){
          ?>

<tbody>
            <tr>
                <td>
                    <center><?= $i++?></center>
                </td>
                   <td>
                    <center><?php echo $data["nip"] ?></center>
                </td>
                <td>
                    <center><?php echo $data["nama_pegawai"] ?></center>
                </td>
                <td>
                    <center><?php echo $data["jabatan"] ?></center>
                </td>
                <<td align="center"><img src="../foto_pegawai/<?php echo $data['foto_pegawai'];?>" width="100px" height="100px"></td>
				<td align="center"><img src="../ttd_pegawai/<?php echo $data['ttd_pegawai'];?>"  width="100px" height="100px"></td>
                
        <td>
          <div class="w3-dropdown-hover">

            <div class="w3-dropdown-content w3-bar-block w3-card-4">
                
<!-- modal edit -->
<div class="modal fade" id="modal-edit<?php echo $data['nip']; ?>">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Edit Data Jabatan</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="POST" action="edit.php" enctype="multipart/form-data">
          <div class="form-group">
             <label>Nip</label>
      <input type="text" name="nip" class="form-control" value="<?php echo $data['nip'];?>" readonly>

      <label>Nama Pegawai</label>
      <input type="text" name="nama_pegawai" class="form-control" value="<?php echo $data['nama_pegawai'];?>" >

          <label>Nama Mahasiswa</label>
          <select name="id_jabatan" id="id_jabatan" class="form-control" required="required">
                        <option value="">--Jabatan--</option>
                        <?php 
                        $sql_nama = mysqli_query($koneksi, "SELECT * FROM tb_jabatan") or die (mysqli_error($koneksi));
                        while ($data_nama = mysqli_fetch_array($sql_nama)) {
                        echo '<option value ="'.$data_nama['id_jabatan'].'">'.$data_nama['jabatan'].'</option>';
                        }
                        ?>
                      </select>

       <label>No Telepon</label>
      <input type="text" name="no_telp_pegawai"  class="form-control" value="<?php echo $data['no_telp_pegawai'];?>">

      <label>Username</label>
      <input type="text" name="username"  class="form-control" value="<?php echo $data['username'];?>">

      <label>Password</label>
      <input type="text" name="password" class="form-control" value="<?php echo $data['password'];?>">

      <label>Level</label>
      <select name="level" class="form-control" value="<?php echo $data['level'];?>">
      <option >--Level--</option>
      <option >1</option>
      <option >2</option>
      </select>

      <label>Foto Pegawai</label>
      <input type="file" name="foto_pegawai"  class="form-control" value="<?php echo $data['foto_pegawai'];?>">

      <label>Tanda Tangan Pegawai</label>
      <input type="file" name="ttd_pegawai" class="form-control" value="<?php echo $data['ttd_pegawai'];?>">
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
                      <a data-toggle="modal" data-target="#modal-edit<?php echo $data["nip"]; ?>" class="btn btn-outline-primary" > Edit</a>

                      <a href="hapus.php?nip=<?php echo $data["nip"]; ?>" class="btn btn-outline-danger" > Hapus</a>
                      <a href="detail.php?nip=<?php echo $data["nip"]; ?>" class="btn btn-outline-warning" > Detail</a>
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
            <button type="button" class="close" data-dismiss="modal" aria-label="Close" >
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form method="post" action="add.php" enctype="multipart/form-data">
              <!-- <div class="form-row"> -->


              <div class="form-group">
                <label>NIP</label>
      			<input type="text" name="nip"  class="form-control" required>

      			<label>Nama Pegawai</label>
      			<input type="text" name="nama_pegawai"  class="form-control" required>

      			<label>Level</label>
      			<select name="id_jabatan" id="id_jabatan" class="form-control" required="required">
                        <option value="">--Jabatan--</option>
                        <?php 
                        $sql_nama = mysqli_query($koneksi, "SELECT * FROM tb_jabatan") or die (mysqli_error($koneksi));
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









