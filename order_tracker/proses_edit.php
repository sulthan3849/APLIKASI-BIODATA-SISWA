<?php
include 'koneksi.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id_pesanan = $_POST['id_pesanan'];
    $nama_pelanggan = $_POST['nama_pelanggan'];
    $produk = $_POST['produk'];
    $jumlah = $_POST['jumlah'];
    $tanggal_pesan = $_POST['tanggal_pesan'];

    // Validasi
    if (empty($nama_pelanggan) || empty($produk) || $jumlah < 1) {
        echo "Error: Nama pelanggan dan produk tidak boleh kosong, dan jumlah harus minimal 1.";
    } else {
        $nama_pelanggan = mysqli_real_escape_string($koneksi, $nama_pelanggan);
        $produk = mysqli_real_escape_string($koneksi, $produk);

        $query = "UPDATE pesanan SET 
                    nama_pelanggan = '$nama_pelanggan', 
                    produk = '$produk', 
                    jumlah = '$jumlah', 
                    tanggal_pesan = '$tanggal_pesan' 
                  WHERE id_pesanan = $id_pesanan";
        
        if (mysqli_query($koneksi, $query)) {
            header("Location: index.php");
            exit();
        } else {
            echo "Error: " . $query . "<br>" . mysqli_error($koneksi);
        }
    }
}
mysqli_close($koneksi);
?>
