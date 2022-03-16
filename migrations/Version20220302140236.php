<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220302140236 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE hero ADD hero_path VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE hero_ability CHANGE ability_level_2 ability_level_2 LONGTEXT NOT NULL');
        $this->addSql('ALTER TABLE hero_faction ADD faction_path VARCHAR(255) NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE hero DROP hero_path, CHANGE hero_name hero_name VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE hero_image hero_image VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE hero_biography hero_biography LONGTEXT NOT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE hero_ability CHANGE ability_name ability_name VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE ability_image ability_image VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE ability_description ability_description LONGTEXT NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE ability_level_2 ability_level_2 LONGTEXT DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE ability_level_3 ability_level_3 VARCHAR(255) DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE ability_level_4 ability_level_4 VARCHAR(255) DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE ability_level_5 ability_level_5 VARCHAR(255) DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE ability_level_6 ability_level_6 VARCHAR(255) DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE ability_level_7 ability_level_7 VARCHAR(255) DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE ability_level_8 ability_level_8 VARCHAR(255) DEFAULT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE hero_ability_type CHANGE ability_type_name ability_type_name VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE hero_element CHANGE element_name element_name VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE hero_faction DROP faction_path, CHANGE faction_name faction_name VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE faction_image faction_image VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE hero_rarity CHANGE rarity_name rarity_name VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE hero_type CHANGE type_name type_name VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE user CHANGE email email VARCHAR(180) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE password password VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`');
    }
}
