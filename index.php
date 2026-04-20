<?php include 'koneksi.php'; ?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Maroon Antik - Galeri Barang Antik</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <style>
        body { background-color: #f8f9fa; font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; }
        .navbar-brand { font-weight: 700; letter-spacing: 1px; }
        .card { border: none; transition: transform 0.3s ease, box-shadow 0.3s ease; border-radius: 12px; overflow: hidden; }
        .card:hover { transform: translateY(-5px); box-shadow: 0 10px 20px rgba(0,0,0,0.1) !important; }
        .card-img-top { height: 250px; object-fit: cover; }
        .price-tag { color: #800000; font-weight: bold; font-size: 1.2rem; }
        .bg-maroon { background-color: #800000; }
    </style>
</head>
<body>

    <nav class="navbar navbar-expand-lg navbar-dark bg-maroon shadow-sm mb-5">
        <div class="container">
            <a class="navbar-brand" href="index.php"><i class="bi bi-hourglass-split me-2"></i>Maroon Antik</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link active fw-bold" href="index.php">Katalog</a></li>
                    <li class="nav-item"><a class="nav-link" href="about.php">Tentang Kami</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2 class="fw-bold text-dark"><i class="bi bi-collection me-2"></i>Koleksi Eksklusif</h2>
            <a href="tambah.php" class="btn btn-success rounded-pill px-4 shadow-sm"><i class="bi bi-plus-circle me-2"></i>Tambah Koleksi</a>
        </div>
        
        <div class="row">
            <?php
            $query = mysqli_query($conn, "SELECT * FROM produk ORDER BY id DESC");
            if(mysqli_num_rows($query) > 0) {
                while ($row = mysqli_fetch_assoc($query)) {
            ?>
            <div class="col-md-4 mb-4">
                <div class="card h-100 shadow-sm">
                    <img src="assets/<?= $row['foto'] ?>" class="card-img-top" alt="<?= $row['nama'] ?>" onerror="this.src='https://via.placeholder.com/300x250?text=Foto+Tidak+Ada'">
                    <div class="card-body">
                        <h5 class="card-title fw-bold text-dark"><?= $row['nama'] ?></h5>
                        <p class="card-text text-muted small text-truncate"><?= $row['deskripsi'] ?></p>
                        <p class="price-tag">Rp <?= number_format($row['harga'], 0, ',', '.') ?></p>
                    </div>
                    <div class="card-footer bg-white border-top-0 d-flex gap-2 pb-3">
                        <a href="detail.php?id=<?= $row['id'] ?>" class="btn btn-outline-dark btn-sm flex-fill"><i class="bi bi-eye"></i> Detail</a>
                        <a href="edit.php?id=<?= $row['id'] ?>" class="btn btn-outline-primary btn-sm flex-fill"><i class="bi bi-pencil"></i> Edit</a>
                        <a href="hapus.php?id=<?= $row['id'] ?>" class="btn btn-outline-danger btn-sm flex-fill" onclick="return confirm('Hapus barang antik ini?')"><i class="bi bi-trash"></i> Hapus</a>
                    </div>
                </div>
            </div>
            <?php 
                }
            } else {
                echo '<div class="col-12"><div class="alert alert-warning text-center shadow-sm"><i class="bi bi-info-circle me-2"></i>Belum ada koleksi barang antik. Silakan tambah koleksi baru.</div></div>';
            }
            ?>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>