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

    private $pointer = 0;
    private $output = '';
    private $prevourslyNumber = null;
    private $quantity = 0;

    public function process(string $string)
    {
        for ($i = 0; $i < strlen($string); $i++) {
            if ('_' === $string[$i]) {
                $this->pointer++;
                $this->quantity = 0;
                $this->prevourslyNumber = null;
                continue;
            }

            if (is_null($this->prevourslyNumber)) {
                $number = $string[$i];
                $letters = $this->keyboard[$number];
                $this->output .= $letters[$this->quantity];
                $this->prevourslyNumber = $string[$i];
                continue;
            }

            if ($this->prevourslyNumber === $string[$i]) {
                $this->quantity++;
                $number = $string[$i];
                $letters = $this->keyboard[$number];
                $this->output[$this->pointer] = $letters[$this->quantity];
                $this->prevourslyNumber = $string[$i];
                continue;
            }

            $this->pointer++;
            $this->quantity = 0;
            $number = $string[$i];
            $letters = $this->keyboard[$number];
            $this->output .= $letters[$this->quantity];
            $this->prevourslyNumber = $string[$i];
        }

        return $this->output;
    }
}