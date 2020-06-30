<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200630115644 extends AbstractMigration
{
    public function getDescription() : string
    {
        return 'Database refactoring -> delete troc table, add troc table data in annonce table.';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE mon_annonce CHANGE contre_carotte_id contre_carotte_id INT NOT NULL');
        $this->addSql('ALTER TABLE ville DROP FOREIGN KEY FK_43C3D9C33256915B');
        $this->addSql('DROP INDEX IDX_43C3D9C33256915B ON ville');
        $this->addSql('ALTER TABLE ville DROP relation_id');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE mon_annonce CHANGE contre_carotte_id contre_carotte_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE ville ADD relation_id INT NOT NULL');
        $this->addSql('ALTER TABLE ville ADD CONSTRAINT FK_43C3D9C33256915B FOREIGN KEY (relation_id) REFERENCES ville (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('CREATE INDEX IDX_43C3D9C33256915B ON ville (relation_id)');
    }
}
