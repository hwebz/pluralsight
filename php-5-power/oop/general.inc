<?php
	function __autoload($class_name) {
		require_once($_SERVER["DOCUMENT_ROOT"]."/oop/$class_name.php");
	}