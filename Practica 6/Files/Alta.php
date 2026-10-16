<!DOCTYPE html>
<html>
<head>
<title>Alta Ciudad</title>
<meta charset="utf-8">
</head>
<body>
<?php 
include("conexion.inc");

$vCiudad = $_POST['Ciudad'];
$vPais = $_POST['Pais'];
$vHabitantes = $_POST['Habitantes'];
$vSuperficie = $_POST['Superficie'];
$vTieneMetro = isset($_POST['TieneMetro']) ? $_POST['TieneMetro'] : 0;

$vSql = "SELECT Count(ciudad) as canti FROM ciudades WHERE ciudad='$vCiudad'";
$vResultado = mysqli_query($link, $vSql) or die (mysqli_error($link));
$vCantCiudades = mysqli_fetch_assoc($vResultado);

if ($vCantCiudades['canti'] != 0){
    echo ("La Ciudad ya Existe<br>");
    echo ("<a href='Menu.html'>VOLVER AL ABM</a>");
}
else {
    $vSql = "INSERT INTO ciudades (ciudad, pais, habitantes, superficie, tieneMetro) 
             VALUES ('$vCiudad', '$vPais', '$vHabitantes', '$vSuperficie', '$vTieneMetro')";
    mysqli_query($link, $vSql) or die (mysqli_error($link));
    echo ("La Ciudad fue Registrada correctamente.<br>");
    echo ("<a href='Menu.html'>VOLVER AL MENU</a>");
    mysqli_free_result($vResultado);
}

mysqli_close($link); 
?>
</body>
</html>

