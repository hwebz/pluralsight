<?php 
	
	if (!isset($_POST['register']) || $_POST['register'] != 'Register'){
		header("Location: inputs.php");
	} else {
		?>
			E-mail: <?= $_POST['email'] ?><br />
			Name: <?= $_POST['first_name'] ?> <?= $_POST['last_name'] ?><br />
			Password: <?= $_POST['password'] ?>
		<?php
	}