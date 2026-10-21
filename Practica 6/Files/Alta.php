<!DOCTYPE html>
<html>
<head>
<title>Alta Ciudad</title>
<meta charset="utf-8">
</head>
<body>
<?php 
include("conexion.inc");

$vCiudad = $_POST['ciudad'];
$vPais = $_POST['pais'];
$vHabitantes = $_POST['habitantes'];
$vSuperficie = $_POST['superficie'];
$vTieneMetro = isset($_POST['tieneMetro']) ? $_POST['tieneMetro'] : 0;

$vSql = "SELECT Count(ciudad) as canti FROM ciudades WHERE ciudad='$vCiudad'";
$vResultado = mysqli_query($link, $vSql) or die (mysqli_error($link));
$vCantCiudades = mysqli_fetch_assoc($vResultado);

if ($vCantCiudades['canti'] != 0){
    echo ("La Ciudad ya Existe<br>");
    echo ("<a href='Menu.html'>Volver al men&uacute; del ABM</a>");
}
else {
    $vSql = "INSERT INTO ciudades (ciudad, pais, habitantes, superficie, tieneMetro) 
             VALUES ('$vCiudad', '$vPais', '$vHabitantes', '$vSuperficie', '$vTieneMetro')";
    mysqli_query($link, $vSql) or die (mysqli_error($link));
    echo ("La Ciudad fue Registrada correctamente.<br>");
    echo ("<a href='Menu.html'>Volver al men&uacute; del ABM</a>");
    mysqli_free_result($vResultado);
}

mysqli_close($link); 
?>
</body>
</html>
