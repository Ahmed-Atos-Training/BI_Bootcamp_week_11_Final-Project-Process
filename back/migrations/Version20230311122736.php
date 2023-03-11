<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230311122736 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE project (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, uuid CHAR(36) DEFAULT NULL --(DC2Type:guid)
        , reference VARCHAR(255) DEFAULT NULL, title VARCHAR(255) NOT NULL, description CLOB NOT NULL, start_date DATE DEFAULT NULL, duration INTEGER DEFAULT NULL)');
        $this->addSql('CREATE TABLE role (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, name VARCHAR(255) NOT NULL, description VARCHAR(255) DEFAULT NULL)');
        $this->addSql('CREATE TABLE task (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, uuid CHAR(36) DEFAULT NULL --(DC2Type:guid)
        , reference VARCHAR(255) DEFAULT NULL, description CLOB DEFAULT NULL, duration INTEGER DEFAULT NULL)');
        $this->addSql('CREATE TABLE task_task (task_source INTEGER NOT NULL, task_target INTEGER NOT NULL, PRIMARY KEY(task_source, task_target), CONSTRAINT FK_21CD4F5E6423FBA0 FOREIGN KEY (task_source) REFERENCES task (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE, CONSTRAINT FK_21CD4F5E7DC6AB2F FOREIGN KEY (task_target) REFERENCES task (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE)');
        $this->addSql('CREATE INDEX IDX_21CD4F5E6423FBA0 ON task_task (task_source)');
        $this->addSql('CREATE INDEX IDX_21CD4F5E7DC6AB2F ON task_task (task_target)');
        $this->addSql('CREATE TABLE "user" (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, email VARCHAR(180) NOT NULL, roles CLOB NOT NULL --(DC2Type:json)
        , password VARCHAR(255) NOT NULL)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_8D93D649E7927C74 ON "user" (email)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE project');
        $this->addSql('DROP TABLE role');
        $this->addSql('DROP TABLE task');
        $this->addSql('DROP TABLE task_task');
        $this->addSql('DROP TABLE "user"');
    }
}
