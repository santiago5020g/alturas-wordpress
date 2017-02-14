<script src="../js/jquery.min.js"></script>
<script src="../js/formulario1.js?v=4"></script>


<div class="row"></div>
	
<form id="formulario1" novalidate  action="../contacto/correo.php" class="form-horizontal" method="POST">
	<div class="form-group">
		<input type="text" style="display:none" name="id" id="id">
		<div class="col-md-12">
			<label for="" class="control-label">Nombre</label>
			<input class="form-control" required type="text" name="nombre" id="nombre" placeholder="nombre">
		</div>
		<div class="col-md-12">
			<label for="" class="control-label">Correo</label>
			<input class="form-control" required type="email" name="correo" id="correo" placeholder="correo">
		</div>
		<div class="col-md-12">
			<label for="" class="control-label">Mensaje</label>
			<textarea name="mensajee" id="mensajee" cols="30" rows="10" placeholder="Mensaje"></textarea>
		</div>
	<div class="form-group">
		<input type="submit" id="btnEnviar" class="btn btn-primary" value="Guardar cambios">
	</div>
</form>

</div>

<div class="row">
	<div id="mensaje" style="display:none" class=""></div>
</div>

