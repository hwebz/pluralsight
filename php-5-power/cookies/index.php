<?php 
	if (isset($_COOKIE['uid']) && $_COOKIE['uid']) {
		?>
<!doctype html>
<html>
	<head>
		<title>Index page</title>
	</head>
	<body>
		Logged in with UID: <?= $_COOKIE['uid'] ?><br />
		<a href="logout.php">Log out</a>
	</body>
</html>
		<?php
	} else {
		/* If no UID is in the cookie, we redirect to the login page*/
		header('Location: login.php');
	}
?>