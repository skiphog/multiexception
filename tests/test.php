<?php
use Skiphog\MultiException;

require __DIR__ . '/../vendor/autoload.php';

$multi = new MultiException();

assert($multi instanceof \Exception);
assert($multi instanceof \Traversable);
assert($multi instanceof \Countable);

$result = $multi->add(new Exception('Error #1'));
$multi->add(new Exception('Error #2'));

assert($result instanceof MultiException);
assert(2 === count($multi));
assert(false === $multi->isEmpty());
assert(is_array($multi->toArray()));

foreach ($multi as $item) {
    assert($item instanceof \Exception);
}
