<?php
	
	$db->query("CREATE VIEW document_id_body AS
				SELECT id, body FROM document");
?>