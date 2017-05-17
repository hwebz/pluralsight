<?php 

	if (!isset($_GET['prod_id'])) {
		die("Error, product ID was not set");
	}
	$product_id = (int) $_GET['prod_id'];