<div class="col-md-12">
		<div class="table-responsive">
			<table  class="table table-bordered table table-hover">
			<tr>
				<th>Clave Prestamo</th>
				<th>Matricula Alumno</th>
				<th>Nombre</th>
				<th>Carrera/Grado</th>
				<th>Clave Libro</th>
				<th>Fecha prestamo</th>
				<th>Fecha Entrega</th>
			</tr>
			<?php foreach ($libros_suario as $valor): ?>
				<tr>
					<td><?php echo $valor->idPrestamos; ?></td>
					<td><?php echo $valor->MatriculaAlumno;?></td>
					<td><?php echo $valor->Nombre;?></td>
					<td><?php echo $valor->Carrera?></td>
					<td><?php echo $valor->ClaveLibro;?></td>
					<td><?php echo $valor->FechaPrestamo; ?></td>
					<td>
					<?php if ($valor->FechaEntrega=="0000-00-00"): ?>
						Pendiente
					<?php else: ?>
						<?php echo $valor->FechaEntrega ?>
					<?php endif ?>
					</td>
					<td>
						<a class="btn btn-danger" href="#">Registrar Entrega</a>		
					</td>
					<td>
						
					</td>
				</tr>
				
			<?php endforeach ?>
			</table>
	</div>

