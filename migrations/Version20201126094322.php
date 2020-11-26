<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20201126094322 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE collecte (id INT AUTO_INCREMENT NOT NULL, nom_collecte VARCHAR(255) NOT NULL, date_collecte DATETIME NOT NULL, globule_rouge INT NOT NULL, quantite_grouge INT NOT NULL, plaquette INT NOT NULL, quantite_plaquette INT NOT NULL, plasma INT NOT NULL, quantite_plas INT DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE geo (id INT AUTO_INCREMENT NOT NULL, p VARCHAR(255) NOT NULL, pos GEOMETRY DEFAULT NULL COMMENT \'(DC2Type:geometry)\', PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE hopital (id INT AUTO_INCREMENT NOT NULL, efs_nom VARCHAR(255) NOT NULL, efs_adresse VARCHAR(255) NOT NULL, efs_zip VARCHAR(5) NOT NULL, efs_ville VARCHAR(255) NOT NULL, pos_geo GEOMETRY NOT NULL COMMENT \'(DC2Type:geometry)\', qte_globule_rouge INT NOT NULL, qte_plasma INT NOT NULL, qte_plaquettes INT NOT NULL, min_qte_glr INT NOT NULL, min_qte_plsa INT NOT NULL, min_qte_plaq INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE role (id INT AUTO_INCREMENT NOT NULL, description_role LONGTEXT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE utilisateur (id INT AUTO_INCREMENT NOT NULL, user_nom VARCHAR(255) NOT NULL, user_prenom VARCHAR(255) NOT NULL, user_phone VARCHAR(10) NOT NULL, user_adresse VARCHAR(255) NOT NULL, user_ville VARCHAR(255) NOT NULL, user_password VARCHAR(255) NOT NULL, user_email VARCHAR(255) NOT NULL, user_group_sang VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE collecte');
        $this->addSql('DROP TABLE geo');
        $this->addSql('DROP TABLE hopital');
        $this->addSql('DROP TABLE role');
        $this->addSql('DROP TABLE utilisateur');
    }
}
