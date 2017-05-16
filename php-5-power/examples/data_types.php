<?php 
	$str = "A";
	$str{2} = "d";
	$str{1} = "n";
	$str = $str."i";
	echo $str;

	$players = array("John", "Barbara", "Bill", "Nancy");

	print 'The players are:<br />';
	foreach($players as $key => $value) {
		print "#$key = $value<br />";
	}

	$people = array(1 => array(
		"name" => "John",
		"age" => 20
	), array(
		"name" => "Barbara",
		"age" => 67
	));

	foreach($people as &$person) {
		if ($person["age"] >= 35) {
			$person["age group"] = "Old";
		} else {
			$person["age group"] = "Young";
		}
	}

	print_r($people);

	// have to use with each()
	reset($players);
	while (list($key, $val) = each($players)) {
		print "#$key = $val<br />";
	}

	$ages = array("John" => 28, "Barbara" => 67);
	reset($ages);
	$person = each($ages);
	print $person['key'];
	print ' is of age ';
	print $person['value'];

	define("MY_OK", 0);
	define("MY_ERROR", 1);
	$error_code = 1;
	if ($error_code == MY_ERROR) {
		print("There was an error</br >");
	}

	$name = "Judy";
	$name_alias =& $name;
	$name_alias = "Jonathan";
	echo $name;

	function say_hello() {
		echo 'Hello world!';
	}

	$greet =& say_hello();
	$greet;