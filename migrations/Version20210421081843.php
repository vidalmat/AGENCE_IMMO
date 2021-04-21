<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210421081843 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE calendrier (id INT AUTO_INCREMENT NOT NULL, titre VARCHAR(100) NOT NULL, debut DATETIME NOT NULL, fin DATETIME NOT NULL, description LONGTEXT NOT NULL, journee TINYINT(1) NOT NULL, couleur_fond VARCHAR(7) NOT NULL, couleur_bordure VARCHAR(7) NOT NULL, couleur_texte VARCHAR(7) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE rdv DROP date, DROP motif, DROP titre, DROP debut, DROP fin, DROP fond, DROP bordure, DROP couleur_texte');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE calendrier');
        $this->addSql('ALTER TABLE rdv ADD date DATETIME NOT NULL, ADD motif VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, ADD titre VARCHAR(100) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, ADD debut DATETIME NOT NULL, ADD fin DATETIME NOT NULL, ADD fond VARCHAR(7) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, ADD bordure VARCHAR(7) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, ADD couleur_texte VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`');
    }
}
