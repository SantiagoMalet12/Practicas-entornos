<?php
$usuario = "";

if (isset($_POST['usuario'])) {
    $usuario = trim($_POST['usuario']);
    setcookie("usuario", $usuario, time() + (86400 * 30));
} elseif (isset($_COOKIE['usuario'])) {
    $usuario = $_COOKIE['usuario'];
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Ejercicio 3 - Cookie de usuario</title>
    <meta charset="utf-8">
</head>
<body>
    <h2>Ejercicio 3</h2>
    <p><a href="index.php">Volver al Menú</a></p>

    <?php if (!empty($usuario)): ?>
        <p>Último nombre de usuario ingresado: <b><?php echo htmlspecialchars($usuario); ?></b></p>
    <?php endif; ?>

    <form action="Ejercicio3.php" method="post">
        <label for="usuario">Nombre de usuario:</label>
        <input type="text" id="usuario" name="usuario" value="<?php echo htmlspecialchars($usuario); ?>" required>
        <input type="submit" value="Guardar usuario">
    </form>
</body>
</html>
