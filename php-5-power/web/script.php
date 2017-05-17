<?php
	require_once('../../../pear/Crypt/HMAC.php');

	define('SECRET_KEY', 'Professional PHP 5 Programming Example');

	function verify_parameters($array) {
		$data = '';
		$ret = array();

		/* Store the hash in a separate variable and unset the hash from
     	* the array itself (as it was not used in constructing the hash */
     	$hash = $array['hash'];
     	unset($array['hash']);

     	/* Construct the string with our key/value pair */
     	foreach($array as $key => $value) {
     		$data .= $key.$value;
     		$ret[] = "$key=$value";
     	}

     	$h = new Crypt_HMAC(SECRET_KEY, 'md5');
     	if ($hash != $h->hash($data)) {
     		return FALSE;
     	}
     	return TRUE;
	}

	/* We use a static array here, but in real life you would be using
 	* $array = $_GET or similar. */
 	// $array = array(
 	// 	'cause' => 'vars',
 	// 	'hash' => '6a0af635f1bbfb100297202ccd6dce53'
 	// );

 	if (!verify_parameters($_GET)) {
 		die('Dweep! Somebody tampered with our parameters.<br />');
 	} else {
 		echo "Good guys, they didn't touch our stuff!!";
 	}