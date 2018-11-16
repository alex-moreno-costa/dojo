<?php

namespace Dojo\Tests\SMS;

use Dojo\SMS\SMS;
use PHPUnit\Framework\TestCase;

class SMSTest extends TestCase
{
    /**
     * @var SMS
     */
    private $sms;

    public function setUp()
    {
        $this->sms = new SMS();
    }

    public function testReturnLetterA()
    {
        $this->assertEquals('A', $this->sms->process('2'));
    }

    public function testReturnLetterB()
    {
        $this->assertEquals('B', $this->sms->process('22'));
    }

    public function testReturnLetterZ()
    {
        $this->assertEquals('Z', $this->sms->process('9999'));
    }

    public function testReturnTwoLetters()
    {
        $this->assertEquals('SE', $this->sms->process('777733'));
    }

    public function testReturnFullText()
    {
        $this->assertEquals(
            'SEMPRE ACESSO O DOJOPUZZLES',
            $this->sms->process('77773367_7773302_222337777_777766606660366656667889999_9999555337777')
        );
    }
}