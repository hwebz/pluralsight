<?php
	class Auth {
		function Auth() {
			mysql_connect('localhost', 'user', 'password');
			mysql_select_db('my_own_bookshop');
		}

		public function addUser($email, $passwood) {
			$q = 'INSERT INTO users(email, password) VALUES ("'.$email.'", "'.sha1($password).'")';
			mysql_query($q);
		}

		public function authUser($email, $password) {
			$q = 'SELECT * FROM users WHERE email="'.$email.'" AND passwd="'.$password.'"';
			$r = mysql_query($q);

			if (mysql_num_rows($r) == 1) {
				return TRUE;
			}
			return FALSE;
		}
	}

	