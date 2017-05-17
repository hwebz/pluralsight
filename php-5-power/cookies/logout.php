<?php
	setcookie('uid', '', time() - 86400, '/');
	header('location: index.php');