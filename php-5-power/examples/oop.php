<?php
/**
 * Created by PhpStorm.
 * User: ha.do
 * Date: 11/05/2017
 * Time: 12:01
 */

class Person {
    var $name;
    function getName() {
        return $this->name;
    }

    function setName($name) {
        $this->name = $name;
        return $this;
    }

    function Person($name) {
        $this->setName($name);
    }
}

function changeName($person, $name) {
    $person->setName($name);
}

$person = new Person('Andi');
changeName($person, 'Stig');
print $person->getName();

if ($person instanceof Person) {
    echo '<br />$person is a person';
}

class MyClass {
    private $id = 18;
    const SUCCESS = 'Success';
    const FAILURE = 'FAILURE';

    function __construct($id) {
        $this->setId($id);
        print "Object initialized";
    }

    function __destruct() {
        print "Object destroyed";
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function getId() {
        return $this->id;
    }

    final function getBaseClassName() {
        return __CLASS__;
    }

    static function helloWorld() {
        print "Hello, world";
    }
}

interface Display {
    function display();
}

class Circle implements Display {
    function display() {
        print "Displaying circle\n";
    }
}

final class FinalClass {

}
/*
class BogusClass extends FinalClass {

}*/

$my = new MyClass(12);
$my_copy = clone $my;
$my_copy->setId(18);
echo '<br />'.$my->getId();
echo '<br />'.$my_copy->getId();
print $my::SUCCESS;
print $my::helloWorld();

class Singleton {
    static private $instance = NULL;

    private function __construct()
    {
    }

    static public function getInstance() {
        if (self::$instance == NULL) {
            self::$instance = new Singleton();
        }
        return self::$instance;
    }
}

abstract class MyBaseClass {
    function display() {
        print "Default display routine being called";
    }

    abstract function show();
}

function showInform(Person $person) {
    print '$person is Person';
}

print $person->setName('Micheal')->getName();

$obj = new MyInteratorImplementation();
foreach($obj as $value) {
    print $value;
}

foreach($array as $value) {
    if ($value === 'NULL') {
        $value = NULL;
    }
}

function my_func(&$arg = null) {
    if ($arg === NULL) {
        print '$arg is empty';
    }
}

my_func();