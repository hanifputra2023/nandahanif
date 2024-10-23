<div class="h1">SOAL 5</div>
<br><br>
<form class="row g-3" action="" method="post">
    <h2 class="mb-4">Perhitungan</h2>
    <div class="row">
        <div class="mb-3">
            <label for="inputEmail4" class="form-label">NAMA KARYAWAN</label>
            <input type="text" class="form-control" id="inputEmail4" name="nama" placeholder="nama pegawai" required>
        </div>
    </div>
    <br>
    <label>DEVISI</label>
    <div class="row">
        <div class="col">
            <div class="form-check">
                <input class="form-check-input" type="radio" name="bagasi" id="flexRadioDefault1" value="Web" required>
                <label class="form-check-label" for="flexRadioDefault1"> Web </label>
            </div>
        </div>
        <div class="col">
            <div class="form-check">
                <input class="form-check-input" type="radio" name="bagasi" id="flexRadioDefault3" value="Desktop" required>
                <label class="form-check-label" for="flexRadioDefault3"> Desktop </label>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="mb-3">
            <label for="inputState" class="form-label">JABATAN</label><br>
            <select id="jabatan" name="jabatan" class="form-select mb-3" required>
                <option value="">Pilih Jabatan</option>
                <option value="Magang">Magang</option>
                <option value="Junior Programer">Junior Programer</option>
                <option value="Senior Programer">Senior Programer</option>
            </select>

            <label for="inputEmail4" class="form-label">JAM KERJA (PER-MINGGU)</label>
            <input type="number" class="form-control" id="inputEmail4" name="jam" placeholder="jam kerja" required>
        </div>
    </div>
    <br>
    <div class="col-12">
        <button type="submit" class="btn btn-primary" name="hitung">Hitung</button>
    </div>
</form>

<?php
if (isset($_POST['hitung'])) {
    $nama = $_POST['nama'];
    $devisi = $_POST['bagasi'];
    $jabatan = $_POST['jabatan'];
    $jam = $_POST['jam'];

    if ($devisi == "Web") {
        if ($jabatan == "Magang") {
            $harga = 2500000;
        } elseif ($jabatan == "Junior Programer") {
            $harga = 4500000;
        } elseif ($jabatan == "Senior Programer") {
            $harga = 7000000;
        }
    } elseif ($devisi == "Desktop") {
        if ($jabatan == "Magang") {
            $harga = 2300000;
        } elseif ($jabatan == "Junior Programer") {
            $harga = 4000000;
        } elseif ($jabatan == "Senior Programer") {
            $harga = 6500000;
        }
    }

    $gaji = $harga * $jam;

    $msg = "
    Nama: $nama <br>
    Total Jam (minggu): $jam jam <br>
    Jabatan: $jabatan <br>
    Total Pembayaran: Rp $gaji";
?>
<div class="alert alert-warning alert-dismissible fade show" role="alert">
    <?= $msg ?>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>

<?php
}
?>
