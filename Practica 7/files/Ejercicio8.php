<?php
require_once("conexion.php");
mysqli_select_db($link, "prueba");

$canciones = [];
$buscar = "";

if (isset($_REQUEST['buscar'])) {
    $buscar = trim($_REQUEST['buscar']);
    $buscarEsc = mysqli_real_escape_string($link, $buscar);
    $sql = "SELECT canciones FROM buscador WHERE canciones LIKE '%$buscarEsc%'";
    $res = mysqli_query($link, $sql);
    if ($res) {
        while ($row = mysqli_fetch_assoc($res)) {
            $canciones[] = $row['canciones'];
        }
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Ejercicio 8 - Buscador de Canciones</title>
    <meta charset="utf-8">
</head>
<body>
    <h2>Ejercicio 8 - Buscador de canciones</h2>
    <p><a href="index.php">Volver al Menú</a></p>

    <form action="Ejercicio8.php" method="GET">
        <label for="buscar">Buscar canción:</label>
        <input type="text" id="buscar" name="buscar" value="<?php echo htmlspecialchars($buscar); ?>">
        <input type="submit" value="Buscar">
    </form>

    <?php if (isset($_REQUEST['buscar'])): ?>
        <h3>Resultados:</h3>
        <?php if (count($canciones) > 0): ?>
            <table border="1" cellpadding="5" cellspacing="0">
                <tr>
                    <th>Canciones encontradas</th>
                </tr>
                <?php foreach ($canciones as $cancion): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($cancion); ?></td>
                    </tr>
                <?php endforeach; ?>
            </table>
        <?php else: ?>
            <p>No se encontraron canciones con ese criterio de búsqueda.</p>
        <?php endif; ?>
    <?php endif; ?>
</body>
</html>
