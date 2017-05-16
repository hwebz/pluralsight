<?php
	
	class StrictCoordinateClass {
		private $arr = array("x" => NULL, "y" => NULL);

		function __get($property) {
			if (array_key_exists($property, $this->arr)) {
				return $this->arr[$property];
			} else {
				print "Error: Can't read a property other than x & y<br />";
			}
		}

		function __set($property, $value) {
			if (array_key_exists($property, $this->arr)) {
				$this->arr[$property] = $value;
			} else {
				print "Error: Can't write a property other than x & y<br />";
			}
		}
	}

	$obj = new StrictCoordinateClass();

	$obj->x = 1;
	print $obj->x."<br />";

	$obj->n = 2;
	print $obj->n;