<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211206105036 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE users ADD use_lastname VARCHAR(255) NOT NULL, ADD use_firstname VARCHAR(255) NOT NULL, ADD use_address VARCHAR(255) DEFAULT NULL, ADD use_zipcode INT DEFAULT NULL, ADD use_city VARCHAR(255) DEFAULT NULL, ADD use_mobilephone INT DEFAULT NULL, ADD use_phone INT DEFAULT NULL, ADD use_cou_id INT DEFAULT NULL, ADD use_com_id INT DEFAULT NULL, CHANGE roles roles JSON NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE users DROP use_lastname, DROP use_firstname, DROP use_address, DROP use_zipcode, DROP use_city, DROP use_mobilephone, DROP use_phone, DROP use_cou_id, DROP use_com_id, CHANGE roles roles LONGTEXT CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_bin`');
    }
}
