<?php
include 'koneksi.php'; // Koneksi ke database

// Ambil ID dari URL
$id_transaksi = $_GET['id'];

// Query untuk mengambil data berdasarkan ID
$query = "SELECT * FROM transaksi WHERE id_transaksi = $id_transaksi";
$sql = mysqli_query($conn, $query);
$result = mysqli_fetch_assoc($sql);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Info Detail Transaksi</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container my-5">
    <div class="card">
        <div class="card-header bg-info text-white">
            <h4>Info Detail Transaksi</h4>
        </div>
        <div class="card-body">
            <table class="table table-bordered">
                <tr>
                    <th>Nama Penumpang</th>
                    <td><?php echo $result['nama']; ?></td>
                </tr>
                <tr>
                    <th>Asal</th>
                    <td><?php echo $result['asal']; ?></td>
                </tr>
                <tr>
                    <th>Tujuan</th>
                    <td><?php echo ucfirst($result['tujuan']); ?></td>
                </tr>
                <tr>
                    <th>Tanggal</th>
                    <td><?php echo ucfirst($result['tgl']); ?></td>
                </tr>
                <tr>
                    <th>Kelas</th>
                    <td>
                        <span class="badge bg-primary"><?php echo ucfirst($result['class']); ?></span>
                    </td>
                </tr>
                <tr>
                    <th>Ekstra Bagasi</th>
                    <td>
                        <?php if ($result['bagasi'] == 'yes'): ?>
                            <span class="badge bg-success">Ya</span>
                        <?php else: ?>
                            <span class="badge bg-danger">Tidak</span>
                        <?php endif; ?>
                    </td>
                </tr>
                <tr>
                    <th>Jumlah Tiket</th>
                    <td><?php echo $result['jumlah']; ?></td>
                </tr>
                <tr>
                    <th>Total Biaya</th>
                    <td><?php echo $result['total']; ?></td>
                </tr>
            </table>

            <div class="d-flex justify-content-end">
                <a href="index.php?page=soal6" class="btn btn-secondary">Kembali</a>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
