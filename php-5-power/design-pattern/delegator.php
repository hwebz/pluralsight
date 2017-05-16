<?php

	class HelloWorld {
		function display($count) {
			for ($i = 0; $i < $count; $i++) {
				print "Hello, World<br />";
			}
			return $count;
		}
	}

	class HelloWorldDelegator {
		function __construct() {
			$this->obj = new HelloWorld();
		}

		function __call($method, $args) {
			return call_user_func_array(array($this->obj, $method), $args);
		}

		private $obj;
	}

	$obj = new HelloWorldDelegator();
	print $obj->display(3);