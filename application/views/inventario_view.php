
<div class="row">
	<div class="col-md-12 ">
		<center><h1>Inventario de biblioteca</h1></center>
	</div>
</div>
</br>
</br>
<div class="row">

	<div class="pull-left">
		<form action="<?php echo base_url(); ?>index.php/Inventario/buscarLibro" class="form-inline" method="post">
			<div class="form-group">
			   <label for="claveInventario">Buscar</label>
			   <input type="text" class="form-control" id="buscar" name="buscar" placeholder="CHXXXX">
			 </div>
			 <button type="submit" class="btn btn-default" id="btn_buscar_Inventario"><span class="glyphicon glyphicon-search"></span></button>
		</form>
	</div>
	<div class="navbar-form navbar-left pull-right">
		<a type="button" href="#" class="dropdown-toggle btn btn-default" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Imprimir<span class="caret"></span></a>
	        <ul class="dropdown-menu">
	            <li><a target="_blank" href="<?php echo base_url(); ?>index.php/Inventario/imprimirInventaioBibliografico">Inventario Bibliografico</a></li>
	            <li><a target="_blank" href="<?php echo base_url(); ?>index.php/Inventario/imprimirInventarioHemerografico">Inventario Hemerografico</a></li>
	            <li><a target="_blank" href="<?php echo base_url(); ?>index.php/Inventario/imprimitTodoInventario">Todo el Inventario</a></li>
	            <li><a target="_blank" href="<?php echo base_url(); ?>index.php/Inventario/generarExcelAllInnventario">Generar archivo excel</a></li>
	        </ul>
	</div>


</div>
</br>
</br>

<!--hay que fracmentar la parte dmostrar los inventarios-->
<!-- <div id="contenido_inventario">
	
</div> -->

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
	<?php $x=$iniCont+1; ?>
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

					<a type="button" class="btn btn-danger btn_elininarIn" href="<?php echo base_url(); ?>index.php/Inventario/eliminarInventario/<?php echo $valor->ClaveLibro;?>" id="direccionEliminar"><span class="glyphicon glyphicon-trash"></a>
				</td>
			</tr>
		<?php $x++; ?>
	<?php endforeach ?>
	</table>
	<style>
		.centrar{
			align-content: center;
		}
	</style>
	<?php if (!$buscar): ?>
		
	
	<div class="centrar">
		<center>
		<ul class="pagination">
			<?php
			/* Se imprimen los números de página */
				echo $this->pagination->create_links();
			?>
		</ul>
		</center>
	</div>
	<?php endif ?>
	
	</div>
</div>
<?php else: ?>
	<center><h3>No se ha encontrado el libro</h3> </center>
<?php endif ?>

</div>

