<!doctype html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Demo Bootstrap</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!-- FontAwesome for icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <style>
        /* Gaya untuk header */
        .header {
            background-image: url('download.png');
            background-size: cover;
            color: white;
            padding: 40px;
            text-align: center;
        }
        /* Sidebar */
        .sidebar {
            min-width: 200px;
        }
        .sidebar .nav-link {
            transition: background-color 0.3s, color 0.3s;
        }
        .sidebar .nav-link:hover {
            background-color: #007bff; /* Warna latar belakang saat hover */
            color: white; /* Warna teks saat hover */
        }
        .sidebar .nav-link.active {
            background-color: #d3d3d3; /* Warna latar belakang abu-abu muda untuk link aktif */
            color: black; /* Warna teks untuk link aktif */
            font-weight: bold; /* Membuat teks tebal */
        }
        /* Navbar */
        .navbar .nav-link {
            transition: background-color 0.3s, color 0.3s;
        }
        .navbar .nav-link:hover {
            background-color: #007bff; /* Warna latar belakang saat hover */
            color: white; /* Warna teks saat hover */
        }
        .navbar .nav-link.active {
            background-color: #d3d3d3; /* Warna latar belakang abu-abu muda untuk link aktif */
            color: black; /* Warna teks untuk link aktif */
            font-weight: bold; /* Membuat teks tebal */
        }
        /* Card efek hover */
        .card {
            transition: transform 0.2s;
        }
        .card:hover {
            transform: scale(1.05);
        }
    </style>
</head>
<body>

<nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">Navbar</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link <?php echo (!isset($_GET['page'])) ? 'active' : ''; ?>" aria-current="page" href="#">Beranda</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?php echo (isset($_GET['page']) && $_GET['page'] == 'soal1') ? 'active' : ''; ?>" href="index.php?page=soal1">SOAL 1</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?php echo (isset($_GET['page']) && $_GET['page'] == 'soal2') ? 'active' : ''; ?>" href="index.php?page=soal2">SOAL 2</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?php echo (isset($_GET['page']) && $_GET['page'] == 'soal3') ? 'active' : ''; ?>" href="index.php?page=soal3">SOAL 3</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?php echo (isset($_GET['page']) && $_GET['page'] == 'soal4') ? 'active' : ''; ?>" href="index.php?page=soal4">SOAL 4</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?php echo (isset($_GET['page']) && $_GET['page'] == 'soal5') ? 'active' : ''; ?>" href="index.php?page=soal5">SOAL 5</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?php echo (isset($_GET['page']) && $_GET['page'] == 'soal6') ? 'active' : ''; ?>" href="index.php?page=soal6">SOAL 6</a>
                </li>
            </ul>
            <div class="ms-auto">
                <form class="d-flex" action="" method="GET">
                    <input class="form-control me-2" type="search" name="page" placeholder="Cari Halaman" aria-label="Search">
                    <button class="btn btn-outline-success" type="submit">Cari</button>
                </form>
            </div>
        </div>
    </div>
</nav>

<!-- Header dengan Gambar -->
<div class="header">
    <h1>Selamat Datang di Halaman Kami!</h1>
    <p>Temukan informasi menarik di setiap soal.</p>
</div>

<div class="d-flex">
    <!-- Sidebar -->
    <div class="sidebar bg-light">
        <ul class="nav flex-column p-3">
            <li class="nav-item">
                <a class="nav-link <?php echo (isset($_GET['page']) && $_GET['page'] == 'soal1') ? 'active' : ''; ?>" href="index.php?page=soal1">Soal 1</a>
            </li>
            <li class="nav-item">
                <a class="nav-link <?php echo (isset($_GET['page']) && $_GET['page'] == 'soal2') ? 'active' : ''; ?>" href="index.php?page=soal2">Soal 2</a>
            </li>
            <li class="nav-item">
                <a class="nav-link <?php echo (isset($_GET['page']) && $_GET['page'] == 'soal3') ? 'active' : ''; ?>" href="index.php?page=soal3">Soal 3</a>
            </li>
            <li class="nav-item">
                <a class="nav-link <?php echo (isset($_GET['page']) && $_GET['page'] == 'soal4') ? 'active' : ''; ?>" href="index.php?page=soal4">Soal 4</a>
            </li>
            <li class="nav-item">
                <a class="nav-link <?php echo (isset($_GET['page']) && $_GET['page'] == 'soal5') ? 'active' : ''; ?>" href="index.php?page=soal5">Soal 5</a>
            </li>
            <li class="nav-item">
                <a class="nav-link <?php echo (isset($_GET['page']) && $_GET['page'] == 'soal6') ? 'active' : ''; ?>" href="index.php?page=soal6">Soal 6</a>
            </li>
            <li class="nav-item">
                <a class="nav-link <?php echo (isset($_GET['page']) && $_GET['page'] == 'info') ? 'active' : ''; ?>" href="index.php?page=info">Info</a>
            </li>
        </ul>
    </div>

    <!-- Konten Utama -->
    <div class="container m-4 p-4 flex-grow-1">
        <?php
        if (isset($_GET['page'])) {
            $page = $_GET['page'];

            switch ($page) {
                case 'soal1':
                    include "soal1.php";
                    break;
                case 'soal2':
                    include "soal2.php";
                    break;
                case 'soal3':
                    include "soal3.php";
                    break;
                case 'soal4':
                    include "soal4.php";
                    break;
                case 'soal5':
                    include "soal5.php";
                    break;
                case 'soal6':
                    include "soal6.php";
                    break;
                case 'soal1a':
                    include "soal1a.php";
                    break;
                
                default:
                    echo "<center><h3>Maaf, halaman tidak ditemukan!</h3></center>";
                    break;
            }
        } else {
            include "home.php";
        }
        ?>
        <!-- Card Contoh -->
        <div class="card mt-4">
            <div class="card-body">
                <h5 class="card-title">Contoh Kartu</h5>
                <p class="card-text">Ini adalah contoh penggunaan kartu untuk menampilkan informasi. Anda bisa menambahkannya untuk memberikan detail lebih lanjut.</p>
                <a href="#" class="btn btn-primary">Lihat Selengkapnya</a>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
