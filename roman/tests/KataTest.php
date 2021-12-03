<?php

namespace Tests;

use PHPUnit\Framework\TestCase;
use swkberlin\Kata;

require __DIR__ . '/../vendor/autoload.php';

class KataTest extends TestCase
{
    public function testNumber1ToI()
    {
        $kata = new Kata();
        $roman = $kata->convert(1);
        $this->assertSame('I', $roman);
    }
    public function testNumber5ToV()
    {
        $kata = new Kata();
        $roman = $kata->convert(5);
        $this->assertSame('V', $roman);
    }
    public function testNumber10ToX()
    {
        $kata = new Kata();
        $roman = $kata->convert(10);
        $this->assertSame('X', $roman);
    }
    public function testNumber50ToL()
    {
        $kata = new Kata();
        $roman = $kata->convert(50);
        $this->assertSame('L', $roman);
    }

    public function testNumber100ToC()
    {
        $kata = new Kata();
        $roman = $kata->convert(100);
        $this->assertSame('C', $roman);
    }
    public function testNumber500ToD()
    {
        $kata = new Kata();
        $roman = $kata->convert(500);
        $this->assertSame('D', $roman);
    }

    public function testNumber1000ToM()
    {
        $kata = new Kata();
        $roman = $kata->convert(1000);
        $this->assertSame('M', $roman);
    }

    public function testNumber3ToIII()
    {
        $kata = new Kata();
        $roman = $kata->convert(3);
        $this->assertSame('III', $roman);
    }
    public function testNumber4ToIV()
    {
        $kata = new Kata();
        $roman = $kata->convert(4);
        $this->assertSame('IV', $roman);
    }
    public function testNumber6ToVI()
    {
        $kata = new Kata();
        $roman = $kata->convert(6);
        $this->assertSame('VI', $roman);
    }

    public function testNumber9ToIX()
    {
        $kata = new Kata();
        $roman = $kata->convert(9);
        $this->assertSame('IX', $roman);
    }
    public function testNumber11ToXI()
    {
        $kata = new Kata();
        $roman = $kata->convert(11);
        $this->assertSame('XI', $roman);
    }
    public function testNumber1999ToMCMXCIX()
    {
        $kata = new Kata();
        $roman = $kata->convert(1999);
        $this->assertSame('MCMXCIX', $roman);
    }

}
