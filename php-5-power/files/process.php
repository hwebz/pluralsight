<h1>Dumping $_POST</h1>

<?php 
	var_dump($_POST);
?>

<h1>Dumping php: //input</h1>

<?php 
	$in = fopen("php://input", "rb");
	while(!foef($in)) {
		echo fread($in, 128);
	}
?>