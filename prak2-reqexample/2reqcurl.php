<?php
	$curl_h = curl_init('http://api.jakarta.go.id/v1/puskesmas/1,2,3,4,5,6?format=geojson');

	curl_setopt($curl_h, CURLOPT_HTTPHEADER,
	    array(
	        'Authorization: WnLlpOaG/HWSiCH81lS9FkYvcff6Su75P63U4XAkbiUI2t1ZNM6BpReR3hAxdkwg',
	    )
	);

	# do not output, but store to variable
	curl_setopt($curl_h, CURLOPT_RETURNTRANSFER, true);

	$response = curl_exec($curl_h);

	print_r($response);
?>