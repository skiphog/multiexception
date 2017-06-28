<?php
use Skiphog\MultiException;

require __DIR__ . '/../src/MultiException.php';

$multi = new MultiException();

$multi->add(new Exception('Error #1'));
$multi->add(new Exception('Error #2'));
$multi->add(new Exception('Error #3'));
$multi->add(new Exception('Error #4'));

//var_dump($multi instanceof ArrayAccess);
