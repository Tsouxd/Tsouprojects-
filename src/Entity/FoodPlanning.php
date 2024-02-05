<?php

namespace App\Entity;

use App\Repository\FoodPlanningRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: FoodPlanningRepository::class)]
class FoodPlanning
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'date')]
    private $datefood;

    #[ORM\Column(type: 'string', length: 255)]
    private $name;

    #[ORM\Column(type: 'string', length: 255)]
    private $TypeFood;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDatefood(): ?\DateTimeInterface
    {
        return $this->datefood;
    }

    public function setDatefood(\DateTimeInterface $datefood): self
    {
        $this->datefood = $datefood;

        return $this;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getTypeFood(): ?string
    {
        return $this->TypeFood;
    }

    public function setTypeFood(string $TypeFood): self
    {
        $this->TypeFood = $TypeFood;

        return $this;
    }
}
