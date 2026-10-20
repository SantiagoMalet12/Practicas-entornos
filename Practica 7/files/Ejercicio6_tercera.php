<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Ejercicio 6 - Tercera Página</title>
    <meta charset="utf-8">
</head>
<body>
    <h2>Ejercicio 6 - Tercera Página</h2>

    <?php
    if (isset($_SESSION['nombre'])) {
        echo "<p>¡Bienvenido/a " . htmlspecialchars($_SESSION['nombre']) . "!</p>";
    } else {
        echo "<p>No puede visitar esta página.</p>";
    }
    ?>

    <p><a href="Ejercicio6.php">Volver al formulario</a></p>
    <p><a href="index.php">Volver al Menú</a></p>
</body>
</html>
