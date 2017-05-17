<?php
	require_once('../../../pear/Crypt/HMAC.php');

	/* The RFC recommends a key size larger than the output hash
 	* for the hash function you use (16 for md5() and 20 for sha1()). */
 	define('SECRET_KEY', 'Professional PHP 5 Programming Example');

 	function create_parameters($array) {
 		$data = '';
 		$ret = array();

 		/* Construct the string with our key/value pairs */
	    foreach ($array as $key => $value) {
	        $data .= $key . $value;
	        $ret[] = "$key=$value";
	    }

	    $h = new Crypt_HMAC(SECRET_KEY, 'md5');
	    $hash = $h->hash($data);
	    $ret[] = "hash=$hash";

	    return join('&amp;', $ret);
 	}

 	echo '<a href="script.php?'.create_parameters(array('cause' => 'vars')).'">err!</a>';