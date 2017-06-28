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

    /**
     * @return bool
     */
    public function isEmpty(): bool
    {
        return empty($this->data);
    }

    /**
     * Get all messages as an array
     * @return array
     */
    public function toArray(): array
    {
        return array_map(function ($value) {
            /** @var static $value */
            return $value->getMessage();
        }, $this->data);
    }

    /**
     * Implementation of Iterator interface
     * @return \ArrayIterator
     */
    public function getIterator(): \ArrayIterator
    {
        return new \ArrayIterator($this->data);
    }

    /**
     * Implementing the Countable interface
     * @return int
     */
    public function count(): int
    {
        return count($this->data);
    }
}
