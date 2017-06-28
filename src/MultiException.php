<?php

namespace Skiphog;

/**
 * Class MultiException
 * @package Skiphog
 */
class MultiException extends \Exception implements \IteratorAggregate, \Countable
{
    /**
     * Коллекция исключений
     * @var array $data
     */
    protected $data = [];

    /**
     * Добавить искючение в коллекцию
     * @param \Throwable $e
     * @return $this
     */
    public function add(\Throwable $e)
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
     * Получить все сообщения в виде массива
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
     * Реализация Iterator
     * @return \ArrayIterator
     */
    public function getIterator(): \ArrayIterator
    {
        return new \ArrayIterator($this->data);
    }

    /**
     * Реализация интерфейса Countable
     * @return int
     */
    public function count(): int
    {
        return count($this->data);
    }
}
