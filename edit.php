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
    <title>Edit Koleksi - Maroon Antik</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
</head>
<body class="bg-light">
    <div class="container mt-5">
        <div class="card shadow border-0 rounded-4 mx-auto" style="max-width: 600px;">
            <div class="card-header bg-primary text-white rounded-top-4 py-3">
                <h4 class="mb-0 text-center"><i class="bi bi-pencil-square me-2"></i>Edit Informasi Barang</h4>
            </div>
            <div class="card-body p-4">
                <form method="POST" enctype="multipart/form-data">
                    <div class="mb-3 text-center">
                        <img src="assets/<?= $data['foto'] ?>" class="img-thumbnail rounded" style="max-height: 150px;">
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-bold">Nama Barang</label>
                        <input type="text" name="nama" class="form-control" value="<?= $data['nama'] ?>" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-bold">Deskripsi Sejarah</label>
                        <textarea name="deskripsi" class="form-control" rows="4" required><?= $data['deskripsi'] ?></textarea>
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-bold">Ganti Foto (Opsional)</label>
                        <input type="file" name="foto" class="form-control" accept="image/*">
                        <small class="text-muted">Kosongkan jika tidak ingin mengganti foto.</small>
                    </div>
                    <div class="mb-4">
                        <label class="form-label fw-bold">Harga Estimasi (Rp)</label>
                        <input type="number" name="harga" class="form-control" value="<?= $data['harga'] ?>" required>
                    </div>
                    <button type="submit" name="update" class="btn btn-primary w-100 py-2 fw-bold mb-2"><i class="bi bi-check-circle me-2"></i>Update Data</button>
                    <a href="index.php" class="btn btn-light border w-100 py-2 fw-bold">Batal</a>
                </form>
            </div>
        </div>
    </div>

    <?php
    if (isset($_POST['update'])) {
        $nama = $_POST['nama'];
        $deskripsi = $_POST['deskripsi'];
        $harga = $_POST['harga'];
        $foto_baru = $_FILES['foto']['name'];

        if($foto_baru != "") {
            // Jika upload foto baru
            $tmp = $_FILES['foto']['tmp_name'];
            $fotobaru = date('dmYHis').$foto_baru;
            $path = "assets/".$fotobaru;
            move_uploaded_file($tmp, $path);
            
            mysqli_query($conn, "UPDATE produk SET nama='$nama', deskripsi='$deskripsi', foto='$fotobaru', harga='$harga' WHERE id='$id'");
        } else {
            // Jika foto tidak diganti
            mysqli_query($conn, "UPDATE produk SET nama='$nama', deskripsi='$deskripsi', harga='$harga' WHERE id='$id'");
        }
        echo "<script>window.location='index.php';</script>";
    }
    ?>
</body>
</html>