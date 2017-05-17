<?php
	function create_parameters($array) {
		$data = '';
		$ret = array();

		/* For each variable in the array we a string containing
	     * "$key=$value" to an array and concatenate
	     * $key and $value to the $data string. */
		foreach($array as $key => $value) {
			$data .= $key.$value;
			$ret[] = "$key=$value";
		}

		/* We also add the md5sum of the $data as element
     	* to the $ret array. */
     	$hash = md5($data);
     	$ret[] = "hash=$hash";

     	return join('&amp;', $ret);
	}

	echo '<a href="script.php?'.create_parameters(array('cause' => 'vars')).'">err!</a>';