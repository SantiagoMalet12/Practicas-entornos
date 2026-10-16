<!DOCTYPE html>
<html>
<head>
<title>Modificacion de Ciudad</title>
<meta charset="utf-8">
</head>
<body>
<?php
include ("conexion.inc");

$vId = $_POST['Id'];
$vCiudad = $_POST['Ciudad'];
$vPais = $_POST['Pais'];
$vHabitantes = $_POST['Habitantes'];
$vSuperficie = $_POST['Superficie'];
$vTieneMetro = isset($_POST['TieneMetro']) ? $_POST['TieneMetro'] : 0;

$vSql = "UPDATE ciudades SET 
            ciudad='$vCiudad', 
            pais='$vPais', 
            habitantes='$vHabitantes', 
            superficie='$vSuperficie', 
            tieneMetro='$vTieneMetro' 
         WHERE id='$vId'";

mysqli_query($link, $vSql) or die (mysqli_error($link));

echo("La Ciudad fue Modificada correctamente.<br>");
echo("<a href='Menu.html'>Volver al Menú del ABM</a>");

mysqli_close($link);
?>
</body>
</html>

