<?php

	abstract class User {
		
		function __construct($name) {
			$this->name = $name;
		}

		function getName() {
			return $this->name;
		}

		// Permission methods
		function hasReadPermission() {
			return true;
		}

		function hasModifyPermission() {
			return false;
		}

		function hasDeletePermission() {
			return false;
		}

		// Customization methods
		function wantsFlashInterface() {
			return true;
		}

		protected $name = NULL;
	}

	class GuestUser extends User {

	}

	class CustomerUser extends User {
		function hasModifyPermission() {
			return true;
		}
	}

	class AdminUser extends User {
		function hasModifyPermission() {
			return true;
		}

		function hasDeletePermission() {
			return true;
		}

		function wantsFlashInterface() {
			return false;
		}
	}

	class UserFactory {
		private static $users = array(
			"Andi" => "admin",
			"Stig" => "guest",
			"Derick" => "customer"
		);

		static function Create($name) {
			if (!isset(self::$users[$name])) {
				// Error out because the user doesn't exist
				return;
			}

			switch(self::$users[$name]) {
				case "guest": return new GuestUser($name);
				case "customer": return new CustomerUser($name);
				case "admin": return new AdminUser($name);
				default: return;
			}
		}
	}

	function boolToStr($b) {
		if ($b) {
			return "Yes<br />";
		} else {
			return "No<br />";
		}
	}

	function displayPermissions(User $obj) {
		print $obj->getName()."'s permissions:<br />";
		print "Read: ".boolToStr($obj->hasReadPermission());
		print "Modify: ".boolToStr($obj->hasModifyPermission());
		print "Delete: ".boolToStr($obj->hasDeletePermission()); 
	}

	function displayRequirements(User $obj) {
		if ($obj->wantsFlashInterface()) {
			print $obj->getName()." requires Flash\n";
		}
	}

	$logins = array("Andi", "Stig", "Derick");

	foreach($logins as $login) {
		displayPermissions(UserFactory::Create($login));
		displayRequirements(UserFactory::Create($login));
	}