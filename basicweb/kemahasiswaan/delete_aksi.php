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

    // tangkap id data yang mau dihapus
    $id_mhs = $_GET['id_mhs'];
    $foto = $_GET['foto'];

    // hapus foto dari server
    unlink('foto/'.$foto);

    // buat query menghapus
    $sql = "DELETE FROM mahasiswa WHERE id_mhs='$id_mhs'";
    // eksekusi query
    $conn->query($sql);

    header("Location: index.php");

?>