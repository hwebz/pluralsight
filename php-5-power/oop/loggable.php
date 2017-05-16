<?php

	interface Loggable {
		function logString();
	}

	final class Person implements Loggable {
		private $id, $name, $address, $age;
		function logString() {
			return "class Person: name = $this->name, ID = $this->id<br />";
		}
		final function idGenerator() {
			return $this->id;
		}
	}

	final class Product implements Loggable {
		private $name, $price, $expiryDate;
		function logString() {
			return "class Product: name = $this->name, price = $this->price<br />";
		}

		function __toString() {
			return "toString() method in Product class<br />";
		}
	}

	function MyLog($obj) {
		if ($obj instanceof Loggable) {
			print $obj->logString(); 
		} else {
			print "Error: Object doesn't support Loggable interface<br />";
		}
	}

	function MyLogWithStrictType(Loggable $obj) {
		print $obj->logString();
	}

	$person = new Person();
	$product = new Product();
	print $product;
	MyLog($person);
	MyLog($product);

	try {
		MyLogWithStrictType(NULL);
	} catch (Exception $e) {
		print $e;
	}