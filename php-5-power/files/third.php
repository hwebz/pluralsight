<?php 
	/* Set the include path */
	ini_set('include_path', '/etc:/usr/local/etc:.');

	/* Open handle to file */
	$fp = fopen('php.ini', 'r', TRUE);

	/* Read all lines and print them */
	while(!feof($fp)) {
		$line = trim(fgets($fp, 256));
		echo ">$line<<br />";
	}

	/* Close the stream handle */
	fclose($fp);
?>