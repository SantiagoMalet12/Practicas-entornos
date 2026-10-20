<!DOCTYPE html>
<html>
<head>
    <title>Ejercicio 5 - Página 1</title>
    <meta charset="utf-8">
</head>
<body>
    <h2>Ejercicio 5 - Página 1</h2>
    <p><a href="index.php">Volver al Menú</a></p>

    <form action="Ejercicio5_pagina2.php" method="POST">
        <label for="usuario">Nombre de usuario:</label><br>
        <input type="text" id="usuario" name="usuario" required><br><br>

        <label for="clave">Clave:</label><br>
        <input type="password" id="clave" name="clave" required><br><br>

        <input type="submit" value="Enviar a Página 2">
    </form>
</body>
</html>
