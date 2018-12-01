<?php
class AlumnoModel
{
	private $pdo;

	public function __CONSTRUCT()
	{
		try
		{
			$this->pdo = new PDO('mysql:host=localhost;dbname=test', 'root', '1830Jfob');
			$this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);		        
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}

	public function Listar()
	{
		try
		{
			$result = array();

			$stm = $this->pdo->prepare("SELECT * FROM alumnos");
			$stm->execute();

			foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r)
			{
				$alm = new Alumno();

				$alm->__SET('id', $r->id);
				$alm->__SET('Nombre', $r->Nombre);
				$alm->__SET('Apellido', $r->Apellido);
				$alm->__SET('Sexo', $r->Sexo);
				$alm->__SET('FechaNacimiento', $r->FechaNacimiento);

				$result[] = $alm;
			}

			return $result;
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}

	public function Obtener($id)
	{
		try 
		{
			$stm = $this->pdo
			          ->prepare("SELECT * FROM alumnos WHERE id = ?");
			          

			$stm->execute(array($id));
			$r = $stm->fetch(PDO::FETCH_OBJ);

			$alm = new Alumno();

			$alm->__SET('id', $r->id);
			$alm->__SET('Nombre', $r->Nombre);
			$alm->__SET('Apellido', $r->Apellido);
			$alm->__SET('Sexo', $r->Sexo);
			$alm->__SET('FechaNacimiento', $r->FechaNacimiento);

			return $alm;
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}

	public function Eliminar($id)
	{
		try 
		{
			$stm = $this->pdo
			          ->prepare("DELETE FROM alumnos WHERE id = ?");			          

			$stm->execute(array($id));
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}

	public function Actualizar(Alumno $data)
	{
		try 
		{
			$sql = "UPDATE alumnos SET 
						Nombre          = ?, 
						Apellido        = ?,
						Sexo            = ?, 
						FechaNacimiento = ?
				    WHERE id = ?";

			$this->pdo->prepare($sql)
			     ->execute(
				array(
					$data->__GET('Nombre'), 
					$data->__GET('Apellido'), 
					$data->__GET('Sexo'),
					$data->__GET('FechaNacimiento'),
					$data->__GET('id')
					)
				);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}

	public function Registrar(Alumno $data)
	{
		try 
		{
		$sql = "INSERT INTO alumnos (Nombre,Apellido,Sexo,FechaNacimiento) 
		        VALUES (?, ?, ?, ?)";

		$this->pdo->prepare($sql)
		     ->execute(
			array(
				$data->__GET('Nombre'), 
				$data->__GET('Apellido'), 
				$data->__GET('Sexo'),
				$data->__GET('FechaNacimiento')
				)
			);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}
}

class Alumno
{
	private $id;
	private $Nombre;
	private $Apellido;
	private $Sexo;
	private $FechaNacimiento;

	public function __GET($k){ return $this->$k; }
	public function __SET($k, $v){ return $this->$k = $v; }
}

// Logica
$alm = new Alumno();
$model = new AlumnoModel();

if(isset($_REQUEST['action']))
{
	switch($_REQUEST['action'])
	{
		case 'actualizar':
			$alm->__SET('id',              $_REQUEST['id']);
			$alm->__SET('Nombre',          $_REQUEST['Nombre']);
			$alm->__SET('Apellido',        $_REQUEST['Apellido']);
			$alm->__SET('Sexo',            $_REQUEST['Sexo']);
			$alm->__SET('FechaNacimiento', $_REQUEST['FechaNacimiento']);

			$model->Actualizar($alm);
			header('Location: index.php');
			break;

		case 'registrar':
			$alm->__SET('Nombre',          $_REQUEST['Nombre']);
			$alm->__SET('Apellido',        $_REQUEST['Apellido']);
			$alm->__SET('Sexo',            $_REQUEST['Sexo']);
			$alm->__SET('FechaNacimiento', $_REQUEST['FechaNacimiento']);

			$model->Registrar($alm);
			header('Location: index.php');
			break;

		case 'eliminar':
			$model->Eliminar($_REQUEST['id']);
			header('Location: index.php');
			break;

		case 'editar':
			$alm = $model->Obtener($_REQUEST['id']);
			break;
	}
}

?>

<form action="?action=<?php echo $alm->id > 0 ? 'actualizar' : 'registrar'; ?>" method="post">
	<input type="hidden" name="id" value="<?php echo $alm->__GET('id'); ?>" />
	<table style="width:500px;background:#eee;padding:4px;">
		<tr>
			<th style="text-align:left;">Nombre</th>
			<td><input type="text" name="Nombre" value="<?php echo $alm->__GET('Nombre'); ?>" style="width:100%;" /></td>
		</tr>
		<tr>
			<th style="text-align:left;">Apellido</th>
			<td><input type="text" name="Apellido" value="<?php echo $alm->__GET('Apellido'); ?>" style="width:100%;" /></td>
		</tr>
		<tr>
			<th style="text-align:left;">Sexo</th>
			<td><input type="text" name="Sexo" value="<?php echo $alm->__GET('Sexo'); ?>" style="width:100%;" /></td>
		</tr>
		<tr>
			<th style="text-align:left;">Fecha</th>
			<td><input type="text" name="FechaNacimiento" value="<?php echo $alm->__GET('FechaNacimiento'); ?>" style="width:100%;" /></td>
		</tr>
		<tr>
			<td colspan="2">
				<button type="submit">Guardar</button>
			</td>
		</tr>
	</table>
</form>

<hr />

<table style="width:500px;background:#eee;padding:4px;">
	<tr>
		<th style="text-align:left;">Nombre</th>
		<th style="text-align:left;">Apellido</th>
		<th style="text-align:left;">Sexo</th>
		<th style="text-align:left;">Fecha Nacimiento</th>
		<th></th>
	</tr>
	<?php foreach($model->Listar() as $r): ?>
		<tr>
			<td><?php echo $r->__GET('Nombre'); ?></td>
			<td><?php echo $r->__GET('Apellido'); ?></td>
			<td><?php echo $r->__GET('Sexo') == 1 ? 'H' : 'F'; ?></td>
			<td><?php echo $r->__GET('FechaNacimiento'); ?></td>
			<td>
				<a href="?action=editar&id=<?php echo $r->id; ?>">E</a>
				<a href="?action=eliminar&id=<?php echo $r->id; ?>">X</a>
			</td>
		</tr>
	<?php endforeach; ?>
</table>