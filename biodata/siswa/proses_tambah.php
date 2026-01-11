<?php
    #1. Meng-koneksikan PHP ke MySQL
    include("../koneksi.php");

    #2. Mengambil Value dari Form Tambah
    $nama = $_POST['nama'];
    $nisn = $_POST['nisn'];
    $tp_lahir = $_POST['tp_lahir'];
    $tg_lahir = $_POST['tg_lahir'];
    $alamat = $_POST['alamat'];
    $email = $_POST['email'];
    $jk = $_POST['jk'];
    $jur = $_POST['jur'];

    #3. Query Insert (proses tambah data)
    $query = "INSERT INTO biodata (nama,nisn,tp_lahir,tg_lahir,alamat,email,jk,jur) 
    VALUES ('$nama','$nisn','$tp_lahir','$tg_lahir','$alamat','$email','$jk','$jur')";


    $tambah = mysqli_query($koneksi,$query);
    
    // Get the ID of the newly created student
    $new_student_id = mysqli_insert_id($koneksi);

    // Handle File Upload
    if (!empty($_FILES['foto']['name'])) {
        $nama_file_asli = $_FILES['foto']['name'];
        $ext = pathinfo($nama_file_asli, PATHINFO_EXTENSION);
        $nama_file = uniqid() . "." . $ext;
        
        $tmp_file = $_FILES['foto']['tmp_name'];
        $target_dir = "../../upload/foto/";
        $target_file = $target_dir . $nama_file;
        
        if (move_uploaded_file($tmp_file, $target_file)) {
            $query_foto = "INSERT INTO galeri_siswa (id_siswa, nama_file, keterangan) VALUES ('$new_student_id', '$nama_file', 'Foto Profil')";
            mysqli_query($koneksi, $query_foto);
        }
    }

    #4. Jika Berhasil triggernya apa? (optional)
    if($tambah){
        header("location:index.php");
    }else{
        echo "Data Gagal ditambah";
    }
?>