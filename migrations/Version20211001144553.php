<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211001144553 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE credit_en_cours (id INT AUTO_INCREMENT NOT NULL, type_credit VARCHAR(30) DEFAULT NULL, org_pret VARCHAR(255) DEFAULT NULL, montant VARCHAR(255) DEFAULT NULL, duree_credit VARCHAR(15) DEFAULT NULL, taux VARCHAR(20) DEFAULT NULL, montant_echeance VARCHAR(20) DEFAULT NULL, date_debut DATE DEFAULT NULL, solde VARCHAR(20) DEFAULT NULL, montant_achat VARCHAR(25) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE credit_en_cours');
    }
}
