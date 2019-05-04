<?php
	// header harus json
	header("Content-Type:application/json");

	// tangkap method request
	$smethod = $_SERVER['REQUEST_METHOD'];

	// inisialisasi variable hasil
	$result = array();

	// kondisi metode
	if($smethod == 'POST'){

		$nim = $_POST['nim'];
		$nama_mhs = $_POST['nama_mhs'];
		$alamat = $_POST['alamat'];

		$result['status']['code'] = 200;
		$result['result'] = array(
			"nim"=>$nim
		);
	}else{
		$result['status']['code'] = 400;
	}

	// parse ke format json
	echo json_encode($result);
?>