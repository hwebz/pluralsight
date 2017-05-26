<?php 
	/* Open a file in read/write mode and binary mode, and place
		the stream pointer at the beginning of the stream. */
	$fp = fopen('/tmp/tempfile', 'rb+');

	/* Try to read a block of 4096 bytes from the file */
	$block = fread($fp, 4096);

	/* Write that same block of data to the steam again
	 just after the first one */
 	fwrite($fp, $block);

	/* Close the stream */
	fclose($fp);
?>