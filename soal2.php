<div class="h1">SOAL 2</div>
<br>
<br>

<form class="row g-3" action="" method="post">
    <div class="row">
  <div class="col-md-6">
    <label for="inputEmail4" class="form-label">Nama</label>
    <input type="text" class="form-control" id="inputEmail4" name="nama" placeholder="Masukkan Nama">
  </div></div>
  <div class="row">
  <div class="col-md-6">
    <label for="inputPassword4" class="form-label">Nilai Harian</label>
    <input type="number" class="form-control" id="inputPassword4" name="harian">
  </div></div>
  <div class="row">
  <div class="col-md-6">
    <label for="inputPassword4" class="form-label">Nilai Ujian </label>
    <input type="number" class="form-control" id="inputPassword4" name="ujian">
 
  <div class="col-12">
    <button type="submit" class="btn btn-primary" name="hitung">Hitung</button>
  </div>
</form>
<?php
if(isset($_POST['hitung'])){
    $nama = $_POST['nama'];
    $harian = $_POST['harian'];
    $ujian = $_POST['ujian'];

    $nilai = ($harian * 0.6) + ($ujian * 0.4);

    $msg = "Siswa a/n $nama mendapatkan nilai Rapor $nilai";

?>
<br>
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                    <?= $msg ?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>

                <?php
                    }
                ?>