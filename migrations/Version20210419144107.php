<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210419144107 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE rdv ADD titre VARCHAR(100) NOT NULL, ADD debut DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP, ADD fin DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP, ADD fond VARCHAR(7) NOT NULL, ADD bordure VARCHAR(7) NOT NULL, ADD couleur_texte VARCHAR(255) NOT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE rdv DROP titre, DROP debut, DROP fin, DROP fond, DROP bordure, DROP couleur_texte');
    }
}
