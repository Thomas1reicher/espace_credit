<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210720121421 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE demandecartecredit (id INT AUTO_INCREMENT NOT NULL, prenom VARCHAR(255) NOT NULL, nom VARCHAR(255) NOT NULL, sociã©tã© VARCHAR(255) DEFAULT NULL, mail VARCHAR(255) NOT NULL, tel VARCHAR(255) DEFAULT NULL, info_comp LONGTEXT DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE demandecredit (id INT AUTO_INCREMENT NOT NULL, prenom VARCHAR(255) NOT NULL, nom VARCHAR(255) NOT NULL, sociã©tã© VARCHAR(255) DEFAULT NULL, mail VARCHAR(255) NOT NULL, tel VARCHAR(255) DEFAULT NULL, info_comp VARCHAR(255) DEFAULT NULL, token VARCHAR(255) NOT NULL, secu_social VARCHAR(255) NOT NULL, num_carte_identite VARCHAR(255) NOT NULL, nationalite VARCHAR(255) NOT NULL, echeance_carte_identite VARCHAR(255) NOT NULL, file_carte_identite VARCHAR(255) NOT NULL, date_naissance VARCHAR(255) NOT NULL, pays_naissance VARCHAR(255) NOT NULL, annee_belgique VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE demandecartecredit');
        $this->addSql('DROP TABLE demandecredit');
    }
}
