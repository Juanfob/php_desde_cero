<html>
	<head>
		<title>Formulario Web</title>
	</head>
	<body>
        <?php
			if(isset($_GET['m']))
			{
				echo $_GET['m'];
			}
		?>
		<form action="procesa.php" method="post" enctype="multipart/form-data">
			<label>Nombre</label><br />
			<input type="text" name="Nombre" placeholder="Ingrese su nombre" />
			<br />
			<label>Nombre</label><br />
			<select name="Ocupacion">
				<option value="1">Ingeniero</option>
				<option value="2">Doctor</option>
				<option value="3">Coronel</option>
			</select>
			<br />
			Sexo <br />
			<label>
				Hombre <input type="radio" name="Sexo" value="1" />
			</label>
			<label>
				Mujer <input type="radio" name="Sexo" value="2" />
			</label>
			<hr />
			<label>Estudios</label><br />
			<label>
				Primaria <input type="checkbox" name="Estudio[]" value="1" /><br>
			</label>
			<label>
				Secundaria <input type="checkbox" name="Estudio[]" value="2" /><br>
			</label>
			<label>
				Instituto <input type="checkbox" name="Estudio[]" value="3" /><br>
			</label>
			<label>
				Univesridad <input type="checkbox" name="Estudio[]" value="4" /><br>
			</label>
			<hr />
			<label>Comentario</label><br>
			<textarea name="Comentario"></textarea>
			<hr>
			<input type="file" name="Archivo" />
			<br>
			<button type="submit">Enviar</button>
		</form>
	</body>
</html>


<!--

- Textbox
- Radio
- Check
- Select
- File
- GET, POST, REQUEST
- QueryString
- Redireccionamiento (header)

-->