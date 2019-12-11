<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\FriendsGroupRepository")
 */
class FriendsGroup
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\UserProfile", inversedBy="friendsGroups")
     * @ORM\JoinColumn(nullable=false)
     */
    private $owner;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\UserProfile")
     */
    private $friends;

    /**
     * @ORM\Column(type="json", nullable=true)
     */
    private $aliases = [];

    public function __construct()
    {
        $this->friends = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getOwner(): ?UserProfile
    {
        return $this->owner;
    }

    public function setOwner(?UserProfile $owner): self
    {
        $this->owner = $owner;

        return $this;
    }

    /**
     * @return Collection|UserProfile[]
     */
    public function getFriends(): Collection
    {
        return $this->friends;
    }

    public function addFriend(UserProfile $friend): self
    {
        if (!$this->friends->contains($friend)) {
            $this->friends[] = $friend;
        }

        return $this;
    }

    public function removeFriend(UserProfile $friend): self
    {
        if ($this->friends->contains($friend)) {
            $this->friends->removeElement($friend);
        }

        return $this;
    }

    public function getAliases(): ?array
    {
        return $this->aliases;
    }

    public function setAliases(?array $aliases): self
    {
        $this->aliases = $aliases;

        return $this;
    }
}
