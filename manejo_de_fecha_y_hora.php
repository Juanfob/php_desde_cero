<?php

// Date
//echo date('Y-m-d');

// Parsear una fecha
$fecha = '2014-04-04';

//echo date('M, y', strtotime($fecha));

//echo date('Y-m-d', strtotime("+1 year")), "\n";

/*echo strtotime("now"), "\n";
echo strtotime("10 September 2000"), "\n";
echo strtotime("+1 day"), "\n";
echo strtotime("+1 week"), "\n";
echo strtotime("+1 week 2 days 4 hours 2 seconds"), "\n";
echo strtotime("next Thursday"), "\n";
echo strtotime("last Monday"), "\n";
*/

// Configurar el idioma
function Dia($n)
{
	$dias = array("Domingo","Lunes","Martes","Miercoles","Jueves","Viernes","Sábado");
	return $dias[$n];
}

function Mes($n)
{
	$n--;
	$meses = array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre"); 
	return $meses[$n];
}

function FechaCompleta()
{
	return Dia(date('w')) . ' ' . date('d') . ' de ' . Mes(date('n')) . ' ' . date('Y, h:i:sa');	
}

echo FechaCompleta();


