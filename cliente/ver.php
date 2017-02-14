<link rel="stylesheet" href="../css/dataTable.min.css">
<script src="../js/jquery.min.js"></script>
<script src="../js/dataTable.min.js"></script>
<script src="../js/cliente/eliminar.js?v=7"></script>


<?php 

//incluir la conexion a la base de datos
$basepath = $_SERVER['DOCUMENT_ROOT']."/wp/conexion/conect.php";
include($basepath);

?>

		<div class="table-responsive">
			<table id="paginacion" class="table table-striped table-bordered table-hover">
					<thead>
						<tr>
							<th>Nombre</th>
							<th>Apellido</th>
							<th>Cedula</th>
							<th>Numero de registro</th>
							<th>Celular</th>
							<th>Email</th>
							<th>Nivel</th>
							<th>Fecha del curso</th>
							<th>Descarga de certificado</th>
							<th style="padding-right:10%">Acciones</th>
						</tr>
					</thead>
				
				<?php 
				//listar los clientes

				$sql = "SELECT cu.id as cuid,cu.nombre as cunombre,cu.apellido as cuapellido,cu.cedula as cucedula,cu.celular as cucelular,cu.email as cuemail,cu.numero_registro as cunumero_registro,cu.fecha_fin as cufecha_fin,nc.descripcion as ncdescripcion, cu.descargar_certificado as cudescargar_certificado FROM certificados_usuario cu inner join nivel_certificado nc on cu.idnivel = nc.idnivel";
				$result = $conn->query($sql);
				 while($row = $result->fetch_assoc()) 
				{
					$id = $row['cuid'];

				 ?>
				<tr id="<?php echo $id; ?>">
					<td><?php echo $row["cunombre"];  ?></td>
					<td><?php echo $row["cuapellido"];  ?></td>
					<td><?php echo $row["cucedula"];  ?></td>
					<td><?php echo $row["cunumero_registro"];  ?></td>
					<td><?php echo $row["cucelular"];  ?></td>
					<td><?php echo $row["cuemail"];  ?></td>
					<td><?php echo $row["ncdescripcion"];  ?></td>
					<td><?php echo date('d/m/Y',strtotime($row["cufecha_fin"]));   ?></td>
					<td>
						<?php 
							 if ($row["cudescargar_certificado"] == 1)  {echo "Si";} 
							 else { echo "No";}
						?>
					</td>
					<td>
						<a href="../editar-cliente?id=<?php echo $row['cuid']; ?>" class="btn btn-warning">Editar</a>
						<a href="#" class="btn btn-danger eliminar" usr="<?php echo $row['cuid']; ?>">Eliminar</a>
						<a target="_blank" class="btn btn-success" href="../cliente/pdf.php?id=<?php echo $id; ?>">PDF</a>
					</td>				
				</tr>
			<?php }//fin while ($row = mysli_fetch_row($result)) 
				//cerrar los result

				mysqli_free_result($result);
				mysqli_close($conn);
			 ?>
			</table>
		</div>
		
		<div id="mensaje"></div>


		<div style="padding-bottom:50px"></div>

<script>
	$(document).ready(function(){
    $('#paginacion').DataTable({

    	 "language": {
            "lengthMenu": "Mostrando _MENU_ registros por pagina",
            "zeroRecords": "No se encontraron resultados",
            "info": "Mostrando _PAGE_ de _PAGES_",
            "infoEmpty": "No hay registros",
            "search":         "Buscar:",
            "infoFiltered": "(filtrar desde _MAX_ total registros)",
            "paginate": {
	        "first":      "Primera",
	        "last":       "Ultima",
	        "next":       "Siguiente",
	        "previous":   "Anterior"
    },
        },
         "pageLength": 10
    });
});
</script>
