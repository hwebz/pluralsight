<?php

	class Dog {
		function __construct($name) {
			$this->name = $name;
		}

		function __toString() {
			return $this->name;
		}

		private $name;
	}