DROP TABLE IF EXISTS botanica;

CREATE TABLE botanica (
    id              INT AUTO_INCREMENT PRIMARY KEY,
    fecha           DATE NOT NULL,
    lugar           VARCHAR(255) NOT NULL,
    nombre          VARCHAR(255),
    descripcion     TEXT, 
    foto            VARCHAR(255) NOT NULL
);

INSERT INTO botanica (fecha, lugar, nombre, descripcion, foto) 
    VALUES ('2024-04-22', 'Madrid', 'Sergio', 'Plantó un arbol', 'subidas/arbol.jpg');

INSERT INTO botanica (fecha, lugar, nombre, descripcion, foto) 
    VALUES ('2024-05-01', 'Barcelona', 'Ana', 'Cultivó un jardín vertical en su balcón', 'subidas/jardin_vertical.jpg');

INSERT INTO botanica (fecha, lugar, nombre, descripcion, foto) 
    VALUES ('2024-04-30', 'Sevilla', 'Pablo', 'Sembró una maceta de flores en la terraza', 'subidas/maceta_flores.jpg');

INSERT INTO botanica (fecha, lugar, nombre, descripcion, foto) 
    VALUES ('2024-04-29', 'Valencia', 'María', 'Descubrió una nueva especie de orquídea en el bosque', 'subidas/orquidea_nueva.jpg');

INSERT INTO botanica (fecha, lugar, nombre, descripcion, foto) 
    VALUES ('2024-04-28', 'Granada', 'Juan', 'Realizó un estudio sobre la biodiversidad en un humedal cercano', 'subidas/estudio_biodiversidad.jpg');

INSERT INTO botanica (fecha, lugar, nombre, descripcion, foto) 
    VALUES ('2024-04-27', 'Bilbao', 'Laura', 'Inició un proyecto de reforestación en colaboración con la comunidad local', 'subidas/proyecto_reforestacion.jpg');

INSERT INTO botanica (fecha, lugar, nombre, descripcion, foto) 
    VALUES ('2024-04-26', 'Málaga', 'Carlos', 'Identificó y clasificó varias especies de hongos silvestres en el bosque', 'subidas/hongos_silvestres.jpg');
