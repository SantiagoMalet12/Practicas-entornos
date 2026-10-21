<?php
session_start();
include("conexion.php");
mysqli_select_db($link, "base2");

$mensaje = "";
$alumnoEncontrado = false;

if (isset($_POST['mail'])) {
    $mail = $_POST['mail'];
    $mailEsc = mysqli_real_escape_string($link, $mail);
    $sql = "SELECT codigo, nombre, codigocurso, mail FROM alumnos WHERE mail = '$mailEsc'";
    $resultado = mysqli_query($link, $sql);

    if ($resultado && mysqli_num_rows($resultado) > 0) {
        $fila = mysqli_fetch_assoc($resultado);
        $_SESSION['nombre'] = $fila['nombre'];
        $alumnoEncontrado = true;
        $mensaje = "El mail ingresado existe en la tabla alumnos. Se guardó el nombre (" . htmlspecialchars($fila['nombre']) . ") en la variable de sesión.";
    } else {
        $mensaje = "El mail ingresado no existe en la tabla alumnos.";
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Ejercicio 6 - Página 2</title>
    <meta charset="utf-8">
</head>
<body>
    <h2>Ejercicio 6 - Página 2</h2>
    <p><?php echo $mensaje; ?></p>

    <?php if ($alumnoEncontrado): ?>
        <p><a href="Ejercicio6_tercera.php">Ir a la tercera página</a></p>
    <?php endif; ?>

    <p><a href="Ejercicio6.php">Volver al formulario</a></p>
</body>
</html>
