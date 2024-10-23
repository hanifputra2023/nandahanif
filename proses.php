<?php
include 'koneksi.php';
session_start();

// Cek apakah aksi edit dikirimkan dari form
if (isset($_POST['aksi'])) {
    $aksi = $_POST['aksi'];
    $id_transaksi = $_POST['id_transaksi'];
    $nama = $_POST['nama'];
    $tgl = $_POST['tgl'];
    $asal = $_POST['asal'];
    $tujuan = $_POST['tujuan'];

    // Jika aksi adalah 'edit', lakukan update data
    if ($aksi == 'edit') {
        // Query update data transaksi berdasarkan id_transaksi
        $query = "UPDATE transaksi SET nama='$nama', tgl='$tgl', asal='$asal', tujuan='$tujuan' WHERE id_transaksi='$id_transaksi'";
        $sql = mysqli_query($conn, $query);

        if ($sql) {
            // Jika berhasil, set pesan sukses dan redirect ke index.php
            $_SESSION['eksekusi'] = "Data berhasil diperbarui!";
            header("Location: index.php?page=soal6");  // Redirect ke halaman index.php setelah update
            exit();
        } else {
            // Jika gagal, set pesan error
            $_SESSION['eksekusi'] = "Gagal memperbarui data!";
            header("Location: kelola.php?ubah=" . $id_transaksi);  // Kembali ke halaman edit
            exit();
        }
    }
}
?>
