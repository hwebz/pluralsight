<?php 
	$descs = array(
		0 => array('pipe', 'r'),
		1 => array('file', 'output', 'w'),
		2 => array('file', 'errors', 'w')
	);
	$res = proc_open("php", $descs, $pipes);

	if (is_resource($res)) {
		fputs($pipes[0], '<?php echo "Hello you!<br />"; ?>');
		fclose($pipes[0]);
		proc_close($res);
	}
?>