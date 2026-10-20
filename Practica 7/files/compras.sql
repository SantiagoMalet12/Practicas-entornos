CREATE DATABASE IF NOT EXISTS Compras;
USE Compras;

DROP TABLE IF EXISTS `catálogo`;
DROP TABLE IF EXISTS catalogo;

CREATE TABLE `catalogo` (
    id INT AUTO_INCREMENT PRIMARY KEY,
    producto VARCHAR(100) NOT NULL,
    precio DECIMAL(9, 2) NOT NULL
);

INSERT INTO `catalogo` (producto, precio) VALUES
('Teclado Mecánico RGB', 35500.00),
('Mouse Inalámbrico Ergonómico', 18900.50),
('Monitor Gamer 24" 144Hz', 185000.00),
('Auriculares con Micrófono HyperX', 52000.00),
('Webcam Full HD 1080p', 29400.00),
('Pad Mouse XXL', 9500.00),
('Soporte de Aluminio para Notebook', 16200.00),
('Memoria RAM 16GB DDR4 3200MHz', 48000.00);
