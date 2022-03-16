<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220226230224 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE hero (id INT AUTO_INCREMENT NOT NULL, hero_faction_id INT NOT NULL, hero_rarity_id INT NOT NULL, hero_element_id INT NOT NULL, hero_type_id INT NOT NULL, hero_trait_ability_id INT NOT NULL, hero_basic_ability_id INT NOT NULL, hero_special_ability_id INT NOT NULL, hero_ultimate_ability_id INT NOT NULL, hero_name VARCHAR(255) NOT NULL, hero_image VARCHAR(255) NOT NULL, hero_biography LONGTEXT NOT NULL, hero_attack INT NOT NULL, hero_health INT NOT NULL, hero_defense INT NOT NULL, hero_speed INT NOT NULL, hero_crit_rate INT NOT NULL, hero_crit_damage INT NOT NULL, hero_focus INT NOT NULL, hero_resistance INT NOT NULL, hero_agility INT NOT NULL, hero_precision INT NOT NULL, INDEX IDX_51CE6E869EF0E83F (hero_faction_id), INDEX IDX_51CE6E862BDC4018 (hero_rarity_id), INDEX IDX_51CE6E86C5A73AC1 (hero_element_id), INDEX IDX_51CE6E86D1484FB4 (hero_type_id), INDEX IDX_51CE6E86A58992 (hero_trait_ability_id), INDEX IDX_51CE6E861F50D76C (hero_basic_ability_id), INDEX IDX_51CE6E86FD44BD29 (hero_special_ability_id), INDEX IDX_51CE6E86D55938C1 (hero_ultimate_ability_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE hero_ability (id INT AUTO_INCREMENT NOT NULL, ability_type_id INT NOT NULL, ability_name VARCHAR(255) NOT NULL, ability_image VARCHAR(255) NOT NULL, ability_description LONGTEXT NOT NULL, ability_level_2 LONGTEXT DEFAULT NULL, ability_level_3 VARCHAR(255) DEFAULT NULL, ability_level_4 VARCHAR(255) DEFAULT NULL, ability_level_5 VARCHAR(255) DEFAULT NULL, ability_level_6 VARCHAR(255) DEFAULT NULL, ability_level_7 VARCHAR(255) DEFAULT NULL, ability_level_8 VARCHAR(255) DEFAULT NULL, INDEX IDX_21CB2D1BB9866D01 (ability_type_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE hero_ability_type (id INT AUTO_INCREMENT NOT NULL, ability_type_name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE hero_element (id INT AUTO_INCREMENT NOT NULL, element_name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE hero_faction (id INT AUTO_INCREMENT NOT NULL, faction_name VARCHAR(255) NOT NULL, faction_image VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE hero_rarity (id INT AUTO_INCREMENT NOT NULL, rarity_name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE hero_type (id INT AUTO_INCREMENT NOT NULL, type_name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(180) NOT NULL, roles JSON NOT NULL, password VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_8D93D649E7927C74 (email), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE hero ADD CONSTRAINT FK_51CE6E869EF0E83F FOREIGN KEY (hero_faction_id) REFERENCES hero_faction (id)');
        $this->addSql('ALTER TABLE hero ADD CONSTRAINT FK_51CE6E862BDC4018 FOREIGN KEY (hero_rarity_id) REFERENCES hero_rarity (id)');
        $this->addSql('ALTER TABLE hero ADD CONSTRAINT FK_51CE6E86C5A73AC1 FOREIGN KEY (hero_element_id) REFERENCES hero_element (id)');
        $this->addSql('ALTER TABLE hero ADD CONSTRAINT FK_51CE6E86D1484FB4 FOREIGN KEY (hero_type_id) REFERENCES hero_type (id)');
        $this->addSql('ALTER TABLE hero ADD CONSTRAINT FK_51CE6E86A58992 FOREIGN KEY (hero_trait_ability_id) REFERENCES hero_ability (id)');
        $this->addSql('ALTER TABLE hero ADD CONSTRAINT FK_51CE6E861F50D76C FOREIGN KEY (hero_basic_ability_id) REFERENCES hero_ability (id)');
        $this->addSql('ALTER TABLE hero ADD CONSTRAINT FK_51CE6E86FD44BD29 FOREIGN KEY (hero_special_ability_id) REFERENCES hero_ability (id)');
        $this->addSql('ALTER TABLE hero ADD CONSTRAINT FK_51CE6E86D55938C1 FOREIGN KEY (hero_ultimate_ability_id) REFERENCES hero_ability (id)');
        $this->addSql('ALTER TABLE hero_ability ADD CONSTRAINT FK_21CB2D1BB9866D01 FOREIGN KEY (ability_type_id) REFERENCES hero_ability_type (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE hero DROP FOREIGN KEY FK_51CE6E86A58992');
        $this->addSql('ALTER TABLE hero DROP FOREIGN KEY FK_51CE6E861F50D76C');
        $this->addSql('ALTER TABLE hero DROP FOREIGN KEY FK_51CE6E86FD44BD29');
        $this->addSql('ALTER TABLE hero DROP FOREIGN KEY FK_51CE6E86D55938C1');
        $this->addSql('ALTER TABLE hero_ability DROP FOREIGN KEY FK_21CB2D1BB9866D01');
        $this->addSql('ALTER TABLE hero DROP FOREIGN KEY FK_51CE6E86C5A73AC1');
        $this->addSql('ALTER TABLE hero DROP FOREIGN KEY FK_51CE6E869EF0E83F');
        $this->addSql('ALTER TABLE hero DROP FOREIGN KEY FK_51CE6E862BDC4018');
        $this->addSql('ALTER TABLE hero DROP FOREIGN KEY FK_51CE6E86D1484FB4');
        $this->addSql('DROP TABLE hero');
        $this->addSql('DROP TABLE hero_ability');
        $this->addSql('DROP TABLE hero_ability_type');
        $this->addSql('DROP TABLE hero_element');
        $this->addSql('DROP TABLE hero_faction');
        $this->addSql('DROP TABLE hero_rarity');
        $this->addSql('DROP TABLE hero_type');
        $this->addSql('DROP TABLE user');
    }
}
