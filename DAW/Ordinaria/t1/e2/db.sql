DROP TABLE IF EXISTS destinos_turisticos;

CREATE TABLE destinos_turisticos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(255) NOT NULL,
    descripcion TEXT NOT NULL,
    slug VARCHAR(255) UNIQUE NOT NULL
);

INSERT INTO destinos_turisticos (nombre, descripcion, slug) VALUES
('Playa Blanca', 'Hermosa playa de arena blanca y aguas cristalinas.', 'playa-blanca'),
('Montañas Azules', 'Impresionantes montañas que ofrecen vistas espectaculares y senderos para caminatas.', 'montanas-azules'),
('Ciudad Antigua', 'Una ciudad con rica historia y arquitectura conservada desde el siglo XV.', 'ciudad-antigua'),
('Selva Profunda', 'Explora la biodiversidad única de una de las selvas más densas y menos exploradas.', 'selva-profunda'),
('Desierto de Cristales', 'Un paisaje desértico conocido por sus formaciones únicas de cristales.', 'desierto-de-cristales');

