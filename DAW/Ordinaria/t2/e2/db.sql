DROP TABLE IF EXISTS libros_recomendados;

CREATE TABLE libros_recomendados (
    id INT AUTO_INCREMENT PRIMARY KEY,
    titulo VARCHAR(255) NOT NULL,
    autor VARCHAR(255) NOT NULL,
    descripcion TEXT NOT NULL,
    slug VARCHAR(255) UNIQUE NOT NULL
);

INSERT INTO libros_recomendados (titulo, autor, descripcion, slug) VALUES
('El Alquimista', 'Paulo Coelho', 'Un viaje místico para encontrar tu leyenda personal.', 'el-alquimista'),
('1984', 'George Orwell', 'Una distopía sobre la vigilancia gubernamental y la opresión.', '1984'),
('Cien años de soledad', 'Gabriel García Márquez', 'La magistral narrativa del realismo mágico retrata la historia de la familia Buendía.', 'cien-anos-de-soledad'),
('To Kill a Mockingbird', 'Harper Lee', 'Una profunda reflexión sobre la justicia y la moral en el sur de Estados Unidos.', 'to-kill-a-mockingbird'),
('La sombra del viento', 'Carlos Ruiz Zafón', 'Un emocionante misterio en el corazón de la Barcelona de posguerra.', 'la-sombra-del-viento');