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
    $id_mhs = $_POST['id_mhs'];
    $nim = $_POST['nim'];
    $nama = $_POST['nama'];
    $alamat = $_POST['alamat'];
    $foto_lama = $_POST['old_image'];
    // tangkap data foto
    $img_tmp = $_FILES['fotomhs']['tmp_name'];
    $img_name = $_FILES['fotomhs']['name'];

    // membuat query input\
    if($img_name){
        // foto lama hapus
        unlink('foto/'.$foto_lama);

        // upload foto baru
        move_uploaded_file($img_tmp, 'foto/'.$img_name);
        
        $sql = "UPDATE mahasiswa SET nim='$nim', nama_mhs='$nama', alamat='$alamat', foto='$img_name' WHERE id_mhs='$id_mhs'";
    }else{
        $sql = "UPDATE mahasiswa SET nim='$nim', nama_mhs='$nama', alamat='$alamat' WHERE id_mhs='$id_mhs'";
    }

    // eksekusi query
    $conn->query($sql);

    header("Location: index.php");

?>