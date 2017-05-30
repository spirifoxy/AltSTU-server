<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20170530162306 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'postgresql', 'Migration can only be executed safely on \'postgresql\'.');

        $this->addSql('CREATE SEQUENCE building_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE degree_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE educform_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE faculty_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE group_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE post_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE rank_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE toom_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE roomtype_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE semester_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE speciality_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE subfaculty_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE teacher_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE timetable_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE typelect_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE user_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE TABLE building (id INT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE degree (id INT NOT NULL, shortdegree VARCHAR(255) DEFAULT NULL, longdegree VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE educform (id INT NOT NULL, formname VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE faculty (id INT NOT NULL, fullname VARCHAR(255) NOT NULL, shortname VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE "group" (id INT NOT NULL, subfaculty_id INT DEFAULT NULL, faculty_id INT DEFAULT NULL, semester_id INT DEFAULT NULL, educform_id INT DEFAULT NULL, speciality_id INT DEFAULT NULL, name1 VARCHAR(255) DEFAULT NULL, name2 VARCHAR(255) DEFAULT NULL, peoplecount INT DEFAULT NULL, iddaynight INT DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_6DC044C5379D4CCB ON "group" (subfaculty_id)');
        $this->addSql('CREATE INDEX IDX_6DC044C5680CAB68 ON "group" (faculty_id)');
        $this->addSql('CREATE INDEX IDX_6DC044C54A798B6F ON "group" (semester_id)');
        $this->addSql('CREATE INDEX IDX_6DC044C5B4C24A5D ON "group" (educform_id)');
        $this->addSql('CREATE INDEX IDX_6DC044C53B5A08D7 ON "group" (speciality_id)');
        $this->addSql('CREATE TABLE post (id INT NOT NULL, longname VARCHAR(255) NOT NULL, shortname VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE rank (id INT NOT NULL, rankname VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE toom (id INT NOT NULL, roomtype_id INT DEFAULT NULL, building_id INT DEFAULT NULL, number VARCHAR(255) NOT NULL, capacity INT DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_57F40E477D31ADD1 ON toom (roomtype_id)');
        $this->addSql('CREATE INDEX IDX_57F40E474D2A7E12 ON toom (building_id)');
        $this->addSql('CREATE TABLE roomtype (id INT NOT NULL, type VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE semester (id INT NOT NULL, name VARCHAR(255) DEFAULT NULL, begindate DATE NOT NULL, enddate DATE NOT NULL, beginbreak DATE DEFAULT NULL, endbreak DATE DEFAULT NULL, beginsession DATE DEFAULT NULL, endsession DATE NOT NULL, lastweeknumber INT DEFAULT NULL, beginday1 DATE DEFAULT NULL, endday1 DATE DEFAULT NULL, beginday2 DATE DEFAULT NULL, endday2 DATE DEFAULT NULL, beginday3 DATE DEFAULT NULL, endday3 DATE DEFAULT NULL, isactive BOOLEAN DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE speciality (id INT NOT NULL, shortspeciality VARCHAR(255) NOT NULL, longspeciality VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE subfaculty (id INT NOT NULL, faculty_id INT DEFAULT NULL, shortsubfaculty VARCHAR(255) NOT NULL, longsubfaculty VARCHAR(255) NOT NULL, isexist BOOLEAN NOT NULL, idboss INT DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_5CF4C88C680CAB68 ON subfaculty (faculty_id)');
        $this->addSql('CREATE TABLE teacher (id INT NOT NULL, post_id INT DEFAULT NULL, degree_id INT DEFAULT NULL, rank_id INT DEFAULT NULL, subfaculty_id INT DEFAULT NULL, name VARCHAR(255) NOT NULL, surname VARCHAR(255) NOT NULL, patronymic VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_B0F6A6D54B89032C ON teacher (post_id)');
        $this->addSql('CREATE INDEX IDX_B0F6A6D5B35C5756 ON teacher (degree_id)');
        $this->addSql('CREATE INDEX IDX_B0F6A6D57616678F ON teacher (rank_id)');
        $this->addSql('CREATE INDEX IDX_B0F6A6D5379D4CCB ON teacher (subfaculty_id)');
        $this->addSql('CREATE TABLE timetable (id INT NOT NULL, room_id INT DEFAULT NULL, teacher_id INT DEFAULT NULL, typelect_id INT DEFAULT NULL, semester_id INT DEFAULT NULL, group_id INT DEFAULT NULL, begindatetime DATE NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_6B1F67054177093 ON timetable (room_id)');
        $this->addSql('CREATE INDEX IDX_6B1F67041807E1D ON timetable (teacher_id)');
        $this->addSql('CREATE INDEX IDX_6B1F670F068CDC9 ON timetable (typelect_id)');
        $this->addSql('CREATE INDEX IDX_6B1F6704A798B6F ON timetable (semester_id)');
        $this->addSql('CREATE INDEX IDX_6B1F670FE54D947 ON timetable (group_id)');
        $this->addSql('CREATE TABLE typelect (id INT NOT NULL, type INT NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE "user" (id INT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('ALTER TABLE "group" ADD CONSTRAINT FK_6DC044C5379D4CCB FOREIGN KEY (subfaculty_id) REFERENCES subfaculty (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE "group" ADD CONSTRAINT FK_6DC044C5680CAB68 FOREIGN KEY (faculty_id) REFERENCES faculty (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE "group" ADD CONSTRAINT FK_6DC044C54A798B6F FOREIGN KEY (semester_id) REFERENCES semester (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE "group" ADD CONSTRAINT FK_6DC044C5B4C24A5D FOREIGN KEY (educform_id) REFERENCES educform (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE "group" ADD CONSTRAINT FK_6DC044C53B5A08D7 FOREIGN KEY (speciality_id) REFERENCES speciality (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE toom ADD CONSTRAINT FK_57F40E477D31ADD1 FOREIGN KEY (roomtype_id) REFERENCES roomtype (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE toom ADD CONSTRAINT FK_57F40E474D2A7E12 FOREIGN KEY (building_id) REFERENCES building (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE subfaculty ADD CONSTRAINT FK_5CF4C88C680CAB68 FOREIGN KEY (faculty_id) REFERENCES faculty (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE teacher ADD CONSTRAINT FK_B0F6A6D54B89032C FOREIGN KEY (post_id) REFERENCES post (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE teacher ADD CONSTRAINT FK_B0F6A6D5B35C5756 FOREIGN KEY (degree_id) REFERENCES degree (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE teacher ADD CONSTRAINT FK_B0F6A6D57616678F FOREIGN KEY (rank_id) REFERENCES rank (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE teacher ADD CONSTRAINT FK_B0F6A6D5379D4CCB FOREIGN KEY (subfaculty_id) REFERENCES subfaculty (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE timetable ADD CONSTRAINT FK_6B1F67054177093 FOREIGN KEY (room_id) REFERENCES toom (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE timetable ADD CONSTRAINT FK_6B1F67041807E1D FOREIGN KEY (teacher_id) REFERENCES teacher (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE timetable ADD CONSTRAINT FK_6B1F670F068CDC9 FOREIGN KEY (typelect_id) REFERENCES typelect (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE timetable ADD CONSTRAINT FK_6B1F6704A798B6F FOREIGN KEY (semester_id) REFERENCES semester (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE timetable ADD CONSTRAINT FK_6B1F670FE54D947 FOREIGN KEY (group_id) REFERENCES "group" (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'postgresql', 'Migration can only be executed safely on \'postgresql\'.');

        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE toom DROP CONSTRAINT FK_57F40E474D2A7E12');
        $this->addSql('ALTER TABLE teacher DROP CONSTRAINT FK_B0F6A6D5B35C5756');
        $this->addSql('ALTER TABLE "group" DROP CONSTRAINT FK_6DC044C5B4C24A5D');
        $this->addSql('ALTER TABLE "group" DROP CONSTRAINT FK_6DC044C5680CAB68');
        $this->addSql('ALTER TABLE subfaculty DROP CONSTRAINT FK_5CF4C88C680CAB68');
        $this->addSql('ALTER TABLE timetable DROP CONSTRAINT FK_6B1F670FE54D947');
        $this->addSql('ALTER TABLE teacher DROP CONSTRAINT FK_B0F6A6D54B89032C');
        $this->addSql('ALTER TABLE teacher DROP CONSTRAINT FK_B0F6A6D57616678F');
        $this->addSql('ALTER TABLE timetable DROP CONSTRAINT FK_6B1F67054177093');
        $this->addSql('ALTER TABLE toom DROP CONSTRAINT FK_57F40E477D31ADD1');
        $this->addSql('ALTER TABLE "group" DROP CONSTRAINT FK_6DC044C54A798B6F');
        $this->addSql('ALTER TABLE timetable DROP CONSTRAINT FK_6B1F6704A798B6F');
        $this->addSql('ALTER TABLE "group" DROP CONSTRAINT FK_6DC044C53B5A08D7');
        $this->addSql('ALTER TABLE "group" DROP CONSTRAINT FK_6DC044C5379D4CCB');
        $this->addSql('ALTER TABLE teacher DROP CONSTRAINT FK_B0F6A6D5379D4CCB');
        $this->addSql('ALTER TABLE timetable DROP CONSTRAINT FK_6B1F67041807E1D');
        $this->addSql('ALTER TABLE timetable DROP CONSTRAINT FK_6B1F670F068CDC9');
        $this->addSql('DROP SEQUENCE building_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE degree_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE educform_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE faculty_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE group_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE post_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE rank_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE toom_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE roomtype_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE semester_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE speciality_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE subfaculty_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE teacher_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE timetable_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE typelect_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE user_id_seq CASCADE');
        $this->addSql('DROP TABLE building');
        $this->addSql('DROP TABLE degree');
        $this->addSql('DROP TABLE educform');
        $this->addSql('DROP TABLE faculty');
        $this->addSql('DROP TABLE "group"');
        $this->addSql('DROP TABLE post');
        $this->addSql('DROP TABLE rank');
        $this->addSql('DROP TABLE toom');
        $this->addSql('DROP TABLE roomtype');
        $this->addSql('DROP TABLE semester');
        $this->addSql('DROP TABLE speciality');
        $this->addSql('DROP TABLE subfaculty');
        $this->addSql('DROP TABLE teacher');
        $this->addSql('DROP TABLE timetable');
        $this->addSql('DROP TABLE typelect');
        $this->addSql('DROP TABLE "user"');
    }
}
