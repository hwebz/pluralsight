<?php 
	require_once '../../../pear/XML/RSS.php';
	$cache_file = "php.net.rss";
	
	if (!file_exists($cache_file) || filemtime($cache_time) < time() - 86400) {
		copy("http://www.php.net/news.rss", $cache_file);
	}

	$r = new XML_RSS($cache_file);
	$r->parse();

	foreach($r->getItems() as $value) {
		echo strtoupper($value['title'])."<br />";
		echo wordwrap($value['description'])."<br />";
		echo $value['link']."<br />";
	}

	
?>