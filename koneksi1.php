<?php
$host = 'localhost';
$user = 'root';
$pass = '';
$db   = 'latihan_belajar';

  $conn = mysqli_connect($host, $user, $pass, $db);
  if($conn){
    //echo "Koneksi berhasil";
  }

  mysqli_select_db($conn, $db);
  

  $koneksi = mysqli_connect("localhost", "root", "", "latihan_belajar") or die ('database tidak terhubung');
?>
