<?php
if (!isset($_COOKIE['contador'])) {
    setcookie("contador", 1, time() + (3600 * 24 * 365));
    $mensaje = "¡Bienvenido a la página por primera vez!";
} else {
    $visitas = $_COOKIE['contador'] + 1;
    setcookie("contador", $visitas, time() + (3600 * 24 * 365));
    $mensaje = "Número de veces que se ha visitado dicha página: " . $visitas;
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Ejercicio 2 - Contador de visitas</title>
    <meta charset="utf-8">
</head>
<body>
    <h2>Ejercicio 2</h2>
    <p><a href="index.php">Volver al Menú</a></p>

    <p><?php echo $mensaje; ?></p>
</body>
</html>
