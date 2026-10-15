<?php
// PRACTICA 4 - PARTE 1

echo "<h1>Practica 4 - Parte 1</h1>";


// EJERCICIO 1
echo "<h2>Ejercicio 1</h2>";
function doble($i) {
    return $i * 2;
}
$a = TRUE;
$b = "xyz";
$c = 'xyz';
$d = 12;

echo "Tipos: ";
echo gettype($a);
echo gettype($b);
echo gettype($c);
echo gettype($d);
echo "<br>";

if (is_int($d)) {
    $d += 4;
}
if (is_string($a)) {
    echo "Cadena: $a<br>";
}
$d = $a ? ++$d : $d * 3;
$f = doble($d++);
$g = $f += 10;

echo "Valores finales: ";
echo $a, $b, $c, $d, $f, $g;
echo "<br><hr>";


// EJERCICIO 2
echo "<h2>Ejercicio 2 (Ejemplos representativos)</h2>";

echo "<h3>Bucle While vs Do-While</h3>";
$i = 1;
while ($i <= 10) {
    print $i++;
}
echo "<br>";

echo "<h3>Bucle For</h3>";
for ($i = 1; $i <= 10; $i++) {
    print $i;
}
echo "<br>";

echo "<h3>If vs Switch</h3>";
$i = 1;
if ($i == 0) {
    print "i equals 0";
} elseif ($i == 1) {
    print "i equals 1";
} elseif ($i == 2) {
    print "i equals 2";
}
echo "<br><hr>";

// EJERCICIO 3 (Tablas y Formulario)
echo "<h2>Ejercicio 3 - a) Generación de Tabla</h2>";
echo "<table width='90%' border='1'>";
$row = 5;
$col = 2;
for ($r = 1; $r <= $row; $r++) {
    echo "<tr>";
    for ($c = 1; $c <= $col; $c++) {
        echo "<td>Fila $r, Col $c</td>\n";
    } 
    echo "</tr>\n";
}
echo "</table>\n";
echo "<hr>";
?>

<h2>Ejercicio 3 - b) Formulario</h2>
<?php
if (!isset($_POST['submit'])) {
?>
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
        Edad: <input name="age" size="2">
        <input type="submit" name="submit" value="Ir">
    </form>
<?php
} else {
    $age = $_POST['age'];
    if ($age >= 21) {
        echo 'Mayor de edad';
    } else {
        echo 'Menor de edad';
    }
}
?>

<hr>

