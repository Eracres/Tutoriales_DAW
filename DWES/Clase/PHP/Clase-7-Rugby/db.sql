DROP TABLE IF EXISTS matche;

CREATE TABLE matche (
    id              INT AUTO_INCREMENT PRIMARY KEY,
    country         VARCHAR(255) NOT NULL,
    result          VARCHAR(255) NOT NULL,
    score           VARCHAR(255) NOT NULL
);

INSERT INTO matche (country, result, score) VALUES ('Nueva-Zelanda', 'Ganado', '28-14');
INSERT INTO matche (country, result, score) VALUES ('Australia', 'Perdido', '10-35');
INSERT INTO matche (country, result, score) VALUES ('Sudáfrica', 'Empatado', '21-21');
INSERT INTO matche (country, result, score) VALUES ('Inglaterra', 'Ganado', '17-10');
INSERT INTO matche (country, result, score) VALUES ('Francia', 'Perdido', '14-21');
INSERT INTO matche (country, result, score) VALUES ('Irlanda', 'Ganado', '24-17');
INSERT INTO matche (country, result, score) VALUES ('Gales', 'Perdido', '13-28');
INSERT INTO matche (country, result, score) VALUES ('Escocia', 'Empatado', '19-19');
