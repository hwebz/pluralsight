<?php 
	require_once '../../../pear/XML/Tree.php';

	/* Create the document and the root node */
	$dom = new XML_Tree;
	$html =& $dom->addRoot('html', '', array(
		'xmlns' => 'http://www.w3.org/1999/xhtml',
		'xml:lang' => 'en',
		'lang' => 'en'
	));

	/* Create head and title element */
	$head =& $html->addChild('head');
	$title =& $head->addChild('title', 'XML Example');

	/* Create the body and p elements */
	$body =& $html->addChild('body', '', array('background' => '#f3c'));
	$p =& $body->addChild('p');

	/* Add the "Moved to" */
	$p->addChild(NULL, "Moved to ");

	/* Add the a */
	$p->addChild('a', 'example.org', array('href' => 'http://example.com'));

	/* Add the ".", br and "foo & bar" */
	$p->addChild(NULL, ".");
	$p->addChild('br');
	$p->addChild(NULL, "foo & bar");

	/* Dump the representation */
	$dom->dump();
?>