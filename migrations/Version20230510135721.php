<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230510135721 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(180) NOT NULL, roles LONGTEXT NOT NULL COMMENT \'(DC2Type:json)\', password VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_8D93D649E7927C74 (email), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE instrument ADD user_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE instrument ADD CONSTRAINT FK_3CBF69DDA76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('CREATE INDEX IDX_3CBF69DDA76ED395 ON instrument (user_id)');
        $this->addSql('ALTER TABLE offer ADD user_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE offer ADD CONSTRAINT FK_29D6873EA76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('CREATE INDEX IDX_29D6873EA76ED395 ON offer (user_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE instrument DROP FOREIGN KEY FK_3CBF69DDA76ED395');
        $this->addSql('ALTER TABLE offer DROP FOREIGN KEY FK_29D6873EA76ED395');
        $this->addSql('DROP TABLE user');
        $this->addSql('DROP INDEX IDX_3CBF69DDA76ED395 ON instrument');
        $this->addSql('ALTER TABLE instrument DROP user_id');
        $this->addSql('DROP INDEX IDX_29D6873EA76ED395 ON offer');
        $this->addSql('ALTER TABLE offer DROP user_id');
    }
}
