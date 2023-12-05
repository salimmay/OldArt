<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230509131043 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE offer (id INT AUTO_INCREMENT NOT NULL, instrument_id INT DEFAULT NULL, price VARCHAR(255) NOT NULL, description VARCHAR(255) NOT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', INDEX IDX_29D6873ECF11D9C (instrument_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE offer ADD CONSTRAINT FK_29D6873ECF11D9C FOREIGN KEY (instrument_id) REFERENCES instrument (id)');
        $this->addSql('ALTER TABLE instrument ADD quality INT NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE offer DROP FOREIGN KEY FK_29D6873ECF11D9C');
        $this->addSql('DROP TABLE offer');
        $this->addSql('ALTER TABLE instrument DROP quality');
    }
}
