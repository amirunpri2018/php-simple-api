<?php
	// header harus json
	header("Content-Type:application/json");

	// tangkap method request
	$smethod = $_SERVER['REQUEST_METHOD'];

	// inisialisasi variable hasil
	$result = array();

	// pengecekan metode request
	if ($smethod=='GET') {
		// jika GET
		$result['status']['code'] = 200;
		$result['status']['description'] = 'Request Valid';

		// pengambilan data dari database
		// conf koneksi db
		$servername = "localhost";
	    $username = "root";
	    $password = "Adm1nroot";
	    $dbnamea = "kemahasiswaan";

	    // Create connection
	    $conn = new mysqli($servername, $username, $password, $dbnamea);

	    // ambil data
	    $sql = "SELECT * FROM mahasiswa";
	    $hasilquery = $conn->query($sql);

	    // fecth all data
	    $result['results'] = $hasilquery->fetch_all(MYSQLI_ASSOC);
	}else{
		// jika bukan GET
		$result['status']['code'] = 400;
		$result['status']['description'] = 'Request Invalid';
	}

	// parse ke format json
	echo json_encode($result);

?>