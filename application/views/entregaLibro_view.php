<div class="row">
	<div class="col-md-12">
	<?php if ($usu_deudores): ?>
		<div class="table-responsive">
			<table  class="table table-bordered table table-hover">
			<tr>
				<th>Nro</th>
				<th>Clave Prestamo</th>
				<th>Matricula Alumno</th>
				<th>Nombre</th>
				<th>Carrera/Grado</th>
				<th>Clave Libro</th>
				<th>Fecha prestamo</th>
				<th>Fecha Entrega</th>
			</tr>
			<?php 
			$x=1;
			foreach ($usu_deudores as $valor): 
			?>
				<tr>
					<td><?php echo $x; ?></td>
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
						
						<!-- inicia proceso de entrega de libros prestados -modals-->
						<a type="button" class="btn btn-danger entregar" href="<?php echo base_url(); ?>index.php/EntregaLibro/EntregaLibroUsuario/<?php echo $valor->idPrestamos; ?>" id="direcEntrega"> Realizar entrega</a>
						
						  <!-- termina el proceso de entrega de libros modals -->
					</td>
				</tr>
				
			<?php
			$x++;
			 endforeach 
			 ?>
			</table>
	</div>
	<?php else: ?>
		
			<center><h2>No se tienen registrados prestamos</h2></center>

	<?php endif ?>
		
</div>
</div>
<script type="text/javascript">
	$(document).ready(function(){
				$(".entregar").click(function(event){
					event.preventDefault();
					console.log("Entregar->evento");
					var direccion = $("#direcEntrega").attr("href");
					console.log("direcion->obtenida->>>"+direccion);
					alertify.set({ labels: {
					    ok     : "Continuar",
					    cancel : "Cancelar"
					} });
					alertify.confirm("Se realizara el registro de la entrega del libro ¿Desea continuar?", function (e) {
						if (e) {
							$.ajax({
								url:direccion,
								type:"POST",
								data:"nada",
								success:function(respuesta){
									if (respuesta.replace(/^\s|\s+$/g, "")=="exito") {
										delay();
										location.reload();
									}
									else{
										alertify.error("Error en el servido\n vuelva a intentarlo mas tarde");
										console.log(respuesta);
									}
								}
								
							});
							
						} else {
							alertify.error("Se ha cancelado el evento");
						}
					});
			});

	function alertaCorrectoConfirmacion(){
		alertify.success("Entrega registrada correctamente");
	}
	function delay(){
	    window.setTimeout('alertaCorrectoConfirmacion()',5000)
	}

	});
</script>
