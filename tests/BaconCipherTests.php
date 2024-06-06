<?php

namespace Printup\Recruit\Tests;

use PHPUnit\Framework\TestCase;
use Printup\Recruit\BaconCipher;

final class BaconCipherTests extends TestCase
{
    private BaconCipher $baconCipher;
    private string $testStringEncode;
    private string $testStringDecode;

    protected function setUp(): void
    {
        $this->baconCipher = new BaconCipher();
        $this->testStringEncode = 'abc';
        $this->testStringDecode = '000000000101010';
    }

    public function testShouldPassEncodeTest()
    {
        $test = $this->baconCipher->encrypt($this->testStringEncode);

        $this->assertEquals($this->testStringDecode, $test);
    }

    public function testShouldFailEncodeTest()
    {
        $testResult = 1;
        $test = $this->baconCipher->encrypt($this->testStringEncode);

        $this->assertNotEquals($testResult, $test);
    }

    public function testShouldPassDecodeTest()
    {
        $test = $this->baconCipher->decrypt($this->testStringDecode);

        $this->assertEquals($this->testStringEncode, $test);
    }

    public function testShouldFailDecodeTest()
    {
        $testResult = 1;
        $test = $this->baconCipher->decrypt($this->testStringDecode);

        $this->assertNotEquals($testResult, $test);
    }

    /* ... */
}
