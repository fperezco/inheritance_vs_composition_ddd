<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230314182437 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE articlecomposition_objects (uuid VARCHAR(36) NOT NULL, title VARCHAR(255) NOT NULL, text VARCHAR(255) NOT NULL, PRIMARY KEY(uuid)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE commentscomposition (uuid VARCHAR(36) NOT NULL, comment VARCHAR(255) NOT NULL, commentDate DATETIME NOT NULL, parent_uuid VARCHAR(36) NOT NULL, parent_commentable VARCHAR(255) NOT NULL, PRIMARY KEY(uuid)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE videocomposition_objects (uuid VARCHAR(36) NOT NULL, link VARCHAR(255) NOT NULL, duration DOUBLE PRECISION NOT NULL, PRIMARY KEY(uuid)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
    }

    public function down(Schema $schema): void
    {
        $this->addSql('DROP TABLE articlecomposition_objects');
        $this->addSql('DROP TABLE commentscomposition');
        $this->addSql('DROP TABLE videocomposition_objects');
    }
}
