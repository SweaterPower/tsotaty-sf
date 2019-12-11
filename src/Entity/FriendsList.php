<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\FriendsListRepository")
 */
class FriendsList
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\UserProfile", cascade={"persist", "remove"})
     */
    private $owner;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\UserProfile", inversedBy="friendsLists")
     */
    private $friends;

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
}
