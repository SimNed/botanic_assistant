<?php

namespace App\ApiResource;

use ApiPlatform\Metadata\ApiResource;
use App\Repository\CultivationRecommendationRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CultivationRecommendationRepository::class)]
#[ApiResource]
class CultivationRecommendation
{
    const TYPES = ['soil', 'production', 'culture', 'harvest'];

    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    #[Assert\Choice(choices: self::TYPES, message: 'Choose a valid type.')]
    private ?string $type = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $recommendationText = null;

    #[ORM\ManyToOne(inversedBy: 'cultivationRecommendations')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Plant $plant = null;

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

    public function getRecommendationText(): ?string
    {
        return $this->recommendationText;
    }

    public function setRecommendationText(string $recommendationText): self
    {
        $this->recommendationText = $recommendationText;

        return $this;
    }

    public function getPlant(): ?Plant
    {
        return $this->plant;
    }

    public function setPlant(?Plant $plant): self
    {
        $this->plant = $plant;

        return $this;
    }
}
