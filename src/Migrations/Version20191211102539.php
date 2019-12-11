<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20191211102539 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'postgresql', 'Migration can only be executed safely on \'postgresql\'.');

        $this->addSql('CREATE SEQUENCE friends_group_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE user_profile_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE user_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE friends_list_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE quote_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE TABLE friends_group (id INT NOT NULL, owner_id INT NOT NULL, aliases JSON DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_3EFE0CD87E3C61F9 ON friends_group (owner_id)');
        $this->addSql('CREATE TABLE friends_group_user_profile (friends_group_id INT NOT NULL, user_profile_id INT NOT NULL, PRIMARY KEY(friends_group_id, user_profile_id))');
        $this->addSql('CREATE INDEX IDX_D867A4C7136B3191 ON friends_group_user_profile (friends_group_id)');
        $this->addSql('CREATE INDEX IDX_D867A4C76B9DD454 ON friends_group_user_profile (user_profile_id)');
        $this->addSql('CREATE TABLE user_profile (id INT NOT NULL, user_id_id INT NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_D95AB4059D86650F ON user_profile (user_id_id)');
        $this->addSql('CREATE TABLE "user" (id INT NOT NULL, email VARCHAR(180) NOT NULL, roles JSON NOT NULL, password VARCHAR(255) NOT NULL, name VARCHAR(255) NOT NULL, surname VARCHAR(255) NOT NULL, nickname VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_8D93D649E7927C74 ON "user" (email)');
        $this->addSql('CREATE TABLE friends_list (id INT NOT NULL, owner_id INT DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_C913D5EA7E3C61F9 ON friends_list (owner_id)');
        $this->addSql('CREATE TABLE friends_list_user_profile (friends_list_id INT NOT NULL, user_profile_id INT NOT NULL, PRIMARY KEY(friends_list_id, user_profile_id))');
        $this->addSql('CREATE INDEX IDX_60668A9EBAC5E00B ON friends_list_user_profile (friends_list_id)');
        $this->addSql('CREATE INDEX IDX_60668A9E6B9DD454 ON friends_list_user_profile (user_profile_id)');
        $this->addSql('CREATE TABLE quote (id INT NOT NULL, author_id INT DEFAULT NULL, text JSON NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_6B71CBF4F675F31B ON quote (author_id)');
        $this->addSql('ALTER TABLE friends_group ADD CONSTRAINT FK_3EFE0CD87E3C61F9 FOREIGN KEY (owner_id) REFERENCES user_profile (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE friends_group_user_profile ADD CONSTRAINT FK_D867A4C7136B3191 FOREIGN KEY (friends_group_id) REFERENCES friends_group (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE friends_group_user_profile ADD CONSTRAINT FK_D867A4C76B9DD454 FOREIGN KEY (user_profile_id) REFERENCES user_profile (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE user_profile ADD CONSTRAINT FK_D95AB4059D86650F FOREIGN KEY (user_id_id) REFERENCES "user" (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE friends_list ADD CONSTRAINT FK_C913D5EA7E3C61F9 FOREIGN KEY (owner_id) REFERENCES user_profile (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE friends_list_user_profile ADD CONSTRAINT FK_60668A9EBAC5E00B FOREIGN KEY (friends_list_id) REFERENCES friends_list (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE friends_list_user_profile ADD CONSTRAINT FK_60668A9E6B9DD454 FOREIGN KEY (user_profile_id) REFERENCES user_profile (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE quote ADD CONSTRAINT FK_6B71CBF4F675F31B FOREIGN KEY (author_id) REFERENCES user_profile (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'postgresql', 'Migration can only be executed safely on \'postgresql\'.');

        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE friends_group_user_profile DROP CONSTRAINT FK_D867A4C7136B3191');
        $this->addSql('ALTER TABLE friends_group DROP CONSTRAINT FK_3EFE0CD87E3C61F9');
        $this->addSql('ALTER TABLE friends_group_user_profile DROP CONSTRAINT FK_D867A4C76B9DD454');
        $this->addSql('ALTER TABLE friends_list DROP CONSTRAINT FK_C913D5EA7E3C61F9');
        $this->addSql('ALTER TABLE friends_list_user_profile DROP CONSTRAINT FK_60668A9E6B9DD454');
        $this->addSql('ALTER TABLE quote DROP CONSTRAINT FK_6B71CBF4F675F31B');
        $this->addSql('ALTER TABLE user_profile DROP CONSTRAINT FK_D95AB4059D86650F');
        $this->addSql('ALTER TABLE friends_list_user_profile DROP CONSTRAINT FK_60668A9EBAC5E00B');
        $this->addSql('DROP SEQUENCE friends_group_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE user_profile_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE user_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE friends_list_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE quote_id_seq CASCADE');
        $this->addSql('DROP TABLE friends_group');
        $this->addSql('DROP TABLE friends_group_user_profile');
        $this->addSql('DROP TABLE user_profile');
        $this->addSql('DROP TABLE "user"');
        $this->addSql('DROP TABLE friends_list');
        $this->addSql('DROP TABLE friends_list_user_profile');
        $this->addSql('DROP TABLE quote');
    }
}
