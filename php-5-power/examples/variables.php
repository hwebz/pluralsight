<?php
/**
 * Created by PhpStorm.
 * User: ha.do
 * Date: 15/05/2017
 * Time: 11:33
 */

$PI = 3.14;
$radius = 5;
$circumference = $PI * 2 * $radius;
$circumference2 = $GLOBALS['PI'] * 2 * $GLOBALS['radius'];

echo $circumference;
echo $circumference2;

$name = "John";
$$name = "Registered user";

echo $name;
echo $John;

if (isset($first_name)) {
    echo $first_name;
}

$arr = array(1, 2, 3);
if (isset($arr[0])) {
    echo $arr[0];
}

if (empty($arr)) {
	echo 'Array is empty';
} else {
	echo 'Array is not empty';
}

// $_GET[]
// $_POST[]
// $_COOKIE[]
// $_ENV[]
// $_SERVER[]