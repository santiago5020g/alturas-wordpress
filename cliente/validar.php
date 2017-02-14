<?php

//Validacion

if($nombre == '')
{
	$errores = 1;
	echo "*Por favor digita el nombre";
	echo "<br>";
}

if($apellido == '')
{
	$errores = 1;
	echo "*Por favor digita el apellido";
	echo "<br>";
}

if($cedula == '')
{
	$errores = 1;
	echo "*Por favor digita la cedula";
	echo "<br>";
}


if($fecha_fin == '')
{
	$errores = 1;
	echo "*Por favor digita la fecha del curso";
	echo "<br>";
}

if($idnivel == '')
{
	$errores = 1;
	echo "*Por favor escoje el nivel de certificado";
	echo "<br>";
}

if($numero_registro == '')
{
	$errores = 1;
	echo "*Por favor digita el numero de registro";
	echo "<br>";
}


if($descargar_certificado == '')
{
	$errores = 1;
	echo "*Debe seleccionar si el usuario puede descargar el certificado";
	echo "<br>";
}



//si el cliente se va a crear se realiza la siguiente logica
if($id =="")
{

	//si no hay errores validar que el email no exista
	if($errores == 0)
	{

		$sql = "SELECT email FROM certificados_usuario WHERE email = '$email'";
		$result = mysqli_query($conn,$sql);

		if(mysqli_num_rows($result)>0)
		{
			$errores = 1;
			echo "*El email ya existe";
			echo "<br>";
		}
	}

	//si no hay errores validar que la cedula no exista
	if($errores == 0)
	{
		$sql = "SELECT cedula FROM certificados_usuario WHERE cedula = '$cedula'";
		$result = mysqli_query($conn,$sql);

		if(mysqli_num_rows($result)>0)
		{
			$errores = 1;
			echo "*La cedula ya existe";
			echo "<br>";
		}
	}

	//si no hay errores validar que el numero de registro no exista
	if($errores == 0)
	{

		$sql = "SELECT numero_registro FROM certificados_usuario WHERE numero_registro = '$numero_registro'";
		$result = mysqli_query($conn,$sql);

		if(mysqli_num_rows($result)>0)
		{
			$errores = 1;
			echo "*El numero de registro ya existe";
			echo "<br>";
		}
	}
}


//si el cliente se va actualiza se sigue esta logica
else
{
	//si no hay errores validar que el email no exista
	if($errores == 0)
	{

		$sql = "SELECT email FROM certificados_usuario WHERE email = '$email' AND id !='$id'";
		$result = mysqli_query($conn,$sql);

		if(mysqli_num_rows($result)>0)
		{
			$errores = 1;
			echo "*El email ya existe";
			echo "<br>";
		}
	}

	//si no hay errores validar que la cedula no exista
	if($errores == 0)
	{
		$sql = "SELECT cedula FROM certificados_usuario WHERE cedula = '$cedula' AND id !='$id'";
		$result = mysqli_query($conn,$sql);

		if(mysqli_num_rows($result)>0)
		{
			$errores = 1;
			echo "*La cedula ya existe";
			echo "<br>";
		}
	}

	//si no hay errores validar que el numero de registro no exista
	if($errores == 0)
	{
		$sql = "SELECT numero_registro FROM certificados_usuario WHERE numero_registro = '$numero_registro' AND id !='$id'";
		$result = mysqli_query($conn,$sql);

		if(mysqli_num_rows($result)>0)
		{
			$errores = 1;
			echo "*El registro ya existe";
			echo "<br>";
		}
	}

}





