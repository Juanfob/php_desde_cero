<?php

	require_once 'header.php';
	if(isset($_GET['p']))
	{
		require_once $_GET['p'] . '.php';
	}else
	{
		require_once 'pagina1.php';
	}
	require_once 'footer.php';