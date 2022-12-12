<?php

namespace App\ApiResource;

use ApiPlatform\Metadata\ApiResource;
use App\Repository\FamilyRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: FamilyRepository::class)]
#[ApiResource]
class Family
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\OneToMany(mappedBy: 'family', targetEntity: Genus::class)]
    private Collection $genuses;

    public function __construct()
    {
        $this->genuses = new ArrayCollection();
    }

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

    /**
     * @return Collection<int, Genus>
     */
    public function getGenuses(): Collection
    {
        return $this->genuses;
    }

    public function addGenus(Genus $genus): self
    {
        if (!$this->genuses->contains($genus)) {
            $this->genuses->add($genus);
            $genus->setFamily($this);
        }

        return $this;
    }

    public function removeGenus(Genus $genus): self
    {
        if ($this->genuses->removeElement($genus)) {
            // set the owning side to null (unless already changed)
            if ($genus->getFamily() === $this) {
                $genus->setFamily(null);
            }
        }

        return $this;
    }
}
