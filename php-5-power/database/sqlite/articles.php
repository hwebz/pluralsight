<?php 
	
	$db = new SQLiteDatabase("./articles.db", 0666, &$error) or die("Failed: $error");

	class Article {
		private $id;
		private $title;
		private $intro;
		private $body;
		private $fromDb;

		function save($db) {
			$intro = sqlite_escape_string($this->intro);
			$db->query("UPDATE document SET intro = '$intro' WHERE id = {$this->id}");
		}
	}

	$result = $db->query("SELECT * FROM document WHERE body LIKE '%conf%'");
	$obj1 = $result->fetchObject('Article', NULL);
	$obj1->intro = "This is a changed intro";
	$obj1->save($db);

?>