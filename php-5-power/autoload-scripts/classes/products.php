<?php 
	
	class ProductCategory {
		public $cat;

		function __construct($cat) {
			$this->cat = $cat;
		}

		public function display() {
			echo "<h1>Product page of $this->cat</h1>";
		}
	}