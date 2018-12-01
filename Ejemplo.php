<?php

// Declaramos un arreglo pasandole los valores que queremos que tenga
$var = array(0, 1 ,2 ,3 ,4 ,5);

echo var_dump($var);

// Hacemos un arreglo de 2 dimensiones, es decir guardamos un arreglo dentro de nuestro arreglo $var1
$var1['Frutas'][] = 'Banana';
$var1['Frutas'][] = 'Platano';
$var1['Frutas'][] = 'Piña';

$var1['Comida'][] = 'Estofado de POllo';
$var1['Comida'][] = 'Tallarines';
$var1['Comida'][] = 'Sopa';

echo var_dump($var1);

$var2 = explode(',', 'manzana,pera,choclo,carro'); // Creamos un arreglo a partir de una cadena
echo implode(', ', $var2); // Creamos una cadena a partir de un arreglo


$var1["frutas"][] = "banana";
$var1["frutas"][] = "pera";
$var1["frutas"][] = "manzana";

echo "<pre>";
echo var_dump($var1);
echo "</pre>";