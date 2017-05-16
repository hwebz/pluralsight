<?php
	
	class NullHandleException extends Exception {
		function __construct($message) {
			parent::__construct($message);
		}
	}

	function printObject($obj) {
		if ($obj == NULL) {
			throw new NullHandleException("printObject received NULL object.");
		}
		print $obj."<br />";
	}

	class MyName {
		function __construct($name) {
			$this->name = $name;
		}

		function __toString() {
			return $this->name;
		}

		private $name;
	}

	try {
		printObject(new MyName("Bill"));
		printObject(NULL);
		printObject(new MyName("Jane"));
	} catch(NullHandleException $e) {
		print $e->getMessage();
		print " in file ".$e->getFile();
		print " on line ".$e->getLine()."<br />";
	} catch (Exception $e) {
		// This won't be reached
	}