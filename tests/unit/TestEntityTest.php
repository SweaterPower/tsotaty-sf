<?php namespace App\Tests;

use Doctrine\ORM\EntityManager;

class TestEntityTest extends \Codeception\Test\Unit
{
    /**
     * @var \App\Tests\UnitTester
     */
    protected $tester;
    
    protected function _before()
    {
    }

    protected function _after()
    {
    }

    // tests
    public function testSampleField1()
    {
        /** @var Doctrine\ORM\EntityManager */
        $em = $this->getModule('Doctrine2')->em;
        
    }
}