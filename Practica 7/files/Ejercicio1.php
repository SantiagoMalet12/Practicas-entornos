<?php
if (isset($_POST["estilo"])) {
    $estilo = $_POST["estilo"];
    setcookie("estilo", $estilo, time() + (60 * 60 * 24 * 90));
} else {
    if (isset($_COOKIE["estilo"])) {
        $estilo = $_COOKIE["estilo"];
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Ejercicio 1 - Cookies y CSS</title>
    <meta charset="utf-8">
    <?php
    if (isset($estilo)) {
        echo '<link rel="STYLESHEET" type="text/css" href="' . $estilo . '.css">';
    }
    ?>
</head>
<body>
    <h2>Ejercicio 1</h2>
    <p><a href="index.php">Volver al Menú</a></p>

    <form action="Ejercicio1.php" method="post">
        Aquí puedes seleccionar el estilo (color de fondo) que deseas la página:
        <br><br>
        <select name="estilo">
            <option value="verde" <?php if (isset($estilo) && $estilo == 'verde') echo 'selected'; ?>>Verde</option>
            <option value="rosa" <?php if (isset($estilo) && $estilo == 'rosa') echo 'selected'; ?>>Rosa</option>
            <option value="negro" <?php if (isset($estilo) && $estilo == 'negro') echo 'selected'; ?>>Negro</option>
        </select>
        <input type="submit" value="Actualizar el estilo">
    </form>
</body>
</html>
