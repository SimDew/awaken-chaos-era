<?php

namespace App\Entity;

use App\Repository\HeroFactionRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=HeroFactionRepository::class)
 */
class HeroFaction {
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $faction_name;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $faction_image;

    /**
     * @ORM\OneToMany(targetEntity=Hero::class, mappedBy="hero_faction")
     */
    private $heroes;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $faction_path;

    public function __construct() {
        $this->heroes = new ArrayCollection();
    }

    public function getId(): ?int {
        return $this->id;
    }

    public function getFactionName(): ?string {
        return $this->faction_name;
    }

    public function setFactionName(string $faction_name): self {
        $this->faction_name = $faction_name;

        return $this;
    }

    public function getFactionImage(): ?string {
        return $this->faction_image;
    }

    public function setFactionImage(string $faction_image): self {
        $this->faction_image = $faction_image;

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
            $hero->setHeroFaction($this);
        }

        return $this;
    }

    public function removeHero(Hero $hero): self {
        if ($this->heroes->removeElement($hero)) {
            // set the owning side to null (unless already changed)
            if ($hero->getHeroFaction() === $this) {
                $hero->setHeroFaction(null);
            }
        }

        return $this;
    }

    public function getFactionPath(): ?string {
        return $this->faction_path;
    }

    public function setFactionPath(string $faction_path): self {
        $this->faction_path = $faction_path;

        return $this;
    }
}
