<?php

namespace App\ApiResource;

use ApiPlatform\Metadata\ApiResource;
use App\Repository\PlantRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PlantRepository::class)]
#[ApiResource]
class Plant
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $commonName = null;

    #[ORM\ManyToOne(inversedBy: 'plants')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Species $species = null;

    #[ORM\Column(length: 255)]
    private ?string $lifespan = null;

    #[ORM\Column]
    private ?int $rusticity = null;

    #[ORM\Column]
    private ?int $exposure = null;

    #[ORM\Column]
    private ?int $watering = null;

    #[ORM\ManyToMany(targetEntity: Soil::class)]
    private Collection $soils;

    #[ORM\ManyToMany(targetEntity: ProductionMethod::class)]
    private Collection $productionMethods;

    #[ORM\ManyToMany(targetEntity: Harvest::class)]
    private Collection $harvests;

    #[ORM\OneToMany(mappedBy: 'plant', targetEntity: CultivationRecommendation::class, orphanRemoval: true)]
    private Collection $cultivationRecommendations;

    public function __construct()
    {
        $this->soils = new ArrayCollection();
        $this->productionMethods = new ArrayCollection();
        $this->harvests = new ArrayCollection();
        $this->cultivationRecommendations = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCommonName(): ?string
    {
        return $this->commonName;
    }

    public function setCommonName(string $commonName): self
    {
        $this->commonName = $commonName;

        return $this;
    }

    public function getSpecies(): ?Species
    {
        return $this->species;
    }

    public function setSpecies(?Species $species): self
    {
        $this->species = $species;

        return $this;
    }

    public function getLifespan(): ?string
    {
        return $this->lifespan;
    }

    public function setLifespan(string $lifespan): self
    {
        $this->lifespan = $lifespan;

        return $this;
    }

    public function getRusticity(): ?int
    {
        return $this->rusticity;
    }

    public function setRusticity(int $rusticity): self
    {
        $this->rusticity = $rusticity;

        return $this;
    }

    public function getExposure(): ?int
    {
        return $this->exposure;
    }

    public function setExposure(int $exposure): self
    {
        $this->exposure = $exposure;

        return $this;
    }

    public function getWatering(): ?int
    {
        return $this->watering;
    }

    public function setWatering(int $watering): self
    {
        $this->watering = $watering;

        return $this;
    }

    /**
     * @return Collection<int, Soil>
     */
    public function getSoils(): Collection
    {
        return $this->soils;
    }

    public function addSoil(Soil $soil): self
    {
        if (!$this->soils->contains($soil)) {
            $this->soils->add($soil);
        }

        return $this;
    }

    public function removeSoil(Soil $soil): self
    {
        $this->soils->removeElement($soil);

        return $this;
    }

    /**
     * @return Collection<int, ProductionMethod>
     */
    public function getProductionMethods(): Collection
    {
        return $this->productionMethods;
    }

    public function addProductionMethod(ProductionMethod $productionMethod): self
    {
        if (!$this->productionMethods->contains($productionMethod)) {
            $this->productionMethods->add($productionMethod);
        }

        return $this;
    }

    public function removeProductionMethod(ProductionMethod $productionMethod): self
    {
        $this->productionMethods->removeElement($productionMethod);

        return $this;
    }

    /**
     * @return Collection<int, Harvest>
     */
    public function getHarvests(): Collection
    {
        return $this->harvests;
    }

    public function addHarvest(Harvest $harvest): self
    {
        if (!$this->harvests->contains($harvest)) {
            $this->harvests->add($harvest);
        }

        return $this;
    }

    public function removeHarvest(Harvest $harvest): self
    {
        $this->harvests->removeElement($harvest);

        return $this;
    }

    /**
     * @return Collection<int, CultivationRecommendation>
     */
    public function getCultivationRecommendations(): Collection
    {
        return $this->cultivationRecommendations;
    }

    public function addCultivationRecommendation(CultivationRecommendation $cultivationRecommendation): self
    {
        if (!$this->cultivationRecommendations->contains($cultivationRecommendation)) {
            $this->cultivationRecommendations->add($cultivationRecommendation);
            $cultivationRecommendation->setPlant($this);
        }

        return $this;
    }

    public function removeCultivationRecommendation(CultivationRecommendation $cultivationRecommendation): self
    {
        if ($this->cultivationRecommendations->removeElement($cultivationRecommendation)) {
            // set the owning side to null (unless already changed)
            if ($cultivationRecommendation->getPlant() === $this) {
                $cultivationRecommendation->setPlant(null);
            }
        }

        return $this;
    }
}
