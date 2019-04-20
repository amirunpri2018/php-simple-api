<?php
	$url = 'http://api.jakarta.go.id/v1/puskesmas/1,2,3,4,5,6?format=geojson';

	$context = stream_context_create(array(
	    'http' => array(
	        'method' => 'GET',
	        'header' => 'Authorization: WnLlpOaG/HWSiCH81lS9FkYvcff6Su75P63U4XAkbiUI2t1ZNM6BpReR3hAxdkwg',
	    )
	));

	$resp = file_get_contents($url, FALSE, $context);
	print_r($resp);
?>