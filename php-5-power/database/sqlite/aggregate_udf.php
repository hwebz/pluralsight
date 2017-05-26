<?php 
	
	$db = new SQLiteDatabase("./aggregate.db", 0666, &$error) or die("Failed: $error");

	function average_length_step(&$ctxt, $string) {
		if (!isset($ctxt['count'])) {
			$ctxt['count'] = 0;
		}
		if (!isset($ctxt['length'])) {
			$ctxt['length'] = 0;
		}

		$ctxt['count']++;
		$ctxt['length'] += strlen($string);
	}

	function average_length_finalize(&$ctxt) {
		return sprintf("Avg. over {$ctxt['count']} words is %.3f chars.", $ctxt['length'] / $ctxt['count']);
	}

	$db->createAggregate('average_length', 'average_length_step', 'average_length_finalize');

	$avg = $db->singleQuery("SELECT average_length(word) FROM dictionary");
	echo $avg;
 ?>