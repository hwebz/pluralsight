<?php 
	$db = new SQLiteDatabase('./db.db', 0666, &$error) or die("Failed: $error");

	$create_query = "CREATE TABLE document (
						id INTEGER PRIMARY KEY,
						title,
						intro,
						body
					);

					CREATE TABLE dictionary (
						id INTEGER PRIMARY KEY,
						word
					);

					CREATE TABLE lookup (
						document_id INTEGER,
						word_id INTEGER,
						position INTEGER
					);

					CREATE UNIQUE INDEX word ON dictionary(word)";
	$db->query($create_query);

	// Triggers
	$trigger_query = "CREATE TRIGGER index_new
					  AFTER INSERT ON document
					  BEGIN
					  SELECT php_index(new.id, new.title, new.intro, new.body)
					  END;";
	$db->query($trigger_query);

	// User-Defined Functions
	$db->createFunction("php_index", "index_document", 4);
	function normalize($body) {
		$body = strtolower($body);
		$body = preg_replace('/[.;,:!?¿¡\[\]@\(\)]/', ' ', $body);
		$body = preg_replace('/[^a-z0-9 -]/', '_', $body);

		return $body;
	}

	function index_document($id, $title, $intro, $body) {
		global $db;

		$id = $db->singleQuery("SELECT max(id) FROM document");
		$body = substr($body, 0, 32000);
		$body = normalize($body);

		$words = preg_split('@([\W]+)@', $body, -1, PREG_SPLIT_OFFSET_CAPTURE | PREG_SPLIT_NO_EMPTY);
		foreach($words as $word) {
			$safe_word = sqlite_escape_string($word[0]);
			if (!strpos($safe_word, '_') && strlen($safe_word) < 24) {
				$result = @$db->query("INSERT INTO dictionary(word) VALUES ('$safe_word')");
				if ($result != SQLITE_OK) {
					/* already exists, need to fetch the ID then */
					$word_id = $db->singleQuery("SELECT id FROM dictionary WHERE word = '$safe_word'");
				} else {
					$word_id = $db->lastInsertRowId();
				}
				$db->query("INSERT INTO lookup(document_id, word_id, position) VALUES($id, $word_id, {$word[1]}");
			}
 		}
	}
	/* SQLite Query funtions & methods 
		sqlite_query() 				= $sqlite->query()
		sqlite_unbuffered_query() 	= $sqlite->unbufferedQuery()
		sqlite_exec() 				= $sqlite->queryExec()
		sqlite_array_query() 		= $sqlite->arrayQuery()
		sqlite_single_query() 		= $sqlite->singleQuery()
	*/

	/* SQLite fetching data functions & methods
		sqlite_fetch_array() 	= $sqlite->fetch()
		sqlite_fetch_object() 	= $sqlite->fetchObject()
		sqlite_fetch_single() 	= $sqlite->fetchSingle()
		sqlite_fetch_string() 	= $sqlite->fetchSingle()
		sqlite_fetch_all() 		= $sqlite->fetchAll()
	*/

	unset($db);
?>