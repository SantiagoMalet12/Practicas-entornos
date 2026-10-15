<?php
$archivo = "contador.dat";
$abrir = fopen($archivo, "r");
$cont = fread($abrir, filesize($archivo));
fclose($abrir);

$abrir = fopen($archivo, "w");
$cont = $cont + 1;
$guardar = fwrite($abrir, $cont);
fclose($abrir);

echo "<font face='arial' size='3'>Cantidad de visitas:".$cont."</font>";
?>