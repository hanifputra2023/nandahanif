<?php
include 'koneksi.php';
session_start();

$id_transaksi = '';
$nama = '';
$tgl = '';
$asal = '';
$tujuan = '';

// Jika URL mengandung parameter 'ubah', ambil data berdasarkan id_transaksi
if (isset($_GET['ubah'])) {
    $id_transaksi = $_GET['ubah'];
    
    // Ambil data transaksi berdasarkan ID
    $query = "SELECT * FROM transaksi WHERE id_transaksi = '$id_transaksi';";
    $sql = mysqli_query($conn, $query);
    
    if ($sql && mysqli_num_rows($sql) > 0) {
        $result = mysqli_fetch_assoc($sql);
        $nama = $result['nama'];
        $tgl = $result['tgl'];
        $asal = $result['asal'];
        $tujuan = $result['tujuan'];
    } else {
        echo "Data transaksi tidak ditemukan!";
    }
}
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
    <title>Edit Data Transaksi</title>
</head>
<body>
    <nav class="navbar navbar-light bg-light mb-4">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Edit Data Transaksi</a>
        </div>
    </nav>

    <div class="container">
        <form method="POST" action="proses.php" enctype="multipart/form-data">
            <input type="hidden" value="<?php echo $id_transaksi; ?>" name="id_transaksi">
            
            <div class="mb-3 row">
                <label for="nama" class="col-sm-2 col-form-label">Nama</label>
                <div class="col-sm-10">
                    <input required type="text" name="nama" class="form-control" id="nama" placeholder="Nama" value="<?php echo $nama; ?>">
                </div>
            </div>
            
            <div class="mb-3 row">
                <label for="tgl" class="col-sm-2 col-form-label">Tanggal</label>
                <div class="col-sm-10">
                    <input required type="date" name="tgl" class="form-control" id="tgl" value="<?php echo $tgl; ?>">
                </div>
            </div>
            
            <div class="mb-3 row">
                <label for="asal" class="col-sm-2 col-form-label">Asal</label>
                <div class="col-sm-10">
                    <input required type="text" name="asal" class="form-control" id="asal" value="<?php echo $asal; ?>">
                </div>
            </div>
            
            <div class="mb-3 row">
                <label for="tujuan" class="col-sm-2 col-form-label">Tujuan</label>
                <div class="col-sm-10">
                <select class="form-select" id="tujuan" name="tujuan" required value="<?php echo $tujuan; ?>">
                            <option value="1">Jakarta</option>
                            <option value="2">Bandung</option>
                            <option value="3">Surabaya</option>
                        </select>
                   
                </div>
            </div>
            
            <div class="mb-3 row mt-4">
                <div class="col">
                    <button type="submit" name="aksi" value="edit" class="btn btn-primary">
                        <i class="fa fa-floppy-o" aria-hidden="true"></i> Simpan Perubahan
                    </button>
                    <a href="index.php?page=soal6" type="button" class="btn btn-danger">
                        <i class="fa fa-reply" aria-hidden="true"></i> Batalkan
                    </a>
                </div>
            </div>
        </form>
    </div>
</body>
</html>
