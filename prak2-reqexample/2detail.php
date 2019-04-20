<?php
	$id = $_GET['id'];

	$url = "http://api.jakarta.go.id/v1/puskesmas/".$id."?format=geojson";

	// Create a stream
	$opts = array(
	  'http'=>array(
	    'method'=>"GET",
	    'header'=>"Authorization: ljLu2zZ5/QYExUMVGhIKeo18l9nBrMKwngvys6GF27OLa4JcIDcqou0tgzeJcPCP"
	  )
	);

	$context = stream_context_create($opts);

	// Open the file using the HTTP headers set above
	$file = file_get_contents($url, false, $context);

	// print_r($file);


?>

<iframe src="http://cctv.balitower.co.id:80/Bangka-004-705098_3/embed.html" style="width: 50%;height: 50%"></iframe>