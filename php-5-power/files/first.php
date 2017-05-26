<?php 
	/* Open a file */
	$fp = fopen('data.dat', 'r');
	if (!$fp) {
		die("The file could not be opened.");
	}

	/* Read a line from the file */
	$line = fgets($fp);

	/* Close the file handle */
	fclose($fp);
?>