<?php 
	/* Initialize variables */
	$level = 0;
	$char_data = '';

	/* Create the parser handle */
	$xml = xml_parser_create('UTF-8');

	/* Set the handlers */
	xml_set_element_handler($xml, 'start_handler', 'end_handler');
	xml_set_character_data_handler($xml, 'character_handler');

	/* Start parsing the whole file in one run */
	xml_parse($xml, file_get_contents('test.xhtml'));
	/* FUNCTIONS */

	/* Flushes collected data from the character handler */
	function flush_data() {
		global $level, $char_data;
		/* Trim data and dump it when there is data */
		$char_data = trim($char_data);
		if(strlen($char_data) > 0) {
			echo "<br />";
			// Wrap it nicely, so that it fits on a terminal screen
			$data = split("<br />", wordwrap($char_data, 76 - ($level * 2)));
			foreach($data as $line) {
				echo str_repeat(' ', $level + 1, "[".$line."]<br />");
			}
		}
		/* Clear the data in the buffer */
		$char_data = '';
	}

	/* Handler for start tags */
	function start_handler($xml, $tag, $attributes) {
		global $level;

		/* Flush collected data from the character handler */
		flush_data();

		/* Dump attributes as a string */
		echo "<br />".str_repeat(' ', $level)."$tag";
		foreach($attributes as $key => $value) {
			echo "$key='$value'";
		}
		/* Increase indentation level */
		$level++;
	}

	function end_handler($xml, $tag) {
		global $level;

		/* Flush collected data from the character handler */
		flush_data();

		/* Decrease indentation level and print end tag */
		$level--;
		echo "<br />".str_repeat(' ', $level)."/$tag";
	}

	function character_handler($xml, $data) {
		global $level, $char_data;

		/* Add the character data to the buffer */
		$char_data .= ' '.$data;
	}
?>