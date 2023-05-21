<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230520160916 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'Creating test table';
    }

    public function up(Schema $schema): void
    {
        $this->addSql(<<<SQL
        CREATE TABLE test_2 (
            test_id INT NOT NULL PRIMARY KEY
        )
        SQL);
    }

    public function down(Schema $schema): void
    {

    }
}

