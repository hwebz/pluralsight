<?php 
	$conn = mysqli_connect('localhost', 'root', '', 'simplecms');

	/*$conn->query("CREATE TABLE files (
		id INTEGER PRIMARY KEY AUTO_INCREMENT,
		data BLOB
	)");
	$stmt = $conn->prepare("INSERT INTO files VALUES(NULL, ?)");
	$stmt->bind_param('b', $data);

	$file = "test.jpg";
	$fp = fopen($file, "r");
	$size = 0;
	while($data = fread($fp, 8192)) {
		$size += strlen($data);
		$stmt->send_long_data(0, $data);
	}
	fclose($fp);

	// $data = file_get_contents("test.jpg");

	if ($stmt->execute()) {
		print "$file ($size bytes) was added to the files table<br />";
	} else {
		die($conn->error);
	}*/

	if (empty($_GET['id'])) {
		$result = $conn->query('SELECT id, length(data) FROM files LIMIT 20');
		if ($result->num_rows == 0) {
			print "No images!<br />";
			print "<a href='mysqli_blob1.php'>Click here to add one</a>";
			exit;
		}
		while($row = $result->fetch_row()) {
			print "<a href='$_SERVER[PHP_SELF]?id=$row[0]'>image $row[0] ($row[1] bytes)</a><br />";
		}
		exit;
	}

	$stmt = $conn->prepare('SELECT data FROM files WHERE id = ?');
	$stmt->bind_param('i', $_GET['id']);
	$stmt->execute();
	$data = null;
	$stmt->bind_result($data);
	if(!$stmt->fetch()) {
		die("No such image!");
	}
	header("Content-type: image/jpeg");
	print $data;
?>