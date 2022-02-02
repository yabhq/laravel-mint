<?php

namespace Yab\Mint\Tests;

use Yab\Mint\Actions\Inititals;
use Yab\Mint\Tests\TestCase;

class InitialsTest extends TestCase
{
    /** @test */
    public function it_can_generate_initials()
    {
        $result = (new Inititals)->generate('Chris Blackwell');
        $this->assertEquals('CB', $result);
    }

    /** @test */
    public function it_can_generate_initials_from_single_name()
    {
        $result = (new Inititals)->generate('Chris');
        $this->assertEquals('CH', $result);
    }

    /** @test */
    public function it_can_generate_initials_from_multiple_names()
    {
        $result = (new Inititals)->generate('Chris Shane Blackwell');
        $this->assertEquals('CB', $result);
    }
}
