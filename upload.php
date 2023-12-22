<?php

require "connection.php";

if(isset($_POST['submit'])){
    $file_name = $_FILES['gambar']['name'];
    $file_size = $_FILES['gambar']['size'];
    $file_tmp = $_FILES['gambar']['tmp_name'];
    $file_type = $_FILES['gambar']['type'];
    
    $upload_dir = "uploads/";

    $nama = $_POST['nama'];

    // Pindahzkan file yang diunggah ke folder tujuan
    if(move_uploaded_file($file_tmp, $upload_dir.$file_name)){
        $sql = "INSERT INTO mahasiswa (image, nama) VALUES ('$upload_dir$file_name', '$nama')";

        if ($conn->query($sql) === TRUE) {
            echo "Data berhasil ditambahkan";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
        
        // Tutup koneksi
        $conn->close();

    } else {
        echo "Gagal mengunggah gambar.";
    }
}
?>
