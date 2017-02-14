<?php

//insertar registros
include("../conexion/conect.php");

$cedula = $_POST["cedula"];
$errores = 0;

if($cedula == "")
{
	$errores = 1;
	echo "*Por favor digita la cedula";
	echo "<br>";
}

//si no hay errores validar guardar el cliente
if($errores == 0)
{
	$sql = "SELECT cu.id as cuid,cu.nombre as cunombre,cu.apellido as cuapellido,cu.cedula as cucedula,cu.celular as cucelular,cu.email as cuemail,cu.fecha_fin as cufecha_fin,nc.descripcion as ncdescripcion,cu.descargar_certificado as cudescargar_certificado,cu.numero_registro as cunumeroregistro FROM certificados_usuario cu inner join nivel_certificado nc on cu.idnivel = nc.idnivel
	WHERE cu.cedula = '$cedula'";

	$result = $conn->query($sql);
	$row = $result->fetch_assoc();

	if($result AND $result->num_rows>0)
	{

		$descargar_certificado = $row["cudescargar_certificado"];


		?>
			
	<div class="table-responsive">	
		<table id="paginacion" class="table table-striped table-bordered table-hover">
			<tr>
				<th>PDF</th>
				<th>Numero de registro</th>
				<th>Nombre</th>
				<th>Apellido</th>
				<th>Cedula</th>
				<th>Celular</th>
				<th>Email</th>
				<th>Nivel</th>
				<th>Fecha del curso</th>
			</tr>
			<tr>
				<?php if($descargar_certificado == 1) { ?>
				
					<td><a target="_blank" class="btn btn-success" href="../cliente/pdf.php?id=<?php echo $row['cuid']; ?>">PDF</a></td>
				<?php } else { ?>
				
				<td>
					Lo sentimos. Actualmente no puede descargar su certificado. Para mas informacion enviar un correo a gilbertomazo@gmail.com  o llamar al 3006020797. Muchas Gracias.
				</td>
				<?php } ?>
				<td><?php echo $row["cunumeroregistro"]; ?></td>
				<td><?php echo $row["cunombre"];  ?></td>
				<td><?php echo $row["cuapellido"];  ?></td>
				<td><?php echo $row["cucedula"];  ?></td>
				<td><?php echo $row["cucelular"];  ?></td>
				<td><?php echo $row["cuemail"];  ?></td>
				<td><?php echo $row["ncdescripcion"];  ?></td>
				<td><?php echo date('d/m/Y',strtotime($row["cufecha_fin"]));   ?></td>						
			</tr>
		</table>
	</div>


		<?php
	}

	if(!$result)
	{

		echo mysqli_error($conn);
	}

	if($result->num_rows ==0)
	{
		echo "<script> $('#mensaje').attr('class','alert alert-info') </script>";

		echo "No se encontraron registros";
	}

}

echo "<script> $('#mensaje').attr('style','display:block') </script>";
if($errores == 1) {echo "<script> $('#mensaje').attr('class','alert alert-danger') </script>";}






//cerrar los result
mysqli_free_result($result);
mysqli_close($conn);
?>

