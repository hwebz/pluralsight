<!doctype html>
<html>
	<head>
		<title>File Uploads</title>
	</head>
	<body>
		<form action="handle_img.php" method="post" enctype="multipart/form-data">
			<input type="hidden" name="MAX_FILE_SIZE" value="1600000" />
			Send this file: <input name="book_image" type="file" /><br />
			<input type="submit" value="Upload">
		</form>
	</body>
</html>