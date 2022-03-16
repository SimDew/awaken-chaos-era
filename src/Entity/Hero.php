<?php

namespace App\Entity;

use App\Repository\HeroRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=HeroRepository::class)
 */
class Hero {
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $hero_name;

    /**
     * @ORM\ManyToOne(targetEntity=HeroFaction::class, inversedBy="heroes")
     * @ORM\JoinColumn(nullable=false)
     */
    private $hero_faction;

    /**
     * @ORM\ManyToOne(targetEntity=HeroRarity::class, inversedBy="heroes")
     * @ORM\JoinColumn(nullable=false)
     */
    private $hero_rarity;

    /**
     * @ORM\ManyToOne(targetEntity=HeroElement::class, inversedBy="heroes")
     * @ORM\JoinColumn(nullable=false)
     */
    private $hero_element;

    /**
     * @ORM\ManyToOne(targetEntity=HeroType::class, inversedBy="heroes")
     * @ORM\JoinColumn(nullable=false)
     */
    private $hero_type;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $hero_image;

    /**
     * @ORM\Column(type="text")
     */
    private $hero_biography;

    /**
     * @ORM\Column(type="integer")
     */
    private $hero_attack;

    /**
     * @ORM\Column(type="integer")
     */
    private $hero_health;

    /**
     * @ORM\Column(type="integer")
     */
    private $hero_defense;

    /**
     * @ORM\Column(type="integer")
     */
    private $hero_speed;

    /**
     * @ORM\Column(type="integer")
     */
    private $hero_crit_rate;

    /**
     * @ORM\Column(type="integer")
     */
    private $hero_crit_damage;

    /**
     * @ORM\Column(type="integer")
     */
    private $hero_focus;

    /**
     * @ORM\Column(type="integer")
     */
    private $hero_resistance;

    /**
     * @ORM\Column(type="integer")
     */
    private $hero_agility;

    /**
     * @ORM\Column(type="integer")
     */
    private $hero_precision;

    /**
     * @ORM\ManyToOne(targetEntity=HeroAbility::class)
     * @ORM\JoinColumn(nullable=true)
     */
    private $hero_trait_ability;

    /**
     * @ORM\ManyToOne(targetEntity=HeroAbility::class)
     * @ORM\JoinColumn(nullable=false)
     */
    private $hero_basic_ability;

    /**
     * @ORM\ManyToOne(targetEntity=HeroAbility::class)
     * @ORM\JoinColumn(nullable=true)
     */
    private $hero_special_ability;

    /**
     * @ORM\ManyToOne(targetEntity=HeroAbility::class)
     * @ORM\JoinColumn(nullable=false)
     */
    private $hero_ultimate_ability;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $hero_path;

    public function getId(): ?int {
        return $this->id;
    }

    public function getHeroName(): ?string {
        return $this->hero_name;
    }

    public function setHeroName(string $hero_name): self {
        $this->hero_name = $hero_name;

        return $this;
    }

    public function getHeroFaction(): ?HeroFaction {
        return $this->hero_faction;
    }

    public function setHeroFaction(?HeroFaction $hero_faction): self {
        $this->hero_faction = $hero_faction;

        return $this;
    }

    public function getHeroRarity(): ?HeroRarity {
        return $this->hero_rarity;
    }

    public function setHeroRarity(?HeroRarity $hero_rarity): self {
        $this->hero_rarity = $hero_rarity;

        return $this;
    }

    public function getHeroElement(): ?HeroElement {
        return $this->hero_element;
    }

    public function setHeroElement(?HeroElement $hero_element): self {
        $this->hero_element = $hero_element;

        return $this;
    }

    public function getHeroType(): ?HeroType {
        return $this->hero_type;
    }

    public function setHeroType(?HeroType $hero_type): self {
        $this->hero_type = $hero_type;

        return $this;
    }

    public function getHeroImage(): ?string {
        return $this->hero_image;
    }

    public function setHeroImage(string $hero_image): self {
        $this->hero_image = $hero_image;

        return $this;
    }

    public function getHeroBiography(): ?string {
        return $this->hero_biography;
    }

    public function setHeroBiography(string $hero_biography): self {
        $this->hero_biography = $hero_biography;

        return $this;
    }

    public function getHeroAttack(): ?int {
        return $this->hero_attack;
    }

    public function setHeroAttack(int $hero_attack): self {
        $this->hero_attack = $hero_attack;

        return $this;
    }

    public function getHeroHealth(): ?int {
        return $this->hero_health;
    }

    public function setHeroHealth(int $hero_health): self {
        $this->hero_health = $hero_health;

        return $this;
    }

    public function getHeroDefense(): ?int {
        return $this->hero_defense;
    }

    public function setHeroDefense(int $hero_defense): self {
        $this->hero_defense = $hero_defense;

        return $this;
    }

    public function getHeroSpeed(): ?int {
        return $this->hero_speed;
    }

    public function setHeroSpeed(int $hero_speed): self {
        $this->hero_speed = $hero_speed;

        return $this;
    }

    public function getHeroCritRate(): ?int {
        return $this->hero_crit_rate;
    }

    public function setHeroCritRate(int $hero_crit_rate): self {
        $this->hero_crit_rate = $hero_crit_rate;

        return $this;
    }

    public function getHeroCritDamage(): ?int {
        return $this->hero_crit_damage;
    }

    public function setHeroCritDamage(int $hero_crit_damage): self {
        $this->hero_crit_damage = $hero_crit_damage;

        return $this;
    }

    public function getHeroFocus(): ?int {
        return $this->hero_focus;
    }

    public function setHeroFocus(int $hero_focus): self {
        $this->hero_focus = $hero_focus;

        return $this;
    }

    public function getHeroResistance(): ?int {
        return $this->hero_resistance;
    }

    public function setHeroResistance(int $hero_resistance): self {
        $this->hero_resistance = $hero_resistance;

        return $this;
    }

    public function getHeroAgility(): ?int {
        return $this->hero_agility;
    }

    public function setHeroAgility(int $hero_agility): self {
        $this->hero_agility = $hero_agility;

        return $this;
    }

    public function getHeroPrecision(): ?int {
        return $this->hero_precision;
    }

    public function setHeroPrecision(int $hero_precision): self {
        $this->hero_precision = $hero_precision;

        return $this;
    }

    public function getHeroTraitAbility(): ?HeroAbility {
        return $this->hero_trait_ability;
    }

    public function setHeroTraitAbility(?HeroAbility $hero_trait_ability): self {
        $this->hero_trait_ability = $hero_trait_ability;

        return $this;
    }

    public function getHeroBasicAbility(): ?HeroAbility {
        return $this->hero_basic_ability;
    }

    public function setHeroBasicAbility(?HeroAbility $hero_basic_ability): self {
        $this->hero_basic_ability = $hero_basic_ability;

        return $this;
    }

    public function getHeroSpecialAbility(): ?HeroAbility {
        return $this->hero_special_ability;
    }

    public function setHeroSpecialAbility(?HeroAbility $hero_special_ability): self {
        $this->hero_special_ability = $hero_special_ability;

        return $this;
    }

    public function getHeroUltimateAbility(): ?HeroAbility {
        return $this->hero_ultimate_ability;
    }

    public function setHeroUltimateAbility(?HeroAbility $hero_ultimate_ability): self {
        $this->hero_ultimate_ability = $hero_ultimate_ability;

        return $this;
    }

    public function getHeroPath(): ?string {
        return $this->hero_path;
    }

    public function setHeroPath(string $hero_path): self {
        $this->hero_path = $hero_path;

        return $this;
    }
}
