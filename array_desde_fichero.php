<?php

// Otro ejemplo: vamos a escribir una página web en una cadena. Véase también file_get_contents().
$html = implode('', file('http://php.net/manual/es/function.file.php'));


// Utilizar el parámetro opcional flags a partir de PHP 5
$recortes = file('fichero.txt', FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
?>