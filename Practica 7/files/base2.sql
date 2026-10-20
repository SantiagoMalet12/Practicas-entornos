CREATE DATABASE IF NOT EXISTS base2;
USE base2;

DROP TABLE IF EXISTS alumnos;

CREATE TABLE alumnos (
    codigo INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(100) NOT NULL,
    codigocurso INT NOT NULL,
    mail VARCHAR(100) NOT NULL UNIQUE
);

INSERT INTO alumnos (nombre, codigocurso, mail) VALUES
('Juan Pérez', 101, 'juan.perez@alumnos.utn.edu.ar'),
('María García', 102, 'maria.garcia@alumnos.utn.edu.ar'),
('Lucas Costamagna', 101, 'lucas.costamagna@alumnos.utn.edu.ar'),
('Ana Rodríguez', 103, 'ana.rodriguez@alumnos.utn.edu.ar'),
('Carlos Fernández', 102, 'carlos.fernandez@alumnos.utn.edu.ar');
