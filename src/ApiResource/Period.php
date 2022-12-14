<?php

namespace App\ApiResource;

use ApiPlatform\Metadata\ApiResource;
use App\Repository\PeriodRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PeriodRepository::class)]
#[ApiResource]
class Period
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    #[Assert\Range(min: 1, max: 12, notInRangeMessage: 'Choose a valid month.')]
    private ?int $startMonth = null;

    #[ORM\Column]
    #[Assert\Range(min: 1, max: 12, notInRangeMessage: 'Choose a valid month.')]
    private ?int $endMonth = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getStartMonth(): ?int
    {
        return $this->startMonth;
    }

    public function setStartMonth(int $startMonth): self
    {
        $this->startMonth = $startMonth;

        return $this;
    }

    public function getEndMonth(): ?int
    {
        return $this->endMonth;
    }

    public function setEndMonth(int $endMonth): self
    {
        $this->endMonth = $endMonth;

        return $this;
    }
}
