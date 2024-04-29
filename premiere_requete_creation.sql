DROP DATABASE IF EXISTS `dicegather`;
CREATE DATABASE IF NOT EXISTS `DiceGather` CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;

USE `DiceGather`;

CREATE TABLE IF NOT EXISTS `user` (
    id_user INT AUTO_INCREMENT PRIMARY KEY,
    nom VARCHAR(60) NOT NUll,
    prenom VARCHAR(60) NOT NULL,
    email VARCHAR(100) NOT NULL UNIQUE,
    date_de_naissance DATE NOT NULL,
    ville_de_residence VARCHAR(30) NOT NULL,
    date_d_inscription DATETIME DEFAULT CURRENT_TIMESTAMP,
    hash VARCHAR(120) NOT NULL
) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS profil_joueur (
    id_profil INT AUTO_INCREMENT PRIMARY KEY,
    id_user INT,
    pseudo VARCHAR(60),
    img_profil VARCHAR(60),
    date_creation DATETIME,
    jeu1 VARCHAR(60),
    jeu2 VARCHAR(60),
    jeu3 VARCHAR(60),
    description_joueur VARCHAR(1000),
    description_mj VARCHAR(1000),
    bonne_table VARCHAR(1000),
    mj_pasMj BOOLEAN,
    FOREIGN KEY (id_user) REFERENCES `user`(id_user) ON DELETE CASCADE
) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS recherche(
    id_recherche INT AUTO_INCREMENT PRIMARY KEY,
    email_user VARCHAR(100),
    recherche TEXT,
    FOREIGN KEY (email_user) REFERENCES `user`(email) ON DELETE CASCADE
)CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS message_prive (
    id_message INT AUTO_INCREMENT PRIMARY KEY,
    id_user INT,
    id_profil INT,
    contenu VARCHAR(1000),
    FOREIGN KEY (id_user) REFERENCES `user`(id_user) ON DELETE CASCADE,
    FOREIGN KEY (id_profil) REFERENCES profil_joueur(id_profil) ON DELETE CASCADE   
)CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS table_de_jeu(
    id_table INT AUTO_INCREMENT PRIMARY KEY,
    id_user INT,
    id_MJ INT,
    id_profil INT,
    nom VARCHAR(60) NOT NUll,
    systeme VARCHAR(100) NOT NUll,
    img VARCHAR(100),
    titreDescription VARCHAR(50),
    description TEXT,
    createdAt DATETIME DEFAULT CURRENT_TIMESTAMP,
    dateSeance VARCHAR(20),
    FOREIGN KEY (id_user) REFERENCES `user`(id_user) ON DELETE CASCADE,
    FOREIGN KEY (id_MJ) REFERENCES `user`(id_user) ON DELETE CASCADE,
    FOREIGN KEY (id_profil) REFERENCES profil_joueur(id_profil)
)CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS message(
    id_message INT AUTO_INCREMENT PRIMARY KEY,
    contenu VARCHAR(255),
    date_creation DATETIME,
    id_user INT,
    FOREIGN KEY (id_user) REFERENCES `user`(id_user) ON DELETE CASCADE
)CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS chat(
    id_tablechat VARCHAR(120) PRIMARY KEY,
    id_table INT,
    id_message INT,
    FOREIGN KEY (id_table) REFERENCES table_de_jeu(id_table) ON DELETE CASCADE,
    FOREIGN KEY (id_message) REFERENCES message(id_message)  ON DELETE CASCADE
)CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE=InnoDB;
