<?php
session_start();
require_once("conexion.php");
mysqli_select_db($link, "base2");

$mensaje = "";

if (($_SERVER['REQUEST_METHOD'] ?? '') === 'POST' && isset($_POST['mail'])) {
    $mail = trim($_POST['mail']);
    $mailEsc = mysqli_real_escape_string($link, $mail);
    $sql = "SELECT codigo, nombre, codigocurso, mail FROM alumnos WHERE mail = '$mailEsc'";
    $resultado = mysqli_query($link, $sql);

    if ($resultado && mysqli_num_rows($resultado) > 0) {
        $fila = mysqli_fetch_assoc($resultado);
        $_SESSION['nombre'] = $fila['nombre'];
        $mensaje = "El mail existe en la tabla. Se guardó el nombre en la variable de sesión.";
    } else {
        $mensaje = "El mail ingresado no existe en la tabla alumnos.";
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Ejercicio 6 - Formulario Alumno</title>
    <meta charset="utf-8">
</head>
<body>
    <h2>Ejercicio 6</h2>
    <p><a href="index.php">Volver al Menú</a></p>

    <?php if (!empty($mensaje)): ?>
        <p><b><?php echo $mensaje; ?></b></p>
    <?php endif; ?>

    <form action="Ejercicio6.php" method="POST">
        <label for="mail">Ingresar mail del alumno:</label><br>
        <input type="email" id="mail" name="mail" required><br><br>
        <input type="submit" value="Buscar alumno">
    </form>

    <p><a href="Ejercicio6_tercera.php">Ir a la tercera página</a></p>
</body>
</html>
