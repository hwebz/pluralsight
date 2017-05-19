<?php 
	/*$conn = mysqli_connect('localhost', 'root', '', 'simplecms');
	if (empty($conn)) {
		die("mysqli_connect failed: ".mysqli_connect_error);
	}
	print "connected to ".mysqli_get_host_info($conn)."<br />";
	mysqli_close($conn);*/

	/*$mysqli = new mysqli('localhost', 'root', '', 'simplecms');
	if (mysqli_connect_errno()) {
		die('mysqli_connect failed: '.mysqli_connect_error());
	}
	print 'connected to '.$mysqli->host_info."<br />";
	$mysqli->close();*/

	$mysqli = mysqli_init();
	// $mysqli->options(MYSQLI_INIT_CMD, "SET AUTOCOMMIT=0");
	$mysqli->options(MYSQLI_READ_DEFAULT_FILE, "SSL_CLIENT");
	$mysqli->options(MYSQLI_OPT_CONNECT_TIMEOUT, 5);	
	$mysqli->real_connect('localhost', 'root', '', 'simplecms');
	if (mysqli_connect_errno()) {
		die('mysqli_connect failed: '.mysqli_connect_error());
	}
	print "connected to ".$mysqli->host_info."<br />";

	/*$result = $mysqli->query('SELECT * from articles', MYSQLI_USE_RESULT); // Unbuffered (Buffered -> remove constant)
	while($row = $result->fetch_row()) {
		print $row[1]."<br />";
	}*/

	/*$query = 'SELECT * from articles;';
	$query .= 'SELECT * from users';

	if ($mysqli->multi_query($query)) {
		do {
			if ($result = $mysqli->store_result()) {

				while ($row = $result->fetch_row()) {
					printf("Col: %s<br />", $row[1]);
				}
				$result->close();
			}
		} while ($mysqli->more_results() && $mysqli->next_result());
	}*/

	/*$mysqli->query("CREATE TABLE demo (
			year INTEGER,
			model VARCHAR(50),
			accel REAL
		)");
	$stmt = $mysqli->prepare("INSERT INTO demo VALUES(?, ?, ?)");
	$stmt->bind_param('isd', $year, $model, $accel);

	$year = 2001;
	$model = '156 2.0 Selespeed';
	$accel = 8.6;
	$stmt->execute();

	$year = 2003;
	$model = '147 2.0 Selespeed';
	$accel = 9.3;
	$stmt->execute();

	$year = 2004;
	$model = '156 GTA Sportwagon';
	$accel = 6.3;
	$stmt->execute();*/

	$stmt = $mysqli->prepare('SELECT * FROM demo ORDER BY year');
	$stmt->execute();
	$stmt->bind_result($year, $model, $accel);

	print "<table>";
	print "<tr><th>Model</th><th>0-100 km/h</th></tr>";
	while ($stmt->fetch()) {
		print "<tr><td>$year $model</td><td>$accel</td></tr>";
	}
	print "</table>";

	$mysqli->close();
?>