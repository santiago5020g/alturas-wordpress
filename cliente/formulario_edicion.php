<link rel="stylesheet" href="../css/jquery-ui.min.css">	
<script src="../js/jquery.min.js"></script>
<script src="../js/jquery-ui.min.js"></script>
<script src="../js/formulario1.js?v=4"></script>



<?php

//Se recibe el id del cliente
$id = $_GET["id"];

$sql = "SELECT cu.id as cuid,cu.numero_registro as cunumero_registro,cu.idnivel as cuidnivel,cu.nombre as cunombre,cu.apellido as cuapellido,cu.cedula as cucedula,cu.celular as cucelular,cu.email as cuemail,cu.fecha_fin as cufecha_fin,nc.descripcion as ncdescripcion, cu.descargar_certificado as cudescargar_certificado  FROM certificados_usuario cu inner join nivel_certificado nc on cu.idnivel = nc.idnivel WHERE cu.id = '$id'";




$result = $conn->query($sql);
$row = $result->fetch_assoc();


$nombre = $row["cunombre"];
$apellido = $row["cuapellido"];
$cedula = $row["cucedula"];
$celular = $row["cucelular"];
$email = $row["cuemail"];
$fecha_fin = date('d/m/Y',strtotime($row["cufecha_fin"]));
$numero_registro = $row["cunumero_registro"];
$descargar_certificado = $row["descargar_certificado"];
$idnivel = $row["cuidnivel"];


?>



	
<form id="formulario1" novalidate  action="../cliente/editar.php" class="form-horizontal" method="POST">
	<div class="form-group">
		<input type="text" style="display:none" name="id" id="id" value=<?php echo $id ?> >
		<div class="col-md-6">
			<label for="" class="control-label">Nombre</label>
			<input class="form-control" required type="text" name="nombre" id="nombre" placeholder="nombre" value=<?php echo $nombre ?> >
		</div>
		<div class="col-md-6">
			<label for="" class="control-label">Apellido</label>
			<input class="form-control" required type="text" name="apellido" id="apellido" placeholder="apellido" value=<?php echo $apellido ?> >
		</div>
	</div>
	<div class="form-group">
		<div class="col-md-6">
			<label for="" class="control-label">Cedula</label>
			<input class="form-control" required type="text" name="cedula" id="cedula" placeholder="cedula" value=<?php echo $cedula ?>>
		</div>
		<div class="col-md-6">
			<label for="" class="control-label">Celular</label>
			<input class="form-control" required type="text" name="celular" id="celular" placeholder="celular" value=<?php echo $celular ?>>
		</div>
	</div>

	<div class="form-group">
		<div class="col-md-6">
			<label for="" class="control-label">Email</label>
			<input class="form-control" required type="email" name="email" id="email" placeholder="email" value=<?php echo $email ?>>
		</div>
		<div class="col-md-6">
			<label for="" class="control-label">Numero de registro</label>
			<input class="form-control" required type="text" name="numero_registro" id="numero_registro" placeholder="numero de registro" value=<?php echo $numero_registro ?>>
		</div>
	</div>

	<div class="form-group">
		<div class="col-md-6">
			<label for="" class="control-label">Fecha del curso</label>
			<input class="form-control datepicker" required type="text" name="fecha_fin" id="fecha_fin" placeholder="fecha fin" value=<?php echo $fecha_fin ?>>
		</div>
		<div class="col-md-6">
			<label for="" class="control-label">El usuario puede....</label>
			<select class="form-control" required name="descargar_certificado" id="descargar_certificado">
				<option value="1" <?php if($descargar_certificado == 1) echo "selected"; ?>>Descargar el certificado</option>
				<option value="0" <?php if($descargar_certificado == 0) echo "selected"; ?>>No descargar el certificado</option>
			</select>
		</div>
	</div>
	<div class="form-group">
		<div class="col-md-12">
			<select class="form-control" required name="idnivel" id="idnivel">
				<option  value="">Selecciona el nivel de certificado</option>
				<option <?php if($idnivel == 1) {echo "selected";} ?> value="1">Avanzado</option>
				<option <?php if($idnivel == 2) {echo "selected";} ?> value="2">Basico</option>
				<option <?php if($idnivel == 3) {echo "selected";} ?> value="3">básico administrativo</option>
				<option <?php if($idnivel == 4) {echo "selected";} ?> value="1">básico operativo</option>
				<option <?php if($idnivel == 5) {echo "selected";} ?> value="2">Reentrenamiento</option>
				<option <?php if($idnivel == 6) {echo "selected";} ?> value="3">Coordinador</option>
			</select>
		</div>
	</div>


	<div class="form-group">
		<input type="submit" id="btnEnviar" class="btn btn-primary" value="Guardar cambios">
	</div>
</form>



<div class="row">
	<div id="mensaje" style="display:none" class=""></div>
</div>




<script>
	$.datepicker.regional['cs'] = {
    closeText: 'Cerrar',
    prevText: 'Anterior',
    nextText: 'Siguiente',
    currentText: 'Nyní',
    monthNames: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto',
      'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'
    ],
    monthNamesShort: ['Ene', 'Febr', 'Mar', 'Abr', 'Ma', 'Jun', 'Jul', 'Ago', 'Sep', 'Oct', 'Nov', 'Dic'],
    dayNames: ['Domingo', 'Lunes', 'Martes', 'Miercoles', 'Jueves', 'Viernes', 'Sabado'],
    dayNamesShort: ['Do', 'Lu', 'Ma', 'Mie', 'Jue', 'Vie', 'Sab'],
    dayNamesMin: ['Do', 'Lu', 'Ma', 'Mie', 'Jue', 'Vie', 'Sab'],
    weekHeader: 'Semana',
    dateFormat: 'dd/mm/yy',
    firstDay: 1,
    isRTL: false,
    showMonthAfterYear: false,
    yearSuffix: ''
  };

   $.datepicker.setDefaults($.datepicker.regional['cs']);
</script>

	<script type="text/javascript">
	      $( function() {
    	  $( ".datepicker" ).datepicker();
  			} );
  </script>
	</script>