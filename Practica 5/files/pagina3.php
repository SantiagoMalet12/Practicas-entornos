<?php
session_start();

if (!isset($_SESSION['paginas_visitadas'])) {
    $_SESSION['paginas_visitadas'] = 1;
} else {
    $_SESSION['paginas_visitadas']++;
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Página 3</title>
    <meta charset="utf-8">
</head>
<body>
    <h2>Página 3 de Demostración</h2>
    <p>Páginas visitadas acumuladas en la sesión: <b><?php echo $_SESSION['paginas_visitadas']; ?></b></p>
    <p>
        <a href="Ejercicio4.php">Volver al Ejercicio 4</a> | 
        <a href="pagina2.php">Ir a Página 2</a>
    </p>
</body>
</html>
