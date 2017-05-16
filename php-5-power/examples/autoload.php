<?php
/**
 * Created by PhpStorm.
 * User: ha.do
 * Date: 11/05/2017
 * Time: 18:00
 */
function __autoload($class_name) {
    include_once($class_name."php");
}

$obj = new Person('Jackie');