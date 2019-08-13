<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190812200838 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE player (id INT AUTO_INCREMENT NOT NULL, id_team_id INT DEFAULT NULL, email LONGTEXT NOT NULL, password LONGTEXT NOT NULL, name TINYTEXT NOT NULL, last_name VARCHAR(255) NOT NULL, born_date DATE DEFAULT NULL, height DOUBLE PRECISION DEFAULT NULL, weight DOUBLE PRECISION DEFAULT NULL, nation VARCHAR(255) DEFAULT NULL, first_position VARCHAR(255) DEFAULT NULL, second_position VARCHAR(255) DEFAULT NULL, link_instagram LONGTEXT DEFAULT NULL, link_facebook LONGTEXT DEFAULT NULL, link_twitter LONGTEXT DEFAULT NULL, nick_name LONGTEXT NOT NULL, role VARCHAR(255) DEFAULT NULL, INDEX IDX_98197A65F7F171DE (id_team_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE player ADD CONSTRAINT FK_98197A65F7F171DE FOREIGN KEY (id_team_id) REFERENCES team (id)');
        $this->addSql('ALTER TABLE team CHANGE name name VARCHAR(255) NOT NULL, CHANGE logo logo LONGTEXT NOT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE player');
        $this->addSql('ALTER TABLE team CHANGE name name VARCHAR(100) NOT NULL COLLATE latin1_swedish_ci, CHANGE logo logo VARCHAR(255) NOT NULL COLLATE latin1_swedish_ci');
    }
}
