<?php

//Para eliminar
include("../conexion/conect.php");

$id = $_GET["id"];
$sql = "DELETE FROM certificados_usuario WHERE id='$id'";
$result = $conn->query($sql);

	if($result)
	{
		echo "Cliente Eliminado correctamente";
	}

		else
	{
		echo mysqli_error($conn);
	}

//cerrar los result
mysqli_free_result($result);
mysqli_close($conn);