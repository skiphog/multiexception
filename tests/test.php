<?php
use Skiphog\MultiException;

require __DIR__ . '/../src/MultiException.php';

$multi = new MultiException();

$multi->add(new Exception('Жопа'));
$multi->add(new Exception('Писька'));
$multi->add(new Exception('Пиписька'));
$multi->add(new Exception('Сиська'));

//var_dump($multi instanceof ArrayAccess);
