CREATE TABLE pesanan (
  id_pesanan INT(11) PRIMARY KEY AUTO_INCREMENT,
  nama_pelanggan VARCHAR(100) NOT NULL,
  produk VARCHAR(50) NOT NULL,
  jumlah INT(11) NOT NULL,
  tanggal_pesan DATE NOT NULL
);
