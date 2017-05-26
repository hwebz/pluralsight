<?php 
	/* pear install DB */
	require_once '../../../../pear/DB.php';

	// PEAR::setErrorHandling(PEAR_ERROR_DIE, "%s<br />");
	$dbh = DB::connect("mysql://root@localhost/simplecms");

	if (DB::isError($dbh)) {
		print "Connect failed!<br />";
		print "Error message: ".$dbh->getMessage()."<br />";
		print "Error details: ".$dbh->getUserInfo()."<br />";
		exit(1);
	}
	print "Connect ok!<br />";

	/*$result = $dbh->query("SELECT * FROM articles");
	while($result->fetchInto($row)) {
		print "$row[1]<br />";
	}*/

	/*$from = isset($_GET['from']) ? (int) $_GET['from'] : 0;
	$show = isset($_GET['show']) ? (int) $_GET['show'] : 0;
	$from = $from ? $from : 0;
	$show = $show ? $show : 10;
	$result = $dbh->limitQuery("SELECT * from articles", $from, $show);
	while($result->fetchInto($row)) {
		print "$row[0] ($row[1])<br />";
	}*/

	/*$changes = array(
		array(154351, "Trondheim"),
		array(521886, "Oslo"),
		array(112405, "Stavanger"),
		array(237430, "Bergen"),
		array(103313, "Berum")
	);
	$sth = $dbh->prepare("UPDATE articles SET article_title = ? WHERE article_id = ?");
	foreach($changes as $data) {
		$dbh->execute($sth, $data);
		printf("%s: %d row(s) changed<br />", $data[1], $dbh->affectedRows());
	}*/

	// $dbh->simpleQuery("CREATE TABLE foobar (foo INT, bar INT)");

	/* 	DB_FETCHMODE_ORDERED -> Default
		DB_FETCHMODE_ASSOC
		DB_FETCHMODE_OBJECT
	*/
	// for global connection
	// $dbh->setFetchMode(DB_FETCHMODE_ASSOC);

	// for specific result set
	// $row = $result->fetchRow(DB_FETCHMODE_OBJECT); // $result->fetchInto($row, DB_FETCHMODE_OBJECT);

	/*class MyResultClass {
		public $row_data;
		function __construct($data) {
			$this->row_data = $data;
		}

		function __get($variable) {
			return $this->row_data[$variable];
		}
	}

	$dbh->setFetchMode(DB_FETCHMODE_OBJECT, "MyResultClass");
	$result = $dbh->query("SELECT * FROM articles");
	while($row = $result->fetchRow()) {
		print $row->article_id.": ".$row->article_title." - ".$row->article_content."<br />";
	}*/

	/*$dbh->query("CREATE TABLE foo (myid INTEGER)");
	$next = $dbh->nextId("foo");
	$dbh->query("INSERT INTO foo VALUES(?)", $next);
	$next = $dbh->nextId("foo");
	$dbh->query("INSERT INTO foo VALUES(?)", $next);
	$next = $dbh->nextId("foo");
	$dbh->query("INSERT INTO foo VALUES(?)", $next);
	$result = $dbh->query("SELECT * FROM foo");
	while($result->fetchInto($row)) {
		print "$row[0]<br />";
	}
	$dbh->query("DROP TABLE foo");
	// $dbh->dropSequence("foo");*/

	/*$dbh->setOption('portability', DB_PORTABILITY_ERRORS);
	$dbh->query("CREATE TABLE mypets (name CHAR(15), species CHAR(15)");
	$dbh->query("CREATE UNIQUE INDEX mypets_idx ON mypets (name, species)");

	$data = array("Bill", "Mule");

	for($i = 0; $i < 2; $i++) {
		$result = $dbh->query("INSERT INTO mypets VALUES(?, ?)", $data);
		if (DB::isError($result) && $result->getCode() == DB_ERROR_CONSTRAINT) {
			print "Already have a $data[1] called $data[0]!<br />";
		}
	}

	$dbh->query("DROP TABLE mypets");*/

	$data = $dhb->getRow("SELECT * FROM articles where article_id = ?", array($_GET['article_id']));
	$article_titles = $dbh->getCol("SELECT article_title FROM articles"); // with <th> markup
	$data = $dbh->getAssoc("SELECT * FRO articles", false, null, DB_FETCHMODE_ORDERED, true); // first col as KEY, remain cols as VALUE
	$data = $dbh->getAll("SELECT * FROM articles WHERE article_id = ?", array($_GET['id']), DB_FETCHMODE_ASSOC);
?>