<?php
    $lineas = ['linea1', 'linea2', 'linea3'];

    function createHTMLTable($datos){
        echo "<table>";
        foreach ($datos as $valor){
            echo "<tr><td>$valor</td></tr>";
        }
        echo "</table>";
    }

    createHTMLTable($lineas);
