<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210511093437 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE agent ADD biens_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE agent ADD CONSTRAINT FK_268B9C9D7773350C FOREIGN KEY (biens_id) REFERENCES biens (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_268B9C9D7773350C ON agent (biens_id)');
        $this->addSql('ALTER TABLE biens ADD agent_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE biens ADD CONSTRAINT FK_1F9004DD3414710B FOREIGN KEY (agent_id) REFERENCES agent (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_1F9004DD3414710B ON biens (agent_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE agent DROP FOREIGN KEY FK_268B9C9D7773350C');
        $this->addSql('DROP INDEX UNIQ_268B9C9D7773350C ON agent');
        $this->addSql('ALTER TABLE agent DROP biens_id');
        $this->addSql('ALTER TABLE biens DROP FOREIGN KEY FK_1F9004DD3414710B');
        $this->addSql('DROP INDEX UNIQ_1F9004DD3414710B ON biens');
        $this->addSql('ALTER TABLE biens DROP agent_id');
    }
}
