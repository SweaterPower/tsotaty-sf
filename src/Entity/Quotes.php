<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\QuotesRepository")
 */
class Quote
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\UserProfile", inversedBy="quotes")
     */
    private $author;

    /**
     * @ORM\Column(type="json")
     */
    private $text = [];

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getAuthor(): ?UserProfile
    {
        return $this->author;
    }

    public function setAuthor(?UserProfile $author): self
    {
        $this->author = $author;

        return $this;
    }

    public function getText(): ?array
    {
        return $this->text;
    }

    public function setText(array $text): self
    {
        $this->text = $text;

        return $this;
    }
}
