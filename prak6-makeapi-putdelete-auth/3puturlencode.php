<?php
	// header harus json
	header("Content-Type:application/json");

	// conf koneksi db
	$servername = "localhost";
    $username = "root";
    $password = "Adm1nroot";
    $dbnamea = "kemahasiswaan";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbnamea);

	// tangkap method request
	$smethod = $_SERVER['REQUEST_METHOD'];

	// inisialisasi variable hasil
	$result = array();

	// kondisi metode
	if($smethod == 'PUT'){
		// tangkap input
		parse_str(file_get_contents('php://input'), $_PUT);

		$id_mhs = $_PUT['id_mhs'];
		$nama_mhs = $_PUT['nama_mhs'];

		// insert data
		$sql = "UPDATE mahasiswa SET
					nama_mhs='$nama_mhs'
				WHERE 
					id_mhs='$id_mhs'";
		$conn->query($sql);

		$result['status']['code'] = 200;
		$result['status']['description'] = "1 data inserted";
		$result['result'] = array(
			"nama_mhs"=>$nama_mhs
		);

	}else{
		$result['status']['code'] = 400;
	}

	// parse ke format json
	echo json_encode($result);
?>