<?php

namespace App\Controller;

use App\Entity\Hero;
use App\Entity\HeroAbility;
use App\Entity\HeroAbilityType;
use App\Entity\HeroElement;
use App\Entity\HeroFaction;
use App\Entity\HeroRarity;
use App\Entity\HeroType;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HeroesController extends AbstractController {

    #[Route('/heroes', name: 'heroes')]
    public function index(ManagerRegistry $doctrine): Response {

        $entityManager = $doctrine->getManager();

        // recuperation des informations de toutes les factions
        $factions = $entityManager->getRepository(HeroFaction::class)->findAll();

        return $this->render('heroes/index.html.twig', [
            'factions' => $factions
        ]);
    }

    #[Route('/heroes/add_ability', name: 'add_ability', methods: ['GET', 'POST'])]
    public function addAbility(ManagerRegistry $doctrine, Request $request): Response {

        // verification des droits
        if (!$this->isAdministrator()) {
            return $this->redirectToRoute('heroes', [], Response::HTTP_SEE_OTHER);
        }

        $entityManager = $doctrine->getManager();

        // recuperation des informations necessaire a l'ajout d'une competence
        $ability_types = $entityManager->getRepository(HeroAbilityType::class)->findAll();

        // recuperation des donnees envoyer en post
        $post = $request->request->all();

        if (count($post) > 0) {

            // creation de la nouvelle compétence
            $ability = new HeroAbility();
            $this->setAbility($post, $ability, $ability_types);

            // envoie des donnees a la base de donnees
            $entityManager->persist($ability);
            $entityManager->flush();

            return $this->redirectToRoute('heroes', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('heroes/add_ability.html.twig', [
            'ability_types' => $ability_types
        ]);
    }

    #[Route('/heroes/add_hero', name: 'add_hero', methods: ['GET', 'POST'])]
    public function addHero(ManagerRegistry $doctrine, Request $request): Response {

        // verification des droits
        if (!$this->isAdministrator()) {
            return $this->redirectToRoute('heroes', [], Response::HTTP_SEE_OTHER);
        }

        $entityManager = $doctrine->getManager();

        // recuperation des informations necessaire a l'ajout d'un hero
        $abilities = $entityManager->getRepository(HeroAbility::class)->findAll();
        $factions = $entityManager->getRepository(HeroFaction::class)->findAll();
        $rarities = $entityManager->getRepository(HeroRarity::class)->findAll();
        $elements = $entityManager->getRepository(HeroElement::class)->findAll();
        $types = $entityManager->getRepository(HeroType::class)->findAll();

        // recuperation des donnees envoyer en post
        $post = $request->request->all();

        if (count($post) > 0) {

            // creation du nouveau hero
            $hero = new Hero();
            $this->setHero($post, $hero, $factions, $rarities, $elements, $types, $abilities);

            // envoie des donnees a la base de donnees
            $entityManager->persist($hero);
            $entityManager->flush();

            return $this->redirectToRoute('heroes', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('heroes/add_hero.html.twig', [
            'abilities' => $abilities,
            'factions' => $factions,
            'rarities' => $rarities,
            'elements' => $elements,
            'types' => $types
        ]);
    }

    #[Route('/heroes/{faction_path}', name: 'faction')]
    public function faction(ManagerRegistry $doctrine, $faction_path): Response {

        $entityManager = $doctrine->getManager();

        // recuperation des informations de la faction selectionner
        $faction = $entityManager->getRepository(HeroFaction::class)->findOneBy(['faction_path' => $faction_path]);
        $heroes = $faction->getHeroes();

        return $this->render('heroes/faction.html.twig', [
            'faction' => $faction,
            'heroes' => $heroes
        ]);
    }

    #[Route('/heroes/{faction_path}/{hero_path}', name: 'hero')]
    public function hero(ManagerRegistry $doctrine, $faction_path, $hero_path): Response {

        $entityManager = $doctrine->getManager();

        // recuperation des informations du hero selectionner
        $faction = $entityManager->getRepository(HeroFaction::class)->findOneBy(['faction_path' => $faction_path])->getId();
        $hero = $entityManager->getRepository(Hero::class)->findOneBy(['hero_faction' => $faction, 'hero_path' => $hero_path]);
        $abilities = [$hero->getHeroTraitAbility(), $hero->getHeroBasicAbility(), $hero->getHeroSpecialAbility(), $hero->getHeroUltimateAbility()];

        return $this->render('heroes/hero.html.twig', [
            'hero' => $hero,
            'abilities' => $abilities
        ]);
    }

    #[Route('/heroes/{faction_path}/{hero_path}/edit_ability/{id}', name: 'edit_ability', methods: ['GET', 'POST'])]
    public function editAbility(ManagerRegistry $doctrine, Request $request, $faction_path, $hero_path, $id): Response {

        $entityManager = $doctrine->getManager();

        // recuperation des informations de la competence a modifier
        $hero = $entityManager->getRepository(Hero::class)->findOneBy(['hero_faction' => $entityManager->getRepository(HeroFaction::class)->findOneBy(['faction_path' => $faction_path])->getId(), 'hero_path' => $hero_path]);
        $ability = $entityManager->getRepository(HeroAbility::class)->findOneBy(['id' => $id]);
        $ability_types = $entityManager->getRepository(HeroAbilityType::class)->findAll();

        $post = $request->request->all();

        if (count($post) > 0) {

            // modification de la competence
            $this->setAbility($post, $ability, $ability_types);

            // envoie des donnees a la base de donnees
            $entityManager->persist($ability);
            $entityManager->flush();

            return $this->redirectToRoute('hero', ['faction_path' => $hero->getHeroFaction()->getFactionPath(), 'hero_path' => $hero->getHeroPath()], Response::HTTP_SEE_OTHER);
        }

        return $this->render('heroes/edit_ability.html.twig', [
            'ability' => $ability,
            'ability_types' => $ability_types
        ]);
    }

    #[Route('/heroes/{faction_path}/{hero_path}/edit_hero', name: 'edit_hero', methods: ['GET', 'POST'])]
    public function editHero(ManagerRegistry $doctrine, Request $request, $faction_path, $hero_path): Response {

        $entityManager = $doctrine->getManager();

        // recuperation des informations du hero a modifier
        $hero = $entityManager->getRepository(Hero::class)->findOneBy(['hero_faction' => $entityManager->getRepository(HeroFaction::class)->findOneBy(['faction_path' => $faction_path])->getId(), 'hero_path' => $hero_path]);
        $abilities = $entityManager->getRepository(HeroAbility::class)->findAll();
        $factions = $entityManager->getRepository(HeroFaction::class)->findAll();
        $rarities = $entityManager->getRepository(HeroRarity::class)->findAll();
        $elements = $entityManager->getRepository(HeroElement::class)->findAll();
        $types = $entityManager->getRepository(HeroType::class)->findAll();

        // recuperation des donnees envoyer en post
        $post = $request->request->all();

        if (count($post) > 0) {

            // modification du hero
            $this->setHero($post, $hero, $factions, $rarities, $elements, $types, $abilities);

            // envoie des donnees a la base de donnees
            $entityManager->persist($hero);
            $entityManager->flush();

            return $this->redirectToRoute('hero', ['faction_path' => $hero->getHeroFaction()->getFactionPath(), 'hero_path' => $hero->getHeroPath()], Response::HTTP_SEE_OTHER);
        }

        return $this->render('heroes/edit_hero.html.twig', [
            'hero' => $hero,
            'abilities' => $abilities,
            'factions' => $factions,
            'rarities' => $rarities,
            'elements' => $elements,
            'types' => $types
        ]);
    }

    #[Route('/heroes/{faction_path}/{hero_path}/delete_hero', name: 'delete_hero', methods: ['GET', 'POST'])]
    public function delete(Request $request, Hero $hero, EntityManagerInterface $entityManager): Response {
        if ($this->isCsrfTokenValid('delete'.$hero->getId(), $request->request->get('_token'))) {
            $entityManager->remove($hero);
            $entityManager->flush();
        }

        return $this->redirectToRoute('heroes', [], Response::HTTP_SEE_OTHER);
    }


    private function isEmpty(mixed $string): ?string {
        if ($string == "") {
            return null;
        } else {
            return $string;
        }
    }

    private function isAdministrator(): bool {
        if ($this->isGranted("ROLE_ADMIN")) {
            return true;
        } else {
            return false;
        }
    }

    private function setAbility(array $post, HeroAbility $ability, array $ability_types) {

        $ability->setAbilityName($post['name']);
        $ability->setAbilityType($ability_types[$post['type'] - 1]);
        $ability->setAbilityCooldown($this->isEmpty($post['cooldown']));
        $ability->setAbilityDescription($post['description']);
        $ability->setAbilityImage($post['image']);

        $ability->setAbilityLevel2($this->isEmpty($post['level_2']));
        $ability->setAbilityLevel3($this->isEmpty($post['level_3']));
        $ability->setAbilityLevel4($this->isEmpty($post['level_4']));
        $ability->setAbilityLevel5($this->isEmpty($post['level_5']));
        $ability->setAbilityLevel6($this->isEmpty($post['level_6']));
        $ability->setAbilityLevel7($this->isEmpty($post['level_7']));
        $ability->setAbilityLevel8($this->isEmpty($post['level_8']));
    }

    private function setHero(array $post, Hero $hero, array $factions, array $rarities, array $elements, array $types, array $abilities) {

        $hero->setHeroName($post['name']);
        $hero->setHeroFaction($factions[$post['faction'] - 1]);
        $hero->setHeroRarity($rarities[$post['rarity'] - 1]);
        $hero->setHeroElement($elements[$post['element'] - 1]);
        $hero->setHeroType($types[$post['type'] - 1]);
        $hero->setHeroBiography($post['biography']);

        $hero->setHeroImage($post['image']);
        $hero->setHeroPath($post['path']);

        $hero->setHeroAttack($post['attack']);
        $hero->setHeroHealth($post['health']);
        $hero->setHeroDefense($post['defense']);
        $hero->setHeroSpeed($post['speed']);
        $hero->setHeroCritRate($post['crit_rate']);
        $hero->setHeroCritDamage($post['crit_damage']);
        $hero->setHeroFocus($post['focus']);
        $hero->setHeroResistance($post['resistance']);
        $hero->setHeroAgility($post['agility']);
        $hero->setHeroPrecision($post['precision']);

        ($post['trait_ability'] != 0) ? $hero->setHeroTraitAbility($abilities[$post['trait_ability'] - 1]) : $hero->setHeroTraitAbility(null);
        $hero->setHeroBasicAbility($abilities[$post['basic_ability'] - 1]);
        ($post['special_ability'] != 0) ? $hero->setHeroSpecialAbility($abilities[$post['special_ability'] - 1]) : $hero->setHeroSpecialAbility(null);
        $hero->setHeroUltimateAbility($abilities[$post['ultimate_ability'] - 1]);
    }
}
