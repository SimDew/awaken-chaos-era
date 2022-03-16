<?php

namespace App\Entity;

use App\Repository\HeroAbilityRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=HeroAbilityRepository::class)
 */
class HeroAbility {
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $ability_name;

    /**
     * @ORM\ManyToOne(targetEntity=HeroAbilityType::class, inversedBy="heroeAbilities")
     * @ORM\JoinColumn(nullable=false)
     */
    private $ability_type;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $ability_image;

    /**
     * @ORM\Column(type="text")
     */
    private $ability_description;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $ability_cooldown;

    /**
     * @ORM\Column(type="text")
     */
    private $ability_level_2;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $ability_level_3;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $ability_level_4;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $ability_level_5;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $ability_level_6;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $ability_level_7;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $ability_level_8;

    public function getId(): ?int {
        return $this->id;
    }

    public function getAbilityName(): ?string {
        return $this->ability_name;
    }

    public function setAbilityName(string $ability_name): self {
        $this->ability_name = $ability_name;

        return $this;
    }

    public function getAbilityType(): ?HeroAbilityType {
        return $this->ability_type;
    }

    public function setAbilityType(?HeroAbilityType $ability_type): self {
        $this->ability_type = $ability_type;

        return $this;
    }

    public function getAbilityImage(): ?string {
        return $this->ability_image;
    }

    public function setAbilityImage(string $ability_image): self {
        $this->ability_image = $ability_image;

        return $this;
    }

    public function getAbilityDescription(): ?string {
        return $this->ability_description;
    }

    public function setAbilityDescription(string $ability_description): self {
        $this->ability_description = $ability_description;

        return $this;
    }

    public function getAbilityCooldown(): ?int {
        return $this->ability_cooldown;
    }

    public function setAbilityCooldown(?int $ability_cooldown): self {
        $this->ability_cooldown = $ability_cooldown;

        return $this;
    }

    public function getAbilityLevel2(): ?string {
        return $this->ability_level_2;
    }

    public function setAbilityLevel2(?string $ability_level_2): self {
        $this->ability_level_2 = $ability_level_2;

        return $this;
    }

    public function getAbilityLevel3(): ?string {
        return $this->ability_level_3;
    }

    public function setAbilityLevel3(?string $ability_level_3): self {
        $this->ability_level_3 = $ability_level_3;

        return $this;
    }

    public function getAbilityLevel4(): ?string {
        return $this->ability_level_4;
    }

    public function setAbilityLevel4(?string $ability_level_4): self {
        $this->ability_level_4 = $ability_level_4;

        return $this;
    }

    public function getAbilityLevel5(): ?string {
        return $this->ability_level_5;
    }

    public function setAbilityLevel5(?string $ability_level_5): self {
        $this->ability_level_5 = $ability_level_5;

        return $this;
    }

    public function getAbilityLevel6(): ?string {
        return $this->ability_level_6;
    }

    public function setAbilityLevel6(?string $ability_level_6): self {
        $this->ability_level_6 = $ability_level_6;

        return $this;
    }

    public function getAbilityLevel7(): ?string {
        return $this->ability_level_7;
    }

    public function setAbilityLevel7(?string $ability_level_7): self {
        $this->ability_level_7 = $ability_level_7;

        return $this;
    }

    public function getAbilityLevel8(): ?string {
        return $this->ability_level_8;
    }

    public function setAbilityLevel8(?string $ability_level_8): self {
        $this->ability_level_8 = $ability_level_8;

        return $this;
    }
}
