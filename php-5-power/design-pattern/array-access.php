<?php

	// interface ArrayAccess {
	// 	function offsetExists($index);
	// 	function offsetGet($index);
	// 	function offsetSet($index, $new_value);
	// 	function offsetUnset($index);
	// };

	class UserToSocialSecurity implements ArrayAccess {
		// An object which includes database access methods
		private $db;

		function offsetExists($name) {
			return $this->db->userExists($name);
		}

		function offsetGet($name) {
			return $this->db->getUserId($name);
		}

		function offsetSet($name, $id) {
			$this->db->setUserId($name, $id);
		}

		function offsetUnset($name) {
			$this->db->removeUser($name);
		}
 	};

 	$userMap = new UserToSocialSecurity();

 	print "John's ID number is ".$userMap["John"];