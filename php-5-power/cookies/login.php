<?php 
	ob_start();

	function check_auth($email, $password) {
		if ($email == 'admin' && $password == 'admin') return 'abcdefghijklm';
		return '';
	}

	if(isset($_COOKIE['uid']) && $_COOKIE['uid']) header('Location: index.php');
?>
<!doctype html>
<html>
	<head>
		<title>Login</title>
	</head>
	<body>
		<?php
			if (isset($_POST['login']) && $_POST['login'] == 'Log in') {
				$uid = check_auth($_POST['email'], $_POST['password']);
				if ($uid) {
					/* User successfully logged in, setting cookie */
					setcookie('uid', $uid, time() + 14400, '/');
					header('Location: index.php');
					exit();
				}
			} else {
				?>
				<h1>Login</h1>
				<form action="login.php" method="post">
					<table>
						<tr>
							<td>Email address:</td>
							<td>
								<input type="text" name="email" />
							</td>
						</tr>
						<tr>
							<td>Password:</td>
							<td>
								<input type="password" name="password" />
							</td>
						</tr>
						<tr>
							<td colspan="2">
								<input type="submit" name="login" value="Log in" />
							</td>
						</tr>
					</table>
				</form>
				<?php
			}
		?>
	</body>
</html>