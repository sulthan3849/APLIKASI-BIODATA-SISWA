<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Pesanan</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
</head>
<body>
<div class="container mt-5">
    <h2>Tambah Pesanan Baru</h2>
    <form action="proses_tambah.php" method="POST">
        <div class="form-group">
            <label for="nama_pelanggan">Nama Pelanggan</label>
            <input type="text" class="form-control" id="nama_pelanggan" name="nama_pelanggan" required maxlength="100">
        </div>
        <div class="form-group">
            <label for="produk">Produk</label>
            <input type="text" class="form-control" id="produk" name="produk" required maxlength="50">
        </div>
        <div class="form-group">
            <label for="jumlah">Jumlah</label>
            <input type="number" class="form-control" id="jumlah" name="jumlah" required min="1">
        </div>
        <div class="form-group">
            <label for="tanggal_pesan">Tanggal Pesan</label>
            <input type="date" class="form-control" id="tanggal_pesan" name="tanggal_pesan" required>
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="index.php" class="btn btn-secondary">Batal</a>
    </form>
</div>
</body>
</html>