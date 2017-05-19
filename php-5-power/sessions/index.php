<?php 
	include 'session.inc';

	if (!isset($_SESSION['uid']) || !$_SESSION['uid']) {
		/* If no UID is in the cookie, we redirect to the login page */
		header('Location: ./login.php');
	}
?>
<!doctype html>
<html>
	<head>
		<title>Dashboard</title>
	</head>
	<body>
		<p>Welcome to dashboard</p>
		<a href="logout.php">Logout</a>
	</body>
</html>