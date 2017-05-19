<?php 
	/* configuration settings */
	$max_photo_size = 50000;
	$upload_required = true;
	$upload_page = 'upload-form.php';
	$upload_dir = realpath(dirname(__FILE__)).'\images\\';

	$error_msg = false;
	do {
		if (!isset($_FILES['book_image'])) {
			$error_msg = 'The form was not sent in completely';
			break;
		} else {
			$book_image = $_FILES['book_image'];
		}

		/* We check for all possible error codes we might get */
		switch($book_image['error']) {
			case UPLOAD_ERR_INI_SIZE:
				$error_msg = "The size of the image is too large, it can not be more than $max_photo_size bytes.";
				break 2;
			case UPLOAD_ERR_PARTIAL:
				$error_msg = "An error occurred while uploading the file, please <a href='$upload_page'>try again</a>";
				break 2;
			case UPLOAD_ERR_NO_FILE:
				if ($upload_required) {
					$error_msg = "You did not select a file to be uploaded, please do so <a href='$upload_page'>here</a>";
				}
				break 2;
			case UPLOAD_ERR_FORM_SIZE:
				$error_msg = "The size was too large according to the MAX_FILE_SIZE hidden field in the upload form.";
			case UPLOAD_ERR_OK:
				if ($book_image['size'] > $max_photo_size) {
					$error_msg = "The size of the image is too large, it can not be more than $max_photo_size bytes.";
				}
				break 2;
			default:
				$error_msg = "An unknown error occurred, please try again <a href='$upload_page'>here</a>.";
		}

		/* Know we check for the mime type to be correct, we allow JPEG and PNG images */
		if (!in_array($book_image['type'], array('image/jpeg', 'image/pjpeg', 'image/png'))){
			$error_msg = "You need to upload a PNG or JPEG image, please do so <a href='$upload_page'>here</a>.";
			break;
		}
	} while (0);

	/* If no error occurred we move the file to our upload directory */
	if(!$error_msg) {
		if(!@move_uploaded_file($book_image['tmp_name'], $upload_dir.$book_image['name'])) {
			$error_msg = 'Error moving the file to its destination, please try again <a href="{$upload_page}">here</a>.';
		}
	}
?>
<!doctype html>
<html>
	<head>
		<title>Upload handler</title>
	</head>
	<body>
		<?php 
			if ($error_msg) {
				echo $error_msg;
			} else {
				?>
					<img src='images/<?= $book_image['name'] ?>' />
				<?php
			}
		?>
	</body>
</html>