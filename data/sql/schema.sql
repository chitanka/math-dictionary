CREATE TABLE bg_de_relation (from_word_id SMALLINT, to_word_id SMALLINT, PRIMARY KEY(from_word_id, to_word_id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci ENGINE = INNODB;
CREATE TABLE bg_en_relation (from_word_id SMALLINT, to_word_id SMALLINT, PRIMARY KEY(from_word_id, to_word_id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci ENGINE = INNODB;
CREATE TABLE bg_word (id SMALLINT AUTO_INCREMENT, name VARCHAR(160), wp_article VARCHAR(160), INDEX name_idx (name), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci ENGINE = INNODB;
CREATE TABLE de_en_relation (from_word_id SMALLINT, to_word_id SMALLINT, PRIMARY KEY(from_word_id, to_word_id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci ENGINE = INNODB;
CREATE TABLE de_word (id SMALLINT AUTO_INCREMENT, name VARCHAR(160), wp_article VARCHAR(160), INDEX name_idx (name), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci ENGINE = INNODB;
CREATE TABLE en_word (id SMALLINT AUTO_INCREMENT, name VARCHAR(160), wp_article VARCHAR(160), INDEX name_idx (name), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci ENGINE = INNODB;
CREATE TABLE relation (from_word_id SMALLINT, to_word_id SMALLINT, PRIMARY KEY(from_word_id, to_word_id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci ENGINE = INNODB;
CREATE TABLE relation_referential (from_word_id SMALLINT, to_word_id SMALLINT, PRIMARY KEY(from_word_id, to_word_id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci ENGINE = INNODB;
CREATE TABLE word (id SMALLINT AUTO_INCREMENT, name VARCHAR(160), wp_article VARCHAR(160), INDEX name_idx (name), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci ENGINE = INNODB;
CREATE TABLE word_referential (id SMALLINT AUTO_INCREMENT, name VARCHAR(160), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci ENGINE = INNODB;
ALTER TABLE bg_de_relation ADD CONSTRAINT bg_de_relation_to_word_id_de_word_id FOREIGN KEY (to_word_id) REFERENCES de_word(id);
ALTER TABLE bg_de_relation ADD CONSTRAINT bg_de_relation_from_word_id_bg_word_id FOREIGN KEY (from_word_id) REFERENCES bg_word(id);
ALTER TABLE bg_en_relation ADD CONSTRAINT bg_en_relation_to_word_id_en_word_id FOREIGN KEY (to_word_id) REFERENCES en_word(id);
ALTER TABLE bg_en_relation ADD CONSTRAINT bg_en_relation_from_word_id_bg_word_id FOREIGN KEY (from_word_id) REFERENCES bg_word(id);
ALTER TABLE de_en_relation ADD CONSTRAINT de_en_relation_to_word_id_en_word_id FOREIGN KEY (to_word_id) REFERENCES en_word(id);
ALTER TABLE de_en_relation ADD CONSTRAINT de_en_relation_from_word_id_de_word_id FOREIGN KEY (from_word_id) REFERENCES de_word(id);
