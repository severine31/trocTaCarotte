<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200630144055 extends AbstractMigration
{
    public function getDescription() : string
    {
        return 'Add field ContreBio in mon_annonce table.';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE mon_annonce ADD contre_bio VARCHAR(255) DEFAULT NULL, CHANGE contre_carotte_id contre_carotte_id INT DEFAULT NULL, CHANGE date date DATETIME DEFAULT NULL, CHANGE quantity quantity INT NOT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE mon_annonce DROP contre_bio, CHANGE contre_carotte_id contre_carotte_id INT NOT NULL, CHANGE date date DATETIME NOT NULL, CHANGE quantity quantity INT DEFAULT NULL');
    }
}
