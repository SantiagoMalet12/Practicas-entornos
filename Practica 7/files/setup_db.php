<?php
include("conexion.php");

$mensajes = [];

$sqlBase2 = "
CREATE DATABASE IF NOT EXISTS base2;
USE base2;
CREATE TABLE IF NOT EXISTS alumnos (
    codigo INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(100) NOT NULL,
    codigocurso INT NOT NULL,
    mail VARCHAR(100) NOT NULL UNIQUE
);
";
if (mysqli_multi_query($link, $sqlBase2)) {
    do {
        if ($res = mysqli_store_result($link)) {
            mysqli_free_result($res);
        }
    } while (mysqli_more_results($link) && mysqli_next_result($link));
    $mensajes[] = "Base de datos 'base2' y tabla 'alumnos' verificadas/creadas.";

    mysqli_select_db($link, "base2");
    $check = mysqli_query($link, "SELECT COUNT(*) AS total FROM alumnos");
    $row = mysqli_fetch_assoc($check);
    if ($row['total'] == 0) {
        $insert = "INSERT INTO alumnos (nombre, codigocurso, mail) VALUES
            ('Juan Pérez', 101, 'juan.perez@alumnos.utn.edu.ar'),
            ('María García', 102, 'maria.garcia@alumnos.utn.edu.ar'),
            ('Lucas Costamagna', 101, 'lucas.costamagna@alumnos.utn.edu.ar'),
            ('Ana Rodríguez', 103, 'ana.rodriguez@alumnos.utn.edu.ar'),
            ('Carlos Fernández', 102, 'carlos.fernandez@alumnos.utn.edu.ar')";
        mysqli_query($link, $insert);
        $mensajes[] = "Alumnos de prueba insertados en 'base2'.";
    }
} else {
    $mensajes[] = "Error al configurar 'base2': " . mysqli_error($link);
}

$sqlCompras = "
CREATE DATABASE IF NOT EXISTS Compras;
USE Compras;
CREATE TABLE IF NOT EXISTS `catalogo` (
    id INT AUTO_INCREMENT PRIMARY KEY,
    producto VARCHAR(100) NOT NULL,
    precio DECIMAL(9, 2) NOT NULL
);
";
if (mysqli_multi_query($link, $sqlCompras)) {
    do {
        if ($res = mysqli_store_result($link)) {
            mysqli_free_result($res);
        }
    } while (mysqli_more_results($link) && mysqli_next_result($link));
    $mensajes[] = "Base de datos 'Compras' y tabla 'catalogo' verificadas/creadas.";

    mysqli_select_db($link, "Compras");
    $check = mysqli_query($link, "SELECT COUNT(*) AS total FROM `catalogo`");
    $row = mysqli_fetch_assoc($check);
    if ($row['total'] == 0) {
        $insert = "INSERT INTO `catalogo` (producto, precio) VALUES
            ('Teclado Mecánico RGB', 35500.00),
            ('Mouse Inalámbrico Ergonómico', 18900.50),
            ('Monitor Gamer 24\" 144Hz', 185000.00),
            ('Auriculares con Micrófono HyperX', 52000.00),
            ('Webcam Full HD 1080p', 29400.00),
            ('Pad Mouse XXL', 9500.00),
            ('Soporte de Aluminio para Notebook', 16200.00),
            ('Memoria RAM 16GB DDR4 3200MHz', 48000.00)";
        mysqli_query($link, $insert);
        $mensajes[] = "Productos de prueba insertados en 'Compras'.";
    }
} else {
    $mensajes[] = "Error al configurar 'Compras': " . mysqli_error($link);
}

$sqlPrueba = "
CREATE DATABASE IF NOT EXISTS prueba;
USE prueba;
CREATE TABLE IF NOT EXISTS buscador (
    id INT AUTO_INCREMENT PRIMARY KEY,
    canciones VARCHAR(255) NOT NULL
);
";
if (mysqli_multi_query($link, $sqlPrueba)) {
    do {
        if ($res = mysqli_store_result($link)) {
            mysqli_free_result($res);
        }
    } while (mysqli_more_results($link) && mysqli_next_result($link));
    $mensajes[] = "Base de datos 'prueba' y tabla 'buscador' verificadas/creadas.";

    mysqli_select_db($link, "prueba");
    $check = mysqli_query($link, "SELECT COUNT(*) AS total FROM buscador");
    $row = mysqli_fetch_assoc($check);
    if ($row['total'] == 0) {
        $insert = "INSERT INTO buscador (canciones) VALUES
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
            ('Ji ji ji - Patricio Rey y sus Redonditos de Ricota')";
        mysqli_query($link, $insert);
        $mensajes[] = "Canciones de prueba insertados en 'prueba'.";
    }
} else {
    $mensajes[] = "Error al configurar 'prueba': " . mysqli_error($link);
}

mysqli_close($link);
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Configuración de Bases de Datos</title>
</head>
<body>
    <h2>Configuración de Bases de Datos - Práctica 7</h2>
    <ul>
        <?php foreach ($mensajes as $msg): ?>
            <li><?php echo htmlspecialchars($msg); ?></li>
        <?php endforeach; ?>
    </ul>
    <p><a href="index.php">Volver al Menú Principal</a></p>
</body>
</html>
