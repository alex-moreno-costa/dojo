<?php

namespace Dojo\SMS;

class SMS
{
    private $keyboard = [
        2 => 'ABC',
        3 => 'DEF',
        4 => 'GHI',
        5 => 'JKL',
        6 => 'MNO',
        7 => 'PQRS',
        8 => 'TUV',
        9 => 'WXYZ',
        0 => ' ',
    ];

    /**
     * @var int
     */
    private $pointer = 0;

    /**
     * @var string
     */
    private $output = '';

    /**
     * @var null
     */
    private $previousNumber = null;

    /**
     * @var int
     */
    private $quantity = 0;

    /**
     * @param string $string
     * @return string
     */
    public function process(string $string): string
    {
        for ($i = 0; $i < strlen($string); $i++) {
            if ('_' === $string[$i]) {
                $this->resetVariables();
                continue;
            }

            if (is_null($this->previousNumber)) {
                $this->setLetter($string[$i]);
                continue;
            }

            if ($this->previousNumber === $string[$i]) {
                $this->quantity++;
                $this->setLetter($string[$i]);
                continue;
            }

            $this->resetVariables();
            $this->setLetter($string[$i]);
        }

        return $this->output;
    }

    private function resetVariables(): void
    {
        $this->pointer++;
        $this->quantity = 0;
        $this->previousNumber = null;
    }

    /**
     * @param string $number
     */
    private function setLetter(string $number): void
    {
        $letters = $this->keyboard[$number];
        $this->previousNumber = $number;
        $this->output[$this->pointer] = $letters[$this->quantity];
    }
}