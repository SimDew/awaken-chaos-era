<?php

namespace App\Entity;

use App\Repository\HeroRarityRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=HeroRarityRepository::class)
 */
class HeroRarity {
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $rarity_name;

    /**
     * @ORM\OneToMany(targetEntity=Hero::class, mappedBy="hero_rarity")
     */
    private $heroes;

    public function __construct() {
        $this->heroes = new ArrayCollection();
    }

    public function getId(): ?int {
        return $this->id;
    }

    public function getRarityName(): ?string {
        return $this->rarity_name;
    }

    public function setRarityName(string $rarity_name): self {
        $this->rarity_name = $rarity_name;

        return $this;
    }

    /**
     * @return Collection<int, Hero>
     */
    public function getHeroes(): Collection {
        return $this->heroes;
    }

    public function addHero(Hero $hero): self {
        if (!$this->heroes->contains($hero)) {
            $this->heroes[] = $hero;
            $hero->setHeroRarity($this);
        }

        return $this;
    }

    public function removeHero(Hero $hero): self {
        if ($this->heroes->removeElement($hero)) {
            // set the owning side to null (unless already changed)
            if ($hero->getHeroRarity() === $this) {
                $hero->setHeroRarity(null);
            }
        }

        return $this;
    }
}
