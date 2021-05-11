<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210511082343 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE agent DROP FOREIGN KEY FK_268B9C9D4CCE3F86');
        $this->addSql('DROP INDEX IDX_268B9C9D4CCE3F86 ON agent');
        $this->addSql('ALTER TABLE agent DROP rdv_id');
        $this->addSql('ALTER TABLE client DROP FOREIGN KEY FK_C74404554CCE3F86');
        $this->addSql('DROP INDEX UNIQ_C7440455A625945B ON client');
        $this->addSql('DROP INDEX UNIQ_C7440455F037AB0F ON client');
        $this->addSql('DROP INDEX UNIQ_C74404555F0C5BA7 ON client');
        $this->addSql('DROP INDEX UNIQ_C74404556C6E55B5 ON client');
        $this->addSql('DROP INDEX UNIQ_C7440455C35F0816 ON client');
        $this->addSql('DROP INDEX UNIQ_C744045543C3D9C3 ON client');
        $this->addSql('DROP INDEX IDX_C74404554CCE3F86 ON client');
        $this->addSql('ALTER TABLE client DROP rdv_id');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE agent ADD rdv_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE agent ADD CONSTRAINT FK_268B9C9D4CCE3F86 FOREIGN KEY (rdv_id) REFERENCES rdv (id)');
        $this->addSql('CREATE INDEX IDX_268B9C9D4CCE3F86 ON agent (rdv_id)');
        $this->addSql('ALTER TABLE client ADD rdv_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE client ADD CONSTRAINT FK_C74404554CCE3F86 FOREIGN KEY (rdv_id) REFERENCES rdv (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_C7440455A625945B ON client (prenom)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_C7440455F037AB0F ON client (tel)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_C74404555F0C5BA7 ON client (cp)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_C74404556C6E55B5 ON client (nom)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_C7440455C35F0816 ON client (adresse)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_C744045543C3D9C3 ON client (ville)');
        $this->addSql('CREATE INDEX IDX_C74404554CCE3F86 ON client (rdv_id)');
    }
}
