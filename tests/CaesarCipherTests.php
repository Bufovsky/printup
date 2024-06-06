<?php

namespace Printup\Recruit\Tests;

use PHPUnit\Framework\TestCase;
use Printup\Recruit\CaesarCipher;

final class CaesarCipherTests extends TestCase
{
    private CaesarCipher $caesarCipher;
    private CaesarCipher $caesarCipherShift;
    private string $testStringEncode;
    private string $testStringDecode;
    private string $testStringShiftDecode;

    protected function setUp(): void
    {
        $this->caesarCipher = new CaesarCipher(1);
        $this->caesarCipherShift = new CaesarCipher(2);
        $this->testStringEncode = 'abc';
        $this->testStringDecode = 'bcd';
        $this->testStringShiftDecode = 'cde';
    }

    public function testShouldPassEncodeTest()
    {
        $test = $this->caesarCipher->encrypt($this->testStringEncode);

        $this->assertEquals($this->testStringDecode, $test);
    }

    public function testShouldFailEncodeTest()
    {
        $testResult = 1;
        $test = $this->caesarCipher->encrypt($this->testStringEncode);

        $this->assertNotEquals($testResult, $test);
    }

    public function testShouldPassDecodeTest()
    {
        $test = $this->caesarCipher->decrypt($this->testStringDecode);

        $this->assertEquals($this->testStringEncode, $test);
    }

    public function testShouldFailDecodeTest()
    {
        $testResult = 1;
        $test = $this->caesarCipher->decrypt($this->testStringDecode);

        $this->assertNotEquals($testResult, $test);
    }

    public function testShouldPassShiftTest()
    {
        $test = $this->caesarCipherShift->encrypt($this->testStringEncode);

        $this->assertEquals($this->testStringShiftDecode, $test);
    }

    public function testShouldFailShiftTest()
    {
        $test = $this->caesarCipherShift->encrypt($this->testStringEncode);

        $this->assertEquals($this->testStringShiftDecode, $test);
    }

    /* ... */
}
