<?php

namespace App\ApiResource;

use ApiPlatform\Metadata\ApiResource;
use App\Repository\ProductionMethodRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ProductionMethodRepository::class)]
#[ApiResource]
class ProductionMethod
{
    const TYPES = ['sowing in open ground', 'sowing under cover', 'sowing on hotbed', 'transplanting', 'cuttings'];

    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    #[Assert\Choice(choices: self::TYPES, message: 'Choose a valid production method type.')]
    private ?string $type = null;

    #[ORM\ManyToOne]
    #[ORM\JoinColumn(nullable: false)]
    private ?Period $period = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getType(): ?string
    {
        return $this->type;
    }

    public function setType(string $type): self
    {
        $this->type = $type;

        return $this;
    }

    public function getPeriod(): ?Period
    {
        return $this->period;
    }

    public function setPeriod(?Period $period): self
    {
        $this->period = $period;

        return $this;
    }
}
