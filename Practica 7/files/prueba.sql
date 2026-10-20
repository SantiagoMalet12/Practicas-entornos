CREATE DATABASE IF NOT EXISTS prueba;
USE prueba;

DROP TABLE IF EXISTS buscador;

CREATE TABLE buscador (
    id INT AUTO_INCREMENT PRIMARY KEY,
    canciones VARCHAR(255) NOT NULL
);

INSERT INTO buscador (canciones) VALUES
('De Música Ligera - Soda Stereo'),
('Persiana Americana - Soda Stereo'),
('Bohemian Rhapsody - Queen'),
('Don\'t Stop Me Now - Queen'),
('Imagine - John Lennon'),
('Seguir Viviendo Sin Tu Amor - Luis Alberto Spinetta'),
('Rezo por Vos - Charly García & Luis Alberto Spinetta'),
('Crimen - Gustavo Cerati'),
('Puente - Gustavo Cerati'),
('Hotel California - Eagles'),
('Smells Like Teen Spirit - Nirvana'),
('Muchacha Ojos de Papel - Almendra'),
('La Bifurcada - Memphis La Blusera'),
('Seminare - Serú Girán'),
('Ji ji ji - Patricio Rey y sus Redonditos de Ricota');
