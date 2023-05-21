<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230521103632 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'Creating new table lead';
    }

    public function up(Schema $schema): void
    {
        $this->addSql(<<<SQL
        CREATE TABLE `lead` (
          `lead_id` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
          `first_name` VARCHAR(255) DEFAULT NULL,
          `last_name` VARCHAR(255) DEFAULT NULL,
          `company_name` VARCHAR(255) DEFAULT NULL,
          `email` VARCHAR(100) DEFAULT NULL,
          `status` VARCHAR(20) NOT NULL,
          `product` VARCHAR(30) NOT NULL,
          `source_description` VARCHAR(1000) DEFAULT NULL,
          `department` VARCHAR(255) DEFAULT NULL,
          `job_title` VARCHAR(255) DEFAULT NULL,
          `phone` VARCHAR(50) DEFAULT NULL,
          `fax` VARCHAR(50) DEFAULT NULL,
          `address` VARCHAR(512) DEFAULT NULL,
          `city` VARCHAR(100) DEFAULT NULL,
          `state` VARCHAR(100) DEFAULT NULL,
          `postcode` VARCHAR(50) DEFAULT NULL,
          `country` VARCHAR(100) DEFAULT NULL,
          `is_deleted` TINYINT(1) NOT NULL DEFAULT '0',
          `created_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
          `source` VARCHAR(100) DEFAULT NULL,
          PRIMARY KEY (`lead_id`),
          KEY `status` (`status`),
          KEY `email` (`email`),
          KEY `company_name` (`company_name`),
          KEY `is_deleted` (`is_deleted`)
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8
        SQL);
    }

    public function down(Schema $schema): void
    {
        $this->addSql("DROP TABLE `lead`");
    }
}
