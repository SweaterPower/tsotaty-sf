<?php

namespace App\Tests;

use PHPUnit\Framework\TestCase;

class GithubCITest extends TestCase
{
    public function testCItrue()
    {
        $this->assertTrue(true);
    }

    public function testCIfalse()
    {
        $this->assertTrue(false);
    }
}
