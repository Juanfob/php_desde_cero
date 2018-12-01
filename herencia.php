<?php
class Carro
{
	protected $VelocidadMaxima;
	protected $VelocidadActual;

	public function __CONSTRUCT($VelocidadMaxima)
	{
		$this->VelocidadMaxima = $VelocidadMaxima;
	}

	public function Acelerar()
	{
		$this->VelocidadActual += 50;

		if($this->VelocidadMaxima < $this->VelocidadActual)
			$this->VelocidadActual = $this->VelocidadMaxima;
	}

	public function Frenar()
	{
		$this->VelocidadActual = 0;
	}

	public function Detalle()
	{
		if($this->VelocidadActual == 0)
			echo 'El carro se encuentra detenido. <br>';
		else
			echo 'El carro esta acelerando ha una velocidad de ' . $this->VelocidadActual . 'km/h. <br>';
	}
}

class Ferrari extends Carro
{
	private $puertas = 0;
	private $automatico = false;
	private $color = '';

	public function __CONSTRUCT($VelocidadMax)
	{
		parent::__CONSTRUCT($VelocidadMax);
	}

	public function Acelerar()
	{
		$this->VelocidadActual += 100;

		if($this->VelocidadMaxima < $this->VelocidadActual)
			$this->VelocidadActual = $this->VelocidadMaxima;
	}
}

$obj = new Ferrari(350);
$obj->Acelerar();
$obj->Acelerar();
$obj->Acelerar();
$obj->Detalle();
$obj->Frenar();
$obj->Detalle();