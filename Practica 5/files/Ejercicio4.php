<?php
session_start();

if (isset($_GET['reiniciar'])) {
    session_destroy();
    header("Location: Ejercicio4.php");
    exit();
}

if (!isset($_SESSION['paginas_visitadas'])) {
    $_SESSION['paginas_visitadas'] = 1;
} else {
    $_SESSION['paginas_visitadas']++;
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Ejercicio 4 - Contador de Páginas</title>
    <meta charset="utf-8">
</head>
<body>
    <h2>Ejercicio 4 - Contador de páginas visitadas en la sesión</h2>
    <p><a href="index.php">Volver al Menú</a></p>

    <p>Páginas visitadas durante esta sesión: <b><?php echo $_SESSION['paginas_visitadas']; ?></b></p>

    <p>
        <a href="Ejercicio4.php">Recargar esta página</a> | 
        <a href="pagina2.php">Ir a Página 2</a> | 
        <a href="pagina3.php">Ir a Página 3</a> | 
        <a href="Ejercicio4.php?reiniciar=1">Reiniciar sesión</a>
    </p>
</body>
</html>
