<?php
	
	// tangkap method request
	$smethod = $_SERVER['REQUEST_METHOD'];

	// echo $smethod;

	// var_dump(file_get_contents('php://input'));

	if ('DELETE' === $smethod) {
	    parse_str(file_get_contents('php://input'), $_DELETE);
	    var_dump($_DELETE);
	    // echo $_DELETE['id'];
	}
?>