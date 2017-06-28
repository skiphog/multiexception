<?php

namespace Skiphog;

/**
 * Class MultiException
 * @package Skiphog
 */
class MultiException extends \Exception implements \IteratorAggregate, \Countable
{
    /**
     * Collection of exceptions
     * @var array $data
     */
    protected $data = [];

    /**
     * Add an exception to the collection
     * @param \Exception $e
     * @return $this
     */
    public function add(\Exception $e)
    {
        $this->data[] = $e;

        return $this;
    }

    public function isEmpty(): bool
    {
        return empty($this->data);
    }

    /**
     * Get all messages as array
     * @return array
     */
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
