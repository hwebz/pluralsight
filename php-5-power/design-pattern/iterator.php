<?php

	class MyClass {
		public $name = "John";
		public $sex = "male";
	}

	$obj = new MyClass();
	foreach($obj as $key => $value) {
		print "obj[$key] = $value<br />";
	}

	class NumberSquaredIterator implements Iterator {
		// public function __construct($start, $end) {
		public function __construct($obj) {
			// $this->start = $start;
			// $this->end = $end;
			$this->obj = $obj;
		}

		public function rewind() {
			// $this->cur = $this->start;
			$this->cur = $this->obj->getStart();
		}

		public function key() {
			return $this->cur;
		}

		public function current() {
			return pow($this->cur, 2);
		}

		public function next() {
			$this->cur++;
		}

		public function valid() {
			// return $this->cur <= $this->end;
			return $this->cur <= $this->obj->getEnd();
		}

		// private $start, $end;
		private $cur, $obj;
 	}

 	// $obj = new NumberSquaredIterator(3, 9);
 	// foreach($obj as $key => $value) {
 	// 	print "The square of $key is $value<br />";
 	// }

 	class NumberSquare implements IteratorAggregate {
 		public function __construct($start, $end) {
 			$this->start = $start;
 			$this->end = $end;
 		}

 		public function getIterator() {
 			return new NumberSquaredIterator($this);
 		}

 		public function getStart() {
 			return $this->start;
 		}

 		public function getEnd() {
 			return $this->end;
 		}

 		private $start, $end;
 	}

 	$obj = new NumberSquare(3, 9);
 	foreach($obj as $key => $value) {
 		print "The square of $key is $value<br />";
 	}