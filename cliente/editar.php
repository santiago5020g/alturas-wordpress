<?php

//insertar registros
include("../conexion/conect.php");

$nombre = $_POST["nombre"];
$apellido = $_POST["apellido"];
$cedula = $_POST["cedula"];
$celular = $_POST["celular"];
$email = $_POST["email"];
$fecha_fin = explode('/', $_POST["fecha_fin"]);
$fecha_fin = "".$fecha_fin[2]."-".$fecha_fin[1]."-".$fecha_fin[0]."";
$numero_registro = $_POST["numero_registro"];
$idnivel = $_POST["idnivel"];
$numero_registro = $_POST["numero_registro"];
$descargar_certificado = $_POST["descargar_certificado"];
$id = $_POST["id"];
$errores = 0;


//validar que la informacion este correcta como el correo, email...
include('validar.php');


//si no hay errores validar guardar el cliente
if($errores == 0)
{
	$sql = "UPDATE certificados_usuario SET nombre = '$nombre',apellido = '$apellido',cedula = '$cedula',celular = '$celular',email = '$email',fecha_fin = '$fecha_fin',idnivel = '$idnivel',numero_registro = '$numero_registro',descargar_certificado= '$descargar_certificado'
	WHERE id = '$id'";
	$result = mysqli_query($conn,$sql);

	if($result)
	{
		echo "Cliente actualizado correctamente";
		echo "<script>function redireccionar(){window.location='../clientes';} 
		setTimeout ('redireccionar()', 3000);</script>";
	}
		
	else
	{
		$errores = 1;
		echo mysqli_error($conn);
	}
}

echo "<script> $('#mensaje').attr('style','display:block') </script>";
if($errores == 1) {echo "<script> $('#mensaje').attr('class','alert alert-danger') </script>";}
else{echo "<script> $('#mensaje').attr('class','alert alert-success') </script>";}

?>

