<?php

namespace Printup\Recruit\Tests;

use PHPUnit\Framework\TestCase;
use Printup\Recruit\SingleOccurrence;

final class SingleOccurrenceTests extends TestCase
{
    private SingleOccurrence $singleOccurrence;
    private array $testArray;

    protected function setUp(): void
    {
        $this->singleOccurrence = new SingleOccurrence();
        $this->testArray = [1, 2, 3, 4, 1, 2, 3];
    }

    public function testShouldPassTest()
    {
        $testResult = [4];
        $test = $this->singleOccurrence->findSingle($this->testArray);

        $this->assertEquals($testResult, $test);
    }

    public function testShouldFailTest()
    {
        $testResult = [5];
        $test = $this->singleOccurrence->findSingle($this->testArray);

        $this->assertNotEquals($testResult, $test);
    }

    /* ... */
}