<?php

namespace App\Entity;

use App\Repository\HeroTypeRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=HeroTypeRepository::class)
 */
class HeroType {
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $type_name;

    /**
     * @ORM\OneToMany(targetEntity=Hero::class, mappedBy="hero_type")
     */
    private $heroes;

    public function __construct() {
        $this->heroes = new ArrayCollection();
    }

    public function getId(): ?int {
        return $this->id;
    }

    public function getTypeName(): ?string {
        return $this->type_name;
    }

    public function setTypeName(string $type_name): self {
        $this->type_name = $type_name;

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
            $hero->setHeroType($this);
        }

        return $this;
    }

    public function removeHero(Hero $hero): self {
        if ($this->heroes->removeElement($hero)) {
            // set the owning side to null (unless already changed)
            if ($hero->getHeroType() === $this) {
                $hero->setHeroType(null);
            }
        }

        return $this;
    }
}
