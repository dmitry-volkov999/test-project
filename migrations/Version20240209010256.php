<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

final class Version20240209010256 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'Creates message table to store data';
    }

    public function up(Schema $schema): void
    {
        $this->addSql('CREATE TABLE message (id VARCHAR(255) NOT NULL, data VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
    }

    public function down(Schema $schema): void
    {
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('DROP TABLE message');
    }
}
