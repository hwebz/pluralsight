<?php 
	$sx1 = simplexml_load_file('test1.xml');

	$string = <<<XML
<?xml version='1.0'?>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
  <head>
    <title>XML Example</title>
  </head>
  <body background="bg.png">
    <p>
      Moved to <a href="http://example.org/">example.org<a>.
    </p>
    <pre>
      foo
    </pre>
    <p>
      Moved to <a href="http://example.org/">example.org</a>.
    </p>
  </body>
</html>

XML;

	$sx2 = simplexml_load_string($string);
	$sx3 = simplexml_load_dom(new DomDocument());

	foreach($sx2->body->p as $p) {

	}

	echo $sx->body->p[1];
	echo $sx->body['background'];
	echo strip_tags($sx->body->p[1]->asXML())."<br />";

	foreach($sx->body->children() as $element) {
		/* do something with the element */
	}

	foreach($sx->body->p[0]->a->attributes() as $attribute) {
		echo $attribute."<br />";
	}

	file_put_contents('filename.xml', $sx2->asXML());
?>