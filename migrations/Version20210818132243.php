<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210818132243 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE demandecredit CHANGE token token VARCHAR(255) DEFAULT NULL, CHANGE secu_social secu_social VARCHAR(255) DEFAULT NULL, CHANGE num_carte_identite num_carte_identite VARCHAR(255) DEFAULT NULL, CHANGE nationalite nationalite VARCHAR(255) DEFAULT NULL, CHANGE echeance_carte_identite echeance_carte_identite VARCHAR(255) DEFAULT NULL, CHANGE file_carte_identite file_carte_identite VARCHAR(255) DEFAULT NULL, CHANGE date_naissance date_naissance VARCHAR(255) DEFAULT NULL, CHANGE pays_naissance pays_naissance VARCHAR(255) DEFAULT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE demandecredit CHANGE token token VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE secu_social secu_social VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE num_carte_identite num_carte_identite VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE nationalite nationalite VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE echeance_carte_identite echeance_carte_identite VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE file_carte_identite file_carte_identite VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE date_naissance date_naissance VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE pays_naissance pays_naissance VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`');
    }
}
