<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Ejercicio 5 - Página 3</title>
    <meta charset="utf-8">
</head>
<body>
    <h2>Ejercicio 5 - Página 3</h2>

    <?php if (isset($_SESSION['usuario']) && isset($_SESSION['clave'])): ?>
        <p>Valores almacenados en las variables de sesión:</p>
        <p>Usuario: <b><?php echo htmlspecialchars($_SESSION['usuario']); ?></b></p>
        <p>Clave: <b><?php echo htmlspecialchars($_SESSION['clave']); ?></b></p>
    <?php else: ?>
        <p>No se encontraron variables de sesión definidas.</p>
    <?php endif; ?>

    <p><a href="Ejercicio5.php">Volver a Página 1</a></p>
    <p><a href="index.php">Volver al Menú</a></p>
</body>
</html>
