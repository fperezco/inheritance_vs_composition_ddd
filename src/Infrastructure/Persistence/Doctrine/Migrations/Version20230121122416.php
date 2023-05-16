<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230121122416 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE articles (uuid VARCHAR(36) NOT NULL, title VARCHAR(255) NOT NULL, text LONGTEXT NOT NULL, PRIMARY KEY(uuid)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE commentable_objects (uuid VARCHAR(36) NOT NULL, discr VARCHAR(255) NOT NULL, PRIMARY KEY(uuid)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE commentableObjects_comments_inheritance (commentableobject_uuid VARCHAR(36) NOT NULL, comment_uuid VARCHAR(36) NOT NULL, INDEX IDX_D713437896CA3FCA (commentableobject_uuid), UNIQUE INDEX UNIQ_D7134378F749F24A (comment_uuid), PRIMARY KEY(commentableobject_uuid, comment_uuid)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE comments (uuid VARCHAR(36) NOT NULL, comment VARCHAR(255) NOT NULL, commentDate DATETIME NOT NULL, PRIMARY KEY(uuid)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE videos (uuid VARCHAR(36) NOT NULL, title VARCHAR(255) NOT NULL, duration DOUBLE PRECISION NOT NULL, PRIMARY KEY(uuid)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE articles ADD CONSTRAINT FK_BFDD3168D17F50A6 FOREIGN KEY (uuid) REFERENCES commentable_objects (uuid) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE commentableObjects_comments_inheritance ADD CONSTRAINT FK_D713437896CA3FCA FOREIGN KEY (commentableobject_uuid) REFERENCES commentable_objects (uuid)');
        $this->addSql('ALTER TABLE commentableObjects_comments_inheritance ADD CONSTRAINT FK_D7134378F749F24A FOREIGN KEY (comment_uuid) REFERENCES comments (uuid)');
        $this->addSql('ALTER TABLE videos ADD CONSTRAINT FK_29AA6432D17F50A6 FOREIGN KEY (uuid) REFERENCES commentable_objects (uuid) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE articles DROP FOREIGN KEY FK_BFDD3168D17F50A6');
        $this->addSql('ALTER TABLE commentableObjects_comments_inheritance DROP FOREIGN KEY FK_D713437896CA3FCA');
        $this->addSql('ALTER TABLE commentableObjects_comments_inheritance DROP FOREIGN KEY FK_D7134378F749F24A');
        $this->addSql('ALTER TABLE videos DROP FOREIGN KEY FK_29AA6432D17F50A6');
        $this->addSql('DROP TABLE articles');
        $this->addSql('DROP TABLE commentable_objects');
        $this->addSql('DROP TABLE commentableObjects_comments_inheritance');
        $this->addSql('DROP TABLE comments');
        $this->addSql('DROP TABLE videos');
    }
}
