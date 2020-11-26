<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20201126100755 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE collecte ADD fk_utilisateur_id INT DEFAULT NULL, ADD fk_hopital_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE collecte ADD CONSTRAINT FK_55AE4A3D8E8608A6 FOREIGN KEY (fk_utilisateur_id) REFERENCES utilisateur (id)');
        $this->addSql('ALTER TABLE collecte ADD CONSTRAINT FK_55AE4A3D3C617501 FOREIGN KEY (fk_hopital_id) REFERENCES hopital (id)');
        $this->addSql('CREATE INDEX IDX_55AE4A3D8E8608A6 ON collecte (fk_utilisateur_id)');
        $this->addSql('CREATE INDEX IDX_55AE4A3D3C617501 ON collecte (fk_hopital_id)');
        $this->addSql('ALTER TABLE role ADD fk_role_id INT DEFAULT NULL, ADD fk_user_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE role ADD CONSTRAINT FK_57698A6A262C1F80 FOREIGN KEY (fk_role_id) REFERENCES collecte (id)');
        $this->addSql('ALTER TABLE role ADD CONSTRAINT FK_57698A6A5741EEB9 FOREIGN KEY (fk_user_id) REFERENCES utilisateur (id)');
        $this->addSql('CREATE INDEX IDX_57698A6A262C1F80 ON role (fk_role_id)');
        $this->addSql('CREATE INDEX IDX_57698A6A5741EEB9 ON role (fk_user_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE collecte DROP FOREIGN KEY FK_55AE4A3D8E8608A6');
        $this->addSql('ALTER TABLE collecte DROP FOREIGN KEY FK_55AE4A3D3C617501');
        $this->addSql('DROP INDEX IDX_55AE4A3D8E8608A6 ON collecte');
        $this->addSql('DROP INDEX IDX_55AE4A3D3C617501 ON collecte');
        $this->addSql('ALTER TABLE collecte DROP fk_utilisateur_id, DROP fk_hopital_id');
        $this->addSql('ALTER TABLE role DROP FOREIGN KEY FK_57698A6A262C1F80');
        $this->addSql('ALTER TABLE role DROP FOREIGN KEY FK_57698A6A5741EEB9');
        $this->addSql('DROP INDEX IDX_57698A6A262C1F80 ON role');
        $this->addSql('DROP INDEX IDX_57698A6A5741EEB9 ON role');
        $this->addSql('ALTER TABLE role DROP fk_role_id, DROP fk_user_id');
    }
}
