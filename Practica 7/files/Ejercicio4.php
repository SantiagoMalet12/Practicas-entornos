<?php
if (($_SERVER['REQUEST_METHOD'] ?? '') === 'POST' && isset($_POST['titular'])) {
    $titular = $_POST['titular'];
    setcookie("titular", $titular, time() + (86400 * 30));
} elseif (isset($_COOKIE['titular'])) {
    $titular = $_COOKIE['titular'];
} else {
    $titular = 'todos';
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Ejercicio 4 - Periódico</title>
    <meta charset="utf-8">
</head>
<body>
    <h2>Periódico Digital</h2>
    <p><a href="index.php">Volver al Menú</a></p>

    <form action="Ejercicio4.php" method="post">
        <p>Seleccionar titular:</p>
        <input type="radio" name="titular" value="politica" <?php if ($titular === 'politica') echo 'checked'; ?>> Noticia política<br>
        <input type="radio" name="titular" value="economica" <?php if ($titular === 'economica') echo 'checked'; ?>> Noticia económica<br>
        <input type="radio" name="titular" value="deportiva" <?php if ($titular === 'deportiva') echo 'checked'; ?>> Noticia deportiva<br><br>
        <input type="submit" value="Configurar titular">
    </form>

    <hr>

    <?php if ($titular === 'todos' || $titular === 'politica'): ?>
        <h3>Noticia política</h3>
        <p>El Congreso debate nuevas reformas para la modernización del Estado.</p>
    <?php endif; ?>

    <?php if ($titular === 'todos' || $titular === 'economica'): ?>
        <h3>Noticia económica</h3>
        <p>Los mercados registraron resultados positivos tras los últimos anuncios fiscales.</p>
    <?php endif; ?>

    <?php if ($titular === 'todos' || $titular === 'deportiva'): ?>
        <h3>Noticia deportiva</h3>
        <p>El seleccionado nacional clasificó a la siguiente fase del torneo internacional.</p>
    <?php endif; ?>

    <hr>
    <p><a href="borrar_cookie.php">Borrar cookie y restablecer titulares</a></p>
</body>
</html>
