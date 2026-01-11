<?php 
    #1. koneksi database
    include_once("../koneksi.php");

    #2. ID hapus
    $idhapus = $_GET['id'];

    // Hapus file foto terkait dari folder upload
    $qry_foto = "SELECT nama_file FROM galeri_siswa WHERE id_siswa='$idhapus'";
    $hasil_foto = mysqli_query($koneksi, $qry_foto);
    while ($data_foto = mysqli_fetch_array($hasil_foto)) {
        $file_path = "../../upload/foto/" . $data_foto['nama_file'];
        if (file_exists($file_path)) {
            unlink($file_path);
        }
    }

    #3. menulis query
    $qry = "DELETE FROM biodata WHERE id='$idhapus'";

    #4. menjalan query
    $hapus = mysqli_query($koneksi,$qry);

    #5. mengalihkan halaman
    header("location:index.php");
?>