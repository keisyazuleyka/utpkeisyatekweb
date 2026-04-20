<?php 
include 'koneksi.php'; 
$id = $_GET['id'];
$query = mysqli_query($conn, "SELECT * FROM produk WHERE id='$id'");
$data = mysqli_fetch_assoc($query);
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $data['nama'] ?> - Maroon Antik</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <style> .bg-maroon { background-color: #800000; } </style>
</head>
<body class="bg-light">

    <nav class="navbar navbar-expand-lg navbar-dark bg-maroon shadow-sm mb-5">
        <div class="container">
            <a class="navbar-brand fw-bold" href="index.php"><i class="bi bi-hourglass-split me-2"></i>Maroon Antik</a>
        </div>
    </nav>

    <div class="container mb-5">
        <div class="row bg-white p-4 shadow border-0 rounded-4">
            <div class="col-md-5 text-center mb-4 mb-md-0">
                <img src="assets/<?= $data['foto'] ?>" class="img-fluid rounded-3 shadow-sm" style="max-height: 450px; width: 100%; object-fit: cover;">
            </div>
            <div class="col-md-7 d-flex flex-column justify-content-center">
                <span class="badge bg-secondary mb-2" style="width: fit-content;">Koleksi Autentik</span>
                <h1 class="fw-bold text-dark mb-3"><?= $data['nama'] ?></h1>
                <h2 class="text-danger fw-bold mb-4">Rp <?= number_format($data['harga'], 0, ',', '.') ?></h2>
                <h5 class="fw-bold border-bottom pb-2">Deskripsi Historis</h5>
                <p class="text-muted fs-5" style="line-height: 1.8; text-align: justify;"><?= nl2br($data['deskripsi']) ?></p>
                
                <div class="mt-auto pt-4 border-top">
                    <a href="index.php" class="btn btn-outline-dark btn-lg me-2"><i class="bi bi-arrow-left"></i> Kembali</a>
                    <a href="edit.php?id=<?= $data['id'] ?>" class="btn btn-warning btn-lg"><i class="bi bi-pencil-square"></i> Sesuaikan Data</a>
                </div>
            </div>
        </div>
    </div>

</body>
</html>