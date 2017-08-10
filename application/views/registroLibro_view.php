<div class="row">
	<div class="col-md-12">
	<?php if ($editar): ?>
		<center><h2>Editar libro</h2></center>
	<?php else: ?>
		<center><h2>Registro de libros</h2></center>
	<?php endif ?>
		

	</div>
</div>
</br>
</br>
<?php if ($editar): ?>
<form id="formEditarGuardar" action="<?php echo base_url(); ?>index.php/RegistroLibro/editarLibro/<?php echo $clave; ?>" method="post">
<?php else: ?>
<form  action="<?php echo base_url(); ?>index.php/RegistroLibro/registrar" method="post" id="nuevoGuardar">
<?php endif ?>

	<div class="form-horizontal">
		<div class="row">
			<div class="col-md-6 col-md-offset-2">
				<div class="form-group">
			        <label class="control-label col-xs-3">Clave:</label>
			        <div class="col-xs-9">
			            <input type="text" class="form-control" id="clave" name="clave" placeholder="Clave del libro" <?php if ($editar): ?>
			            	value = "<?php echo $clave; ?>"
			            <?php endif ?>  required>
			    </div>
			    </div>
			    <div class="form-group">
			        <label class="control-label col-xs-3">Titulo:</label>
			        <div class="col-xs-9">
			            <input type="text" class="form-control" id="titulo" name="titulo" placeholder="Titulo del libro" <?php if ($editar): ?>
			            	value="<?php echo $tituloLib; ?>"
			            <?php endif ?> required>
			    </div>
			    </div>
			    <div class="form-group">
			        <label class="control-label col-xs-3">Autor:</label>
			        <div class="col-xs-9">
			            <input type="text" class="form-control" id="autor" name="autor" placeholder="Autor o Autores del libro" <?php if ($editar): ?>
			            	value ="<?php echo $autor; ?>"
			            <?php endif ?>  required>
			    </div>
			    </div>
			    <div class="form-group">
			        <label class="control-label col-xs-3">Editorial:</label>
			        <div class="col-xs-9">
			            <input type="text" class="form-control" id="editorial" name="editorial" placeholder="Editorial del libro" <?php if ($editar): ?>
			            	value ="<?php echo $editorial; ?>"
			            <?php endif ?>  required>
			    </div>
			    </div>
			    <div class="form-group">
			        <label class="control-label col-xs-3">Observaciones:</label>
			        <div class="col-xs-9">
			        	<textarea class="form-control" rows="3" name="observaciones" <?php if ($editar==FALSE): ?>
			        			placeholder="Observaciones del libro"
			        		<?php endif ?>    required>LIBRO DE BIBLIOTECA<?php if ($editar): ?><?php echo $observaciones; ?><?php endif ?>
			        	</textarea>
			    	</div>
			    </div>

			    <div class="form-group">
			    	
			    </div>
				
				<div class="form-group">
			        <label class="control-label col-xs-3">Acerbo:</label>
			        <div class="col-xs-9">
						<select name="tipoLibro" class="form-control">
						<?php if ($editar): ?>
							<?php if ($tipoLib==""): ?>
								<option value="BIBLIOGRÁFICO">BIBLIOGRÁFICO</option>
				    			<option value="HEMEROGRÁFICO">HEMEROGRÁFICO</option>
				    		<?php else: ?>
				    			<option value="<?php echo $tipoLib;?>"><?php echo $tipoLib;?></option>
							<?php endif ?>
							
						<?php else: ?>
							<option value="BIBLIOGRÁFICO">BIBLIOGRÁFICO</option>
				    		<option value="HEMEROGRÁFICO">HEMEROGRÁFICO</option>
						<?php endif ?>
				    		
			    		</select>
			    	</div>
			    </div>



			    <div class="form-group">
			        <label class="control-label col-xs-3">Cantidad:</label>
			        <div class="col-xs-9">
			            <input type="text" class="form-control" id="cantidad" name="cantidad" placeholder="Cantidad de libros" <?php if ($editar): ?>
			            	value="<?php echo $cantidad; ?>"
			            <?php endif ?>  required>
			    </div>
			    </div>

			</div>
			

<div class="col-md-12 col-md-offset-5">
	<button type="submit" class="btn btn-primary" name="guardar" id="guardar"><span class="glyphicon glyphicon-floppy-saved"></span> Guardar cambios</button>
</button>
</div>


		</div>
	</div>
</form>




