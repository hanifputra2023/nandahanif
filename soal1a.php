<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script> <!-- SweetAlert2 -->
<form action="" method="POST" class="row g-3">
                    <div class="mb-3">
                        <label for="namaPelanggan" class="form-label">NAMA PELANGGAN</label>
                        <input type="text" class="form-control" id="namaPelanggan" name="nama" placeholder="nama customer" required>
                    </div>
                    
                        <div class="mb-3">
                            <label for="disabledTextInput" class="form-label">ASAL</label>
                            <input type="text" id="disabledTextInput" class="form-control" placeholder="Jogja" name="asal">
                        </div>
                    
                    
                    <div class="mb-3">
                        <label for="jenisKopi" class="form-label">TUJUAN</label>
                        <select class="form-select" id="jenisKopi" name="tujuan" required>
                            <option value="">Default select</option>
                            <option value="1">Jakarta</option>
                            <option value="2">Bandung</option>
                            <option value="3">Surabaya</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="jenisKopi" class="form-label">CLASS</label>
                        <select class="form-select" id="jenisKopi" name="class" required>
                            <option value="">Default select</option>
                            <option value="panoramic">Panoramic</option>
                            <option value="vip">VIP</option>
                            <option value="ekonomi">Ekonomi</option>
                        </select>
                    </div>
                    
                    <div class="row">
                        <div class="mb-3">
                            <label for="inputCity" class="form-label">OPERATOR</label>
                        </div>
                        <div class="col">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="operator" id="Dine-in" value="yes">
                                <label class="form-check-label" for="Dine-in">Ya</label>
                            </div>
                        </div>
                        <div class="col m-2">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="operator" id="Take-Away" value="tidak">
                                <label class="form-check-label" for="Take-Away">Tidak</label>
                            </div>
                        </div>
                        
                        <div class="mb-3">
                            <label for="namaPelanggan" class="form-label">JUMLAH TIKET</label>
                            <input type="text" class="form-control" id="namaPelanggan" name="tiket" required>
                        </div>
                    </div>
                    
                    <div class="col-12">
                        <input type="submit" class="btn btn-primary" name="hitung" value="Submit"></input>
                    </div>
                </form>


                <?php
                    if (isset($_POST['hitung'])) {
                        $order = $_POST['tujuan'];
                        $class = $_POST['class'];
                        $nama = $_POST['nama'];
                        $daerah = $_POST['asal'];
                        $op = $_POST['operator'];
                        $jumlah_tiket = $_POST['tiket'];
                        $h = '<b> TOTAL BAYAR <b>';
                        $i = '<i class="bi bi-bell"></i>';
                        $tanggal = date('Y-m-d');
                        
                        if ($order == 1 && $class == 'panoramic') {
                            $destinasi = "Jakarta - Panoramic";
                            $harga = 2000000;
                        } else if ($order == 1 && $class == 'vip') {
                            $destinasi = "Jakarta - VIP";
                            $harga = 1500000;
                        } else if ($order == 1 && $class == 'ekonomi') {
                            $destinasi = "Jakarta - Ekonomi";
                            $harga = 300000;
                        } else if ($order == 2 && $class == 'panoramic') {
                            $destinasi = "Bandung - Panoramic";
                            $harga = 1200000;
                        } else if ($order == 2 && $class == 'vip') {
                            $destinasi = "Bandung - VIP";
                            $harga = 900000;
                        } else if ($order == 2 && $class == 'ekonomi') {
                            $destinasi = "Bandung - Ekonomi";
                            $harga = 200000;
                        } else if ($order == 3 && $class == 'panoramic') {
                            $destinasi = "Surabaya - Panoramic";
                            $harga = 1500000;
                        } else if ($order == 3 && $class == 'vip') {
                            $destinasi = "Surabaya - VIP";
                            $harga = 1000000;
                        } else if ($order == 3 && $class == 'ekonomi') {
                            $destinasi = "Surabaya - Ekonomi";
                            $harga = 200000;
                        }

                        $total_harga_tiket = $harga * $jumlah_tiket;

                        if ($op == 'tidak') {
                            $status = "tidak";
                            $ongkir = 0;
                        } else {
                            $status = "ya";
                            $ongkir = 50000;
                        }

                        $total = $total_harga_tiket + $ongkir;

                        $msg = " $i &nbsp $h <br><br>
                                Nama: $nama <br>
                                Tujuan: $destinasi <br>
                                Jumlah Tiket: $jumlah_tiket <br>
                                Harga: $harga <br>
                                Tambahan Bagasi: $status (ongkir $ongkir) <br>
                                Total Bayar: $total";



                               

                include 'koneksi.php';
                $sql = "INSERT INTO `transaksi` (`id_transaksi`, `nama`, `asal`, `tujuan`, `class`, `jumlah`, `bagasi`, `total`, `tgl`) VALUES (NULL, '$nama', '$daerah', '$order', '$class', '$jumlah_tiket', '$op', '$total', '$tanggal');";
               $input = mysqli_query($koneksi,$sql);

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

                ?>

                <br>
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                    <?= $msg ?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>

                <?php
                    }
                ?>