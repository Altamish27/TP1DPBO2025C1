<?php

require_once 'Petshop.php';

$toko = new Petshop();
$pemberitahuan = "";
$produkDitemukan = [];

// Menangani form submit
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['tambah'])) {
        $pemberitahuan = $toko->menambahkan($_POST['nama'], $_POST['kategori'], $_POST['harga'], $_POST['gambar']);
    } elseif (isset($_POST['hapus'])) {
        $pemberitahuan = $toko->menghapus($_POST['id']);
    } elseif (isset($_POST['edit'])) {
        $pemberitahuan = $toko->mengubah($_POST['id'], $_POST['nama'], $_POST['kategori'], $_POST['harga'], $_POST['gambar']);
    } elseif (isset($_POST['cari'])) {
        $produkDitemukan = $toko->mencari($_POST['nama']);
    }
}

$produkList = $toko->menampilkan();
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Petshop</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body class="bg-light">
    <div class="container mt-5">
        <h1 class="text-center text-primary">Petshop</h1>

        <!-- Pemberitahuan -->
        <?php if ($pemberitahuan): ?>
            <div class="alert alert-info"><?= $pemberitahuan ?></div>
        <?php endif; ?>

        <!-- Form Cari Produk -->
        <form method="POST" class="mb-4">
            <div class="input-group">
                <input type="text" class="form-control" name="nama" placeholder="Cari produk..." required>
                <button type="submit" name="cari" class="btn btn-secondary">Cari</button>
            </div>
        </form>

        <!-- Daftar Produk -->
        <h3 class="mt-5">Daftar Produk</h3>
        <div class="row"></div>
            <?php $daftarProduk = empty($produkDitemukan) ? $produkList : $produkDitemukan; ?>
            <?php foreach ($daftarProduk as $produk): ?>
                <div class="col-md-4 mt-3">
                    <div class="card shadow">
                        <img src="<?= $produk['gambar'] ?>" class="card-img-top" alt="Produk">
                        <div class="card-body">
                            <h5 class="card-title"><?= $produk['nama'] ?></h5>
                            <p class="card-text">Kategori: <?= $produk['kategori'] ?></p>
                            <p class="card-text">Harga: Rp<?= number_format($produk['harga'], 0, ',', '.') ?></p>

                            <!-- Tombol Hapus -->
                            <form method="POST" class="d-inline">
                                <input type="hidden" name="id" value="<?= $produk['id'] ?>">
                                <button type="submit" name="hapus" class="btn btn-danger">Hapus</button>
                            </form>

                            <!-- Tombol Edit -->
                            <button class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#editModal<?= $produk['id'] ?>">Edit</button>

                        </div>
                    </div>
                </div>

                <!-- Modal Edit -->
                <div class="modal fade" id="editModal<?= $produk['id'] ?>" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Edit Produk</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form method="POST">
                                    <input type="hidden" name="id" value="<?= $produk['id'] ?>">
                                    <div class="mb-3">
                                        <label class="form-label">Nama Produk</label>
                                        <input type="text" class="form-control" name="nama" value="<?= $produk['nama'] ?>" required>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Kategori</label>
                                        <input type="text" class="form-control" name="kategori" value="<?= $produk['kategori'] ?>" required>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Harga</label>
                                        <input type="number" class="form-control" name="harga" value="<?= $produk['harga'] ?>" required>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Gambar (URL)</label>
                                        <input type="text" class="form-control" name="gambar" value="<?= $produk['gambar'] ?>" required>
                                    </div>
                                    <button type="submit" name="edit" class="btn btn-warning">Simpan Perubahan</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
        <br>

        <!-- Form Tambah Produk -->
        <div class="card p-4 shadow">
            <h3>Tambah Produk</h3>
            <form method="POST">
                <div class="mb-3">
                    <label class="form-label">Nama Produk</label>
                    <input type="text" class="form-control" name="nama" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Kategori</label>
                    <input type="text" class="form-control" name="kategori" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Harga</label>
                    <input type="number" class="form-control" name="harga" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Gambar (URL)</label>
                    <input type="text" class="form-control" name="gambar" required>
                </div>
                <button type="submit" name="tambah" class="btn btn-primary">Tambah Produk</button>
            </form>
        </div>
    </div>
</body>
</html>
