<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\UserProfileRepository")
 */
class UserProfile
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\User", inversedBy="userProfile", cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $userId;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Quote", mappedBy="author")
     */
    private $quotes;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\FriendsList", mappedBy="friends")
     */
    private $friendsLists;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\FriendsGroup", mappedBy="owner", orphanRemoval=true)
     */
    private $friendsGroups;

    public function __construct()
    {
        $this->quotes = new ArrayCollection();
        $this->friendsLists = new ArrayCollection();
        $this->friendsGroups = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUserId(): ?User
    {
        return $this->userId;
    }

    public function setUserId(User $userId): self
    {
        $this->userId = $userId;

        return $this;
    }

    /**
     * @return Collection|Quotes[]
     */
    public function getQuotes(): Collection
    {
        return $this->quotes;
    }

    public function addQuote(Quotes $quote): self
    {
        if (!$this->quotes->contains($quote)) {
            $this->quotes[] = $quote;
            $quote->setAuthor($this);
        }

        return $this;
    }

    public function removeQuote(Quotes $quote): self
    {
        if ($this->quotes->contains($quote)) {
            $this->quotes->removeElement($quote);
            // set the owning side to null (unless already changed)
            if ($quote->getAuthor() === $this) {
                $quote->setAuthor(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|FriendsList[]
     */
    public function getFriendsLists(): Collection
    {
        return $this->friendsLists;
    }

    public function addFriendsList(FriendsList $friendsList): self
    {
        if (!$this->friendsLists->contains($friendsList)) {
            $this->friendsLists[] = $friendsList;
            $friendsList->addFriend($this);
        }

        return $this;
    }

    public function removeFriendsList(FriendsList $friendsList): self
    {
        if ($this->friendsLists->contains($friendsList)) {
            $this->friendsLists->removeElement($friendsList);
            $friendsList->removeFriend($this);
        }

        return $this;
    }

    /**
     * @return Collection|FriendsGroup[]
     */
    public function getFriendsGroups(): Collection
    {
        return $this->friendsGroups;
    }

    public function addFriendsGroup(FriendsGroup $friendsGroup): self
    {
        if (!$this->friendsGroups->contains($friendsGroup)) {
            $this->friendsGroups[] = $friendsGroup;
            $friendsGroup->setOwner($this);
        }

        return $this;
    }

    public function removeFriendsGroup(FriendsGroup $friendsGroup): self
    {
        if ($this->friendsGroups->contains($friendsGroup)) {
            $this->friendsGroups->removeElement($friendsGroup);
            // set the owning side to null (unless already changed)
            if ($friendsGroup->getOwner() === $this) {
                $friendsGroup->setOwner(null);
            }
        }

        return $this;
    }
}
