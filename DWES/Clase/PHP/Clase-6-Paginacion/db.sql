DROP TABLE IF EXISTS acciones;

CREATE TABLE acciones (
    id              INT AUTO_INCREMENT PRIMARY KEY,
    fecha           DATE,
    lugar           VARCHAR(255) NOT NULL,
    nombre          VARCHAR(255),
    descripcion     TEXT,
    foto            VARCHAR(255)
);

INSERT INTO acciones (fecha, lugar, nombre, descripcion, foto) VALUES ('2024-04-22','Madrid','Pedro','Planto una flor', '/subidas/flores.jpg');

INSERT INTO acciones (fecha, lugar, nombre, descripcion, foto) VALUES ('2024-04-23','Toledo','Carmen','Planto un arbol', '/subidas/flores.jpg');

INSERT INTO acciones (fecha, lugar, nombre, descripcion, foto) VALUES ('2024-04-24','Zaragoza','Jorge','Planto moras', '/subidas/flores.jpg');

INSERT INTO acciones (fecha, lugar, nombre, descripcion, foto) VALUES ('2024-04-25','Guadalajara','Piero','Planto geranios', '/subidas/flores.jpg');

INSERT INTO acciones (fecha, lugar, nombre, descripcion, foto) VALUES ('2024-04-26','Valencia','Sergio','Planto rosas', '/subidas/flores.jpg');

INSERT INTO acciones (fecha, lugar, nombre, descripcion, foto) VALUES ('2024-04-27','Barcelona','Sandra','Planto un cipres', '/subidas/flores.jpg');

INSERT INTO acciones (fecha, lugar, nombre, descripcion, foto) VALUES ('2024-04-28','Oviedo','Lucia','Planto una secuoya', '/subidas/flores.jpg');