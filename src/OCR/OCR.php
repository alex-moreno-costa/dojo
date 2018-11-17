<?php

namespace Dojo\OCR;

class OCR
{
    private $numberMap = [
        '0' => ' _ | ||_|',
        '1' => '     |  |',
        '2' => ' _  _||_ ',
        '3' => ' _  _| _|',
        '4' => '   |_|  |',
        '5' => ' _ |_  _|',
        '6' => ' _ |_ |_|',
        '7' => ' _   |  |',
        '8' => ' _ |_||_|',
        '9' => ' _ |_| _|'
    ];

    private $output = '';

    /**
     * @param array $content
     * @return string
     */
    public function identifyNumber(array $content): string
    {
        $string = implode('', $content);

        if (false !== $number = array_search($string, $this->numberMap)) {
            return $number;
        }
    }

    public function splitNumbers(array $content)
    {
        $numbers = [];
        $pointer = 0;
        $lineLimit = 0;
        $item = 0;

        foreach ($content as $row) {
            $lineLimit = strlen($row) - 1;

            if ($lineLimit <= 0 || $pointer === $lineLimit) {
                $pointer = 0;
                $lineLimit = 0;
                $item = 0;

                if ($lineLimit > 0) {
                    $this->processLine($numbers);
                }
                continue;
            }

            $lineLimit = strlen($row) - 1;
            $numbers[$item][] = substr($row, $pointer, 3);
            $pointer += 3;
            $item++;
        }

        return $numbers;
    }

    public function processLine(array $numbers)
    {
        $this->output = '';

        foreach ($numbers as $content) {
            $this->output .= $this->identifyNumber($content);
        }

        return $this->output;
    }
}