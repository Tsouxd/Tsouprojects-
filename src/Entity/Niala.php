<?php

namespace App\Entity;

use App\Repository\NialaRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: NialaRepository::class)]
class Niala
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $motif;

    #[ORM\Column(type: 'date', nullable: true)]
    private $date;

    #[ORM\ManyToMany(targetEntity: Employe::class, inversedBy: 'employeOut')]
    private Collection $employesniala;

    #[ORM\ManyToMany(targetEntity: User::class, inversedBy: 'nialas')]
    private $userNiala;

    public function __construct()
    {
        $this->employesniala = new ArrayCollection();
        $this->userNiala = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getMotif(): ?string
    {
        return $this->motif;
    }

    public function setMotif(?string $motif): self
    {
        $this->motif = $motif;

        return $this;
    }

    public function getDate(): ?\DateTimeInterface
    {
        return $this->date;
    }

    public function setDate(?\DateTimeInterface $date): self
    {
        $this->date = $date;

        return $this;
    }

    /**
     * @return Collection<int, Employe>
     */
    public function getEmployesniala(): Collection
    {
        return $this->employesniala;
    }

    public function addEmployesniala(Employe $employesniala): self
    {
        if (!$this->employesniala->contains($employesniala)) {
            $this->employesniala[] = $employesniala;
        }

        return $this;
    }

    public function removeEmployesniala(Employe $employesniala): self
    {
        $this->employesniala->removeElement($employesniala);

        return $this;
    }

    /**
     * @return Collection<int, User>
     */
    public function getUserNiala(): Collection
    {
        return $this->userNiala;
    }

    public function addUserNiala(User $userNiala): self
    {
        if (!$this->userNiala->contains($userNiala)) {
            $this->userNiala[] = $userNiala;
        }

        return $this;
    }

    public function removeUserNiala(User $userNiala): self
    {
        $this->userNiala->removeElement($userNiala);

        return $this;
    }
}
