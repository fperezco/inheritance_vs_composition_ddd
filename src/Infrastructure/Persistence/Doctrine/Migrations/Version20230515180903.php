<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230515180903 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE commentableObjects_comments_inheritance DROP FOREIGN KEY FK_D713437896CA3FCA');
        $this->addSql('ALTER TABLE commentableObjects_comments_inheritance DROP FOREIGN KEY FK_D7134378F749F24A');
        $this->addSql('DROP TABLE commentableObjects_comments_inheritance');
        $this->addSql('ALTER TABLE comments ADD commentableObjectParent VARCHAR(255) NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE commentableObjects_comments_inheritance (commentableobject_uuid VARCHAR(36) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, comment_uuid VARCHAR(36) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, UNIQUE INDEX UNIQ_D7134378F749F24A (comment_uuid), INDEX IDX_D713437896CA3FCA (commentableobject_uuid), PRIMARY KEY(commentableobject_uuid, comment_uuid)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE commentableObjects_comments_inheritance ADD CONSTRAINT FK_D713437896CA3FCA FOREIGN KEY (commentableobject_uuid) REFERENCES commentable_objects (uuid)');
        $this->addSql('ALTER TABLE commentableObjects_comments_inheritance ADD CONSTRAINT FK_D7134378F749F24A FOREIGN KEY (comment_uuid) REFERENCES comments (uuid)');
        $this->addSql('ALTER TABLE comments DROP commentableObjectParent');
    }
}
