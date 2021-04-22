<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210422132532 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE calendrier ADD client_id INT DEFAULT NULL, ADD agent_id INT DEFAULT NULL, DROP client');
        $this->addSql('ALTER TABLE calendrier ADD CONSTRAINT FK_B2753CB919EB6921 FOREIGN KEY (client_id) REFERENCES client (id)');
        $this->addSql('ALTER TABLE calendrier ADD CONSTRAINT FK_B2753CB93414710B FOREIGN KEY (agent_id) REFERENCES agent (id)');
        $this->addSql('CREATE INDEX IDX_B2753CB919EB6921 ON calendrier (client_id)');
        $this->addSql('CREATE INDEX IDX_B2753CB93414710B ON calendrier (agent_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE calendrier DROP FOREIGN KEY FK_B2753CB919EB6921');
        $this->addSql('ALTER TABLE calendrier DROP FOREIGN KEY FK_B2753CB93414710B');
        $this->addSql('DROP INDEX IDX_B2753CB919EB6921 ON calendrier');
        $this->addSql('DROP INDEX IDX_B2753CB93414710B ON calendrier');
        $this->addSql('ALTER TABLE calendrier ADD client VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, DROP client_id, DROP agent_id');
    }
}
