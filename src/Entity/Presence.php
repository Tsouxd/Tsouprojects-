<?php

namespace App\Entity;

use App\Repository\PresenceRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PresenceRepository::class)]
class Presence
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'datetime', nullable: true)]
    private $dateentryday;

    #[ORM\Column(type: 'datetime', nullable: true)]
    private $dateoutday;

    #[ORM\ManyToMany(targetEntity: Employe::class, inversedBy: 'presences')]
    private $presenceemploye;

    #[ORM\ManyToMany(targetEntity: User::class, inversedBy: 'presences')]
    private $userPresent;

    #[ORM\Column(type: 'datetime_immutable', nullable: true)]
    private $createdAt;

    #[ORM\Column(type: 'datetime_immutable', nullable: true)]
    private $updatedAt;

    public function __construct()
    {
        $this->presenceemploye = new ArrayCollection();
        $this->userPresent = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDateentryday(): ?\DateTimeInterface
    {
        return $this->dateentryday;
    }

    public function setDateentryday(?\DateTimeInterface $dateentryday): self
    {
        $this->dateentryday = $dateentryday;

        return $this;
    }

    public function getDateoutday(): ?\DateTimeInterface
    {
        return $this->dateoutday;
    }

    public function setDateoutday(?\DateTimeInterface $dateoutday): self
    {
        $this->dateoutday = $dateoutday;

        return $this;
    }

    /**
     * @return Collection<int, Employe>
     */
    public function getPresenceemploye(): Collection
    {
        return $this->presenceemploye;
    }

    public function addPresenceemploye(Employe $presenceemploye): self
    {
        if (!$this->presenceemploye->contains($presenceemploye)) {
            $this->presenceemploye[] = $presenceemploye;
        }

        return $this;
    }

    public function removePresenceemploye(Employe $presenceemploye): self
    {
        $this->presenceemploye->removeElement($presenceemploye);

        return $this;
    }

    /**
     * @return Collection<int, User>
     */
    public function getUserPresent(): Collection
    {
        return $this->userPresent;
    }

    public function addUserPresent(User $userPresent): self
    {
        if (!$this->userPresent->contains($userPresent)) {
            $this->userPresent[] = $userPresent;
        }

        return $this;
    }

    public function removeUserPresent(User $userPresent): self
    {
        $this->userPresent->removeElement($userPresent);

        return $this;
    }

    public function getCreatedAt(): ?\DateTimeImmutable
    {
        return $this->createdAt;
    }

    public function setCreatedAt(?\DateTimeImmutable $createdAt): self
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    public function getUpdatedAt(): ?\DateTimeImmutable
    {
        return $this->updatedAt;
    }

    public function setUpdatedAt(?\DateTimeImmutable $updatedAt): self
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }
}
