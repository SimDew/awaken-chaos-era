<?php

namespace App\Entity;

use App\Repository\HeroAbilityTypeRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=HeroAbilityTypeRepository::class)
 */
class HeroAbilityType {
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $ability_type_name;

    /**
     * @ORM\OneToMany(targetEntity=HeroAbility::class, mappedBy="ability_type")
     */
    private $heroAbilities;

    public function __construct() {
        $this->heroAbilities = new ArrayCollection();
    }

    public function getId(): ?int {
        return $this->id;
    }

    public function getAbilityTypeName(): ?string {
        return $this->ability_type_name;
    }

    public function setAbilityTypeName(string $ability_type_name): self {
        $this->ability_type_name = $ability_type_name;

        return $this;
    }

    /**
     * @return Collection<int, HeroAbility>
     */
    public function getHeroAbilities(): Collection {
        return $this->heroAbilities;
    }

    public function addHeroAbility(HeroAbility $heroAbility): self {
        if (!$this->heroAbilities->contains($heroAbility)) {
            $this->heroAbilities[] = $heroAbility;
            $heroAbility->setAbilityType($this);
        }

        return $this;
    }

    public function removeHeroAbility(HeroAbility $heroAbility): self {
        if ($this->heroAbilities->removeElement($heroAbility)) {
            // set the owning side to null (unless already changed)
            if ($heroAbility->getAbilityType() === $this) {
                $heroAbility->setAbilityType(null);
            }
        }

        return $this;
    }
}
