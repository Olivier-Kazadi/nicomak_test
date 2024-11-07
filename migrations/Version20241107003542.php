<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20241107003542 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE merci ADD de_id INT NOT NULL');
        $this->addSql('ALTER TABLE merci ADD a_id INT NOT NULL');
        $this->addSql('ALTER TABLE merci DROP de');
        $this->addSql('ALTER TABLE merci DROP a');
        $this->addSql('ALTER TABLE merci ADD CONSTRAINT FK_86B31E763F683D83 FOREIGN KEY (de_id) REFERENCES "user" (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE merci ADD CONSTRAINT FK_86B31E763BDE5358 FOREIGN KEY (a_id) REFERENCES "user" (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('CREATE INDEX IDX_86B31E763F683D83 ON merci (de_id)');
        $this->addSql('CREATE INDEX IDX_86B31E763BDE5358 ON merci (a_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE merci DROP CONSTRAINT FK_86B31E763F683D83');
        $this->addSql('ALTER TABLE merci DROP CONSTRAINT FK_86B31E763BDE5358');
        $this->addSql('DROP INDEX IDX_86B31E763F683D83');
        $this->addSql('DROP INDEX IDX_86B31E763BDE5358');
        $this->addSql('ALTER TABLE merci ADD de VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE merci ADD a VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE merci DROP de_id');
        $this->addSql('ALTER TABLE merci DROP a_id');
    }
}
