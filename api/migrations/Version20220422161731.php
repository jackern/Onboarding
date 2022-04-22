<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220422161731 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SEQUENCE department_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE job_role_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE TABLE department (id UUID NOT NULL, title VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('COMMENT ON COLUMN department.id IS \'(DC2Type:uuid)\'');
        $this->addSql('CREATE TABLE job_role (id UUID NOT NULL, title VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('COMMENT ON COLUMN job_role.id IS \'(DC2Type:uuid)\'');
        $this->addSql('CREATE TABLE job_role_department (job_role_id UUID NOT NULL, department_id UUID NOT NULL, PRIMARY KEY(job_role_id, department_id))');
        $this->addSql('CREATE INDEX IDX_A9B5C4C94CEC9537 ON job_role_department (job_role_id)');
        $this->addSql('CREATE INDEX IDX_A9B5C4C9AE80F5DF ON job_role_department (department_id)');
        $this->addSql('COMMENT ON COLUMN job_role_department.job_role_id IS \'(DC2Type:uuid)\'');
        $this->addSql('COMMENT ON COLUMN job_role_department.department_id IS \'(DC2Type:uuid)\'');
        $this->addSql('ALTER TABLE job_role_department ADD CONSTRAINT FK_A9B5C4C94CEC9537 FOREIGN KEY (job_role_id) REFERENCES job_role (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE job_role_department ADD CONSTRAINT FK_A9B5C4C9AE80F5DF FOREIGN KEY (department_id) REFERENCES department (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE job_role_department DROP CONSTRAINT FK_A9B5C4C9AE80F5DF');
        $this->addSql('ALTER TABLE job_role_department DROP CONSTRAINT FK_A9B5C4C94CEC9537');
        $this->addSql('DROP SEQUENCE department_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE job_role_id_seq CASCADE');
        $this->addSql('DROP TABLE department');
        $this->addSql('DROP TABLE job_role');
        $this->addSql('DROP TABLE job_role_department');
    }
}
