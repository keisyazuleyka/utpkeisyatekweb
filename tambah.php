<?php include 'koneksi.php'; ?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Koleksi - Maroon Antik</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
</head>
<body class="bg-light">
    <div class="container mt-5">
        <div class="card shadow border-0 rounded-4 mx-auto" style="max-width: 600px;">
            <div class="card-header bg-success text-white rounded-top-4 py-3">
                <h4 class="mb-0 text-center"><i class="bi bi-plus-circle me-2"></i>Tambah Koleksi Antik</h4>
            </div>
            <div class="card-body p-4">
                <form method="POST" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label class="form-label fw-bold">Nama Barang</label>
                        <input type="text" name="nama" class="form-control" placeholder="Contoh: Koin VOC 1700" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-bold">Deskripsi Sejarah</label>
                        <textarea name="deskripsi" class="form-control" rows="4" placeholder="Ceritakan nilai sejarah barang ini..." required></textarea>
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-bold">Foto Barang (Upload ke folder assets)</label>
                        <input type="file" name="foto" class="form-control" accept="image/*" required>
                    </div>
                    <div class="mb-4">
                        <label class="form-label fw-bold">Harga Estimasi (Rp)</label>
                        <input type="number" name="harga" class="form-control" placeholder="Contoh: 1500000" required>
                    </div>
                    <button type="submit" name="submit" class="btn btn-success w-100 py-2 fw-bold mb-2"><i class="bi bi-save me-2"></i>Simpan ke Galeri</button>
                    <a href="index.php" class="btn btn-light border w-100 py-2 fw-bold">Batal</a>
                </form>
            </div>
        </div>
    </div>

    <?php
    if (isset($_POST['submit'])) {
        $nama = $_POST['nama'];
        $deskripsi = $_POST['deskripsi'];
        $harga = $_POST['harga'];

        $foto = $_FILES['foto']['name'];
        $tmp = $_FILES['foto']['tmp_name'];
        
        $fotobaru = date('dmYHis').$foto;
        $path = "assets/".$fotobaru;

        if(move_uploaded_file($tmp, $path)){
            mysqli_query($conn, "INSERT INTO produk (nama, deskripsi, foto, harga) VALUES ('$nama', '$deskripsi', '$fotobaru', '$harga')");
            echo "<script>window.location='index.php';</script>";
        } else {
            echo "<script>alert('Gagal! Pastikan folder assets ada di project kamu.');</script>";
        }
    }
    ?>
</body>
</html>