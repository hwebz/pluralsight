<?php 
	include 'template/list-parts.tpl.php';
	$list = array(
		'Andi' => 'Tel Aviv',
		'Derik' => 'Skien',
		'Stig' => 'Trondheim'
	);

	$items = '';
	foreach($list as $name => $city) {
		$items .= str_replace(
			array('{name}', '{city}'),
			array($name, $city), $item
		);
	}

	$tpl = array();
	$tpl['title'] = "List with names";
	$tpl['description'] = "This list shows names and the cities";
	$tpl['content'] = $header.$items.$footer;

	include 'template/template.tpl';
?>