
<div class="row">

<?php if ($inventario): ?>
	<div class="col-md-12">
	<div class="table-responsive">
	<table id="letraInventarioTabla" class="table table-bordered table table-hover">
	<tr>
		<th>Nro</th>
		<th>Clave de libro</th>
		<th>Titulo</th>
		<th>Autor</th>
		<th>Editorial</th>
		<th>Existencia</th>
		<th colspan="2">Opciones</th>
	</tr>
	<?php $x=1 ?>
	<?php foreach ($inventario as $valor): ?>
		
			<tr>
				<td><?php echo $x; ?></td>
				<td><?php echo $valor->ClaveLibro;?></td>
				<td><?php echo $valor->Titulo; ?></td>
				<td><?php echo $valor->Autor; ?></td>
				<td><?php echo $valor->Editorial; ?></td>
				<td><?php echo $valor->Cantidad; ?></td>
				<td>
				
					<a type="button" class="btn btn-success Ineditar" href="<?php echo base_url(); ?>index.php/Inventario/editarInventario/<?php echo $valor->ClaveLibro;?>"><span class="glyphicon glyphicon-pencil"></span></a>
				</td>
				<td>
					<!-- <form  action="<?php echo base_url(); ?>index.php/Inventario/eliminarInventario/<?php echo $valor->ClaveLibro;?>" class="fromEliminarIn" method="post">
						<button type="submit" class="btn btn-danger">
							<span class="glyphicon glyphicon-trash"></span>
						</button>
					</form> -->
					<a type="button" class="btn btn-danger btn_elininarIn" href="<?php echo base_url(); ?>index.php/Inventario/eliminarInventario/<?php echo $valor->ClaveLibro;?>" id="direccionEliminar"><span class="glyphicon glyphicon-trash"></a>
				</td>
			</tr>
		<?php $x++; ?>
	<?php endforeach ?>
	</table>
	<ul class="pagination">
	
	<?php
	/* Se imprimen los números de página */
	echo $this->pagination->create_links();
	?>
	</ul>
	</div>
</div>
<?php else: ?>
	<center><h3>No se ha encontrado el libro</h3> </center>
<?php endif ?>

</div>

<script>
$(document).ready(function(){
	/*funciones*/



/*terminan las funciones*/
	$(".btn_elininarIn").click(function(event){
		var direccion = $(this).attr("href");
		event.preventDefault();
		
		console.log("codigo de eliminacion--->"+direccion);
		alertify.set({ labels: {
		    ok     : "Continuar",
		    cancel : "Cancelar"
			} });
		alertify.confirm("¿Deses eliminarlo del inventario?", function (e) {
			if (e) {
				console.log("Dio->>SI");
				$.ajax({
					url:direccion,
					type:"post",
					data:"null",
					success:function(resp){
						if (resp.replace(/^\s|\s+$/g, "")=="exito") {
							alertify.success("Libro eliminado correctamente");
							location.reload();	
							console.log("Exito en la eliminacion");
						}else{
							alertify.error("No se puede eliminar el libro porque ha sido prestado \n intente mas tarde");
							console.log("Error en la eliminacion");
						}
					}
				});
			}else{
				alertify.success("Se ha cancelado el evento");
			}
		});


	});


});
</script>