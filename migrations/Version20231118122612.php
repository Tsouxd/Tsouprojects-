<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20231118122612 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE absence CHANGE motif motif VARCHAR(255) DEFAULT NULL, CHANGE date date DATE DEFAULT NULL');
        $this->addSql('ALTER TABLE employe CHANGE nom_employe nom_employe VARCHAR(255) DEFAULT NULL, CHANGE sexe sexe VARCHAR(255) DEFAULT NULL, CHANGE prenom_employe prenom_employe VARCHAR(255) DEFAULT NULL, CHANGE immatriculation immatriculation VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE niala CHANGE motif motif VARCHAR(255) DEFAULT NULL, CHANGE date date DATE DEFAULT NULL');
        $this->addSql('ALTER TABLE messenger_messages CHANGE delivered_at delivered_at DATETIME DEFAULT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE absence CHANGE motif motif VARCHAR(255) DEFAULT \'NULL\', CHANGE date date DATE DEFAULT \'NULL\'');
        $this->addSql('ALTER TABLE employe CHANGE nom_employe nom_employe VARCHAR(255) DEFAULT \'NULL\', CHANGE sexe sexe VARCHAR(255) DEFAULT \'NULL\', CHANGE prenom_employe prenom_employe VARCHAR(255) DEFAULT \'NULL\', CHANGE immatriculation immatriculation VARCHAR(255) DEFAULT \'NULL\'');
        $this->addSql('ALTER TABLE messenger_messages CHANGE delivered_at delivered_at DATETIME DEFAULT \'NULL\'');
        $this->addSql('ALTER TABLE niala CHANGE motif motif VARCHAR(255) DEFAULT \'NULL\', CHANGE date date DATE DEFAULT \'NULL\'');
    }
}
