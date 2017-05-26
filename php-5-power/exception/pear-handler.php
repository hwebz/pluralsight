<?php 
	require_once '../../../pear/PEAR.php';

	class Luck extends PEAR {
		function testLuck() {
			if (rand(0, 1)) {
				return $this->throwError('tough luck!');
			}
			return 'lucky!';
		}
	}

	$luck = new Luck();
	$test = $luck->testLuck();
	if(PEAR::isError($test)) {
		die($test->getMessage()."<br />");
	}
	print $test."<br />";
?>