<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250731132837 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE experience (id SERIAL NOT NULL, title VARCHAR(255) NOT NULL, company VARCHAR(255) NOT NULL, location VARCHAR(255) DEFAULT NULL, start_date DATE NOT NULL, end_date DATE DEFAULT NULL, description TEXT DEFAULT NULL, image VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE experience_technology (experience_id INT NOT NULL, technology_id INT NOT NULL, PRIMARY KEY(experience_id, technology_id))');
        $this->addSql('CREATE INDEX IDX_1BC2EDF146E90E27 ON experience_technology (experience_id)');
        $this->addSql('CREATE INDEX IDX_1BC2EDF14235D463 ON experience_technology (technology_id)');
        $this->addSql('CREATE TABLE technology (id SERIAL NOT NULL, name VARCHAR(255) NOT NULL, category VARCHAR(255) NOT NULL, logo VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('ALTER TABLE experience_technology ADD CONSTRAINT FK_1BC2EDF146E90E27 FOREIGN KEY (experience_id) REFERENCES experience (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE experience_technology ADD CONSTRAINT FK_1BC2EDF14235D463 FOREIGN KEY (technology_id) REFERENCES technology (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE experience_technology DROP CONSTRAINT FK_1BC2EDF146E90E27');
        $this->addSql('ALTER TABLE experience_technology DROP CONSTRAINT FK_1BC2EDF14235D463');
        $this->addSql('DROP TABLE experience');
        $this->addSql('DROP TABLE experience_technology');
        $this->addSql('DROP TABLE technology');
    }
}
