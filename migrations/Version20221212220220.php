<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20221212220220 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE cultivation_recommendation (id INT AUTO_INCREMENT NOT NULL, plant_id INT NOT NULL, type VARCHAR(255) NOT NULL, recommendation_text LONGTEXT NOT NULL, INDEX IDX_6CED66071D935652 (plant_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE family (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE genus (id INT AUTO_INCREMENT NOT NULL, family_id INT NOT NULL, name VARCHAR(255) NOT NULL, INDEX IDX_38C5106EC35E566A (family_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE harvest (id INT AUTO_INCREMENT NOT NULL, period_id INT NOT NULL, INDEX IDX_36BDDB37EC8B7ADE (period_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE period (id INT AUTO_INCREMENT NOT NULL, start_month INT NOT NULL, end_month INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE plant (id INT AUTO_INCREMENT NOT NULL, species_id INT NOT NULL, common_name VARCHAR(255) NOT NULL, lifespan VARCHAR(255) NOT NULL, rusticity INT NOT NULL, exposure INT NOT NULL, watering INT NOT NULL, INDEX IDX_AB030D72B2A1D860 (species_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE plant_soil (plant_id INT NOT NULL, soil_id INT NOT NULL, INDEX IDX_889661FC1D935652 (plant_id), INDEX IDX_889661FCC59CE9E2 (soil_id), PRIMARY KEY(plant_id, soil_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE plant_production_method (plant_id INT NOT NULL, production_method_id INT NOT NULL, INDEX IDX_B220982D1D935652 (plant_id), INDEX IDX_B220982DBE1768BD (production_method_id), PRIMARY KEY(plant_id, production_method_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE plant_harvest (plant_id INT NOT NULL, harvest_id INT NOT NULL, INDEX IDX_4C34114E1D935652 (plant_id), INDEX IDX_4C34114E9079E5F6 (harvest_id), PRIMARY KEY(plant_id, harvest_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE production_method (id INT AUTO_INCREMENT NOT NULL, period_id INT NOT NULL, type VARCHAR(255) NOT NULL, INDEX IDX_91F9AE3DEC8B7ADE (period_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE soil (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, water_absorption INT NOT NULL, fertility INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE species (id INT AUTO_INCREMENT NOT NULL, genus_id INT NOT NULL, name VARCHAR(255) NOT NULL, INDEX IDX_A50FF71285C4074C (genus_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE messenger_messages (id BIGINT AUTO_INCREMENT NOT NULL, body LONGTEXT NOT NULL, headers LONGTEXT NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at DATETIME NOT NULL, available_at DATETIME NOT NULL, delivered_at DATETIME DEFAULT NULL, INDEX IDX_75EA56E0FB7336F0 (queue_name), INDEX IDX_75EA56E0E3BD61CE (available_at), INDEX IDX_75EA56E016BA31DB (delivered_at), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE cultivation_recommendation ADD CONSTRAINT FK_6CED66071D935652 FOREIGN KEY (plant_id) REFERENCES plant (id)');
        $this->addSql('ALTER TABLE genus ADD CONSTRAINT FK_38C5106EC35E566A FOREIGN KEY (family_id) REFERENCES family (id)');
        $this->addSql('ALTER TABLE harvest ADD CONSTRAINT FK_36BDDB37EC8B7ADE FOREIGN KEY (period_id) REFERENCES period (id)');
        $this->addSql('ALTER TABLE plant ADD CONSTRAINT FK_AB030D72B2A1D860 FOREIGN KEY (species_id) REFERENCES species (id)');
        $this->addSql('ALTER TABLE plant_soil ADD CONSTRAINT FK_889661FC1D935652 FOREIGN KEY (plant_id) REFERENCES plant (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE plant_soil ADD CONSTRAINT FK_889661FCC59CE9E2 FOREIGN KEY (soil_id) REFERENCES soil (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE plant_production_method ADD CONSTRAINT FK_B220982D1D935652 FOREIGN KEY (plant_id) REFERENCES plant (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE plant_production_method ADD CONSTRAINT FK_B220982DBE1768BD FOREIGN KEY (production_method_id) REFERENCES production_method (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE plant_harvest ADD CONSTRAINT FK_4C34114E1D935652 FOREIGN KEY (plant_id) REFERENCES plant (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE plant_harvest ADD CONSTRAINT FK_4C34114E9079E5F6 FOREIGN KEY (harvest_id) REFERENCES harvest (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE production_method ADD CONSTRAINT FK_91F9AE3DEC8B7ADE FOREIGN KEY (period_id) REFERENCES period (id)');
        $this->addSql('ALTER TABLE species ADD CONSTRAINT FK_A50FF71285C4074C FOREIGN KEY (genus_id) REFERENCES genus (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE cultivation_recommendation DROP FOREIGN KEY FK_6CED66071D935652');
        $this->addSql('ALTER TABLE genus DROP FOREIGN KEY FK_38C5106EC35E566A');
        $this->addSql('ALTER TABLE harvest DROP FOREIGN KEY FK_36BDDB37EC8B7ADE');
        $this->addSql('ALTER TABLE plant DROP FOREIGN KEY FK_AB030D72B2A1D860');
        $this->addSql('ALTER TABLE plant_soil DROP FOREIGN KEY FK_889661FC1D935652');
        $this->addSql('ALTER TABLE plant_soil DROP FOREIGN KEY FK_889661FCC59CE9E2');
        $this->addSql('ALTER TABLE plant_production_method DROP FOREIGN KEY FK_B220982D1D935652');
        $this->addSql('ALTER TABLE plant_production_method DROP FOREIGN KEY FK_B220982DBE1768BD');
        $this->addSql('ALTER TABLE plant_harvest DROP FOREIGN KEY FK_4C34114E1D935652');
        $this->addSql('ALTER TABLE plant_harvest DROP FOREIGN KEY FK_4C34114E9079E5F6');
        $this->addSql('ALTER TABLE production_method DROP FOREIGN KEY FK_91F9AE3DEC8B7ADE');
        $this->addSql('ALTER TABLE species DROP FOREIGN KEY FK_A50FF71285C4074C');
        $this->addSql('DROP TABLE cultivation_recommendation');
        $this->addSql('DROP TABLE family');
        $this->addSql('DROP TABLE genus');
        $this->addSql('DROP TABLE harvest');
        $this->addSql('DROP TABLE period');
        $this->addSql('DROP TABLE plant');
        $this->addSql('DROP TABLE plant_soil');
        $this->addSql('DROP TABLE plant_production_method');
        $this->addSql('DROP TABLE plant_harvest');
        $this->addSql('DROP TABLE production_method');
        $this->addSql('DROP TABLE soil');
        $this->addSql('DROP TABLE species');
        $this->addSql('DROP TABLE messenger_messages');
    }
}
