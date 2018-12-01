<?php
try
{
	/*mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
	$mysqli = new mysqli("localhost", "root", "1830Jfob", "test");

	$result = $mysqli->query("SELECT * FROM alumnos");

	$arr = array();

	while($r = $result->fetch_object())
	{
		$arr[] = $r;
	}
	*/


	$pdo = new PDO('mysql:host=localhost;dbname=test', 'root', '1830Jfob');
	$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	$stm = $pdo->prepare("SELECT * FROM alumnos");
	$stm->execute();
	$arr = $stm->fetchAll(PDO::FETCH_OBJ);
	echo "<pre>";
    echo var_dump($arr);
    echo "</pre>";
}
    catch(Exception $e)
{
	die($e->getMessage());
}
?>


<table style="width:500px;background:#eee;padding:4px;border:solid;">
	<tr>
		<th style="text-align:left;">Nombre</th>
		<th style="text-align:left;">Apellido</th>
		<th style="text-align:left;">Sexo</th>
		<th style="text-align:left;">Fecha Nacimiento</th>
	</tr>
	<?php foreach($arr as $r): ?>
		<tr>
			<td><?php echo $r->Nombre; ?></td>
			<td><?php echo $r->Apellido; ?></td>
			<td><?php echo $r->Sexo == 1 ? 'H' : 'F'; ?></td>
			<td><?php echo $r->FechaNacimiento; ?></td>
		</tr>
	<?php endforeach; ?>
</table>