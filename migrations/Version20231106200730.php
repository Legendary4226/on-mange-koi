<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20231106200730 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE grocery_list (id INT UNSIGNED AUTO_INCREMENT NOT NULL, owner_id INT UNSIGNED NOT NULL, name VARCHAR(255) NOT NULL, description LONGTEXT DEFAULT NULL, uuid BINARY(16) NOT NULL COMMENT \'(DC2Type:uuid)\', creation_date DATETIME NOT NULL, last_persist DATETIME NOT NULL, UNIQUE INDEX UNIQ_D44D068CD17F50A6 (uuid), INDEX IDX_D44D068C7E3C61F9 (owner_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE grocery_list_item (id INT UNSIGNED AUTO_INCREMENT NOT NULL, grocery_list_id INT UNSIGNED NOT NULL, product_id INT UNSIGNED DEFAULT NULL, recipe_id INT UNSIGNED DEFAULT NULL, quantity_id INT UNSIGNED NOT NULL, uuid BINARY(16) NOT NULL COMMENT \'(DC2Type:uuid)\', creation_date DATETIME NOT NULL, last_persist DATETIME NOT NULL, UNIQUE INDEX UNIQ_8E5549C2D17F50A6 (uuid), INDEX IDX_8E5549C2D059BDAB (grocery_list_id), INDEX IDX_8E5549C24584665A (product_id), INDEX IDX_8E5549C259D8A214 (recipe_id), INDEX IDX_8E5549C27E8B4AFC (quantity_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE product (id INT UNSIGNED AUTO_INCREMENT NOT NULL, user_id INT UNSIGNED DEFAULT NULL, name VARCHAR(255) NOT NULL, description LONGTEXT DEFAULT NULL, uuid BINARY(16) NOT NULL COMMENT \'(DC2Type:uuid)\', creation_date DATETIME NOT NULL, last_persist DATETIME NOT NULL, UNIQUE INDEX UNIQ_D34A04ADD17F50A6 (uuid), INDEX IDX_D34A04ADA76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE quantity (id INT UNSIGNED AUTO_INCREMENT NOT NULL, type VARCHAR(255) NOT NULL, value DOUBLE PRECISION DEFAULT NULL, uuid BINARY(16) NOT NULL COMMENT \'(DC2Type:uuid)\', creation_date DATETIME NOT NULL, last_persist DATETIME NOT NULL, UNIQUE INDEX UNIQ_9FF31636D17F50A6 (uuid), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE recipe (id INT UNSIGNED AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, description LONGTEXT DEFAULT NULL, uuid BINARY(16) NOT NULL COMMENT \'(DC2Type:uuid)\', creation_date DATETIME NOT NULL, last_persist DATETIME NOT NULL, UNIQUE INDEX UNIQ_DA88B137D17F50A6 (uuid), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE recipe_item (id INT UNSIGNED AUTO_INCREMENT NOT NULL, product_id INT UNSIGNED NOT NULL, recipe_id INT UNSIGNED NOT NULL, quantity_id INT UNSIGNED NOT NULL, uuid BINARY(16) NOT NULL COMMENT \'(DC2Type:uuid)\', creation_date DATETIME NOT NULL, last_persist DATETIME NOT NULL, UNIQUE INDEX UNIQ_60007FC1D17F50A6 (uuid), INDEX IDX_60007FC14584665A (product_id), INDEX IDX_60007FC159D8A214 (recipe_id), INDEX IDX_60007FC17E8B4AFC (quantity_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT UNSIGNED AUTO_INCREMENT NOT NULL, email VARCHAR(180) NOT NULL, roles JSON NOT NULL COMMENT \'(DC2Type:json)\', username VARCHAR(75) DEFAULT NULL, password VARCHAR(255) NOT NULL, uuid BINARY(16) NOT NULL COMMENT \'(DC2Type:uuid)\', creation_date DATETIME NOT NULL, last_persist DATETIME NOT NULL, UNIQUE INDEX UNIQ_8D93D649E7927C74 (email), UNIQUE INDEX UNIQ_8D93D649D17F50A6 (uuid), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE messenger_messages (id BIGINT AUTO_INCREMENT NOT NULL, body LONGTEXT NOT NULL, headers LONGTEXT NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', available_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', delivered_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\', INDEX IDX_75EA56E0FB7336F0 (queue_name), INDEX IDX_75EA56E0E3BD61CE (available_at), INDEX IDX_75EA56E016BA31DB (delivered_at), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE grocery_list ADD CONSTRAINT FK_D44D068C7E3C61F9 FOREIGN KEY (owner_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE grocery_list_item ADD CONSTRAINT FK_8E5549C2D059BDAB FOREIGN KEY (grocery_list_id) REFERENCES grocery_list (id)');
        $this->addSql('ALTER TABLE grocery_list_item ADD CONSTRAINT FK_8E5549C24584665A FOREIGN KEY (product_id) REFERENCES product (id)');
        $this->addSql('ALTER TABLE grocery_list_item ADD CONSTRAINT FK_8E5549C259D8A214 FOREIGN KEY (recipe_id) REFERENCES recipe (id)');
        $this->addSql('ALTER TABLE grocery_list_item ADD CONSTRAINT FK_8E5549C27E8B4AFC FOREIGN KEY (quantity_id) REFERENCES quantity (id)');
        $this->addSql('ALTER TABLE product ADD CONSTRAINT FK_D34A04ADA76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE recipe_item ADD CONSTRAINT FK_60007FC14584665A FOREIGN KEY (product_id) REFERENCES product (id)');
        $this->addSql('ALTER TABLE recipe_item ADD CONSTRAINT FK_60007FC159D8A214 FOREIGN KEY (recipe_id) REFERENCES recipe (id)');
        $this->addSql('ALTER TABLE recipe_item ADD CONSTRAINT FK_60007FC17E8B4AFC FOREIGN KEY (quantity_id) REFERENCES quantity (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE grocery_list DROP FOREIGN KEY FK_D44D068C7E3C61F9');
        $this->addSql('ALTER TABLE grocery_list_item DROP FOREIGN KEY FK_8E5549C2D059BDAB');
        $this->addSql('ALTER TABLE grocery_list_item DROP FOREIGN KEY FK_8E5549C24584665A');
        $this->addSql('ALTER TABLE grocery_list_item DROP FOREIGN KEY FK_8E5549C259D8A214');
        $this->addSql('ALTER TABLE grocery_list_item DROP FOREIGN KEY FK_8E5549C27E8B4AFC');
        $this->addSql('ALTER TABLE product DROP FOREIGN KEY FK_D34A04ADA76ED395');
        $this->addSql('ALTER TABLE recipe_item DROP FOREIGN KEY FK_60007FC14584665A');
        $this->addSql('ALTER TABLE recipe_item DROP FOREIGN KEY FK_60007FC159D8A214');
        $this->addSql('ALTER TABLE recipe_item DROP FOREIGN KEY FK_60007FC17E8B4AFC');
        $this->addSql('DROP TABLE grocery_list');
        $this->addSql('DROP TABLE grocery_list_item');
        $this->addSql('DROP TABLE product');
        $this->addSql('DROP TABLE quantity');
        $this->addSql('DROP TABLE recipe');
        $this->addSql('DROP TABLE recipe_item');
        $this->addSql('DROP TABLE user');
        $this->addSql('DROP TABLE messenger_messages');
    }
}
