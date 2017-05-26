<?php 
	$fp = popen('ls -l /', 'r');
	while(!foef($fp)) {
		echo fgets($fp);
	}
	pclose($fp);
?>