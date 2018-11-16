<?php

namespace Dojo\OCR;

use phpDocumentor\Reflection\Types\Integer;

class OCR
{
    private $numberMap = [
        1 => '     |  |',
        2 => ' _  _||_ ',
        3 => ' _  _| _|',
        4 => '   |_|  |',
        5 => ' _ |_  _|',
        6 => ' _ |_ |_|',
        7 => ' _   |  |',
        8 => ' _ |_||_|',
        9 => ' _ |_| _|'
    ];

    /**
     * @param array $content
     * @return int
     */
    public function identifyNumber(array $content): int
    {
        $string = implode('', $content);

        if (false !== $number = array_search($string, $this->numberMap)) {
            return $number;
        }
    }
}