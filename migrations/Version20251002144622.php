<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20251002144622 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE manga_category (manga_id INT NOT NULL, category_id INT NOT NULL, PRIMARY KEY(manga_id, category_id))');
        $this->addSql('CREATE INDEX IDX_71D59E827B6461 ON manga_category (manga_id)');
        $this->addSql('CREATE INDEX IDX_71D59E8212469DE2 ON manga_category (category_id)');
        $this->addSql('ALTER TABLE manga_category ADD CONSTRAINT FK_71D59E827B6461 FOREIGN KEY (manga_id) REFERENCES manga (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE manga_category ADD CONSTRAINT FK_71D59E8212469DE2 FOREIGN KEY (category_id) REFERENCES category (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE manga_category DROP CONSTRAINT FK_71D59E827B6461');
        $this->addSql('ALTER TABLE manga_category DROP CONSTRAINT FK_71D59E8212469DE2');
        $this->addSql('DROP TABLE manga_category');
    }
}
