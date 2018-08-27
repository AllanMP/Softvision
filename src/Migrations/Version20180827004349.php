<?php declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20180827004349 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'sqlite', 'Migration can only be executed safely on \'sqlite\'.');

        $this->addSql('ALTER TABLE post ADD COLUMN created DATETIME DEFAULT NULL');
        $this->addSql('ALTER TABLE post ADD COLUMN updated DATETIME DEFAULT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'sqlite', 'Migration can only be executed safely on \'sqlite\'.');

        $this->addSql('DROP INDEX UNIQ_5A8A6C8D17713E5A');
        $this->addSql('CREATE TEMPORARY TABLE __temp__post AS SELECT id, titulo, sumario, conteudo FROM post');
        $this->addSql('DROP TABLE post');
        $this->addSql('CREATE TABLE post (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, titulo VARCHAR(255) NOT NULL, sumario CLOB NOT NULL, conteudo CLOB NOT NULL)');
        $this->addSql('INSERT INTO post (id, titulo, sumario, conteudo) SELECT id, titulo, sumario, conteudo FROM __temp__post');
        $this->addSql('DROP TABLE __temp__post');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_5A8A6C8D17713E5A ON post (titulo)');
    }
}
