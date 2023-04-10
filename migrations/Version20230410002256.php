<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230410002256 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE jutsu ADD id_voie_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE jutsu ADD CONSTRAINT FK_3EC4A755343120BF FOREIGN KEY (id_voie_id) REFERENCES voie (id)');
        $this->addSql('CREATE INDEX IDX_3EC4A755343120BF ON jutsu (id_voie_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE jutsu DROP FOREIGN KEY FK_3EC4A755343120BF');
        $this->addSql('DROP INDEX IDX_3EC4A755343120BF ON jutsu');
        $this->addSql('ALTER TABLE jutsu DROP id_voie_id');
    }
}
