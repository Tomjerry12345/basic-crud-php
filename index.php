<!DOCTYPE html>
<html>

<head>
    <title>Unggah Gambar</title>
</head>


<body style="background-image: url('uploads/luffy.jpg');">
    <?php
    
    require "connection.php";

    $sql = "SELECT * FROM mahasiswa"; // Ambil gambar terbaru

    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $gambar = $row['image'];
            $nama = $row['nama'];
            echo $gambar;
            echo '<h6>' . $nama . '</h6> <br>';
            echo '<img src="http://localhost/upload-gambar/' . $gambar . '" width="200"/>';
        }
       
    }

    $conn->close();
    ?>
    <form action="upload.php" method="post" enctype="multipart/form-data">
        <input type="text" name="nama">
        <input type="file" name="gambar" accept="image/*">
        <input type="submit" value="Unggah Gambar" name="submit">
    </form>
</body>

</html>