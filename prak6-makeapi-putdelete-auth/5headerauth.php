<?php
	$headers = apache_request_headers();

	// foreach ($headers as $header => $value) {
	//     echo "$header: $value <br />\n";
	// }

	$key = $headers['key'];

	// conf koneksi db
	$servername = "localhost";
    $username = "root";
    $password = "Adm1nroot";
    $dbnamea = "kemahasiswaan";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbnamea);

    // ambil data
    $sql = "SELECT * FROM user_api WHERE token='$key' LIMIT 1";
    $hasilquery = $conn->query($sql);

    // fecth all data
    $result = $hasilquery->fetch_all(MYSQLI_ASSOC);

    if(count($result)>0){
    	// kode post, get, put, delete
    	echo "token benar";
    }else{
    	echo "token salah";
    }
	
?>