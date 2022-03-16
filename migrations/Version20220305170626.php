<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220305170626 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE hero CHANGE hero_trait_ability_id hero_trait_ability_id INT NOT NULL, CHANGE hero_special_ability_id hero_special_ability_id INT NOT NULL');
        $this->addSql('ALTER TABLE hero_ability ADD ability_cooldown INT DEFAULT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE hero CHANGE hero_trait_ability_id hero_trait_ability_id INT DEFAULT NULL, CHANGE hero_special_ability_id hero_special_ability_id INT DEFAULT NULL, CHANGE hero_name hero_name VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE hero_image hero_image VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE hero_biography hero_biography LONGTEXT NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE hero_path hero_path VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE hero_ability DROP ability_cooldown, CHANGE ability_name ability_name VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE ability_image ability_image VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE ability_description ability_description LONGTEXT NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE ability_level_2 ability_level_2 LONGTEXT NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE ability_level_3 ability_level_3 VARCHAR(255) DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE ability_level_4 ability_level_4 VARCHAR(255) DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE ability_level_5 ability_level_5 VARCHAR(255) DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE ability_level_6 ability_level_6 VARCHAR(255) DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE ability_level_7 ability_level_7 VARCHAR(255) DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE ability_level_8 ability_level_8 VARCHAR(255) DEFAULT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE hero_ability_type CHANGE ability_type_name ability_type_name VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE hero_element CHANGE element_name element_name VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE hero_faction CHANGE faction_name faction_name VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE faction_image faction_image VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE faction_path faction_path VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE hero_rarity CHANGE rarity_name rarity_name VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE hero_type CHANGE type_name type_name VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE user CHANGE email email VARCHAR(180) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE password password VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`');
    }
}
