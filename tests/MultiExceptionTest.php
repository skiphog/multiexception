<?php

use PHPUnit\Framework\TestCase;

class MultiExceptionTest extends TestCase
{

    /**
     * @var \Skiphog\MultiException
     */
    protected $multi;

    protected function setUp()
    {
        $this->multi = new \Skiphog\MultiException();
    }

    public function testAdd()
    {
        $that = $this->multi->add(new \Exception('Test 1'));

        $this->assertInstanceOf(\Skiphog\MultiException::class, $that);
    }

    public function testCount()
    {
        $this->assertCount(0, $this->multi);
        $this->multi
            ->add(new \Exception('Test 1'))
            ->add(new \Exception('Test 2'))
            ->add(new \Exception('Test 3'));

        $this->assertCount(3, $this->multi);
    }

    public function testIsEmpty()
    {
        $this->assertTrue($this->multi->isEmpty());
        $this->multi->add(new \Exception('Test 1'));
        $this->assertFalse($this->multi->isEmpty());
    }

    public function testGetArray()
    {
        $this->assertInternalType('array', $this->multi->toArray());
        $this->multi->add(new \Exception('Test 1'));
        $this->assertInternalType('array', $this->multi->toArray());
    }

    public function testArrayIterator()
    {
        $this->assertInstanceOf(ArrayIterator::class,$this->multi->getIterator());
    }

}
