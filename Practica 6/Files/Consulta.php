<!DOCTYPE html>
<html>
<head>
<title>Listado Completo de Ciudades</title>
<meta charset="utf-8">
</head>
<body>
<?php 
include("conexion.inc");

$vSql = "SELECT * FROM ciudades";
$vResultado = mysqli_query($link, $vSql);
$total_registros = mysqli_num_rows($vResultado);
?>
<table border="1" cellpadding="5" cellspacing="0">
<tr> 
 <td><b>ID</b></td>
 <td><b>Ciudad</b></td>
 <td><b>Pa&iacute;s</b></td>
 <td><b>Habitantes</b></td>
 <td><b>Superficie</b></td>
 <td><b>&iquest;Tiene Metro?</b></td>
</tr>
<?php
while ($fila = mysqli_fetch_array($vResultado)) 
{
?>
<tr>
 <td><?php echo ($fila['id']); ?></td>
 <td><?php echo ($fila['ciudad']); ?></td>
 <td><?php echo ($fila['pais']); ?></td>
 <td><?php echo ($fila['habitantes']); ?></td>
 <td><?php echo ($fila['superficie']); ?></td>
 <td><?php echo ($fila['tieneMetro'] == 1 ? 'S&iacute;' : 'No'); ?></td>
</tr> 
<?php
}
mysqli_free_result($vResultado);
mysqli_close($link);
?>
</table>
<p>&nbsp;</p>
<p align="left"><a href="Menu.html">Volver al men&uacute; del ABM</a></p>
</body>
</html>

