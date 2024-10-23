<?php
include 'koneksi.php'; // Menghubungkan ke file koneksi

// Cek apakah ada permintaan untuk menghapus data
if (isset($_POST['confirm_delete'])) {
    // Ambil ID dari POST
    $id_transaksi = $_POST['id_transaksi'];

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

// Cek apakah ada input pencarian
$searchQuery = '';
if (isset($_POST['search'])) {
    $searchQuery = $_POST['search'];
}

// Query untuk mengambil data dari tabel transaksi dengan filter pencarian
$query = "SELECT * FROM transaksi WHERE 
          nama LIKE '%$searchQuery%' OR 
          asal LIKE '%$searchQuery%' OR 
          tujuan LIKE '%$searchQuery%'";
$sql = mysqli_query($conn, $query); // Eksekusi query
$no = 0;
?>



<div class="container my-4">
    <h4 class="text-muted">Data Transaksi</h4>
    
    <!-- Baris untuk tombol Tambah dan Form Pencarian -->
    <div class="d-flex justify-content-between mb-3">
        <div>
            <a href="index.php?page=soal1a" class="btn btn-primary">
                <i class="fas fa-plus-circle"></i> Tambah
            </a>
        </div>
        <div>
            <!-- Form Pencarian -->
            <form action="" method="POST" class="d-inline">
                <div class="input-group">
                    <input type="text" name="search" class="form-control" placeholder="Cari berdasarkan nama, asal, atau tujuan" value="<?php echo htmlspecialchars($searchQuery); ?>">
                    <button class="btn btn-outline-secondary" type="submit">Cari</button>
                </div>
            </form>
        </div>
    </div>

    <div class="table-responsive">
        <table class="table table-striped">
            <thead class="thead-light">
                <tr>
                    <th>No</th>
                    <th class="text-center">Nama Penumpang</th>
                    <th>Tanggal</th>
                    <th>Asal</th>
                    <th>Tujuan</th>
                    <th class="text-center">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                while($result = mysqli_fetch_assoc($sql)){
                    // Format Tanggal dd-mm-yyyy
                    $tgl = date("d-m-Y", strtotime($result['tgl']));
                ?>
                <tr>
                    <td><?php echo ++$no; ?></td>
                    <td class="text-center"><?php echo $result['nama']; ?></td>
                    <td><?php echo $tgl; ?></td>
                    <td><?php echo $result['asal']; ?></td>
                    <td><?php echo $result['tujuan']; ?></td>
                    <td class="text-center action-btns">
                        <!-- Tombol Info -->
                        <a href="info.php?id=<?php echo $result['id_transaksi']; ?>" class="btn btn-info btn-info-custom btn-sm" data-toggle="tooltip" title="Info">
                            <i class="fas fa-info-circle"></i>
                        </a>
                        <!-- Tombol Edit -->
                        <a href="edit1.php?id=<?php echo $result['id_transaksi']; ?>" class="btn btn-warning btn-edit-custom btn-sm" data-toggle="tooltip" title="Edit">
                            <i class="fas fa-edit"></i>
                        </a>
                        <!-- Tombol Hapus -->
                        <button type="button" class="btn btn-danger btn-delete-custom btn-sm" data-toggle="tooltip" title="Hapus" data-bs-toggle="modal" data-bs-target="#deleteModal<?php echo $result['id_transaksi']; ?>">
                            <i class="fas fa-trash"></i>
                        </button>
                    </td>
                </tr>

                <!-- Modal untuk konfirmasi hapus -->
                <div class="modal fade" id="deleteModal<?php echo $result['id_transaksi']; ?>" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
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
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tidak</button>
                        <form action="" method="post" style="display: inline;">
                            <input type="hidden" name="confirm_delete" value="1">
                            <input type="hidden" name="id_transaksi" value="<?php echo $result['id_transaksi']; ?>">
                            <button type="submit" class="btn btn-danger">Ya, Hapus</button>
                        </form>
                      </div>
                    </div>
                  </div>
                </div>

                <?php
                }
                ?>
            </tbody>
        </table>
    </div>
</div>

<!-- Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<!-- Enable tooltips -->
<script>
    $(document).ready(function(){
        $('[data-toggle="tooltip"]').tooltip();
    });
</script>

