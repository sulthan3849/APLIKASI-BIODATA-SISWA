<?php
include 'koneksi.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $id = mysqli_real_escape_string($koneksi, $id);

    $query = "DELETE FROM pesanan WHERE id_pesanan = $id";
    
    if (mysqli_query($koneksi, $query)) {
        header("Location: index.php");
        exit();
    } else {
        echo "Error: " . $query . "<br>" . mysqli_error($koneksi);
    }
} else {
    header("Location: index.php");
    exit();
}
mysqli_close($koneksi);
?>
