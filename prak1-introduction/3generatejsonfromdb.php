<?php
	header("Content-Type:application/json");

    $servername = "localhost";
    $username = "root";
    $password = "Adm1nroot";
    $dbnamea = "kemahasiswaan";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbnamea);

    // ambil data
    $sql = "SELECT * FROM mahasiswa";
    $result = $conn->query($sql);

    // fecth all data
    $outrespone = $result->fetch_all(MYSQLI_ASSOC);
    // $outrespone = $result->fetch_assoc();
	
	// echo json_encode($data);
    // var_dump($outrespone);
    echo json_encode($outrespone);
	
?>