CREATE DATABASE IF NOT EXISTS supergame CHARSET utf8mb4;
USE supergame;
CREATE TABLE IF NOT EXISTS team(
	id_team INT PRIMARY KEY AUTO_INCREMENT,
    team VARCHAR(50) NOT NULL UNIQUE
)ENGINE=InnoDB;
CREATE TABLE IF NOT EXISTS player(
	id_player INT PRIMARY KEY AUTO_INCREMENT,
    pseudo VARCHAR(50) NOT NULL UNIQUE,
    score INT NOT NULL DEFAULT 0,
    id_team INT DEFAULT 1,
    CONSTRAINT fk_player_team FOREIGN KEY (id_team) REFERENCES team(id_team)
)ENGINE=InnoDB;
INSERT INTO team (team) VALUES ('aucune'),('TeamRocket'),('DreamTeam');
INSERT INTO player (pseudo, score, id_team)
	VALUES ('Yoann',500,2),
		('Mathieu',750,3),
        ('Jeff',100,3),
        ('Yann',600,2),
        ('Marie',0,1);