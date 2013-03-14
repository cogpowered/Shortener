<?php

namespace ShortenerTests;

use PHPUnit_Framework_TestCase;
use cogpowered\Shortener\Shortener;

class ShortenerTest extends PHPUnit_Framework_TestCase
{
    public function setUp()
    {
        $this->data = array(
            6             => '8',
            14            => 'H',
            681           => 'OC',
            1255          => '399',
            81906         => '4IZL',
            475006        => 'HIVY',
            5218755203058 => '6QWE2TMZL',
            PHP_INT_MAX   => 'A22222222222Z',
        );
    }

    public function testEncode()
    {
        $shortener = new Shortener;

        foreach ($this->data as $int => $str) {
            $this->assertEquals($shortener->encode($int), $str);
        }
    }

    public function testDecode()
    {
        $shortener = new Shortener;

        foreach ($this->data as $int => $str) {
            $this->assertEquals($shortener->decode($str), $int);
        }
    }
}