<?php

namespace App\ApiResource;

use ApiPlatform\Metadata\ApiResource;
use App\Repository\SoilRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: SoilRepository::class)]
#[ApiResource]
class Soil
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\Column]
    private ?int $waterAbsorption = null;

    #[ORM\Column]
    private ?int $fertility = null;

    public function getId(): ?int
    {
        return $this->id;
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

    public function getWaterAbsorption(): ?int
    {
        return $this->waterAbsorption;
    }

    public function setWaterAbsorption(int $waterAbsorption): self
    {
        $this->waterAbsorption = $waterAbsorption;

        return $this;
    }

    public function getFertility(): ?int
    {
        return $this->fertility;
    }

    public function setFertility(int $fertility): self
    {
        $this->fertility = $fertility;

        return $this;
    }
}
