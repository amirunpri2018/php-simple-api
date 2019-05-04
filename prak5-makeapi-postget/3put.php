<?php
	
	// tangkap method request
	$smethod = $_SERVER['REQUEST_METHOD'];

	echo $smethod;

	if ('PUT' === $smethod) {
	    parse_str(file_get_contents('php://input'), $_PUT);
	    var_dump($_PUT);
	    // echo $_PUT['id'];
	}

	// https://stackoverflow.com/questions/4007969/application-x-www-form-urlencoded-or-multipart-form-data
	// https://dev.to/sidthesloth92/understanding-html-form-encoding-url-encoded-and-multipart-forms-3lpa
?>