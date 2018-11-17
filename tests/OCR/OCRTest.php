<?php

namespace Dojo\Tests\OCR;

use Dojo\OCR\OCR;
use PHPUnit\Framework\TestCase;

class OCRTest extends TestCase
{
    /**
     * @var OCR
     */
    private $ocr;

    public function setUp()
    {
        $this->ocr = new OCR();
    }

    public function testIdentifyNumberOne()
    {
        $this->assertEquals(1, $this->ocr->identifyNumber([
            "   ",
            "  |",
            "  |",
            ""
        ]));
    }

    public function testIdentifyNumberTwo()
    {
        $this->assertEquals(2, $this->ocr->identifyNumber([
            " _ ",
            " _|",
            "|_ ",
            ""
        ]));
    }

    public function testIdentifyNumberThree()
    {
        $this->assertEquals(3, $this->ocr->identifyNumber([
            " _ ",
            " _|",
            " _|",
            ""
        ]));
    }

    public function testIdentifyNumberFour()
    {
        $this->assertEquals(4, $this->ocr->identifyNumber([
            "   ",
            "|_|",
            "  |",
            ""
        ]));
    }

    public function testIdentifyNumberFive()
    {
        $this->assertEquals(5, $this->ocr->identifyNumber([
            " _ ",
            "|_ ",
            " _|",
            ""
        ]));
    }

    public function testIdentifyNumberSix()
    {
        $this->assertEquals(6, $this->ocr->identifyNumber([
            " _ ",
            "|_ ",
            "|_|",
            ""
        ]));
    }

    public function testIdentifyNumberSeven()
    {
        $this->assertEquals(7, $this->ocr->identifyNumber([
            " _ ",
            "  |",
            "  |",
            ""
        ]));
    }

    public function testIdentifyNumberEight()
    {
        $this->assertEquals(8, $this->ocr->identifyNumber([
            " _ ",
            "|_|",
            "|_|",
            ""
        ]));
    }

    public function testIdentifyNumberNine()
    {
        $this->assertEquals(9, $this->ocr->identifyNumber([
            " _ ",
            "|_|",
            " _|",
            ""
        ]));
    }

    public function testIdentifyNumberZero()
    {
        $this->assertEquals(0, $this->ocr->identifyNumber([
            " _ ",
            "| |",
            "|_|",
            ""
        ]));
    }
}