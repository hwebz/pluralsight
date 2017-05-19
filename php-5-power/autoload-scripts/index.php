<?php
	if (isset($_GET['page'])) {
		if (!in_array($_GET['page'], array('index', 'products', 'contact', 'about'))) {
			$page = 'index';
		} else {
			$page = $_GET['page'];
		}

		$driver = false;

		switch($page) {
			case 'products':
				if (isset($_GET['cat'])) {
					include 'classes/products.php';
					$driver = new ProductCategory($_GET['cat']);
				}
				break;
			case 'contact':
				include 'classes/contact.php';
				$driver = new Contact();
				break;
			case 'about':
				include 'classes/about.php';
				$driver = new About();
				break;
			case 'index':
			default:
				include 'classes/index.php';
				$driver = new MainPage();
				break;
	 	}

	 	if ($driver) {
	 		$driver->display();
	 	} else {
	 		die('Something is really messed up!');
	 	}
	} else {
 ?>
 <!doctype html>
 <html>
	 <head>
	 	<title>Home page</title>
	 </head>
	 <body>
	 	<ul>
	 		<li><a href="?page=index">Home page</a></li>
	 		<li><a href="?page=products&cat=apple">Products</a></li>
	 		<li><a href="?page=contact">Contact</a></li>
	 		<li><a href="?page=about">About</a></li>
	 	</ul>
	 </body>
 </html>

 <?php 
 	}
 ?>