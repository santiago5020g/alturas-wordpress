<link rel="stylesheet" href="../css/jquery-ui.min.css">	
<script src="../js/jquery.min.js"></script>
<script src="../js/jquery-ui.min.js"></script>
<script src="../js/formulario1.js?v=4"></script>



	
<form id="formulario1" novalidate  action="../cliente/crear.php" class="form-horizontal" method="POST">
	<div class="form-group">
		<input type="text" style="display:none" name="id" id="id">
		<div class="col-md-6">
			<label for="" class="control-label">Nombre</label>
			<input class="form-control" required type="text" name="nombre" id="nombre" placeholder="nombre">
		</div>
		<div class="col-md-6">
			<label for="" class="control-label">Apellido</label>
			<input class="form-control" required type="text" name="apellido" id="apellido" placeholder="apellido">
		</div>
	</div>
	<div class="form-group">
		<div class="col-md-6">
			<label for="" class="control-label">Cedula</label>
			<input class="form-control" required type="text" name="cedula" id="cedula" placeholder="cedula">
		</div>
		<div class="col-md-6">
			<label for="" class="control-label">Celular</label>
			<input class="form-control" required type="text" name="celular" id="celular" placeholder="celular">
		</div>
	</div>

	<div class="form-group">
		<div class="col-md-6">
			<label for="" class="control-label">Email</label>
			<input class="form-control" required type="email" name="email" id="email" placeholder="email">
		</div>
		<div class="col-md-6">
			<label for="" class="control-label">Numero de registro</label>
			<input class="form-control" required type="text" name="numero_registro" id="numero_registro" placeholder="numero de registro">
		</div>
	</div>

	<div class="form-group">
		<div class="col-md-6">
			<label for="" class="control-label">Fecha del curso</label>
			<input class="form-control datepicker" required type="text" name="fecha_fin" id="fecha_fin" placeholder="fecha del curso">
		</div>
		<div class="col-md-6">
			<label for="" class="control-label">El usuario puede....</label>
			<select class="form-control" required name="descargar_certificado" id="descargar_certificado">
				<option value="">Seleccione...</option>
				<option value="1">Descargar el certificado</option>
				<option value="0">No descargar el certificado</option>
			</select>
		</div>
	</div>
	<div class="form-group">
		<div class="col-md-12">
			<select class="form-control" required name="idnivel" id="idnivel">
				<option value="">Selecciona el nivel de certificado</option>
				<option value="1">Avanzado</option>
				<option value="2">Basico</option>
				<option value="3">básico administrativo</option>
				<option value="4">básico operativo</option>
				<option value="5">Reentrenamiento</option>
				<option value="6">Coordinador</option>
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