<div class="h1">SOAL 4</div>
<br>
<br>
<form class="row g-3" action="" method="post">
           <h1>Bayar Seragam</h1>
           <div class="mb-3">
                <label for="nama" class="form-label">NAMA</label>
                <input type="text" class="form-control" id="nama" name="nama" placeholder="nama siswa">
            </div>

           
            <div class="mb-3 row">
                <label class="col-sm-2 col-form-label">OSIS</label>
                <div class="col-sm-10">
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="osis" id="osis_s" value="S">
                        <label class="form-check-label" for="osis_s">S</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="osis" id="osis_m" value="M">
                        <label class="form-check-label" for="osis_m">M</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="osis" id="osis_l" value="L">
                        <label class="form-check-label" for="osis_l">L</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="osis" id="osis_xl" value="XL">
                        <label class="form-check-label" for="osis_xl">XL</label>
                    </div>
                </div>
            </div>

           
            <div class="mb-3 row">
                <label class="col-sm-2 col-form-label">PRAMUKA</label>
                <div class="col-sm-10">
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="pramuka" id="pramuka_s" value="S">
                        <label class="form-check-label" for="pramuka_s">S</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="pramuka" id="pramuka_m" value="M">
                        <label class="form-check-label" for="pramuka_m">M</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="pramuka" id="pramuka_l" value="L">
                        <label class="form-check-label" for="pramuka_l">L</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="pramuka" id="pramuka_xl" value="XL">
                        <label class="form-check-label" for="pramuka_xl">XL</label>
                    </div>
                </div>
            </div>

            
            <div class="mb-3 row">
                <label class="col-sm-2 col-form-label">OLAHRAGA</label>
                <div class="col-sm-10">
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="olahraga" id="olahraga_s" value="S">
                        <label class="form-check-label" for="olahraga_s">S</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="olahraga" id="olahraga_m" value="M">
                        <label class="form-check-label" for="olahraga_m">M</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="olahraga" id="olahraga_l" value="L">
                        <label class="form-check-label" for="olahraga_l">L</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="olahraga" id="olahraga_xl" value="XL">
                        <label class="form-check-label" for="olahraga_xl">XL</label>
                    </div>
                </div>
            </div>

            
            <div class="mb-3 row">
                <label class="col-sm-2 col-form-label">IDENTITAS</label>
                <div class="col-sm-10">
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="identitas" id="identitas_s" value="S">
                        <label class="form-check-label" for="identitas_s">S</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="identitas" id="identitas_m" value="M">
                        <label class="form-check-label" for="identitas_m">M</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="identitas" id="identitas_l" value="L">
                        <label class="form-check-label" for="identitas_l">L</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="identitas" id="identitas_xl" value="XL">
                        <label class="form-check-label" for="identitas_xl">XL</label>
                    </div>
                </div>
            </div>

        
            <div class="mb-3">
                <label for="bantuan" class="form-label">BANTUAN</label>
                <select class="form-select" id="bantuan" name="bantuan">
                    <option value="bos">BOS</option>
                    <option value="infak">Infak</option>
                    <option value="komite">Komite</option>
                </select>
            </div>

          
            <div class="col-12">
    <button type="submit" class="btn btn-primary" name="hitung">Hitung</button>
  </div>

          
        </form>
        <?php

if (isset($_POST['hitung'])) {
    // Mendapatkan data dari form
    $nama = $_POST['nama'];
    $osis = $_POST['osis'];
    $pramuka = $_POST['pramuka'];  
    $identitas = $_POST['identitas'];
    $olahraga = $_POST['olahraga'];
    $bantuan = $_POST['bantuan'];

    // Harga default
    $total_harga = 0;

    // Menghitung harga berdasarkan ukuran OSIS
    if ($osis == 'S') {
        $total_harga += 100000;
    } elseif ($osis == 'M') {
        $total_harga += 125000;
    } elseif ($osis == 'L') {
        $total_harga += 150000;
    } elseif ($osis == 'XL') {
        $total_harga += 175000;
    }

    // Menghitung harga berdasarkan ukuran Pramuka
    if ($pramuka == 'S') {
        $total_harga += 100000;
    } elseif ($pramuka == 'M') {
        $total_harga += 125000;
    } elseif ($pramuka == 'L') {
        $total_harga += 150000;
    } elseif ($pramuka == 'XL') {
        $total_harga += 175000;
    }

    // Menghitung harga berdasarkan ukuran Olahraga
    if ($olahraga == 'S') {
        $total_harga += 75000;
    } elseif ($olahraga == 'M') {
        $total_harga += 100000;
    } elseif ($olahraga == 'L') {
        $total_harga += 125000;
    } elseif ($olahraga == 'XL') {
        $total_harga += 150000;
    }

    // Menghitung harga berdasarkan ukuran Identitas
    if ($identitas == 'S') {
        $total_harga += 50000;
    } elseif ($identitas == 'M') {
        $total_harga += 75000;
    } elseif ($identitas == 'L') {
        $total_harga += 100000;
    } elseif ($identitas == 'XL') {
        $total_harga += 125000;
    }

    // Inisialisasi total untuk diskon
    $total = $total_harga;

    // Menghitung diskon berdasarkan bantuan
    if ($bantuan == 'bos') {
        // BOS: Gratis
        $total = 0;
    } elseif ($bantuan == 'infak') {
        // Infak: Diskon 50%
        $total *= 0.5;
    } elseif ($bantuan == 'komite') {
        // Komite: Diskon 25%
        $total *= 0.75;
    }

    // Membuat pesan hasil perhitungan
    $msg = "Nama Siswa: $nama<br>
            Total yang harus dibayarkan: Rp. $total";

?>
    <br>
    <div class="alert alert-warning alert-dismissible fade show" role="alert">
        <?= $msg ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>

<?php
}
?>

     
        