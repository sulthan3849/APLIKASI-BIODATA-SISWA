<?php
    #1. Meng-koneksikan PHP ke MySQL
    include("../koneksi.php");

    #2. Mengambil Value dari Form Tambah
    $id = $_POST['id'];
    $nama = $_POST['nama'];
    $nisn = $_POST['nisn'];
    $tp_lahir = $_POST['tp_lahir'];
    $tg_lahir = $_POST['tg_lahir'];
    $alamat = $_POST['alamat'];
    $email = $_POST['email'];
    $jk = $_POST['jk'];
    $jur = $_POST['jur'];

    #3. Query Insert (proses tambah data)
    $query = "UPDATE biodata SET nama='$nama', nisn='$nisn', tp_lahir='$tp_lahir', 
    tg_lahir='$tg_lahir', alamat='$alamat', email='$email', jk='$jk',  jur='$jur' 
    WHERE id='$id'";

    // Handle File Upload
    if (!empty($_FILES['foto']['name'])) {
        $nama_file_asli = $_FILES['foto']['name'];
        $ext = pathinfo($nama_file_asli, PATHINFO_EXTENSION);
        $nama_file = uniqid() . "." . $ext;

        $tmp_file = $_FILES['foto']['tmp_name'];
        $target_dir = "../../upload/foto/";
        $target_file = $target_dir . $nama_file;
        
        if (move_uploaded_file($tmp_file, $target_file)) {
            // Check for existing 'Foto Profil'
            $check_query = "SELECT * FROM galeri_siswa WHERE id_siswa='$id' AND keterangan='Foto Profil'";
            $check_result = mysqli_query($koneksi, $check_query);
            
            if (mysqli_num_rows($check_result) > 0) {
                // Fetch old file info to delete
                $data_foto = mysqli_fetch_array($check_result);
                $old_file = $data_foto['nama_file'];
                if (file_exists($target_dir . $old_file)) {
                    unlink($target_dir . $old_file);
                }
                
                // Update existing record
                $query_foto = "UPDATE galeri_siswa SET nama_file='$nama_file' WHERE id_siswa='$id' AND keterangan='Foto Profil'";
            } else {
                // Insert new record
                $query_foto = "INSERT INTO galeri_siswa (id_siswa, nama_file, keterangan) VALUES ('$id', '$nama_file', 'Foto Profil')";
            }
            mysqli_query($koneksi, $query_foto);
        }
    }

    $tambah = mysqli_query($koneksi,$query);

    #4. Jika Berhasil triggernya apa? (optional)
    if($tambah){
        header("location:index.php");
    }else{
        echo "Data Gagal ditambah";
    }
?>