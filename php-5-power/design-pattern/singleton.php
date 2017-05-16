<?php
	
	class Logger {
		static function getInstance() {
			if (self::$instance == null) {
				self::$instance = new Logger();
			}
			return self::$instance;
		}

		private function __consutruct() {

		}

		private function __clone() {

		}

		function Log($str) {
			// Take care of logging
			print $str.'<br />';
		}

		static private $instance = NULL;
	}

	Logger::getInstance()->Log("Checkpoint");