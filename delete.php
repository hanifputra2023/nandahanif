<?php
include 'koneksi.php'; // Koneksi ke database

// Ambil ID dari URL
$id_transaksi = $_GET['id'];

// Jika pengguna menekan tombol "Yes" untuk konfirmasi hapus
if (isset($_POST['confirm_delete'])) {
    // Query untuk menghapus data berdasarkan ID
    $query = "DELETE FROM transaksi WHERE id_transaksi = $id_transaksi";
    $sql = mysqli_query($conn, $query);

    // Cek apakah query berhasil dijalankan
    if ($sql) {
        // Jika berhasil, buat notifikasi SweetAlert2
        echo "<script>
            setTimeout(function(){
                Swal.fire({
                    title: 'Sukses!',
                    text: 'Data berhasil dihapus dengan baik. Selamat!',
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
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Konfirmasi Hapus</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script> <!-- SweetAlert2 -->
</head>
<body>

<div class="container my-5">
    <h4>Konfirmasi Penghapusan</h4>
    <p>Anda yakin ingin menghapus data ini?</p>
    
    <!-- Tombol untuk memunculkan pop-up konfirmasi -->
    <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal">
        Hapus Data
    </button>
    
    <!-- Tombol Kembali -->
    <a href="index.php?page=soal6" class="btn btn-secondary ms-2">Kembali</a>
    
    <!-- Modal untuk konfirmasi hapus -->
    <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="deleteModalLabel">Konfirmasi Hapus</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            Anda yakin ingin menghapus data ini? Tindakan ini tidak bisa dibatalkan.
          </div>
          <div class="modal-footer">
            <!-- Tombol No untuk membatalkan -->
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
            <!-- Tombol Yes untuk konfirmasi hapus -->
            <form action="" method="post" style="display: inline;">
                <input type="hidden" name="confirm_delete" value="1">
                <button type="submit" class="btn btn-danger">Yes, Hapus</button>
            </form>
          </div>
        </div>
      </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
