<?php
class Carro
{
	private $Marca;
	private $Velocidad;
	private $Anio;
	private $Color;
	private $Conduciendo = false;

	public function Conduciendo($v)
	{
		$this->Conduciendo = $v;
		return $this->Conduciendo ? 'El carro se encuentra manejando' : 'El carro se ha detenido';
	}

	public function GetMarca()
	{
		return $this->Marca;
	}

	public function SetMarca($marca)
	{
		$this->Marca = $marca;
	}

	public function GetVelocidad()
	{
		return $this->Velocidad;
	}

	public function SetVelocidad($Velocidad)
	{
		$this->Velocidad = $Velocidad;
	}

	public function GetAnio()
	{
		return $this->Velocidad;
	}

	public function SetAnio($Anio)
	{
		$this->Anio = $Anio;
	}

	public function GetColor()
	{
		return $this->Color;
	}

	public function SetColor($Color)
	{
		$this->Color = $Color;
	}
}

$obj = new Carro();
$obj->SetMarca("Ford");
var_dump($obj);
echo "<br> Marca: " . $obj->GetMarca();
