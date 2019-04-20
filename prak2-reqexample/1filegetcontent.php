<?php

$url = "http://api.jakarta.go.id/v1/puskesmas/1,2,3,4,5?format=geojson";

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

$parsedata = json_decode($file, TRUE);

foreach ($parsedata['features'] as $data) {
	echo '<a href="2detail.php?id='.$data['properties']['id'].'">';
	echo $data['properties']['nama_Puskesmas'];
	echo '</a>';
	echo "<br>";
}

?>