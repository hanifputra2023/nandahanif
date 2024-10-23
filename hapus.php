<?php
include 'koneksi.php';
$query = "SELECT * FROM transaksi;";
$sql = mysqli_query($conn, $query );
$no = 0;

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap-->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <script src="js/bootstrap.bundle.min.js"></script>
    <!-- Font Awesome-->
    <link rel="stylesheet" href="fontawesome/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="datatables/datatables.css">
   <script type="text/javascript" src="datatables/datatables.js"></script>
    <title>belajar_crud</title>
</head>
<script type="text/javascript">
  $(document).ready(function() {
    $('#dt').DataTable();
  });
</script>
<body>
    <nav class="navbar navbar-light bg-light mb-4">
        <div class="container-fluid">
          <a class="navbar-brand" href="#">
          DATA SISWA SMKN 2 MAGELANG
          </a>
        </div>
      </nav>

      <!-- Judul-->
      <div class="container">
        <h1 class="mt-4">Data Siswa</h1>
      <figure>
        <blockquote class="blockquote">
          <p>Berisi data yang telah disimpan di database.</p>
        </blockquote>
        <figcaption class="blockquote-footer">
         CRUD<cite title="Source Title">Create Read Update Delete</cite>
        </figcaption>
      </figure>
      <a href="index.php" type="button" class="btn btn-primary mb-3"><i class="fa fa-home"></i> Home</a>
      <a href="kelola.php" type="button" class="btn btn-primary mb-3"><i class="fa fa-plus"></i> Tambah Data</a>
      <a href="edit.php" type="button" class="btn btn-success mb-3"><i class="fa fa-pencil"></i> Edit Data</a>
      <a href="hapus.php" type="button" class="btn btn-danger mb-3"><i class="fa fa-trash"></i> Hapus Data</a>
      <div class="table-responsive">
        <table id="dt" class="table align-middle table-bordered table-hover">
          <thead>
            <tr>
              <th><center>No.</center></th>
              <th>NISN</th>
              <th>Nama Siswa</th>
              <th>Jenis Kelamin</th>
              <th>Foto Siswa</th>
              <th>Alamat</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody>
            <?php
            while($result = mysqli_fetch_assoc($sql)){

            
            ?>
            <tr>
              <td><center>
                <?php
                echo ++$no;
                ?>.
              </center></td>
              <td>
              <?php
                echo $result['nisn'];
                ?>
              </td>
              <td>
              <?php
                echo $result['nama_siswa'];
                ?>
              </td>
              <td>
              <?php
                echo $result['jenis_kelamin'];
                ?>
              </td>
              <td>
                <img src="img/<?php
                echo $result['foto_siswa'];
                ?>" style="width: 100px;">
              </td>
              <td>
              <?php
                echo $result['alamat'];
                ?>
              </td>
              <td>
                
                <a href="proses.php?hapus= <?php
                echo $result['id_siswa'];
                ?>." type="button" class="btn btn-danger btn-sm"onclick="return confirm('Apakah anda yaki menghapus data tersebut??')" ><i class="fa fa-trash"><b> Hapus Data</b></i></button>
              </td>
            </tr>
           <?php
            }
           ?>
           
          </tbody>
        </table>
      </div>
      </div>
</body>
</html>