<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use App\Entity\TestEntity;

class TestEntityFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $test = new TestEntity();
        $test->setTestField1('testField1');
        $test->setTestField2('testField2');
        $test->setTestField3('testField3');
        $manager->persist($test);

        $manager->flush();
    }
}
