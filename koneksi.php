
<?php 
// Membuat koneksi ke database menggunakan mysqli
// $koneksi = new mysqli("localhost", "root", "", "latihan");
?>



<?php
$host = 'localhost';
$user = 'root';
$pass = '';
$db   = 'latihan';

  $conn = mysqli_connect($host, $user, $pass, $db);
  if($conn){
    //echo "Koneksi berhasil";
  }

  mysqli_select_db($conn, $db);
  

  $koneksi = mysqli_connect("localhost", "root", "", "latihan") or die ('database tidak terhubung');
?>