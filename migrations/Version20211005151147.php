<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211005151147 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE sous_taux (id INT AUTO_INCREMENT NOT NULL, id_taux_id INT DEFAULT NULL, periode_deb INT DEFAULT NULL, periode_fin INT DEFAULT NULL, INDEX IDX_E9763319EC7A527 (id_taux_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE sous_taux_periode (id INT AUTO_INCREMENT NOT NULL, id_soustaux_id INT DEFAULT NULL, montant_min INT NOT NULL, montant_max INT DEFAULT NULL, taeg DOUBLE PRECISION DEFAULT NULL, INDEX IDX_ABE1518F7164D4D4 (id_soustaux_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE sous_taux ADD CONSTRAINT FK_E9763319EC7A527 FOREIGN KEY (id_taux_id) REFERENCES taux (id)');
        $this->addSql('ALTER TABLE sous_taux_periode ADD CONSTRAINT FK_ABE1518F7164D4D4 FOREIGN KEY (id_soustaux_id) REFERENCES sous_taux (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE sous_taux_periode DROP FOREIGN KEY FK_ABE1518F7164D4D4');
        $this->addSql('DROP TABLE sous_taux');
        $this->addSql('DROP TABLE sous_taux_periode');
    }
}
