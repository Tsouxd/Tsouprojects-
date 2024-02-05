<?php

namespace App\Entity;

use App\Repository\EmployeRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: EmployeRepository::class)]
class Employe
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $nomEmploye;

    #[ORM\Column(type: 'integer', nullable: true)]
    private $age;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $sexe;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $prenomEmploye;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $immatriculation;

    #[ORM\ManyToMany(targetEntity: Absence::class, mappedBy: 'employesabsent')]
    private Collection $employeIn;

    #[ORM\ManyToMany(targetEntity: Niala::class, mappedBy: 'employesniala')]
    private Collection $employeOut;

    #[ORM\Column(type: 'date', nullable: true)]
    private $datedenaissance;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $adresse;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $lieudenaissance;

    #[ORM\ManyToMany(targetEntity: Presence::class, mappedBy: 'presenceemploye')]
    private $presences;

    public function __construct()
    {
        $this->employeIn = new ArrayCollection();
        $this->employeOut = new ArrayCollection();
        $this->presences = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomEmploye(): ?string
    {
        return $this->nomEmploye;
    }

    public function setNomEmploye(?string $nomEmploye): self
    {
        $this->nomEmploye = $nomEmploye;

        return $this;
    }

    public function getAge(): ?int
    {
        return $this->age;
    }

    public function setAge(?int $age): self
    {
        $this->age = $age;

        return $this;
    }

    public function getSexe(): ?string
    {
        return $this->sexe;
    }

    public function setSexe(?string $sexe): self
    {
        $this->sexe = $sexe;

        return $this;
    }

    public function getPrenomEmploye(): ?string
    {
        return $this->prenomEmploye;
    }

    public function setPrenomEmploye(?string $prenomEmploye): self
    {
        $this->prenomEmploye = $prenomEmploye;

        return $this;
    }

    public function getImmatriculation(): ?string
    {
        return $this->immatriculation;
    }

    public function setImmatriculation(?string $immatriculation): self
    {
        $this->immatriculation = $immatriculation;

        return $this;
    }

    public function __toString(){
        return $this->prenomEmploye;
    }

    /**
     * @return Collection<int, Absence>
     */
    public function getEmployeIn(): Collection
    {
        return $this->employeIn;
    }

    public function addEmployeIn(Absence $employeIn): self
    {
        if (!$this->employeIn->contains($employeIn)) {
            $this->employeIn[] = $employeIn;
            $employeIn->addEmployesabsent($this);
        }

        return $this;
    }

    public function removeEmployeIn(Absence $employeIn): self
    {
        if ($this->employeIn->removeElement($employeIn)) {
            $employeIn->removeEmployesabsent($this);
        }

        return $this;
    }

    /**
     * @return Collection<int, Niala>
     */
    public function getEmployeOut(): Collection
    {
        return $this->employeOut;
    }

    public function addEmployeOut(Niala $employeOut): self
    {
        if (!$this->employeOut->contains($employeOut)) {
            $this->employeOut[] = $employeOut;
            $employeOut->addEmployesniala($this);
        }

        return $this;
    }

    public function removeEmployeOut(Niala $employeOut): self
    {
        if ($this->employeOut->removeElement($employeOut)) {
            $employeOut->removeEmployesniala($this);
        }

        return $this;
    }

    public function getDatedenaissance(): ?\DateTimeInterface
    {
        return $this->datedenaissance;
    }

    public function setDatedenaissance(?\DateTimeInterface $datedenaissance): self
    {
        $this->datedenaissance = $datedenaissance;

        return $this;
    }

    public function getAdresse(): ?string
    {
        return $this->adresse;
    }

    public function setAdresse(?string $adresse): self
    {
        $this->adresse = $adresse;

        return $this;
    }

    public function getLieudenaissance(): ?string
    {
        return $this->lieudenaissance;
    }

    public function setLieudenaissance(?string $lieudenaissance): self
    {
        $this->lieudenaissance = $lieudenaissance;

        return $this;
    }

    /**
     * @return Collection<int, Presence>
     */
    public function getPresences(): Collection
    {
        return $this->presences;
    }

    public function addPresence(Presence $presence): self
    {
        if (!$this->presences->contains($presence)) {
            $this->presences[] = $presence;
            $presence->addPresenceemploye($this);
        }

        return $this;
    }

    public function removePresence(Presence $presence): self
    {
        if ($this->presences->removeElement($presence)) {
            $presence->removePresenceemploye($this);
        }

        return $this;
    }
}
