<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap Navigation</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
  <body>
    <h1></h1>
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
      <div class="container-fluid">
        <a class="navbar-brand" href="#">Navbar</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
              <a class="nav-link" href="index.php?page=info&id=1">Info</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="index.php?page=edit&id=1">Edit</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="index.php?page=delete&id=1">Delete</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>

    <div class="container">
      <?php
        if(isset($_GET['page'])){
          $page = $_GET['page'];

          switch ($page) {
            case 'info':
              include "info.php";  // Menampilkan file info.php
              break;
            case 'edit':
              include "edit.php";  // Menampilkan file edit.php
              break;
            case 'delete':
              include "delete.php";  // Menampilkan file delete.php
              break;
            default:
              echo "<center><h3>Maaf. Halaman tidak ditemukan!</h3></center>";
              break;
          }
        } else {
          echo "<center><h3>Selamat datang! Pilih aksi Info, Edit, atau Delete.</h3></center>";
        }
      ?>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>
