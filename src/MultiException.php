<?php

namespace Skiphog;

class MultiException extends \Exception implements \IteratorAggregate, \Countable
{
    protected $data = [];

    public function add(\Throwable $e)
    {
        $this->data[] = $e;

        return $this;
    }

    public function isEmpty(): bool
    {
        return empty($this->data);
    }

    public function toArray(): array
    {
        return array_map(function ($value) {
            /** @var static $value */
            return $value->getMessage();
        }, $this->data);
    }

    public function getIterator(): \ArrayIterator
    {
        return new \ArrayIterator($this->data);
    }

    public function count(): int
    {
        return count($this->data);
    }
}
