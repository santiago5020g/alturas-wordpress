<!-- .aqui puedes editar mas facil -->	
<script src="js/jquery.min.js"></script>
<script src="js/formulario1.js"></script>

	
<form id="formulario1" action="cliente/crear.php" class="form-horizontal" method="POST">
	<div class="form-group">
		<div class="col-md-6">
			<input class="form-control" required type="text" name="nombre" id="nombre" placeholder="nombre">
		</div>
		<div class="col-md-6">
			<input class="form-control" required type="text" name="apellido" id="apellido" placeholder="apellido">
		</div>
	</div>
	<div class="form-group">
		<div class="col-md-6">
			<input class="form-control" required type="text" name="cedula" id="cedula" placeholder="cedula">
		</div>
		<div class="col-md-6">
			<input class="form-control" required type="text" name="celular" id="celular" placeholder="celular">
		</div>
	</div>

	<div class="form-group">
		<div class="col-md-6">
			<input class="form-control" required type="email" name="email" id="email" placeholder="email">
		</div>
		<div class="col-md-6">
			<input class="form-control" required type="text" name="direccion" id="direccion" placeholder="direccion">
		</div>
	</div>
	<div class="form-group">
		<div class="col-md-6">
			<label for="" class="control-label">Fecha inicio</label>
			<input class="form-control" required type="date" name="fecha_inicio" id="fecha_inicio" placeholder="fecha inicio">
		</div>
		<div class="col-md-6">
			<label for="" class="control-label">Fecha fin</label>
			<input class="form-control" required type="date" name="fecha_fin" id="fecha_fin" placeholder="fecha fin">
		</div>
	</div>
	
	<div>
		<select class="form-control" required name="idnivel" id="idnivel">
			<option value="">Selecciona el nivel de certificado</option>
			<option value="1">Basico</option>
			<option value="2">Medio</option>
			<option value="3">Avanzado</option>
		</select>
	</div>
	<div class="form-group">
		<input type="submit" id="btnEnviar" class="btn btn-primary" value="Crear">
	</div>
</form>



<div class="row">
	<div id="mensaje" class="alert alert-success"></div>
</div>