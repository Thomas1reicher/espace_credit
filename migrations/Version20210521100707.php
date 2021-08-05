<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210521100707 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE sous_type_pret (id INT AUTO_INCREMENT NOT NULL, type_pret_id INT DEFAULT NULL, name VARCHAR(255) DEFAULT NULL, taeg DOUBLE PRECISION NOT NULL, INDEX IDX_9EEAC73E33401FBE (type_pret_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE type_pret (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE sous_type_pret ADD CONSTRAINT FK_9EEAC73E33401FBE FOREIGN KEY (type_pret_id) REFERENCES type_pret (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE sous_type_pret DROP FOREIGN KEY FK_9EEAC73E33401FBE');
        $this->addSql('DROP TABLE sous_type_pret');
        $this->addSql('DROP TABLE type_pret');
    }
}
