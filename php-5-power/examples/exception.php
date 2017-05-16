<?php
/**
 * Created by PhpStorm.
 * User: ha.do
 * Date: 11/05/2017
 * Time: 18:01
 */

class SQLException extends Exception {
    public $problem;
    function __construct($problem)
    {
        $this->problem = $problem;
    }
}

try {
    throw new SQLException("Couldn't connect to database");
} catch (SQLException $e) {
    print "Caught an SQLException with problem $e->problem";
} catch (Exception $e) {
    print "Caught unrecognized exception.";
}