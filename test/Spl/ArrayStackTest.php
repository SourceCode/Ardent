<?php
namespace Spl;

/**
 * Generated by PHPUnit_SkeletonGenerator on 2012-07-16 at 17:08:21.
 */
class ArrayStackTest extends \PHPUnit_Framework_TestCase {

    /**
     * @var ArrayStack
     */
    protected $stack;

    /**
     * Sets up the fixture, for example, opens a network connection.
     * This method is called before a test is executed.
     */
    protected function setUp() {
        $this->stack = new ArrayStack;
    }

    /**
     * Tears down the fixture, for example, closes a network connection.
     * This method is called after a test is executed.
     */
    protected function tearDown() {
    }

    /**
     * @covers Spl\ArrayStack::push
     * @covers Spl\ArrayStack::count
     */
    public function testPush() {
        $this->stack->pushBack(0);
        $this->assertCount(1, $this->stack);

        $this->stack->pushBack(0);
        $this->assertCount(2, $this->stack);
    }

    /**
     * @covers Spl\ArrayStack::pop
     * @depends testPush
     */
    public function testPop() {
        $inItem = 0;
        $this->stack->pushBack($inItem);

        $outItem = $this->stack->popBack();

        $this->assertEquals($inItem, $outItem);
        $this->assertCount(0, $this->stack);
    }

    /**
     * @covers Spl\ArrayStack::pop
     * @expectedException \Spl\EmptyException
     */
    public function testPopException() {
        $this->stack->popBack();
    }

    /**
     * @covers Spl\ArrayStack::peek
     * @depends testPush
     */
    public function testPeek() {
        $inItem = 0;
        $this->stack->pushBack($inItem);

        $peekedItem = $this->stack->peekBack();

        $this->assertEquals($inItem, $peekedItem);
        $this->assertCount(1, $this->stack);

        $secondInItem = 1;
        $this->stack->pushBack($secondInItem);
        $secondPeekedItem = $this->stack->peekBack();

        $this->assertEquals($secondInItem, $secondPeekedItem);
        $this->assertCount(2, $this->stack);
    }

    /**
     * @covers Spl\ArrayStack::peek
     * @expectedException \Spl\EmptyException
     */
    public function testPeekException() {
        $this->stack->peekBack();
    }

    /**
     * @covers Spl\ArrayStack::key
     * @covers Spl\ArrayStack::valid
     * @covers Spl\ArrayStack::rewind
     * @depends testPush
     */
    public function testIteratorEmpty() {
        $i = 0;
        foreach ($this->stack as $item) {
            $i++;
        }

        $this->assertEquals(0, $i);

        $this->assertNull($this->stack->key());
    }

    /**
     * @covers Spl\ArrayStack::current
     * @covers Spl\ArrayStack::key
     * @covers Spl\ArrayStack::next
     * @covers Spl\ArrayStack::valid
     * @covers Spl\ArrayStack::rewind
     * @depends testPush
     */
    public function testIterator() {
        $this->stack->pushBack(1);
        $this->stack->pushBack(2);

        $expectedSequence = array(2,1);

        $actualSequence = array();
        $i = 0;
        foreach ($this->stack as $key => $item) {
            $this->assertEquals($i, $key);
            $actualSequence[] = $item;
            $i++;
        }

        $this->assertEquals($expectedSequence, $actualSequence);

    }

    /**
     * @covers Spl\ArrayStack::clear
     * @depends testPush
     */
    public function testClear() {
        $this->stack->pushBack(0);

        $this->stack->clear();
        $this->assertCount(0, $this->stack);
    }

    /**
     * @covers Spl\ArrayStack::contains
     * @depends testPush
     */
    public function testContains() {
        $item = 0;
        $this->assertFalse($this->stack->contains($item));
        $this->stack->pushBack($item);
        $this->assertTrue($this->stack->contains($item));
    }

    /**
     * @covers Spl\ArrayStack::isEmpty
     * @depends testPush
     */
    public function testIsEmpty() {
        $this->assertTrue($this->stack->isEmpty());
        $this->stack->pushBack(0);
        $this->assertFalse($this->stack->isEmpty());
    }

}
