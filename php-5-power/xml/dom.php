<?php 
	/*$dom = new DomDocument();
	$dom->load('test1.xml');
	$root = $dom->documentElement;
	$body = $root->getElementsByTagName('body')->item(0);
	echo $body->getAttributeNode('background')->value."<br />";

	process_children($root);

	function process_children($node) {
		$children = $node->childNodes;

		foreach($children as $elem) {
			if ($elem->nodeType == XML_TEXT_NODE) {
				if (strlen(trim($elem->nodeValue))) {
					echo trim($elem->nodeValue)."<br />";
				}
			} else if ($elem->nodeType == XML_ELEMENT_NODE) {
				if ($elem->nodeName == 'body') {
					echo $elem->getAttributeNode('background')->value."<br />";
				}
				process_children($elem);
			}
		}
	}

	// XPATH
	$xpath = new DomXPath($dom);
	$nodes = $xpath->query("*[local-name()='body']", $dom->documentElement);
	echo $nodes->item(0)->getAttributeNode('background')->value."<br />";*/

	// DOM Tree
	$dom = new DomDocument();
	$html = $dom->createElement('html');
	$html->setAttribute('xmlns', 'http://www.w3.org/1999/xhtml');
	$html->setAttribute('xml:lang', 'en');
	$html->setAttribute('lang', 'en');

	$head = $dom->createElement('head');
	$title= $dom->createElement('title');
	$title->appendChild($dom->createTextNode("XML Example"));

	$body = $dom->createElement('body');
	$body->setAttribute('background', '#fc3');
	$html->appendChild($body);

	$p = $dom->createElement('p');

	$text = $dom->createTextNode("Moved to ");
	$p->appendChild($text);

	$a = $dom->createElement('a');
	$a->setAttribute('href', 'http://example.com');
	$a->appendChild($dom->createTextNode('example.com'));
	$p->appendChild($a);

	$text = $dom->createTextNode('.');
	$p->appendChild($text);

	$br = $dom->createElement('br');
	$p->appendChild($br);

	$text = $dom->createTextNode('foo & bar');
	$p->appendChild($text);
	
	$body->appendChild($p);
	$head->appendChild($title);
	$html->appendChild($head);
	$html->appendChild($body);
	$dom->appendChild($html);

	echo $dom->saveXML();
?>