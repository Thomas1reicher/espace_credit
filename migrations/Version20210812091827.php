<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210812091827 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE taux ADD credit_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE taux ADD CONSTRAINT FK_809A3D7DCE062FF9 FOREIGN KEY (credit_id) REFERENCES credit (id)');
        $this->addSql('CREATE INDEX IDX_809A3D7DCE062FF9 ON taux (credit_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE taux DROP FOREIGN KEY FK_809A3D7DCE062FF9');
        $this->addSql('DROP INDEX IDX_809A3D7DCE062FF9 ON taux');
        $this->addSql('ALTER TABLE taux DROP credit_id');
    }
}
