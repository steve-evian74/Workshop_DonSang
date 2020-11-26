<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20201126100043 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE utilisateur ADD fk_patient_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE utilisateur ADD CONSTRAINT FK_1D1C63B39BE758EA FOREIGN KEY (fk_patient_id) REFERENCES hopital (id)');
        $this->addSql('CREATE INDEX IDX_1D1C63B39BE758EA ON utilisateur (fk_patient_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE utilisateur DROP FOREIGN KEY FK_1D1C63B39BE758EA');
        $this->addSql('DROP INDEX IDX_1D1C63B39BE758EA ON utilisateur');
        $this->addSql('ALTER TABLE utilisateur DROP fk_patient_id');
    }
}
