<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210924075444 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE personne_charge ADD demande_credit_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE personne_charge ADD CONSTRAINT FK_61119CD9BB2AD52C FOREIGN KEY (demande_credit_id) REFERENCES demandecredit (id)');
        $this->addSql('CREATE INDEX IDX_61119CD9BB2AD52C ON personne_charge (demande_credit_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE personne_charge DROP FOREIGN KEY FK_61119CD9BB2AD52C');
        $this->addSql('DROP INDEX IDX_61119CD9BB2AD52C ON personne_charge');
        $this->addSql('ALTER TABLE personne_charge DROP demande_credit_id');
    }
}
