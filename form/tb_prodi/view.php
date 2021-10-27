<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>CRUD TABEL PRODI</title>
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
session_start();
$query = "SELECT * FROM tb_prodi order by id_prodi desc limit 1";
$result= mysqli_query($koneksi,$query);
$row   = mysqli_fetch_array($result);
$lastprodi = $row['id_prodi'];
if ($lastprodi == " ") {
  
  $noprodi = "P-001";
}
else {
  $noprodi=substr($lastprodi, 4);
  $noprodi=intval($noprodi);
  $noprodi="P-00".($noprodi + 1);
}
?>




    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
     <div class="card">
        <div class="card-header">
        	<h1>Data Prodi</h1>
          <h3 class="card-title">Berikut merupakan data program studi</h3>
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
                    <center>ID Prodi</center>
                </th>

                <th>
                    <center>Prodi</center>
                </th>
               
                <th>
                    <center>Aksi</center>
                </th>
            </tr>
        </thead>

  
          <?php
              include "../../config/koneksi.php";
              $i=1;
              $rows = mysqli_query($koneksi, " select
                                                             *
                                                          from tb_prodi
                                                          ");
              while ($data = mysqli_fetch_array($rows)) {
          ?>

<tbody>
            <tr>
                <td>
                    <center><?= $i++?></center>
                </td>
                   <td>
                    <center><?php echo $data["id_prodi"] ?></center>
                </td>
                <td>
                    <center><?php echo $data["prodi"] ?></center>
                </td>
                
        <td>
          <div class="w3-dropdown-hover">

            <div class="w3-dropdown-content w3-bar-block w3-card-4">
                
<!-- modal edit -->
<div class="modal fade" id="modal-edit<?php echo $data['id_prodi']; ?>">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Edit Data Prodi</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="POST" action="edit.php">
          <div class="form-group">
            <label>ID Prodi</label>
            <input name="id_prodi" type="text" class="form-control" id="id_prodi" value="<?php echo $data['id_prodi']; ?>" readonly />
          </div>

          <div class="form-group">
            <label>Prodi</label>
            <input name="prodi" type="text" class="form-control" id="prodi" value="<?php echo $data['prodi']; ?>" required />
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
                      <a data-toggle="modal" data-target="#modal-edit<?php echo $data["id_prodi"]; ?>" class="btn btn-outline-primary" > Edit</a>

                      <a href="hapus.php?id_prodi=<?php echo $data["id_prodi"]; ?>" class="btn btn-outline-danger" > Hapus</a>
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
            <h4 class="modal-title">Tambah Data prodi</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form method="post" action="add.php">
              <!-- <div class="form-row"> -->


              <div class="form-group">
                <label>ID Prodi</label>
                <input name="id_prodi" type="text" class="form-control" id="id_prodi" value="<?php echo $noprodi ?>" required />
              </div>

              <div class="form-group">
                <label>Prodi</label>
                <input  name="prodi" type="text" class="form-control" id="prodi" required />
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