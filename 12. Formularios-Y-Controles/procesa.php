<?php
if(isset($_FILES['Archivo']))
{
    var_dump($_FILES);
	move_uploaded_file ( $_FILES['Archivo']['tmp_name'] , 'uploads/' . uniqid() . $_FILES['Archivo']['name'] );
}

header('Location: index.php?m=Accion Realizada');