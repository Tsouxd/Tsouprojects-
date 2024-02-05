<?php

namespace App\Entity;

use App\Repository\AbsenceRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: AbsenceRepository::class)]
class Absence
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $motif;

    #[ORM\Column(type: 'date', nullable: true)]
    private $date;

    #[ORM\ManyToMany(targetEntity: Employe::class, inversedBy: 'employeIn')]
    private Collection $employesabsent;

    #[ORM\ManyToMany(targetEntity: User::class, inversedBy: 'absences')]
    private $userAbsent;

    public function __construct()
    {
        $this->employesabsent = new ArrayCollection();
        $this->userAbsent = new ArrayCollection();
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
    public function getEmployesabsent(): Collection
    {
        return $this->employesabsent;
    }

    public function addEmployesabsent(Employe $employesabsent): self
    {
        if (!$this->employesabsent->contains($employesabsent)) {
            $this->employesabsent[] = $employesabsent;
        }

        return $this;
    }

    public function removeEmployesabsent(Employe $employesabsent): self
    {
        $this->employesabsent->removeElement($employesabsent);

        return $this;
    }

    /**
     * @return Collection<int, User>
     */
    public function getUserAbsent(): Collection
    {
        return $this->userAbsent;
    }

    public function addUserAbsent(User $userAbsent): self
    {
        if (!$this->userAbsent->contains($userAbsent)) {
            $this->userAbsent[] = $userAbsent;
        }

        return $this;
    }

    public function removeUserAbsent(User $userAbsent): self
    {
        $this->userAbsent->removeElement($userAbsent);

        return $this;
    }
}
