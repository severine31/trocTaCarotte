<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211022094245 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE carotte (id INT AUTO_INCREMENT NOT NULL, categorie_id INT NOT NULL, nom VARCHAR(255) NOT NULL, image VARCHAR(255) NOT NULL, INDEX IDX_21BEE8AABCF5E72D (categorie_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE categorie (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE mon_annonce (id INT AUTO_INCREMENT NOT NULL, user_id INT NOT NULL, statut_id INT NOT NULL, carotte_atroquer_id INT NOT NULL, contre_carotte_id INT DEFAULT NULL, ville_id INT NOT NULL, date DATETIME DEFAULT NULL, description VARCHAR(255) DEFAULT NULL, photo LONGTEXT DEFAULT NULL COMMENT \'(DC2Type:object)\', quantity INT NOT NULL, contre_quantite INT DEFAULT NULL, bio VARCHAR(255) DEFAULT NULL, unite VARCHAR(255) NOT NULL, contre_unite VARCHAR(255) NOT NULL, contre_bio VARCHAR(255) DEFAULT NULL, INDEX IDX_A3B5C2E9A76ED395 (user_id), INDEX IDX_A3B5C2E9F6203804 (statut_id), INDEX IDX_A3B5C2E99ECACE58 (carotte_atroquer_id), INDEX IDX_A3B5C2E968F01FC9 (contre_carotte_id), INDEX IDX_A3B5C2E9A73F0036 (ville_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE statut (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, ville_id INT NOT NULL, email VARCHAR(180) NOT NULL, nom VARCHAR(255) NOT NULL, prenom VARCHAR(255) NOT NULL, sexe VARCHAR(255) NOT NULL, image VARCHAR(255) NOT NULL, roles LONGTEXT NOT NULL COMMENT \'(DC2Type:json)\', password VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_8D93D649E7927C74 (email), INDEX IDX_8D93D649A73F0036 (ville_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE ville (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, cp INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE carotte ADD CONSTRAINT FK_21BEE8AABCF5E72D FOREIGN KEY (categorie_id) REFERENCES categorie (id)');
        $this->addSql('ALTER TABLE mon_annonce ADD CONSTRAINT FK_A3B5C2E9A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE mon_annonce ADD CONSTRAINT FK_A3B5C2E9F6203804 FOREIGN KEY (statut_id) REFERENCES statut (id)');
        $this->addSql('ALTER TABLE mon_annonce ADD CONSTRAINT FK_A3B5C2E99ECACE58 FOREIGN KEY (carotte_atroquer_id) REFERENCES carotte (id)');
        $this->addSql('ALTER TABLE mon_annonce ADD CONSTRAINT FK_A3B5C2E968F01FC9 FOREIGN KEY (contre_carotte_id) REFERENCES carotte (id)');
        $this->addSql('ALTER TABLE mon_annonce ADD CONSTRAINT FK_A3B5C2E9A73F0036 FOREIGN KEY (ville_id) REFERENCES ville (id)');
        $this->addSql('ALTER TABLE user ADD CONSTRAINT FK_8D93D649A73F0036 FOREIGN KEY (ville_id) REFERENCES ville (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE mon_annonce DROP FOREIGN KEY FK_A3B5C2E99ECACE58');
        $this->addSql('ALTER TABLE mon_annonce DROP FOREIGN KEY FK_A3B5C2E968F01FC9');
        $this->addSql('ALTER TABLE carotte DROP FOREIGN KEY FK_21BEE8AABCF5E72D');
        $this->addSql('ALTER TABLE mon_annonce DROP FOREIGN KEY FK_A3B5C2E9F6203804');
        $this->addSql('ALTER TABLE mon_annonce DROP FOREIGN KEY FK_A3B5C2E9A76ED395');
        $this->addSql('ALTER TABLE mon_annonce DROP FOREIGN KEY FK_A3B5C2E9A73F0036');
        $this->addSql('ALTER TABLE user DROP FOREIGN KEY FK_8D93D649A73F0036');
        $this->addSql('DROP TABLE carotte');
        $this->addSql('DROP TABLE categorie');
        $this->addSql('DROP TABLE mon_annonce');
        $this->addSql('DROP TABLE statut');
        $this->addSql('DROP TABLE user');
        $this->addSql('DROP TABLE ville');
    }
}
