<!DOCTYPE html>
<html>
<head>
<title>Modificacion de Ciudad</title>
<meta charset="utf-8">
</head>
<body>
<?php
include ("conexion.inc");

$vCriterio = $_POST['Criterio'];

$vSql = "SELECT * FROM ciudades WHERE id ='$vCriterio' OR ciudad = '$vCriterio'";
$vResultado = mysqli_query($link, $vSql) or die (mysqli_error($link));
$fila = mysqli_fetch_array($vResultado);

if(mysqli_num_rows($vResultado) == 0) {
    echo ("Ciudad Inexistente...!!! <br>");
    echo ("<a href='FormModiIni.html'>Continuar</a>");
}
else {
?>
<form action="Modi.php" method="POST" name="FormModi">
<table width="380">
<tr> 
 <td width="130"> ID: </td>
 <td width="250"> 
    <input type="text" name="Id" value="<?php echo($fila['id']); ?>" readonly size="10">
 </td>
</tr>
<tr> 
 <td width="130"> Ciudad: </td>
 <td width="250"> 
    <input type="text" name="Ciudad" value="<?php echo($fila['ciudad']); ?>" size="25" required>
 </td>
</tr>
<tr> 
 <td width="130"> Pa&iacute;s: </td>
 <td width="250"> 
    <input type="text" name="Pais" value="<?php echo($fila['pais']); ?>" size="25" required>
 </td>
</tr>
<tr> 
 <td width="130"> Habitantes: </td>
 <td width="250"> 
    <input type="text" name="Habitantes" value="<?php echo($fila['habitantes']); ?>" size="20" required>
 </td>
</tr>
<tr> 
 <td width="130"> Superficie: </td>
 <td width="250"> 
    <input type="text" name="Superficie" value="<?php echo($fila['superficie']); ?>" size="20" required>
 </td>
</tr>
<tr> 
 <td width="130"> &iquest;Tiene Metro?: </td>
 <td width="250"> 
    <input type="radio" name="TieneMetro" value="1" <?php if ($fila['tieneMetro'] == 1) echo "checked"; ?>> S&iacute;
    <input type="radio" name="TieneMetro" value="0" <?php if ($fila['tieneMetro'] == 0) echo "checked"; ?>> No
 </td>
</tr>
<tr> 
 <td colspan="2" align="center"> 
    <br>
    <input type="submit" name="Submit" value="Modificar"> 
    <p><a href="Menu.html">Volver al men&uacute; del ABM</a></p>
 </td>
</tr>
</table>
</form>
<?php
}
mysqli_free_result($vResultado);

mysqli_close($link);
?>
</body>
</html>

