<?php
	
	/* Include our authentication class  and sanitizing function*/
	require_once 'authentication.php';
	require_once 'sanitize_vars.php';

	/* Define our parameters */
	$sigs = array(
		'email' => array('required' => true, 'type' => 'string', 'function' => 'addslashes'),
		'passwd' => array('required' => true, 'type' => 'string', 'function' => 'addslashes')
	);

	/* Clean up our input */
	sanitize_vars($_POST, $sigs);

	/* Instantiate the Auth class and add the user */
	$a = new Auth();
	$a->addUser($_POST['email'], $_POST['password']);

	/* or... we instantiate the Auth class and validate the user */
	$a = new Auth();
	echo $a->authUser($_POST['email'], $_POST['passwd']) ? 'OK' : 'ERROR';