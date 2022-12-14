<?php

namespace Tests\Services\Sanitisers;

use App\Services\Sanitisers\StringSanitiser;
use Tests\TestCase;

class StringSanitiserTest extends TestCase
{
    public function testSanitiseStringSuccess()
    {
        $str = '    <h1>Hello World!</h1>';
        $result = StringSanitiser::sanitiseString($str);
        $expected = 'Hello World!';
        $this->assertEquals($result, $expected);
    }

    public function testSanitiseStringFailure()
    {
        $int = 2;
        $result = StringSanitiser::sanitiseString($int);
        $expected = '2';
        $this->assertEquals($result, $expected);
    }

    public function testSanitiseStringMalform()
    {
        $arr = [];
        $this->expectException(\TypeError::class);
        StringSanitiser::sanitiseString($arr);
    }
}
