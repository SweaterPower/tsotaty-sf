<?php

namespace App\Tests;

use PHPUnit\Framework\TestCase;

class GithubCITest extends TestCase
{
    public function testCI()
    {
        echo '[!] Github rofloCI test [!]';
        $this->assertTrue(true);
    }
}
