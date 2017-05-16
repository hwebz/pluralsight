<?php 

	class Color {
		const RED = "Red";
		const GREEN = "Green";
		const BLUE = "Blue";

		function print_blue() {
			print self::BLUE."<br />";
		}
	}

	class Person {
		public $id;
		private $name;
		public $age = 23;
		protected $sex = true;
		private $address = "Vietnam";
		static $job = "Software Developer";
		static $counter = 0;
		const NAME = "Ancestor";
		public $class_name = __CLASS__;

		function __construct($name) {
			self::$counter++;
			$this->id = self::$counter;
			$this->setName($name);
			print "In ".self::NAME." constructor<br />";
			print "An object of ".$this->class_name." has been created.<br />";
		}

		function setName($name) {
			$this->name = $name;
		}

		function getName() {
			return $this->name;
		}

		public function setAge($age) {
			$this->age = $age;
		}

		protected function getAge() {
			return $this->age;
		}

		private function detect_address() {
			return $this->address == "Vietnam" ? true : false;
		}

		function print_job() {
			print self::$job."<br />";
		}

		static function print_new_line() {
			print "<br />";
		}

		static function print_counter() {
			print self::$counter;
			self::print_new_line();
		}

		function __clone() {
			$this->name = "CLONED OBJECT: ".$this->name;
		}

		protected function do_action() {
			print "A Person will do action depends on what type of person<br />";
		}

		function __destruct() {
			print "An object of type Person is being destroyed<br />";
		}
	};

	class Baby extends Person {
		const NAME = "Child";
		public $class_name = __CLASS__;

		function __construct($name) {
			parent::__construct($name);
			print "In ".self::NAME." constructor<br />";
			print "An object of ".$this->class_name." has been created.<br />";
		}
		public function do_action() {
			print $this->getName()." is doing an action<br />";
		}
	}

	$judy = new Person("Juddy");
	$judy->setName("Judy");

	$joe = new Person("John");
	$joe->setName("Joe");

	print $judy->id.". ".$judy->getName()."<br />";
	print $joe->id.". ".$joe->getName()."<br />";
	print Person::$job."<br />";
	$judy->print_job();
	Person::print_counter();

	print Color::RED."<br />";

	$jackie = clone $judy;
	print $jackie->id.". ".$jackie->getName()."<br />";

	$cony = new Baby("Cony");
	$cony->do_action();
	if ($cony instanceof Person) print '$cony obj is an instance of Person class<br />';