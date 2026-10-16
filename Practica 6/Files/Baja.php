<!DOCTYPE html>
<html>
<head>
<title>Baja de Ciudad</title>
<meta charset="utf-8">
</head>
<body>
<?php
include ("conexion.inc");

$vCriterio = $_POST['Criterio'];

$vSql = "SELECT * FROM ciudades WHERE id='$vCriterio' OR ciudad='$vCriterio'";
$vResultado = mysqli_query($link, $vSql);

if(mysqli_num_rows($vResultado) == 0) { 
    echo ("Ciudad Inexistente...!!! <br>");
    echo ("<a href='FormBajaIni.html'>Continuar</a>");
}
else {
    $vSql = "DELETE FROM ciudades WHERE id = '$vCriterio' OR ciudad = '$vCriterio'";
    mysqli_query($link, $vSql) or die (mysqli_error($link));
    echo("La Ciudad fue Borrada con éxito.<br>");
    echo("<a href='Menu.html'>Volver al Menú del ABM</a>");
}

mysqli_free_result($vResultado);

mysqli_close($link);
?>
</body>
</html>

