<!DOCTYPE html>
<html>
<head>
<title>Modificacion de Ciudad</title>
<meta charset="utf-8">
</head>
<body>
<?php
include ("conexion.inc");

$vId = $_POST['id'];
$vCiudad = $_POST['ciudad'];
$vPais = $_POST['pais'];
$vHabitantes = $_POST['habitantes'];
$vSuperficie = $_POST['superficie'];
$vTieneMetro = isset($_POST['tieneMetro']) ? $_POST['tieneMetro'] : 0;

$vSql = "UPDATE ciudades SET 
            ciudad='$vCiudad', 
            pais='$vPais', 
            habitantes='$vHabitantes', 
            superficie='$vSuperficie', 
            tieneMetro='$vTieneMetro' 
         WHERE id='$vId'";

mysqli_query($link, $vSql) or die (mysqli_error($link));

echo("La Ciudad fue Modificada correctamente.<br>");
echo("<a href='Menu.html'>Volver al men&uacute; del ABM</a>");

mysqli_close($link);
?>
</body>
</html>
