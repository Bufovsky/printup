<?php

namespace Printup\Recruit\Tests;

use PHPUnit\Framework\TestCase;
use Printup\Recruit\AtBashCipher;

final class AtBashCipherTests extends TestCase
{
    private AtBashCipher $atBashCipher;
    private string $testStringEncode;
    private string $testStringDecode;

    protected function setUp(): void
    {
        $this->atBashCipher = new AtBashCipher();
        $this->testStringEncode = 'abc';
        $this->testStringDecode = 'zyx';
    }

    public function testShouldPassEncodeTest()
    {
        $test = $this->atBashCipher->encrypt($this->testStringEncode);

        $this->assertEquals($this->testStringDecode, $test);
    }

    public function testShouldFailEncodeTest()
    {
        $testResult = 1;
        $test = $this->atBashCipher->encrypt($this->testStringEncode);

        $this->assertNotEquals($testResult, $test);
    }

    public function testShouldPassDecodeTest()
    {
        $test = $this->atBashCipher->decrypt($this->testStringDecode);

        $this->assertEquals($this->testStringEncode, $test);
    }

    public function testShouldFailDecodeTest()
    {
        $testResult = 1;
        $test = $this->atBashCipher->decrypt($this->testStringDecode);

        $this->assertNotEquals($testResult, $test);
    }

    /* ... */
}
