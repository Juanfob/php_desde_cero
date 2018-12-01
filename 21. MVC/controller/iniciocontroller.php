<?php
class InicioController
{
	public function __CONSTRUCT()
	{
		if(!isset($_GET['a']))
		{
			$this->Index();
			return;
		}
		if($_GET['a'] == 'index')
			$this->Index();

		if($_GET['a'] == 'saludar')
			$this->Saludar();
	}

	public function Index()
	{
		require_once 'views/inicio/index.php';
	}
	public function Saludar()
	{
		require_once 'model/usuariomodel.php';
		$u = new UsuarioModel();
		
		require_once 'views/inicio/saludar.php';
	}
}
