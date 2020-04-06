<?php
include_once('Parser.php');

class View
{
    public function __construct()
    {
        return new Parser('sample.html', false);
    }
}

new View();
