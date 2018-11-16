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
    private $prevourslyNumber = null;

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

            if (is_null($this->prevourslyNumber)) {
                $this->setLetter($string[$i]);
                continue;
            }

            if ($this->prevourslyNumber === $string[$i]) {
                $this->quantity++;
                $this->setLetter($string[$i], true);
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
        $this->prevourslyNumber = null;
    }

    /**
     * @param string $number
     * @param bool $replace
     */
    private function setLetter(string $number, bool $replace = false): void
    {
        $letters = $this->keyboard[$number];
        $this->prevourslyNumber = $number;

        if ($replace) {
            $this->output[$this->pointer] = $letters[$this->quantity];
        } else {
            $this->output .= $letters[$this->quantity];
        }
    }
}