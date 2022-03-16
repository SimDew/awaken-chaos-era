<?php

namespace App\Entity;

use App\Repository\HeroElementRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=HeroElementRepository::class)
 */
class HeroElement {
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $element_name;

    /**
     * @ORM\OneToMany(targetEntity=Hero::class, mappedBy="hero_element")
     */
    private $heroes;

    public function __construct() {
        $this->heroes = new ArrayCollection();
    }

    public function getId(): ?int {
        return $this->id;
    }

    public function getElementName(): ?string {
        return $this->element_name;
    }

    public function setElementName(string $element_name): self {
        $this->element_name = $element_name;

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
            $hero->setHeroElement($this);
        }

        return $this;
    }

    public function removeHero(Hero $hero): self {
        if ($this->heroes->removeElement($hero)) {
            // set the owning side to null (unless already changed)
            if ($hero->getHeroElement() === $this) {
                $hero->setHeroElement(null);
            }
        }

        return $this;
    }
}
