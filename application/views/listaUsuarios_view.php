<div class="row">
	<center><h2>Usuarios registrados de la biblioteca</h2></center>
</div>

<div class="row">
	<div class="col-md-12">
		<div class="table-responsive">
			<table  class="table table-bordered table table-hover">
			<tr>
				<th>Matricula</th>
				<th>Nombre</th>
				<th>Carrera</th>
				<th>Grado</th>
				<th>Opciones</th>
			</tr>
			<?php foreach ($usu_bibioteca as $valor): ?>
				<tr>
					<td><?php echo $valor->MatriculaAlumno; ?></td>
					<td><?php echo $valor->Nombre." ".$valor->ApPaterno." ".$valor->ApMaterno; ?></td>
					<td><?php echo $valor->Carrera;?></td>
					<td><?php echo $valor->Grado; ?></td>
					<td>
						<a type="button" class="btn btn-success Ineditar" href="<?php echo base_url(); ?>index.php/RegistroPersona/editPersona/<?php echo $valor->MatriculaAlumno;?>"><span class="glyphicon glyphicon-pencil"></span></a>
						<a type="button" class="btn btn-danger btn_elininarAl" href="<?php echo base_url(); ?>index.php/RegistroPersona/deletePersona/<?php echo $valor->MatriculaAlumno; ?>" id="direccionEliminar"><span class="glyphicon glyphicon-trash"></a>
					</td>
				</tr>
			<?php endforeach ?>
			</table>
	</div>
</div>