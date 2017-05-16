<?php
	abstract class Shape {
		function setCenter($x, $y) {
			$this->x = $x;
			$this->y = $y;
		}

		abstract function draw();
		protected $x, $y;
	}

	class Square extends Shape {
		function draw() {
			print "Drawing a square<br />";
		}
	}

	class Circle extends Shape {
		function draw() {
			print "Drawing a cirlce<br />";
		}
	}

	$square = new Square();
	$circle = new Circle();
	$square->draw();
	$circle->draw();