<?php 
    $servername = "localhost";
    $username = "root";
    $password = "Adm1nroot";
    $dbnamea = "kemahasiswaan";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbnamea);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // tangkap input
    $nim = $_POST['nim'];
    $nama = $_POST['nama'];
    $alamat = $_POST['alamat'];
    // tangkap data foto
    $img_tmp = $_FILES['fotomhs']['tmp_name'];
    $img_name = $_FILES['fotomhs']['name'];

    // untuk ke server
    move_uploaded_file($img_tmp, 'foto/'.$img_name);

    // membuat query input
    $sql = "INSERT INTO mahasiswa(nim, nama_mhs, alamat, foto) VALUES('$nim', '$nama', '$alamat', '$img_name')";
    // eksekusi query
    $conn->query($sql);

    header("Location: index.php");

?>