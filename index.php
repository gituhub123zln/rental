<?php
// Data paket mobil dalam bentuk array multidimensi
$rentals = array(
    // Setiap elemen array menyimpan informasi tentang sebuah mobil, terdiri dari:
    // 1. Nama mobil
    // 2. Deskripsi singkat mengenai fitur dan keunggulan mobil
    // 3. Harga sewa mobil per hari dalam satuan rupiah
    // 4. Nama file gambar mobil yang akan ditampilkan di halaman
    ["Toyota Fortuner", "SUV tangguh dengan mesin bertenaga dan fitur keselamatan canggih, cocok untuk perjalanan jarak jauh dan medan berat.", 1500000, "toyota.jpeg"],
    ["Hyundai Creta", "SUV kompak dengan desain modern, teknologi mutakhir, dan kenyamanan optimal untuk perjalanan perkotaan.", 800000, "creta.jpeg"],
    ["Honda CR-V", "SUV premium dengan ruang kabin luas, performa efisien, dan fitur hiburan serta keselamatan yang lengkap.", 1200000, "crv.jpeg"],
);
?>

<!doctype html>
<html lang="id">

<head>
    <meta charset="utf-8"> <!-- Mengatur karakter encoding halaman menjadi UTF-8 untuk mendukung berbagai karakter -->
    <meta name="viewport" content="width=device-width, initial-scale=1"> <!-- Menyesuaikan tampilan untuk berbagai ukuran layar -->
    <title>Rental Mobil</title> <!-- Menentukan judul halaman yang muncul di tab browser -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"> <!-- Menghubungkan stylesheet Bootstrap untuk styling halaman -->
    <style>
        .navbar {
            font-size: 18px;
            /* Menentukan ukuran font navbar agar lebih terbaca */
        }

        .card:hover {
            transform: translateY(-5px);
            /* Memberikan efek melayang pada kartu mobil saat dihover */
            transition: transform 0.2s ease-in-out;
            /* Animasi agar perubahan terlihat lebih halus */
        }

        .btn-dark {
            background-color: #343a40;
            /* Warna latar belakang tombol utama */
            border: none;
            /* Menghapus border tombol */
            transition: background-color 0.3s ease;
            /* Efek transisi saat warna berubah */
        }

        .btn-dark:hover {
            background-color: #23272b;
            /* Warna tombol saat kursor diarahkan */
        }

        .banner {
            height: 500px;
            /* Menentukan tinggi gambar banner */
            object-fit: cover;
            /* Memastikan gambar menyesuaikan ukuran tanpa distorsi */
        }
    </style>
</head>

<body>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark py-3 shadow">
        <div class="container">
            <a class="navbar-brand fw-bold" href="#">Rental Mobil</a> <!-- Logo atau nama perusahaan -->
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span> <!-- Tombol menu untuk tampilan mobile -->
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav me-auto">
                    <li class="nav-item">
                        <a class="nav-link active" href="beranda.php">Home</a> <!-- Link ke halaman utama -->
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="transaksi.php">Transaksi</a> <!-- Link ke halaman transaksi -->
                    </li>
                </ul>
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link text-danger" href="logout.php">Logout</a> <!-- Link untuk keluar dari akun -->
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Banner -->
    <div class="container-fluid p-0">
        <img src="img/banner.png" class="img-fluid w-100 banner" alt="Banner"> <!-- Menampilkan gambar banner utama -->
    </div>

    <!-- Daftar Produk -->
    <div class="container my-5">
        <h2 class="fw-bold mb-4 text-center">Daftar Rental Mobil</h2> <!-- Judul bagian daftar mobil -->
        <div class="row">
            <?php if (!empty($rentals)) { ?> <!-- Mengecek apakah terdapat data paket mobil -->
                <?php foreach ($rentals as $index => $data) { ?> <!-- Melakukan looping untuk menampilkan setiap mobil -->
                    <div class="col-md-4 mb-4">
                        <div class="card h-100 shadow border-0"> <!-- Membuat kartu produk untuk setiap mobil -->
                            <img src="img/<?= htmlspecialchars($data[3]) ?>" class="card-img-top" alt="<?= htmlspecialchars($data[0]) ?>" style="height: 200px; object-fit: cover;"> <!-- Menampilkan gambar mobil -->
                            <div class="card-body">
                                <h5 class="fw-bold"><?= htmlspecialchars($data[0]) ?></h5> <!-- Nama mobil -->
                                <p class="text-muted small"><?= htmlspecialchars($data[1]) ?></p> <!-- Deskripsi mobil -->
                                <p class="fw-bold text-dark">Rp <?= number_format($data[2], 0, ',', '.') ?></p> <!-- Harga sewa mobil dengan format rupiah -->
                                <a href="transaksi.php?car=<?= urlencode($data[0]) ?>&harga=<?= $data[2] ?>" class="btn btn-dark">Pilih</a> <!-- Tombol Pilih -->
                            </div>
                        </div>
                    </div>
                <?php } ?>
            <?php } else { ?>
                <p class="text-center text-muted">Tidak ada data tersedia.</p> <!-- Pesan jika tidak ada mobil tersedia -->
            <?php } ?>
        </div>

        <!-- Tombol Selanjutnya -->
        <div class="text-center mt-4">
            <a href="transaksi.php" class="btn btn-dark">Selanjutnya</a> <!-- Tombol menuju halaman transaksi -->
        </div>
    </div>

    <!-- Footer -->
    <footer class="bg-dark text-white text-center py-4 mt-5">
        <div class="container">
            <h5 class="fw-bold">Tentang Kami</h5> <!-- Judul bagian footer -->
            <p>Rental Mobil Zaelena - Solusi transportasi terbaik untuk perjalanan Anda.</p> <!-- Deskripsi singkat perusahaan -->
            <p><strong>Alamat:</strong> Jl. Merdeka No. 45, Banjarmasin</p> <!-- Alamat perusahaan -->
            <p><strong>Telepon:</strong> 0812-3456-7890</p> <!-- Nomor telepon yang bisa dihubungi -->
            <p><strong>Email:</strong> info@rentalmobilzaelena.com</p> <!-- Email kontak perusahaan -->
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script> <!-- Memuat skrip JavaScript Bootstrap -->
</body>

</html>