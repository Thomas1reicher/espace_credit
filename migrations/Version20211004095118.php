<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211004095118 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE credit_en_cours ADD demande_credit_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE credit_en_cours ADD CONSTRAINT FK_4B7B3E93BB2AD52C FOREIGN KEY (demande_credit_id) REFERENCES demandecredit (id)');
        $this->addSql('CREATE INDEX IDX_4B7B3E93BB2AD52C ON credit_en_cours (demande_credit_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE credit_en_cours DROP FOREIGN KEY FK_4B7B3E93BB2AD52C');
        $this->addSql('DROP INDEX IDX_4B7B3E93BB2AD52C ON credit_en_cours');
        $this->addSql('ALTER TABLE credit_en_cours DROP demande_credit_id');
    }
}
