<?php 
	$db = new SQLiteDatabase("./iterators.db", 0666, &$error) or die("Failed: $error");

	if ($argc < 2) {
		echo "Usage: php search.php <search words>";
		return;
	}

	function escape_word(&$value) {
		$value = sqlite_escape_string($value);
	}

	$search_words = array_splice($argv, 1);
	array_walk($search_words, 'escape_word');
	$words = implode("', '", $search_words);

	$search_query = "SELECT document_id, COUNT(*) AS cnt
					FROM dictionary d, lookup l
					WHERE d.id = l.word_id
						AND word in ('$words')
					GROUP BY document_id
					ORDER BY cnt DESC
					LIMIT 10";

	$doc_ids = array();
	$rank = $db->query($search_query, SQLITE_NUM);
	foreach($rank as $key => $row) {
		$doc_ids[$key] = $row[0];
	}
	$doc_ids = implode(", ", $doc_ids);

	$details_query = "SELECT document_id, substr(doc.body, position - 20, 100)
					FROM dictionary d, lookup l, document doc
					WHERE d.id = l.word_id
						AND word IN ('$words')
						AND document_id IN ($doc_ids)
						AND document_id = doc.id
					GROUP BY document_id, doc.body";
	$result = $db->unbufferedQuery($details_query, SQLITE_NUM);
	while($result->valid()) {
		$record = $result->current();
		$list[$record[0]] = $record[1];
		$result->next();
 	}

 	foreach($rank as $record) {
 		echo $record[0].': '.$list[$record[0]];
 	}

 	/* Result set navigation functions & methods 
		sqlite_seek() = $sqlite->seek()
		sqlite_rewind() = $sqlite->rewind()
		sqlite_next() = $sqlite->next()
		sqlite_prev() = $sqlite->prev()
		sqlite_valid() = $sqlite->valid()
		sqlite_has_more() = $sqlite->valid()
		sqlite_has_prev() = $sqlite->hasPrev()

		sqlite_num_fields() = $sqlite->numFields()
		sqlite_field_name() = $sqlite->fieldName()
		sqlite_num_rows() = $sqlite->numRows()
 	*/
?>