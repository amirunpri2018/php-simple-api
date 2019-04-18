<?php
	// $data = array(
	// 	'NamaMahasiswa' => 'Muh Nur Yasir',
	// 	'Nim' => '42510049',
	// 	'kelas' => '1B' 
	// );

	// file_get_content = data.json
	$data = file_get_contents("data.json");

	// Curl = url

	// echo $data;
	// echo json_encode($data);

	$parsedata = json_decode($data);

	// var_dump($parsedata);
	echo $parsedata[1]->namaMahasiswa;
?>