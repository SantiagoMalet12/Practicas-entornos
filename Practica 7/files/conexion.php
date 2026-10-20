<?php
$link = @mysqli_connect("localhost", "root", "1234");
if (!$link) {
    $link = @mysqli_connect("localhost", "root", "");
}

if (!$link) {
    die("Problemas de conexión a la base de datos MySQL: " . mysqli_connect_error());
}
?>
