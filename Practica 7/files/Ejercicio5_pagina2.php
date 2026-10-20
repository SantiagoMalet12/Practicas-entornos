<?php
session_start();

if (($_SERVER['REQUEST_METHOD'] ?? '') === 'POST' && isset($_POST['usuario']) && isset($_POST['clave'])) {
    $_SESSION['usuario'] = $_POST['usuario'];
    $_SESSION['clave'] = $_POST['clave'];
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Ejercicio 5 - Página 2</title>
    <meta charset="utf-8">
</head>
<body>
    <h2>Ejercicio 5 - Página 2</h2>
    <p>Se han creado las variables de sesión <code>$_SESSION['usuario']</code> y <code>$_SESSION['clave']</code>.</p>
    <p><a href="Ejercicio5_pagina3.php">Ir a la Página 3</a></p>
    <p><a href="Ejercicio5.php">Volver a Página 1</a></p>
</body>
</html>
