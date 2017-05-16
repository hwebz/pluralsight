<?php
	
	class ClassOne {
	    function callClassOne() {
	        print "In Class One\n";
	    }
	}

	class ClassTwo {
	    function callClassTwo() {
	        print "In Class Two\n";
	    }
	}

	class ClassOneDelegator {
	    private $targets;

	    function __construct() {
	        $this->targets[] = new ClassOne();
	    }

	    function addObject($obj) {
	        $this->targets[] = $obj;
	    }

	    function __call($name, $args) {
	        foreach ($this->targets as $obj) {
	            $r = new ReflectionClass($obj);

	            if ($method = $r->getMethod($name)) {
	                if ($method->isPublic() && !$method->isAbstract()) {
	                    return $method->invoke($obj, $args);
	                }
	            }
	        }
	    }
	}

	$obj = new ClassOneDelegator();
	$obj->addObject(new ClassTwo());
	$obj->callClassOne();
	$obj->callClassTwo();