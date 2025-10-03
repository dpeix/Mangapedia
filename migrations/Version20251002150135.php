<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20251002150135 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE collections (id SERIAL NOT NULL, users_id INT DEFAULT NULL, mangas_id INT DEFAULT NULL, status_id INT DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_D325D3EE67B3B43D ON collections (users_id)');
        $this->addSql('CREATE INDEX IDX_D325D3EEDDC4978F ON collections (mangas_id)');
        $this->addSql('CREATE INDEX IDX_D325D3EE6BF700BD ON collections (status_id)');
        $this->addSql('CREATE TABLE status (id SERIAL NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('ALTER TABLE collections ADD CONSTRAINT FK_D325D3EE67B3B43D FOREIGN KEY (users_id) REFERENCES users (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE collections ADD CONSTRAINT FK_D325D3EEDDC4978F FOREIGN KEY (mangas_id) REFERENCES manga (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE collections ADD CONSTRAINT FK_D325D3EE6BF700BD FOREIGN KEY (status_id) REFERENCES status (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE collections DROP CONSTRAINT FK_D325D3EE67B3B43D');
        $this->addSql('ALTER TABLE collections DROP CONSTRAINT FK_D325D3EEDDC4978F');
        $this->addSql('ALTER TABLE collections DROP CONSTRAINT FK_D325D3EE6BF700BD');
        $this->addSql('DROP TABLE collections');
        $this->addSql('DROP TABLE status');
    }
}
