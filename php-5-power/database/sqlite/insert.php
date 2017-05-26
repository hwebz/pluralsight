<?php 
	$db = new SQLiteDatabase('./db.db', 0666, &$error) or die("Failed: $error");

	$body = file_get_contents($argv[1]);
	$mails = preg_split('/^From /m', $body);
	unset($body);

	// $db->quiery("BEGIN");
	foreach($mails as $id => $mail) {
		$safe_mail = sqlite_escape_string($mail);
		$insert_query = "INSERT INTO document(title, intro, body) VALUES ('Title', 'This is an intro', '{$safe_mail}')";
		echo "Indexing mail #$id.<br />";
		$db->query($insert_query);
	}
	$db->query("COMMIT");

	if ($argc < 2) {
		echo "Usage: php insert.php <filename>";
		return;
	}
?>