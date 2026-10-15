<?php
// PRaCTICA 4 - PARTE 2: Arrays y Funciones

echo "<h1>Práctica 4 - Parte 2: Arrays y Funciones</h1>";

// EJERCICIO 1
echo "<h2>Ejercicio 1</h2>";
echo "<p>Ambos codigos son equivalentes y generan el mismo array:</p>";
$a1 = array( 'color' => 'rojo',
 'sabor' => 'dulce',
 'forma' => 'redonda',
 'nombre' => 'manzana',
 4
);

$a2['color'] = 'rojo';
$a2['sabor'] = 'dulce';
$a2['forma'] = 'redonda';
$a2['nombre'] = 'manzana';
$a2[] = 4;

echo "<pre>Array 1:\n"; print_r($a1); echo "</pre>";
echo "<pre>Array 2:\n"; print_r($a2); echo "</pre>";
echo "<hr>";

// EJERCICIO 2
echo "<h2>Ejercicio 2</h2>";
echo "<h3>Caso a)</h3>";
$matriz_a = array("x" => "bar", 12 => true);
echo $matriz_a["x"];
echo $matriz_a[12];
echo "<br>";

echo "<h3>Caso b)</h3>";
$matriz_b = array("unamatriz" => array( 6=>5, 13=>9, "a"=>42));
echo $matriz_b["unamatriz"][6];
echo $matriz_b["unamatriz"][13];
echo $matriz_b["unamatriz"]["a"];
echo "<br>";

echo "<h3>Caso c)</h3>";
$matriz_c = array(5 => 1, 12 => 2);
$matriz_c[] = 56;
$matriz_c["x"] = 42; 
unset($matriz_c[5]); 
unset($matriz_c);
echo "<i>(El codigo se ejecuta internamente pero no produce ninguna salida por pantalla)</i><br>";
echo "<hr>";

// EJERCICIO 3
echo "<h2>Ejercicio 3</h2>";
echo "<h3>Caso a)</h3>";
$fun = getdate();
echo "Has entrado en esta pagina a las $fun[hours] horas, con $fun[minutes] minutos y $fun[seconds] segundos, del $fun[mday]/$fun[mon]/$fun[year]<br>";

echo "<h3>Caso b)</h3>";
function sumar($sumando1, $sumando2){
    $suma = $sumando1 + $sumando2;
    echo $sumando1."+".$sumando2."=".$suma;
}
sumar(5,6);
echo "<br><hr>";

// EJERCICIO 4
echo "<h2>Ejercicio 4</h2>";
function comprobar_nombre_usuario($nombre_usuario) {
    if (strlen($nombre_usuario)<3 || strlen($nombre_usuario)>20) {
        echo $nombre_usuario." no es valido<br>";
        return false;
    }
    $permitidos = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789-_";
    for ($i=0; $i<strlen($nombre_usuario); $i++){
        if (strpos($permitidos, substr($nombre_usuario,$i,1))===false) {
            echo $nombre_usuario. " no es valido<br>";
            return false;
        }
    }
    echo $nombre_usuario. " es valido<br>";
    return true;
}

echo "<h3>Pruebas de validacion:</h3>";
comprobar_nombre_usuario("Juan-Perez_99"); 
comprobar_nombre_usuario("Jo"); 
comprobar_nombre_usuario("Gato @ Espacial"); 

?>