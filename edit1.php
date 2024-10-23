<?php
include 'koneksi.php'; // Koneksi ke database

// Ambil ID dari URL
$id_transaksi = $_GET['id'];

// Jika form disubmit
if (isset($_POST['update'])) {
    $nama = $_POST['nama'];
    $asal = $_POST['asal'];
    $tujuan = $_POST['tujuan'];
    $class = $_POST['class'];
    $bagasi = $_POST['bagasi'];
    $jumlah = $_POST['jumlah'];
    $tanggal = $_POST['tanggal']; // Tambahkan untuk input tanggal

    // Cek nilai tujuan dan class
    if ($tujuan == 'jakarta' && $class == 'panoramic') {
        $destinasi = "Jakarta - Panoramic";
        $harga = 2000000;
    } else if ($tujuan == 'jakarta' && $class == 'vip') {
        $destinasi = "Jakarta - VIP";
        $harga = 1500000;
    } else if ($tujuan == 'jakarta' && $class == 'ekonomi') {
        $destinasi = "Jakarta - Ekonomi";
        $harga = 300000;
    } else if ($tujuan == 'bandung' && $class == 'panoramic') {
        $destinasi = "Bandung - Panoramic";
        $harga = 1200000;
    } else if ($tujuan == 'bandung' && $class == 'vip') {
        $destinasi = "Bandung - VIP";
        $harga = 900000;
    } else if ($tujuan == 'bandung' && $class == 'ekonomi') {
        $destinasi = "Bandung - Ekonomi";
        $harga = 200000;
    } else if ($tujuan == 'surabaya' && $class == 'panoramic') {
        $destinasi = "Surabaya - Panoramic";
        $harga = 1500000;
    } else if ($tujuan == 'surabaya' && $class == 'vip') {
        $destinasi = "Surabaya - VIP";
        $harga = 1000000;
    } else if ($tujuan == 'surabaya' && $class == 'ekonomi') {
        $destinasi = "Surabaya - Ekonomi";
        $harga = 200000;
    }

    // Menghitung total harga tiket dan ongkos bagasi
    $total_harga_tiket = $harga * $jumlah;

    if ($bagasi == 'tidak') {
        $status = "tidak";
        $ongkir = 0;
    } else {
        $status = "ya";
        $ongkir = 50000;
    }

    $total = $total_harga_tiket + $ongkir;

    // Update data
    $query = "UPDATE transaksi SET 
                nama = '$nama', 
                asal = '$asal', 
                tujuan = '$tujuan', 
                class = '$class', 
                bagasi = '$bagasi', 
                jumlah = '$jumlah',
                total = '$total',
                tgl = '$tanggal'  -- Pastikan tanggal di-update
              WHERE id_transaksi = $id_transaksi";
    $sql = mysqli_query($conn, $query);

    if ($sql) {
        echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
                Data berhasil diupdate!
                <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
              </div>";
    } else {
        echo "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
                Gagal mengupdate data!
                <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
              </div>";
    }

    if ($sql) {
        // Jika berhasil, buat notifikasi SweetAlert2
        echo "<script>
            setTimeout(function(){
                Swal.fire({
                    title: 'Sukses!',
                    text: 'Data berhasil dihapus.',
                    icon: 'success',
                    confirmButtonText: 'Oke'
                }).then(function() {
                    window.location.href = 'index.php?page=soal6'; // Redirect ke halaman utama setelah klik 'Oke'
                });
            }, 500);
        </script>";
    } else {
        echo "<script>
            Swal.fire({
                title: 'Gagal!',
                text: 'Terjadi kesalahan saat menghapus data.',
                icon: 'error',
                confirmButtonText: 'Coba Lagi'
            });
        </script>";
    }
}

// Ambil data untuk diedit
$query = "SELECT * FROM transaksi WHERE id_transaksi = $id_transaksi";
$sql = mysqli_query($conn, $query);
$result = mysqli_fetch_assoc($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Data Transaksi</title>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script> <!-- SweetAlert2 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>

<div class="container my-5">
    <div class="card">
        <div class="card-header bg-primary text-white">
            <h4>Edit Data Transaksi</h4>
        </div>
        <div class="card-body">
            <form action="" method="post">
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label class="form-label">Nama Pelanggan</label>
                        <input type="text" class="form-control" name="nama" value="<?php echo $result['nama']; ?>">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Asal</label>
                        <input type="text" class="form-control" name="asal" value="<?php echo $result['asal']; ?>">
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-6">
                        <label class="form-label">Tujuan</label>
                        <select class="form-select" name="tujuan">
                            <option selected value="<?php echo $result['tujuan']; ?>"><?php echo ucfirst($result['tujuan']); ?></option>
                            <option value="jakarta">Jakarta</option>
                            <option value="bandung">Bandung</option>
                            <option value="surabaya">Surabaya</option>
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Class</label>
                        <select class="form-select" name="class">
                            <option selected value="<?php echo $result['class']; ?>"><?php echo ucfirst($result['class']); ?></option>
                            <option value="panoramic">Panoramic</option>
                            <option value="vip">VIP</option>
                            <option value="ekonomi">Ekonomi</option>
                        </select>
                    </div>
                </div>
                
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label class="form-label">Ekstra Bagasi</label>
                        <div class="d-flex">
                            <div class="form-check me-3">
                                <input class="form-check-input" type="radio" name="bagasi" value="yes" <?php if ($result['bagasi'] == 'yes') echo 'checked'; ?>>
                                <label class="form-check-label">Ya</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="bagasi" value="tidak" <?php if ($result['bagasi'] == 'tidak') echo 'checked'; ?>>
                                <label class="form-check-label">Tidak</label>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Jumlah Tiket</label>
                        <input type="number" class="form-control" name="jumlah" value="<?php echo $result['jumlah']; ?>">
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-6">
                        <label class="form-label">Tanggal</label>
                        <input type="date" class="form-control" name="tanggal" value="<?php echo date('Y-m-d', strtotime($result['tgl'])); ?>"> <!-- Format YYYY-MM-DD -->
                    </div>
                </div>

                <div class="d-flex justify-content-end">
                    <button type="submit" name="update" class="btn btn-success">Update</button>
                    <a href="index.php?page=soal6" class="btn btn-secondary ms-3">Kembali</a>
                </div>
            </form>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
