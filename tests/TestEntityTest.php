<?php
declare (strict_types=1);
namespace App\Tests;

use PHPUnit\Framework\TestCase;
use App\Entity\TestEntity;
use App\Repository\TestEntityRepository;

class TestEntityTest extends TestCase
{
    public function testField2()
    {
        $testRepo = $this->createMock(TestEntityRepository::class);
        echo var_dump($testRepo);
        $testEntity = $testRepo->findOneByTestField1('testField1');
        echo var_dump($testEntity);
        if ($testEntity !== null) {
            $this->assertSame('testField2', $testEntity->getTestField2());
        }
        $this->assertNotNull($testEntity);
    }

    public function testField3()
    {
        $testRepo = $this->createMock(TestEntityRepository::class);
        $testEntity = $testRepo->findOneByTestField1('testField1');
        if ($testEntity !== null) {
            $this->assertSame('testField3', $testEntity->getTestField3());
        }
        $this->assertNotNull($testEntity);
    }
}
