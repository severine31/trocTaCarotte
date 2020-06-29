<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200629144527 extends AbstractMigration
{
    public function getDescription() : string
    {
        return 'Create new entity MonAnnonce.';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE mon_annonce (id INT AUTO_INCREMENT NOT NULL, user_id INT NOT NULL, troc_id INT NOT NULL, ville_id INT NOT NULL, statut_id INT NOT NULL, date DATETIME NOT NULL, description VARCHAR(255) DEFAULT NULL, photo LONGTEXT DEFAULT NULL COMMENT \'(DC2Type:object)\', INDEX IDX_A3B5C2E9A76ED395 (user_id), UNIQUE INDEX UNIQ_A3B5C2E9685023DF (troc_id), INDEX IDX_A3B5C2E9A73F0036 (ville_id), INDEX IDX_A3B5C2E9F6203804 (statut_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE mon_annonce ADD CONSTRAINT FK_A3B5C2E9A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE mon_annonce ADD CONSTRAINT FK_A3B5C2E9685023DF FOREIGN KEY (troc_id) REFERENCES troc (id)');
        $this->addSql('ALTER TABLE mon_annonce ADD CONSTRAINT FK_A3B5C2E9A73F0036 FOREIGN KEY (ville_id) REFERENCES ville (id)');
        $this->addSql('ALTER TABLE mon_annonce ADD CONSTRAINT FK_A3B5C2E9F6203804 FOREIGN KEY (statut_id) REFERENCES statut (id)');
        $this->addSql('ALTER TABLE ville ADD CONSTRAINT FK_43C3D9C33256915B FOREIGN KEY (relation_id) REFERENCES ville (id)');
        $this->addSql('CREATE INDEX IDX_43C3D9C33256915B ON ville (relation_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE mon_annonce');
        $this->addSql('ALTER TABLE ville DROP FOREIGN KEY FK_43C3D9C33256915B');
        $this->addSql('DROP INDEX IDX_43C3D9C33256915B ON ville');
    }
}
