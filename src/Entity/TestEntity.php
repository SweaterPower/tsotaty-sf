<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\TestEntityRepository")
 */
class TestEntity
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $TestField1;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $TestField2;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $TestField3;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTestField1(): ?string
    {
        return $this->TestField1;
    }

    public function setTestField1(string $TestField1): self
    {
        $this->TestField1 = $TestField1;

        return $this;
    }

    public function getTestField2(): ?string
    {
        return $this->TestField2;
    }

    public function setTestField2(string $TestField2): self
    {
        $this->TestField2 = $TestField2;

        return $this;
    }

    public function getTestField3(): ?string
    {
        return $this->TestField3;
    }

    public function setTestField3(string $TestField3): self
    {
        $this->TestField3 = $TestField3;

        return $this;
    }
}
