<?php

/**
 * Creates short codes for integers. Useful for URL shorteners.
 *
 * @copyright Copyright 2013 (c) Oliver Jakoubek (http://www.oliverjakoubek.de)
 * @copyright Copyright 2013 (c) Robert Crowe (http://cogpowered.com)
 * @link https://github.com/cogpowered/Shortener
 * @version 0.0.1
 * @license MIT License (http://www.opensource.org/licenses/mit-license.php)
 */

namespace cogpowered\Shortener;

/**
 * Creates short codes for integers. Useful for URL shorteners.
 */
class Shortener
{
    /**
     * @var array Mapping for when encoding an integer into a string.
     */
    protected $toChar = array(
        0  => '2',
        1  => '3',
        2  => '4',
        3  => '5',
        4  => '6',
        5  => '7',
        6  => '8',
        7  => '9',
        8  => 'A',
        9  => 'C',
        10 => 'D',
        11 => 'E',
        12 => 'F',
        13 => 'G',
        14 => 'H',
        15 => 'I',
        16 => 'J',
        17 => 'K',
        18 => 'L',
        19 => 'M',
        20 => 'N',
        21 => 'O',
        22 => 'P',
        23 => 'Q',
        24 => 'R',
        25 => 'T',
        26 => 'U',
        27 => 'V',
        28 => 'W',
        29 => 'X',
        30 => 'Y',
        31 => 'Z',
    );

    /**
     * @var array Mapping for when decoding string back to an integer.
     */
    protected $toInt = array(
        '0' => 21,
        '1' => 15,
        'S' => 12,
        'B' => 22,
        '2' => 0,
        '3' => 1,
        '4' => 2,
        '5' => 3,
        '6' => 4,
        '7' => 5,
        '8' => 6,
        '9' => 7,
        'A' => 8,
        'C' => 9,
        'D' => 10,
        'E' => 11,
        'F' => 12,
        'G' => 13,
        'H' => 14,
        'I' => 15,
        'J' => 16,
        'K' => 17,
        'L' => 18,
        'M' => 19,
        'N' => 20,
        'O' => 21,
        'P' => 22,
        'Q' => 23,
        'R' => 24,
        'T' => 25,
        'U' => 26,
        'V' => 27,
        'W' => 28,
        'X' => 29,
        'Y' => 30,
        'Z' => 31,
    );

    /**
     * Encode an integer into a short string format.
     *
     * @param int $number Integer you wish to encode.
     * @return string
     */
    public function encode($number)
    {
        $numbers = array();

        while ($number !== 0) {
            array_unshift($numbers, $number % 32);
            $number = intval($number / 32);
        }

        $toChar = $this->toChar;

        $string = array_map(
            function($number) use($toChar) {
                return $toChar[$number];
            },
            $numbers
        );

        return implode('', $string);
    }

    /**
     * Decodes a string back to its integer form.
     *
     * @param string $string The string you wish to decode.
     * @return int
     */
    public function decode($string)
    {
        $string = strtoupper($string);
        $number = 0;

        foreach (str_split($string) as $char) {
            $char   = $this->toInt[$char];
            $number = ($number * 32) + $char;
        }

        return $number;
    }
}